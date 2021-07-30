@extends('layouts.app')

@section('content')



<!-- Start popular-courses Area -->
<section class="popular-courses-area section-gap courses-page">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Desatube</h1>
                    <p>Jadikan desamu lebih mernarik lagi </p>
                    <div class="widget-wrap border-0 p-0" style="background-color: white;">
                        <div class="single-sidebar-widget search-widget">
                            <form class="search-form" action="/search" method="GET">
                                <input placeholder="Search By Desa" name="query" id="query" type="text" required
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search By Desa'">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($videos as $video)
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

@endsection