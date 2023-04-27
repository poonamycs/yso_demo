@extends('layouts.app')

@section('styles')
	<!-- Maps css -->
	<link href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
	<!--  Owl-carousel css-->
	<link href="{{asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/morrisjs/morris.css')}}" rel="stylesheet">

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<!-- pie chart -->
    <script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

      	function drawChart() {
	        var data = google.visualization.arrayToDataTable([
				['Task', 'Hours per Day'],
				['Completed',   {{count($OrdersCompleteCount)}}],
				['In Process',  {{count($OrdersCount)}}]
	        ]);
	        var options = {
	          	title: ''
	        };
	        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
	        chart.draw(data, options);
      	}
    </script>
	
	<!-- amount receivable bar chart -->
    <script>
    	google.charts.load('current', {packages: ['corechart', 'bar']});
		google.charts.setOnLoadCallback(drawBasic);

		function drawBasic() {
			var data = new google.visualization.DataTable();
			data.addColumn('timeofday', 'Time of Day');
			data.addColumn('number', 'Receivable Amount');

		    var data = google.visualization.arrayToDataTable([
		        ['Month', 'Amount'],
		        @foreach($recAmt as $key => $val)
				{!!$val[0]!!}
				@endforeach
		    ]);

		    var options = {
		        title: '',
		        vAxis: {
		          	title: 'Receivable Amount (Rs)'
		        }
		    };
		    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
	      	chart.draw(data, options);
	    }
    </script>
@endsection

