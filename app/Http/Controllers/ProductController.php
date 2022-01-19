<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImg;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 讀取商品專區頁
    public function index(){
        $discount = Product::where('type','discount')->orderbydesc('id')->take(3)->get();
        $latest = Product::where('type','latest')->orderbydesc('id')->take(4)->get();
        $select = Product::where('type','select')->orderbydesc('id')->take(3)->get();
        $custom = Product::where('type','custom')->orderbydesc('id')->take(4)->get();
        return view('backstage.page.product.product',compact('discount','latest','select','custom'));
    }
    //折扣專區
    public function discountcreate(){
        return view('backstage.page.product.discount.discount-create');
    }

    public function discountstore(Request $request){
        $product = Product::create([
            'type' => 'discount',
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'qty' => $request->qty,
        ]);

        foreach ($request->img as $value) {
            ProductImg::create([
                'image_path' => $value,
                'product_id' => $product->id,
            ]);
        }
        return redirect('/product');
    }

    public function discountedit($id){
        $product = Product::find($id);
        return view('backstage.page.product.discount.discount-edit',compact('product'));
    }

    public function discountupdate($id, Request $request){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->save();
        
        if($request->img != Null){
            foreach ($request->img as $value) {
                ProductImg::create([
                    'image_path' => $value,
                    'product_id' => $product->id,
                ]);
            }
        }
        return redirect('/product');
    }

    public function discountdelete($id){
        $img = ProductImg::where('product_id',$id)->get();
        foreach ($img as $value) {
            FilesController::deleteUpload($value->image_path);
        }
        Product::find($id)->delete();
        ProductImg::where('product_id',$id)->delete();
        return redirect('/product');
    }

    //最新商品
    public function latestcreate(){
        return view('backstage.page.product.latest.latest-create');
    }

    public function lateststore(Request $request){
        $product = Product::create([
            'type' => 'latest',
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'qty' => $request->qty,
        ]);

        foreach ($request->img as $value) {
            ProductImg::create([
                'image_path' => $value,
                'product_id' => $product->id,
            ]);
        }
        return redirect('/product');
    }

    public function latestedit($id){
        $product = Product::find($id);
        return view('backstage.page.product.latest.latest-edit',compact('product'));
    }

    public function latestupdate($id, Request $request){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->save();
        
        if($request->img != Null){
            foreach ($request->img as $value) {
                ProductImg::create([
                    'image_path' => $value,
                    'product_id' => $product->id,
                ]);
            }
        }
        return redirect('/product');
    }

    public function latestdelete($id){
        $img = ProductImg::where('product_id',$id)->get();
        foreach ($img as $value) {
            FilesController::deleteUpload($value->image_path);
        }
        Product::find($id)->delete();
        ProductImg::where('product_id',$id)->delete();
        return redirect('/product');
    }

    //精選商品
    public function selectcreate(){
        return view('backstage.page.product.select.select-create');
    }

    public function selectstore(Request $request){
        $product = Product::create([
            'type' => 'select',
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'qty' => $request->qty,
        ]);

        foreach ($request->img as $value) {
            ProductImg::create([
                'image_path' => $value,
                'product_id' => $product->id,
            ]);
        }
        return redirect('/product');
    }

    public function selectedit($id){
        $product = Product::find($id);
        return view('backstage.page.product.select.select-edit',compact('product'));
    }

    public function selectupdate($id, Request $request){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->save();
        
        if($request->img != Null){
            foreach ($request->img as $value) {
                ProductImg::create([
                    'image_path' => $value,
                    'product_id' => $product->id,
                ]);
            }
        }
        return redirect('/product');
    }

    public function selectdelete($id){
        $img = ProductImg::where('product_id',$id)->get();
        foreach ($img as $value) {
            FilesController::deleteUpload($value->image_path);
        }
        Product::find($id)->delete();
        ProductImg::where('product_id',$id)->delete();
        return redirect('/product');
    }

    //客製專區
    public function customcreate(){
        return view('backstage.page.product.custom.custom-create');
    }

    public function customstore(Request $request){
        $product = Product::create([
            'type' => 'custom',
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'qty' => $request->qty,
        ]);

        foreach ($request->img as $value) {
            ProductImg::create([
                'image_path' => $value,
                'product_id' => $product->id,
            ]);
        }
        return redirect('/product');
    }

    public function customedit($id){
        $product = Product::find($id);
        return view('backstage.page.product.custom.custom-edit',compact('product'));
    }

    public function customupdate($id, Request $request){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->save();
        
        if($request->img != Null){
            foreach ($request->img as $value) {
                ProductImg::create([
                    'image_path' => $value,
                    'product_id' => $product->id,
                ]);
            }
        }
        return redirect('/product');
    }

    public function customdelete($id){
        $img = ProductImg::where('product_id',$id)->get();
        foreach ($img as $value) {
            FilesController::deleteUpload($value->image_path);
        }
        Product::find($id)->delete();
        ProductImg::where('product_id',$id)->delete();
        return redirect('/product');
    }











    
    public function store(Request $request){
        $product = Product::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'qty' => $request->qty,
        ]);

        foreach ($request->img as $value) {
            ProductImg::create([
                'image_path' => $value,
                'product_id' => $product->id,
            ]);
        }

        return redirect('/product');
    }

    public function edit($id){
        $product = Product::find($id);
        return view('backstage.product.goods-edit',compact('product'));
    }

    public function update($id, Request $request){

        //儲存文字資料
        $product = Product::find($id);
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->save();
        
        //儲存新增的圖片
        if($request->img != Null){
            foreach ($request->img as $value) {
                ProductImg::create([
                    'image_path' => $value,
                    'product_id' => $product->id,
                ]);
            }
        }

        return redirect('/product');
    }

    public function delete($id){
        
        //產品圖片 先刪資料會讓檔案留在系統 永遠...
        $img = ProductImg::where('product_id',$id)->get();
        //所以要先刪檔案
        foreach ($img as $value) {
            FilesController::deleteUpload($value->image_path);
        }
        
        //再把資料刪除 //產品資料刪除
        Product::find($id)->delete();
        ProductImg::where('product_id',$id)->delete();

        return redirect('/product');
    }



    public function imgUpload(Request $request){
        $path = '[';
        foreach ($request->img as $value) {
            $path = $path.'"'.FilesController::imgUpload($value,'goods').'",';
        }
        $path = rtrim($path, ',');
        $path = $path.']';

        return $path;
    }



    public function imgDelete(Request $request){
        ProductImg::where('image_path', $request->path)->delete();
        FilesController::deleteUpload($request->path);
        return 'OK';
    }
}
