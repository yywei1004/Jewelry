@extends('layouts.front-template')
@section('title', 'ISHA 會員登入')
@section('css')
    <!-- checkout1 css -->
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
@endsection
@section('main')
    <div class="containers">
        <a class="logo" href="">
            <img src="./image/LOGO.svg" alt="">
        </a>
        <div class="form-block">
            <div class="form-inside-block row ">
                <div class="form-choose col-4 d-flex flex-column justify-content-between">
                    <a class="signin" href="./signin.html" style="color: #ad7d47;">
                        <span>SignIn</span>
                        <span>登入</span>        
                    </a>
                    <a class="signup" href="./signup.html" style="color: rgba(173, 125, 71, 0.4);">
                        <span>SignUp</span>
                        <span>註冊</span>    
                    </a>
                </div>
                <!-- * 登入form -->
                <form action="{{ route('login') }}" method="POST" class="col-8 form-input d-flex flex-column justify-content-between">
                    @csrf
                    <div class="form-input-number d-flex flex-column ">
                        <div class="email-address d-flex align-items-center">
                            <label for="email" class="far fa-envelope" style="color: #ad7d47; ">
                            </label>
                            <input id="email" name="email" type="email" style="border: 0; 
                            outline: none; " placeholder="e-mail address" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="password d-flex align-items-center">
                            <label for="password" class="fas fa-lock" style="color: #AD7D47;"></label>
                            <input id="password" name="password" type="password" style="border: 0;  
                            outline: none; " placeholder="password"class="form-control @error('password') is-invalid @enderror"
                            required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="remember-me d-flex align-items-center">
                            <input type="checkbox" style="color: #AD7D47;"
                                name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember" style="color: #BE976C;
                                font-size: 20px; margin-left: 15px">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center password-forget" >
                        @if (Route::has('password.request'))
                                    <a class="btn btn-link h4" href="{{ route('password.request') }}" style="color: #AD7D47;">
                                        {{ __('忘記密碼?') }}
                                    </a>
                                @endif
                        <button type="submit">
                            {{ __('登入') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
