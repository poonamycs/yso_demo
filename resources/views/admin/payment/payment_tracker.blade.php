@extends('layouts.app')
@section('content')
@php
    use Carbon\Carbon;
@endphp
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
                <h4 class="content-title mb-0 my-auto">Payment Tracker </h4>
            </div>
        </div>
        {{-- @if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('5', json_decode(Auth::guard('admin')->User()->role->permissions)))
        <div class="d-flex my-xl-auto right-content">
            <div class="pe-1 mb-xl-0">
                <a href="{{url('add-user')}}" class="modal-effect btn btn-primary btn-block"><span class="btn-icon-wrapper pr-2"><i class="fa fa-plus-circle"></i></span> Add User</a>
            </div>
        </div>
        @endif --}}
    </div>
    <div class="card mb-1 containet-fluid">
        <form action="{{url('payment-tracker')}}" method="get">@csrf
            <div class="row row-sm d-flex px-3">
                <div class="col-md-1 col-sm-4">
                    <div class="form-group mt-2 mb-2">
                        <label class="form-label">Filter</label>
                        {{-- <button type="submit" class="btn btn-primary btn-primary-gradient btn-rounded">Submit</button> --}}
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="form-group mt-2 mb-2">
                        <input type="text" name="name" id="name" value="{{$name}}" placeholder="Search by client_name,po_amt,ordersize" class="form-control" onchange="this.form.submit()">
                    </div>
                </div>
                <div class="col-md-5 col-sm-6">
                    <div class="form-group mt-2 mb-2">
                        <a href="{{url('payment-tracker')}}">Clear</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
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
                    <div class="row row-sm">	
                    <?php
                        $months = array();
                        for ($i = 0; $i <= settings('payment_upcming_months'); $i++) {
                            $month = Carbon::now()->addMonthNoOverflow($i)->format('M');
                            $year = Carbon::now()->addMonthNoOverflow($i)->format('Y');
                            array_push($months, array(
                                'month' => $month,
                                'year' => $year,
                        
                            ));
                        }
                    ?>
                    
                    @foreach($months as $key => $val)
                        <div class="col-xl-2 col-lg-2 col-md-2 col-xm-12">
                            <div class="card overflow-hidden sales-card bg-danger-gradient">
                                <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                                    <div class="">
                                        <h6 class="mb-3 text-white">{{$val['month'].'-'.$val['year']}}</h6>
                                    </div>
                                    <div class="pb-0 mt-0">
                                        <div class="d-flex">
                                            <div class="">
                                            <h4 class="tx-20 fw-bold mb-1 text-white"></h4>
                                                <p class="mb-0 tx-12 text-white op-7" id="amount-<?php echo $val['month']; ?>">Receivable Amount</p>
                                            </div>
                                            <!-- <span class="float-end my-auto ms-auto">
                                                <i class="fas fa-arrow-circle-up text-white"></i>
                                                <span class="text-white op-7"> 52.09%</span>
                                            </span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="table-responsive">
                        <table class="table key-buttons text-md-nowrap table-hover datatab">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0 text-center">Sr.No.</th>
                                    <th class="border-bottom-0 text-left">Client Name </th>
                                    <th class="border-bottom-0 text-center">SO No.</th>
                                    <th class="border-bottom-0 text-center">Project Amt.</th>
                                    <th class="border-bottom-0 text-center">Amendment Amt.</th>
                                    <th class="border-bottom-0 text-center">After Amendment<br> Project Amt.</th>
                                    <th class="border-bottom-0 text-center">Tax</th>
                                    <th class="border-bottom-0 text-center">Total Project value<br> with Tax</th>
                                    <th class="border-bottom-0 text-center">Advance Received <br>till Date</th>
                                    <th class="border-bottom-0 text-center">Balance Amount</th>
                                    <?php
                                        $months = array();
                                        for ($i = 0; $i <= settings('payment_upcming_months'); $i++) {
                                            $month = Carbon::now()->addMonthNoOverflow($i)->format('M');
                                            $year = Carbon::now()->addMonthNoOverflow($i)->format('Y');
                                            array_push($months, array(
                                                'month' => $month,
                                                'year' => $year,
                                            ));
                                        }
                                    ?>
                                    @foreach($months as $key => $val)
                                    <th class="border-bottom-0 text-center">{{$val['month'].'-'.$val['year']}}</th>
                                    @endforeach
                                    {{-- <th class="border-bottom-0 text-center">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; 
                                $total1 = $total2 = $total3 = $total4 = $total5 = $total6 = 0; 
                                $monthsTotal = [];
                                ?>
                                @foreach($clients as $row)
                                <tr>
                                    <td class="text-center align-middle">{{ $i++ }}</td>
                                    <td class="text-left text-black fw-500">{{ $row->client_name }}</td>
                                    <td class="text-center align-middle">{{ $row->so }}</td>
                                    <td class="text-center align-middle">{{ number_format($row->order_size) }}</td>
                                    <td class="text-center align-middle">
                                        <?php $amd_amt = 0; ?>
                                        @foreach($row->AmendmentPayments as $data) 
                                        <?php $amd_amt = $amd_amt + $data->amount; ?>
                                        @endforeach
                                        {{number_format($amd_amt)}}
                                    </td>
                                    <td class="text-center align-middle">{{ $pobasic = number_format($row->order_size+$amd_amt) }}</td>
                                    <?php $pobasic = $row->order_size+$amd_amt;?>
                                    <td class="text-center align-middle">{{ $tax = round($pobasic*($row->tax/100), 1) }} @if(!empty($row->tax))({{$row->tax}}%)@endif</td>
                                    <td class="text-center align-middle">{{ $total = number_format(round($pobasic+$tax,1)) }}</td>
                                    <?php $total = round($pobasic+$tax,1)?>
                                    <!-- Advance Received till Date -->
                                    <td class="text-center align-middle">
                                    	<?php $paid_cycles = 0; ?>
                                        @foreach($row->paidpaymentcycles as $temp)
                                        <?php $paid_cycles = $paid_cycles + $temp->amount; ?>
                                        @endforeach
                                        {{$advance = number_format($paid_cycles)}}
                                        <?php $advance = $paid_cycles?>
                                    </td>
                                    <td class="text-center align-middle">{{number_format($total - $advance)}}</td>
                                    
                                    @foreach($months as $key => $val)
                                    
                                    @php
                                        $start = Carbon::parse($val['month'].' '.$val['year'])->startOfMonth()->format('Y-m-d');
                                        $end = Carbon::parse($val['month'].' '.$val['year'])->endOfMonth()->format('Y-m-d');
                                        $amount = App\Models\PaymentCashflow::where('order_id',$row->id)->whereBetween('date',[$start, $end])->sum('amount');
                                        $result = substr($start, 5, 2);
                                        if (!isset($monthsTotal[$val['month']])) {
                                            $monthsTotal[$val['month']] = 0;
                                        }
                                        $monthsTotal[$val['month']] += $amount;
                                    @endphp
                                        
                                    <td class="text-center align-middle">{{number_format($amount)}}</td>
                                    @endforeach
                                
                                    <!-- <td class="text-center align-middle">
                                        <button class="btn mr-1 mb-1 btn-outline-primary btn-shadow btn-sm" data-bs-toggle="popover" data-bs-displacement="top" data-bs-content="Created On: {{ date('d M Y h:i', strtotime($row->created_at)) }} | Last Updated: {{ date('d M Y h:i', strtotime($row->updated_at)) }}" data-bs-original-title="More Details"><i class="fa fa-info-circle"></i> </button>
                                    </td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$clients->appends(request()->input())->links('pagination::bootstrap-4')}}
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
    <script>
        $(function() {
            
            var totalRevenue = <?php echo json_encode($monthsTotal) ?>;
            for (var property in totalRevenue) {
                $('#amount-'+property).html(totalRevenue[property]/100000);
            }
        })
    </script>
@endsection