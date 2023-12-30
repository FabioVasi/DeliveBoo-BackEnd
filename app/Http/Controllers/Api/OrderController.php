<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;


class OrderController extends Controller
{
    public function GetOrder(Request $request)
    {



        $request->validate([
            'ui_name' => 'required|string',
            'ui_address' => 'required|string',
            'ui_phone' => 'required|string',
            'ui_mail' => 'nullable|email',
            'total_price' => 'required|numeric',
            'success' => 'required'
        ]);

        $order = Order::create([
            'ui_name' => $request->ui_name,
            'ui_address' => $request->ui_address,
            'ui_phone' => $request->ui_phone,
            'ui_mail' => $request->ui_mail,
            'total_price' => $request->total_price,
            'user_id' => $request->user_id,
            'success' => $request->success
        ]);



        foreach ($request->dishes as $item) {
            $order->dishes()->attach($item['id'], ['qty' => $item['quantity']]);
        }


        return response()->json(['message' => 'Ordine ricevuto con successo', 'order_id' => $order->id], 201);
    }

    public function Generate(Request $request, Gateway $gateway, Order $order)
    {


        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];
        return response()->json($data, 200);
    }
    public function MakePayment(Request $request, Gateway $gateway, Order $order)
    {


        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        if ($result->success) {
            $data = [
                'message' => 'Transazione eseguita correttamente',
                'success' => true
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Transazione rifiutata',
                'success' => false,
                'error' => $result->message,
            ];
            return response()->json($data, 401);
        }
    }
}
