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
                                <input placeholder="Search By Desa" name="query" id="query" type="text"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search By Desa'">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

 





        <div class="row">
            <div class="col-3">
                 <div class="row justify-content-center">
                        <div class="card border-0" style="width: 290px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                            @php
                            $infrastruktur = 'https://desaku-desatour.masuk.id/api/infrastruktur';
                                $konteninfrastruktur = @file_get_contents($infrastruktur);
                                if($konteninfrastruktur === FALSE){
                                    //data error
                                    $datainfrastruktur =[];
                                }else{
                                        $datainfrastruktur = json_decode($konteninfrastruktur, true);
                                }
                        
                            @endphp
                            <div class="pl-4 pt-4" style=" font-size: 15px; font-weight: bold; background-color:white; color:black;">
                                INFRASTRUKTUR DESA
                                <div class="row">
                                    <div class="col-3">
                                        <hr style="padding-left: 0px; border-top: 3px solid #358f66; width:50px;">
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                @php
                                $no = 1;
                                @endphp
                                @foreach($datainfrastruktur['data'] as $row)
                                @php
                                $no++;
                                @endphp
                                <li class="list-group-item">
                                    <img src="{{ $row['foto'] }}"
                                        style="width: 100%; height: 75px; object-fit: cover;" alt="">
                                    <a href="" target="_blank"
                                        class="text-decoration-none text-dark" style="font-weight: bolder; font-size: 14px;">{{ $row['nama'] }}</a>
                                    <br>
                                    <div class="row">
                        
                                        <div class="col">
                                            <span  style="font-size:12px;">
                                                {{ $row['desa'] }} <span style="background-color:#358f66; color: white;">{{ $row['Status'] }}</span>
                                            </span>
                                        </div>
                                        {{-- <div class="col">
                                            <span class="text-success" style="font-size:10px;">
                                                {{ \Carbon\Carbon::parse($row['created_at'])->format('D m Y') }}
                                            </span>
                                        </div> --}}
                                    </div>
                                </li>
                                @if ($no == 5)
                                @break
                                @endif
                                @endforeach
                        
                        
                            </ul>
                        </div>
                   </div>
            </div>
            <div class="col-6">
                     <div class="row">
            {{-- @foreach ($channels as $channelVideos) --}}
            @foreach ($channels as $video)

            <div class="single-popular-carusel col-6">
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
                        Desa : {{ $video->channel->user->villages->name }}
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
            </div>
            <div class="col-3">
                <div class="row justify-content-center">
                        <div class="card border-0" style="width: 290px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                            @php
                            $sumberberita = 'https://desaku-desanews.masuk.id/api/berita/';
                            $kontenberita = @file_get_contents($sumberberita);
                            if($kontenberita === FALSE){
                            //data error
                            $databerita =[];
                            }else{
                            $databerita = json_decode($kontenberita, true);
                            }
                        
                            @endphp
                            <div class="pl-4 pt-4" style=" font-size: 15px; font-weight: bold; background-color:white; color:black;">
                                BERITA DESA TERBARU
                                <div class="row">
                                    <div class="col-3">
                                        <hr style="padding-left: 0px; border-top: 3px solid #358f66; width:50px;">
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                @php
                                $no = 1;
                                @endphp
                                @foreach($databerita as $row)
                                @php
                                $no++;
                                @endphp
                                <li class="list-group-item">
                                    <img src="https://desaku-desanews.masuk.id/{{ $row['gambar'] }}"
                                        style="width: 100%; height: 75px; object-fit: cover;" alt="">
                                    <a href="https://desaku-desanews.masuk.id/berita/{{ $row['id'] }}/{{ $row['slug'] }}" target="_blank"
                                        class="text-decoration-none text-dark" style="font-weight: bolder; font-size: 14px;">{{ $row['judul'] }}</a>
                                    <br>
                                    <div class="row">
                        
                                        <div class="col">
                                            <span  style="font-size:12px;">
                                                {{ $row['kelurahans'] }} -  {{ \Carbon\Carbon::parse($row['created_at'])->format('D m Y') }}
                                            </span>
                                        </div>
                                        {{-- <div class="col">
                                            <span class="text-success" style="font-size:10px;">
                                                {{ \Carbon\Carbon::parse($row['created_at'])->format('D m Y') }}
                                            </span>
                                        </div> --}}
                                    </div>
                                </li>
                                @if ($no == 5)
                                @break
                                @endif
                                @endforeach
                        
                        
                            </ul>
                        </div>
                   </div>
            </div>
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

@push('scripts')
  
 
@endpush

