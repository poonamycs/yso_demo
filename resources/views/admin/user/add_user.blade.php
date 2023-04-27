@extends('layouts.app')
@section('styles')
    <!-- Internal Select2 css -->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8 col-md-8 col-md-12">
            <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                    <div class="d-flex">
                        <h4 class="content-title mb-0 my-auto">Add User</h4>
                    </div>
                </div>
            </div>
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
                <form id="addUser" name="addUser" class="col-md-12 mt-2 mx-auto" method="post" action="{{ url('add-user/') }}" enctype="multipart/form-data">@csrf
                    <div class="row mg-b-20 mt-2 mg-10">
                        <div class="form-group">
                            <div class="col-lg-8 col-md-8 form-group mg-b-0">
                                <label class="form-label">Name <span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-8 col-md-8 form-group mg-b-0">
                                <label class="form-label">Email <span class="tx-danger">*</span></label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-8 col-md-8 form-group mg-b-0">
                                <label class="form-label">Password<span class="tx-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" value="" required />
                                <span toggle="#password" class="fa fa-fw fa-eye-slash field-icon" id="show-pass"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-8 col-md-8 form-group mg-b-0">
                                <label class="form-label">Role<span class="tx-danger">*</span></label>
                                <select name="role" id="role" class="form-control select2" required>
                                    <option value="">-- Select Role --</option>
                                    @if(Auth::guard('admin')->User()->admin_role == 'Superadmin')
                                    <option value="Superadmin">Superadmin</option>
                                    @endif
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-8 col-md-8 form-group mg-b-0">
                                <label class="form-label">Profile Image<span class="tx-danger">*</span></label>
                                <input type="file" name="image" class="dropify" data-height="150" accept="image/*" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-8 col-md-8 form-group mg-b-0">
                                <label class="form-label">Status<span class="tx-danger">*</span></label>
                                <label class="switch">
                                    <input type="checkbox" name="status" id="userStatus" value="1">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-lg-8 col-md-8 text-center">
                                <button class="btn btn-main-primary pd-x-20 addUser" type="submit"><i class="fa fa-check-circle"></i> Save</button>
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
    <script src="{{asset('assets/js/form-validation.js')}}"></script>
    <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
@endsection