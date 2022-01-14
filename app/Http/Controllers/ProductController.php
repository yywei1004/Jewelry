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
        //儲存表單的資料
        // 可以先用 dd($request->all());  去檢查有沒有成功將檔案送上後端
        // 原生laravel的檔案上傳，必須輸入 php artisan storage:link 並修改回傳路徑才能使用
        // $path = Storage::disk('local')->put('public/goods', $request->images);
        // Storage::  =>  laravel 提供的儲存檔案的功能
        // disk('local') => 儲存的位置(可在config/filesystems定義)
        // put('public/goods', $request->images) => 放檔案的function
        // 第一個參數是資料夾名稱 (須從public/開始), 第二個參數是檔案本身

        // 自製檔案上傳 第一個參數 檔案,  第二個參數 資料夾
        // $path = FilesController::imgUpload($request->images,'goods');


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
