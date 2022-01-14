<?php

namespace App\Http\Controllers;

use App\Cover;
use App\Newz;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // 讀取資料的總頁面通常會叫 index / list 
    public function index(){
        $cover = Cover::get();
        $news = Newz::get();
        return view('backstage.blog.blog', compact('cover','news'));
    }

    public function create(){

        return view('backstage.blog.blog-create');
    }


    public function store(Request $request){

        // 藉由model操作資料庫
        Newz::create([
            "title" => $request->title,
            "text" => $request->text,
        ]);
        return redirect('/news');

    }

    public function edit($id){
        
        //找到我要編輯的那一個文章
        $news = Newz::find($id);

        return view('backstage.blog.blog-edit', compact('news'));
    }

    public function update($id, Request $request){
        
        // 第一個寫法, 使用query builder
        // Article::find($id)->update([
        //     "title" => $request->title,
        //     "content" => $request->content,
        //     "auther" => $request->auther,
        // ]);

        // 第二種寫法, 使用orm
        $news = Newz::find($id);
        $news->title = $request->title;
        $news->text = $request->text;
        $news->save();
        return redirect('/news');
    }

    public function delete($id){
        //進行刪除
        //第一個寫法, 使用query builder
        Newz::find($id)->delete();

        // 第二種寫法, 使用orm
        // $article = Article::find($id);
        // $article->delete();

        //刪除完回到blog的列表
        return redirect('/news');
    }
}
