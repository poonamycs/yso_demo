@extends('layouts/adminLayout/admin_design')
@section('content')
	<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar fixed-footer">
        @include('layouts/adminLayout/admin_header')
        <div class="app-main">
            @include('layouts/adminLayout/admin_sidebar')
            <div class="app-main__outer">
                <div class="app-main__inner">

					<div class="app-page-title">
						<div class="page-title-wrapper">
							<div class="page-title-heading">
								<div class="page-title-icon"><i class="lnr-checkmark-circle text-danger"></i></div>
								<div>Admin Profile
									<div class="page-title-subheading"><a href="{{ url('admin/dashboard') }}">Dashboard</a> / Admin Profile</div>
								</div>
							</div>
						</div>
					</div>

					<div class="main-card mb-3 card" id="app">
						@if(Session::has('error_message'))
				        <div class="alert alert-danger alert-block">
				            <button type="button" class="close" data-dismiss="alert">x</button>
				            <strong>{!! session('error_message') !!}</strong>
				        </div>
				        @endif
				        @if(Session::has('success_message'))
				        <div class="alert alert-success alert-block">
				            <button type="button" class="close" data-dismiss="alert">x</button>
				            <strong>{!! session('success_message') !!}</strong>
				        </div>
						@endif
						<div class="card-body mb-3">
							<form id="adminProfileForm" name="adminProfileForm" class="col-md-10 mx-auto" method="post" action="{{ url('admin/profile/') }}">@csrf
								<div class="form-group">
									<label for="email" class="">Email</label>
									<input type="email" class="form-control" id="email" name="email" readonly="true" value="{{ $adminDetails->email }}">
								</div>
								<div class="form-group">
									<label for="role" class="">Role</label>
									<input type="text" class="form-control" id="role" name="role" readonly="true" value="{{ $adminDetails->role }}">
								</div>
								<div class="form-group">
									<label for="name" class="">Name</label>
									<input type="text" class="form-control" id="name" name="name" maxlength="15" required value="{{ $adminDetails->name }}"/>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary float-right btn-block"><b><i class="fa fa-check"></i> Update</b></button>
								</div>
							</form>
						</div>
					</div>
				</div>
                @include('layouts/adminLayout/admin_footer')
            </div>
        </div>
    </div>

@endsection