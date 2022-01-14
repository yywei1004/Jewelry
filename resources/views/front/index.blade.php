<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">
    <title>index</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-light bg-light ">
            <div class="container-lg d-flex justify-content-between">
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
                            <a class="nav-link active px-2" href="/shopping01"><i class="fas fa-shopping-cart fa-2x"></i></a>
                            <a class="nav-link active px-2" href="#"><i class="fas fa-user-circle fa-2x "></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    {{-- BANNER區塊 --}}
    <section>
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="https://exfast.me/wp-content/uploads/2019/04/1554182762-cddf42691119d44059a16a4095047a33-1140x600.jpg"
                        class="d-block w-100" alt="...">

                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://exfast.me/wp-content/uploads/2019/04/1554182762-cddf42691119d44059a16a4095047a33-1140x600.jpg"
                        class="d-block w-100" alt="...">

                </div>
                <div class="carousel-item">
                    <img src="https://exfast.me/wp-content/uploads/2019/04/1554182762-cddf42691119d44059a16a4095047a33-1140x600.jpg"
                        class="d-block w-100" alt="...">

                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    {{-- 最新消息區塊 --}}
    <section> 
        <div class="container-lg d-flex flex-column justify-content-center align-items-center py-5 my-5">
            <div class="cards-r3 w-75 ">
                @foreach ($news as $item)
                <div class="card  d-flex flex-row justify-content-center align-items-center mx-2  mb-5 py-4">
                    <div class="icon-b rounded-circle d-flex align-items-center justify-content-center  color-a mb-3  me-3">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div class="card-r d-flex flex-column">
                        <p>{{$item->title}}</p>
                        <span class="mb-2">{{$item->text}}</span>
                    </div>
                </div>
                @endforeach
        
               
            </div>
        </div>
    </section>
    {{-- 商品區塊 --}}

    <section>
        <div class="container-lg d-flex flex-wrap mb-5">
            @foreach ($product as $item)
            <div class="card col-12 col-md-6 col-lg-3 p-2 border-0">
                <img class="mb-3" src="{{$item->imgs[0]->image_path}}" alt="" style="height:300px;">
                <h1 class="fs-4">{{$item->name}}</h1>
                <h2 class="fs-6">{{$item->desc}}</h2>
                <span>價格: {{$item->price}}</span>
                <span>剩餘數量: {{$item->qty}}</span>
                <button onclick="addtocart({{$item->id}})">加入購物車</button>
            </div>
            @endforeach
        </div>
    </section>
    <footer>
        <div class="full d-flex bg-light">
            <div class="container-lg">
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
    <script>
        function addtocart(product_id){
            var formdata = new FormData()
            formdata.append('_token', ' {{csrf_token()}}')
            formdata.append('product_id', product_id)

            fetch('/addtocart', {
                method: 'POST',
                body: formdata
            })
            .then(response => response.text())
            .then(text => {
                alert(text)
            });
        }

    </script>
</body>

</html>