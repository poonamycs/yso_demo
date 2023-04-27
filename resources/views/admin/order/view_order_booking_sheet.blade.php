@extends('layouts.app')
@section('content')

    @section('styles')
        <style>
            .border-black{
                border-bottom: 2px solid #000 !important;
            }
        </style>

        <link href="{{asset('assets/plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/datatable/responsive.dataTables.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/responsive.bootstrap5.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    @endsection
    <div class="breadcrumb-header justify-content-between pt-3 mt-0 mb-1">
        <div class="my-auto">
            <div class="d-flex">
                <h5 class="content-title mb-0 my-auto">Order Booking Sheet </h5>
                <div class="mb-xl-0">
                    <div class="btn-group dropdown mx-3">
                        <button type="button" class="btn btn-primary btn-sm">FY {{$year}}-{{$year+1}}</button>
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate" x-placement="bottom-end">
                            @for($i = 0; $i<=5; $i++)
                            <a class="dropdown-item" href="{{url('order-booking-sheet/'.date("Y",strtotime("-".$i." year")))}}">{{date("Y",strtotime("-".$i." year"))}}-{{date("Y",strtotime("-".$i." year"))+1}}</a>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="mb-xl-0">
                    <a href="{{asset('order-booking-sheet-report/')}}" class="btn btn-primary btn-sm"><i class="fa fa-file-excel"></i> Export</a>
                </div>
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
                        <table id="" class="table key-buttons text-md-nowrap table-hover datatab">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0 text-center">SO No.</th>
                                    <th class="border-bottom-0 text-left">Company Name</th>
                                    <th class="border-bottom-0 text-center">Region</th>
                                    <th class="border-bottom-0 text-center">Location</th>
                                    <th class="border-bottom-0 text-center">Engineer</th>
                                    <th class="border-bottom-0 text-center">Description</th>
                                    <th class="border-bottom-0 text-center">Order Value (RS Lacs)</th>
                                    <th class="border-bottom-0 text-center">PO Date</th>
                                    <th class="border-bottom-0 text-center">Delivery Date</th>
                                    <th class="border-bottom-0 text-center">Achieved Target</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($q1 as $order1)
                                <tr class="border-black bg-purple-transparent">
                                    <td class="text-center">{{$order1->so}}</td>
                                    <td class="text-left">{{$order1->client_name}}</td>
                                    <td class="text-center">{{$order1->region}}</td>
                                    <td class="text-center">{{$order1->country}}</td>
                                    <td class="text-center" data-bs-toggle="tooltip" title="{{$order1->name}}">{{getInitials($order1->name)}}</td>
                                    <td class="text-center">{{$order1->description}}</td>
                                    <td class="text-center">{{numberFormat2($order1->order_size)}}</td>
                                    <td class="text-center">{{date('d-M-y', strtotime($order1->po_date))}}</td>
                                    <td class="text-center">{{date('d-M-y', strtotime($order1->delivery_date))}}</td>
                                    <td class="text-center @if($loop->first) bg-primary fw-500 @endif">@if($loop->first) {{numberFormat2($q1->sum('order_size'))}} @endif</td>
                                </tr>
                                @endforeach
                                @foreach($q2 as $order2)
                                <tr class="bg-teal-transparent @if($loop->last) border-black @endif">
                                    <td class="text-center">{{$order2->so}}</td>
                                    <td class="text-left">{{$order2->client_name}}</td>
                                    <td class="text-center">{{$order2->region}}</td>
                                    <td class="text-center">{{$order2->country}}</td>
                                    <td class="text-center" data-bs-toggle="tooltip" title="{{$order2->name}}">{{getInitials($order2->name)}}</td>
                                    <td class="text-center">{{$order2->description}}</td>
                                    <td class="text-center">{{$order2->order_size/100000}}</td>
                                    <td class="text-center">{{date('d-M-y', strtotime($order2->po_date))}}</td>
                                    <td class="text-center">{{date('d-M-y', strtotime($order2->delivery_date))}}</td>
                                    <td class="text-center @if($loop->first) bg-primary fw-500 @endif">@if($loop->first) {{($q2->sum('order_size'))/100000}} @endif</td>
                                </tr>
                                @endforeach
                                @foreach($q3 as $order3)
                                <tr class="bg-secondary-transparent @if($loop->last) border-black @endif">
                                    <td class="text-center">{{$order3->so}}</td>
                                    <td class="text-left">{{$order3->client_name}}</td>
                                    <td class="text-center">{{$order3->region}}</td>
                                    <td class="text-center">{{$order3->country}}</td>
                                    <td class="text-center" data-bs-toggle="tooltip" title="{{$order3->name}}">{{getInitials($order3->name)}}</td>
                                    <td class="text-center">{{$order3->description}}</td>
                                    <td class="text-center">{{$order3->order_size/100000}}</td>
                                    <td class="text-center">{{date('d-M-y', strtotime($order3->po_date))}}</td>
                                    <td class="text-center">{{date('d-M-y', strtotime($order3->delivery_date))}}</td>
                                    <td class="text-center @if($loop->first) bg-primary fw-500 @endif">@if($loop->first) {{($q3->sum('order_size'))/100000}} @endif</td>
                                </tr>
                                @endforeach
                                @foreach($q4 as $order4)
                                <tr class="bg-pink-transparent @if($loop->last) border-black @endif">
                                    <td class="text-center">{{$order4->so}}</td>
                                    <td class="text-left">{{$order4->client_name}}</td>
                                    <td class="text-center">{{$order4->region}}</td>
                                    <td class="text-center">{{$order4->country}}</td>
                                    <td class="text-center" data-bs-toggle="tooltip" title="{{$order4->name}}">{{getInitials($order4->name)}}</td>
                                    <td class="text-center">{{$order4->description}}</td>
                                    <td class="text-center">{{$order4->order_size/100000}}</td>
                                    <td class="text-center">{{date('d-M-y', strtotime($order4->po_date))}}</td>
                                    <td class="text-center">{{date('d-M-y', strtotime($order4->delivery_date))}}</td>
                                    <td class="text-center @if($loop->first) bg-primary fw-500 @endif">@if($loop->first) {{($q4->sum('order_size'))/100000}} @endif</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        .context-menu {
            position: absolute;
            text-align: center;
            background: lightgray;
            border: 1px solid black;
        }
  
        .context-menu ul {
            padding: 0px;
            margin: 0px;
            min-width: 150px;
            list-style: none;
        }
  
        .context-menu ul li {
            padding-bottom: 7px;
            padding-top: 7px;
            border: 1px solid black;
        }
  
        .context-menu ul li a {
            text-decoration: none;
            color: black;
        }
  
        .context-menu ul li:hover {
            background: darkgray;
        }
    </style>
    {{-- <script>
        document.onclick = hideMenu;
        document.oncontextmenu = rightClick;
  
        function hideMenu() {
            document.getElementById(
                "contextMenu").style.display = "none"
        }
  
        function rightClick(e) {
            e.preventDefault();
  
            if (document.getElementById(
                "contextMenu").style.display == "block")
                hideMenu();
            else {
                var menu = document
                    .getElementById("contextMenu")
                      
                menu.style.display = 'block';
                menu.style.left = e.pageX + "px";
                menu.style.top = e.pageY + "px";
            }
        }
    </script> --}}
    <div id="contextMenu" class="context-menu" style="display:none">
        <ul>
            <li><a href="#">Element-1</a></li>
            <li><a href="#">Element-2</a></li>
            <li><a href="#">Element-3</a></li>
            <li><a href="#">Element-4</a></li>
            <li><a href="#">Element-5</a></li>
            <li><a href="#">Element-6</a></li>
            <li><a href="#">Element-7</a></li>
        </ul>
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