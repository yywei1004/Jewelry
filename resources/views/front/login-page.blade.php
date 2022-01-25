@extends('layouts.front-template')
@section('title', 'ISHA 會員')
@section('css')
    <!-- checkout1 css -->
    <link rel="stylesheet" href="{{ asset('css/login-page.css') }}">
@endsection
@section('main')
    <main class="containers py-5">
        <div class="container-title d-flex justify-content-between mx-auto" style="margin-top: 114px">
            <div class="container-title-left">歡迎回來!</div>
            <a class="container-title-right" href="{{ route('logout') }}" title="登出"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">登出</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>    
        </div>
        <div class="form-table mx-auto">
            <div class="form-title d-flex justify-content-between">
                <div class="form-title-all form-title-left">訂購紀錄</div>
                <div class="form-title-all form-title-right">個人資料</div>
            </div>
            <form class="form-main" action="">
                <div class="form-name">
                    <i class="fas fa-pen"></i>
                    編輯會員資料
                </div>

                <div class="row form-items justify-content-between">
                    <div class="col-6">
                        <div class="form-item d-flex justify-content-between">
                            <label class="form-item-name" for="">姓名:</label>
                            <input id="" class="form-item-input" type="text" placeholder="name" value="{{Auth::user()->name}}">
                        </div>
                        <div class="form-item d-flex justify-content-between">
                            <label class="form-item-name" for="">Email:</label>
                            <input class="form-item-input" type="text" placeholder="e-mail address" value="{{Auth::user()->email}}">
                        </div>
                        <div class="form-item d-flex justify-content-between">
                            <label class="form-item-name" for="">手機:</label>
                            <input class="form-item-input" type="number" placeholder="09xx-xxx-xxx" value="{{Auth::user()->phone}}">
                        </div>
                        <div class="form-item d-flex flex-row-reverse">
                            <button class="form-item-btn ">寄送驗證碼</button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-item d-flex justify-content-between">
                            <label class="form-item-name" for="">生日:</label>
                            <input class="form-item-input" placeholder="YYYY/MM/DD" onfocus="(this.type='text')" value="{{Auth::user()->birthday}}">
                        </div>
                        <div class="form-item d-flex justify-content-between">
                            <label class="form-item-name" for="">地址:</label>
                            <textarea class="form-item-input" name="" id="" cols="30" rows="16"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-bottom">
                    <!-- <button class="btn btn-primary" type="submit">Button</button> -->
                    <button class="form-bottom-cancle">取消</button>
                    <button class="form-bottom-savechange">儲存變更</button>
                </div>
            </form>
        </div>
    </main>
@endsection
