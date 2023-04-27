@extends('layouts.app')
@section('styles')
    <style>
        .expired{
            --bs-table-accent-bg: #ff000021 !important;
            color: var(--bs-table-striped-color)
        }
    </style>
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('assets/plugins/datatable/datatables.min.css')}}" rel="stylesheet" /> -->
    <!-- <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet"> -->
    <link href="{{asset('assets/plugins/datatable/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
@endsection('styles')

@section('content')

    <div class="breadcrumb-header justify-content-between mb-0 mt-0 pt-2">
        <div class="my-auto left-content">
            <div class="">
                <h4 class="content-title mb-0 my-auto">WPM Action Tracker</h4>
                <p class="mg-b-0"></p>
            </div>
        </div>
        
    </div>

    <div class="card mb-1 containet-fluid">
        <form action="{{url('wpm-action-tracker')}}" method="get">@csrf
            <div class="row row-sm d-flex px-3">
                <div class="col-md-1 col-sm-1">
                    <div class="form-group mt-1 mb-1">
                        
                        <label class="form-label">Filter</label>
                        {{-- <button type="submit" class="btn btn-primary btn-primary-gradient btn-rounded">Submit</button> --}}
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="form-group mt-2 mb-2">
                        <input type="text" name="search" value="{{$search}}" placeholder="Search By Keyword" class="form-control form-control-sm w-75" onchange="this.form.submit()">
                    </div>
                </div>
                <div class="col-md-5 col-sm-6">
                    <div class="form-group mt-2 mb-2">
                        <a href="{{url('wpm-action-tracker')}}">Clear</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card mg-b-20">
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
                <div class="card-body table-responsive mb-3">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <!-- <th>#ID</th> -->
                                    <th class="text-center">SO Number</th>
                                    <th>Client</th>
                                    <th>Equipments</th>
                                    <!-- <th class="text-center">Description</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @isset($wpm_actions)
                                @foreach($wpm_actions as $wpm_action)
                                <tr>
                                    <!-- <td class="text-center align-middle">{{ $loop->index+1 }}</td> -->
                                    <td class="text-center align-middle" style="font-weight: 500">{{ $wpm_action->so }}</td>
                                    <td class="align-middle fw-500">{{ $wpm_action->client_name }}</td>
                                    <td class="align-middle">
                                        <div class="overflow-auto" style="max-height: 100px;">
                                            @foreach($wpm_action->orderEquipments as $row)
                                            <a href="{{url('/view-wpm-action-tracker/'.$wpm_action->so.'/'.$row->id.'/'.$wpm_action->client_name.'/'.$wpm_action->po_date.'/'.$wpm_action->delivery_date)}}" class="btn btn-sm btn-light"> {{$loop->index+1}}. {{$row->equipment_type}} {{ $row->equipment_name }}</a>
                                                <div class="progress mt-1 mb-1" data-bs-toggle="tooltip" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div> </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <!-- <td class="align-middle fw-500"><a href="{{url('/view-wpm-action-tracker/'.$wpm_action->so.'/'.$wpm_action->client_name.'/'.$wpm_action->po_date.'/'.$wpm_action->delivery_date)}}">{{ $wpm_action->equipment_type }}</a></td> -->
                                    <!-- <td class="align-middle fw-500">{{ $wpm_action->description }}</td>  -->
                                </tr>
                                @endforeach
                                @endisset
                            </tbody>
                        </table>
                        {{$wpm_actions->appends(request()->input())->links('pagination::bootstrap-4')}}

@endsection('content')

@section('scripts')
    
    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>

    <!--Internal  Datatable js -->
    <script src="{{asset('assets/js/table-data.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endsection('scripts')