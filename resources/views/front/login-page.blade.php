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
    <link rel="stylesheet" href="./css/login-page.css">
</head>

<body>
    <main class="containers">

        <div class="container-title d-flex justify-content-between">
            <div class="container-title-left">歡迎回來!</div>
            <a class="container-title-right">登出</a>
        </div>
        <div class="form-table">
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
                            <input id="" class="form-item-input" type="text" placeholder="name">
                        </div>
                        <div class="form-item d-flex justify-content-between">
                            <label class="form-item-name" for="">Email:</label>
                            <input class="form-item-input" type="text" placeholder="e-mail address">
                        </div>
                        <div class="form-item d-flex justify-content-between">
                            <label class="form-item-name" for="">手機:</label>
                            <input class="form-item-input" type="number" placeholder="09xx-xxx-xxx">
                        </div>
                        <div class="form-item d-flex flex-row-reverse">
                            <button class="form-item-btn ">寄送驗證碼</button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-item d-flex justify-content-between">
                            <label class="form-item-name" for="">生日:</label>
                            <input class="form-item-input" placeholder="YYYY/MM/DD" onfocus="(this.type='text')">
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