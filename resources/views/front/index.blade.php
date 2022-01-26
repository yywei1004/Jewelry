@extends('layouts.front-template')
@section('title', 'ISHA_獨特，因妳而存在')
@section('css')
    <!-- index-modal css -->
    <link rel="stylesheet" href="./css/index-modal.css">
@endsection
@section('main')
    <!-- parallax區塊 -->
    <section id="parallax">
        <div class="banner" style="background-image: url({{ @$cover[0]->cover_path }});">
            {{-- <div class="caption">
                <h2>獨/特</h2>
                <h2>因妳而在此誕生</h2>
            </div> --}}
        </div>
    </section>
    <!-- NEWS區塊 -->
    <section id="news">
        <div class="container-1">
            <div class="deco-line">
                <img src="./img/裝飾/Banner引導線.png" alt="">
            </div>
            <h1 class="d-flex justify-content-center">News</h1>
            @foreach ($news as $item)
                <div class="col">
                    <ul class="news-update">
                        {{-- <li class="news-number mr-3">{{ $item->id }}</li> --}}
                        <li class="news-date mx-5">{{ substr($item->created_at, 0, 10) }}</li>
                        <li class="news-title w-70">
                            {{ $item->title }}
                        </li>
                        <li class="news-msg ml-auto">{{ $item->text }}</li>
                    </ul>
                </div>
                <hr />
            @endforeach
        </div>
    </section>
    <!-- 系列主題 -->
    <section id="theme">
        <div class="container-fluid">
            <h1 class="d-flex justify-content-center">系列主題</h1>
            <!-- 卡片輪播 -->
            <div class="swiper" id="product-swiper">
                <div class="swiper-wrapper">
                    @foreach ($theme as $item)
                        <div class="swiper-slide">
                            <div class="card border-0">
                                <img src="{{ @$item->imgs[0]->image_path }}" class="card-img-top w-100" alt="..." />
                                <div class="card-body">
                                    <h2 class="card-title">{{ $item->name }}</h2>
                                    <p class="card-text">
                                        {{ $item->desc }}
                                    </p>
                                    <a href="#" class="card-link">Read more <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <!-- <div class="swiper-button-prev"></div>
                                                <div class="swiper-button-next"></div> -->
            </div>
        </div>
    </section>
    <!-- 商品專區 -->
    <section id="merch">
        <h1 class="d-flex justify-content-center">商品專區</h1>
        <!-- scrollspy -->
        <div class="container-1">
            <!-- 折扣專區 -->
            <div class="discount">
                <h2><span>折扣專區</span></h2>
                <div class="card-deck">
                    <div class="row">
                        @foreach ($discount as $item)
                            <div class="col-4">
                                <div class="card border-0">
                                    <img src="{{ @$item->imgs[0]->image_path }}" class="card-img-top w-100" alt="..." />
                                    <div class="add-cart" data-toggle="modal"
                                        data-target="#shopping-show{{ $item->id }}">加入購物車</div>
                                    <div class="card-body">
                                        <p class="card-title">{{ $item->name }}</p>
                                        <div class="card-text">
                                            <p class="price-delete">NT${{ $item->original_price }}</p>
                                            <p class="price-discount">NT${{ $item->price }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="shopping-show{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="shopping-cartsLable" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close id{{ $item->id }}" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="product-img col-6 d-flex">
                                                        <img src="{{ @$item->imgs[0]->image_path }}" alt="">
                                                    </div>
                                                    <div class="product-info col-6 d-flex">
                                                        <div class="product-title">
                                                            {{ $item->name }}
                                                        </div>
                                                        <div class="product-price d-flex">
                                                            <span>NT${{ $item->price }}</span>
                                                            <span>NT${{ $item->original_price }}</span>
                                                        </div>
                                                        <div class="product-qty d-flex">
                                                            <label for="qty">數量 : </label>
                                                            <div class="d-flex align-items-center">
                                                                <button type="button" class="order-reduce">-</button>
                                                                <input class="order-input" type="number" name="qty"
                                                                    value="1" id="input{{ $item->id }}">
                                                                <button type="button" class="order-plus">+</button>
                                                            </div>
                                                        </div>
                                                        <div class="product-button">
                                                            <button type="button" class="btn"
                                                                onclick="addtocart({{ $item->id }})">加入購物車</button>
                                                            <button type="button" class="btn">立即購買</button>
                                                        </div>
                                                        <div class="product-storage">
                                                            <span class="product-remain">目前庫存剩下 :
                                                                <span
                                                                    class="product-remaincount">{{ $item->qty }}</span>
                                                                <span>件</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="container-2">
            <!-- 最新商品 -->
            <div class="latest">
                <h2><span>最新商品</span></h2>
                <div class="row">
                    <div class="col-12">
                        <img class="fullscr" src="{{ @$cover[1]->cover_path }}" alt="">
                    </div>
                </div>
                <div class="row">
                    @foreach ($latest as $item)
                        <div class="col-3">
                            <div class="card border-0">
                                <img src="{{ @$item->imgs[0]->image_path }}" class="card-img-top w-100" alt="..." />
                                <div class="card-body">
                                    <p class="card-title new">{{ $item->name }}</p>
                                    <div class="card-text">
                                        <p class="price-delete">NT${{ $item->original_price }}</p>
                                        <p class="price-discount">NT${{ $item->price }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container-1">
            <!-- 精選商品 -->
            <div class="selection">
                <h2><span>精選商品</span></h2>
                <div class="card-deck">
                    <div class="row">
                        @foreach ($select as $item)
                            <div class="col-4">
                                <div class="card border-0">
                                    <img src="{{ @$item->imgs[0]->image_path }}" class="card-img-top w-100" alt="..." />
                                    <div class="add-cart" data-toggle="modal"
                                        data-target="#shopping-show{{ $item->id }}">加入購物車</div>
                                    <div class="card-body">
                                        <p class="card-title">{{ $item->name }}</p>
                                        <div class="card-text">
                                            <p class="price-delete">NT${{ $item->original_price }}</p>
                                            <p class="price-discount">NT${{ $item->price }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="shopping-show{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="shopping-cartsLable" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close id{{ $item->id }}" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="product-img col-6 d-flex">
                                                        <img src="{{ @$item->imgs[0]->image_path }}" alt="">
                                                    </div>
                                                    <div class="product-info col-6 d-flex">
                                                        <div class="product-title">
                                                            {{ $item->name }}
                                                        </div>
                                                        <div class="product-price d-flex">
                                                            <span>NT${{ $item->price }}</span>
                                                            <span>NT${{ $item->original_price }}</span>
                                                        </div>
                                                        <div class="product-qty d-flex">
                                                            <label for="qty">數量 : </label>
                                                            <div class="d-flex align-items-center">
                                                                <button type="button" class="order-reduce">-</button>
                                                                <input class="order-input" type="number" name="qty"
                                                                    value="1" id="input{{ $item->id }}">
                                                                <button type="button" class="order-plus">+</button>
                                                            </div>
                                                        </div>
                                                        <div class="product-button">
                                                            <button type="button" class="btn"
                                                                onclick="addtocart({{ $item->id }})">加入購物車</button>
                                                            <button type="button" class="btn">立即購買</button>
                                                        </div>
                                                        <div class="product-storage">
                                                            <span class="product-remain">目前庫存剩下 :
                                                                <span
                                                                    class="product-remaincount">{{ $item->qty }}</span>
                                                                <span>件</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="container-2">
            <!-- 客製專區 -->
            <div class="custom">
                <h2><span>客製專區</span></h2>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col">
                                <div class="card border-0">
                                    <img src="{{ @$cover[2]->cover_path }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            @foreach ($custom as $item)
                                <div class="col-6">
                                    <div class="card border-0">
                                        <img src="{{ @$item->imgs[0]->image_path }}" class="card-img-top w-100"
                                            alt="..." />
                                        <div class="card-body">
                                            <p class="card-title new">{{ $item->name }}</p>
                                            <div class="card-text">
                                                <p class="price-delete">NT${{ $item->original_price }}</p>
                                                <p class="price-discount">NT${{ $item->price }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 品牌門市 -->
    <section id="brand-store">
        <div class="container-3">
            <div class="brand-story d-flex">
                <div class="story-text">
                    <h1>品牌故事</h1>
                    <h3>"ISHA"，古希伯來文中『女性』的意思，"ISHA"代表的是美麗、柔和與獨一無二的創造。</h3>
                    <h3>而象形文字中的『女』，則象徵「獨特生命的孕育」「Isha Jewelry純銀輕珠寶」就是這樣一個為了襯托每一位女性獨特之美而誕生的品牌。</h3>
                </div>
                <img class="portrait" src="./img/關於我們/品牌故事.jpg" alt="">
            </div>
            <div class="store-location d-flex">
                <img class="store-scene" src="./img/關於我們/門市據點-1.jpg" alt="">
                <div class="store-text">
                    <div class="store-h1">門市據點</div>
                    <ul>
                        <li>京站B1 飾空間</li>
                        <li>信義誠品 風尚空間：信義誠品4樓</li>
                        <li>桃統誠品 優雅空間：桃園誠品B1誠品</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- 飾品Q&A -->
    <section id="QNA">
        <div class="container-4">
            <h1 class="py-5 mb-5 d-flex justify-content-center">飾品Q&A</h1>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-6 mb-4">
                            <div class="card border-0">
                                <img src="./img/飾品Q_A/Q_A-1.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="card-2 border-0">
                                <h3>如何保養銀飾品</h3>
                                <span>避免接觸以下環境溫泉/汗水/游泳</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card-2 border-0">
                                <h3>如何保養銀飾品</h3>
                                <span>避免接觸以下環境溫泉/汗水/游泳</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card border-0">
                                <img src="./img/飾品Q_A/Q_A-2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-6 mb-4">
                            <div class="card border-0">
                                <img src="./img/飾品Q_A/Q_A-3.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="card-2  border-0">
                                <h3>如何保養銀飾品</h3>
                                <span>避免接觸以下環境溫泉/汗水/游泳</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card-2  border-0">
                                <h3>如何保養銀飾品</h3>
                                <span>避免接觸以下環境溫泉/汗水/游泳</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card border-0">
                                <img src="./img/飾品Q_A/Q_A-4.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact my-5 d-flex justify-content-end">
                <a href=""><i class="fas fa-phone-alt"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-line"></i></a>
                <a href=""><i class="fab fa-facebook-f"></i></a>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <!-- index-modal-qty JS -->
    <script src="./js/index-modal-qty.js"></script>

    <script>
        function addtocart(product_id) {
            var num = document.querySelector('#input' + product_id + '').value;
            var orderInputs = document.querySelectorAll('.order-input');
            @if (Auth::check())
                var formdata = new FormData()
                formdata.append('_token', ' {{ csrf_token() }}')
                formdata.append('product_id', product_id)
                formdata.append('num', num)
            
                fetch('/addtocart', {
                method: 'POST',
                body: formdata
                })
                .then(response => response.text())
                .then(text => {
                alert(text)
                });
                orderInputs.forEach(orderInput => {
                orderInput.value = 1;
                });
                document.querySelector('.id'+product_id+'').click();
            @else
                document.location.href="/login";
            @endif
        }

        @if (Session::has('msg'))
            alert('{{ Session::get('msg') }}');
        @endif
    </script>
@endsection
