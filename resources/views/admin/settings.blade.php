@extends('layouts.app')
@section('styles')
    <!-- Internal Select2 css -->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')

    <div class="row d-flex justify-content-center">
	    <div class="breadcrumb-header justify-content-between">
	        <div class="my-auto">
	            <div class="d-flex">
	                <h4 class="content-title mb-0 my-auto">Settings</h4>
	            </div>
	        </div>
	    </div>
    	<div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="row mg-b-20 mt-2 mg-10 mt-3">
                	<form action="{{url('settings')}}" method="post">@csrf
	                    <div class="form-group row">
	                    	<div class="row">
	                            <div class="col-md-6">
	                                <label class="col-from-label">Order Delivery Warning Day</label>
	                            </div>
	                            <div class="col-md-6">
	                                <input type="text" class="form-control" name="delivery_warning_days" placeholder="Enter name" value="{{settings('delivery_warning_days')}}" required />
	                            </div>
	                        </div>
	                    	<div class="row mt-3">
	                            <div class="col-md-6">
	                                <label class="col-from-label">Admin Email</label>
	                            </div>
	                            <div class="col-md-6">
	                                <input type="text" class="form-control" name="admin_email" placeholder="Enter name" value="{{settings('admin_email')}}" required />
	                            </div>
	                        </div>
	                    	<div class="row mt-3">
	                            <div class="col-md-6">
	                                <label class="col-from-label mb-1">Payment Tracker</label><br>
	                                <small class="">Upto how many months you want to view receivable amount</small>
	                            </div>
	                            <div class="col-md-6">
	                                <input type="text" class="form-control" name="payment_upcming_months" placeholder="Enter name" value="{{settings('payment_upcming_months')}}" required />
	                            </div>
	                        </div>	
	                    </div>
	                    <div class="form-group">
	                        <div class="col-lg-8 col-md-8 text-center">
	                            <button class="btn btn-main-primary pd-x-20" type="submit"><i class="fa fa-check-circle"></i> Save</button>
	                        </div>
	                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card">
	            <form action="{{url('indiamartAPIUpdate')}}" method="post">@csrf
	            	<?php $api = explode('-', settings('indiamart_api'));?>
	                <div class="row mg-b-20 mt-2 mg-10 mt-3">
	                    <div class="form-group mb-0">
	                        <div class="form-group mg-b-0">
	                            <label class="form-label fw-500">IndiaMart API</label>
	                            <input type="text" class="form-control" name="indiamart_mob" placeholder="Registered Mobile No." value="{{$api[0]}}" required />
	                        </div>
	                    </div>
	                    <div class="form-group mt-2">
	                        <div class="form-group mg-b-0">
	                            <input type="text" class="form-control" name="indiamart_secret" placeholder="Secret Key" value="{{$api[1]}}" required />
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="col-lg-8 col-md-8 text-center">
	                            <button class="btn btn-main-primary pd-x-20" type="submit"><i class="fa fa-check-circle"></i> Save</button>
	                        </div>
	                    </div>
	                </div>
	            </form>
            </div>
        </div>
    </div>

@endsection('content')

@section('scripts')
    <!-- Internal Select2 js-->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal  Parsley.min js -->
    <script src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!--Internal  Perfect-scrollbar js -->
    <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <!-- Internal Form-validation js -->
@endsection