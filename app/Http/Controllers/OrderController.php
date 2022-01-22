<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $order = Order::get();
        return view('backstage.order.order',compact('order'));
    }

    public function orderlook($id){
        $order = Order::find($id);
        return view('backstage.order.order-look',compact('order'));
    }

    public function orderupdate($id, Request $request){
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();
        return redirect('/order');
    }

    public function orderdelete($id){
        Order::find($id)->delete();
        return redirect('/order');
    }
}
