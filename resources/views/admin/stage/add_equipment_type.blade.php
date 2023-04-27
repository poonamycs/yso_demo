@extends('layouts/app')
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

<div class="breadcrumb-header justify-content-between pt-3 mt-0 mb-2">
    <div class="my-auto">
        <div class="d-flex">
            <h5 class="content-title mb-0 my-auto">Equipment Types</h5>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
        <div class="pe-1 mb-xl-0">
            <button class="modal-effect btn btn-primary btn-block btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#equipmentModal">
                <span class="btn-icon-wrapper pr-2"><i class="fa fa-plus-circle"></i></span> <b>Add Equipment Type</b>
            </button>
        </div>
    </div>
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
                    <table id="example" class="table key-buttons text-md-nowrap table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Equipment</th>
                                <th class="text-center">Added By</th>
                                <th class="text-center">Last modified</th>
                                @if(Auth::guard('admin')->User()->role == 'Superadmin')
                                <th class="text-center">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($equipment_types as $row)
                            <tr>
                                <td class="text-center">{{ $loop->index+1 }}</td>
                                <td class="text-center">{{ $row->equipment_type }} <span> ({{ $row->abbr }})</span></td>
                                <td class="text-center">{{ $row->name }}</td>
                                <td class="text-center">{{ date('d-M-Y, h:iA', strtotime($row->updated_at)) }}</td>
                                @if(Auth::guard('admin')->User()->admin_role == 'Superadmin')
                                <td class="text-center">
                                    <a href="#" class="btn mr-1 mb-1 btn-outline-info btn-shadow btn-sm" onclick="editType({{$row->id}})" data-bs-toggle="modal" data-bs-target="#editTypeModal" title="Edit Equipment"><i class="fa fa-pencil-alt"></i></a>

                                    <a href="javascript:void" rel="{{ $row->id }}" rel1="delete-equipment-type" class="btn mr-1 mb-1 btn-outline-danger btn-shadow btn-sm deleteBtn" data-bs-toggle="tooltip" title="Delete Equipment"><i class="fa fa-trash"></i></a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$equipment_types->appends(request()->input())->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editTypeModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLongTitle"><i class="fa fa-pencil"></i><span> Edit Equipment Type</span></h5>
                <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="main-card card mb-0">
                <div class="card-body">
                    <form id="editTypeForm" name="editTypeForm" class="col-md-12 mx-auto" method="post" action="{{ url('update-equipment-type') }}">@csrf
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="equipment_type" class="field-required">Equipment Type</label>
                                    <input type="text" class="form-control" id="equip_type" name="equipment_type" placeholder="Enter Equipment Type" autofocus="true" required="true" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="abbr" class="field-required">Equipment Abbrevation</label>
                                    <input type="text" class="form-control" id="equip_abbr" name="abbr" placeholder="Enter Equipment Type Abbrevation" required="true" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary float-right fw-500"><i class="fa fa-check"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="equipmentModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-pencil"></i> Add Equipment Type</h5>
                <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="main-card card mb-0">
                <div class="card-body">
                    <form id="signupForm" name="signupForm" class="col-md-12 mx-auto" method="post" action="{{ url('add-equipment-type/') }}">@csrf
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="equipment_type" class="field-required">Equipment Type</label>
                                    <input type="text" class="form-control" id="equipment_type" name="equipment_type" placeholder="Enter Equipment Type" autofocus="true" required="true" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="abbr" class="field-required">Equipment Abbrevation</label>
                                    <input type="text" class="form-control" id="abbr" name="abbr" placeholder="Enter Equipment Abbrevation" required="true" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary float-right fw-500"><i class="fa fa-check-circle"></i> Save</button>
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
        function editType(id){
            $.ajax({
                type:"get",
                url:"{{url('edit-equipment-type')}}",
                data:{id:id},
                success:function(data){
                    // console.log(data['equipment_type']);
                    $('#equip_type').val(data['equipment_type']);
                    $('#equip_abbr').val(data['abbr']);
                    $('#editTypeForm').attr('action', '{{url('update-equipment-type')}}'+'/'+data['id']);      
                }
            });
        }
    </script>

    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>

    <!--Internal  Datatable js -->
    <script src="{{asset('assets/js/table-data.js')}}"></script>
@endsection