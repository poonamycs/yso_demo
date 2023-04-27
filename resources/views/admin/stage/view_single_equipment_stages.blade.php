@extends('layouts.app')
@section('content')
@section('styles')
    <link href="{{asset('assets/plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/datatable/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endsection
<style>
    body{
	padding-top:50px;
	background-color:#34495e;
}



.hiddenRow {
    padding: 0 !important;
}
</style>
<div class="breadcrumb-header justify-content-between pt-3 mt-0 mb-1">
    <div class="my-auto">
        <div class="d-flex">
            <h5 class="content-title mb-0 my-auto">@if(count($EquipmentStages)>0)
                    {{ $EquipmentStages[0]->equipment_name }}
                @endif 
                Equipment Stages <span class="badge bg-dark h6 mb-0">{{count($EquipmentStages)}} stages</span></h5>
            <!-- <h5 class="content-title mb-0 my-auto">Equipment Stages <span class="badge bg-dark h6 mb-0">{{count($EquipmentStages)}} stages</span></h5> -->
        </div>
        <h6 class="font-italic font-size-md small">Note: You can drag the stage and move it to desire position.</h6>
    </div>
    <div class="d-flex my-xl-auto right-content">
        <div class="pe-1 mb-xl-0">
            <a href="{{url('add-equipment-stages')}}" class="modal-effect btn btn-primary btn-block btn-sm"><span class="btn-icon-wrapper pr-2"><i class="fa fa-plus-circle"></i></span> Add Equipment Stages</a>
        </div>
    </div>
