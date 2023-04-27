@extends('layouts.app')
@section('styles')
    <!-- Internal Select2 css -->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-lg-8 col-md-8">

		    <div class="breadcrumb-header justify-content-between">
		        <div class="my-auto">
		            <div class="d-flex">
		                <h4 class="content-title mb-0 my-auto">Role Information</h4>
		            </div>
		        </div>
		    </div>
		    @php 
		    	$permissions = json_decode($role->permissions);
		    @endphp
            <div class="card">
                <form id="addUser" name="addUser" class="col-md-10 mx-auto" method="post" action="{{ url('role/edit/'.base64_encode($role->id)) }}" enctype="multipart/form-data">@csrf
                    <div class="row mg-b-20 mt-2 mg-10 mt-3">
                        <div class="form-group mb-0">
                            <div class="form-group mg-b-0">
                                <label class="form-label fw-500">Role <span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{$role->name}}" required />
                            </div>
                        </div>
						<label class="form-label fw-500 mt-3">Permissions <span class="tx-danger">*</span></label>
                        <hr class="mb-2 mt-1">
                        <div class="form-group row">
                        	<div class="row">
	                            <div class="col-md-10">
	                                <label class="col-from-label">Add New Order</label>
	                            </div>
	                            <div class="col-md-2">
	                                <label class="switch">
                                        <input type="checkbox" name="permissions[]" value="1" @if(in_array("1", $permissions)) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-10">
	                                <label class="col-from-label">Edit/Delete Order</label>
	                            </div>
	                            <div class="col-md-2">
	                                <label class="switch">
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="12" @if(in_array("12", $permissions)) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-10">
	                                <label class="col-from-label">View Orders</label>
	                            </div>
	                            <div class="col-md-2">
	                                <label class="switch">
                                        <input type="checkbox" name="permissions[]" value="2" @if(in_array("2", $permissions)) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-10">
	                                <label class="col-from-label">Order Payment Cashflow</label>
	                            </div>
	                            <div class="col-md-2">
	                                <label class="switch">
                                        <input type="checkbox" name="permissions[]" value="3" @if(in_array("3", $permissions)) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-10">
	                                <label class="col-from-label">Add/Update/Delete Payment Cycle</label>
	                            </div>
	                            <div class="col-md-2">
	                                <label class="switch">
                                        <input type="checkbox" name="permissions[]" value="14" @if(in_array("14", $permissions)) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-10">
	                                <label class="col-from-label">View Order Stages</label>
	                            </div>
	                            <div class="col-md-2">
	                                <label class="switch">
                                        <input type="checkbox" name="permissions[]" value="4" @if(in_array("4", $permissions)) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-10">
	                                <label class="col-from-label">Add User</label>
	                            </div>
	                            <div class="col-md-2">
	                                <label class="switch">
                                        <input type="checkbox" name="permissions[]" value="5" @if(in_array("5", $permissions)) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-10">
	                                <label class="col-from-label">View Users</label>
	                            </div>
	                            <div class="col-md-2">
	                                <label class="switch">
                                        <input type="checkbox" name="permissions[]" value="6" @if(in_array("6", $permissions)) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-10">
	                                <label class="col-from-label">Equipment Types</label>
	                            </div>
	                            <div class="col-md-2">
	                                <label class="switch">
                                        <input type="checkbox" name="permissions[]" value="7" @if(in_array("7", $permissions)) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-10">
	                                <label class="col-from-label">Equipment Stages</label>
	                            </div>
	                            <div class="col-md-2">
	                                <label class="switch">
                                        <input type="checkbox" name="permissions[]" value="8" @if(in_array("8", $permissions)) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-10">
	                                <label class="col-from-label">Add Enquiry</label>
	                            </div>
	                            <div class="col-md-2">
	                                <label class="switch">
                                        <input type="checkbox" name="permissions[]" value="9" @if(in_array("9", $permissions)) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-10">
	                                <label class="col-from-label">View Enquiries</label>
	                            </div>
	                            <div class="col-md-2">
	                                <label class="switch">
                                        <input type="checkbox" name="permissions[]" value="10" @if(in_array("10", $permissions)) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-10">
	                                <label class="col-from-label">Order Booking Sheet</label>
	                            </div>
	                            <div class="col-md-2">
	                                <label class="switch">
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="15" @if(in_array("15", $permissions)) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-10">
	                                <label class="col-from-label">OBF</label>
	                            </div>
	                            <div class="col-md-2">
	                                <label class="switch">
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="16" @if(in_array("16", $permissions)) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-10">
	                                <label class="col-from-label">Payment Tracker</label>
	                            </div>
	                            <div class="col-md-2">
	                                <label class="switch">
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="17" @if(in_array("17", $permissions)) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
	                            </div>
	                        </div>
	                        <!--<div class="row">-->
	                        <!--    <div class="col-md-10">-->
	                        <!--        <label class="col-from-label">Enginner Section</label>-->
	                        <!--    </div>-->
	                        <!--    <div class="col-md-2">-->
	                        <!--        <label class="switch">-->
                         <!--               <input type="checkbox" name="permissions[]" value="11" @if(in_array("11", $permissions)) checked @endif>-->
                         <!--               <span class="slider round"></span>-->
                         <!--           </label>-->
	                        <!--    </div>-->
	                        <!--</div>-->
	                        <!--<div class="row">-->
	                        <!--    <div class="col-md-10">-->
	                        <!--        <label class="col-from-label">Planning Section</label>-->
	                        <!--    </div>-->
	                        <!--    <div class="col-md-2">-->
	                        <!--        <label class="switch">-->
                         <!--               <input type="checkbox" name="permissions[]" value="11" @if(in_array("13", $permissions)) checked @endif>-->
                         <!--               <span class="slider round"></span>-->
                         <!--           </label>-->
	                        <!--    </div>-->
	                        <!--</div>-->
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