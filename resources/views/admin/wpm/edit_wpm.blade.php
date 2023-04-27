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
		                <h5 class="content-title mb-0 my-auto">Edit New Task</h5>
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
		    <form id="addTask" name="addTask" class="mx-auto" method="post" action="{{ url('update-wpm-task/') }}" enctype="multipart/form-data">@csrf
		        <div class="mb-3">
		                <span class="mb-1"><span class="text-danger">*</span> marked fields are mandatory</span>
						<div class="form-row mt-2">
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<label for="so" class="required_field">SO Number</label>
									<input type="text" class="form-control" id="so" name="so" value="{{$wpm_task->order_so}}" readonly>
									<input type="hidden" name="id" value="{{$wpm_task->id}}">
									<input type="hidden" name="equip_id" value="{{Request()->equip_id}}">
								</div>
							</div>
							
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<label for="task_name" class="required_field">Task Name</label>
									<input type="text" class="form-control" id="task_name" name="task_name" value="{{$wpm_task->task_name}}" required>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<label for="po_date" class="required_field">BaseLine Date</label>
									<input type="date" class="form-control" id="baseline_date" name="baseline_date" value="{{$wpm_task->baseline_target_date}}" required/>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<label for="delivery_date" class="required_field">Completion Date</label>
									<input type="date" class="form-control" id="completion_date" name="completion_date" value="{{$wpm_task->completion_date}}" required/>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<label for="category" class="">Category</label>
									<select name="category" id="category" class="form-control" required>
				                        <option value="">-- Select Category from below --</option>
				                		<option value="Action" @if($wpm_task->category == "Action")Selected @endif>Action</option>
										<option value="Info" @if($wpm_task->category == "Info")Selected @endif>Info</option>
				                    </select>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<label for="so" class="required_field">Description</label>
									<textarea type="text" class="form-control" id="description" name="description" required>{{$wpm_task->description}}</textarea>
								</div>
							</div>
							<?php $user_name = json_decode($wpm_task->action_user);?>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
				                    <label for="equipment" class="required_field">Assign User</label>
				                    <select name="action_user[]" id="action_user" multiple="multiple" class="SlectBox form-control select2" required>
				                        <option value="">-- Select User from below --</option>
				                        @foreach($users as $user)
											<option value="{{$user->id}}" {{ (in_array($user->id, $user_name)) ? 'selected' : '' }}>{{$user->name}}</option>
										@endforeach
				                    </select>
				                </div>
				            </div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
				                    <label for="priority" class="required_field">Priority</label>
				                    <select name="priority" id="priority" class="form-control" required>
				                        <option value="">-- Select Priority from below --</option>
				                		<option value="1" @if($wpm_task->priority == "1")Selected @endif>1</option>
										<option value="2" @if($wpm_task->priority == "2")Selected @endif>2</option>
										<option value="3" @if($wpm_task->priority == "3")Selected @endif>3</option>
				                    </select>
				                </div>
				            </div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
				                </div>
				            </div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
				                </div>
				            </div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
				                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
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
						so: {
							required: true,
						},
						Description: {
							required: true,
							minlength: 3,
						},
						task_name: {
							required: true,
							minlength: 3,
							maxlength: 70,
						},
						baseline_date: {
							required: true,
						},
						completion_date: {
							required: true,
						},
						category: {
							required: true,
						},
						action_user: {
							required: true,
						},
						priority: {
							required: true,
						},
					},
					messages: {
						so: {
							required : "Please enter SO number",
						},
						description: {
							required : "Please enter description",
							minlength : "Please enter more data",
						},
						task_name: {
							required : "Please enter name",
							minlength : "Please enter valid name",
							maxlength : "Please enter valid name",
						},
						baseline_date: {
							required : "Please enter PO date",
						},
						completion_date: {
							required : "Please enter delivery date",
						},
						category: {
							required : "Please select option",
						},
						action_user: {
							required : "mandatory field",
							maxlength : "Max length is 70 charcters",
						},
						priority: {
							required : "Please select option",
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