{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Scripts alpinjs -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @stack('custom-css')
    <!-- Materialzecss -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Cutsom Css -->
    <link href="{{ asset('css/customs.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    @livewireStyles
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('video.all',['channel'=> auth()->user()->channel]) }}">All Videos</a>
                        </li> 
                    @endauth   
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a href="{{ route('video.create', ['channel' => Auth::user()->channel]) }}" class="nav-link">
                                <span class="material-icons">
                                    video_call
                                </span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                    href="{{ route('channel.index', ['channel' => Auth::user()->channel]) }}">
                                    {{ Auth::user()->channel->name }}
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

    @stack('scripts')


    @livewireScripts
</body>

</html> --}}



<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="colorlib">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Site Title -->
	<title>Desatube</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<!-- Materialzecss -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	 <!-- Scripts alpinjs -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
	<!-- Cutsom Css -->
    <link href="{{ asset('css/customs.css') }}" rel="stylesheet">

	@stack('custom-css')
    
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="{{ asset('template/css/linearicons.css') }}">
	<link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('template/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('template/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('template/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('template/css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('template/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('template/css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('template/css/main.css') }}">

    @livewireStyles
</head>

<body>
	<header id="header" id="home" style="background-color: white; box-shadow: 0 5px 5px -2px rgba(0, 0, 0, 0.2);" >
		{{-- <div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-behance"></i></a></li>
						</ul>
					</div>
					<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
						<a href="tel:+953 012 3654 896"><span class="lnr lnr-phone-handset"></span> <span
								class="text">+953 012 3654 896</span></a>
						<a href="mailto:support@colorlib.com"><span class="lnr lnr-envelope"></span> <span
								class="text">support@colorlib.com</span></a>
					</div>
				</div>
			</div>
		</div> --}}
		<div class="container main-menu">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<a href="/"><img style="max-height: 30px;" src="{{ asset('foto/logo.png') }}" alt="" title="" /></a>
				</div>

				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li><a href="/">Home</a></li>
						<li><a href="/tranding">Trending</a></li>
						@auth
						@if (Auth::user()->role =='user')
							<li><a href="/subscriptions">Subscriptions</a></li>
						@endif
							
						@else
							<li><a href="/login">Subscriptions</a></li>
						@endauth

						@auth
							@if (Auth::user()->role =='admin')

							<li><a href="/datauser">Data User</a></li>
							<li><a href="/datalaporan">Data Laporan</a></li>
							<li><a href="#">{{ Auth::user()->name }}</a></li>

						
							<li class="nav-item"><a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a></li>

										 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
							@else
							
								
							@endif
						@endauth



						
                        @guest
                         @if (Route::has('login'))
						<li><a href="/login">Login</a></li>
                         @endif
                         @if (Route::has('register'))
						<li><a href="/register">Register</a></li>
                        @endif
                        @else

						@if (Auth::user()->role=='user')
						<li class="nav-item">
                            <a href="{{ route('video.create', ['channel' => Auth::user()->channel]) }}" class="nav-link">
                                <span class="material-icons">
                                    video_call
                                </span>
                            </a>
                        </li>

						<li class="menu-has-children"><a href="">{{ Auth::user()->name }}</a>
							<ul>
								<li><a href="{{ route('channel.index', ['channel' => Auth::user()->channel]) }}">My Channel</a></li>
								 <li class="nav-item">
									<a class="nav-link" href="{{ route('video.all',['channel'=> auth()->user()->channel]) }}">All Videos</a>
								</li> 
								<li><a href="/profile/{{ Auth::user()->id }}">Profile</a></li>
								<li><a href="/changepassword">Change Password</a></li>
								<li><a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
								
							</ul>
						</li>
						
						@endif
						
						
                        @endguest
					</ul>
				</nav><!-- #nav-menu-container -->
			</div>
		</div>
	</header><!-- #header -->

	@yield('content')

	<!-- start footer Area -->
	<footer class="footer-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h4>Marketplace</h4>
						<ul>
							<li><a href="#">Registrasi</a></li>
							<li><a href="#">Login</a></li>
							<li><a href="#">Beranda</a></li>
							
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h4>Media Sosial</h4>
						<ul>
							<li><a href="#">Registrasi</a></li>
							<li><a href="#">Login</a></li>
							<li><a href="#">Beranda</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h4>Musrembang</h4>
						<ul>
							<li><a href="#">Registrasi</a></li>
							<li><a href="#">Login</a></li>
							<li><a href="#">Beranda</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h4>Berita</h4>
						<ul>
							<li><a href="#">Registrasi</a></li>
							<li><a href="#">Login</a></li>
							<li><a href="#">Beranda</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h4>Wisata</h4>
						<ul>
							<li><a href="#">Registrasi</a></li>
							<li><a href="#">Login</a></li>
							<li><a href="#">Beranda</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-bottom row align-items-center justify-content-between">
				<p class="footer-text m-0 col-lg-6 col-md-12">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;
					<script>document.write(new Date().getFullYear());</script> <i class="fa fa-heart-o" aria-hidden="true"></i>  <a href="#"
						target="_blank"></a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
				<div class="col-lg-6 col-sm-12 footer-social">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-dribbble"></i></a>
					<a href="#"><i class="fa fa-behance"></i></a>
				</div>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->

@stack('scripts')
  @livewireScripts

	<script src="{{ asset('template/js/vendor/jquery-2.2.4.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<script src="{{ asset('template/js/vendor/bootstrap.min.js') }}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="{{ asset('template/js/easing.min.js') }}"></script>
	<script src="{{ asset('template/js/hoverIntent.js') }}"></script>
	<script src="{{ asset('template/js/superfish.min.js') }}"></script>
	<script src="{{ asset('template/js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ asset('template/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('template/js/jquery.tabs.min.js') }}"></script>
	<script src="{{ asset('template/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('template/js/mail-script.js') }}"></script>
	<script src="{{ asset('template/js/main.js') }}"></script>


</body>

</html>