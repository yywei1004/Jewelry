<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- font awesome CSS CDN-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- CSS -->
    <link rel="stylesheet" href="./css/sign.css">

</head>

<body>
    <div class="containers">
        <a class="logo" href="/index">
            <img src="{{asset('img/LOGO.svg')}}" alt="">
        </a>
        <div class="form-block">
            <div class="form-inside-block row ">
                <div class="form-choose col-4 d-flex flex-column justify-content-between">
                    <a class="signin" href="/login" style="color: rgba(173, 125, 71, 0.4);">
                        <span>SignIn</span>
                        <span>登入</span>        
                    </a>
                    <a class="signup" href="/register" style="color: #ad7d47;">
                        <span>SignUp</span>
                        <span>註冊</span>    
                    </a>
                </div>
                <!-- * 登入form -->
                <form action="{{ route('register') }}" method="POST" class="col-8 form-input d-flex flex-column justify-content-between">
                    @csrf
                    <div class="form-input-number d-flex flex-column ">
                        <div class="name d-flex align-items-center">
                            <label for="name" class="fas fa-user-circle" style="color: #ad7d47; ">
                            </label>
                            <input id="name" name="name" type="text" style="border: 0; 
                            outline: none; " placeholder="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="email-address d-flex">
                            <label for="email" class="far fa-envelope" style="color: #ad7d47; ">
                            </label>
                            <input id="email" name="email" type="email" style="border: 0; 
                            outline: none; " placeholder="e-mail address" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="password d-flex ">
                            <label for="password" class="fas fa-lock" style="color: #AD7D47;"></label>
                            <input id="password" name="password" type="password" style="border: 0;  
                            outline: none; " placeholder="password" class="form-control @error('password') is-invalid @enderror"
                            required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="password d-flex ">
                            <label for="password-confirm" class="far fa-lock" style="color: #AD7D47;"></label>
                            <input id="password-confirm" name="password_confirmation" type="password" style="border: 0;  
                            outline: none; " placeholder="password-confirm" class="form-control"
                            required autocomplete="new-password">
                            
                        </div>
                        <div class="birthday d-flex ">
                            <label for="birthday" class="fas fa-birthday-cake" style="color: #AD7D47;"></label>
                            <input id="birthday" name="birthday" type="date" class="birthday-input" style="border: 0;  
                            outline: none;" class="form-control @error('birthday') is-invalid @enderror"
                            value="{{ old('birthday') }}" required autocomplete="birthday">
                            @error('birthday')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-end align-items-center password-forget" >
                        <button type="submit" class="btn btn-primary">
                            {{ __('立即加入') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!-- bootstrap js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
        crossorigin="anonymous"></script>
</body>

</html>