@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-6 sidebar-widgets mt-5">
        <div class="widget-wrap">
            <div class="single-sidebar-widget popular-post-widget">
                <h4 class="popular-title">Change Password</h4>

                <div class="row justify-content-center mt-5">
                    <div class="col-12">
                        @if( Session::has( 'error' ))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                        @endif

                        @if (session()->get('message'))
                        <div class="alert alert-success" role="alert">
                            <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                            <strong>SUCCESS:</strong>&nbsp;{{ session()->get('message')}}
                        </div>
                        @endif

                        <div class="row justify-content-center">
                            <div class="col-8">
                                <form action="{{ route('updatepassword') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="current_password"><strong> Password Lama:</strong></label>
                                        <input type="password" class="form-control" id="current_password"
                                            name="current_password" required>
                                    </div>
                                    <!-- End Current Password Input -->
                                    <div class="form-group">
                                        <label for="new_password"><strong>Password Baru:</strong></label>
                                        <input type="password" class="form-control" id="new_password"
                                            name="new_password" required>
                                    </div>
                                    <!-- End New Password Input -->
                                    <div class="form-group">
                                        <label for="new_password_confirmation"><strong>Konfirmasi Password
                                                :</strong></label>
                                        <input type="password" class="form-control" id="new_password_confirmation"
                                            name="new_password_confirmation" required>
                                    </div>
                                    <!-- End New Confirm Password Input -->
                                    <div class="text-center">
                                        <button class="genric-btn primary" type="submit">Rubah
                                            Password</button>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{--
<div class="row justify-content-center">
    <div class="col-12">
        <div class="container">
            <div class="row">

                <div class="col-sm"><br>
                    <div class="card; shadow p-3 mb-5 bg-white rounded" style="width: 30rem; margin: auto;">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center;">Rubah Password</h5><br>

                            @if( Session::has( 'error' ))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                            @endif

                            @if (session()->get('message'))
                            <div class="alert alert-success" role="alert">
                                <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                                <strong>SUCCESS:</strong>&nbsp;{{ session()->get('message')}}
                            </div>
                            @endif


                            <form action="{{ route('updatepassword') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="current_password"><strong> Password Lama:</strong></label>
                                    <input type="password" class="form-control" id="current_password"
                                        name="current_password" required>
                                </div>
                                <!-- End Current Password Input -->
                                <div class="form-group">
                                    <label for="new_password"><strong>Password Baru:</strong></label>
                                    <input type="password" class="form-control" id="new_password" name="new_password"
                                        required>
                                </div>
                                <!-- End New Password Input -->
                                <div class="form-group">
                                    <label for="new_password_confirmation"><strong>Konfirmasi Password
                                            :</strong></label>
                                    <input type="password" class="form-control" id="new_password_confirmation"
                                        name="new_password_confirmation" required>
                                </div>
                                <!-- End New Confirm Password Input -->
                                <button class="btn btn-success" type="submit" style="background-color:#ff91d1;">Rubah
                                    Password</button>
                            </form>


                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div> --}}

    @endsection