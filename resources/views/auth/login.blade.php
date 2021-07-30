@extends('layouts.app')

@section('content')
{{-- <br>
<br>
<br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class=" mt-3 text-center"><h3> LOGIN </h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br> --}}


<!-- Start search-course Area -->
	<section class="search-course-area relative ">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-4 col-md-6 search-course-right section-gap">
					<form class="form-wrap" method="POST" action="{{ route('login') }}">
                        @csrf
						<h4 class="text-white pb-20 text-center mb-30">Login Page</h4>
						<input type="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" class="form-control" placeholder="Your Email"
							onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'">
                             @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Your Password" required autocomplete="current-password"
							onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Password'">
						
						<button type="submit" class="primary-btn text-uppercase">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- End search-course Area -->


@endsection
