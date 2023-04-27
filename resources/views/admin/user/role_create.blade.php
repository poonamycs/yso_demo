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
            <div class="card">
                <form id="addUser" name="addUser" class="col-md-10 mx-auto" method="post" action="{{ url('role/create') }}" enctype="multipart/form-data">@csrf
                    <div class="row mg-b-20 mt-2 mg-10 mt-3">
                        <div class="form-group mb-0">
                            <div class="form-group mg-b-0">
                                <label class="form-label fw-500">Role <span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name" required />
                            </div>
                        </div>
						<label class="form-label fw-500 mt-3">Permissions <span class="tx-danger">*</span></label>
    					<!-- user-role 17 -->
                        <hr class="mb-2 mt-1">
                        <div class="form-group row">
                        	<div class="row">
	                            <div class="col-md-10">
	                                <label class="col-from-label">Add New Order</label>
	                            </div>
	                            <div class="col-md-2">
	                                <label class="switch">
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="1" checked>
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
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="12" checked>
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
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="2">
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
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="3">
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
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="14">
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
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="4">
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
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="5">
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
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="6">
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
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="7">
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
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="8">
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
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="9">
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
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="10">
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
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="15">
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
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="16">
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
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="17">
                                        <span class="slider round"></span>
                                    </label>
	                            </div>
	                        </div>
							<div class="row">
	                            <div class="col-md-10">
	                                <label class="col-from-label">WPM</label>
	                            </div>
	                            <div class="col-md-2">
	                                <label class="switch">
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="18">
                                        <span class="slider round"></span>
                                    </label>
	                            </div>
	                        </div>
							<div class="row">
	                            <div class="col-md-10">
	                                <label class="col-from-label">Planner</label>
	                            </div>
	                            <div class="col-md-2">
	                                <label class="switch">
                                        <input type="checkbox" class="userStatus" name="permissions[]" value="19">
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
                         <!--               <input type="checkbox" class="userStatus" name="permissions[]" value="11">-->
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
                         <!--               <input type="checkbox" class="userStatus" name="permissions[]" value="13">-->
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