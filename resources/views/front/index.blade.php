<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
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
        <a href="">
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
        <div class="icon-item"><a href=""><i class="fas fa-user-circle"></i></a></div>
      </div>
    </header>  
    <main>
      <!-- parallax區塊 -->
      <section id="parallax">
        <div class="banner" style="background-image: url({{ @$cover[0]->cover_path }});">
          <div class="caption">
            <h2>獨/特</h2>
            <h2>因妳而在此誕生</h2>
          </div>
        </div>
      </section>
      <!-- NEWS區塊 -->
      <section id="news" class="mb-5">
        <div class="container">
          <div class="deco-line">
            <img src="./img/裝飾/Banner引導線.png" alt="">
          </div>
          <h1 class="py-5 d-flex justify-content-center">News</h1>
          @foreach ($news as $item)
            <div class="col">
              <ul class="news-update">
                <li class="news-number mr-3">{{$item->id}}</li>
                <li class="news-title w-70">
                  {{$item->title}}
                </li>
                <li class="news-msg ml-auto">{{$item->text}}</li>
                <li class="news-date ml-3">{{substr($item->created_at,0,10)}}</li>
              </ul>
            </div>
            <hr />
          @endforeach
        </div>
      </section>
      <!-- 系列主題 -->
      <section id="theme" class="py-5 mb-5">
        <div class="container-fluid">
          <h1 class="py-5 my-5 d-flex justify-content-center">系列主題</h1>
          <!-- 卡片輪播 -->
          <div class="swiper" id="product-swiper">
            <div class="swiper-wrapper">
              @foreach ($theme as $item)
                <div class="swiper-slide">
                  <div class="card border-0">
                    <img
                      src="{{ @$item->imgs[0]->image_path }}"
                      class="card-img-top w-100"
                      alt="..."
                    />
                    <div class="card-body">
                      <h2 class="card-title">{{$item->name}}</h2>
                      <p class="card-text">
                        {{$item->desc}}
                      </p>
                      <a href="#" class="card-link"
                        >Read more <i class="fas fa-chevron-right"></i
                      ></a>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <!-- <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div> -->
          </div>
        </div>
      </section>
      <!-- 商品專區 -->
      <section id="merch" class="py-5 my-5">
        <div class="container">
          <h1 class="py-5 mt-5 d-flex justify-content-center">商品專區</h1>
          <!-- scrollspy -->
          <!-- 折扣專區 -->
          <div class="discount">
            <h2 class="py-5 mt-5"><span>折扣專區</span></h2>
            <div class="card-deck">
              <div class="row">
                @foreach ($discount as $item)
                  <div class="col-4">
                    <div class="card border-0">
                      <img
                        src="{{ @$item->imgs[0]->image_path }}"
                        class="card-img-top w-100"
                        alt="..."
                      />
                      <div class="add-cart" onclick="addtocart({{$item->id}})">加入購物車</div>
                      <div class="card-body">
                        <p class="card-title">{{$item->name}}</p>
                        <div class="card-text">
                          <p class="price-delete">NT${{$item->original_price}}</p>
                          <p class="price-discount">NT${{$item->price}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <!-- 最新商品 -->
          <div class="latest">
            <h2 class="py-5 mt-5"><span>最新商品</span></h2>
            <div class="row">
              <div class="col-12">
                <img class="fullscr" src="{{ @$cover[1]->cover_path }}" alt="">
              </div>
            </div>
            <div class="row">
              @foreach ($latest as $item)
                <div class="col-3">
                  <div class="card border-0">
                    <img
                      src="{{ @$item->imgs[0]->image_path }}"
                      class="card-img-top w-100"
                      alt="..."
                    />
                    <div class="card-body">
                      <p class="card-title new">{{$item->name}}</p>
                      <div class="card-text">
                        <p class="price-delete">NT${{$item->original_price}}</p>
                        <p class="price-discount">NT${{$item->price}}</p>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <!-- 精選商品 -->
          <div class="selection">
            <h2 class="py-5 mt-5"><span>精選商品</span></h2>
            <div class="card-deck">
              <div class="row">
                @foreach ($select as $item)
                  <div class="col-4">
                    <div class="card border-0">
                      <img
                        src="{{ @$item->imgs[0]->image_path }}"
                        class="card-img-top w-100"
                        alt="..."
                      />
                      <div class="add-cart" onclick="addtocart({{$item->id}})">加入購物車</div>
                      <div class="card-body">
                        <p class="card-title">{{$item->name}}</p>
                        <div class="card-text">
                          <p class="price-delete">NT${{$item->original_price}}</p>
                          <p class="price-discount">NT${{$item->price}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <!-- 客製專區 -->
          <div class="custom">
            <h2 class="py-5 mt-5"><span>客製專區</span></h2>
            <div class="row">
              <div class="col-6">
                <div class="row">
                  <div class="col">
                    <div class="card border-0">
                      <img src="{{ @$cover[2]->cover_path }}" alt="">
                    </div>
                  </div>                
                </div>                
              </div>
              <div class="col-6">
                <div class="row">
                  @foreach ($custom as $item)
                    <div class="col-6">
                      <div class="card border-0">
                        <img
                          src="{{ @$item->imgs[0]->image_path }}"
                          class="card-img-top w-100"
                          alt="..."
                        />
                        <div class="card-body">
                          <p class="card-title new">{{$item->name}}</p>
                          <div class="card-text">
                            <p class="price-delete">NT${{$item->original_price}}</p>
                            <p class="price-discount">NT${{$item->price}}</p>
                          </div>
                        </div>
                      </div>                    
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
      </section>
      <!-- 品牌門市 -->
      <section id="brand-store" class="py-5 mb-5">
        <div class="container">
            <div class="brand-story d-flex">              
              <div class="story-text">
                <h1>品牌故事</h1>
                <h3>"ISHA"，古希伯來文中『女性』的意思，"ISHA"代表的是美麗、柔和與獨一無二的創造。</h3>
                <h3>而象形文字中的『女』，則象徵「獨特生命的孕育」「Isha Jewelry純銀輕珠寶」就是這樣一個為了襯托每一位女性獨特之美而誕生的品牌。</h3>
              </div>
              <img class="portrait" src="./img/關於我們/品牌故事.jpg" alt="">
            </div>                      
            <div class="store-location d-flex">
              <img class="store-scene" src="./img/關於我們/門市據點-1.jpg" alt="">
              <div class="store-text">
                <h1 class="store-h1">門市據點</h1>
                <ul>
                  <li>京站B1 飾空間</li>
                  <li>信義誠品 風尚空間：信義誠品4樓</li>
                  <li>桃統誠品 優雅空間：桃園誠品B1誠品</li>
                </ul>
              </div>
            </div>                  
        </div>
      </section>
      <!-- 飾品Q&A -->
      <section id="QNA" class="py-5">
        <div class="container">
          <h1 class="py-5 mb-5 d-flex justify-content-center">飾品Q&A</h1>
          <div class="row">
            <div class="col-6">
              <div class="row">
                <div class="col-6 mb-4">
                  <div class="card border-0">
                    <img src="./img/飾品Q_A/Q_A-1.jpg" alt="">
                  </div>              
                </div>
                <div class="col-6 mb-4">
                  <div class="card border-0">                  
                    <img src="./img/飾品Q_A/Q_A-PK.jpg" alt="">                              
                  </div>
                </div>
                <div class="col-6">
                  <div class="card border-0">
                    <img src="./img/飾品Q_A/Q_A-PK.jpg" alt="">    
                  </div> 
                </div>
                <div class="col-6">
                  <div class="card border-0">
                    <img src="./img/飾品Q_A/Q_A-2.jpg" alt="">
                  </div> 
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-6 mb-4">
                  <div class="card border-0">
                    <img src="./img/飾品Q_A/Q_A-3.jpg" alt="">
                  </div> 
                </div>
                <div class="col-6 mb-4">
                  <div class="card border-0">
                    <img src="./img/飾品Q_A/Q_A-PK.jpg" alt="">    
                  </div> 
                </div>
                <div class="col-6">
                  <div class="card border-0">
                    <img src="./img/飾品Q_A/Q_A-PK.jpg" alt="">    
                  </div> 
                </div>
                <div class="col-6">
                  <div class="card border-0">
                    <img src="./img/飾品Q_A/Q_A-4.jpg" alt="">
                  </div> 
                </div>
              </div>
            </div>
          </div>
          <div class="contact my-5 d-flex justify-content-end">
            <a href=""><i class="fas fa-phone-alt"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-line"></i></a>
            <a href=""><i class="fab fa-facebook-f"></i></a>
          </div>
        </div>       
      </section>
    </main>
    <footer class="pt-5">
      <div class="container">
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
                    <div class="send-icon">
                      <i class="fas fa-envelope-open-text"></i>
                    </div>
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
      @if (Session::has('msg'))
        alert('{{ Session::get('msg') }}');
      @endif
  </script>
  </body>
</html>
