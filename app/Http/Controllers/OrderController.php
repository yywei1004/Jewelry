<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //以下待處理
    public function index(){
        $order = Order::get();
        return view('backstage.order.order',compact('order'));
    }

    public function look($id){
        $order = Order::find($id);
        return view('backstage.order.order-look',compact('order'));
    }

    public function update($id, Request $request){

        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();

        return redirect('/order');
    }
}
