@extends('layouts.app')
@section('styles')
    <!-- Internal Select2 css -->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <style>
    	label.error{
	    	position: absolute;
	    	top: 1px;
	    	left: 130px;
	    }
    </style>
@endsection

@section('content')
	<div class="breadcrumb-header justify-content-between pt-3 mt-0">
	    <div class="my-auto">
	        <div class="d-flex">
	            <h4 class="content-title mb-0 my-auto">Add Equipment Stages</h4>
	        </div>
	    </div>
	</div>

	<div class="row">
	    <div class="col-lg-9 col-md-9 col-md-12">
	        <div class="card p-4">
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
				<form id="addStagesForm" name="addStagesForm" class="col-md-12 mx-auto" method="post" action="{{ url('add-equipment-stages/') }}"> @csrf
					<div class="form-group col-md-10">
	                    <label for="equipment_name" class="field-required">Equipment Type</label>
	                    <select name="equipment_name" id="equipment_name" class="form-control select2" required>
	                        <option value="">-- Select Equipment --</option>
	                        @foreach($equipment_types as $type)
	                        <option value="{{ $type->equipment_type }}">{{ $type->equipment_type }}</option>
	                        @endforeach
	                    </select>
	                </div>
					<div class="form-group col-md-10">
	                    <label for="department_name" class="field-required">Department</label>
	                    <select name="department_name" id="department_name" class="form-control select2" required>
	                        <option value="">-- Select Department --</option>
	                        @foreach($departments as $department)
	                        <option value="{{ $department->id }}">{{ $department->name }}</option>
	                        @endforeach
	                    </select>
	                </div>
					<div class="form-group col-md-12">
						<div class="field_wrapper">
							<label for="stage" class="field-required">Equipment Stages</label>
							<div class="d-flex">
						        <input type="text" class="form-control col-md-6" id="stage" name="stage[]" placeholder="Enter Equipment Stage" required />
						        <input type="number" class="form-control col-md-4 ml-1" id="days" name="days[]" placeholder="Task Duration (in Days)" required />
						        <a href="javascript:void(0);" class="add_button nounderline" title="Add field"> &nbsp;&nbsp;<button type="button" class="btn btn-outline-info"><i class="fa fa-plus"></i> Add</button></a>
					        </div>
						</div>
					</div>
					<div class="form-group col-md-12">
						<button type="submit" class="btn btn-primary float-right"><i class="fa fa-check-circle"></i> Add Stage</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection('content')

@section('scripts')
    <!-- Internal Select2 js-->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/form-validation.js')}}"></script>
@endsection

