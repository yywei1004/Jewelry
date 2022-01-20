@extends('layouts.backstage-template')
@section('title','商品專區')
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
                                <span class="col-5 text-primary">{{ $item->name }}</span>
                                <div class="col-2">
                                    <a href="/product/edit/{{ $item->id }}" title="修改折扣" style="color:gray"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="/product/delete/{{ $item->id }}" title="刪除折扣" style="color:gray"><i
                                            class="fas fa-trash-alt"></i></a>
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
                        <div class="row">
                            <div class="col-4">
                                <img id="img-change2" src="{{ @$cover[1]->cover_path }}" alt="">
                                <label for="images2" title="修改最新商品封面" style="cursor: pointer"><i class="fas fa-edit"></i></label>
                                <input type="file" id="images2" onchange="imgupload2()" hidden>
                                <span>Banner尺寸: 1500x430px</span>
                            </div>
                            <div class="col-8">
                                <div class="row d-flex border-top py-2">
                                    <span class="col-2 px-2">編號</span>
                                    <span class="col-4 px-2">公告日期</span>
                                    <span class="col-4">產品名稱</span>
                                    <a class="col-2" href="/product/latestcreate" title="新增最新" style="color:gray"><i
                                            class="fas fa-plus-square"></i></a>
                                </div>
                                @foreach ($latest as $item)
                                    <div class="row d-flex border-top py-2">
                                        <span class="col-2">{{ $item->id }}</span>
                                        <span class="col-4 p-0">{{ substr($item->created_at, 0, 10) }}</span>
                                        <span class="col-4 text-primary">{{ $item->name }}</span>
                                        <div class="col-2 p-0">
                                            <a href="/product/edit/{{ $item->id }}" title="修改最新" style="color:gray"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="/product/delete/{{ $item->id }}" title="刪除最新" style="color:gray"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
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
                                <span class="col-2">{{ $item->id }}</span>
                                <span class="col-3">{{ substr($item->created_at, 0, 10) }}</span>
                                <span class="col-5 text-primary">{{ $item->name }}</span>
                                <div class="col-2 p-0">
                                    <a href="/product/edit/{{ $item->id }}" title="修改精選" style="color:gray"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="/product/delete/{{ $item->id }}" title="刪除精選" style="color:gray"><i
                                            class="fas fa-trash-alt"></i></a>
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
                        <div class="row">
                            <div class="col-4">
                                <img id="img-change3" src="{{ @$cover[2]->cover_path }}" alt="">
                                <label for="images3" title="修改客製專區封面" style="cursor: pointer"><i class="fas fa-edit"></i></label>
                                <input type="file" id="images3" onchange="imgupload3()" hidden>
                                <span>Banner尺寸: 705x730px</span>
                            </div>
                            <div class="col-8">
                                <div class="row d-flex border-top py-2">
                                    <span class="col-2 px-2">編號</span>
                                    <span class="col-4 px-2">公告日期</span>
                                    <span class="col-4">產品名稱</span>
                                    <a class="col-2" href="/product/customcreate" title="新增客製" style="color:gray"><i
                                            class="fas fa-plus-square"></i></a>
                                </div>
                                @foreach ($custom as $item)
                                    <div class="row d-flex border-top py-2">
                                        <span class="col-2">{{ $item->id }}</span>
                                        <span class="col-4 p-0">{{ substr($item->created_at, 0, 10) }}</span>
                                        <span class="col-4 text-primary">{{ $item->name }}</span>
                                        <div class="col-2 p-0">
                                            <a href="/product/edit/{{ $item->id }}" title="修改客製" style="color:gray"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="/product/delete/{{ $item->id }}" title="刪除客製" style="color:gray"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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
        var input2 = document.querySelector('#images2');
        var uploaded2 = document.querySelector('#img-change2');

        function imgupload2() {
            var formdata = new FormData()
            formdata.append('_token', ' {{ csrf_token() }}')
            for (let index = 0; index < input2.files.length; index++) {
                console.log(input2.files[index]);
                formdata.append('img[]', input2.files[index])
            }

            fetch('/product/imguploadcover2', {
                    method: 'POST',
                    body: formdata
                })
                .then(response => response.json())
                .then(response => {
                    console.log('Success:', response[0])
                    response.forEach(element => {
                        uploaded.innerHTML += `
                    <img id="img-change2" src="${element}" alt="">
                    `
                    });
                });
            // window.location.reload()
            setTimeout('window.location.reload()',500)
        }
    </script>
    <script>
        var input3 = document.querySelector('#images3');
        var uploaded3 = document.querySelector('#img-change3');

        function imgupload3() {
            var formdata = new FormData()
            formdata.append('_token', ' {{ csrf_token() }}')
            for (let index = 0; index < input3.files.length; index++) {
                console.log(input3.files[index]);
                formdata.append('img[]', input3.files[index])
            }

            fetch('/product/imguploadcover3', {
                    method: 'POST',
                    body: formdata
                })
                .then(response => response.json())
                .then(response => {
                    console.log('Success:', response[0])
                    response.forEach(element => {
                        uploaded.innerHTML += `
                    <img id="img-change3" src="${element}" alt="">
                    `
                    });
                });
            // window.location.reload()
            setTimeout('window.location.reload()',500)
        }
    </script>
@endsection
