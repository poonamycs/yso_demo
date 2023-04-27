@extends('layouts.app')
@section('styles')
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/wizard-form.css')}}" rel="stylesheet" />
	<link rel="stylesheet" href="{{asset('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')
	<div class="row">
		<div class="container-fluid">
			<div class="breadcrumb-header justify-content-between">
		        <div class="my-auto">
		            <div class="d-flex">
		                <h5 class="content-title mb-0 my-auto">Add New Field</h5>
		            </div>
		        </div>
		    </div>
		    
		    @if(Session::has('error_message'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-bs-dismiss="alert">x</button>
                <strong>{!! session('error_message') !!}</strong>
            </div>
            @endif
            @if(Session::has('success_message'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-bs-dismiss="alert">x</button>
                <strong>{!! session('success_message') !!}</strong>
            </div>
            @endif
		    <form id="addTask" name="addTask" class="mx-auto" method="post" action="{{ url('add-wpm-task/') }}" enctype="multipart/form-data">@csrf
		        <div class="mb-3">
		                <span class="mb-1"><span class="text-danger">*</span> marked fields are mandatory</span>
						<div class="row mg-b-20 mt-2 mg-10">
							<div class="form-group">
								<div class="col-lg-8 col-md-8 form-group mg-b-0">
									<label class="form-label">Label <span class="tx-danger">*</span></label>
									<input type="text" class="form-control" id="label" name="label" placeholder="Enter label" required />
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-8 col-md-8 form-group mg-b-0">
									<label class="form-label">Data Type <span class="tx-danger">*</span></label>
									<select class="form-control" id="data_type" name="data_type">
										<option value="Integer">Integer</option>
										<option value="String">String</option>
										<option value="Float">Float</option>
										<option value="Date">Date</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-8 col-md-8 form-group mg-b-0">
									<label class="form-label">Value <span class="tx-danger">*</span></label>
									<input type="text" class="form-control" id="value" name="value" placeholder="Enter value" required />
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-8 col-md-8 text-center">
									<button class="btn btn-main-primary pd-x-20 addUser" type="submit"><i class="fa fa-check-circle"></i> Save</button>
								</div>
							</div>
						</div>
		        </div>
		    </form>
		</div>
    </div>
@endsection

@section('scripts')
	<script>
		$(document).ready(function(){
			var form = $("#addTask");
				form.validate({
				    errorPlacement: function errorPlacement(error, element) { element.after(error); },
				    rules: {
						label: {
							required: true,
							minlength: 3,
						},
						data_type: {
							required: true,
						},
						value: {
							required: true,
						},
					},
					messages: {
						label: {
							required : "Please enter label",
							minlength : "Please enter more data",
						},
						data_type: {
							required : "Please select data type",
						},
						value: {
							required : "Please enter value",
						},
					},
				});
			
			});
	</script>
	
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/form-validation.js')}}"></script>
    {{-- <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script> --}}
	<script src="{{asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
	<script src="{{asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
	<script src="{{asset('assets/js/form-wizard.js')}}"></script>
@endsection