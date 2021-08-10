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
		<div class="container-fluid main-menu px-5">
			<div class="row align-items-center  d-flex">
				<div id="logo">
					<a href="/"><img style="max-height: 50px;" src="{{ asset('foto/logo.png') }}" alt="" title="" /></a>
				</div>

				<div class=" ml-5 pl-5 dropdown show">
					<a class=" dropdown-toggle" style="color: black; font-weight: 500;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Produk Desaku
					</a>

					<div class="dropdown-menu" style="width: 800px !important; height: 280px !important;" aria-labelledby="dropdownMenuLink">
									@auth
									<div class="row g-3">
                                        <div class="col-lg-4 col-6">
                                            <div class="col-megamenu">
                                                <a class="dropdown-item teman-desaku"
                                                    href="https://desaku-desanews.masuk.id/">
                                                    <img class="zoom-logo mt-1" src="{{ asset('img/desanews.png') }}">
                                                    <br>
                                                    <small style="white-space: normal!important;">Berita dan kegiatan
                                                        desa
                                                        terkini dan terupdate di DesaNews!</small>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-6">
                                            <div class="col-megamenu">
                                                <a class="dropdown-item teman-desaku"
                                                    href="https://desaku-desafeed.masuk.id/">
                                                    <img class="zoom-logo" src="{{ asset('img/desafeed.png') }}">
                                                    <br>
                                                    <small style="white-space: normal!important;">Berbagi pengalaman
                                                        pribadi,
                                                        foto dan video berbagai warga desa di DesaFeed!</small>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-6">
                                            <div class="col-megamenu">
                                                <a class="dropdown-item teman-desaku"
                                                    href="https://desaku-desatour.masuk.id/">
                                                    <img class="zoom-logo" src="{{ asset('img/desatour.png') }}">
                                                    <br>
                                                    <small style="white-space: normal!important;">Jelajahi wisata,
                                                        kuliner,
                                                        penginapan, dan infrastruktur desa di DesaTour!</small>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-6">
                                            <div class="col-megamenu">
                                                <a class="dropdown-item teman-desaku"
                                                    href="https://desaku-desafeed.masuk.id/social-media">
                                                    <img class="zoom-logo" src="{{ asset('img/desatube.png') }}">
                                                    <br>
                                                    <small style="white-space: normal!important;">Publish video tentang
                                                        desa,
                                                        kegiatan desa dan cerita desa di DesaTube!</small>
                                                </a>
                                            </div>
                                        </div>
										<div class="col-lg-4 col-6">
                                            <div class="col-megamenu">
                                                <a class="dropdown-item teman-desaku" onclick="event.preventDefault();
                											document.getElementById('login-form-desaku').submit();"
                                                    href="https://marketpalcedesaku.masuk.web.id/">
                                                    <img class="zoom-logo" src="{{ asset('img/desastore.png') }}">
                                                    <br>
                                                    <small style="white-space: normal!important;">Berbagai produk desa
                                                        yang
                                                        dapat di Jual dan di Beli di DesaStore!</small>
                                                </a>
												<form id="login-form-desaku" action="https://marketpalcedesaku.masuk.web.id/autoLogin" method="POST" class="d-none">
                 
													<input type="hidden" name="email" value="{{ Auth::user()->email }}">
													<input type="hidden" name="id_desa" value="{{ Auth::user()->villages_id }}">
												</form>	
                                            </div>
                                        </div>
                                      
                                        <div class="col-lg-4 col-6">
                                            <div class="col-megamenu">
                                                <a class="dropdown-item teman-desaku" onclick="event.preventDefault();
                                                      document.getElementById('login-form-desacuss').submit();"
                                                    href="https://desaku-desacuss.masuk.id/autoLogin">
                                                    <img class="zoom-logo" src="{{ asset('img/desacuss.png') }}">
                                                    <br>
                                                    <small style="white-space: normal!important;">Berbagai produk desa
                                                        yang
                                                        dapat di Jual dan di Beli di DesaStore!</small>
                                                </a>
                                                <form id="login-form-desacuss" action="https://desaku-desacuss.masuk.id/autoLogin" method="POST" class="d-none">
                                                      
                                                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                                        <input type="hidden" name="id_desa" value="{{ Auth::user()->villages_id }}">
                                                      </form>

                                              
                                            </div>
                                        </div>
                                    </div>
										@else
										<div class="row g-3">
                                        <div class="col-lg-4 col-6">
                                            <div class="col-megamenu">
                                                <a class="dropdown-item teman-desaku"
                                                    href="https://desaku-desanews.masuk.id/">
                                                    <img class="zoom-logo mt-1" src="{{ asset('img/desanews.png') }}">
                                                    <br>
                                                    <small style="white-space: normal!important;">Berita dan kegiatan
                                                        desa
                                                        terkini dan terupdate di DesaNews!</small>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-6">
                                            <div class="col-megamenu">
                                                <a class="dropdown-item teman-desaku"
                                                    href="https://desaku-desafeed.masuk.id/">
                                                    <img class="zoom-logo" src="{{ asset('img/desafeed.png') }}">
                                                    <br>
                                                    <small style="white-space: normal!important;">Berbagi pengalaman
                                                        pribadi,
                                                        foto dan video berbagai warga desa di DesaFeed!</small>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-6">
                                            <div class="col-megamenu">
                                                <a class="dropdown-item teman-desaku"
                                                    href="https://desaku-desatour.masuk.id/">
                                                    <img class="zoom-logo" src="{{ asset('img/desatour.png') }}">
                                                    <br>
                                                    <small style="white-space: normal!important;">Jelajahi wisata,
                                                        kuliner,
                                                        penginapan, dan infrastruktur desa di DesaTour!</small>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-6">
                                            <div class="col-megamenu">
                                                <a class="dropdown-item teman-desaku"
                                                    href="https://desaku-desafeed.masuk.id/social-media">
                                                    <img class="zoom-logo" src="{{ asset('img/desatube.png') }}">
                                                    <br>
                                                    <small style="white-space: normal!important;">Publish video tentang
                                                        desa,
                                                        kegiatan desa dan cerita desa di DesaTube!</small>
                                                </a>
                                            </div>
                                        </div>
                                          <div class="col-lg-4 col-6">
                                            <div class="col-megamenu">
                                                <a class="dropdown-item teman-desaku"
                                                    href="https://marketpalcedesaku.masuk.web.id/">
                                                    <img class="zoom-logo" src="{{ asset('img/desastore.png') }}">
                                                    <br>
                                                    <small style="white-space: normal!important;">Berbagai produk desa
                                                        yang
                                                        dapat di Jual dan di Beli di DesaStore!</small>
                                                </a>
                                            </div>
                                        </div>


                                        <div class="col-lg-4 col-6">
                                            <div class="col-megamenu">
                                                <a class="dropdown-item teman-desaku"
                                                    href="https://marketpalcedesaku.masuk.web.id/">
                                                    <img class="zoom-logo" src="{{ asset('img/desacuss.png') }}">
                                                    <br>
                                                    <small style="white-space: normal!important;">Berbagai produk desa
                                                        yang
                                                        dapat di Jual dan di Beli di DesaStore!</small>
                                                </a>
											
												
                                            </div>
                                        </div>
                                    </div>
									 {{-- <li class="nav-item active">
            <a href="http://desaku-desacuss.masuk.id/autoLogin/{{ Auth::user()->email }}/12345678" class="nav-link">Tembak Akun Login Muqny  </a>
             <a href="https://marketpalcedesaku.masuk.web.id/autoLogin" onclick="event.preventDefault();
                document.getElementById('login-form').submit();" class="dropdown-item">Auto Login</a>
                 <form id="login-form" action="https://marketpalcedesaku.masuk.web.id/autoLogin" method="POST" class="d-none">
                 
                  <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                  <input type="hidden" name="id_desa" value="{{ Auth::user()->villages_id }}">
                </form>

                
        </li> --}}
									@endauth
						</div>
					</div>
				

				<nav class="navbar-nav ml-auto" id="nav-menu-container">
			
					<ul class="nav-menu justify-content-between">
						<li><a href="/">Home</a></li>
						       <!-- Button trigger modal -->

						<li><a  href="#" class="btn" data-toggle="modal" data-target="#exampleModalasd">
						Cari
						</a></li>
						
						
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
    <!-- Modal -->
