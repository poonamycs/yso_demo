@extends('layouts.app')
@section('content')
<style>.table-hover tbody tr:hover{ color: #495057 }</style>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        @include('layouts/adminLayout/admin_header')
        <div class="app-main">
            @include('layouts/adminLayout/admin_sidebar')
            <div class="app-main__outer">
                
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon"> <i class="fa fa-bell icon-gradient bg-tempting-azure"></i></div>
                                <div>View Orders
                                    <div class="page-title-subheading"><a href="{{ url('admin/dashboard') }}">Dashboard</a> / Order / View Orders</div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <a href="{{ url('admin/add-order/') }}">
                                <button class="btn mr-1 mb-1 btn-info btn-shadow">
                                    <span class="btn-icon-wrapper pr-2"><i class="fa fa-plus"></i></span> <b>Add New Order</b>
                                </button></a>
                            </div>
                        </div>
                    </div>
                    <div class="main-card mb-3 card">
                        @if(Session::has('error_message'))
                        <div class="alert alert-error alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{!! session('error_message') !!}</strong>
                        </div>
                        @endif

                        @if(Session::has('success_message'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{!! session('success_message') !!}</strong>
                        </div>
                        @endif
                        <div class="card-body table-responsive mb-3">
                            <div class="table-responsive">
                                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>SO No.</th>
                                            <th>Client Name</th>
                                            <th>Equipment Name</th>
                                            <th>Delivery Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($allOrders)
                                        @foreach($allOrders as $order)
                                        
                                        <?php $orders = Order::where(['so'=>$order->so,'status'=>'Completed'])->get(); ?>
                                        <tr class="">
                                            <td class="">{{ $loop->index+1 }}</td>
                                            <td class="">{{ $order->so }}</td>
                                            <td>{{ $order->client_name }}</td>
                                            <td>
                                                @foreach($orders as $row)
                                                - {{ $row->equipment_name }}<br>
                                                @endforeach
                                            </td>
                                            <td>{{ date('d-M-Y', strtotime($order->delivery_date)) }}</td>
                                            <td class="">
                                                <div class="badge @if($order->status=='Pending') badge-info @else badge-success @endif">{{ $order->status }}</div>
                                            </td>
                                            <td class="d-inline-flex text-center">
                                                {{-- <a href="{{ url('admin/order-stages/'.$order->so.'/'.$order->equipment_type) }}" class="btn mr-1 mb-1 btn-warning btn-shadow" title="View Stages"><i class="fa fa-th"></i> </a> --}}
                                                <a href="{{ url('admin/order-stages/'.$order->so.'/'.$order->equipment_type.'/'.$order->id) }}" class="btn mr-1 mb-1 btn-warning btn-shadow" title="View Stages"><i class="fa fa-th"></i> </a>
                                                <button class="btn mr-1 mb-1 btn-primary btn-shadow" data-toggle="modal" data-target="#Modal{{ $order->id }}" title="View Order Details"><i class="fa fa-eye"></i> </button>
                                                <a href="{{ url('admin/edit-order/'.$order->so) }}" class="btn mr-1 mb-1 btn-info btn-shadow text-white" title="Edit Order Details"><i class="fa fa-pencil"></i> </a>
                                                @if($auth->role == 'Superadmin')
                                                <a href="{{ url('admin/delete-order/'.$order->so) }}" onclick="return confirm('Are you sure?');" class="btn mr-1 mb-1 btn-danger btn-shadow deleteOrder" title="Delete Order"><i class="fa fa-trash"></i></a>
                                                @endif
                                            </td>
                                        </tr>
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

    @foreach($allOrders as $order)
    <?php $orders = Order::where(['so'=>$order->so,'status'=>'Completed'])->get(); ?>
    <!-- view order Modal -->
    <div class="modal fade bd-example-modal-lg" id="Modal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order ID #{{ $order->so }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="main-card card">
                    <div class="card-body">
                        <table class="mb-0 table table-borderless table-responsive">
                            <tbody>
                                <tr>
                                    <th>SO Number :</th>
                                    <td>{{ $order->so }}</td>
                                    <th>Client Name :</th>
                                    <td>{{ $order->client_name }}</td>
                                </tr>
                                <tr>
                                    <th>PO Number :</th>
                                    <td>{{ $order->po }}</td>
                                    <th>PO Date :</th>
                                    <td>{{ date('D, d-M-Y', strtotime($order->po_date)) }}</td>
                                </tr>
                                <tr>
                                    <th>Delivery Date :</th>
                                    <td>{{ date('D, d-M-Y', strtotime($order->delivery_date)) }}</td>
                                    <th>TPI :</th>
                                    <td @if($order->tpi == 'No') class='text-danger' @else class='text-success' @endif>{{ $order->tpi }}</td>
                                </tr>
                                <tr>
                                    <th>Uploaded By :</th>
                                    <td><?php $user = explode('-', $order->email); echo $user[0].' ['.$user[1].']'; ?></td>
                                    <th>Status :</th>
                                    <td><button type="button" class="btn btn-sm btn-success"> {{ $order->status }}</button></td>
                                </tr>
                                <tr>
                                    <th>Created At :</th>
                                    <td>{{ date('D, d-M-Y, h:i A', strtotime($order->created_at)) }}</td>
                                    <th>Last Updated :</th>
                                    <td>{{ date('D, d-M-Y, h:i A', strtotime($order->updated_at)) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <input id="copy_btn" type="button" class="btn btn-info btn-sm mb-1" value="Copy Table">
                        <table class="mb-0 table table-bordered" id="resultsTable">
                            <tbody>
                                <tr>
                                    <th>Equipment Name</th>
                                    <th>MFR No.</th>
                                    <th>Tag No.</th>
                                </tr>
                                @foreach($orders as $row)
                                <tr>
                                    <td>{{$row->equipment_name }}</td>
                                    <td>{{ $row->mfr }}</td>
                                    <td>{{ $row->tag }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

<script>
    var copyBtn = document.querySelector('#copy_btn');
    copyBtn.addEventListener('click', function () {
      var urlField = document.querySelector('#resultsTable');
       
      // create a Range object
      var range = document.createRange();  
      // set the Node to select the "range"
      range.selectNode(urlField);
      // add the Range to the set of window selections
      window.getSelection().addRange(range);
       
      // execute 'copy', can't 'cut' in this case
      document.execCommand('copy');
}, false);
</script>
@endsection