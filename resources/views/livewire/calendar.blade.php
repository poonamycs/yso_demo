@extends('layouts.app')

@section('styles')

		<!-- FULL CALENDAR CSS -->
		<link href='{{asset('assets/plugins/fullcalendar/fullcalendar.css')}}' rel='stylesheet'/>
		<link href='{{asset('assets/plugins/fullcalendar/fullcalendar.min.css')}}' rel='stylesheet' media='print'/>

@endsection

@section('content')

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Apps</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Calender</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pe-1 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon me-2 btn-b"><i
									class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pe-1 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon me-2"><i
									class="mdi mdi-star"></i></button>
						</div>
						<div class="pe-1 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon me-2"><i
									class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
									id="dropdownMenuDate" data-bs-toggle="dropdown" aria-haspopup="true"
									aria-expanded="false">
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate"
									x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->

					<!-- ROW OPEN -->
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Full Calendar Events</h3>
								</div>
								<div class="card-body pt-0">
									<div class="row" id='wrap'>
										<div class="col-xl-2" id='external-events'>
											<h4>Draggable Events</h4>

											<div id='external-events-list'>
												<div
													class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
													<div class='fc-event-main'>My Event 1</div>
												</div>
												<div
													class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
													<div class='fc-event-main'>My Event 2</div>
												</div>
												<div
													class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
													<div class='fc-event-main'>My Event 3</div>
												</div>
												<div
													class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
													<div class='fc-event-main'>My Event 4</div>
												</div>
												<div
													class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
													<div class='fc-event-main'>My Event 5</div>
												</div>
											</div>

											<p>
												<input type='checkbox' id='drop-remove' />
												<label for='drop-remove' id="fc-levent-label">remove after drop</label>
											</p>

										</div>

										<div class="col-xl-10" id='calendar-wrap'>
											<div id='calendar'></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">List Calendar</h3>
								</div>
								<div class="card-body">
									<div id='calendar1'></div>
								</div>
							</div>
						</div>
					</div>
					<!-- ROW CLOSED -->

@endsection('content')

@section('scripts')

        <!--Internal  Datepicker js -->
        <script src="{{asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>

		<!-- FULL CALENDAR JS -->
		<script src='{{asset('assets/plugins/fullcalendar/fullcalendar.min.js')}}'></script>
		<script src="{{asset('assets/js/fullcalendar.js')}}"></script>
		
		<!-- Internal Select2.full.min js -->
		<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>

@endsection