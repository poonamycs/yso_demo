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
                <h4 class="content-title mb-0 my-auto">All Users <span class="badge bg-dark h6 mb-0">{{count($users)}}</span></h4>
            </div>
        </div>
        @if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('5', json_decode(Auth::guard('admin')->User()->role->permissions)))
        <div class="d-flex my-xl-auto right-content">
            <div class="pe-1 mb-xl-0">
                <a href="{{url('add-user')}}" class="modal-effect btn btn-primary btn-block btn-sm"><span class="btn-icon-wrapper pr-2"><i class="fa fa-plus-circle"></i></span> Add User</a>
            </div>
        </div>
        @endif
    </div>

    <div class="card mb-1 containet-fluid">
        <form action="{{url('view-users')}}" method="get">@csrf
            <div class="row row-sm d-flex px-3">
                <div class="col-md-1 col-sm-4">
                    <div class="form-group mt-2 mb-2">
                        <label class="form-label">Filter</label>
                        {{-- <button type="submit" class="btn btn-primary btn-primary-gradient btn-rounded">Submit</button> --}}
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="form-group mt-2 mb-2">
                        <select name="role_id" id="role_id" class="form-control select2" onchange="this.form.submit()">
                            <option value="">-- All Roles --</option>
                            @foreach(App\Models\Role::get() as $role)
                            <option value="{{$role->id}}"  @if($role->id == $role_id) selected @endif>{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="form-group mt-2 mb-2">
                        <select name="status" id="status" class="form-control select2" onchange="this.form.submit()">
                            <option value="">-- All Users --</option>
                            <option value="1"  @if($status == '1') selected @endif>Active</option>
                            <option value="0"  @if($status == '0') selected @endif>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="form-group mt-2 mb-2">
                       <input type="text" name="name" id="name" placeholder="Search by Name or Email" value="{{$name}}" class="form-control select2" onchange="this.form.submit()">
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="form-group mt-2 mb-2">
                        <a href="{{url('view-users')}}">Clear</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card mg-b-20">
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
                        <table class="table key-buttons text-md-nowrap table-hover datatab">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0 text-center">ID</th>
                                    <th class="border-bottom-0 text-left">Name</th>
                                    <th class="border-bottom-0 text-center">Email</th>
                                    <th class="border-bottom-0 text-center">Role</th>
                                    <th class="border-bottom-0 text-center">Status</th>
                                    <th class="border-bottom-0 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;?>
                                @foreach($users as $user)
                                <tr>
                                    <td class="text-center align-middle">{{ $i++ }}</td>
                                    <td class="text-left">
                                        <div class="align-middle d-flex">
                                            @if($user->image)
                                            <div class="main-avatar avatar @if($user->isOnline()) online @else offline @endif"> <img class="rounded-50 bg-white border" src="{{asset('assets/img/user/'.$user->image)}}" height="40"> </div>
                                            @else
                                            <div class="main-avatar avatar @if($user->isOnline()) online @else offline @endif"> {{mb_substr(ucfirst($user->name) , 0, 1)}} </div>
                                            @endif 
                                            <div class="align-self-center">&nbsp;&nbsp;{{ $user->name }}</div>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle"><a href="mailto:{{$user->email}}">{{ $user->email }}</a></td>
                                    <td class="text-center align-middle">@if(Auth::user()->admin_role == 'Superadmin' && Auth::user()->id == $user->id) {{ $user->admin_role }} @else {{ $user->role_name }} @endif</td>
                                    <td class="text-center align-middle">
                                        @if(Auth::guard('admin')->User()->id != $user->id)
                                        <form action="{{ url('update-user-status/'.$user->id) }}" method="post" id="changeStatus" name="changeStatus">@csrf
                                            <label class="switch">
                                                <input type="checkbox" class="userStatus slider{{$user->id}}" data-id="{{$user->id}}" data-status="{{$user->status}}" name="status" value="1" @if($user->status=="1") checked @endif>
                                                <span class="slider round"></span>
                                            </label>
                                        </form>
                                        @else
                                        <button class="btn btn-default">NA</button>
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        <button class="btn mr-1 mb-1 btn-outline-primary btn-shadow btn-sm" data-bs-toggle="popover" data-bs-displacement="top" data-bs-content="Created On: {{ date('d M Y h:i', strtotime($user->created_at)) }} | Last Updated: {{ date('d M Y h:i', strtotime($user->updated_at)) }}" data-bs-original-title="More Details"><i class="fa fa-info-circle"></i> </button>
                                        @if(Auth::guard('admin')->User()->id != $user->id)
                                        <a href="{{url('edit-user/'.base64_encode($user->id))}}" class="btn mr-1 mb-1 btn-outline-info btn-shadow btn-sm" data-bs-toggle="tooltip" title="Edit User Details"><i class="fa fa-pencil-alt"></i></a>
                                        @if(Auth::guard('admin')->User()->admin_role == 'Superadmin')
                                        <a href="javascript:void" rel="{{ base64_encode($user->id) }}" rel1="delete-user" class="btn mr-1 mb-1 btn-outline-danger btn-shadow btn-sm deleteBtn" data-bs-toggle="tooltip" title="Delete User"><i class="fa fa-trash"></i></a>
                                        @endif
                                        @else
                                        <button class="btn mr-1 mb-1 btn-default btn-shadow btn-sm">NA</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$users->appends(request()->input())->links('pagination::bootstrap-4')}}
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
                        if(status == 1){
                            $('.slider'+userid).attr('checked','false');
                        }else{
                            $('.slider'+userid).attr('checked','true');
                        }
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