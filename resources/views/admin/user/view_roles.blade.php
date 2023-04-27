@extends('layouts.app')
@section('content')

    @section('styles')
        <link href="{{asset('assets/plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/datatable/responsive.dataTables.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/responsive.bootstrap5.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    @endsection
    <div class="breadcrumb-header justify-content-between pt-3 mt-0">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">All Roles</h4>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pe-1 mb-xl-0">
                <a href="{{url('role/create')}}" class="modal-effect btn btn-primary btn-block btn-sm"><span class="btn-icon-wrapper pr-2"><i class="fa fa-plus-circle"></i></span> Add Role</a>
            </div>
        </div>
    </div>

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">All Roles</h4>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('error_message'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
                        <strong>{!! session('error_message') !!}</strong>
                    </div>
                    @endif
                    @if(Session::has('success_message'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
                        <strong>{!! session('success_message') !!}</strong>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap table-hover datatab">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0 text-center">ID</th>
                                    <th class="border-bottom-0 text-left">Name</th>
                                    <th class="border-bottom-0 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td class="text-center align-middle">{{ $role->id }}</td>
                                    <td class="text-left align-left">{{ $role->name }}</td>
                                    <td class="text-center align-middle">
                                        <a href="{{url('role/edit/'.base64_encode($role->id))}}" class="btn mr-1 mb-1 btn-outline-info btn-shadow btn-sm" data-bs-toggle="tooltip" title="Edit Role"><i class="fa fa-pencil-alt"></i></a>
                                        @if(Auth::guard('admin')->User()->admin_role == 'Superadmin')
                                        <a href="javascript:void" rel="{{ base64_encode($role->id) }}" rel1="delete-role" class="btn mr-1 mb-1 btn-outline-danger btn-shadow btn-sm deleteBtn" data-bs-toggle="tooltip" title="Delete Role"><i class="fa fa-trash"></i></a>
                                        @else
                                        <button class="btn mr-1 mb-1 btn-default btn-shadow btn-sm">NA</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

    <script>
        // $(function () {
        //     $("#example").DataTable({
        //       "responsive": true, "lengthChange": false, "autoWidth": false,
        //       "buttons": ["copy", "csv", "excel", "pdf", "print"]
        //     });
        // });
    </script>

    <script>
        $(document).ready(function(){
            $('.userStatus').change(function(e){
                var userid = $(this).data('id');
                var status = $(this).data('status');
                e.preventDefault();
                var token=$('#token-message').val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'post',
                    url:'{{ URL::to('update-user-status') }}',
                    data:{
                        userid:userid,
                        status:status,
                        _token:token,
                    },
                    success:function(resp){
                        // alert(resp);
                    },
                    error:function(){
                        alert("Something went wrong");
                    }
                });
            });
        });
    </script>
    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>

    <!--Internal  Datatable js -->
    <script src="{{asset('assets/js/table-data.js')}}"></script>
@endsection