@extends('layouts.front-template')
@section('title', 'ISHA 購物車')
@section('css')
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
                <div class="progress position-absolute" style="height: 13px; background-color: #FEA8A3;">
                    <div class="progress-bar" role="progressbar" style="width: 50%; background-color: #FEA8A3;"
                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="step d-flex flex-column align-items-center position-relative">
                <div class="progress-step rounded-circle mb-2" style="background-color: #FEA8A3;">
                    2
                </div>
                <span class="progress-step-text">填寫資料</span>
                <div class="progress position-absolute" style="height: 13px; background-color: #FEA8A3;">
                </div>
            </div>
            <div class="step d-flex flex-column align-items-center position-relative">
                <div class="progress-step rounded-circle mb-2" style="background-color: #FEA8A3;">
                    3
                </div>
                <span class="progress-step-text">訂單確認</span>
            </div>
        </div>
        <!-- !購物車內容_訂單確認 -->
        <div class="card">
            <div class="card-header">我的購物車</div>
            <!-- *訂購清單 -->
            <div class="card-body">
                <!-- *標題 -->
                <div class="d-flex flex-wrap justify-content-between">
                    <div>
                        <span class="order-items-info h4 ">訂單資料</span>
                    </div>
                    <div class="order-items-number">
                        <span class="h4">單件價格</span>
                        <span class="h4 ">數量</span>
                        <span class="h4">小計</span>
                    </div>
                </div>
                <hr>
                <!-- *商品內容 -->
                <div class="order-lists">
                    @foreach ($order_detail as $item)
                        <div class="order-list py-5">
                            <div class="order-item-info">
                                <img class="order-info-img" src="{{ $item->product->imgs[0]->image_path }}" alt="">
                                <div class="h4 order-list-name">{{ $item->product->name }}</div>
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
                                        <span>X</span>
                                        <span>{{ $item->qty }}</span>
                                    </div>
                                    <!-- *商品單價 -->
                                    <div class="order-item-total ">
                                        <span class="order-price-fake sr-only">10.5</span>
                                        <span class="order-price">$
                                            <span>{{ $item->product->price * $item->qty }}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- *寄送資料 -->
                <div class="d-flex justify-content-between">
                    <div class="order-item-fee order-item-post">
                        <span class="post-info my-4">寄送資料</span>
                        <div class="hr2"></div>
                        <div>
                            <span class="mb-4">
                                收件人姓名 :
                            </span>
                            <span>{{ Auth::user()->name }}</span>
                        </div>
                        <div>
                            <span class="mb-4">收件人手機:
                            </span>
                            <span>{{ $order->phone }}</span>
                        </div>
                        <div>
                            <span class="mb-4">收件位址 :</span>
                            <span>{{ $order->address }}</span>
                        </div>

                    </div>
                    <!-- !訂單總計 -->
                    <div class="order-item-count">
                        <span class="my-4">
                            訂單資訊
                        </span>
                        <div class="hr2"></div>
                        <div class="order-qty">
                            <span>數量:</span>
                            <span class="qty">{{ $qty_total }}</span>
                        </div>
                        <div class="order-subtotal">
                            <span>小計:</span>
                            <span class="subtotal">{{ $subtotal }}</span>
                        </div>
                        <div class="order-fee">
                            <span>運費:</span>
                            <span class="fee">{{ $shipfee }}</span>
                        </div>
                        <div class="order-total">
                            <span>總計:</span>
                            <span class="total">{{ $total }}</span>
                        </div>
                    </div>
                </div>
                <br>
                <!-- *送出 -->
                <div class="order-item-step">
                    <button type="button"><a href="./checkout2.html" class="fas fa-chevron-left"> 上一步</a></button>
                    <button type="button"><a href="/trade/{{ $order->id }}" class="">金流結帳</a></button>
                </div>
            </div>
        </div>
    </main>
@endsection
