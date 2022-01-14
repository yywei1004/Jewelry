@extends('layouts.backstage-template')
@section('css')
    <link rel="stylesheet" href=" {{asset('css/goods.css')}}">
@endsection
   
@section('main')
    <div class="container">
        <h1>商品清單</h1>
        <a href="/product/create">新增商品</a>
        @foreach ($cookie as $product)
        <div class="product">
            <div class="img" style="background-image: url('{{$product->imgs[0]->image_path}}')"></div>
            <div class="text">
                <div class="name">{{$product->name}}</div>
                <div class="desc">
                    {{$product->desc}}
                </div>
                <div class="price">價格: {{$product->price}}元</div>
                <div class="qty">剩餘數量: {{$product->qty}}個</div>
            </div>
            <div class="manage">
                <a href="/product/edit/{{$product->id}}">編輯商品</a>
                <a href="/product/delete/{{$product->id}}">刪除商品</a>
            </div>
        </div>
        @endforeach
       
    </div>
@endsection
 