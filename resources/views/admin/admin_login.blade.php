@extends('layouts.custom-app')

@section('styles')

@endsection

@section('class')

    <div class="error-page1 main-body bg-light text-dark">

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-md-6 col-lg-6 col-xl-6 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{asset('assets/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-6 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <div class="container p-0">
                        <div class="row">

                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex">
                                        <img src="{{asset('assets/img/brand/favicon.png')}}" class="sign-favicon-a ht-40" alt="logo">
                                        <img src="{{asset('assets/img/brand/favicon.png')}}" class="sign-favicon-b ht-40" alt="logo">
                                        <h1 class="main-logo1 ms-1 me-0 my-auto tx-30 fw-bold" style="text-shadow: 2px 2px 2px #aaaaaa;">YSO</h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h3 class="gradient-text">Welcome back!</h3>
                                            <h5 class="fw-semibold mb-4">Please sign in to your account.</h5>
                                            @if(Session::has('flash_message_error'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{!! session('flash_message_error') !!}</strong>
                                                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @endif
                                            @if(Session::has('flash_message_success'))
                                            <div class="alert alert-success" role="alert">
                                                <strong>{!! session('flash_message_success') !!}</strong>
                                                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @endif
                                            <form action="{{ url('/') }}" method="post" id="loginForm" name="loginForm">@csrf
                                                <div class="form-group">
                                                    <label>Email</label> 
                                                    <input type="email" name="email" class="form-control" placeholder="Enter your email" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label> 
                                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" value="" required>
                                                    <span toggle="#password" class="fa fa-fw fa-eye-slash field-icon" id="show-pass"></span>
                                                </div>
                                                <button type="submit" class="btn btn-primary-gradient btn-block loginbtn"><i class="fa fa-unlock"></i> Sign In</button>

                                                <div class="row row-xs">
                                                    <div class="col-sm-12">
                                                        <a class="lpenAj" href="{{url('login/google')}}">
                                                            <img class="bzWlAa" src="{{asset('assets/img/svgicons/google.svg')}}"> <span>Continue with Google</span></a>
                                                        {{-- <a href="{{url('index')}}" class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</a> --}}
                                                    </div>
                                                    {{-- <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                        <a href="{{url('index')}}" class="btn btn-info btn-block btn-b"><i class="fab fa-google"></i> Signup with Login</a>
                                                    </div> --}}
                                                </div>
                                            </form>
                                            <div class="main-signin-footer mt-5">
                                                <p><a href="{{url('forgot-password')}}">Forgot password?</a></p>
                                                {{-- <p>Don't have an account? <a href="{{url('signup')}}">Create an Account</a></p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection('content')