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
        $cover = Cover::orderbydesc('id')->take(1)->get();
        $news = Newz::orderbydesc('id')->take(3)->get();
        $product = Product::get();
        return view('front.index',compact('cover','news','product'));
    }

    public function shopping_01(){
        $shoppingcart = ShoppingCart::where('user_id', Auth::user()->id)->get();
        return view('front.checkout1',compact('shoppingcart'));
    }

    public function shopping_02(Request $request){
        dd($request->all());
        ShoppingCart::where('user_id', Auth::user()->id)->delete();
        Session::put('step01',$request->all());



        $sum = 0;
        foreach ($request->total as $item){
            $sum = $sum + $item;
        }
        $merch = count($request->total);
        return view('front.cart-2', compact('sum','merch') );
    }
    public function shopping_03(Request $request){
        Session::put('step02',$request->all());

        return view('front.cart-3');
    }
    public function store(Request $request){

        //session取資料方法之一: 單純讀取出資料, 不清空
        $shop01 =  Session::get('step01');
        $shop02 =  Session::get('step02');
        $total = 0;
        foreach ($shop01['total'] as $key => $value) {
            $total = $total + $value;
        }

        if ($shop02['shipway'] == 1){
            $total = $total + 200;
            $shipfee = 200;
        }else{
            $total = $total + 60;
            $shipfee = 60;
        }


        $order = Order::create([
            'total_price' => $total,
            'shipping_fee' => $shipfee, 
            'user_id' => Auth::user()->id, 
            'address' => $request->address, 
            'phone' => $request->phone,  
            'ship_way' => $shop02['shipway'], 
            'status' => 1,
        ]);

        foreach ($shop01['total'] as $key => $value) {
            OrderDetail::create([
                'product_id' => $shop01['product_id'][$key],
                'qty' => $shop01['qty'][$key],
                'price' => $shop01['price'][$key],
                'order_id' => $order->id,
            ]);
        }
        //成功成立訂單後 將session清空
        Session::forget('step01');
        Session::forget('step02');
    
        return redirect('/shopping04/'. $order->id);
    }

    public function shopping_04($id){
        
        $order = Order::find($id);
        //訂單編號 = 日期 + order的id
        $order->order_number = str_replace('-','',substr($order->created_at,0,10)).$id;
        $order->save();
        return view('front.cart-4', compact('order'));
    }

    public function addtocart(Request $request){

        //先藉由ID去找商品, 然後將商品加入購物車(也就是在shopping_carts新增一筆資料)
        //由於前端頁面設計只有單純的加入購物車按鈕, 我們預設他的數量是1

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
