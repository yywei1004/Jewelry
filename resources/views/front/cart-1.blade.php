<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/cart-1.css')}}">
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
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="100"
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
                            <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="circle  d-flex align-items-center justify-content-center rounded-circle ">
                            2
                        </div>
                        <span>付款與運送方式</span>

                    </div>
                    <div
                        class="step  w-25 d-flex flex-column align-items-center justify-content-center position-relative">
                        <div class="progress position-absolute col-6 col-sm-7 col-lg-9">
                            <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="circle  d-flex align-items-center justify-content-center rounded-circle ">
                            3
                        </div>
                        <span>填寫資料</span>

                    </div>
                    <div class="step  w-25 d-flex flex-column align-items-center justify-content-center">

                        <div class="circle  d-flex align-items-center justify-content-center rounded-circle ">
                            4
                        </div>
                        <span>完成訂購</span>
                    </div>
                </div>
            </section>
            <form action="/shopping02" method="POST">
                @csrf
                <section>
                    <div class="items d-flex flex-wrap mt-3">
                        <h3>訂單明細</h3>
                        @foreach ($shoppingcart as $item)
                        <div class="item d-flex w-100 border-bottom mt-3 pb-3">
                            <img class="me-3 rounded-circle" src="{{$item->product->imgs[0]->image_path}}" alt="">
                            <div class="item-name d-flex flex-column">
                                <span>{{$item->product->name}}</span>
                                <span>{{$item->product->desc}}</span>
                            </div>
                            <div class="item-total d-flex ms-auto">
                                <div class="count">
                                    <span class="mi" onclick="mi({{$item->id}})">-</span>
                                    <input type="number" id="product_id{{$item->id}}" name="product_id[]" value="{{$item->product->id}}" hidden>

                                    <input type="number" id="qty{{$item->id}}" name="qty[]" value="{{$item->qty}}" class="mx-1 input">
                                    <input type="number" id="price{{$item->id}}" name="price[]" value="{{$item->price}}" hidden >
                                    <input type="number" id="total{{$item->id}}" name="total[]" value="{{$item->qty * $item->price}}"  hidden>

                                    <span class="pl" onclick="pl({{$item->id}})">+</span>
                                    <span class="cost ms-3" id="show{{$item->id}}">小計: {{$item->qty * $item->price}}</span>

                                </div>
                            </div>
                            <div class="delete-btn" onclick="deletetocart({{$item->id}})">X</div>
                        </div>
                        @endforeach
                    </div>
                </section>
                <section>
                    <div class="unify d-flex flex-column align-items-end pt-3 pb-3 border-bottom w-100">
                        <div class="number w-25 d-flex justify-content-between mb-2">
                            <label for="">數量:</label>
                            <span class="total-count">{{count($shoppingcart)}}</span>
                        </div>
                        <div class="subtotal  w-25 d-flex justify-content-between mb-2">
                            <label for="">商品總計:</label>
                            <span class="total-sum"></span>
                        </div>

                    </div>
                    <div class="buttons  mt-5 d-flex justify-content-between">
                        <a href="index.html" class="d-flex align-items-center text-dark text-decoration-none"><i
                                class="fas fa-arrow-left me-2"></i>返回購物</a>
                        <button type="submit" class="btn btn-primary">下一步</button>
                    </div>
                </section>
            </form>
        </div>
    </section>
    <footer>

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
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        function mi(id){
            if (parseInt(document.querySelector('#qty'+id).value) > 1){
                document.querySelector('#qty'+id).value = parseInt(document.querySelector('#qty'+id).value) - 1
                document.querySelector('#total'+id).value = parseInt(document.querySelector('#qty'+id).value) * document.querySelector('#price'+id).value
                document.querySelector('#show'+id).innerHTML = '小計:' +  document.querySelector('#total'+id).value

            }
        }
        function pl(id){
            document.querySelector('#qty'+id).value = parseInt(document.querySelector('#qty'+id).value) + 1
            document.querySelector('#total'+id).value = parseInt(document.querySelector('#qty'+id).value) * document.querySelector('#price'+id).value
                document.querySelector('#show'+id).innerHTML = '小計:' +  document.querySelector('#total'+id).value
        }
        
      
    
       
    </script>

    <script>
        function deletetocart(shoppingcart_id){
            console.log(shoppingcart_id);
            var formdata = new FormData()
            formdata.append('_token', ' {{csrf_token()}}')
            formdata.append('shoppingcart_id', shoppingcart_id)

            fetch('/deletetocart', {
                method: 'POST',
                body: formdata
            })
            .then(response => response.text())
            .then(text => {
                alert(text)
                location.reload()
            });

        }
    </script>

</body>

</html>