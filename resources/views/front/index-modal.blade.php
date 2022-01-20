<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index-modal</title>
    <!-- bootstrap core CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- font awsome CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- index-modal css -->
    <link rel="stylesheet" href="./css/index-modal.css">
</head>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#shopping-show">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="shopping-show" tabindex="-1" role="dialog" aria-labelledby="shopping-cartsLable"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="product-img col-6 d-flex">
                                <img src="image/index-modal-商品圖-1.jpg" alt="">
                            </div>
                            <div class="product-info col-6 d-flex">
                                <div class="product-title">
                                    閃鑽開合小圈耳環 | 設計師精選
                                </div>
                                <div class="product-price d-flex">
                                    <span>NT$988</span>
                                    <span>NT$1,500</span>
                                </div>
                                <div class="product-qty d-flex">
                                    <label for="qty">數量 : </label>
                                    <div class="d-flex align-items-center" >
                                        <button type="button" class="order-reduce">-</button>
                                        <input class="order-input" type="number" name="qty" value="1">
                                        <button type="button" class="order-plus">+</button>
                                    </div>
                                </div>
                                <div class="product-button">
                                    <button type="button" class="btn">加入購物車</button>
                                    <button type="button" class="btn">立即購買</button>
                                </div>
                                <div class="product-storage">
                                    <span class="product-remain">目前庫存剩下 : 
                                    <span class="product-remaincount" >5</span>
                                    <span >件</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
    <!-- index-modal-qty JS -->
    <script src="./js/index-modal-qty.js"></script>
</body>

</html>