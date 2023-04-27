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
                <h5 class="content-title mb-0 my-auto">Order Booking Sheet <span class="badge bg-dark h6 mb-0">FY {{date('Y', strtotime($fyYear['start_date']))}}-{{(date('Y', strtotime($fyYear['start_date'])))+1}}</span></h5>
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
                        <table id="example" class="table key-buttons text-md-nowrap table-hover datatab">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0 text-center">Sr. No.</th>
                                    <th class="border-bottom-0 text-center">SO No.</th>
                                    <th class="border-bottom-0 text-center">Company Name</th>
                                    <th class="border-bottom-0 text-center">Region</th>
                                    <th class="border-bottom-0 text-center">Location</th>
                                    <th class="border-bottom-0 text-center">Engineer</th>
                                    <th class="border-bottom-0 text-center">Description</th>
                                    <th class="border-bottom-0 text-center">Order Value (RS Lacs)</th>
                                    <th class="border-bottom-0 text-center">PO Date</th>
                                    <th class="border-bottom-0 text-center">Delivery Date</th>
                                    <th class="border-bottom-0 text-center">Achieve Target</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i=3; $i<=12; $i++)
                                    @php 
                                        $d = new \Carbon\Carbon('-'.$i.' months');
                                        $d1 = new \Carbon\Carbon('-'.$i.' months');
                                        $firstOfQuarter = $d->firstOfQuarter();
                                        $lastOfQuarter = $d1->lastOfQuarter();
                                        echo date('Y-M-d', strtotime($firstOfQuarter)).' | '. date('Y-M-d', strtotime($lastOfQuarter)); echo '<br>';
                                        $orders1 = App\Models\Order::select('orders.so','orders.client_name','orders.region','orders.country','orders.description','orders.order_size','orders.po_date','orders.delivery_date','admins.name')
                                            ->leftJoin('admins','orders.admin_id','admins.id')
                                            ->whereDate('orders.po_date','>=',date('Y-m-d', strtotime($firstOfQuarter)))
                                            ->whereDate('orders.po_date','<=',date('Y-m-d', strtotime($lastOfQuarter)))
                                            ->get();
                                    @endphp
                                    @php echo $firstOfQuarter.'|'.$lastOfQuarter; echo '<br>'; @endphp
                                    @foreach($orders1 as $order)
                                    <tr>
                                        <td class="text-center">{{$loop->index+1}}</td>
                                        <td class="text-center">{{$order->so}}</td>
                                        <td class="text-center">{{$order->client_name}}</td>
                                        <td class="text-center">{{$order->region}}</td>
                                        <td class="text-center">{{$order->country}}</td>
                                        <td class="text-center" data-bs-toggle="tooltip" title="{{$order->name}}">{{getInitials($order->name)}}</td>
                                        <td class="text-center">{{$order->description}}</td>
                                        <td class="text-center">{{$order->order_size/100000}}</td>
                                        <td class="text-center">{{date('d-M-y', strtotime($order->po_date))}}</td>
                                        <td class="text-center">{{date('d-M-y', strtotime($order->delivery_date))}}</td>
                                        <td class="text-center">200.00</td>
                                    </tr>
                                    @endforeach
                                    @php $i=$i+2; @endphp
                                @endfor
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
    <script>
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
    </script>
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