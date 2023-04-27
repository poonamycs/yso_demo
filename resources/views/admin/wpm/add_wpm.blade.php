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
		                <h5 class="content-title mb-0 my-auto">Add New Task</h5>
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
						<div class="form-row mt-2">
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<label for="so" class="required_field">SO Number</label>
									<input type="text" class="form-control" id="so" name="so" readonly>
									<input type="hidden" name="equip_id" value="{{$equip_id}}">
								</div>
							</div>
							
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<label for="task_name" class="required_field">Task Name</label>
									<input type="text" class="form-control" id="task_name" name="task_name" required>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<label for="po_date" class="required_field">BaseLine Date</label>
									<input type="date" class="form-control" id="baseline_date" name="baseline_date" required  />
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<label for="delivery_date" class="required_field">Completion Date</label>
									<input type="date" class="form-control" id="completion_date" name="completion_date" required  />
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<label for="category" class="">Category</label>
									<select name="category" id="category" class="form-control" required>
				                        <option value="">-- Select Category from below --</option>
				                		<option value="Action">Action</option>
										<option value="Info">Info</option>
				                    </select>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<label for="so" class="required_field">Description</label>
									<textarea type="text" class="form-control" id="description" name="description" required></textarea>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
				                    <label for="equipment" class="required_field">Assign User</label>
				                    <select name="action_user[]" id="action_user" multiple="multiple" class="SlectBox form-control select2" required>
				                        <option value="">-- Select User from below --</option>
				                        @foreach($users as $user)
											<option value="{{$user->id}}">{{$user->name}}</option>
										@endforeach
				                    </select>
				                </div>
				            </div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
				                    <label for="priority" class="required_field">Priority</label>
				                    <select name="priority" id="priority" class="form-control" required>
				                        <option value="">-- Select Priority from below --</option>
				                		<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
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
				                    <button class="btn btn-primary btn-sm" type="submit">Save</button>
				                </div>
				            </div>
				        </div>
		        </div>
		    </form>
		</div>

		{{-- <div class="col-lg-12 col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="main-content-label mg-b-5">Basic Wizard With Validation</div>
					<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
					<div id="wizard2">
							<hr>
							<p class="mg-b-20"><span class="text-danger">*</span> marked fields are mandatory</p>

							<div class="form-row mt-3">
								<div class="col-md-6">
									<div class="form-group">
										<label for="so" class="required_field">SO Number</label>
										<input type="text" class="form-control" id="so" name="so" required >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="po" class="required_field">PO Number</label>
										<input type="text" class="form-control" id="po" name="po" required placeholder="Enter PO Number" autofocus="true" value="987" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="client_name" class="required_field">Client Name</label>
										<input type="text" class="form-control" id="client_name" required name="client_name" placeholder="Enter Client Name" value="987" />
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="po_date" class="required_field">PO Date</label>
										<input type="date" class="form-control" id="po_date" name="po_date" required value="2021-12-31" />
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="delivery_date" class="required_field">Delivery Date</label>
										<input type="date" class="form-control" id="delivery_date" name="delivery_date" required value="2021-12-31" />
									</div>
								</div>
							</div>

							<div class="form-row">
								<div class="col-md-6">
									<div class="form-group">
					                    <label for="tpi" class="required_field">TPI</label>
					                    <select name="tpi" id="tpi" class="form-control" required>
					                        <option value="">-- Select option from below --</option>
					                        <option value="Yes" selected="">Yes</option>
					                        <option value="No">No</option>
					                    </select>
					                </div>
					            </div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="tpi_agency" class="">TPI Agency</label>
										<input type="text" class="form-control" id="tpi_agency" name="tpi_agency" placeholder="Enter TPI Agency" />
									</div>
									<!-- <div class="did-floating-label-content">
									  	<input class="did-floating-input form-control" type="text" placeholder=" ">
									  	<label class="did-floating-label">Sale Price</label>
									</div> -->
								</div>
					        </div>
					</div>
				</div>
			</div>
		</div> --}}

        {{-- <div class="col-lg-12 col-md-12">
            <div class="card">
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
				<!-- <div class="card-body mb-3">
					<form id="addOrder" name="addOrder" class="col-md-10 mx-auto" method="post" action="{{ url('add-order/') }}">@csrf
						<span class="mb-2"><span class="text-danger">*</span> marked fields are mandatory</span>
						<div class="form-row mt-3">
							<div class="col-md-6">
								<div class="form-group">
									<label for="so" class="required_field">SO Number</label>
									<input type="text" class="form-control" id="so" name="so" value="{{ $so_num }}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="po" class="required_field">PO Number</label>
									<input type="text" class="form-control" id="po" name="po" placeholder="Enter PO Number" autofocus="true"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="client_name" class="required_field">Client Name</label>
									<input type="text" class="form-control" id="client_name" name="client_name" placeholder="Enter Client Name"/>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="po_date" class="required_field">PO Date</label>
									<input type="date" class="form-control" id="po_date" name="po_date" />
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="delivery_date" class="required_field">Delivery Date</label>
									<input type="date" class="form-control" id="delivery_date" name="delivery_date" />
								</div>
							</div>
						</div>

						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
				                    <label for="tpi" class="required_field">TPI</label>
				                    <select name="tpi" id="tpi" class="form-control">
				                        <option value="">-- Select option from below --</option>
				                        <option value="Yes">Yes</option>
				                        <option value="No">No</option>
				                    </select>
				                </div>
				            </div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="tpi_agency" class="">TPI Agency</label>
									<input type="text" class="form-control" id="tpi_agency" name="tpi_agency" placeholder="Enter TPI Agency" />
								</div>
							</div>
				        </div>

			            <div class="table-responsive">  
			                <table class="table table-bordered field_wrapper" id="dynamic_field-">  
			                    <tr>  
			                        <td>
			                        	<div class="form-row">
				                        	<div class="col-md-6">
												<div class="form-group">
								                    <label for="equipment_type" class="required_field">Equipment Type</label>
								                    <select name="equipment_type[]" id="equipment_type" onchange="equipmentType('0',{{$so_num}},{{date('Y')}})" class="form-control" required>
								                        <option value="">-- Select option from below --</option>
								                        @foreach($equipTypes as $row)
								                        <option value="{{ $row->equipment_type }}" data-type="{{ $row->abbr }}">{{ $row->equipment_type }}</option>
								                        @endforeach
								                    </select>
								                </div>
								            </div>
								            <div class="col-md-6">
										        <div class="form-group">
													<label for="mfr" class="">MFR Number</label>
													<input type="text" class="form-control disabled" id="mfr0" required="" name="mfr[]" value="" />
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label for="equipment_name" class="required_field">Equipment Name</label>
													<input type="text" class="form-control" id="equipment_name" required="" name="equipment_name[]" placeholder="Enter Equipment Name" />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="tag" class="">Tag Number</label>
													<input type="text" class="form-control" id="tag" name="tag[]" placeholder="Enter Tag Number" />
												</div>
											</div>
										</div>
				                    </td>
			                        <td class="align-middle text-center"><button type="button" id="add" class="btn btn-outline-success btn-sm"><i class="fa fa-plus"></i> Add More</button></td>  
			                    </tr>  
			                </table>
			            </div>

						<div class="form-row">
							<div class="col-sm-12 form-group">
								<label class="form-label">Total Order Size</label>
								<input type="text" class="form-control" id="size" placeholder="">
							</div>
						</div>

						<div class="field_wrapper1">
							<div class="form-row mb-4">
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label class="form-label">Payment Type</label>
										<select class="form-select form-control form-control-lg" name="type[]">
											<option value="Advanced">Advanced</option>
											<option value="Installment">Installment</option>
										</select>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-0">
										<label class="form-label">Amount <i class="fa fa-question-circle" data-bs-toggle="tooltip" title="Test"></i></label>
										<input type="number" name="amount[]" class="form-control" required="">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-0">
										<label class="form-label">Date <i class="fa fa-question-circle" data-bs-toggle="tooltip" title="Test"></i></label>
										<input type="date" name="date[]" class="form-control" required="">
									</div>
								</div>
								<div class="col-sm-3">
									<label class="form-label invisible"> <i class="fa fa-question-circle"></i></label>
									<div class="form-group mb-0">
										<button type="button" class="btn btn-outline-info" id="add1"><i class="fa fa-plus-circle"></i> Add</button>
									</div>
								</div>
							</div>
						</div>
			            <center>
							<div class="form-group col-md-6">
								<button type="submit" class="btn btn-primary float-right btn-block"><b><i class="fa fa-check"></i> Add Order</b></button>
							</div>
						</center>
					</form>
				</div> -->
            </div>
        </div> --}}
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