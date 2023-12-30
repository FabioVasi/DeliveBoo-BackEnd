<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order, $id)
    {
        //dd($order);
        $order = Order::where('user_id', Auth::id())->where('id', $id)
            ->with('dishes')
            ->get();
        /* $order = Order::where('user_id', Auth::id())->leftJoin('dish_order', 'dish_order.order_id', '=', 'orders.id')->get(); */

        //dd($order);

        return view('admin.orders.show', compact('order'));
    }
}
/* $ordersData = DB::table('dish_order')
            ->select(
                //pivot
                'dish_order.dish_id',
                'dish_order.order_id',
                'dish_order.qty',

                //dishes
                'dishes.name',
                'dishes.description',
                'dishes.price',
                'dishes.available',

                //orders
                'orders.total_price',
                'orders.success',
                'orders.ui_mail',
                'orders.ui_address',
                'orders.ui_name',
                'orders.ui_phone'
            )
            ->leftJoin('dishes', 'dish_order.dish_id', '=', 'dishes.id')
            ->leftJoin('orders', 'dish_order.order_id', '=', 'orders.id')->where('user_id', Auth::id())
            ->get(); */