@extends('layouts.app')
@section('styles')
    <link href="{{asset('assets/plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/datatable/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('content')

    <div class="breadcrumb-header justify-content-between pt-3 mt-0">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">View Equipment Stages</h4>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pe-1 mb-xl-0">
                <a href="{{url('add-equipment-stages')}}" class="modal-effect btn btn-primary btn-block"><span class="btn-icon-wrapper pr-2"><i class="fa fa-plus-circle"></i></span> Add Equipment Stages</a>
            </div>
        </div>
    </div>
<div class="card mb-1 containet-fluid">
    <form action="{{url('view-equipment-stages')}}" method="get">@csrf
        <div class="row row-sm d-flex px-3">
            <div class="col-md-1 col-sm-4">
                <div class="form-group mt-2 mb-2">
                    <label class="form-label">Filter</label>
                    {{-- <button type="submit" class="btn btn-primary btn-primary-gradient btn-rounded">Submit</button> --}}
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="form-group mt-2 mb-2">
                    <select name="equipment" id="equipment" class="form-control select2" onchange="this.form.submit()">
                        <option value="">-- All Equipment --</option>
                        @foreach(App\Models\EquipmentType::get() as $row)
                        <option value="{{$row->equipment_type}}" @if(!empty($equipment) && $row->equipment_type == $equipment) selected @endif>{{$row->equipment_type}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-5 col-sm-6">
                <div class="form-group mt-2 mb-2">
                    <a href="{{url('view-equipment-stages')}}">Clear</a>
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
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Sr. No.</th>
                                            <th>Equipment Name</th>
                                            <th>Last modified</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($stages)
                                        @foreach($stages as $stage)
                                        <tr>
                                            <td class="text-center">{{ $loop->index+1 }}</td>
                                            <td>{{ $stage->equipment_name }}</td>
                                            <td>{{ date('d-M-Y, h:iA', strtotime($stage->updated_at)) }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('view-equipment-stages/'.$stage->equipment_name.'/'.base64_encode($stage->id)) }}" class="btn mr-1 mb-1 btn-primary btn-shadow" data-bs-toggle="tooltip" title="View {{ $stage->equipment_name }} Equipment Stages"><i class="fa fa-th-list"></i> View Stages</a>
                                                <!-- <button class="btn mr-1 mb-1 btn-info btn-shadow" data-toggle="modal" data-target="#editModal{{ $stage->id }}" title="Edit Equipment Details"><i class="fa fa-pencil"></i></button> -->
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                                {{$stages->appends(request()->input())->links('pagination::bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>

    <!--Internal  Datatable js -->
    <script src="{{asset('assets/js/table-data.js')}}"></script>
@endsection