@extends('layouts.app')
@section('styles')
    {{-- <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet"> --}}
    {{-- <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/> --}}
    {{-- <link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" /> --}}
    <link href="{{asset('assets/plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/datatable/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/image-uploader.min.css')}}" rel="stylesheet">
@endsection

@section('content')

	<div class="breadcrumb-header justify-content-between mb-0 mt-0 pt-2">
	    <div class="my-auto">
	        <div class="d-flex">
	            <h5 class="content-title mb-0 my-auto">Order Stages - {{ $order->client_name }} </h5>
	        </div>
	    </div>
	    <div class="d-flex my-xl-auto right-content">
	        <div class="pe-1 mb-xl-0">
	            <button type="button" data-bs-toggle="modal" data-bs-target="#orderDetailsModal" class="modal-effect btn btn-primary btn-sm"><i class="fa fa-info-circle"></i> Order Details</button>
	        </div>
	        <div class="pe-1 mb-xl-0 excelBtn">
	            <a href="{{url('equipment-excel-report/'.Request()->order_id.'/'.Request()->equip_id)}}" class="modal-effect btn btn-primary btn-sm ebtn"><span class="btn-icon-wrapper pr-2"><i class="fa fa-download"></i></span> Gantt Chart</a>
	        </div>
	        <div class="pe-1 mb-xl-0">
	            <a href="{{ url('order-report/'.$order->id) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Download Report" class="modal-effect btn btn-primary btn-sm"><i class="fa fa-file-pdf"></i> Generate Report</a>
	        </div>
	    </div>
	</div>
	<hr class="mb-1 mt-1">
	<input type="hidden" class="order_sub_stage" value="{{Request()->order_id}}">
	<input type="hidden" id="equip_sub_stage" value="{{Request()->equip_id}}">
					                     
	<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
	    <div class="app-main">
	        <div class="app-main__outer">
	        	<div class="app-main__inner">
			        <div class="app-page-title">
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
			        </div>

			        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
			        	@foreach($orderEquipments as $row)
	                    <li class="nav-item p-1">
	                        <a class="btn @if(Request()->equip_id == $row->id) btn-dark @else btn-primary-gradient @endif @if($equipment == $row->equipment_type && $order->id == $row->id) active @endif" href="{{ url('order-stages/'.$row->id.'/'.$row->equipment_type.'/'.$order->id) }}">
	                            <span><b>{{ $loop->index+1 }}. {{$row->equipment_type}}</b></span>
	                        </a>
	                    </li>
	                    @endforeach
	                </ul>

	                <div class="tab-content">
	                    <div class="tab-pane tabs-animation fade show active">
					        <div class="main-card mb-2 card">
					            <div class="card-body pt-2">
					            	<div class="row mb-2">
						            	<div class="col-md-6">
							                <div class="card-shadow-info border card card-body border-primary pt-2 pb-2 mb-1">
				                                <h5 class="card-title"><i class="fa fa-cog icon-gradient bg-tempting-azure"></i> Equipment Type <span class="float-end">{{ $orderEquipment->equipment_type }}</span></h5>
				                                <h5 class="card-title m-0"><i class="fa fa-cog icon-gradient bg-tempting-azure"></i> Equipment Name <span class="float-end text-capitalize">{{ $orderEquipment->equipment_name }}</span></h5>
				                            </div>
						            	</div>
						            	<div class="col-md-6">
						            		<div class="card-shadow-info border card card-body border-primary pt-2 pb-2 mb-1">
				                                <h5 class="card-title"><i class="fa fa-cog icon-gradient bg-tempting-azure"></i> MFR No. <span class="float-end">{{ $orderEquipment->mfr }}</span></h5>
				                                <h5 class="card-title m-0"><i class="fa fa-cog icon-gradient bg-tempting-azure"></i> Tag No. <span class="float-end">@if($orderEquipment->tag){{ $orderEquipment->tag }}@else NA @endif</span></h5>
				                            </div>
						            	</div>
						            </div>
									<div class="card mb-1 containet-fluid">
										<form action="{{url('order-stages/'.Request()->equip_id.'/'.Request()->equipment.'/' .Request()->order_id.'/')}}" method="get">@csrf
											<div class="row row-sm d-flex px-3">
												<div class="col-md-1 col-sm-4">
													<div class="form-group mt-2 mb-2">
														<label class="form-label">Filter</label>
														{{-- <button type="submit" class="btn btn-primary btn-primary-gradient btn-rounded">Submit</button> --}}
													</div>
												</div>
												<div class="col-md-3 col-sm-4">
													<div class="form-group mt-2 mb-2">
														<select name="department" id="department" class="form-control form-control-sm w-75 select2" onchange="this.form.submit()">
															<option value="">Select Department</option>
															@foreach(App\Models\Department::select('id','name')->get() as $depts)
																<option value="{{$depts->id}}"  @if($depts->id == $department) selected @endif>{{$depts->name}}</option>
															@endforeach
														</select>
													</div>
												</div>
												<div class="col-md-3 col-sm-4">
													<div class="form-group mt-2 mb-2">
														<select name="status" id="status" class="form-control form-control-sm w-75 select2" onchange="this.form.submit()">
															<option value="">Select Status</option>
															<option value="Skip" @if($status == "Skip") selected @endif>Skip</option>
															<option value="Pending" @if($status == "Pending") selected @endif>Pending</option>
															<option value="Completed" @if($status == "Completed") selected @endif>Completed</option>
														</select>
													</div>
												</div>
												<div class="col-md-3 col-sm-4">
													<div class="form-group mt-2 mb-2">
														<input type="text" value="{{$name}}" name="name" id="name" placeholder="Search by Equipment Stages" class="form-control form-control-sm w-75 select2" onchange="this.form.submit()">
													</div>
												</div>
											</div>
										</form>
									</div>
					                <table style="width: 100%;" class="table table-hover table-striped table-bordered table-responsive-sm">
					                    <thead>
					                        <tr>
					                            <th class="text-center align-middle">Sr. No.</th>
					                            <th class="align-middle">{{ $orderEquipment->equipment_type }} Stages</th>
					                            <th class="text-center align-middle">Status</th>
					                            <th class="text-center align-middle">Attachments</th>
					                            <th class="text-center align-middle">Remark</th>
					                            <th class="text-center align-middle">Updated At</th>
					                        </tr>
					                    </thead>
										       
					                    <tbody>
					                   		<?php 
											$orderStages = App\Models\OrderStages::select('order_stages.*','admins.name')->join('admins','order_stages.admin_id','admins.id')->where(['order_stages.order_id'=>$order->id,'order_stages.equip_id'=>request()->equip_id])->orderBy('order_stages.id','ASC'); 
											
											if($status == "Pending")
											{
												$orderStages =$orderStages->where('order_stages.status',"Pending");
											}
											if($status == "Skip")
											{
												$orderStages =$orderStages->where('order_stages.status',"Skip");
											}
											if($status == "Completed")
											{
												$orderStages =$orderStages->where('order_stages.status',"Completed");
											}
											if($name != null)
											{
												$orderStages =$orderStages->where('order_stages.stage_name','LIKE',"%".$name."%");
											}
											$orderStages = $orderStages->get();
											
											?>
											@isset($orderStages)
					                    	@foreach($orderStages as $stage)
											<?php 
												$stage_id = App\Models\Stage::where('id',$stage->stage_id)->first();
												
												if($department == $stage_id->department_id || $department == NULL)
												{
													
											?>
					                    	<?php 
					                    		$temp = explode('-',$stage->stage_name);
					                    		$tempName = $temp[0];
					                    	?>
					                    	@if($tempName =='Agitator')
					                    	@else
											
					                        <tr id="test" data-bs-toggle="collapse" data-bs-target="#expand{{ $stage->id }}">
					                            <td class="text-center align-middle">{{ $loop->index+1 }}</td>

												<!-- <td class="text-center align-middle"><i class="fa fa-plus"></i></td> -->
					                            <td class="align-middle">{!! wordwrap($stage->stage_name, 35, "<br>\n") !!} </td>
					                            <td class="text-center align-middle">
												    <button type="button" id="stage-{{$stage->id}}" aria-haspopup="true" aria-expanded="true" data-bs-toggle="dropdown" class="pl-1 pr-1 pt-2 pb-2 dropdown-toggle btn @if($stage->status=='Pending') btn-primary @elseif($stage->status=='Completed') btn-success @elseif($stage->status=='Skip') btn-info @else btn-outline-info @endif"><i class="fa @if($stage->status=='Pending') fa-spinner fa-spin @elseif($stage->status=='Completed') fa-check-circle @elseif($stage->status=='Skip') fa-fast-forward @else @endif"></i>@if($stage->status) {{ $stage->status }} @else NA @endif</button>
												    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" x-placement="top-start">
													    <button type="button" name="status" class="dropdown-item fw-500" onclick="changeStageStatus('NA',{{$stage->stage_id}},{{$stage->id}})" value="NA"> NA</button>
												        <button onclick="changeStageStatus('Pending',{{$stage->stage_id}},{{$stage->id}})" name="status" class="dropdown-item fw-500">Pending <i class="fa fa-spinner fa-spin"></i></button>
												        <?php $attachments = App\Models\Attachment::where(['stage_id'=>$stage->stage_id,'order_id'=>$stage->order_id])->count(); ?>
												        <button onclick="changeStageStatus('Completed',{{$stage->stage_id}},{{$stage->id}})" class="dropdown-item fw-500">Completed <i class="fa fa-check-circle"></i></button>
												        <button onclick="changeStageStatus('Skip',{{$stage->stage_id}},{{$stage->id}})" class="dropdown-item fw-500">Skip <i class="fa fa-fast-forward"></i></button>
													</div>
												</td>
												<td class="text-center align-middle">
												    @if($attachments > 0)
				                            		<button class="btn btn-shadow btn-link" onclick="viewStageAttachment({{$stage->order_id}},{{$stage->stage_id}})" data-bs-toggle="modal" data-bs-target="#attachmentModal"><i class="fa fa-paperclip"></i> Attachments({{$attachments}})</button>
				                            		@else
				                            		<a class="btn btn-shadow btn-link"><i class="fa fa-paperclip"></i> No Attachments</a>
				                            		@endif
					                            	<button type="button" class="btn btn-shadow btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#addAttachment" onclick="addStageAttachment({{$stage->stage_id}})"><i class="fa fa-plus-circle"></i> Add</button>
					                            </td>
												<td class="text-center">
													<form action="javascript:void" method="post" class="m-0" onsubmit="addRemarkForm({{$stage->id}})" id="addRemarkForm{{$stage->id}}">@csrf
														<input type="hidden" name="stage_id" id="stage_id" value="{{$stage->id}}">
														<textarea class="form-control remark" type="text" name="remark" rows="1" id="remark{{$stage->id}}" data-id="{{$stage->id}}">@if(!empty($stage->remark)) {{ $stage->remark }} @endif</textarea>
														<div class="mt-1 actions {{$stage->id}}">
															<button type="submit" class="btn btn-outline-success btn-sm remark_submit{{$stage->id}}"> <i class="fa fa-check"></i></button>
															<!-- <button type="button" class="btn btn-outline-danger btn-sm"> <i class="fa fa-times"></i></button> -->
														</div>
													</form>
												</td>
												<td class="text-center align-middle">
													<a href="javascript:void" rel="{{ base64_encode($stage->id) }}" rel1="delete-order-stage" class="btn mr-1 mb-1 btn-outline-danger btn-shadow btn-sm deleteBtn" data-bs-toggle="tooltip" title="Delete User"><i class="fa fa-trash"></i></a>
													<button type="button" class="btn btn-outline-dark" data-bs-toggle="tooltip" data-bs-placement="left" title="By: {{ $stage->name }} | On: {{ date('d M Y h:iA', strtotime($stage->updated_at)) }}"><i class="fa fa-info-circle"></i></button>
												</td>
					                        </tr>
											<?php $sub_stages = App\Models\Sub_stage::where('stage','=',$stage->stage_name)->get();?>
                                                @foreach($sub_stages as $sub_stage)
												<tr class="collapse accordion-collapse" id="expand{{ $stage->id }}" data-bs-parent=".table">
													<td></td>
													<td class="align-middle">
														<?php $order_sub_stage = App\Models\OrderSubStages::where('sub_stage_id','=',$sub_stage->id)->first();?>
														<input class="messageCheckbox" type="checkbox" id="checkbox_status" value="{{$sub_stage->id}}" onchange="doalert(this,{{$sub_stage->id}})" <?php if(!empty($order_sub_stage->completed_at)){ ?> checked <?php } ?>>
														{{$sub_stage->sub_stage}}
													</td>
													<!-- <td class="text-center align-middle">{{$sub_stage->days}}</td> -->
												</tr>
												@endforeach
					                        @endif
											<?php 
												}
												
											?>
					                        @endforeach
											@endisset
					                    </tbody>
					                </table>

					                <!-- agitator stages -->
					                @if($order->equipment_type == 'Reactor' || $order->equipment_type == 'ATFE' || $order->equipment_type == 'WFE' || $order->equipment_type == 'ATFD')
					                <table style="width: 100%;" id="example1" class="table table-hover table-striped table-bordered table-responsive-sm mt-3">
					                    <thead>
					                        <tr>
					                            <th class="text-center">Sr. No.</th>
					                            <th>Agitator Stages</th>
					                            <th class="text-center">Status</th>
					                            <th class="text-center">Attchments</th>
					                            <th class="text-center align-middle">Remark</th>
					                            <th class="text-center">Last Modified</th>
					                        </tr>
					                    </thead>
					                    <tbody>
					                    	<?php $orderStages = App\Models\OrderStages::where(['order_id'=>$order->id,'equip_id'=>request()->equip_id]);
											if($status == "Pending")
											{
												$orderStages =$orderStages->where('order_stages.status',"Pending");
											}
											if($status == "Skip")
											{
												$orderStages =$orderStages->where('order_stages.status',"Skip");
											}
											if($status == "Completed")
											{
												$orderStages =$orderStages->where('order_stages.status',"Completed");
											}
											if($name != null)
											{
												$orderStages =$orderStages->where('order_stages.stage_name','LIKE',"%".$name."%");
											}
											$orderStages =$orderStages->get(); ?>
											@isset($orderStages)
					                    	@foreach($orderStages as $stage)
											<?php 
												$stage_id = App\Models\Stage::where('id',$stage->stage_id)->first();
												
												if($department == $stage_id->department_id || $department == NULL)
												{
					
											?>
					                    	<?php 
					                    		$temp = explode('-',$stage->stage_name);
					                    		$tempName = $temp[0];
					                    	?>
					                    	@if($tempName == 'Agitator')
											
					                    	<tr>
					                            <td class="text-center align-middle">{{ $loop->index+1 }}</td>
					                            <td class="align-middle">{!! wordwrap($stage->stage_name, 35, "<br>\n") !!}</td>
					                            <td class="text-center align-middle">
												    <button type="button" id="stage-{{$stage->id}}" aria-haspopup="true" aria-expanded="true" data-toggle="dropdown" class="pl-1 pr-1 pt-2 pb-2 dropdown-toggle btn @if($stage->status=='Pending') btn-primary @else btn-success @endif"><i class="fa @if($stage->status=='Pending') fa-spinner fa-spin @elseif($stage->status=='Completed') fa-check-circle @elseif($stage->status=='Skip') fa-fast-forward @else fa-flag @endif"></i> {{ $stage->status }}</button>
												    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" x-placement="top-start">
												    	<button type="button" name="status" class="dropdown-item fw-500" onclick="changeStageStatus('NA',{{$stage->stage_id}},{{$stage->id}})" value="NA"> NA</button>
												        <button type="button" onclick="changeStageStatus('Pending',{{$stage->stage_id}},{{$stage->id}})" name="status" class="dropdown-item fw-500" value="Pending">Pending <i class="fa fa-spinner fa-spin"></i></button>
												        <?php $attachments = Attachment::where(['stage_id'=>$stage->stage_id,'order_id'=>$stage->order_id])->count(); ?>
												        <button type="submit" onclick="changeStageStatus('Completed',{{$stage->stage_id}},{{$stage->id}})" class="dropdown-item" value="Completed">Completed <i class="fa fa-check-circle"></i></button>
												        <button onclick="changeStageStatus('Skip',{{$stage->stage_id}},{{$stage->id}})" class="dropdown-item fw-500">Skip <i class="fa fa-fast-forward"></i></button>
												    </div>
												</td>
					                            <td class="text-center align-middle">
					                                @if($attachments > 0)
					                                <button class="btn btn-shadow btn-link" onclick="viewStageAttachment({{$stage->order_id}},{{$stage->stage_id}})" data-bs-toggle="modal" data-bs-target="#attachmentModal"><i class="fa fa-paperclip"></i> Attachments({{$attachments}})</button>
					                            	<!--<a href="{{ url('view-attachments/'.$stage->order_id.'/'.$stage->stage_id) }}" class="btn mr-2 mb-2 btn-shadow btn-link"><i class="fa fa-paperclip"></i> View Attachments</a>-->
					                            	@else
				                            		<a class="btn btn-shadow btn-link"><i class="fa fa-paperclip"></i> No Attachments</a>
				                            		@endif
					                            	<button type="button" class="btn mr-2 mb-2 btn-shadow btn-light" data-bs-toggle="modal" data-target="#addAttachment" onclick="addStageAttachment({{$stage->stage_id}})"><i class="fa fa-plus-circle"></i> Add</button>
					                            </td>
												<td class="text-center">
													<form action="javascript:void" method="post" class="m-0" onsubmit="addRemarkForm({{$stage->id}})" id="addRemarkForm{{$stage->id}}">@csrf
														<input type="hidden" name="stage_id" id="stage_id" value="{{$stage->id}}">
														<textarea class="form-control remark" type="text" name="remark" rows="1" id="remark{{$stage->id}}" data-id="{{$stage->id}}">@if(!empty($stage->remark)) {{ $stage->remark }} @endif</textarea>
														<div class="mt-1 actions {{$stage->id}}">
															<button type="submit" class="btn btn-outline-success btn-sm remark_submit{{$stage->id}}"> <i class="fa fa-check-circle"></i></button>
														</div>
													</form>
												</td>
												<td class="text-center">
													<button type="button" class="btn btn-outline-dark" data-bs-toggle="tooltip" data-bs-placement="left" title="By: {{ $stage->name }} | On: {{ date('d M Y h:iA', strtotime($stage->updated_at)) }}"><i class="fa fa-info-circle"></i></button>
												</td>
					                        </tr>
					                        @endif
											<?php 
												}
												
											?>
					                        @endforeach
											@endisset
					                    </tbody>
					                </table>
					                @endif
					            </div>
					        </div>
					    </div>
					</div> 
			    </div>
	    	</div>
		</div>
	</div>

	<!-- add attachments modal -->
	<div class="modal fade bd-example-modal-lg" id="addAttachment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
	    aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-lg">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLongTitle">Add Attachments for Stage</h5>
	                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
	            	<form action="{{ url('add-attachments/') }}" method="post" class="mb-0 pb-0" enctype="multipart/form-data" id="addAttachmentForm">@csrf
		                <div class="position-relative row form-group">
		                    <div class="col-sm-12">
		                    	<div class="input-field">
				                    <div class="input-images-1" style="padding-top: .5rem;"></div>
				                </div>
		                        <!-- <input type="file" name="attachments[]" id="attachments" class="form-control-file" required="true" multiple="true" id="files">
		                        <div class="row">
		                        	<div class="col-md-2">
		                        		<div class="gallery d-flex"></div>
		                        	</div>
		                        </div> -->
		                    </div>
		                </div>
		                <input type="hidden" name="order_id" id="order_id" value="{{ request()->order_id }}">
		                <input type="hidden" name="stage_id" id="stage_id_attachment" value="">
			            <div class="modal-footer mb-0 pb-0">
			                <button type="submit" class="btn btn-primary btn-shadow"><i class="fa fa-check-circle"></i> Add Attachment</button>
			                <button type="button" class="btn btn-outline-secondary btn-shadow" data-bs-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
			            </div>
		            </form>
	            </div>
	        </div>
	    </div>
	</div>

	<!-- order details modal -->
	<div class="modal" id="orderDetailsModal">
	    <div class="modal-dialog modal-dialog-centered" role="document">
	        <div class="modal-content modal-content-demo container-fluid">
	        	<div class="modal-header">
	                <h6 class="modal-title">Order Details</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
	            </div>
	            <div class="modal-body">
	                <div class="row mb-2">
		            	<div class="col-md-12">
			                <div class="card-shadow-info border card card-body border-primary p-2 card-primary">
	                            <h5 class="card-title"><i class="fa fa-barcode icon-gradient bg-tempting-azure"></i> SO ID <span class="float-end">{{ $order->so }}</span></h5>
	                            <h5 class="card-title m-0"><i class="fa fa-user icon-gradient bg-tempting-azure"></i> Client Name <span class="float-end">{{ $order->client_name }}</span></h5>
	                        </div>
		            		<div class="card-shadow-info border card card-body border-primary p-2 card-primary">
	                            <h5 class="card-title"><i class="fa fa-file icon-gradient bg-tempting-azure"></i> PO <span class="float-end">{{ $order->po }}</span></h5>
	                            <h5 class="card-title m-0"><i class="fa fa-cog icon-gradient bg-tempting-azure"></i> TPI Agency <span class="float-end">{{ $order->tpi }}</span></h5>
	                        </div>
		            		<div class="card-shadow-info border card card-body border-primary p-2 card-primary">
	                            <h5 class="card-title"><i class="fa fa-calendar-alt icon-gradient bg-tempting-azure"></i> PO Date <span class="float-end">{{ date('d M Y', strtotime($order->po_date)) }}</span></h5>
	                            <h5 class="card-title m-0"><i class="fa fa-calendar-alt icon-gradient bg-tempting-azure"></i> Delivery Date <span class="float-end">{{ date('d M Y', strtotime($order->delivery_date)) }}</span></h5>
	                        </div>
		            	</div>
		            </div>
	            </div>
	        </div>
	    </div>
	</div>

	<!-- attachment modal -->
	<div class="modal" id="attachmentModal">
	    <div class="modal-dialog modal-xl" role="document">
	        <div class="modal-content modal-content-demo container-fluid" id="viewModal">
	        </div>
	    </div>
	</div>

@endsection

<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script>
	$(document).ready(function(){
		
	    // add attachment ajax form
		$('.ebtn1').on('click',function(e){
			$('.excelBtn').html('<button class="modal-effect btn btn-primary ebtn" disabled><span class="btn-icon-wrapper pr-2"><i class="fa fa-spin fa-spinner"></i></span> Excel</button>');
		});

		$('#addAttachmentForm1').on('submit',function(e){
	        e.preventDefault();
	        var form_data = new FormData();
	        var totalfiles = document.getElementById('attachments').files.length;
	   		for (var index = 0; index < totalfiles; index++) {
	      		form_data.append("attachments[]", document.getElementById('attachments').files[index]);
	   		}
			
	        // alert(attachments[]); return false;
	        // var token=$('#token-message').val();
	       //  $.ajax({
	       //      headers: {
	       //          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       //      },
	       //      type:'post',
	       //      url:'{{ url('add-attachments/') }}',
	       //      data:{
	       //          form_data
	       //      },
	       //      dataType: 'json',
	       //      contentType: false,
     			// processData: false
	       //      beforeSend:function(){
	       //          $("#msg-response").html("<div class='text-left text-default mb-1' style='font-size: 13px; font-weight: bold;';><i class='fa fa-spin'></i> Loading...</div>");
	       //      },
	       //      success:function(resp){
	       //      	alert(resp); return false;
	       //      },
	       //      error:function(){
	       //          alert("Error");
	       //      }
	       //  });
	       //  document.getElementById('addAttachmentForm').reset();
	    });
	});
</script>
@section('scripts')
	
	<!-- drag and drop files js -->
	<script src="{{asset('assets/js/jquery.handle.image.js')}}"></script>
	<script> $('.input-images-1').imageUploader();</script>

	<script>
		function addRemarkForm(stage_id) {
	        var remark=$('#remark'+stage_id).val();
            $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            type:'post',
	            url:'{{ URL::to('update-stage-remark') }}',
	            data:{
	                stage_id:stage_id,
	                remark:remark
	            },
	            beforeSend:function(){
	                $(".remark_submit"+stage_id).html("<i class='fa fa-spin'></i> Loading...");
	            },
	            success:function(resp){
	            	// alert(resp);
	                if(resp == '200'){
	                    $(".remark_submit"+stage_id).html("<i class='fa fa-check'></i>");
	                    $(".remark_submit"+stage_id).hide(500);
	                }else{
	                    $(".remark_submit"+stage_id).html("<i class='fa fa-times'></i> Not added");
	                }
	            },
	            error:function(){
	                alert("Error");
	            }
	        });
        }

        function addStageAttachment(stage_id){
			$('#stage_id_attachment').val(stage_id);
	    }

		function viewStageAttachment(order_id,stage_id){
	        $.ajax({
	            type:"get",
	            url:"{{url('get-stage-attachment')}}",
	            data:{
	                order_id:order_id,
	                stage_id:stage_id
	            },
	            beforeSend:function(){
	                $("#viewModal").html("<i class='fa fa-spin fa-spinner'></i> Loading...");
	            },
	            success:function(data){
	                // alert(data);
	                $('#viewModal').html(data);
	            }
	        });
	    }
		function doalert(checkbox,sub_stage) {
			var order_sub_stage = $(".order_sub_stage").val();
			// var checkbox = checkboxlmkElem;
			var equip_sub_stage = $("#equip_sub_stage").val();
		if (checkbox.checked == true) {
			status="completed";
			
		} else {
			status="incomplete";
			
		}
		$.ajax({
	            type:"get",
	            url:"{{URL::to('update-sub-stage-status')}}",
	            data:{
	                sub_stage:sub_stage,
					status:status,
					order_sub_stage:order_sub_stage,
					equip_sub_stage:equip_sub_stage,
	            },
			});
		}
		function changeStageStatus(status,stage_id,id){
			// alert(status); return false;
	        $.ajax({
	            type:"get",
	            url:"{{url('update-stage-status')}}",
	            data:{
	                status:status,
	                stage_id:stage_id,
	                id:id
	            },
	            beforeSend:function(){
	                $("#stage-"+id).html('<i class="fa fa-spinner fa-spin"></i>&nbsp; Updating');
	            },
	            success:function(data){
	                if(data == 200){
		                if(status == 'Pending'){
		                	var statusNew = 'Pending';
		                	var btn = 'btn-primary';
		                	var rmbtn = 'btn-success';
		                	var icon = 'fa-spinner fa-spin';
		                }else if(status == 'Completed'){
		                	var statusNew = 'Completed';
		                	var btn = 'btn-success';
		                	var rmbtn = 'btn-primary';
		                	var icon = 'fa-check-circle';
		                }else if(status == 'Skip'){
		                	var statusNew = 'Skip';
		                	var btn = 'btn-info';
		                	var rmbtn = 'btn-primary';
		                	var icon = 'fa-fast-forward';
		                }else{
		                	var statusNew = 'NA';
		                	var btn = 'btn-info';
		                	var rmbtn = '';
		                	var icon = '';
		                }
		                $("#stage-"+id).html('<i class="fa '+icon+'"></i>&nbsp;' + statusNew);
		                $("#stage-"+id).addClass(btn);
		                $("#stage-"+id).removeClass(rmbtn);
		            }else{
	                    alert("Something went wrong. Try after some time");
		            }
	            }
	        });
	    }

		$(document).ready(function(){
			// remark submit button hide/show script
		    $('.actions').hide();
		    $(".remark").click(function(){
		    	var remark = $(this).data('id');
			  	$("."+remark).toggle();
			});
		});
    </script>

    <!-- Internal Form-validation js -->
    {{-- <script src="{{asset('assets/js/form-validation.js')}}"></script> --}}
    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    {{-- <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script> --}}

    <!--Internal  Datatable js -->
    <script src="{{asset('assets/js/table-data.js')}}"></script>
@endsection