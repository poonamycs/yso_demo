@extends('layouts.app')
@section('content')

	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<h4 class="content-title mb-0 my-auto">Change Password</h4>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->

	<!-- row -->
	<div class="row row-sm">
		<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
			<div class="card  box-shadow-0 ">
				<div class="card-body pt-0">
					@if(Session::has('error_message'))
			        <div class="alert alert-danger alert-block mt-3">
			            <button type="button" class="close" data-dismiss="alert">x</button>
			            <strong>{!! session('error_message') !!}</strong>
			        </div>
			        @endif
			        @if(Session::has('success_message'))
			        <div class="alert alert-success alert-block mt-3">
			            <button type="button" class="close" data-dismiss="alert">x</button>
			            <strong>{!! session('success_message') !!}</strong>
			        </div>
					@endif
					<form id="password_validate" name="password_validate" class="col-md-10 mx-auto" method="post" action="{{ url('/update-pwd') }}">@csrf
						<div class="mt-4">
							<div class="form-group">
								<label for="current_pwd" class="required_field">Current Password</label>
								<input type="password" class="form-control" id="current_pwd1" name="current_pwd" placeholder="Current Password" autofocus="true" required>
								<span id="chkPwd"></span>
							</div>
							<div class="form-group">
								<label for="new_pwd" class="required_field">New Password</label>
								<input type="password" class="form-control" id="new_pwd" name="new_pwd" placeholder="New Password">
							</div>
							<div class="form-group">
								<label for="confirm_pwd" class="required_field">Confirm Password</label>
								<input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd" required placeholder="Confirm Password">
							</div>
						</div>
						<button type="submit" class="btn btn-primary mt-3 mb-0"><i class="fa fa-check-circle"></i> Update Password</button>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection('content')

@section('scripts')
	<!-- Internal form-elements js -->
	<script src="{{asset('assets/js/form-elements.js')}}"></script>
@endsection