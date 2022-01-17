<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImg;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //以下待處理
    public function index(){

        $cookie = Product::get();

        return view('backstage.goods.goods',compact('cookie'));
    }

    public function create(){

        return view('backstage.goods.goods-create');
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
        return view('backstage.goods.goods-edit',compact('product'));
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
