@extends('layouts.backstage-template')

@section('css')
<link rel="stylesheet" href="{{asset('css/goods-create.css')}}">
    
@endsection
@section('main')
<div class="container">
    <form action="/product/update/{{$product->id}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <label for="name">商品名稱</label>
            <input type="text" id="name" name="name" value="{{$product->name}}">
        </div>
        <div class="row custom">
            <label for="desc">商品介紹</label>
            <textarea id="desc" name="desc">{{$product->desc}}</textarea>
        </div>
        <div class="row">
            <label for="images">商品圖片</label>
            <input type="file" id="images" multiple onchange="imgupload()">
        </div>
        <div id="uploaded-img">
            @foreach ($product->imgs as $img)
            <div class="img-card" >
                <div class="delete-img" onclick="imgdelete(this,'{{$img->image_path}}')">X</div>
                <img src="{{$img->image_path}}" alt="">
                <input type="text" value="{{$img->image_path}}" hidden>
            </div>
            @endforeach
           
            
        </div>
        <div class="row">
            <label for="price">商品價格</label>
            <input type="number" id="price" name="price" value="{{$product->price}}">
        </div>
        <div class="row">
            <label for="qty">庫存數量</label>
            <input type="number" id="qty" name="qty" value="{{$product->qty}}">
        </div>
        
       
        <div class="row btn">
            <a href="/product">取消</a>
            <button type="submit">編輯商品</button>
        </div>
    </form>
</div>
@endsection

@section('js')

    <script>
        var input = document.querySelector('#images');
        var uploaded = document.querySelector('#uploaded-img');

        
        function imgupload(){
            var formdata = new FormData()
            formdata.append('_token', ' {{csrf_token()}}')
            for (let index = 0; index < input.files.length; index++) {
                console.log(input.files[index]);
                formdata.append('img[]', input.files[index])
            }

            fetch('/product/imgUpload', {
                method: 'POST',
                body: formdata
            })
            .then(response => response.json())
            .then(response => {
                console.log('Success:', response[0])
                response.forEach(element => {
                    uploaded.innerHTML += `
                    <div class="img-card">
                        <div class="delete-img" onclick="imgdelete(this, '${element}')">X</div>
                        <img src="${element}" alt="">
                        <input type="text" name="img[]" value="${element}" hidden>
                    </div>

                    `
                });
            });

        }

        function imgdelete(element, path){
            var choice = confirm('確定要刪除圖片嗎(此操作為不可逆)');
            if (choice){
                var formdata = new FormData()
                formdata.append('_token', ' {{csrf_token()}}')
                formdata.append('path', path)
                fetch('/product/imgDelete', {
                    method: 'POST',
                    body: formdata
                })
                element.parentElement.remove()
            }
            
        }
    </script>
@endsection
   