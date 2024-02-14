<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $orders =Order::all();
        foreach($orders as $order){
            $order['pizzaz'] = json_decode($order->pizzaz);
        }
        

        return view('orders.index',compact('orders'));
    }
}
