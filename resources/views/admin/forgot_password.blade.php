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
                                        <a href="{{url('index')}}"><img src="{{asset('assets/img/brand/favicon.png')}}" class="sign-favicon-a ht-40" alt="logo">
                                        <img src="{{asset('assets/img/brand/favicon-white.png')}}" class="sign-favicon-b ht-40" alt="logo">
                                        </a>
                                        <h1 class="main-logo1 ms-1 me-0 my-auto tx-30 fw-bold" style="text-shadow: 2px 2px 2px #aaaaaa;">YSO</h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h6 class="mb-2 fw-normal">Please enter below your email address to reset your password.</h6>
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
                                            <form action="{{ url('forgot-password/') }}" method="post">@csrf
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group">
                                                            <label for="exampleEmail" class="fw-500">Email</label>
                                                            <input name="email" id="exampleEmail" name="email" placeholder="Email your email" type="email" class="form-control" required="true" autofocus="true">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="ml-auto">
                                                        <button class="btn btn-primary" type="submit">Recover Password</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="main-signin-footer mt-5">
                                                <p><a href="{{url('/')}}" class="btn btn-light"><i class="fa fa-sign-in-alt"></i> Sign In</a></p>
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