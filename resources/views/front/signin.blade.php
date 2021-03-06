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
        <a class="logo" href="">
            <img src="{{asset('img/LOGO.svg
            ')}}" alt="">
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
                <form action="" class="col-8 form-input d-flex flex-column justify-content-between">
                    <div class="form-input-number d-flex flex-column ">
                        <div class="email-address d-flex align-items-center">
                            <label for="email" class="far fa-envelope" style="color: #ad7d47; ">
                            </label>
                            <input id="email" name="email" type="email" style="border: 0; 
                            outline: none; " placeholder="e-mail address">
                        </div>
                        <div class="password d-flex">
                            <label for="password" class="fas fa-lock" style="color: #AD7D47;"></label>
                            <input id="password" name="password" type="password" style="border: 0;  
                            outline: none; " placeholder="password">
                        </div>
                        <div class="remember-me d-flex align-items-center">
                            <input type="checkbox" style="color: #AD7D47;">
                            <div style="color: #BE976C;">Remember Me</div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center password-forget" >
                        <a class="h4" href="" style="color: #AD7D47;">忘記密碼?</a>
                        <button>登入</button>
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