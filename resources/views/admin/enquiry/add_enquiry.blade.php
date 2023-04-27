@extends('layouts.app')
@section('styles')
    <!-- Internal Select2 css -->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/telephoneinput/telephoneinput.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
@endsection

@section('content')
	<div class="row d-flex justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">
			<div class="breadcrumb-header justify-content-between m-2">
		        <div class="my-auto">
		            <div class="d-flex">
		                <h4 class="content-title mb-0 my-auto">Add New Enquiry</h4>
		            </div>
		        </div>
		    </div>
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
				<form id="addEnquiry" name="addEnquiry" class="col-md-12 mx-auto" method="post" action="{{ url('add-enquiry/') }}">
					@csrf
					<span class="mb-2"><span class="text-danger">*</span> marked fields are mandatory</span>
					<div class="form-row mt-3">
						<div class="col-md-4">
							<div class="form-group">
								<label for="so" class="required_field">QRN Number</label>
								<input type="text" class="form-control" id="qrn" name="qrn" value="{{ 'QRN-'.$qrn }}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="customer_name" class="required_field">Customer Name</label>
								<input type="text" class="form-control" id="customer_name" name="customer_name" autofocus="true" required/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="region" class="required_field">Region</label>
								<select name="region" id="region" class="form-control select2" required>
			                        <option value="">-- select region --</option>
			                        <option value="MH">MH</option>
			                        <option value="WEST">WEST</option>
			                        <option value="SOUTH">SOUTH</option>
			                        <option value="NORTH">NORTH</option>
			                        <option value="EAST">EAST</option>
			                        <option value="EXPORT">EXPORT</option>
			                    </select>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="city" class="required_field">City</label>
								<input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="enq_date" class="required_field">ENQ Date</label>
								<input type="date" class="form-control" id="enq_date" name="enq_date" required />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="qte_date" class="">QTE Date</label>
								<input type="date" class="form-control" id="qte_date" name="qte_date" />
							</div>
						</div>
						@if(Auth::guard('admin')->User()->admin_role == 'Superadmin')
						<div class="col-md-4">
							<div class="form-group">
			                    <label for="assignee" class="required_field">Assignee</label>
			                    <select name="assignee" id="assignee" class="form-control select2" required>
			                        <option value="">-- select option --</option>
			                        @foreach(App\Models\Admin::where('status','1')->orderBy('name','ASC')->get() as $engineer)
			                        <option value="{{ $engineer->id }}">{{ $engineer->name }}</option>
			                        @endforeach
			                    </select>
			                </div>
						</div>
						@else
						<input type="hidden" name="assignee" value="{{Auth::id()}}">
						@endif
						<div class="col-md-4">
							<div class="form-group">
			                    <label for="price" class="">Price</label>
			                    <input type="number" class="form-control" id="price" name="price" />
			                </div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
			                    <label for="status" class="">Status</label>
			                    <select name="status" id="status" class="form-control">
			                        <option value="">-- Select below option --</option>
			                        <option value="HOT">HOT</option>
			                        <option value="WARM">WARM</option>
			                        <option value="LONG LEAD">LONG LEAD</option>
			                        <option value="BUDGETARY">BUDGETARY</option>
			                        <option value="CANCELLED">CANCELLED</option>
			                        <option value="HOLD">HOLD</option>
			                        <option value="LOST">LOST</option>
			                        <option value="ORDER">ORDER</option>
			                        <option value="PO AWAITED">PO AWAITED</option>
			                    </select>
			                </div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="description" class="required_field">Description</label>
						<textarea type="text" class="form-control" id="description" name="description" rows="2" required /></textarea>
					</div>
			        <h6 class="op-8">Contact Person Details <i class="fa fa-angle-down"></i></h6><hr class="mb-1 mt-1">
			        <div class="form-row">
			            <div class="col-md-4">
							<div class="form-group">
			                    <label for="contact_person" class="required_field">Person Name</label>
			                    <input type="text" class="form-control" id="contact_person" name="contact_person" required />
			                </div>
			            </div>
			            <div class="col-md-4">
							<div class="form-group">
			                    <label for="email" class="" >Email</label>
			                    <input type="email" class="form-control" id="email" name="email" />
			                </div>
			            </div>
			            <div class="col-md-4">
							<div class="form-group">
			                    <label for="phone" class="">Contact No.</label>
			                    {{-- <input type="text" class="form-control" id="phone" name="phone" /> --}}
			                    <div class="telephone-input">
									<input type="tel" id="mobile-number" name="phone">
								</div>
			                </div>
			            </div>
			        </div>
					
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary float-right addEnq"><i class="fa fa-check-circle"></i> Add Enquiry</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
@section('scripts')
    <!-- Internal Select2 js-->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal  Parsley.min js -->
    <script src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!--Internal  Perfect-scrollbar js -->
    <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{asset('assets/js/form-validation.js')}}"></script>
    <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    
	<script src="{{asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>

	<script src="{{asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
	<script src="{{asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
@endsection