<div class="modal fade" id="exampleModalasd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
        <div class="col-md-12" id="locations">
                    <form action="/carivideo" method="GET">
                        @csrf
                        <div class="form-group row">
                            <label for="provinces_id" class="col-md-4 col-form-label text-md-right">Provinsi</label>
                            <div class="col-md-6">
                            <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                            <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                            </select>
                            <select v-else class="form-control"></select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="regencies_id" class="col-md-4 col-form-label text-md-right">Kabupaten</label>
                            <div class="col-md-6">
                            <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies"
                            v-model="regencies_id">
                            <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                            </select>
                            <select v-else class="form-control"></select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="districts_id" class="col-md-4 col-form-label text-md-right">Kecamatan/Kelurahan</label>
                            <div class="col-md-6">
                            <select name="districts_id" id="districts_id" class="form-control" v-if="districts"
                            v-model="districts_id">
                            <option v-for="district in districts" :value="district.id">@{{ district.name }}</option>
                            </select>
                            <select v-else class="form-control"></select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="villages_id" class="col-md-4 col-form-label text-md-right">Desa</label>
                            <div class="col-md-6">
                            <select name="villages_id" id="villages_id" class="form-control" v-if="villages"
                            v-model="villages_id">
                            <option v-for="village in villages" :value="village.id">@{{ village.name }}</option>
                            </select>
                            <select v-else class="form-control"></select>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="primary-btn text-uppercase">Cari</button>
                            </div>
                        </div>
                    </form>
             
        
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>


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

<script src="/vendor/vue/vue.js"></script>
  <script src="https://unpkg.com/vue-toasted"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

 <script>
  var locations = new Vue({
    el: "#locations",
    mounted() {
      AOS.init();
      this.getProvincesData();
    },
    data: {
      provinces: null,
      regencies: null,
      districts: null,
      villages: null,
      provinces_id: null,
      regencies_id: null,
      districts_id: null,
      villages_id: null,
    },
    methods: {
      getProvincesData() {
        var self = this;
        axios.get('{{ route('api-provinces') }}')
          .then(function (response) {
            self.provinces = response.data;
          })
      },

      getRegenciesData() {
        var self = this;
        axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
          .then(function (response) {
            self.regencies = response.data;
          })
      },

      getDistrictsData() {
        var self = this;
        axios.get('{{ url('api/districts') }}/' + self.regencies_id)
          .then(function (response) {
            self.districts = response.data;
          })
      },

      getVillagesData() {
        var self = this;
        axios.get('{{ url('api/villages') }}/' + self.districts_id)
          .then(function (response) {
            self.villages = response.data;
          })
      },

    },
    watch: {
      provinces_id: function (val, oldVal) {
        this.regencies_id = null;
        this.getRegenciesData();
      },

      regencies_id: function (val, oldVal) {
        this.districts_id = null;
        this.getDistrictsData();
      },

      districts_id: function (val, oldVal) {
        this.villages_id = null;
        this.getVillagesData();
      }
    }
  });

</script>

</body>

</html>