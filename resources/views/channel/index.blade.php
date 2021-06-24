@extends('layouts.app')

@section('content')
{{-- <div class="jumbotron jumbotron-fluid bg-primary mt-5">
    <div class="container">
        <h1 class="display-4">{{$channel->name}}</h1>
        <p class="lead">{{$channel->description}}</p>
    </div>
</div> --}}

<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								{{$channel->name}}	
							</h1>	
							<p class="text-white link-nav"><a href="index.html">Descriptions </a>  <span class="lnr lnr-arrow-right"></span>  <a href="courses.html"> {{$channel->description}}</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

<div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ $channel->images_url}}" class="rounded-circle mr-3" height="100px;">
            <div>
                <h3 class="pt-3">{{$channel->name}}</h3>
                <p class="pt-2">{{ $channel->subscribers() }} Subscribers</p>
            </div>
        </div>
        <div>
            @can('edit', $channel)
            <a href="{{route('channel.edit', $channel)}}" class="genric-btn info">Edit Channel</a>
            @endcan
        </div>
    </div>
    <div>
        {{-- <div class="row my-4">
            @foreach ($channel->videos as $video)
            <div class="col-12 col-md-6 col-lg-4">
                <a href="{{ route('video.watch', $video)}}" class="card-link">
                    <div class="card mb-4" style="width: 333px; border:none;">
                        <img class="card-img-top" src="{{asset( $video->thumbnail)}}" alt="Card image cap"
                            style="height: 174px; width:333px">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="{{  $video->channel->picture }}" height="40px" class="rounded circle">

                                <h4 class="ml-3">{{$video->title}}</h4>

                            </div>
                            <p class="text-gray mt-4 font-weight-bold" style="line-height: 0.2px">{{
                                $video->channel->name}}
                            </p>
                            <p class="text-gray font-weight-bold" style="line-height: 0.2px">{{ $video->views}} views •
                                {{$video->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                </a>

            </div>
                
            @endforeach
        </div> --}}

        <div class="row my-5 ">
            @foreach ($channel->videos as $video)
            <div class="single-popular-carusel col-lg-3 col-md-6">
                <div class="thumb-wrap relative">
                    <div class="thumb relative rounded">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="{{asset( $video->thumbnail)}}" alt="">
                    </div>
                    <div class="meta d-flex justify-content-between">
                        <p><span class="lnr lnr-users"></span> {{ $video->views }} <span
                                class="lnr lnr-bubble"></span>{{ $video->AllcommntsCount()}}</p>
                        <p class="px-2 rounded " style="background-color: rgb(74, 77, 77);">{{ $video->duration }}</p>
                    </div>
                </div>
                <div class="details">
                    <a href="{{ route('video.watch', $video)}}">

                        <h4 class="mb-0">
                            <img class="rounded-circle" src="{{ $video->channel->images_url }}" alt=""
                                style="height: 40px; margin-right: 10px;">
                            {{$video->title}}
                        </h4>
                    </a>
                    <small>
                        {{ $video->channel->name }} Desa : {{ $video->village_name }} <br>

                        {{ $video->views }} Views . {{ $video->uploaded_date }}
                    </small>

                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection