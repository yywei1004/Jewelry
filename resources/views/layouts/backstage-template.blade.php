<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- bootstrap Core CSS CDN -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
		integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<!-- fontawesome Core CSS CDN -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
		integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- layout CSS -->
	<link rel="stylesheet" href="{{asset('css/layout.css')}}">

    @yield('css')
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="./index.html">
				<img src="{{asset('img/vtb-23846-18ohsosoftteddybear-lightbrown_feature4_20201012_0843.jpg')}}" width="30" height="30" alt="">
                @if (Auth::check())
                    {{ Auth::user()->name}}，您好, 歡迎登入
                @else
                    這邊是後台，你是怎麼進來的???
                @endif
                
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="/blog">文章管理</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/product">商品管理</a>
					</li>

                    <li class="nav-item">
						<a class="nav-link" href="/user">會員管理</a>
					</li>

                    <li class="nav-item">
						<a class="nav-link" href="/order">訂單管理</a>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
							data-toggle="dropdown" aria-expanded="false">
							<i class="fas fa-user"></i>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<main>
        @yield('main')
        
	</main>

	<footer>
		<div class="bg-light py-1">
			<div class="container d-flex justify-content-between">
				<div class="copyright">
					© 2022 Kaz for education
				</div>
				<div class="community">
					<i class="fab fa-facebook-f"></i>
					<i class="fab fa-twitter"></i>
					<i class="fab fa-instagram"></i>
					<i class="fab fa-linkedin-in"></i>
				</div>
			</div>
		</div>
	</footer>

	<!-- jquery Core JS CDN -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
		crossorigin="anonymous"></script>
	<!-- popper Core JS CDN -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
		integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
		crossorigin="anonymous"></script>
	<!-- bootstrap Core JS CDN -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
		integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
		crossorigin="anonymous"></script>
        @yield('js')
</body>

</html>