@extends('layouts.app')
@section('styles')
    <!-- Internal Select2 css -->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <script src="{{asset('assets/js/ckeditor.js')}}"></script>
@endsection('styles')

@section('content')
<div class="row">
	<div class="col-xl-12">
		<div class="card mg-b-20 mt-3" id="tabs-style3">
			<div class="card-body mt-3">
				<div class="card-header p-0 row">
					<div class="col-md-4">
						<h3 class="card-title tx-20">Payment Cashflow Cycles <span class="badge bg-secondary" data-bs-toggle="tooltip" title="test">{{App\Models\PaymentCashflow::where(['order_id'=>$orderDetails->id,'status'=>1])->count()}}/{{count($paymentDetails)}}</span></h3>
						<h3 class="card-title tx-16 text-monospace"><i class="fa fa-user"></i> {{$orderDetails->client_name}} | #SO {{$orderDetails->so}}</h3>
						<table class="table table-hover table-light w-100">
							<tr>
								<td class="">Total Project Amount</td>
								<td class="text-right"><span class="badge bg-dark m-0 h6">&#8377;{{numberFormat2($orderDetails->order_size)}}</span></td>
							</tr>
							{{-- <tr>
								<td class="">PO Basic Amount</td>
								<td class="text-right"><span class="badge bg-dark m-0 h6">&#8377;{{numberFormat2($orderDetails->po_amt)}}</span></td>
							</tr>
							<tr>
								<td class="">PO Basic Amount Received</td>
								<td class="text-right">
									<div class="dropdown">
										<button aria-expanded="false" aria-haspopup="true" class="btn ripple pt-1 pb-1 poreceive @if($orderDetails->po_amt_received == '1') btn-success @else btn-danger @endif" data-bs-toggle="dropdown" id="dropdownMenuButton" type="button">@if($orderDetails->po_amt_received == 0) No @else Yes @endif <i class="fas fa-caret-down ms-1"></i></button>
										<div  class="dropdown-menu tx-13">
											<a class="dropdown-item fw-500" onclick="poAmtReceived('1')">Yes</a>
											<a class="dropdown-item fw-500" onclick="poAmtReceived('0')">No</a>
										</div>
									</div>
								</td>
							</tr> --}}
						</table>
					</div>
					<div class="col-md-5">
						<div id="piechart" style="width: 100%; height: 170px;"></div>
					</div>
					<div class="col-md-3 text-right">
						<button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#paymentterms"><i class="fa fa-info-circle"></i> Payment Terms</button>
						@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('14', json_decode(Auth::guard('admin')->User()->role->permissions)))
						<button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addCycle"><i class="fa fa-plus-circle"></i> Add Cycle</button>
						@endif
					</div>
				</div>
				<hr class="mb-1 mt-1">
				<div class="row mt-3">
					@php $currentDate = strtotime(date('d M Y')); @endphp
					@foreach($paymentDetails as $val)
					@php $warningDate = strtotime($val->date); @endphp
					@php 
						if($val->status == 1){ 
							$card = 'card-success bg-success-transparent'; $bg='bg-success-transparent'; $btn='btn-success'; 
						}elseif($currentDate>=$warningDate){ 
							$card='card-danger bg-danger-transparent'; $bg='bg-danger-transparent'; $btn='btn-danger'; 
						}else{
							$card='card-secondary'; $bg=''; $btn='btn-primary';							
						}
					@endphp
					<div class="col-md-12 col-sm-12 col-lg-6 col-xl-3">
				        <div class="card {{$card}}">
				            <div class="card-header pb-0 pt-2 border-bottom {{$bg}}">
				            	@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('14', json_decode(Auth::guard('admin')->User()->role->permissions)))
				                <h5 class="card-title mb-0 pb-2 float-end">
				                	{{-- <span class="badge bg-dark h6">&#8377; {{$val->amount}}</span> --}}
				                	<a href="#" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical text-dark tx-18" data-bs-toggle="tooltip" data-bs-original-title="View more"></i></a>
									<div class="dropdown-menu">
										<a class="dropdown-item fw-500" href="javascript:void(0)" data-bs-toggle="modal" onclick="editPaymentCycle({{$val->id}})" data-bs-target="#editPaymentCycleModal"><i class="fa fa-pencil-alt"></i> Edit</a>
										<a class="dropdown-item fw-500 deleteBtn" href="javascript:void" rel="{{$val->id}}" rel1="delete-payment-cycle"><i class="fa fa-trash"></i> Delete</a>
									</div>
				                </h5>
				                @endif
				                <h5 class="card-title mb-0 pb-0 tx-16">{{$loop->index+1}}. {{$val->payment_type}}</h5>
				            </div>
				            <div class="card-body text-dark pt-2 pb-2">
				            	<div class="mb-2">
				            		<span class="badge bg-dark h6 float-end">&#8377;{{number_format($val->amount, 0)}}</span>
				            		<small class="me-2 text-dark tx-14 fw-500"><i class="fa fa-rupee-sign"></i> Amount</small>
				            	</div>
				            	<div class="mb-2">
				            		<small class="me-2 text-dark"><i class="fa fa-calendar-alt"></i> Payment Receive Date<br><b class="tx-14">{{date('M d, Y', strtotime($val->date))}}</b></small>
				            	</div>
				            	<div>
					            	<a class="tx-13" data-bs-toggle="tooltip" data-bs-placement="top" title="@if($val->remark){!!$val->remark!!}@else NA @endif"><i class="fa fa-paperclip"></i> Remark</a><br>
					            	<small>Last update by @if($val->name){{$val->name}} @else NA @endif</small>
					            </div>
				            </div>
				            
				            <div class="card-footer p-0 pt-1 pb-1 d-flex text-center {{$bg}}">
				            	<div class="col-md-5 align-self-center text-dark pl-1 fw-500">Payment Status</div>
				                <div class="dropdown col-md-7 text-right">
									<button aria-expanded="false" aria-haspopup="true" class="btn ripple {{$btn}} payment-{{$val->id}} pt-1 pb-1" data-bs-toggle="dropdown" id="dropdownMenuButton" type="button">@if($val->status == 0) Unpaid @else Received @endif <i class="fas fa-caret-down ms-1"></i></button>
									<div  class="dropdown-menu tx-13">
										<a class="dropdown-item fw-500" onclick="updatepaymentStatus('0',{{$val->id}})">Unpaid</a>
										<a class="dropdown-item fw-500" onclick="updatepaymentStatus('1',{{$val->id}})">Received</a>
									</div>
								</div>
				            </div>
				        </div>
				    </div>
				    @endforeach
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="paymentterms">
    <div class="modal-dialog modal-lg modal-dialog-top" role="document">
        <div class="modal-content modal-content-demo">
        	<div class="modal-header">
                <h6 class="modal-title"> Payment Terms</h6>
                <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            	@if(Auth::guard('admin')->User()->admin_role == 'Superadmin')
            	<form action="{{url('update-payment-terms/'.Request()->id)}}" method="post">@csrf
            		<textarea class="form-control summernote" id="editor" name="payment_terms" rows="5">{!!$orderDetails->payment_terms!!}</textarea>
            		<button type="submit" class="btn btn-dark btn-sm mt-2"><i class="fa fa-check-circle"></i> Save</button>
            	</form>
            	@else
            	<div>{!!$orderDetails->payment_terms!!}</div>
            	@endif
            </div>
        </div>
    </div>
</div>

<div class="modal" id="addCycle">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
        	<div class="modal-header">
                <h6 class="modal-title">Add Payment Cycles</h6>
                <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            	<form action="{{url('add-payment-cycle/'.$orderDetails->id)}}" method="post">@csrf
            		<div class="field_wrapper1">
						<div class="form-row mb-3">
							<div class="col-sm-3">
								<div class="form-group mb-sm-0">
									<label class="form-label">Payment Type</label>
									<select class="form-select form-control form-control-lg" name="payment_type[]">
										<option value="Amendment">Amendment</option>
										<option value="Installment">Installment</option>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-0">
									<label class="form-label">Amount</label>
									<input type="number" name="amount[]" class="form-control" required value="" />
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group mb-0">
									<label class="form-label">Date</label>
									<input type="date" name="date[]" class="form-control" required value="{{date('Y-m-d')}}" />
								</div>
							</div>
							<div class="col-sm-3">
								<label class="form-label invisible"> <i class="fa fa-question-circle"></i></label>
								<div class="form-group mb-0">
									<button type="button" class="btn btn-outline-secondary" id="add1"><i class="fa fa-plus-circle"></i> </button>
								</div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group mb-0">
							<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i> Submit</button>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="editPaymentCycleModal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo" id="viewModal">
        </div>
    </div>
</div>

@endsection('content')
@section('scripts')
	<script>
		function editPaymentCycle(id){
            $.ajax({
                type:"get",
                url:"{{url('edit-payment-cycle-modal')}}",
                data:{id:id},
                beforeSend:function(){
                    $("#viewModal").html("<div class='text-left text-default p-2 font-weight-bold' style='font-size: 13px;';><i class='fa fa-spin fa-spinner'></i> Loading...</div>");
                },
                success:function(data){
                    console.log(data);
                    $('#viewModal').html(data);
                }
            });
        }

		function updatepaymentStatus(status, id){
			// console.log(status+' '+id);
			$.ajax({
	            type:"get",
	            url:"{{url('update-payment-status')}}",
	            data:{
	                status:status,
	                id:id
	            },
	            beforeSend:function(){
	                $(".payment-"+id).html('<i class="fa fa-spinner fa-spin"></i>&nbsp; Updating');
	            },
	            success:function(data){
	            	// console.log(data);
	                if(status == '0'){
	                	var statusNew = 'Unpaid <i class="fas fa-caret-down ms-1"></i';
	                	var btn = 'btn-primary';
	                	var rmbtn = 'btn-success';
	                }else{
	                	var statusNew = 'Received <i class="fas fa-caret-down ms-1"></i';
	                	var btn = 'btn-success';
	                	var rmbtn = 'btn-primary';
	                }
	                $(".payment-"+id).html(statusNew);
	                $(".payment-"+id).addClass(btn);
	                $(".payment-"+id).removeClass(rmbtn);
	            },
	            error:function(){
	                alert("Something went wrong. Try after some time");
	            }
	        });
		}

		function poAmtReceived(status){
			// alert(status); return false;
			$.ajax({
	            type:"get",
	            url:"{{url('update-poamt-status')}}",
	            data:{
	                status:status,
	                id:{{$orderDetails->id}}
	            },
	            beforeSend:function(){
	                $(".poreceive").html('<i class="fa fa-spinner fa-spin"></i>&nbsp; Updating');
	            },
	            success:function(data){
	            	// alert(data);
	                if(status == '0'){
	                	var statusNew = 'No <i class="fas fa-caret-down ms-1"></i';
	                	var btn = 'btn-danger';
	                	var rmbtn = 'btn-success';
	                }else{
	                	var statusNew = 'Yes <i class="fas fa-caret-down ms-1"></i';
	                	var btn = 'btn-success';
	                	var rmbtn = 'btn-danger';
	                }
	                $(".poreceive").html(statusNew);
	                $(".poreceive").addClass(btn);
	                $(".poreceive").removeClass(rmbtn);
	            },
	            error:function(){
	                alert("Something went wrong. Try after some time");
	            }
	        });
		}
	</script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

      	function drawChart() {
	        var data = google.visualization.arrayToDataTable([
				['Task', 'Hours per Day'],
				['Received',  {{$totalReceived}}],
				['Unpaid', {{($orderDetails->order_size - $totalReceived)}}]
	        ]);

	        var options = {
	          	title: '',
	        };

	        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
	        chart.draw(data, options);
      	}
    </script>
    
    <script>
    	$(document).ready(function(){
	        var maxField1 = 100;
	        var addButton1 = $('#add1');
	        var wrapper1 = $('.field_wrapper1');
	        var j = 0;
	        var y = 1;
	        
	        $(addButton1).click(function(){
	        	j++;

		        var fieldHTML1 = '<div id="row'+j+'" class="form-row mb-4"><div class="col-sm-3"><div class="form-group mb-sm-0"><label class="form-label">Type</label><select class="form-select form-control form-control-lg" name="payment_type[]"><option value="Advance">Advance</option><option value="Installment" selected>Installment</option></select></div></div><div class="col-sm-3"><div class="form-group mb-0"><label class="form-label">Amount</label><input type="number" name="amount[]" class="form-control" required=""></div></div><div class="col-sm-3"><div class="form-group mb-0"><label class="form-label">Date</label><input type="date" name="date[]" class="form-control" required=""></div></div><div class="col-sm-3"><label class="form-label invisible"> <i class="fa fa-question-circle"></i></label><div class="form-group mb-0"><button type="button" id="'+j+'" class="btn btn-outline-danger btn_remove1"><i class="fa fa-times-circle"></i> </button></div></div></div>';

	            if(y < maxField1){ 
	                y++;
	                $(wrapper1).append(fieldHTML1);
	            }
		    });
	        
	        $(wrapper1).on('click', '.btn_remove1', function(e){
	            e.preventDefault();
	            var button_id1 = $(this).attr("id");
	            // $(this).parent('div').remove();
	            $('#row'+button_id1+'').remove();
	            y--;
	        });
	    });
	</script>
@endsection('scripts')