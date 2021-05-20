@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="row justify-content-center mt-5">
    <div class="col-lg-12  sidebar-widgets ">
        <div class="widget-wrap">
            <div class="single-sidebar-widget popular-post-widget">
                <h4 class="popular-title">Edit Channel</h4>
            </div>

                <livewire:channel.edit-channel :channel="$channel">

        </div>
    </div>
</div>
           
        </div>
    </div>
</div>
@endsection
