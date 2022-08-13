<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Order;

class HomeController extends Controller
{
    public function Dashboard()
    {
        $orders = Order::where('status','pending')->orderBy('id','DESC')->paginate(2);
        return view('admin.index', compact('orders'));
    } // end method
}
