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
                </div>
            </div>
            <div class="step d-flex flex-column align-items-center position-relative">
                <div class="progress-step rounded-circle mb-2" style="background-color: #FEA8A3;">
                    2
                </div>
                <span class="progress-step-text">填寫資料</span>
                <div class="progress position-absolute" style="height: 13px; background-color: #EAE8E8;">
                    <div class="progress-bar" role="progressbar" style="width: 50%; background-color: #FEA8A3;"
                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="step d-flex flex-column align-items-center position-relative">
                <div class="progress-step rounded-circle mb-2" style="background-color: #EAE8E8;">
                    3
                </div>
                <span class="progress-step-text">訂單確認</span>
            </div>
        </div>
        <!-- !購物車內容_填寫資料 -->
        <div class="card">
            <div class="card-header d-flex">
                <div>我的購物車</div>
                <div class="">
                    ({{ $qty_total }}件) 合計 : NT${{ $total }}
                </div>
            </div>
            <!-- *訂購清單 -->
            <div class="card-body">
                <div>
                    <!-- *標題 -->
                    <span class="order-items-info h4 ">訂單資料</span>
                </div>
                <hr>
                <!-- *填寫資料 -->
                <form action="/shopping03" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div id="order-info">
                        <!-- *顧客資料-->
                        <div class="row mb-5">
                            <div class="col-4">
                                <div class="col-12">
                                    <label for="name">顧客姓名 :</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ Auth::user()->name }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="email">Email :</label>
                                    <input type="email" placeholder="e-mail address" class="form-control" id="email"
                                        name="email" value="{{ Auth::user()->email }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="col-12">
                                    <label for="phone">手機 :</label>
                                    <input type="tel" placeholder="09xx-xxx-xxx" class="form-control" id="phone"
                                        name="phone" value="{{ Auth::user()->phone }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="birthday">生日 :</label>
                                    <input type="date" placeholder="(YYY/MM/DD)" class="form-control" id="birthday"
                                        name="birthday" value="2002-02-02" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="remark">訂單備註 :</label>
                                <textarea class="h-50 form-control" name="remark" id="remark" cols="30"
                                    rows="10"></textarea>
                            </div>
                            <!-- *送貨資料  -->
                            <div class="order-info-post">
                                <label class="order-items-info my-1 mr-2" for="ship_way">送貨資料</label>
                                <hr>
                                <div class="form-check d-flex align-items-center mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="user_info">
                                    <label class="form-check-label" for="user_info">
                                        同顧客資料
                                    </label>
                                </div>
                                <div class="recipient-group d-flex">
                                    <div class="recipient-content mr-5 d-flex flex-wrap">
                                        <label for="name">收件人名稱 :</label>
                                        <input type="text" placeholder="name" class="form-control mb-3" id="name"
                                            name="name" value="{{ Auth::user()->name }}">
                                        <label for="phone">收件人手機 :</label>
                                        <input type="tel" placeholder="09xx-xxx-xxx" class="form-control" id="phone"
                                            name="phone" value="{{ Auth::user()->phone }}">
                                    </div>
                                    <div class="">
                                        <label>選擇門市 :</label>
                                        <div class="serch-store">
                                            <a href=""> 搜尋門市</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- *送出 -->
                        <div class="order-item-step">
                            <div class="order-item-step">
                                <button>
                                    <a href="./checkout1.html" class="fas fa-chevron-left"> 上一步</a>
                                </button>
                                <button type="submit">送出訂單</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <!-- shopping-cart-input -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
