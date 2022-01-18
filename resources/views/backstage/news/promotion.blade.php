@extends('layouts.backstage-template')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/promotion.css') }}">
@endsection

@section('main')
    <br>
    <div class="container">
        <div class="row tab-list">
            <div class="promotion-tab">
                <h3>行銷訊息</h3>
            </div>
            <div class="product-tab">
                <h3>商品專區</h3>
            </div>
        </div>
        <div class="promotion-content row">
            <div class="col-6">
                <form action="/news/themeupdate" class="cover mx-5 my-4" enctype="multipart/form-data" method="post">
                    <div class="d-flex my-1 mx-5 align-items-center">
                        <h4>主頁大圖</h4>
                        <h6 class="mx-3 my-0">圖片尺寸: 1920x825px</h6>
                    </div>
                    <div class="cover-img">
                        <img id="img-change" src="{{$cover[0]->cover_path}}" alt="">
                        <label for="images" title="修改封面" style="cursor: pointer"><i class="fas fa-edit"></i></label>
                        <input type="file" id="images" onchange="imgupload()" hidden>
                    </div>
                </form>
                <div class="news mx-5 my-4">
                    <div class="d-flex flex-column my-1 mx-3">
                        <h4 class="mt-3">最新消息</h4>
                    </div>
                    <div class="news-list p-3">
                        <div class="row d-flex border-top py-2">
                            <span class="col-2">編號</span>
                            <span class="col-3">公告日期</span>
                            <span class="col-5">標題</span>
                            <a class="col-2" href="/news/newscreate" title="新增消息" style="color:gray"><i
                                    class="fas fa-plus-square"></i></a>
                        </div>
                        @foreach ($news as $item)
                            <div class="row d-flex border-top py-2">
                                <span class="col-2">{{ $item->id }}</span>
                                <span class="col-3">{{ substr($item->created_at, 0, 10) }}</span>
                                <span class="col-5">{{ $item->title }}</span>
                                <div class="col-2">
                                    <a href="/news/newsedit/{{$item->id}}" title="修改消息" style="color:gray"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="/news/newsdelete/{{$item->id}}" title="刪除消息" style="color:gray"><i
                                            class="fas fa-trash-alt"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="theme d-flex flex-column my-4 mr-5 p-3">
                    <div class="d-flex flex-column my-1 mx-3">
                        <h4>系列主題</h4>
                    </div>
                    <div class="theme-list p-2">
                        <div class="row d-flex border-top py-2">
                            <span class="col-3">公告日期</span>
                            <span class="col-4">預覽圖</span>
                            <span class="col-3">標題</span>
                            <a class="col-2" href="/news/themecreate" title="新增主題" style="color:gray"><i
                                    class="fas fa-plus-square"></i></a>
                        </div>
                        @foreach ($theme as $item)
                            <div class="row d-flex border-top py-2">
                                <span class="col-3">{{ substr($item->created_at, 0, 10) }}</span>
                                <div class="col-4 img" style="background-image: url('{{@$item->imgs[0]->image_path}}');background-size: cover;height: 60px;"></div>
                                <span class="col-3">{{ $item->name }}</span>
                                <div class="col-2">
                                    <a href="/news/themeedit/{{$item->id}}" title="修改主題" style="color:gray"><i class="fas fa-edit"></i></a>
                                    <a href="/news/themedelete/{{$item->id}}" title="刪除主題" style="color:gray"><i class="fas fa-trash-alt"></i></a>
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
            // window.location.reload()
            window.location.reload()
        }
    </script>
@endsection
