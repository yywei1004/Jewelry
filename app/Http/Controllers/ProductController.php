<?php

namespace App\Http\Controllers;

use App\Cover;
use App\Product;
use App\ProductImg;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 讀取商品專區頁
    public function index(){
        $cover = Cover::get();
        $discount = Product::where('type','discount')->orderbydesc('id')->take(3)->get();
        $latest = Product::where('type','latest')->orderbydesc('id')->take(4)->get();
        $select = Product::where('type','select')->orderbydesc('id')->take(3)->get();
        $custom = Product::where('type','custom')->orderbydesc('id')->take(4)->get();
        return view('backstage.page.product.product',compact('cover','discount','latest','select','custom'));
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

    //最新商品
    public function latestcreate(){
        return view('backstage.page.product.latest-create');
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

    public function imgUploadcover2(Request $request){
        $cover = Cover::find(2);
        FilesController::deleteUpload($cover->cover_path);
        foreach ($request->img as $value) {
            $path = FilesController::imgUpload($value,'cover'); //將圖片上傳放入cover資料夾並回傳路徑
        }
        $cover->cover_path = $path;
        $cover->save();
        return $path;
    }

    //精選商品
    public function selectcreate(){
        return view('backstage.page.product.select-create');
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

    //客製專區
    public function customcreate(){
        return view('backstage.page.product.custom-create');
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

    public function imgUploadcover3(Request $request){
        $cover = Cover::find(3);
        FilesController::deleteUpload($cover->cover_path);
        foreach ($request->img as $value) {
            $path = FilesController::imgUpload($value,'cover'); //將圖片上傳放入cover資料夾並回傳路徑
        }
        $cover->cover_path = $path;
        $cover->save();
        return $path;
    }

    //共用功能
    public function edit($id){
        $product = Product::find($id);
        return view('backstage.page.product.product-edit',compact('product'));
    }

    public function update($id, Request $request){
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

    public function delete($id){
        $img = ProductImg::where('product_id',$id)->get();
        foreach ($img as $value) {
            FilesController::deleteUpload($value->image_path);
        }
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
