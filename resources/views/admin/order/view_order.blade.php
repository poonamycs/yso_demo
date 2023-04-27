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
                <h4 class="content-title mb-0 my-auto">{{Request()->status}} Orders <span class="badge bg-dark h6 mb-0">{{count($allOrders)}}</span></h4>
                <p class="mg-b-0">Percentage value represents work done of project and equipment</p>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            @if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('1', json_decode(Auth::guard('admin')->User()->role->permissions)))
            <div class="pe-1 mb-xl-0">
                <a href="{{url('add-order')}}" class="modal-effect btn btn-primary btn-sm"><span class="btn-icon-wrapper pr-2"><i class="fa fa-plus-circle"></i></span> Add New Order</a>
            </div>
            @endif
        </div>
    </div>

    <div class="card mb-1 containet-fluid">
        <form action="{{url('view-orders/'.Request()->status.'/')}}" method="get">@csrf
            <div class="row row-sm d-flex px-3">
                <div class="col-md-2 col-sm-2">
                    <div class="form-group mt-2 mb-2">
                        <select name="country" id="country" class="form-control form-control-sm w-75 select2" onchange="this.form.submit()">
                            <option value="">Country</option>
                            @foreach(App\Models\Order::select('country')->groupBy('country')->get() as $cntry)
                            <option value="{{$cntry->country}}" @if($cntry->country == $country) selected @endif>{{$cntry->country}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="form-group mt-2 mb-2">
                        <select name="assignee1" id="assignee1" class="form-control form-control-sm w-75 select2" onchange="this.form.submit()">
                            <option value="">Assignee</option>
                            @foreach(App\Models\Order::select('orders.admin_id','admins.name')->join('admins','admins.id','orders.admin_id')->groupBy('orders.admin_id')->get() as $user)
                                <option value="{{$user->admin_id}}" @if($user->admin_id == $assignee) selected @endif>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6">
                    <div class="form-group mt-2 mb-2">
                        <a href="{{url('view-orders/'.Request()->status.'/')}}">Clear</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="form-group mt-2 mb-2" style="margin-left:200px">
                        <input type="hidden" name="status" id="status" value="{{Request()->status}}">
                        <a href="#" id="export_order" class="btn mr-1 mb-1 btn-dark btn-shadow" data-bs-toggle="tooltip" title="View Stages"><i class="fa fa-th-list"></i> Export </a>
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
                                    <th>#ID</th>
                                    <th class="text-center">SO Number</th>
                                    <th style="width:20px">Client</th>
                                    <th>Equipments</th>
                                    @if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('4', json_decode(Auth::guard('admin')->User()->role->permissions)))
                                    <th class="text-center">Stages</th>
                                    @endif
                                    <th class="text-center">Delivery Date</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Assignee</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $currentDate = strtotime(date('d M Y')); @endphp
                                @isset($allOrders)
                                @foreach($allOrders as $order)
                                @php 
                                    $days = '-'.settings('delivery_warning_days').' days';
                                    $tempWarningDate = date('d M Y', strtotime($days, strtotime($order->delivery_date)));
                                    $warningDate = strtotime($tempWarningDate);
                                @endphp
                                <tr class="@if($currentDate>=$warningDate) expired @endif">
                                    <td class="text-center align-middle">{{ $loop->index+1 }}</td>
                                    <td class="text-center align-middle" style="font-weight: 500">{{ $order->so }}</td>
                                    <td class="align-middle fw-500">{{ $order->client_name }}
                                        <div class="progress progress-sm" data-bs-toggle="tooltip" title="{{getOrderStatus($order->id)}}% Complete"> 
                                            <div class="progress-bar progress-bar-sm @if(getOrderStatus($order->id) == '100') bg-success @else bg-info progress-bar-striped @endif" style="width: {{getOrderStatus($order->id)}}%" role="progressbar" aria-valuenow="{{getOrderStatus($order->id)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="overflow-auto" style="max-height: 100px;">
                                            @foreach($order->orderEquipments as $row)
                                            {{$loop->index+1}}. {{ $row->equipment_name }} <small class="badge badge-purple-transparent">{{getEquipmentStatus($order->id,$row->id)}}%</small>
                                            <div class="progress mt-1 mb-1" data-bs-toggle="tooltip" title="{{getEquipmentStatus($order->id,$row->id)}}% Complete"> <div class="progress-bar ht-2 @if(getEquipmentStatus($order->id,$row->id) == '100') bg-success @else bg-info progress-bar-striped @endif" style="width: {{getEquipmentStatus($order->id,$row->id)}}%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div> </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    @if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('4', json_decode(Auth::guard('admin')->User()->role->permissions)))
                                    <td class="text-center align-middle">
                                        <a href="{{url('order-stages/'.$order->orderEquipments[0]->id.'/'.$order->orderEquipments[0]->equipment_type.'/'.$order->id)}}" class="btn mr-1 mb-1 btn-dark btn-shadow" data-bs-toggle="tooltip" title="View Stages"><i class="fa fa-th-list"></i> Stages </a>
                                    </td>
                                    @endif
                                    <td class="text-center align-middle">{{ date('d M Y', strtotime($order->delivery_date)) }}</td>
                                    <td class="text-center align-middle">
                                        <button data-bs-toggle="dropdown" id="status{{$order->id}}" class="btn btn-sm @if($order->status=='In Process') btn-outline-primary @else btn-outline-success @endif">{{ $order->status }} <i class="icon ion-ios-arrow-down tx-11 mg-l-3"></i></button>
                                        <div class="dropdown-menu box-shadow-primary">
                                            <a class="dropdown-item" onclick="orderStatus('In Process',{{$order->id}})">In Process</a>
                                            @if(getOrderStatus($order->id) == '100')
                                            <a class="dropdown-item" onclick="orderStatus('Completed',{{$order->id}})">Completed</a>
                                            @else
                                            <a class="dropdown-item text-muted disabled">Completed</a>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <form action="javascript:void" method="post" id="updateAssignee" class="d-flex">@csrf
                                            <input type="hidden" name="order_id" id="order_id" value="{{$order->id}}">
                                            <select name="assignee" id="assignee" class="form-control text-uppercase select2 w-75">
                                                @foreach(App\Models\Admin::select('id','name')->get() as $user)
                                                <option value="{{$user->id}}" @if($order->admin_id == $user->id) selected @endif>{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-icon"><i class="fa fa-check-circle"></i></button>
                                        </form>
                                    </td>
                                    <td class="text-center align-middle">
                                        @if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('3', json_decode(Auth::guard('admin')->User()->role->permissions)))
                                        <a href="{{url('payment-cashflow/'.base64_encode($order->id).'/'.Str::slug($order->client_name))}}" class="btn btn-outline-dark btn-shadow btn-sm" data-bs-toggle="tooltip" title="Payment Cashflow"><i class="fa fa-money-bill-wave"></i> Cashflow </a>
                                        @endif
                                        <!-- <button class="btn mr-1 mb-1 btn-outline-dark btn-shadow btn-sm" data-bs-toggle="modal" onclick="paymentCashflow({{$order->id}})" data-bs-target="#paymentCashflowModal" title="Payment Cashflow"><i class="fa fa-money-bill-wave"></i> </button> -->
                                        <button class="btn btn-outline-primary btn-shadow btn-sm" data-bs-toggle="modal" onclick="orderDetails({{$order->id}})" data-bs-target="#orderDetailModal" title="View Order Details"><i class="fa fa-info-circle"></i> </button>
                                        @if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('12', json_decode(Auth::guard('admin')->User()->role->permissions)))
                                        <a href="{{ url('edit-order/'.base64_encode($order->id)) }}" class="btn btn-outline-info btn-shadow btn-sm" data-bs-toggle="tooltip" title="Edit Order Details"><i class="fa fa-pencil-alt"></i> </a>
                                        @if(Auth::guard('admin')->User()->admin_role == 'Superadmin')
                                        <a href="javascript:void" rel="{{ $order->id }}" rel1="delete-order" class="btn btn-outline-danger btn-shadow deleteBtn btn-sm" data-bs-toggle="tooltip" title="Delete Order"><i class="fa fa-trash"></i></a>
                                        @endif
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @endisset
                            </tbody>
                        </table>
                        {{$allOrders->appends(request()->input())->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- cashmodal modal -->
    <div class="modal" id="paymentCashflowModal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo" id="viewCashflowModal">
            </div>
        </div>
    </div>

    <!-- order details modal -->
    <div class="modal" id="orderDetailModal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo" id="viewModal">viewModal
            </div>
        </div>
    </div>
@endsection('content')

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#updateAssignee').on('submit',function(e){
                e.preventDefault();
                var user_id=$('#assignee').val();
                var order_id=$('#order_id').val();
                
                // alert(user_id); return false;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'post',
                    url:'{{ URL::to('/update-order-assignee') }}',
                    data:{
                        user_id:user_id,
                        order_id:order_id,
                    },
                    success:function(resp){
                        // alert(resp); return false;
                        swal("Order assigned successfully!", "success");
                    },
                    error:function(){
                        alert("Error");
                    }
                }); 
            });
           
           $('#export_order').on('click',function(e){
                var assignee=$('#assignee1').val();
               
                var status=$('#status').val();
                
                var country=$('#country').val();
                
                if(assignee && country)
                {
                    var url= "{{url('order-view-report/'.$assignee.'/'.$country.'/')}}"+'/' +status;  
                }
                else if(country)
                {
                    var url= "{{url('order-view-report/'.$country.'/')}}"+'/'+ status;
                }
                else if(assignee)
                {
                    var url = "{{url('order-view-report/'.$assignee.'/')}}"+'/'+ status;
                }
                else
                {
                    var url= "{{url('order-view-report/')}}"+'/'+ status;
                }
                $("#export_order").prop("href", url);
           });
        });
    </script>

    <script>
        function orderStatus(status,id){
            $.ajax({
                type:"get",
                url:"{{url('update-order-status')}}",
                data:{
                    status:status,
                    id:id
                },
                beforeSend:function(){
                    $("#status"+id).html("<i class='fa fa-spin fa-spinner'></i>");
                },
                success:function(data){
                    // console.log(data);
                    $('#status'+id).html(data);
                }
            });
        }

        function paymentCashflow(id){
            $.ajax({
                type:"get",
                url:"{{url('view-order-payment-cashflow')}}",
                data:{id:id},
                beforeSend:function(){
                    $("#viewCashflowModal").html("<div class='text-left text-default p-2 font-weight-bold' style='font-size: 13px;';><i class='fa fa-spin fa-spinner'></i> Loading...</div>");
                },
                success:function(data){
                    // console.log(data);
                    $('#viewCashflowModal').html(data);
                }
            });
        }

        function orderDetails(id){
            $.ajax({
                type:"get",
                url:"{{url('view-order-modal')}}",
                data:{id:id},
                beforeSend:function(){
                    $("#viewModal").html("<div class='text-left text-default p-2 font-weight-bold' style='font-size: 13px;';><i class='fa fa-spin fa-spinner'></i> Loading...</div>");
                },
                success:function(data){
                    // console.log(data);
                    $('#viewModal').html(data);
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
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endsection('scripts')