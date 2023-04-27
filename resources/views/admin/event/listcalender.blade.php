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

    <div class="breadcrumb-header justify-content-between pt-3 mt-0">
		<div class="left-content">
			<div>
			<h2 class="main-content-title tx-22 pb-1 mg-b-1 mg-b-lg-1 gradient-text">List View</h2>
            </div>
		</div>
		
		<div class="main-dashboard-header-right ">
			<h4 class="main-content-title tx-22 pb-1 mg-b-1 mg-b-lg-1"><a href="{{url('/planner')}}">Calender View</a></h2>
		</div>
	</div>
    <div class="card mb-1 containet-fluid">
        <form action="{{url('list-view-planner/')}}" method="get">@csrf
            <div class="row row-sm d-flex px-3">
                <div class="col-md-1 col-sm-1">
                    <div class="form-group mt-1 mb-1">
                        <small class="fw-500">.</small>
                        <label class="form-label"></label>
                        <label class="form-label">Filter</label>
                        {{-- <button type="submit" class="btn btn-primary btn-primary-gradient btn-rounded">Submit</button> --}}
                    </div>
                </div>
                <div class="col-md-2 col-sm-1">
                    <div class="form-group mt-2 mb-1">
                        <small class="fw-500">.</small>
                        <input type="text" id="title" name="title" class="form-control" value="{{$title}}" placeholder="Search...." onchange="this.form.submit()">
                    </div>
                </div>
                <div class="col-md-2 col-sm-1">
                    <div class="form-group mt-2 mb-1">
                        <small class="fw-500">From:</small>
                        <input type="date" class="form-control" name="from" value="{{date('Y-m-d',strtotime($from))}}">
                    </div>
                </div>
                <div class="col-md-2 col-sm-1">
                    <div class="form-group mt-2 mb-1">
                        <small class="fw-500">To:</small>
                        <input type="date" class="form-control" name="to" value="{{date('Y-m-d',strtotime($to))}}">
                    </div>
                </div>
                <div class="col-md-1 col-sm-1">
                    <div class="form-group mt-1 mb-1">
                        <small class="fw-500">.</small>
                        <label class="form-label"></label>
                        <input type="submit" class="form-control" value="Submit">
                    <!-- <button type="submit" class="btn btn-outline-primary btn-rounded">Submit</button> -->
                    </div>
                </div>
                <div class="col-md-1 col-sm-1">
                    <div class="form-group mt-1 mb-1">
                        <small class="fw-500">.</small>
                        <label class="form-label"></label>
                        <a href="{{url('/list-view-planner')}}" class="form-control">Clear</a>
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
                    @if(count($events) > 0)
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            
                            <tbody> 
                                @foreach($events as $event)
                                <?php $diffdates = now()->diffInDays(Carbon\Carbon::parse($event->start));?>
                                    <tr>
                                        <td class="text-center align-middle">{{$loop->index+1}}</td>
                                        <td class="text-center align-middle">{{$event->title}}</td>
                                        <td class="text-center align-middle">{{$event->start}}</td>
                                        <td class="text-center align-middle">{{$event->time}}</td>
                                        <?php if($diffdates > 0) { ?><td class="text-center align-middle" style="color:red"> <?php print_r("Expired"); }  else { ?><td class="text-center align-middle" style="color:green"><?php print_r("Processing"); } ?></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <div class="alert alert-dark">
                                No events found!
                            </div>
                        @endif
                        <nav aria-label="Page navigation example" class="mt-1 overflow-scroll">
                            <ul class="pagination mb-0">
                                {{$events->links('pagination::bootstrap-4')}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')

@section('scripts')
    <script>
        $(document).ready(function(){
            $('input[name="dates"]').daterangepicker(); 
        });
    </script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>

    <!--Internal  Datatable js -->
    <script src="{{asset('assets/js/table-data.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endsection('scripts')