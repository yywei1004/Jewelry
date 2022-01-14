<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/cart-4.css')}}" />
    <title>index</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container d-flex justify-content-between">
                <a class="icon" href="">
                    <img class="" src="https://lesson-bootstrap.dev-hub.io/img/logo.svg" />
                </a>
                <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNAV" class="navbar-toggler"
                    aria-controls="navbarNAV" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNAV">
                    <ul class="navbar-nav d-flex align-items-center">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Contact</a>
                        </li>
                        <li class="nav-item d-flex">
                            <a class="nav-link active px-2" href="#"><i class="fas fa-shopping-cart fa-2x"></i></a>
                            <a class="nav-link active px-2" href="#"><i class="fas fa-user-circle fa-2x"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="pt-5 pb-5 background">
        <div class="container main p-5 border-bottom rounded">
            <section>
                <h4>購物車</h4>
                <div class="steps border-bottom d-flex w-100 pb-4">
                    <div class="
                step
                w-25
                d-flex
                flex-column
                align-items-center
                justify-content-center
                position-relative
              ">
                        <div class="progress position-absolute col-6 col-sm-7 col-lg-9">
                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="
                  circle
                  d-flex
                  align-items-center
                  justify-content-center
                  rounded-circle
                  actived
                ">
                            1
                        </div>
                        <span>確認購物車</span>
                    </div>
                    <div class="
                step
                w-25
                d-flex
                flex-column
                align-items-center
                justify-content-center
                position-relative
              ">
                        <div class="progress position-absolute col-6 col-sm-7 col-lg-9">
                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="
                  circle
                  d-flex
                  align-items-center
                  justify-content-center
                  rounded-circle
                  actived
                ">
                            2
                        </div>
                        <span>付款與運送方式</span>
                    </div>
                    <div class="
                step
                w-25
                d-flex
                flex-column
                align-items-center
                justify-content-center
                position-relative
              ">
                        <div class="progress position-absolute col-6 col-sm-7 col-lg-9">
                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="
                  circle
                  d-flex
                  align-items-center
                  justify-content-center
                  rounded-circle
                  actived
                ">
                            3
                        </div>
                        <span>填寫資料</span>
                    </div>
                    <div class="
                step
                w-25
                d-flex
                flex-column
                align-items-center
                justify-content-center
              ">
                        <div class="
                  circle
                  d-flex
                  align-items-center
                  justify-content-center
                  rounded-circle
                  actived
                ">
                            4
                        </div>
                        <span>完成訂購</span>
                    </div>
                </div>
            </section>
            <section>
                <h2 class="w-100 text-center mt-3">訂單成立</h2>
                <div class="items d-flex flex-wrap">
                    <h3>訂單明細</h3>
                    
                    @foreach ($order->order_detail as $item)
                    <div class="item d-flex w-100 border-bottom mt-3 pb-3">
                        <img class="me-3 rounded-circle" src="{{$item->product->imgs[0]->image_path}}" />
                        <div class="item-name d-flex flex-column">
                            <span>{{$item->product->name}}</span>
                            <span>{{$item->product->desc}}</span>
                        </div>
                        <div class="item-total d-flex ms-auto">
                            <div class="count">x{{$item->qty}}</div>
                            <div class="cost ms-3">{{$item->price * $item->qty}}</div>
                        </div>
                    </div>
                    @endforeach
                    

                </div>
            </section>
            <section>
                <h4>寄送資料</h4>
                <div class="material d-flex flex-wrap border-bottom">
                    <div class="name d-flex w-100 mb-4 mt-3">
                        <label class="me-4" for="">姓名</label>
                        <div>{{$order->user->name}}</div>
                    </div>
                    <div class="phone d-flex w-100 mb-4 mt-3">
                        <label for="" class="me-4">電話</label>
                        <div>{{$order->phone}}</div>
                    </div>
                    <div class="email d-flex w-100 mb-4 mt-3">
                        <label for="" class="me-4">Email</label>
                        <div>{{$order->user->email}}</div>
                    </div>
                    <div class="address d-flex w-100 mb-4 mt-3">
                        <label for="" class="me-4">地址</label>
                        <div>{{$order->address}}</div>
                    </div>
                </div>
            </section>
            <section class="d-flex flex-column align-items-end">
                <div class="
              unify
              d-flex
              flex-column
              align-items-end
              pt-3
              pb-3
              border-bottom
              w-100
            ">
                    <div class="count w-25 d-flex justify-content-between mb-2">
                        <label for="">數量:</label>
                        <span>{{count($order->order_detail)}}</span>
                    </div>
                    <div class="subtotal w-25 d-flex justify-content-between mb-2">
                        <label for="">小計:</label>
                        <span>{{$order->total_price - $order->shipping_fee}}</span>
                    </div>
                    <div class="freight w-25 d-flex justify-content-between mb-2">
                        <label for="">運費:</label>
                        <span>{{$order->shipping_fee}}</span>
                    </div>
                    <div class="total w-25 d-flex justify-content-between">
                        <label for="">總計:</label>
                        <span>{{$order->total_price}}</span>
                    </div>
                </div>
                <a href="index.html">
                    <button type="button" class="btn btn-primary mt-5">返回首頁</button>
                </a>
                <a href="/trade/{{$order->id}}">
                    <button type="button" class="btn btn-primary mt-5">金流結帳</button>
                </a>
                
            </section>
        </div>
    </section>
    <footer>
     
        <div class="full d-flex bg-light">
            <div class="container">
                <div class="
              under-footer
              d-flex
              w-100
              m-3
              flex-column flex-sm-row
              align-items-center
            ">
                    <p class="m-0">
                        © 2020 Tailblocks —<a href="" class="text-decoration-none text-dark">
                            @knyttneve</a>
                    </p>
                    <div class="svg-block ms-sm-auto">
                        <a href="" class="text-decoration-none text-dark">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                            </svg>
                        </a>
                        <a href="" class="text-decoration-none text-dark ms-2">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                </path>
                            </svg>
                        </a>
                        <a href="" class="text-decoration-none text-dark ms-2">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                            </svg>
                        </a>
                        <a href="" class="text-decoration-none text-dark ms-2">
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                                <path stroke="none"
                                    d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                                </path>
                                <circle cx="4" cy="4" r="2" stroke="none"></circle>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>