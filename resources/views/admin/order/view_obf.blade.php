@extends('layouts.app')
@section('content')

    @section('styles')
        {{-- <link href="{{asset('assets/plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/datatable/responsive.dataTables.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/responsive.bootstrap5.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet"> --}}
    
        <link rel="stylesheet" href="{{asset('assets/plugins/sumoselect/sumoselect.css')}}">
        <style>
            .searchCode:before {
                content: " X ";
                color: #ababab;
                cursor: pointer;
            }
        </style>
    @endsection
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart', 'bar']});
            google.charts.setOnLoadCallback(drawStuff);
            function drawStuff() {
            var button = document.getElementById('change-chart');
            var chartDiv = document.getElementById('chart_div');

            var data = google.visualization.arrayToDataTable([
            ['Quaterly', 'Booking till date', 'Booking Target'],
            ['Q1', {{$col_q1}}, {{json_decode($target->btarget)->bq1}}],
            ['Q2', {{$col_q2}}, {{json_decode($target->btarget)->bq2}}],
            ['Q3', {{$col_q3}}, {{json_decode($target->btarget)->bq3}}],
            ['Q4', {{$col_q4}}, {{json_decode($target->btarget)->bq4}}],
            ]);

            var classicOptions = {
            width: 650,
            series: {
                0: {targetAxisIndex: 0},
                // 1: {targetAxisIndex: 1}
            },
            };

            function drawClassicChart() {
            var classicChart = new google.visualization.ColumnChart(barchart_material_booking);
            classicChart.draw(data, classicOptions);
            // button.innerText = 'Change to Material';
            // button.onclick = drawMaterialChart;
            }
            drawClassicChart();
            };
        
        </script>

        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart', 'bar']});
            google.charts.setOnLoadCallback(drawStuff);
            function drawStuff() {
            var button = document.getElementById('change-chart');
            var chartDiv = document.getElementById('chart_div');

            var data = google.visualization.arrayToDataTable([
            ['Quaterly', 'Sold till date', 'Selling Target'],
            ['Q1', {{$col_saleq1}}, {{json_decode($target->starget)->sq1}}],
            ['Q2', {{$col_saleq2}}, {{json_decode($target->starget)->sq2}}],
            ['Q3', {{$col_saleq3}}, {{json_decode($target->starget)->sq3}}],
            ['Q4', {{$col_saleq4}}, {{json_decode($target->starget)->sq4}}],
            ]);

            var classicOptions = {
            width: 650,
            series: {
                0: {targetAxisIndex: 0},
                // 1: {targetAxisIndex: 1}
            },
            };
            function drawClassicChart() {
            var classicChart = new google.visualization.ColumnChart(barchart_material_sale);
            classicChart.draw(data, classicOptions);
            // button.innerText = 'Change to Material';
            // button.onclick = drawMaterialChart;
            }
            drawClassicChart();
            };
        </script>
    

    @php 
        $poTotal = 0; 
        $temp = explode('-',$fy); 
    @endphp
    
    <div class="breadcrumb-header justify-content-between pt-3 mt-0 mb-1">
        <div class="my-auto">
            <div class="d-flex">
                <h5 class="content-title mb-0 my-auto">OBF 
                    {{-- <span class="badge bg-dark h6 mb-0">FY {{date('Y', strtotime($fyYear['start_date']))}}-{{(date('Y', strtotime($fyYear['start_date'])))+1}}</span> --}}
                </h5>
                <div class="mb-xl-0">
                    <div class="btn-group dropdown mx-3">
                        <button type="button" class="btn btn-primary btn-sm">FY {{$temp[0]}}-{{$temp[1]}}</button>
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate" x-placement="bottom-end">
                            @for($i = 0; $i<=7; $i++)
                            <a class="dropdown-item" href="{{url('obf-tracker/'.date("Y",strtotime("-".$i." year")).'-'.(date('Y',strtotime('-'.$i.' year'))+1))}}">{{date("Y",strtotime("-".$i." year"))}}-{{date("Y",strtotime("-".$i." year"))+1}}</a>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="mb-xl-0">
                    <a href="{{url('obf-report/'.$fy)}}" class="btn btn-primary btn-sm"><i class="fa fa-file-excel"></i> Export</a>
                </div>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="mb-xl-0">
                <a href="javascript:void" data-bs-toggle="modal" data-bs-target="#targetModal" class="btn btn-primary btn-sm"><i class="fa fa-bullseye"></i> Sale Target</a>
            </div>
            <div class="mb-xl-0">
                <a href="javascript:void" data-bs-toggle="modal" data-bs-target="#senggTarget" class="btn btn-primary btn-sm ml-1"><i class="fa fa-bullseye"></i> Sales Engg. Target</a>
            </div>
            <div class="mb-xl-0">
                <a href="javascript:void" data-bs-toggle="modal" data-bs-target="#targetModal1" class="btn btn-primary btn-sm ml-1"><i class="fa fa-bullseye"></i> View Targets</a>
            </div>
        </div>
    </div>

    <div class="row row-sm">
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
        <div class="col-lg-6">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="exampl" class="table key-buttons table-talk-time table-bordered text-md-nowrap table-hover mb-0 datatab">
                            <thead>
                                <tr class="thead-light">
                                    <th class="border-bottom-0 text-center">FY {{$temp[0]}}-{{$temp[1]}}</th>
                                    <th class="border-bottom-0 text-center">June {{$temp[0]}}</th>
                                    <th class="border-bottom-0 text-center">Sept {{$temp[0]}}</th>
                                    <th class="border-bottom-0 text-center">Dec {{$temp[1]}}</th>
                                    <th class="border-bottom-0 text-center">Mar {{$temp[1]}}</th>
                                    <th class="border-bottom-0 text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-secondary text-white">
                                    <td class="text-center"></td>
                                    <td class="text-center fw-500">Q1</td>
                                    <td class="text-center fw-500">Q2</td>
                                    <td class="text-center fw-500">Q3</td>
                                    <td class="text-center fw-500">Q4</td>
                                    <td class="text-center fw-500">Rs Lacs</td>
                                </tr>
                                @if($target)
                                <tr>
                                    <td class="text-left fw-500">Booking Target</td>
                                    <td class="text-center fw-500">{{$btq1 = json_decode($target->btarget)->bq1}}</td>
                                    <td class="text-center fw-500">{{$btq2 = json_decode($target->btarget)->bq2}}</td>
                                    <td class="text-center fw-500">{{$btq3 = json_decode($target->btarget)->bq3}}</td>
                                    <td class="text-center fw-500">{{$btq4 = json_decode($target->btarget)->bq4}}</td>
                                    <td class="text-center fw-500">{{$bt = number_format($btq1+$btq2+$btq3+$btq4)}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left fw-500">Sales Target </td>
                                    <td class="text-center fw-500">{{$stq1 = json_decode($target->starget)->sq1}}</td>
                                    <td class="text-center fw-500">{{$stq2 = json_decode($target->starget)->sq2}}</td>
                                    <td class="text-center fw-500">{{$stq3 = json_decode($target->starget)->sq3}}</td>
                                    <td class="text-center fw-500">{{$stq4 = json_decode($target->starget)->sq4}}</td>
                                    <td class="text-center fw-500">{{$bt = number_format($stq1+$btq2+$stq3+$stq4)}}</td>
                                </tr>
                                <tr>
                                    <td class="text-center"></td>
                                    <td class="text-center fw-500"></td>
                                    <td class="text-center fw-500"></td>
                                    <td class="text-center fw-500"></td>
                                    <td class="text-center fw-500"></td>
                                    <td class="text-center fw-500"></td>
                                </tr>
                                <tr>
                                    <td class="text-left fw-500">Booking Till Date</td>
                                    <td class="text-center fw-500">{{$bq1 = ($q1->sum('order_size'))/100000}}</td>
                                    <td class="text-center fw-500">{{$bq2 = ($q2->sum('order_size'))/100000}}</td>
                                    <td class="text-center fw-500">{{$bq3 = ($q3->sum('order_size'))/100000}}</td>
                                    <td class="text-center fw-500">{{$bq4 = ($q4->sum('order_size'))/100000}}</td>
                                    <td class="text-center fw-500 bg-primary text-white">{{ $btdate = number_format($bq1 + $bq2 + $bq3 + $bq4) }}</td>
                                </tr><?php $btdate = $bq1 + $bq2 + $bq3 + $bq4?>
                                <tr>
                                    <td class="text-left fw-500">Booking Shortfall</td>
                                    <td class="text-center fw-500">{{$btemp1 = $bq1-(json_decode($target->btarget)->bq1)}}</td>
                                    <td class="text-center fw-500">{{$btemp2 = $bq2-(json_decode($target->btarget)->bq2)+$btemp1}}</td>
                                    <td class="text-center fw-500">{{$btemp3 = $bq3-(json_decode($target->btarget)->bq3)+$btemp2}}</td>
                                    <td class="text-center fw-500">{{$btemp4 = $bq4-(json_decode($target->btarget)->bq4)+$btemp3}}</td>
                                    <td class="text-center fw-500 bg-primary text-white">{{$btemp4}}</td>
                                </tr>
                                <tr>
                                    <td class="text-center"></td>
                                    <td class="text-center fw-500"></td>
                                    <td class="text-center fw-500"></td>
                                    <td class="text-center fw-500"></td>
                                    <td class="text-center fw-500"></td>
                                    <td class="text-center fw-500"></td>
                                </tr>
                                <tr>
                                    <td class="text-left fw-500">Sales Till Date</td>
                                    <td class="text-center fw-500">{{($sq1 = $saleq1->sum('order_size'))/100000}}</td>
                                    <td class="text-center fw-500">{{($sq2 = $saleq2->sum('order_size'))/100000}}</td>
                                    <td class="text-center fw-500">{{($sq3 = $saleq3->sum('order_size'))/100000}}</td>
                                    <td class="text-center fw-500">{{($sq4 = $saleq4->sum('order_size'))/100000}}</td>
                                    <td class="text-center fw-500 bg-primary text-white">{{ $stdate = number_format($sq1 + $sq2 + $sq3 + $sq4) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-left fw-500">Sales Shortfall</td>
                                    <td class="text-center fw-500">{{$stemp1 = $sq1-(json_decode($target->starget)->sq1)}}</td>
                                    <td class="text-center fw-500">{{$stemp2 = $sq2-(json_decode($target->starget)->sq2)+$stemp1}}</td>
                                    <td class="text-center fw-500">{{$stemp3 = $sq3-(json_decode($target->starget)->sq3)+$stemp2}}</td>
                                    <td class="text-center fw-500">{{$stemp4 = $sq4-(json_decode($target->starget)->sq4)+$stemp3}}</td>
                                    <td class="text-center fw-500 bg-primary text-white">{{$stemp4}}</td>
                                </tr>
                                @else
                                <div class="alert alert-dark fw-500">
                                    No data found
                                </div>
                                @endif
                            </tbody>
                        </table>
                        <div class="row row-sm m-0">
                            <div class="col-md-12 p-0 order-2 order-sm-1">
                                <table id="exampl" class="table key-buttons table-talk-time table-bordered text-md-nowrap table-hover mb-0 mt-3 datatab">
                                    <tbody>
                                        @foreach($poAwaited as $po)
                                        <tr>
                                            @if($loop->first)
                                            <td class="text-left fw-500 bg-light">PO Awaited</td>
                                            @else
                                            <td class="text-left fw-500"></td>
                                            @endif
                                            <td class="text-center fw-500">{{$po->customer_name}}</td>
                                            <td class="text-center fw-500 bg-light">{{numberFormat2($po->price)}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td class="text-left fw-500"></td>
                                            <td class="text-center fw-500 bg-light">Total</td>
                                            <td class="text-center fw-500 bg-light">{{ $poTotal = numberFormat2($poAwaited->sum('price'))}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @if($target)
                            <div class="col-md-12 p-0 order-1 order-sm-2">
                                <table id="exampl" class="table key-buttons table-talk-time table-bordered text-md-nowrap table-hover mb-0 mt-3 datatab">
                                    <tbody>
                                        <tr>
                                            <td class="text-left fw-500 bg-light">PO Awaited</td>
                                            <td class="text-center fw-500"></td>
                                            <td class="text-center fw-500"></td>
                                            <td class="text-center fw-500"></td>
                                            <td class="text-center fw-500"></td>
                                            <td class="text-center fw-500 bg-light">{{number_format($poTotal)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left fw-500 bg-light">Booking + PO Awaited</td>
                                            <td class="text-center fw-500"></td>
                                            <td class="text-center fw-500"></td>
                                            <td class="text-center fw-500"></td>
                                            <td class="text-center fw-500"></td>
                                            <td class="text-center fw-500 bg-light">{{number_format($btdate + $poTotal)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left fw-500 bg-light">Last Year Carry Forward</td>
                                            <td class="text-center fw-500"></td>
                                            <td class="text-center fw-500"></td>
                                            <td class="text-center fw-500"></td>
                                            <td class="text-center fw-500"></td>
                                            <td class="text-center fw-500 bg-light">{{$target->ly_carryforw}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left fw-500 bg-light">Current Year Carry Forward</td>
                                            <td class="text-center fw-500"></td>
                                            <td class="text-center fw-500"></td>
                                            <td class="text-center fw-500"></td>
                                            <td class="text-center fw-500"></td>
                                            <td class="text-center fw-500 bg-light">{{$target->cy_carryforw}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="exampl" class="table key-buttons table-talk-time table-bordered text-md-nowrap table-hover mb-0 datatab">
                            <thead>
                                <tr class="thead-light">
                                    <th class="border-bottom-0 text-left">Engineer</th>
                                    <th class="border-bottom-0 text-left">Ratio</th>
                                    <th class="border-bottom-0 text-center">Region</th>
                                    <th class="border-bottom-0 text-center">Target</th>
                                    <th class="border-bottom-0 text-center">Achieved</th>
                                    <th class="border-bottom-0 text-center">Achieved %</th>
                                    <th class="border-bottom-0 text-center">Shortfall</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($setargets) > 0)
                                @php $grandtotal = 0; $per = 0; @endphp
                                @foreach($setargets as $se)
                                <!-- @php
                                    // $a = $loop->index+1;
                                    // $arr[] = json_encode($se->sengg);
                                    // $arr[] = json_encode($se->per);
                                    // $array = json_decode(json_encode($arr));
                                @endphp -->
                                <tr class="">
                                    <td class="text-left fw-500">
                                        @foreach($se->sengg as $val) 
                                            <span>{{user($val)}}</span> @if($loop->last) @else + @endif 
                                        @endforeach
                                    </td>
                                    <td class="text-left fw-500">
                                        @if($se->per)
                                        @foreach($se->per as $ratio) 
                                            <span>{{$ratio}}</span> @if($loop->last) @else + @endif 
                                        @endforeach
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td class="text-center fw-500">
                                        @foreach($se->region as $region) 
                                            {{$region}}
                                        @endforeach
                                    </td>
                                    <td class="text-center fw-500">{{$se->target}} </td>
                                    <td class="text-center fw-500">
                                        @foreach($se->sengg as $val)
                                            @if($loop->first)
                                            <?php $ordertotal = orderTotal($val, $fy)/100000 ?>
                                            {{$ordertotal = number_format($ordertotal)}}
                                            <?php $ordertotal = orderTotal($val, $fy)/100000 ?>
                                            @endif
                                        @endforeach 
                                    </td>
                                    <td class="text-center fw-500">{{$per1 = round($ordertotal/$se->target, 2) }}%</td>
                                    <td class="text-center fw-500">{{round($ordertotal - $se->target, 3)}}</td>
                                </tr>
                                <?php 
                                    $grandtotal = $grandtotal + $ordertotal;
                                    $per = $per + $per1;
                                ?>
                                @endforeach
                                <tr class="bg-light">
                                    <td class="text-center fw-500" colspan="3">Total</td>
                                    <td class="text-center fw-500">{{$setargets->sum('target')}}</td>
                                    <td class="text-center fw-500">{{number_format($grandtotal)}}</td>
                                    <td class="text-center fw-500">{{$per}}%</td>
                                    <td class="text-center fw-500">{{$grandtotal - $setargets->sum('target')}}</td>
                                </tr>
                                @else
                                No records found!
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-sm">
        <div class="col-md-4 col-lg-6 col-sm-12">
            <div class="card">
                <div class="card-header bg-primary-transparent pd-t-20 bd-b-0">
                    <div class="d-flex justify-content-between">
                        <label class="main-content-label mb-0 tx-15">This FY Year Booking Target & Acheived</label>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <h6 class="tx-12 mb-1 text-">This FY Year Booking Target & Acheived</h6>
                    <div id="barchart_material_booking" class="mt-5" style="width: 100%; height: 245px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-6 col-sm-12">
            <div class="card">
                <div class="card-header bg-primary-transparent pd-t-20 bd-b-0">
                    <div class="d-flex justify-content-between">
                        <label class="main-content-label mb-0 tx-15">This FY Year Sales Target & Acheived</label>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <h6 class="tx-12 mb-1 text-">This FY Year Sales Target & Acheived</h6>
                    <div id="barchart_material_sale" class="mt-5" style="width: 100%; height: 245px;"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- add target -->
    <div class="modal" id="targetModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Financial Year Booking & Sales Target</h6>
                    <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="addUser" name="addUser" class="col-md-12 mt-2 mx-auto" method="post" action="{{ route('add_fy_target') }}" enctype="multipart/form-data">@csrf
                        <div class="row mt-2">
                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group mg-b-0 px-0">
                                    <label for="fy" class="form-label">Financial Year <span class="tx-danger">*</span></label>
                                    <select name="fy" id="fy" class="form-control select2" required>
                                        <option value="">-- Select Year --</option>
                                        @for($i = -1; $i<=5; $i++)
                                        <option value="{{date("Y",strtotime($i." year"))}}-{{date("Y",strtotime($i." year"))+1}}">{{date("Y",strtotime($i." year"))}}-{{date("Y",strtotime($i." year"))+1}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <label for="title" class="form-label mb-0">Booking Target (Rs Lacs) <span class="text-danger">*</span> <span id="btotal" class="badge bg-dark"></span></label>
                            <div class="col-md-3 col-sm-6 form-group mg-b-0">
                                <div class="form-group">
                                    <label class="form-label tx-12">Q1 (Apr-Jun) </label>
                                    <input type="number" class="form-control bq" name="bq1" required />
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 form-group mg-b-0">
                                <div class="form-group">
                                    <label class="form-label tx-12">Q2 (Jul-Sept)</label>
                                    <input type="number" class="form-control bq" name="bq2" required />
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 form-group mg-b-0">
                                <div class="form-group">
                                    <label class="form-label tx-12">Q3 (Oct-Dec)</label>
                                    <input type="number" class="form-control bq" name="bq3" required />
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 form-group mg-b-0">
                                <div class="form-group">
                                    <label class="form-label tx-12">Q4 (Jan-Mar)</label>
                                    <input type="number" class="form-control bq" name="bq4" required />
                                </div>
                            </div>
                            <label for="title" class="form-label mb-0">Sales Target (Rs Lacs) <span class="text-danger">*</span> <span id="stotal" class="badge bg-dark"></span> </label>
                            <div class="col-md-3 col-sm-6 form-group mg-b-0">
                                <div class="form-group">
                                    <label class="form-label tx-12">Q1 (Apr-Jun) </label>
                                    <input type="number" class="form-control sq" name="sq1" required />
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 form-group mg-b-0">
                                <div class="form-group">
                                    <label class="form-label tx-12">Q2 (Jul-Sept)</label>
                                    <input type="number" class="form-control sq" name="sq2" required />
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 form-group mg-b-0">
                                <div class="form-group">
                                    <label class="form-label tx-12">Q3 (Oct-Dec)</label>
                                    <input type="number" class="form-control sq" name="sq3" required />
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 form-group mg-b-0">
                                <div class="form-group">
                                    <label class="form-label tx-12">Q4 (Jan-Mar)</label>
                                    <input type="number" class="form-control sq" name="sq4" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12 col-md-12 text-right">
                                    <button class="btn btn-main-primary pd-x-20" type="submit"><i class="fa fa-check-circle"></i> Save</button>
                                    {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#targetModal1"><i class="fa fa-check-circle"></i> Modal</button> --}}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- engg target -->
    <div class="modal" id="senggTarget">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Financial Year Booking & Sales Target - Sales Engineer</h6>
                    <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add_se_target') }}" method="post" id="addUser" name="addUser" class="col-md-12 mt-2 mx-auto" enctype="multipart/form-data">@csrf
                        <div class="row mt-2">
                            <div class="form-group">
                                <div class="col-lg-8 col-md-8 col-sm-12 form-group mg-b-0 px-0">
                                    <label for="fy" class="form-label">Financial Year <span class="tx-danger">*</span></label>
                                    <select name="fy" id="fy" class="form-control select2" required>
                                        <option value="">-- Select Year --</option>
                                        @for($i = -1; $i<=5; $i++)
                                        <option value="{{date("Y",strtotime($i." year"))}}-{{date("Y",strtotime($i." year"))+1}}">{{date("Y",strtotime($i." year"))}}-{{date("Y",strtotime($i." year"))+1}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-8 col-md-8 col-sm-12 form-group mg-b-0 px-0">
                                    <label for="region" class="form-label">Region <span class="tx-danger">*</span></label>
                                    <select name="region[]" id="region" class="form-control testselect2" multiple required>
                                        {{-- <option value="">-- Select option --</option> --}}
                                        <option value="EAST">EAST</option>
                                        <option value="EXPORT">EXPORT</option>
                                        <option value="MH">MH</option>
                                        <option value="NORTH">NORTH</option>
                                        <option value="SOUTH">SOUTH</option>
                                        <option value="WEST">WEST</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-row">
                                <div class="col-md-4 col-sm-12 form-group mg-b-0 px-0">
                                    <label class="form-label">Sales Engineer <span class="tx-danger">*</span></label>
                                    <select id="senggi" class="form-control testselect2" multiple required>
                                        {{-- <option value="">-- Select option --</option> --}}
                                        @foreach(App\Models\Admin::where('status','1')->orderBy('name','ASC')->get() as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-12 form-group mg-b-0 px-0">
                                    <table id="selectedList" class="mx-3"></table>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-8 col-md-8 col-sm-12 form-group mg-b-0 px-0">
                                    <label for="target" class="form-label required_field">Target (Rs Lacs)</label>
                                    <input type="number" class="form-control" id="target" maxlength="60" name="target" value="100" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12 col-md-12 text-left p-0">
                                    <button class="btn btn-main-primary pd-x-20" type="submit"><i class="fa fa-check-circle"></i> Save</button>
                                    <button class="btn btn-light pd-x-20" aria-label="Close" class="close" data-bs-dismiss="modal" type="button"> Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- view target -->
    <div class="modal" id="targetModal1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content modal-content-demo">
                <div class="panel panel-primary tabs-style-2">
                    <div class=" tab-menu-heading">
                        <div class="tabs-menu1">
                            <ul class="nav panel-tabs main-nav-line">
                                <li><a href="#tab1" class="nav-link active" data-bs-toggle="tab">FY Sales Target <small>(in Rs Lacs)</small></a></li>
                                <li><a href="#tab2" class="nav-link" data-bs-toggle="tab">FY Sales Engineer Target <small>(in Rs Lacs)</small></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body main-content-body-right p-0">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <div class="modal-header">
                                    <h6 class="modal-title">FY Sales Target <small>(in Rs Lacs)</small></h6>
                                    <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <table id="example" class="table key-buttons text-md-nowrap table-hover table-dashboard-two">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0 text-center">Sr. No</th>
                                                <th class="border-bottom-0 text-left">FY</th>
                                                <th class="border-bottom-0 text-center">Booking Target</th>
                                                <th class="border-bottom-0 text-center">Sales Target</th>
                                                <th class="border-bottom-0 text-center">Last Year CF</th>
                                                <th class="border-bottom-0 text-center">Current Year CF</th>
                                                <th class="border-bottom-0 text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(App\Models\SalesTarget::orderBy('fy','DESC')->get() as $row)
                                            <tr>
                                                <td class="text-center align-middle">{{ $loop->index+1 }}</td>
                                                <td class="text-left">{{ $row->fy }}</td>
                                                <td class="text-center align-middle">
                                                    <table class="table table-dashboard-two table-bordered">
                                                        <tr>
                                                            <td class="fw-500">Q1</td>
                                                            <td>Q2</td>
                                                            <td>Q3</td>
                                                            <td>Q4</td>
                                                        <tr>
                                                        <tr>
                                                            <td class="fw-500">{{ json_decode($row->btarget)->bq1 }}</td>
                                                            <td>{{ json_decode($row->btarget)->bq2 }}</td>
                                                            <td>{{ json_decode($row->btarget)->bq3 }}</td>
                                                            <td>{{ json_decode($row->btarget)->bq4 }}</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <table class="table table-dashboard-two table-bordered">
                                                        <tr>
                                                            <td class="fw-500">Q1</td>
                                                            <td>Q2</td>
                                                            <td>Q3</td>
                                                            <td>Q4</td>
                                                        <tr>
                                                        <tr>
                                                            <td class="fw-500">{{ json_decode($row->starget)->sq1 }}</td>
                                                            <td>{{ json_decode($row->starget)->sq2 }}</td>
                                                            <td>{{ json_decode($row->starget)->sq3 }}</td>
                                                            <td>{{ json_decode($row->starget)->sq4 }}</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="text-center align-middle">{{ $row->ly_carryforw }}</td>
                                                <td class="text-center align-middle">{{ $row->cy_carryforw }}</td>
                                                <td class="text-center align-middle">
                                                    {{-- <a href="{{url('edit-user/'.base64_encode($row->id))}}" class="btn mr-1 mb-1 btn-outline-info btn-shadow btn-sm" data-bs-toggle="tooltip" title="Edit User Details"><i class="fa fa-pencil-alt"></i></a> --}}
                                                    <a href="javascript:void" rel="{{$row->id}}" rel1="delete-fy-target" class="btn mr-1 mb-1 btn-outline-danger btn-shadow btn-sm deleteBtn" data-bs-toggle="tooltip"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <div class="modal-header">
                                    <h6 class="modal-title">FY Sales Engineer Target <small>(in Rs Lacs)</small></h6>
                                    <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <table id="example" class="table key-buttons text-md-nowrap table-hover table-dashboard-two">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0 text-center">Sr. No</th>
                                                <th class="border-bottom-0 text-center">FY</th>
                                                <th class="border-bottom-0 text-center">Target</th>
                                                <th class="border-bottom-0 text-center">Regions</th>
                                                <th class="border-bottom-0 text-center">Engineers</th>
                                                <th class="border-bottom-0 text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            @foreach(App\Models\SETarget::orderBy('fy','DESC')->get() as $se1)
                                            <tr>
                                                <td class="text-center align-middle">{{$loop->index+1}}</td>
                                                <td class="text-center align-middle">{{$se1->fy}}</td>
                                                <td class="text-center align-middle">{{$se1->target}}</td>
                                                <td class="text-center align-middle">@foreach($se1->region as $reg) {{$reg}} @if($loop->last) @else <br> @endif  @endforeach </td>
                                                <td class="text-center align-middle">@foreach($se1->sengg as $sengg) {{user($sengg)}} @if($loop->last) @else <br> @endif  @endforeach </td>
                                                <td class="text-center align-middle">
                                                    {{-- <a href="{{url('edit-user/'.base64_encode($row->id))}}" class="btn mr-1 mb-1 btn-outline-info btn-shadow btn-sm" data-bs-toggle="tooltip" title="Edit User Details"><i class="fa fa-pencil-alt"></i></a> --}}
                                                    <a href="javascript:void" rel="{{$se1->id}}" rel1="delete-se-target" class="btn mr-1 mb-1 btn-outline-danger btn-shadow btn-sm deleteBtn" data-bs-toggle="tooltip"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
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

@endsection

@section('scripts')
        <script>
            $(document).ready(function() {
                var i = 0;
                $("#senggi").change(function() {
                    var li$;
                    $("#selectedList").html("");
                    $("#senggi option:selected").each(function() {
                        li$ = '<tr class="d-flex"><td class="w-50"><input type="hidden" name="sengg[]" value="'+$(this).val()+'">'+$(this).text()+'</td><td class="w-50"><input type="text" name="per[]" class="form-control form-control-sm" placeholder="Enter percentage out of 1" required /></td></tr>';
                        $("#selectedList").append(li$);
                    });
                    i++;
                }).change();

                $("#submit").click(function() {
                    var str = "";
                    $("#selectedList li").each(function() {
                        str += $(this).text() + "|" + $(this).data("value") + " ";
                    })
                    alert(str);
                });


                $(document).on("click", ".searchCode", function() {
                    $("option:selected[value='"+$(this).data("value")+"']").prop("selected",false);
                    //[value='"+$(this).data("val")+"']").addClass("farts");
                    $(this).remove();
                });

                $("#openDropdown").click(function() {
                    $("#select").slideToggle();
                });
            })



            $(document).ready(function(){
                var i = 0;
                $('#senggi-').on('change', function(e) {
                    // var val = $(e.target).val();
                    // var text = $(this).find(':selected').data('engineer');
                    var val = $( "#senggi option:selected" ).val();
                    var text = $( "#senggi option:selected" ).text();

                    var fieldHTML = '<div class="d-flex"><input type="hidden" class="form-control" id="row'+i+'" value="'+val+'" /><span>'+text+'</span><input type="number" class="form-control" value="" /></div>';
                    $('#append').append(fieldHTML);
                    console.log(fieldHTML);
                    i++;
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#senggTarget1').modal('show');

                $('.bq').blur(function () {
                    var sum = 0;
                    $('.bq').each(function() {
                        sum += Number($(this).val());
                    });
                    $('#btotal').html(sum);
                });

                $('.sq').blur(function () {
                    var sum = 0;
                    $('.sq').each(function() {
                        sum += Number($(this).val());
                    });
                    $('#stotal').html(sum);
                });
            });
        </script>

        {{-- <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/datatables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
        <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/js/table-data.js')}}"></script> --}}

    <script src="{{asset('assets/js/advanced-form-elements.js')}}"></script>    
        
    <script src="{{asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
@endsection