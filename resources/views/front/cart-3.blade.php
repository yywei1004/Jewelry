<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/cart-3.css')}}">
    <title>index</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-light bg-light ">
            <div class="container d-flex justify-content-between">
                <a class="icon" href="">
                    <img class="" src="https://lesson-bootstrap.dev-hub.io/img/logo.svg">
                </a>
                <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNAV" class="navbar-toggler"
                    aria-controls="navbarNAV" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNAV">
                    <ul class="navbar-nav d-flex align-items-center">
                        <li class="nav-item ">
                            <a class="nav-link active" href="#">Blog</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" href="#">Portfolio</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" href="#">About</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" href="#">Contact</a>
                        </li>
                        <li class="nav-item  d-flex">
                            <a class="nav-link active px-2" href="#"><i class="fas fa-shopping-cart fa-2x"></i></a>
                            <a class="nav-link active px-2" href="#"><i class="fas fa-user-circle fa-2x "></i></a>
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
                <div class="steps border-bottom d-flex  w-100 pb-4">
                    <div
                        class="step w-25 d-flex flex-column align-items-center justify-content-center  position-relative">
                        <div class="progress position-absolute col-6 col-sm-7 col-lg-9">
                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="circle  d-flex align-items-center justify-content-center rounded-circle actived">
                            1
                        </div>
                        <span>確認購物車</span>

                    </div>
                    <div
                        class="step  w-25 d-flex flex-column align-items-center justify-content-center position-relative">
                        <div class="progress position-absolute col-6 col-sm-7 col-lg-9">
                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="circle  d-flex align-items-center justify-content-center rounded-circle actived">
                            2
                        </div>
                        <span>付款與運送方式</span>

                    </div>
                    <div
                        class="step  w-25 d-flex flex-column align-items-center justify-content-center position-relative">
                        <div class="progress position-absolute col-6 col-sm-7 col-lg-9">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="circle  d-flex align-items-center justify-content-center rounded-circle actived">
                            3
                        </div>
                        <span>填寫資料</span>

                    </div>
                    <div class="step  w-25 d-flex flex-column align-items-center justify-content-center">

                        <div class="circle  d-flex align-items-center justify-content-center rounded-circle">
                            4
                        </div>
                        <span>完成訂購</span>
                    </div>
                </div>
            </section>
            <form action="/store" method="post">
                @csrf
                <section>
                    <div class="items d-flex flex-wrap flex-column">
                        <h3>寄送資料</h3>
                        <div class="name d-flex flex-wrap">
                            <label for="username">姓名</label>
                            <input type="text" class="w-100 px-3 py-2" name="username" id="username" placeholder="王小明">
                        </div>
                        <div class="phone d-flex flex-wrap">
                            <label for="phone">電話</label>
                            <input type="text" class="w-100 px-3 py-2" name="phone" id="phone" placeholder="0912345678">
                        </div>
                        <div class="email d-flex flex-wrap">
                            <label for="email">Email</label>
                            <input type="email" class="w-100 px-3 py-2" name="email" id="email" placeholder="abc123@gmail.com">
                        </div>
                        <div class="email d-flex flex-wrap mb-4 pb-5 border-bottom">
                            <label for="address" class="w-100 ">地址</label>
                            <input type="text" class="w-100 px-3 py-2" name="address" id="address" placeholder="地址">
                        </div>
                    </div>
                </section>
                <section>
                    <div class="buttons  mt-4 d-flex justify-content-between">
                        <a href="cart-2.html"><button type="button" class="btn btn-outline-primary">上一步</button></a>
                        <button type="submit" class="btn btn-primary">前往付款</button>
                    </div>
                </section>
            </form>
        </div>
    </section>
    <footer>
        <div class="container d-flex py-5  mb-5 flex-wrap">
            <div
                class="left-block mb-3 mb-md-0 d-flex flex-column align-items-center align-items-md-start justify-content-md-center mb-5 col-12 col-md-4 col-lg-4 text-center text-md-start">
                <a class="text-decoration-none fs-3 mb-3" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: #162446;
                                }

                                .cls-2 {
                                    fill: #fff;
                                }
                            </style>
                        </defs>
                        <title>資產 2</title>
                        <g id="圖層_2" data-name="圖層 2">
                            <g id="圖層_1-2" data-name="圖層 1">
                                <circle class="cls-1" cx="20" cy="20" r="20"></circle>
                                <path class="cls-2"
                                    d="M20,7l7.13,4.11a7.91,7.91,0,0,1,3.95,6.84v6.8l-8.61-5V18.32l7.37,4.26V18.63a7.89,7.89,0,0,0-3.95-6.85L21.28,9.1V33.25L9,26.14V13.35l5.89,3.4a7.91,7.91,0,0,1,3.95,6.85v4.76l-1.23-.71V24.31a7.92,7.92,0,0,0-4-6.85l-3.42-2v9.94L20,31.11Z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <span class="text-dark">數位方塊</span>
                </a>
                <p>Air plant banjo lyft occupy retro adaptogen indego</p>
            </div>
            <div
                class="right-block d-flex  flex-wrap align-items-center justify-content-center col-12 col-md-8  col-lg-8 ">
                <ul class="list-group col-12 mb-3 col-md-6 col-lg-3 align-items-center">CATEGORIES
                    <li class="list-group-item border-0 ps-0"><a href="" class="text-decoration-none text-dark">First
                            Link</a>
                    </li>
                    <li class="list-group-item border-0 ps-0"><a href="" class="text-decoration-none text-dark">Second
                            Link</a>
                    </li>
                    <li class="list-group-item border-0 ps-0"><a href="" class="text-decoration-none text-dark">Third
                            Link</a>
                    </li>
                    <li class="list-group-item border-0 ps-0"><a href="" class="text-decoration-none text-dark">Fourth
                            Link</a>
                    </li>
                </ul>
                <ul class="list-group col-12 mb-3 col-md-6 col-lg-3 align-items-center">CATEGORIES
                    <li class="list-group-item border-0 ps-0"><a href="" class="text-decoration-none text-dark">First
                            Link</a>
                    </li>
                    <li class="list-group-item border-0 ps-0"><a href="" class="text-decoration-none text-dark">Second
                            Link</a>
                    </li>
                    <li class="list-group-item border-0 ps-0"><a href="" class="text-decoration-none text-dark">Third
                            Link</a>
                    </li>
                    <li class="list-group-item border-0 ps-0"><a href="" class="text-decoration-none text-dark">Fourth
                            Link</a>
                    </li>
                </ul>
                <ul class="list-group col-12 mb-3 col-md-6 col-lg-3 align-items-center">CATEGORIES
                    <li class="list-group-item border-0 ps-0"><a href="" class="text-decoration-none text-dark">First
                            Link</a>
                    </li>
                    <li class="list-group-item border-0 ps-0"><a href="" class="text-decoration-none text-dark">Second
                            Link</a>
                    </li>
                    <li class="list-group-item border-0 ps-0"><a href="" class="text-decoration-none text-dark">Third
                            Link</a>
                    </li>
                    <li class="list-group-item border-0 ps-0"><a href="" class="text-decoration-none text-dark">Fourth
                            Link</a>
                    </li>
                </ul>
                <ul class="list-group col-12  mb-3 col-md-6 col-lg-3 align-items-center">CATEGORIES
                    <li class="list-group-item border-0 ps-0"><a href="" class="text-decoration-none text-dark">First
                            Link</a>
                    </li>
                    <li class="list-group-item border-0 ps-0"><a href="" class="text-decoration-none text-dark">Second
                            Link</a>
                    </li>
                    <li class="list-group-item border-0 ps-0"><a href="" class="text-decoration-none text-dark">Third
                            Link</a>
                    </li>
                    <li class="list-group-item border-0 ps-0"><a href="" class="text-decoration-none text-dark">Fourth
                            Link</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="full d-flex bg-light">
            <div class="container">
                <div class="under-footer d-flex  w-100 m-3 flex-column  flex-sm-row align-items-center">
                    <p class="m-0">© 2020 Tailblocks —<a href="" class="text-decoration-none text-dark"> @knyttneve</a>
                    </p>
                    <div class="svg-block ms-sm-auto ">
                        <a href="" class="text-decoration-none text-dark">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                            </svg>
                        </a>
                        <a href="" class="text-decoration-none text-dark  ms-2"> <svg fill="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                viewBox="0 0 24 24">
                                <path
                                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                </path>
                            </svg>
                        </a>
                        <a href="" class="text-decoration-none text-dark ms-2"> <svg fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                viewBox="0 0 24 24">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                            </svg>
                        </a>
                        <a href="" class="text-decoration-none text-dark ms-2"> <svg fill="currentColor"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0"
                                class="w-5 h-5" viewBox="0 0 24 24">
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
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>!-->
</body>

</html>