@section('content')
	
	<div class="breadcrumb-header justify-content-between pt-3 mt-0">
		<div class="left-content">
			<div>
			<h2 class="main-content-title tx-22 pb-1 mg-b-1 mg-b-lg-1 gradient-text">Hi <?php $first = explode(" ", Auth::guard('admin')->User()->name); echo $first[0]; ?>, welcome back!</h2>
			<p class="mg-b-0">Sales Order Execution Monitoring Dashboard</p>
			</div>
		</div>
		<div class="main-dashboard-header-right bg-primary-transparent pl-1 pr-1 pt-2 rounded-3">
			{{-- <div>
				<label class="tx-13">Customer Ratings</label>
				<div class="main-star">
					<i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>(14,873)</span>
				</div>
			</div> --}}
			<div>
				<label class="tx-13">IndiaMart Enquiries</label>
				<h5>{{enquiryCount('IndiaMart')}}</h5>
			</div>
			<div>
				<label class="tx-13">Direct Enquiries</label>
				<h5>{{enquiryCount('Direct')}}</h5>
			</div>
		</div>
	</div>

	<div class="row row-sm">
		<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12 gradient">
			<a href="{{url('view-orders/In Process')}}">
				<div class="card overflow-hidden sales-card bg-primary-gradient">
					<div class="ps-3 pt-3 pe-3 pb-2 pt-0">
						<div class="">
							<h6 class="mb-3 text-white">Total In-Process Orders</h6>
						</div>
						<div class="pb-0 mt-0">
							<div class="d-flex">
								<div class="">
									<h4 class="tx-20 fw-bold mb-1 text-white">{{count($OrdersCount)}}</h4>
									<p class="mb-0 tx-12 text-white op-7">Total ongoing orders count</p>
								</div>
								<!-- <span class="float-end my-auto ms-auto">
									<i class="fas fa-arrow-circle-up text-white"></i>
									<span class="text-white op-7"> +427</span>
								</span> -->
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>
		<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
			<a href="{{url('view-orders/Completed')}}">
				<div class="card overflow-hidden sales-card bg-success-gradient">
					<div class="ps-3 pt-3 pe-3 pb-2 pt-0">
						<div class="">
							<h6 class="mb-3 text-white">Total Completed Orders</h6>
						</div>
						<div class="pb-0 mt-0">
							<div class="d-flex">
								<div class="">
									<h4 class="tx-20 fw-bold mb-1 text-white">{{count($OrdersCompleteCount)}}</h4>
									<p class="mb-0 tx-12 text-white op-7">Total completed orders count</p>
								</div>
								<!-- <span class="float-end my-auto ms-auto">
									<i class="fas fa-arrow-circle-down text-white"></i>
									<span class="text-white op-7"> -23.09%</span>
								</span> -->
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>
		
		<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
			<a href="{{url('view-enquiry-logs/')}}">
				<div class="card overflow-hidden sales-card bg-warning-gradient">
					<div class="ps-3 pt-3 pe-3 pb-2 pt-0">
						<div class="">
							<h6 class="mb-3 text-white">Total Enquiries</h6>
						</div>
						<div class="pb-0 mt-0">
							<div class="d-flex">
								<div class="">
									<h4 class="tx-20 fw-bold mb-1 text-white">{{$EnquiryCount}}</h4>
									<p class="mb-0 tx-12 text-white op-7">Total enquiries added count</p>
								</div>
								<!-- <span class="float-end my-auto ms-auto">
									<i class="fas fa-arrow-circle-down text-white"></i>
									<span class="text-white op-7"> -152.3</span>
								</span> -->
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>
		<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
			<div class="card overflow-hidden sales-card bg-danger-gradient">
				<div class="ps-3 pt-3 pe-3 pb-2 pt-0">
					<div class="">
						<h6 class="mb-3 text-white">Total Users</h6>
					</div>
					<div class="pb-0 mt-0">
						<div class="d-flex">
							<div class="">
								@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('6', json_decode(Auth::guard('admin')->User()->role->permissions)))
								<h4 class="tx-20 fw-bold mb-1 text-white">{{App\Models\Admin::count()}}</h4>
								@else
								<h4 class="tx-20 fw-bold mb-1 text-white">NA</h4>
								@endif
								<p class="mb-0 tx-12 text-white op-7">Total users count</p>
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
	</div>	
    
    @if(Auth::guard('admin')->User()->admin_role == 'Superadmin')
	<div class="row row-sm">
		<div class="col-md-8 col-lg-8 col-sm-12">
			<div class="card">
				<div class="card-header bg-primary-transparent pd-t-20 bd-b-0">
					<div class="d-flex justify-content-between">
						<label class="main-content-label mb-0 tx-15">Total amount to be received in upcoming months</label>
						<!-- <i class="mdi mdi-dots-horizontal text-gray"></i> -->
					</div>
				</div>
				<div class="card-body pt-2">
					<h6 class="tx-12 mb-1 text-">This month total receivable amount</h6>
					<div class="total-revenue mb-1 px-0">
						<div>
						  	<h5 class="mb-1"><small>To be received </small> Rs. {{$thisMonthAmt}} <small>Out of</small> Rs. {{$thisMonthTotalAmt}}</h5>
						  	<label><span class="bg-primary"></span>{{date('F, Y')}}</label>
						</div>
					  </div>
					<!-- <div id="bar" class="sales-bar mt-5"></div> -->
					<div id="chart_div" class="mt-5" style="width: 100%; height: 245px;"></div>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-lg-4 col-sm-12">
			<div class="card">
				<div class="card-header bg-primary-transparent pd-t-20 bd-b-0">
					<div class="d-flex justify-content-between">
						<label class="main-content-label mb-0 tx-15">Total Orders Status</label>
					</div>
				</div>
				<div class="card-body pt-2">
					<h6 class="tx-12 mt-1">Total In-Process and Completed Orders Chart</h6>
					<!-- <div class="vmap-wrapper ht-180" id="vmap2"></div> -->
					<div id="piechart" style="width: 100%; height: 265px;"></div>
				</div>
			</div>
		</div>
	</div>
	@endif

	<div class="row row-sm">
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="card">
				<div class="card-header bg-primary-transparent pd-t-20 bd-b-0">
					<div class="d-flex justify-content-between">
						<label class="main-content-label mb-0 tx-15">Orders Completion Status</label>
					</div>
				</div>
				@if(count($orders) > 0)
				<div class="card-body pt-0 customers min-vh-50 overflowy-scroll">
					<div class="list-group list-lg-group list-group-flush">
						@foreach($orders as $order)
						<a href="{{url('order-stages/'.$order->orderEquipments[0]->id.'/'.$order->orderEquipments[0]->equipment_type.'/'.$order->id)}}">
							<div class="list-group-item list-group-item-action br-t-1">
								<div class="media mt-0">
									<div class="media-body">
										<div class="d-flex align-items-center">
											<div class="mt-0">
												<h5 class="mb-1 tx-15">{{$order->client_name}}</h5>
												<p class="mb-0 tx-13 text-muted fw-500">SO No. {{$order->so}} <span class="ms-2"><i class="fa fa-user-circle"></i> {{$order->name}}</span></p>
											</div>
											<span class="ms-auto wd-45p fs-16 mt-2 text-right">
												<h4><span class="badge bg-light text-dark">{{getOrderStatus($order->id)}}<small>%</small></span></h4>
											</span>
										</div>
									</div>
								</div>
							</div>
						</a>
						@endforeach
					</div>
				</div>
				@else
				<div class="container-fluid mt-3">
					<div class="alert alert-dark fw-500">
						No orders found
					</div>
				</div>
				@endif
			</div>
		</div>
		<div class="col-xl-6 col-md-12 col-lg-6 d-none">
			<div class="card min-vh-50">
				<div class="card-header pb-1">
					<h3 class="card-title mb-2">Order Equipments Analysis</h3>
				</div>
				@if(count($equipments) > 0)
				<div class="product-timeline card-body pt-2 mt-1">
					<ul class="timeline-1 mb-0">
						@foreach($equipments as $equip)
						<li class="mt-0" id="mrg-8"> <i class="ti-pie-chart bg-primary-gradient text-white product-icon"></i> <span class="fw-semibold mb-4 tx-14 ">{{$equip->equipment_type}}</span> <a href="#" class="float-end tx-13 badge badge-purple-transparent">{{$equip->count}} </a>
						</li>
						@endforeach
					</ul>
				</div>
				@else
				<div class="container-fluid mt-3 px-0">
					<div class="alert alert-dark fw-500">
						No enquiries found
					</div>
				</div>
				@endif
			</div>
		</div>
		<div class="col-xl-6 col-md-12 col-lg-6">
			<div class="card">
				<div class="card-header bg-primary-transparent pd-t-20 bd-b-0">
					<div class="d-flex justify-content-between">
						<label class="main-content-label mb-0 tx-15">Orders Source</label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 d-none">
						<div class="card-header pb-0">
							<h3 class="card-title mb-2">Orders Source</h3>
						</div>				
						<div class="card-body sales-info ot-0 pb-0 pt-0">
							<div id="chart" class="ht-150"></div>
							<div class="row sales-infomation pb-0 mb-0 mx-auto wd-100p" style="bottom: -45px">
								<div class="col-md-6 col">
									<p class="mb-0 d-flex"><span class="legend bg-primary brround"></span>IndiaMart</p>
									<h3 class="mb-1">5.2Cr</h3>
									<!--<div class="d-flex">-->
									<!--	<p class="text-muted ">Last 6 months</p>-->
									<!--</div>-->
								</div>
								<div class="col-md-6 col">
									<p class="mb-0 d-flex"><span class="legend bg-info brround"></span>Direct</p>
										<h3 class="mb-1">3.3Cr</h3>
									<!--<div class="d-flex">-->
									<!--	<p class="text-muted">Last 6 months</p>-->
									<!--</div>-->
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-sm-6">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="d-flex align-items-center pb-2">
										<p class="mb-0 fw-bold">IndiaMart</p>
									</div>
									<h4 class="fw-bold mb-2">{{enquiryCount('IndiaMart')}}</h4>
									<div class="progress progress-style progress-sm">
										<div class="bg-primary-gradient wd-100p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="col-md-12 mt-md-0">
									<div class="d-flex align-items-center mt-4 pb-2">
										<p class="mb-0 fw-bold">Direct</p>
									</div>
									<h4 class="fw-bold mb-2">{{enquiryCount('Direct')}}</h4>
									<div class="progress progress-style progress-sm">
										<div class="bg-danger-gradient wd-100p" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row row-sm row-deck">
		<div class="col-md-12 col-lg-4 col-xl-4">
			<div class="card card-dashboard-eight pb-2 p-0">
				<div class="card-header bg-primary-transparent pd-t-20 bd-b-0">
					<div class="d-flex justify-content-between">
						<label class="main-content-label mb-0 tx-15">Order Equipments Analysis</label>
					</div>
				</div>
				<div class="list-group border-top-0 pe-3 px-3">
					@foreach($equipments as $equip)
					<div class="list-group-item border-top-0 fw-500" id="br-t-0">
						<i class="fa fa-stream"></i>
						<p>{{$equip->equipment_type}}</p><span class="badge badge-purple-transparent tx-14 fw-bold">{{$equip->count}}</span>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-md-12 col-lg-8 col-sm-12">
			<div class="card card-table-two p-0 min-vh-50 overflowy-scroll">
				<div class="card-header bg-primary-transparent pd-t-20 bd-b-0">
					<div class="d-flex justify-content-between">
						<label class="main-content-label mb-0 tx-15">All HOT Enquiries</label>
						<a href="{{url('view-enquiry-logs')}}" class="btn btn-sm btn-dark">All Enquiries</a>
					</div>
				</div>
				@if(count($hotEnq) > 0)
				<div class="table-responsive country-table mt-2">
					<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap d-block overflowy-scroll">
						<thead class="thead-dark">
							<tr>
								<th class="wd-lg-25p">QRN</th>
								<th class="wd-lg-25p tx-left">Name</th>
								<th class="wd-lg-25p tx-left">Contact</th>
								<th class="wd-lg-25p tx-left">Requirement</th>
								<th class="wd-lg-25p tx-left">Assignee</th>
							</tr>
						</thead>
						<tbody class="">
							@foreach($hotEnq as $enq)
							<tr onclick="window.location = '{{url('view-enquiry-logs/'.$enq->id)}}';">
								<td class="tx-left tx-medium tx-inverse">{{$enq->qrn}}</td>
								<td class="tx-left tx-medium tx-inverse">{{$enq->customer_name}}</td>
								<td class="tx-left tx-medium tx-inverse">{{$enq->email}}<br>{{$enq->phone}}</td>
								<td class="tx-left" data-bs-toggle="tooltip" title="{!! $enq->description !!}">{!!Str::limit($enq->description, 50)!!}</td>
								<td class="tx-left tx-medium tx-inverse">{{ !empty($enq->name) ? $enq->name : 'NA' }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@else
				<div class="container-fluid mt-3 px-0">
					<div class="alert alert-dark fw-500">
						No enquiries found
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>

@endsection('content')

@section('scripts')
	<!-- <script src="{{asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script> -->
	<!-- <script src="{{asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script> -->

	<!-- <script src="{{asset('assets/js/chart.flot.js')}}"></script> -->

	<!-- <script src="{{asset('assets/plugins/chartjs/Chart.bundle.min.js')}}"></script> -->

	<script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

	<!-- <script src="{{asset('assets/js/apexcharts.js')}}"></script> -->

	<!-- <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script> -->
	<!-- <script src="{{asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script> -->

	<script src="{{asset('assets/js/index.js')}}"></script>
@endsection