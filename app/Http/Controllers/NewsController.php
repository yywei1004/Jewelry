<?php

namespace App\Http\Controllers;

use App\Newz;
use App\Cover;
use App\Feedback;
use App\Product;
use App\ProductImg;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // 讀取行銷資訊頁
    public function index(){
        $cover = Cover::get();
        $news = Newz::orderbydesc('id')->take(4)->get();
        $theme = Product::where('type','theme')->orderbydesc('id')->take(6)->get();
        return view('backstage.page.promotion.promotion', compact('cover','news','theme'));
    }
    
    //最新消息
    public function newscreate(){
        return view('backstage.page.promotion.news.news-create');
    }

    public function newsstore(Request $request){
        Newz::create([
            "title" => $request->title,
            "text" => $request->text,
        ]);
        return redirect('/news');

    }

    public function newsedit($id){
        $news = Newz::find($id);
        return view('backstage.page.promotion.news.news-edit', compact('news'));
    }

    public function newsupdate($id, Request $request){
        $news = Newz::find($id);
        $news->title = $request->title;
        $news->text = $request->text;
        $news->save();
        return redirect('/news');
    }

    public function newsdelete($id){
        Newz::find($id)->delete();
        return redirect('/news');
    }

    //系列主題
    public function themecreate(){
        return view('backstage.page.promotion.theme.theme-create');
    }

    public function themestore(Request $request){
        $product = Product::create([
            'type' => 'theme',
            'name' => $request->name,
            'desc' => $request->desc,
            'original_price' => $request->original_price,
            'price' => $request->price,
            'qty' => $request->qty,
        ]);

        foreach ($request->img as $value) {
            ProductImg::create([
                'image_path' => $value,
                'product_id' => $product->id,
            ]);
        }
        return redirect('/news');
    }

    public function themeedit($id){
        $product = Product::find($id);
        return view('backstage.page.promotion.theme.theme-edit',compact('product'));
    }

    public function themeupdate($id, Request $request){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->original_price = $request->original_price;
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
        return redirect('/news');
    }

    public function themedelete($id){
        $img = ProductImg::where('product_id',$id)->get();
        foreach ($img as $value) {
            FilesController::deleteUpload($value->image_path);
        }
        Product::find($id)->delete();
        ProductImg::where('product_id',$id)->delete();
        return redirect('/news');
    }

    public function imgUploadcover1(Request $request){
        Cover::create([
            'cover_path' => '',
        ]);
        $cover = Cover::find(1);
        FilesController::deleteUpload($cover->cover_path);
        foreach ($request->img as $value) {
            $path = FilesController::imgUpload($value,'cover'); //將圖片上傳放入cover資料夾並回傳路徑
        }
        $cover->cover_path = $path;
        $cover->save();
        return $path;
    }

    //意見回饋
    public function feedback(){
        $feedback = Feedback::get();
        return view('backstage.feedback.feedback',compact('feedback'));
    }

    public function feedbackstore(Request $request){
        Feedback::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'desc' => $request->name,
        ]);
        return redirect('/index')->with('msg','感謝您的寶貴意見');
    }

    public function feedbackdelete($id){
        Feedback::find($id)->delete();
        return redirect('/feedback');
    }
}
