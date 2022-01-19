@extends('layouts.backstage-template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <style>
        .container .tab-list .promotion-tab {
            background-color: #f0f0f0;
            border-right: solid 1px gray;
            border-bottom: solid 1px gray;
        }
    </style>
@endsection

@section('main')
    <br>
    <div class="container">
        <div class="row tab-list">
            <div class="promotion-tab">
                <a href="/news">行銷訊息</a>
            </div>
            <div class="product-tab">
                <h3 class="mb-0">商品專區</h3>
            </div>
        </div>
        <div class="product-content row">
            <div class="col-6">
                <div class="discount d-flex flex-column my-4 ml-5 p-3">
                    <div class="d-flex flex-column my-1 mx-3">
                        <h4>折扣專區</h4>
                    </div>
                    <div class="discount-list p-2">
                        <div class="row d-flex border-top py-2">
                            <span class="col-2">編號</span>
                            <span class="col-3">公告日期</span>
                            <span class="col-5">產品名稱</span>
                            <a class="col-2" href="/product/discountcreate" title="新增折扣" style="color:gray"><i
                                    class="fas fa-plus-square"></i></a>
                        </div>
                        @foreach ($discount as $item)
                            <div class="row d-flex border-top py-2">
                                <span class="col-2">{{ $item->id }}</span>
                                <span class="col-3">{{ substr($item->created_at, 0, 10) }}</span>
                                <span class="col-5">{{ $item->name }}</span>
                                <div class="col-2">
                                    <a href="/product/discountedit/{{$item->id}}" title="修改折扣" style="color:gray"><i class="fas fa-edit"></i></a>
                                    <a href="/product/discountdelete/{{$item->id}}" title="刪除折扣" style="color:gray"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="latest d-flex flex-column my-4 ml-5 p-3">
                    <div class="d-flex flex-column my-1 mx-3">
                        <h4>最新商品</h4>
                    </div>
                    <div class="latest-list p-2">
                        <div class="row d-flex border-top py-2">
                            <span class="col-3">公告日期</span>
                            <span class="col-4">預覽圖</span>
                            <span class="col-3">產品名稱</span>
                            <a class="col-2" href="/product/latestcreate" title="新增最新" style="color:gray"><i
                                    class="fas fa-plus-square"></i></a>
                        </div>
                        @foreach ($latest as $item)
                            <div class="row d-flex border-top py-2">
                                <span class="col-3">{{ substr($item->created_at, 0, 10) }}</span>
                                <div class="col-4 img" style="background-image: url('{{@$item->imgs[0]->image_path}}');background-size: cover;height: 60px;"></div>
                                <span class="col-3">{{ $item->name }}</span>
                                <div class="col-2">
                                    <a href="/news/latestedit/{{$item->id}}" title="修改最新" style="color:gray"><i class="fas fa-edit"></i></a>
                                    <a href="/news/latestdelete/{{$item->id}}" title="刪除最新" style="color:gray"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="select d-flex flex-column my-4 mr-5 p-3">
                    <div class="d-flex flex-column my-1 mx-3">
                        <h4>精選商品</h4>
                    </div>
                    <div class="select-list p-2">
                        <div class="row d-flex border-top py-2">
                            <span class="col-2">編號</span>
                            <span class="col-3">公告日期</span>
                            <span class="col-5">產品名稱</span>
                            <a class="col-2" href="/product/selectcreate" title="新增精選" style="color:gray"><i
                                    class="fas fa-plus-square"></i></a>
                        </div>
                        @foreach ($select as $item)
                            <div class="row d-flex border-top py-2">
                                <span class="col-3">{{ substr($item->created_at, 0, 10) }}</span>
                                <div class="col-4 img" style="background-image: url('{{@$item->imgs[0]->image_path}}');background-size: cover;height: 60px;"></div>
                                <span class="col-3">{{ $item->name }}</span>
                                <div class="col-2">
                                    <a href="/news/selectedit/{{$item->id}}" title="修改精選" style="color:gray"><i class="fas fa-edit"></i></a>
                                    <a href="/news/selectdelete/{{$item->id}}" title="刪除精選" style="color:gray"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="custom d-flex flex-column my-4 mr-5 p-3">
                    <div class="d-flex flex-column my-1 mx-3">
                        <h4>客製專區</h4>
                    </div>
                    <div class="custom-list p-2">
                        <div class="row d-flex border-top py-2">
                            <span class="col-3">公告日期</span>
                            <span class="col-4">預覽圖</span>
                            <span class="col-3">產品名稱</span>
                            <a class="col-2" href="/product/customcreate" title="新增客製" style="color:gray"><i
                                    class="fas fa-plus-square"></i></a>
                        </div>
                        @foreach ($custom as $item)
                            <div class="row d-flex border-top py-2">
                                <span class="col-3">{{ substr($item->created_at, 0, 10) }}</span>
                                <div class="col-4 img" style="background-image: url('{{@$item->imgs[0]->image_path}}');background-size: cover;height: 60px;"></div>
                                <span class="col-3">{{ $item->name }}</span>
                                <div class="col-2">
                                    <a href="/news/customedit/{{$item->id}}" title="修改客製" style="color:gray"><i class="fas fa-edit"></i></a>
                                    <a href="/news/customdelete/{{$item->id}}" title="刪除客製" style="color:gray"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var checked = document.querySelector('#news');
        checked.classList.add('checked');
    </script>
    <script>
        var input = document.querySelector('#images');
        var uploaded = document.querySelector('#img-change');
        
        function imgupload(){
            var formdata = new FormData()
            formdata.append('_token', ' {{csrf_token()}}')
            for (let index = 0; index < input.files.length; index++) {
                console.log(input.files[index]);
                formdata.append('img[]', input.files[index])
            }

            fetch('/news/imgupload', {
                method: 'POST',
                body: formdata
            })
            .then(response => response.json())
            .then(response => {
                console.log('Success:', response[0])
                response.forEach(element => {
                    uploaded.innerHTML += `
                    <img id="img-change" src="${element}" alt="">
                    `
                });
            });
            window.location.reload()
        }
    </script>
@endsection
