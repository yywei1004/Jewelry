<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISHA 購物車</title>
    <!-- bootstrap core CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- font awsome CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- checkout1 css -->
    <link rel="stylesheet" href="./css/checkout.css">
</head>

<body>
    <main class="containers">
        <!-- !步驟流程 -->
        <div class="steps d-flex">
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




    <!-- bootstrap core jquery CDN-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <!-- bootstrap core popper CDN-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <!-- bootstrap core JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
</body>

</html>
