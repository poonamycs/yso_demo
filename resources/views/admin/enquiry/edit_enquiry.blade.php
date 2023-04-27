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
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="breadcrumb-header justify-content-between m-2">
                <div class="my-auto">
                    <div class="d-flex">
                        <h4 class="content-title mb-0 my-auto">Edit Enquiry</h4>
                    </div>
                </div>
            </div>
            <div class="card p-4">
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
				<form id="editEnquiry" name="editEnquiry" class="col-md-12 mx-auto" method="post" action="{{ url('edit-enquiry/'.$row->id) }}">@csrf    <span class="mb-2"><span class="text-danger">*</span> marked fields are mandatory</span>
                    <div class="form-row mt-3">
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="so" class="required_field">QRN Number</label>
                                <input type="text" class="form-control" id="qrn" name="qrn" readonly="true" value="{{ $row->qrn }}">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="customer_name" class="required_field">Customer Name</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $row->customer_name }}" required />
                            </div>
                        </div>                        
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="region" class="required_field">Region</label>
                                <select name="region" id="region" class="form-control" required>
                                    <option @if($row->region == 'MH') selected @endif value="MH">MH</option>
                                    <option @if($row->region == 'WEST') selected @endif value="WEST">WEST</option>
                                    <option @if($row->region == 'SOUTH') selected @endif value="SOUTH">SOUTH</option>
                                    <option @if($row->region == 'NORTH') selected @endif value="NORTH">NORTH</option>
                                    <option @if($row->region == 'EAST') selected @endif value="EAST">EAST</option>
                                    <option @if($row->region == 'EXPORT') selected @endif value="EXPORT">EXPORT</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="city" class="required_field">City</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{ $row->city }}" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="enq_date" class="required_field">ENQ Date</label>
                                <input type="date" class="form-control" id="enq_date" name="enq_date" value="@if($row->enq_date){{ date('Y-m-d', strtotime($row->enq_date)) }}@endif" required />
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="qte_date" class="">QTE Date </label>
                                <input type="date" class="form-control" id="qte_date" name="qte_date" value="@if($row->qte_date){{ date('Y-m-d', strtotime($row->qte_date)) }}@endif" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        @if(Auth::guard('admin')->User()->admin_role == 'Superadmin')
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="assignee" class="required_field">Assignee</label>
                                <select name="assignee" id="assignee" class="form-control select2" required>
                                    @foreach(App\Models\Admin::where('status','1')->orderBy('name','ASC')->get() as $engineer)
                                    <option value="{{ $engineer->id }}" @if($row->assignee == $engineer->id) selected @endif>{{ $engineer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @else
                        <input type="hidden" name="assignee" value="{{Auth::id()}}">
                        @endif
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="price" class="required_field">Price</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{ $row->price }}" />
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="status" class="required_field">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option @if($row->status == '') selected @endif value="">-- Select below option --</option>
                                    <option @if($row->status == 'HOT') selected @endif value="HOT">HOT</option>
                                    <option @if($row->status == 'WARM') selected @endif value="WARM">WARM</option>
                                    <option @if($row->status == 'LONG LEAD') selected @endif value="LONG LEAD">LONG LEAD</option>
                                    <option @if($row->status == 'BUDGETARY') selected @endif value="BUDGETARY">BUDGETARY</option>
                                    <option @if($row->status == 'CANCELLED') selected @endif value="CANCELLED">CANCELLED</option>
                                    <option @if($row->status == 'HOLD') selected @endif value="HOLD">HOLD</option>
                                    <option @if($row->status == 'LOST') selected @endif value="LOST">LOST</option>
                                    <option @if($row->status == 'ORDER') selected @endif value="ORDER">ORDER</option>
                                    <option @if($row->status == 'PO AWAITED') selected @endif value="PO AWAITED">PO AWAITED</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="description" class="required_field">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description" rows="2" required />{{ $row->description }}</textarea>
                    </div>

                    <h6 class="op-8">Contact Person Details <i class="fa fa-angle-down"></i></h6><hr class="mb-1 mt-1">
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contact_person" class="required_field">Person Name</label>
                                <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ $row->contact_person }}" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email" class="">Email ID</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $row->email }}" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone" class="">Contact No.</label>
                                <input type="tel" class="form-control" id="mobile-number" name="phone" value="{{ $row->phone }}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary editEnq"><i class="fa fa-check-circle"></i> Save</button>
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