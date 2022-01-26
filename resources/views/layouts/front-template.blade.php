<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title','ISHA')</title>
    <!-- Bootstrap Core CSS CDN  -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
      crossorigin="anonymous"
    />
    <!-- Font Awesome Core CSS CDN -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- Swiper Core CSS CDN -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />
    <!-- navbar -->
    <link rel="stylesheet" href="./css/index.css" />
    @yield('css')
  </head>
  <body>
    <!-- navbar -->
    <header class="header">
      <div class="navigation">
        <input type="checkbox" class="toggle-menu" />
        <div class="hamburger"></div>
        
        <ul class="menu">
          <div class="logo-hidden">
            <a href="">
              <img src="./img/LOGO.svg" alt="" />
            </a>
          </div>
          <li><a href="">系列主題</a></li>
          <li><a href="">商品專區</a></li>
          <li><a href="">最新消息</a></li>
          <li><a class="hidden" href="">關於我們</a></li>
          <li><a class="hidden" href="">飾品Q&A</a></li>
          <li><a class="hidden" href="">聯絡我們</a></li>
          <div class="social-icon">
            <a href=""><i class="fas fa-phone-alt"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-line"></i></a>
            <a href=""><i class="fab fa-facebook-f"></i></a>
          </div>
        </ul>
      </div>
      <div class="logo">
        <a href="/index">
          <img src="./img/LOGO.svg" alt="" />
        </a>
      </div>
      <div class="navigation">
        <ul class="menu">
          <li><a href="">關於我們</a></li>
          <li><a href="">飾品Q&A</a></li>
          <li><a href="">聯絡我們</a></li>
        </ul>
      </div>
      <div class="icon">
        <div class="icon-item"><a href=""><i class="fas fa-search"></i></a></div>
        <div class="icon-item"><a href="/shopping01"><i class="fas fa-shopping-cart"></i></a></div>
        @guest
          <div class="icon-item">
            <a href="{{ route('login') }}"><i class="fas fa-user-circle"></i></a>
          </div>
        @else
          <div class="icon-item">
            <a href="/loginpage"><i class="fas fa-user-circle"></i></a>
          </div>
          {{-- <div class="icon-item"><a href="{{ route('logout') }}" title="登出"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fas fa-user-circle"></i></a>
          </div>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form> --}}
        @endguest
      </div>
    </header>
    <main>
      @yield('main')
    </main>
    <footer class="pt-5">
      <div class="container-1">
        <div class="row">
          <div class="col-8">
            <div class="row">
              <div class="col">
                <img src="./img/LOGO.svg" alt="">
              </div>
            </div>
            <div class="row">
              <div class="col-2 pr-0">
                <h3>關於我們</h3>
                <p>/ 品牌故事</p>
                <p>/ 門市位置</p>
              </div>
              <div class="col-9 pl-4">
                <h3>聯絡我們</h3>
                <p>電話 / 03-9517295</p>
                <p>客服時間 / 週一 ~ 週五 10:30 - 12:30、14:00 - 18:00</p>
                <p>客服信箱 / customer-service@nuwarocks.com.tw</p>
                <p>地址 / 宜蘭縣冬山鄉三星路一段158號(工作室恕不對外開放)</p>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="row">
              <div class="col">
                <h3 class="form-title">意見回饋</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-3 pr-0 text-right form-name">
                <p>姓名 /</p>
                <p>電話 /</p>
                <p>信箱 /</p>
                <p>描述 /</p>
              </div>
              <div class="col-9">
                <form action="/feedbackstore" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <!-- <label for="name">姓名</label> -->
                    <input type="text" class="form-control" id="name" name="name" required>
                  </div>
                  <div class="form-group">
                    <!-- <label for="phone">電話</label> -->
                    <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{10}" required>
                  </div>
                  <div class="form-group">
                    <!-- <label for="Email">信箱</label> -->
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                  </div>
                  <div class="form-group">
                    <!-- <label for="desc">描述</label> -->
                    <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
                  </div>               
                  <button class="form-btn" type="submit" >
                    <div class="fas fa-envelope-open-text"></div>
                    <span class="ml-2">送出</span>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>       
      </div>
      <div class="container-fluid mt-5">
        <div class="copyright d-flex justify-content-center">
          © 2022 | Debug company | 隱私權聲明與 Cookie 政策
        </div> 
      </div>
    </footer>
    <!-- jQuery Core JS CDN -->
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <!-- Popper Core JS CDN -->
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <!-- Bootstrap Core JS CDN -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
      integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
      crossorigin="anonymous"
    ></script>
    <!-- Swiper Core JS CDN -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script src="./js/swiper.js"></script>
    <!-- Initialize Swiper-Parallax
    <script src="./js/swiper-parallax.js"></script> -->
    @yield('js')
  </body>
</html>
