@extends('layouts.app')
@section('styles')
    <!-- Internal Select2 css -->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
@endsection
@section('content')

	<div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Add New Order</h4>
            </div>
        </div>
    </div>

	<div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
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
				<div class="card-body mb-3">
					<form id="signupForm" name="signupForm" class="col-md-10 mx-auto" method="post" action="{{ url('add-order/') }}">@csrf
						<span class="mb-2"><span class="text-danger">*</span> marked fields are mandatory</span>
						<div class="form-row mt-3">
							<div class="col-md-6">
								<div class="form-group">
									<label for="so" class="required_field">SO Number</label>
									<input type="text" class="form-control" id="so" name="so" value="{{ $so_num }}">
									<!--<input type="text" class="form-control" id="so" name="so" readonly="true" value="{{ $so_num }}">-->
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="po" class="required_field">PO Number</label>
									<input type="text" class="form-control" id="po" name="po" placeholder="Enter PO Number" autofocus="true"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="client_name" class="required_field">Client Name</label>
							<input type="text" class="form-control" id="client_name" name="client_name" placeholder="Enter Client Name"/>
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="po_date" class="required_field">PO Date</label>
									<input type="date" class="form-control" id="po_date" name="po_date" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="delivery_date" class="required_field">Delivery Date</label>
									<input type="date" class="form-control" id="delivery_date" name="delivery_date" />
								</div>
							</div>
						</div>

						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
				                    <label for="tpi" class="required_field">TPI</label>
				                    <select name="tpi" id="tpi" class="form-control">
				                        <option value="">-- Select option from below --</option>
				                        <option value="Yes">Yes</option>
				                        <option value="No">No</option>
				                    </select>
				                </div>
				            </div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="tpi_agency" class="">TPI Agency</label>
									<input type="text" class="form-control" id="tpi_agency" name="tpi_agency" placeholder="Enter TPI Agency" />
								</div>
							</div>
				        </div>

			            <div class="table-responsive">  
			                <table class="table table-bordered field_wrapper" id="dynamic_field-">  
			                    <tr>  
			                        <td>
			                        	<div class="form-row">
				                        	<div class="col-md-6">
												<div class="form-group">
								                    <label for="equipment_type" class="required_field">Equipment Type</label>
								                    <select name="equipment_type[]" id="equipment_type" class="form-control" required="true">
								                        <option value="">-- Select option from below --</option>
								                        @foreach($equipTypes as $row)
								                        <option value="{{ $row->equipment_type }}" data-type="{{ $row->abbr }}">{{ $row->equipment_type }}</option>
								                        @endforeach
								                    </select>
								                </div>
								            </div>
								            <div class="col-md-6">
										        <div class="form-group">
													<label for="mfr" class="">MFR Number</label>
													<input type="text" class="form-control disabled" id="mfr" required="" name="mfr[]" />
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label for="equipment_name" class="required_field">Equipment Name</label>
													<input type="text" class="form-control" id="equipment_name" required="" name="equipment_name[]" placeholder="Enter Equipment Name" />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="tag" class="">Tag Number</label>
													<input type="text" class="form-control" id="tag" name="tag[]" placeholder="Enter Tag Number" />
												</div>
											</div>
										</div>
				                    </td>
			                        <td class="align-middle"><button type="button" id="add" class="btn btn-outline-success btn-sm"><i class="fa fa-plus"></i> Add More</button></td>  
			                    </tr>  
			                </table>
			            </div>
			            <center>
							<div class="form-group col-md-6">
								<button type="submit" class="btn btn-primary float-right btn-block"><b><i class="fa fa-check"></i> Add Order</b></button>
							</div>
						</center>
					</form>
				</div>
            </div>
        </div>
    </div>

	<script src="https://unpkg.com/vue"></script>
	<!-- <script src="https://unpkg.com/vue@2.6.12/dist/vue.js"></script> -->
	<!-- <script>
		var app = new Vue({	
			el : '#app',
			data : {
			    equipment_type: "",
			},

			computed :{
				getmfrNo : function(){
					return "CDPS-"+"{{ $so_num }}"+"-"+this.equipment_type+"-"+"{{ $mfr }}"+"-"+"{{ $year }}";
				}
			}
		})
	</script> -->
	<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
	<script>
    $(document).ready(function(){
        var maxField = 100;
        var addButton = $('#add');
        var wrapper = $('.field_wrapper');
        var i = 0;
        var x = 1;
        
        $(addButton).click(function(){
        	i++;
        	
        	$(document).ready(function(){
		    	$('#equipment_type').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		var mfr = "CDPS-"+""+"-"+type+"-"+"{{ $mfr }}"+"-"+"{{ $year }}";
		    		$('#mfr').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type1').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr1').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type2').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr2').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type3').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr3').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type4').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr4').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type5').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr5').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type6').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr6').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type7').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr7').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type8').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr8').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type9').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr9').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type10').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr10').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type11').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr11').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type12').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr12').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type13').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr13').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type14').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr14').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type15').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr15').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type16').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr16').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type17').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr17').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type18').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr18').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type19').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr19').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type20').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr20').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type21').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr21').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type22').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr22').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type23').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr23').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type24').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr24').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type25').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr25').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type26').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr26').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type27').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr27').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type28').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr28').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type29').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr29').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type30').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr30').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type31').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr31').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type32').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr32').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type33').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr33').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type34').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr34').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type35').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr35').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type36').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr36').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type37').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr37').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type38').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr38').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type39').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr39').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type40').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr40').val(mfr);
		    	});
		    });
		    
		    

		    $(document).ready(function(){
		    	$('#equipment_type41').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr41').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type42').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr42').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type43').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr43').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type44').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr44').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type45').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr45').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type46').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr46').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type47').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr47').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type48').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr48').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type49').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr49').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type50').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr50').val(mfr);
		    	});
		    });



		    $(document).ready(function(){
		    	$('#equipment_type51').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr51').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type52').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr52').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type53').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr53').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type54').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr54').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type55').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr55').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type56').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr56').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type57').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr57').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type58').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr58').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type59').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr59').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type60').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr60').val(mfr);
		    	});
		    });



		    $(document).ready(function(){
		    	$('#equipment_type61').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr61').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type62').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr62').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type63').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr63').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type64').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr64').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type65').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr65').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type66').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr66').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type67').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr67').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type68').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr68').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type69').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr69').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type70').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr70').val(mfr);
		    	});
		    });



		    $(document).ready(function(){
		    	$('#equipment_type71').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr71').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type72').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr72').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type73').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr73').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type74').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr74').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type75').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr75').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type76').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr76').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type77').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr77').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type78').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr78').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type79').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr79').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type80').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr80').val(mfr);
		    	});
		    });



		    $(document).ready(function(){
		    	$('#equipment_type81').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr81').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type82').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr82').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type83').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr83').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type84').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr84').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type85').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr85').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type86').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr86').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type87').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr87').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type88').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr88').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type89').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr89').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type90').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr90').val(mfr);
		    	});
		    });



		    $(document).ready(function(){
		    	$('#equipment_type91').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr91').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type92').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr92').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type93').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr93').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type94').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr94').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type95').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr95').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type96').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr96').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type97').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr97').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type98').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr98').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type99').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr99').val(mfr);
		    	});
		    });

		    $(document).ready(function(){
		    	$('#equipment_type100').change(function() {
		    		var type = $(this).find(':selected').data('type');
		    		mfrno = {{$mfr}}+i;
		    		var mfr = "CDPS-"+""+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
		    		$('#mfr100').val(mfr);
		    	});
		    });

	        var fieldHTML = '<tr id="row'+i+'" class="dynamic-added"><td><div class="form-row"><div class="col-md-6"><div class="form-group"><label for="equipment_type'+i+'" class="required_field">Equipment Type</label><select name="equipment_type[]" id="equipment_type'+i+'" class="form-control" required=""><option value="">-- Select option from below --</option>@foreach($equipTypes as $row)<option value="{{ $row->equipment_type }}" data-type="{{ $row->abbr }}">{{ $row->equipment_type }}</option>@endforeach </select></div></div><div class="col-md-6"><div class="form-group"><label for="mfr'+i+'" class="">MFR Number</label><input type="text" class="form-control" id="mfr'+i+'" name="mfr[]" /></div></div><div class="col-md-6"><div class="form-group"><label for="equipment_name" class="required_field">Equipment Name</label><input type="text" class="form-control" id="equipment_name" name="equipment_name[]" required placeholder="Enter Equipment Name" /></div></div><div class="col-md-6"><div class="form-group"><label for="tag" class="">Tag Number</label><input type="text" class="form-control" id="tag" name="tag[]" placeholder="Enter Tag Number"></div></div></div></td><td class="align-middle"><button type="button" name="remove" id="'+i+'" class="btn btn-outline-danger btn_remove btn-sm"><i class="fa fa-times"></i> Remove</button></td></tr>';

	            if(x < maxField){ 
	                x++;
	                $(wrapper).append(fieldHTML);
	            }
	    });
        
        $(wrapper).on('click', '.btn_remove', function(e){
            e.preventDefault();
            var button_id = $(this).attr("id");
            // $(this).parent('div').remove();
            $('#row'+button_id+'').remove();
            x--;
        });
    });
</script>

<script>
    $(document).ready(function(){
    	$('#equipment_type').change(function() {
    		var type = $(this).find(':selected').data('type');
    		var mfr = "CDPS-"+""+"-"+type+"-"+"{{$mfr}}"+"-"+"{{ $year }}";
    		$('#mfr').val(mfr);
    	});
    });

    $(document).ready(function(){
    	$('#equipment_type1').change(function() {
    		var type = $(this).find(':selected').data('type');
    		var mfr = "CDPS-"+"{{ $so_num }}"+"-"+type+"-"+"{{ $mfr }}"+"-"+"{{ $year }}";
    		$('#mfr1').val(mfr);
    	});
    });

    $(document).ready(function(){
    	$('#equipment_type2').change(function() {
    		var type = $(this).find(':selected').data('type');
    		var mfr = "CDPS-"+"{{ $so_num }}"+"-"+type+"-"+"{{ $mfr }}"+"-"+"{{ $year }}";
    		$('#mfr2').val(mfr);
    	});
    });
</script>

@endsection

@section('scripts')
    <!-- Internal Select2 js-->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal  Parsley.min js -->
    <script src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!--Internal  Perfect-scrollbar js -->
    <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{asset('assets/js/form-validation.js')}}"></script>
    <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
@endsection