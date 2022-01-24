@extends('layouts.front-template')
@section('title', 'ISHA 購物車')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- checkout1 css -->
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endsection
@section('main')
    <main class="containers">
        <!-- !步驟流程 -->
        <div class="steps d-flex" style="margin-top: 114px">
            <div class="step d-flex flex-column align-items-center position-relative">
                <!-- 流程號碼 -->
                <div class=" progress-step rounded-circle mb-2" style="background-color: #FEA8A3;">
                    1
                </div>
                <!-- 流程字 -->
                <span class="progress-step-text">確認購物車</span>
                <!-- 流程條 -->
                <div class="progress position-absolute" style="height: 13px; background-color: #EAE8E8;">
                    <div class="progress-bar" role="progressbar" style="width: 50%; background-color: #FEA8A3;"
                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="step d-flex flex-column align-items-center position-relative">
                <div class="progress-step rounded-circle mb-2" style="background-color: #EAE8E8;">
                    2
                </div>
                <span class="progress-step-text">填寫資料</span>
                <div class="progress position-absolute" style="height: 13px; background-color: #EAE8E8;">
                </div>
            </div>
            <div class="step d-flex flex-column align-items-center position-relative">
                <div class=" progress-step rounded-circle mb-2" style="background-color: #EAE8E8;">
                    3
                </div>
                <span class="progress-step-text">訂單確認</span>
            </div>
        </div>
        <!-- !購物車內容_確認購物車 -->
        <div class="card">
            <div class="card-header">
                我的購物車
            </div>
            <form action="/shopping02" method="POST">
                @csrf
                <!-- *訂購清單 -->
                <div class="card-body">
                    <!-- *標題們 -->
                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="order-items-info h4">訂單資料</div>
                        <div class="order-items-number">
                            <span class="h4">單件價格</span>
                            <span class="h4 ">數量</span>
                            <span class="h4">小計</span>
                        </div>
                    </div>
                    <hr>
                    <!-- *商品內容 -->
                    <div class="order-lists">
                        @foreach ($shoppingcart as $item)
                            <div class="order-list py-5">
                                <div class="order-item-info">
                                    <img class="order-info-img" src="{{ $item->product->imgs[0]->image_path }}"
                                        alt="">
                                    <div class="order-list-name">{{ $item->product->name }}</div>
                                </div>
                                <div class="order-item-number">
                                    <!-- *商品價格 -->
                                    <div class="ml-2 order-item-price">
                                        <span>NT$
                                            <span>{{ $item->price }}</span>
                                        </span>
                                        <span>NT$
                                            <span>{{ $item->product->original_price }}</span>
                                        </span>
                                    </div>
                                    <div class="qtytotal-group d-flex">
                                        <!-- *商品數量 -->
                                        <div class="order-item-qty">
                                            <button type="button" class="order-reduce"
                                                data-id="{{ $item->id }}">-</button>
                                            <input class="order-input" type="number" id="qty{{ $item->id }}"
                                                name="qty[]" value="{{ $item->qty }}">
                                            <input type="number" id="product_id{{ $item->id }}" name="product_id[]"
                                                value="{{ $item->product->id }}" hidden>
                                            <input type="number" id="price{{ $item->id }}" name="price[]"
                                                value="{{ $item->price }}" hidden>
                                            <button type="button" class="order-plus">+</button>
                                        </div>
                                        <div class="order-item-total ">
                                            <span class="order-price-fake sr-only">{{ $item->price }}</span>
                                            <span class="order-price">$
                                                <span>{{ $item->price }}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- *送貨方式-->
                    <div class="d-flex justify-content-between">
                        <div class="order-item-fee">
                            <label class="my-1 mr-2" for="ship_way">送貨方式 :</label>
                            <div class="hr2"></div>
                            <select class="custom-select my-2 mr-sm-2" id="ship_way" name="ship_way"
                                onclick="changefee(this)">
                                <option value="1" selected>711 取貨不付款 (刷卡)</option>
                                <option value="2">711 貨到付款</option>
                                <option value="3">全家 取貨不付款 (刷卡)</option>
                                <option value="4">全家 貨到付款 </option>
                                <option value="5">郵局 </option>
                                <option value="6">黑貓宅急便 </option>
                            </select>
                        </div>
                        <!-- *訂單總計 -->
                        <div class="order-item-count">
                            <span class="my-4">
                                訂單資訊
                            </span>
                            <div class="hr2"></div>
                            <div class="order-qty">
                                <span>數量:</span>
                                <span class="qty">3</span>
                            </div>
                            <div class="order-subtotal">
                                <span>小計:</span>
                                <span class="subtotal"></span>
                            </div>
                            <div class="order-fee">
                                <span>運費:</span>
                                <span class="fee"></span>
                            </div>
                            <div class="order-total">
                                <span>總計:</span>
                                <span class="total"></span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- *送出 -->
                    <div class="order-item-step">
                        <button>
                            <a href="./index.html" class="fas fa-chevron-left"> 返回購物</a>
                        </button>
                        <button type="submit">下一步</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
@section('js')
    <!-- 數量 js -->
    <script src="{{ asset('js/checkout.js') }}"></script>
    <script>
        function changefee(value) {
            let subtotalElement = document.querySelector('.subtotal')
            let shipway = value.options[value.selectedIndex].value;
            subtotal = parseInt(subtotalElement.innerHTML.substring(1, 99));
            console.log(subtotal);
            if (subtotal >= 1000) {
                document.querySelector('.fee').innerHTML = "$0"
            } else {
                if (shipway <= 5) {
                    document.querySelector('.fee').innerHTML = "$60"
                    document.querySelector('.total').innerHTML = "$" + (parseInt(document.querySelector('.subtotal')
                        .innerHTML.substring(1, 99)) + 60)
                } else {
                    document.querySelector('.fee').innerHTML = "$100"
                    document.querySelector('.total').innerHTML = "$" + (parseInt(document.querySelector('.subtotal')
                        .innerHTML.substring(1, 99)) + 100)
                }
            }
        }
    </script>
@endsection
