@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row d-flex justify-content-center no-gutter">
            <div class="col-md-7 col-lg-6 col-xl-5 bg-white">
                <div class="d-flex align-items-center py-2" style="min-height: 75.8vh">
                    <div class="container">
                        <div class="row">
                            <div class="main-card-signin construction text-center border-0 mx-auto">
                                <div class="p-4 wd-100p mx-auto">
                                    <div>
                                        <h2 class="tx-30">Under Working</h2>
                                        <p class="tx-12 text-muted">This functionality is under working!</p>
                                        <div class="mt-4 d-flex mx-auto text-center justify-content-center">
                                            <button onclick="window.history.go(-1); return true;" class="btn btn-primary" type="button">
                                                <span class="btn-inner--icon"> <i class="fa fa-angle-left"></i> Go Back </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>

@endsection