</div>
    <div class="card mb-1 containet-fluid">
        <form action="{{url('view-equipment-stages/'.Request()->equipment_name.'/' .Request()->id.'/')}}" method="get">
            <div class="row row-sm d-flex px-3">
                <div class="col-md-1 col-sm-4">
                    <div class="form-group mt-2 mb-2">
                        <label class="form-label">Filter</label>
                        {{-- <button type="submit" class="btn btn-primary btn-primary-gradient btn-rounded">Submit</button> --}}
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="form-group mt-2 mb-2">
                        <select name="department" id="department" class="form-control form-control-sm w-75 select2" onchange="this.form.submit()">
                            <option value="">Select Department</option>
                            @foreach(App\Models\Department::select('id','name')->get() as $depts)
                                <option value="{{$depts->id}}" @if(!empty($department) && $depts->id == $department) selected @endif>{{$depts->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="form-group mt-2 mb-2">
                        <input type="text" name="name" id="name" placeholder="Search by Equipment Stages" value="{{$name}}" class="form-control form-control-sm w-75 select2" onchange="this.form.submit()">
                    </div>
                </div>
                <div class="col-md-5 col-sm-6">
                    <div class="form-group mt-2 mb-2">
                        <a href="{{url('view-equipment-stages/'.Request()->equipment_name.'/' .Request()->id.'/')}}">Clear</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">   
    <div class="app-main">
        <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="main-card mb-3 card">
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


                    <div class="card-body table-responsive mb-4">
                        <div class="table-responsive">
                            
                        <div class="container shadow min-vh-100 py-2">
                            <div class="table-responsive">
                                <table class="table accordion">
                                    <thead>
                                        <tr>
                                            
                                            <th class="text-center">Stage No.</th>
                                            <th>Equipment Stages</th>
                                            <th class="text-capitalize">Task Duaration in days (Estimated)</th>
                                            <th>Department</th>
                                            <th class="text-capitalize">Last modified</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($EquipmentStages)
                                        @foreach($EquipmentStages as $stage)
                                        <tr data-bs-toggle="collapse" data-bs-target="#expand{{ $stage->id }}">
                                            <!-- <th scope="row"><i class="fa fa-plus"></i></th> -->
                                            <td class="text-center row1">{{$loop->index+1}}</td>
                                            <td>{{ $stage->stage }}</td>
                                            <td class="text-center row1">{{ $stage->days }}</td>
                                            <td>@if(!empty($stage->depts->name)){{ $stage->depts->name }}@else - @endif</td>
                                            <td>{{ date('d-M-Y, h:iA', strtotime($stage->updated_at)) }}</td>
                                            <td class="text-center">
                                                <button onclick="editMaterial({{$stage->id}})" data-bs-toggle="modal" data-bs-target="#editModal" class="btn mr-1 mb-1 btn-outline-info btn-sm btn-shadow" title="Edit Stage"><i class="fa fa-pencil-alt"></i> </button>
                                                @if(Auth::guard('admin')->User()->admin_role == 'Superadmin')
                                                <a href="javascript:void" rel="{{ $stage->id }}" rel1="delete-stage" class="btn mr-1 mb-1 btn-outline-danger btn-sm btn-shadow deleteStage" data-bs-toggle="tooltip" title="Remove Stage"><i class="fa fa-trash"></i></a>
                                                @endif
                                                <button onclick="addStage({{$stage->id}})" data-bs-toggle="modal"  class="btn mr-1 mb-1 btn-outline-info btn-sm btn-shadow" title="Add Sub Stage"><i class="fa fa-plus"></i> </button>
                                            </td>
                                        </tr>
                                        <?php $sub_stages = App\Models\Sub_stage::where('stage','=',$stage->stage)->where('equipment_name','=',$EquipmentStages[0]->equipment_name)->get();?>
                                                @foreach($sub_stages as $sub_stage)
                                                    <tr class="collapse accordion-collapse" id="expand{{ $stage->id }}" data-bs-parent=".table">
                                                        <td></td>
                                                        <td><i class="fa fa-circle" aria-hidden="true"></i> {{$sub_stage->sub_stage}} </td>
                                                        <td class="text-center row1">{{$sub_stage->days}}</td>
                                                    </tr>
                                                @endforeach
                                            
                                        
                                        @endforeach
                                        @endisset
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        </div>                                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLongTitle"><i class="fa fa-pencil"></i><span> <span id="stagename"></span> - Sub Stage</span></h5>
                <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="main-card card mb-0">
                <div class="card-body pt-0">
                    <form class="col-md-11 mx-auto" method="post" action="{{ url('add-sub-stage/') }}">@csrf
                        <div class="form-row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="field-required fw-500">Equipment Name <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="equip_name" name="equip_name" required="true" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="field-required fw-500">Equipment Stage <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="equip_stage" name="equip_stage" required="true" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="field-required fw-500">Equipment Sub Stage <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="equip_sub_stage" name="equip_sub_stage" placeholder="Enter Sub Stage Name" required="true" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="abbr" class="field-required fw-500">Estimated Days</label>
                                    <input type="text" class="form-control" id="equip_days" name="equip_days" placeholder="Enter Estimated Days" required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right btn-block"><b><i class="fa fa-check-circle"></i> Save</b></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLongTitle"><i class="fa fa-pencil"></i><span> <span id="stagename"></span> - Edit Stage Details</span></h5>
                <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="main-card card mb-0">
                <div class="card-body pt-0">
                    <form id="editStage" class="col-md-11 mx-auto" method="post" action="">@csrf
                        <div class="form-row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="field-required fw-500">Stage <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="stage" name="stage" placeholder="Enter Stage Name" required="true" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="field-required fw-500">Department <span class="tx-danger">*</span></label>
                                    <select name="department_name" id="department_name" class="form-control select2" required>
                                        <option value="">-- Select Department --</option>
                                        @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="abbr" class="field-required fw-500">Estimated Days</label>
                                    <input type="text" class="form-control" id="days" name="days" placeholder="Enter Estimated Days" required="true" />
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right btn-block"><b><i class="fa fa-check-circle"></i> Save</b></button>
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" ></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // $('select[name="status"]').on('change', function () {
        //     var status = $(this).val();
        //     var url =  "{{url('/')}}";
        //     if (status) {
        //         $.ajax({
        //             url: url+'/view-equipment-stages/' + status,
        //             method:'get',
        //             data:{
        //                     status:status
        //                 },
        //                 success: function(data){
                        
        //             }
        //         })
        //     } else {
        //         $('select[name="eactivityid"]').empty();
        //     }
        // });
        $(function () {
            $("#table").DataTable({
                "bPaginate": false,
            });

            $("#tablecontents").sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {
                var order = [];
                var token = $('meta[name="csrf-token"]').attr('content');
                $('tr.row1').each(function(index,element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index+1
                    });
                });
                console.log(order);
                
                $.ajax({
                    type: "POST", 
                    dataType: "json", 
                    url: "{{ url('post-sortable') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        order: order,
                        _token: token
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });
            }
        });
    </script>
    
    <script>

        function editMaterial(id){
            $.ajax({
                type:"get",
                url:"{{url('get-stage-detail')}}",
                data:{id:id},
                success:function(data){
                    console.log(data);
                    $('#stage').val(data[0]['stage']);
                    $('#stagename').html(data[0]['stage']);
                    $('#days').val(data[0]['days']);
                    $('#editStage').attr('action', '{{url('edit-stage')}}'+'/'+data[0]['id']);    
                    var optionsdept = '';
                                $.each(data[1], function (key, value) {
                                    optionsdept += '<option value="'+value.id+'" data-username="'+value.name+'">'+ value.name +'</option>';
                                });
                                console.log(optionsdept);
                                $('select[name="department_name"]').html(optionsdept);
                                $('select[name="department_name"] option[value="'+data[0]['department_id']+'"]').attr('selected','selected');
                      
                }
            });
        }
        function addStage(id){
            $('#addModal').modal('show');
            $.ajax({
                type:"get",
                url:"{{url('get-sub-stage')}}",
                data:{id:id},
                success:function(data){
                    console.log(data);
                    $('#equip_name').val(data[0]['equipment_name']);
                    $('#equip_stage').val(data[0]['stage']);
                      
                }
            });
        }
    </script>

    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>

    <!--Internal  Datatable js -->
    <script src="{{asset('assets/js/table-data.js')}}"></script>
@endsection