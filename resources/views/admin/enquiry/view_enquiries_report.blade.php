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

    <div class="breadcrumb-header justify-content-between pt-3 mt-0 mb-0">
        <div class="my-auto">
            <form action="{{url('enquiry-report/'.Request()->status)}}" method="get">@csrf
                <div class="d-flex">
                    <div class="mr-1">
                        <small class="fw-500">From:</small>
                        <input type="date" class="form-control" name="from" value="{{date('Y-m-d',strtotime($from))}}">
                    </div>
                    <div class="mr-1">
                        <small class="fw-500">To:</small>
                        <input type="date" class="form-control" name="to" value="{{date('Y-m-d',strtotime($to))}}">
                    </div>
                    <div>
                        <small class="fw-500 text-underline"><a href="{{url('enquiry-report/'.Request()->status)}}">Clear</a></small>
                        <input type="submit" class="form-control" value="Submit">
                        <!-- <button type="submit" class="btn btn-outline-primary btn-rounded">Submit</button> -->
                    </div>
                </div>
            </form>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="mb-xl-0">
                <a href="{{url('enquiry-report-export/')}}" class="btn btn-primary btn-sm"><i class="fa fa-file-excel"></i> Download</a>
            </div>
        </div>

    </div>

    <div class="row row-sm">
        <div class="panel panel-primary tabs-style-2 mt-3">
            <div class=" tab-menu-heading">
                <div class="tabs-menu1">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs main-nav-line">
                        <li><a href="{{url('enquiry-report/HOT')}}" class="nav-link fw-500 {{Request()->status=='HOT' || Request()->status=='' ? 'active' : ''}}">HOT <span class="badge badge-purple-transparent"></span></a></li>
                        <li><a href="{{url('enquiry-report/WARM')}}" class="nav-link fw-500 {{Request()->status=='WARM' ? 'active' : ''}}">WARM <span class="badge badge-purple-transparent"></span></a></li>
                        <li><a href="{{url('enquiry-report/LONG LEAD')}}" class="nav-link fw-500 {{Request()->status=='LONG LEAD' ? 'active' : ''}}">LONG LEAD</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body main-content-body-right border p-0">
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="card rounded-0 mg-b-20 mb-0">
                            <div class="card-body">
                                <div class="breadcrumb-header justify-content-between mt-0">
                                    <h5 class="content-title mb-0 my-auto">{{Request()->status}} Enquiries <span class="badge bg-dark h6 mb-0">{{$count}}</span></h5>
                                </div>
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
                                    @if(count($enquiries) > 0)
                                    <table class="table key-buttons text-md-nowrap table-hover datatab mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0 text-center">Sr.</th>
                                                <th class="border-bottom-0 text-left">QRN</th>
                                                <th class="border-bottom-0 text-left">Client</th>
                                                <th class="border-bottom-0 text-left">Description</th>
                                                <th class="border-bottom-0 text-center">Engineer</th>
                                                <th class="border-bottom-0 text-center">Price (in Lac)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($enquiries as $enq)
                                            <tr>
                                                <td class="text-center align-middle">{{$loop->index+1}}</td>
                                                <td class="text-left">{{$enq->qrn}}</td>
                                                <td class="text-left align-middle">{{$enq->customer_name}}</td>
                                                <td class="text-left align-middle">{!!Str::limit($enq->description, 200)!!}</td>
                                                <td class="text-center align-middle" data-bs-toggle="tooltip" title="{{$enq->name}}">{{$enq->name ? getInitials($enq->name) : '-'}}</td>
                                                <td class="text-center align-middle">{{$enq->price/100000}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="border-bottom-0 text-center"></th>
                                                <th class="border-bottom-0 text-left"></th>
                                                <th class="border-bottom-0 text-left"></th>
                                                <th class="border-bottom-0 text-left"></th>
                                                <th class="border-bottom-0 text-center fw-500">Total</th>
                                                <th class="border-bottom-0 text-center bg-primary">{{$sum/100000}}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @else
                                    <div class="alert alert-dark">
                                        No enquiry found!
                                    </div>
                                    @endif
                                </div>
                                <nav aria-label="Page navigation example" class="mt-1 overflow-scroll">
                                    <ul class="pagination mb-0">
                                        {{$enquiries->links('pagination::bootstrap-4')}}
                                    </ul>
                                </nav>
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