<?php

namespace App\Http\Controllers;

use App\Newz;
use App\Cover;
use App\Order;
use App\Product;
use App\OrderDetail;
use App\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    public function index(){
        $cover = Cover::get();
        $news = Newz::orderbydesc('id')->take(3)->get();
        $theme = Product::where('type','theme')->orderbydesc('id')->take(6)->get();
        $discount = Product::where('type','discount')->orderbydesc('id')->take(3)->get();
        $latest = Product::where('type','latest')->orderbydesc('id')->take(4)->get();
        $select = Product::where('type','select')->orderbydesc('id')->take(3)->get();
        $custom = Product::where('type','custom')->orderbydesc('id')->take(4)->get();
        return view('front.index',compact('cover','news','theme','discount','latest','select','custom'));
    }

    public function shopping_01(){
        $shoppingcart = ShoppingCart::where('user_id', Auth::user()->id)->get();
        return view('front.checkout1',compact('shoppingcart'));
    }

    public function shopping_02(Request $request){
        $length = count($request->qty);
        $subtotal = 0;
        $qty_total = 0;
        for ($i=0; $i < $length; $i++) { 
            $subtotal += $request->price[$i] * $request->qty[$i];
            $qty_total += $request->qty[$i];
        }
        
        ShoppingCart::where('user_id', Auth::user()->id)->delete();
        Session::put('step01',$request->all());
        Session::put('subtotal',$subtotal);
        Session::put('qty_total',$qty_total);
        
        $total = 0;
        if($subtotal >= 1000){ //免運金額
            $total = $subtotal;
            $shipfee = 0;
        }else{
            if ($request->ship_way <= 5){ //運費60
                $total = $subtotal + 60;
                $shipfee = 60;
            }else{
                $total = $subtotal + 100; //運費100
                $shipfee = 100;
            }
        }
        Session::put('total',$total);
        Session::put('shipfee',$shipfee);

        return view('front.checkout2', compact('qty_total','total') );
    }

    public function shopping_03(Request $request){
        $step01 =  Session::get('step01');
        $subtotal =  Session::get('subtotal');
        $qty_total =  Session::get('qty_total');
        $total =  Session::get('total');
        $shipfee =  Session::get('shipfee');

        $order = Order::create([
            'total_price' => $total,
            'shipping_fee' => $shipfee, 
            'user_id' => Auth::user()->id, 
            'address' => $request->address, 
            'phone' => $request->phone,  
            'ship_way' => $step01['ship_way'], 
            'remark' => $request->remark,
            'status' => 1, //狀態:未付款
        ]);

        foreach ($step01['qty'] as $key => $value) {
            OrderDetail::create([
                'product_id' => $step01['product_id'][$key],
                'qty' => $step01['qty'][$key],
                'price' => $step01['price'][$key],
                'order_id' => $order->id,
            ]);
        }

        $order_detail = OrderDetail::where('order_id',$order->id)->get();

        //訂單編號 = 日期 + order的id
        $order->order_number = str_replace('-','',substr($order->created_at,0,10)).$order->id;
        $order->save();

        //成功成立訂單後 將session清空
        Session::forget('step01');
        Session::forget('subtotal');
        Session::forget('qty_total');
        Session::forget('total');
        Session::forget('shipfee');

        return view('front.checkout3',compact('order','order_detail','subtotal','qty_total','shipfee','total'));
    }

    public function addtocart(Request $request){
        $product = Product::find($request->product_id);
        ShoppingCart::create([
            'product_id' => $product->id,
            'qty' => 1,
            'price' => $product->price,
            'user_id' => Auth::user()->id,
        ]);
        return "新增成功";
    }

    public function deletetocart(Request $request){
        ShoppingCart::find($request->shoppingcart_id)->delete();
        return "刪除成功";
    }

    public function trade($order_id){
        function create_mpg_aes_encrypt ($parameter = "" , $key = "", $iv = "") {
            $return_str = '';
            if (!empty($parameter)) {
                //將參數經過 URL ENCODED QUERY STRING
                $return_str = http_build_query($parameter);
            }
            return trim(bin2hex(openssl_encrypt(addpadding($return_str), 'aes-256-cbc', $key, OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING, $iv)));
        }
        function addpadding($string, $blocksize = 32) {
            $len = strlen($string);
            $pad = $blocksize - ($len % $blocksize);
            $string .= str_repeat(chr($pad), $pad);
            return $string;
        }

        $order = Order::find($order_id);
        $trade_info_arr = array(
            'MerchantID' => 'MS130041437', //輸入個人的MerchantID
            'RespondType' => 'JSON',
            'TimeStamp' => time(),
            'Version' => 2.0,
            'MerchantOrderNo' => $order->order_number,
            'Email' => $order->user->email,
            'LoginType' => 0,
            'Amt' => $order->total_price,
            'ItemDesc' => '商品'
            );
        //輸入個人的 $mer_key 和 $mer_iv
        $mer_key = 'nf43WfLCI6PsiD0zC6zYAySLFhqJ21vu';
        $mer_iv = 'CPmxC21y4tl4sB1P';
        //交易資料經 AES 加密後取得 TradeInfo
        $TradeInfo = create_mpg_aes_encrypt($trade_info_arr, $mer_key, $mer_iv);
        $readyforsha = 'HashKey='.$mer_key.'&'.$TradeInfo.'&'.'HashIV='.$mer_iv;
        $TradeSha = strtoupper(hash("sha256", $readyforsha));

        return view('front.money',compact('TradeInfo','TradeSha'));
    }
}
