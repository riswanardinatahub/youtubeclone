@extends('layouts.app')

@section('content')
<div class="container-fluid">

    {{-- Search --}}

    {{-- <form action="/search" method="GET">

        <div class="d-flex align-items-center my-3">
            <input type="text" name="query" id="query" class="form-control" placeholder="Search">
            <button type="submit" class="search-btn"> <i class="material-icons">search</i></button>
        </div>

    </form> --}}

    {{-- Search --}}
    {{-- <div class="row my-3">
        @if(!$channels->count())
        <p>You are not subscribed to any channel !</p>
        @endif
        @foreach ($channels as $channelVideos)
        @foreach ($channelVideos as $video)
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('video.watch', $video)}}" class="card-link">
                <div class="card mb-4" style="width: 333px; border:none;">
                    @include('includes.videoThumbnail')

                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <img src="{{  $video->channel->picture }}" height="40px" class="rounded circle">

                            <h4 class="ml-3">{{$video->title}}</h4>

                        </div>
                        <p class="text-gray mt-4 font-weight-bold" style="line-height: 0.2px">{{ $video->channel->name}}
                        </p>
                        <p class="text-gray font-weight-bold" style="line-height: 0.2px">{{ $video->views}} views •
                            {{$video->created_at->diffForHumans()}}</p>
                    </div>
                </div>
            </a>

        </div>
        @endforeach
        @endforeach
    </div> --}}
</div>


<!-- Start popular-courses Area -->
<section class="popular-courses-area section-gap courses-page">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Desatube</h1>
                    <p>Kembangkan Desa-Desamu Agar Lebih Maju Dan terkenal</p>
                    <div class="widget-wrap border-0 p-0" style="background-color: white;">
                        <div class="single-sidebar-widget search-widget">
                            <form class="search-form" action="/search" method="GET">
                                <input placeholder="Search Posts" name="query" id="query" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- @foreach ($channels as $channelVideos) --}}
            @foreach ($channels as $video)

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
                        {{ $video->channel->name }}  <br>
                        Desa : {{ $video->village_name }}
                        <br>
                             @php
                            $n =  $video->views ;
                                if ($n >= 0 && $n < 1000) {
                                    // 1 - 999
                                    $n_format = floor($n);
                                    $suffix = '';
                                } else if ($n >= 1000 && $n < 1000000) {
                                    // 1k-999k
                                    $n_format = floor($n / 1000);
                                    $suffix = 'K+';
                                } else if ($n >= 1000000 && $n < 1000000000) {
                                    // 1m-999m
                                    $n_format = floor($n / 1000000);
                                    $suffix = 'M+';
                                } else if ($n >= 1000000000 && $n < 1000000000000) {
                                    // 1b-999b
                                    $n_format = floor($n / 1000000000);
                                    $suffix = 'B+';
                                } else if ($n >= 1000000000000) {
                                    // 1t+
                                    $n_format = floor($n / 1000000000000);
                                    $suffix = 'T+';
                                }

	                                $cinta = !empty($n_format . $suffix) ? $n_format . $suffix : 0;
                            @endphp
                        {{ $cinta }} Views . {{ $video->uploaded_date }} 
                    </small>

                </div>
            </div>

            @endforeach
            {{-- @endforeach --}}
        </div>



        <div class="row d-flex justify-content-center">
            {{-- <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <a href="#" class="primary-btn text-uppercase text-center">Load More Courses</a>
                </div>
            </div> --}}
        </div>

    </div>
</section>
<!-- End popular-courses Area -->



<!-- Start cta-two Area -->
<section class="cta-two-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 cta-left">
                <h1>Buruan bikin desamu Terkenal ?</h1>
            </div>
            <div class="col-lg-4 cta-right">
                <a class="primary-btn wh" href="#">Join Desatube</a>
            </div>
        </div>
    </div>
</section>
<!-- End cta-two Area -->
@endsection