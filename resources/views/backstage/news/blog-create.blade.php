@extends('layouts.backstage-template')

@section('css')
    <link rel="stylesheet" href="{{asset('css/blog-create.css')}}">

@endsection

@section('main')
    <div class="container">
        <form action="/news/newsstore" method="post" enctype="multipart/form-data">
            @csrf
            {{-- 上面這行 等同於 <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            <div class="row">
                <label for="title">文章標題</label>
                <input type="text" id="title" name="title">
            </div>
            <div class="row custom">
                <label for="text">文章內文</label>
                <textarea id="text" name="text"></textarea>
            </div>
 
            <div class="row btn">
                <a href="/blog">取消</a>
                <button type="submit">新增文章</button>
            </div>
        </form>
    </div>
@endsection
    
	