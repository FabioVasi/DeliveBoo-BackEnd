<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index(Order $order)
    {
        $order = Order::where('user_id', Auth::id())->count();

        return view('admin.dashboard', compact('order'));
    }
}
