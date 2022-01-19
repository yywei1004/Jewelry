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
    <main>
        <div class="containers">
            <section>
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
                        <div>
                            我的購物車
                        </div>
                        <div class="">
                            (3件) 合計 : NT$5,678
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- *訂購清單 -->
                        <div>
                            <!-- *標題們 -->
                            <div>
                                <span class="order-items-info h4 ">訂單資料</span>
                            </div>
                        </div>
                        <hr>
                        <!-- *填寫資料 -->
                        <form action="" method="post" class="needs-validation" novalidate>
                            <div id="order-info">
                                <!-- *顧客資料-->
                                <div class="row mb-5">
                                    <div class="col-4">
                                        <div class="col-12">
                                            <label for="name">顧客姓名 :</label>
                                            <input type="text" class="form-control" id="name" name="name" value=""
                                                required>
                                        </div>
                                        <div class="col-12">
                                            <label for="email">Email :</label>
                                            <input type="email" placeholder="e-mail address" class="form-control" id="email" name="email" value=""
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="col-12">
                                            <label for="phone">手機 :</label>
                                            <input type="tel" placeholder="09xx-xxx-xxx" class="form-control" id="phone" name="phone" value=""
                                                required>
                                        </div>
                                        <div class="col-12">
                                            <label for="birthday">生日 :</label>
                                            <input type="date" placeholder="(YYY/MM/DD)" class="form-control" id="birthday" name="birthday" value=""
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="remark">訂單備註 :</label>
                                        <textarea  class="h-50 form-control" name="remark" id="remark" cols="30" rows="10"></textarea>
                                </div>
                                <!-- *送貨資料  -->
                                <div class="order-info-post">
                                    <label class="order-items-info my-1 mr-2" for="ship_way">送貨方式</label>
                                    <hr>
                                    <div class="form-check d-flex align-items-center mb-4">
                                        <input class="form-check-input" type="checkbox" value="" id="user_info">
                                        <label class="form-check-label" for="user_info">
                                            同顧客資料
                                        </label>
                                    </div>
                                    <div class="d-flex">
                                        <div class="d-flex flex-wrap w-50 mr-5">
                                            <label for="name">收件人名稱 :</label>
                                            <input type="text" placeholder="name" class="form-control mb-3" id="name" name="name" value="">
                                            <label for="phone">收件人手機 :</label>
                                            <input type="tel" placeholder="09xx-xxx-xxx" class="form-control" id="phone" name="phone" value="" >
                                        </div>
                                        <div class="">
                                            <div class="" >
                                                <label>選擇門市 :</label>
                                                <div class="serch-store">
                                                    <a href=""> 搜尋門市</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- *送出 -->
                            <div class="order-item-step">
                                <div class="order-item-step">
                                    <button type="submit"><a href="./checkout1.html" class=""><i
                                                class="fas fa-chevron-left"></i> 上一步</a></button>
                                    <button><a href="./checkout3.html" class="">下一步</a></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>




    <!-- bootstrap core jquery CDN-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <!-- bootstrap core popper CDN-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <!-- bootstrap core JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
        crossorigin="anonymous"></script>
    <!-- shopping-cart-input -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
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
</body>

</html>