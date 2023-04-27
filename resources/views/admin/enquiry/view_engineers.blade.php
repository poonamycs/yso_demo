@extends('layouts.app')
@section('styles')
    <link href="{{asset('assets/plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/datatable/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/responsive.bootstrap5.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('content')

    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">All Enginners</h4>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pe-1 mb-xl-0">
                <button data-bs-toggle="modal" data-bs-target="#addUserModal" class="modal-effect btn btn-primary btn-block"><span class="btn-icon-wrapper pr-2"><i class="fa fa-plus-circle"></i></span> Add Engineer</button>
            </div>
        </div>
    </div>
    
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-body table-responsive mb-3">
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
                        <table id="example" class="table table-hover table-striped table-bordered w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Abbrevation</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($engineers as $engineer)
                                <tr>
                                    <td class="text-center">{{ $engineer->id }}</td>
                                    <td class="text-center">{{ $engineer->name }}</td>
                                    <td class="text-center">{{ $engineer->abbr }}</td>
                                    <td class="text-center">                                                
                                        @if(Auth::guard('admin')->User()->id != $engineer->id)
                                        <form action="{{ url('update-engineer-status/'.$engineer->id) }}" method="post">@csrf
                                            <label class="switch">
                                                <input type="checkbox" class="userStatus" data-id="{{$engineer->id}}" data-status="{{$engineer->status}}" name="status" value="1" @if($engineer->status=="1") checked @endif>
                                                <span class="slider round"></span>
                                            </label>
                                        </form>
                                        @else
                                        <button class="btn btn-default">NA</button>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button class="btn mr-1 mb-1 btn-outline-info btn-shadow btn-sm" onclick="editEngg({{$engineer->id}})" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit Engineer Details"><i class="fa fa-pencil-alt"></i> </button>
                                        @if(Auth::User()->admin_role == 'Superadmin')
                                        <button rel="{{ $engineer->id }}" rel1="delete-engineer" class="btn mr-1 mb-1 btn-outline-danger btn-shadow btn-sm deleteBtn" title="Remove Engineer"><i class="fa fa-trash"></i></button>
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

    <!-- add new engineer modal -->
    <div class="modal fade bd-example-modal-lg" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> Add Engineer </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="main-card card mb-0">
                    <div class="card-body">
                        <form id="addUser" name="addUser" class="col-md-10 mx-auto" method="post" action="{{ url('add-engineer/') }}" autocomplete="false">@csrf
                            <div class="form-group">
                                <label for="name" class="field-required">Name</label>
                                <input type="text" class="form-control" name="name" required="" />
                            </div>
                            <div class="form-group">
                                <label for="abbr" class="field-required">Abbrevation</label>
                                <input type="text" class="form-control" name="abbr" required="" />
                            </div>
                            <div class="form-group">
                                <label for="role" class="">Status &nbsp;&nbsp;&nbsp;</label>
                                <input type="checkbox" name="status" checked data-toggle="toggle" data-onstyle="primary" value="1">
                            </div>

                            <div class="form-group">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- edit engg modal -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLongTitle"><i class="fa fa-pencil"></i><span> Update Enginner Details</span></h5>
                    <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="main-card card">
                    <div class="card-body">
                        <form id="editUser" name="editUser" class="col-md-10 mx-auto" method="post" action="{{ url('edit-engineer') }}">@csrf
                            <div class="form-row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="client_name" class="field-required">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="po_date" class="field-required">Abbrevatioin</label>
                                        <input type="text" class="form-control" id="abbr" name="abbr" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <b>Save Changes</b></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        function editEngg(id){
            $.ajax({
                type:"get",
                url:"{{url('get-engineer-detail')}}",
                data:{id:id},
                success:function(data){
                    $('#name').val(data['name']);
                    $('#abbr').val(data['abbr']);
                    $('#editUser').attr('action', '{{url('edit-engineer')}}'+'/'+data['id']);      
                }
            });
        }
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
                    url:'{{ URL::to('update-engineer-status') }}',
                    data:{
                        userid:userid,
                        status:status,
                        _token:token,
                    },
                    success:function(resp){
                        // alert(resp);
                    },
                    error:function(){
                        console.log("Something went wrong");
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