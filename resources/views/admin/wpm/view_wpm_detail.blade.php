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
	            <h5 class="content-title mb-0 my-auto">WPM Equipment -  </h5>
	        </div>
	    </div>
	</div>
	<hr class="mb-1 mt-1">

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
	                <div class="tab-content">
	                    <div class="tab-pane tabs-animation fade show active">
					        <div class="main-card mb-2 card">
					            <div class="card-body pt-2">
					            	<div class="row mb-2">
						            	<div class="col-md-6">
							                <div class="card-shadow-info border card card-body border-primary pt-2 pb-2 mb-1">
				                                <h5 class="card-title"><i class="fa fa-cog icon-gradient bg-tempting-azure"></i> So No. <span class="float-end">{{ Request()->so }}</span></h5>
				                                <h5 class="card-title m-0"><i class="fa fa-cog icon-gradient bg-tempting-azure"></i> Client Name <span class="float-end text-capitalize">{{ Request()->client_name }}</span></h5>
				                            </div>
						            	</div>
						            	<div class="col-md-6">
						            		<div class="card-shadow-info border card card-body border-primary pt-2 pb-2 mb-1">
				                                <h5 class="card-title"><i class="fa fa-cog icon-gradient bg-tempting-azure"></i> PO Date <span class="float-end">{{ date('d M Y', strtotime(Request()->po_date)) }}</span></h5>
				                                <h5 class="card-title m-0"><i class="fa fa-cog icon-gradient bg-tempting-azure"></i> PO Delivery Date <span class="float-end">{{ date('d M Y', strtotime(Request()->delivery_date)) }}</span></h5>
				                            </div>
						            	</div>
						            </div>
									<div class="card mb-1 containet-fluid">
										<form action="{{ url('view-wpm-action-tracker/'.Request()->so .'/'.Request()->equip_id.'/'.Request()->client_name.'/'.Request()->po_date.'/'.Request()->delivery_date) }}" method="get">@csrf
											<div class="row row-sm d-flex px-3">
												<div class="col-md-1 col-sm-2">
													<div class="form-group mt-2 mb-2">
														<label class="form-label">Filter</label>
														{{-- <button type="submit" class="btn btn-primary btn-primary-gradient btn-rounded">Submit</button> --}}
													</div>
												</div>
												<div class="col-md-1 col-sm-2">
													<div class="form-group mt-2 mb-2">
														<select class="form-control form-control-sm w-75" name="priority" onchange="this.form.submit()">
															<option value="">Priority</option>
															<option value="1" @if($priority == '1') selected @endif>1</option>
															<option value="2" @if($priority == '2') selected @endif>2</option>
															<option value="3" @if($priority == '3') selected @endif>3</option>
														</select>
													</div>
												</div>
												<div class="col-md-1 col-sm-2">
													<div class="form-group mt-2 mb-2">
														<select class="form-control form-control-sm w-75" name="status" onchange="this.form.submit()">
															<option value="">Status</option>
															<option value="Completed" @if($status == "Completed") selected @endif>Completed</option>
															<option value="Hold" @if($status == "Hold") selected @endif>Hold</option>
															<option value="Pending" @if($status == "Pending") selected @endif>Pending</option>
															<option value="Working" @if($status == "Working") selected @endif>Working</option>
														</select>
													</div>
												</div>
												<div class="col-md-1 col-sm-2">
													<div class="form-group mt-2 mb-2">
														<select class="form-control form-control-sm w-75" name="user" onchange="this.form.submit()">
															<option value="">User</option>
															<?php $admins = App\Models\Admin::all();?>
															@foreach($admins as $admin)
																<option value="{{$admin->id}}" @if($user == $admin->id) selected @endif>{{$admin->name}}</option>
															@endforeach
														</select>
													</div>
												</div>
												<div class="col-md-2 col-sm-2">
													<div class="form-group mt-2 mb-2">
													<input type="date" class="form-control form-control-sm w-75" value="{{$date}}" name="date" onchange="this.form.submit()"> 
													</div>
												</div>
												<div class="col-md-2 col-sm-2">
													<div class="form-group mt-2 mb-2">
														<input type="search" name="search" value="{{$search}}" class="form-control form-control-sm w-75" placeholder="Search By Keyword" onchange="this.form.submit()"> 
													</div>
												</div>
												<div class="col-md-1 col-sm-2">
													<div class="form-group mt-2 mb-2">
														<a href="{{ url('view-wpm-action-tracker/'.Request()->so .'/'.Request()->equip_id.'/'.Request()->client_name.'/'.Request()->po_date.'/'.Request()->delivery_date) }}">Clear</a>
													</div>
												</div>
												<div class="col-md-2 col-sm-2">
													<div class="form-group mt-2 mb-2">
														<a href="{{url('add-wpm-task/'.Request()->so .'/'.Request()->equip_id)}}" class="btn btn-primary btn-sm"><span class="btn-icon-wrapper pr-2"><i class="fa fa-plus-circle"></i></span> Add New Task</a>
													</div>
												</div>
											</div>
										<!-- </form> -->
									</div>
					               	<table style="width: 100%;" class="table table-hover table-striped table-bordered table-responsive-sm mt-3">
					                    <thead>
					                        <tr>
					                            <th class="text-center">Sr. No.</th>
												<th class="text-center">Equipment</th>
					                            <th class="text-center">Task</th>
					                            <th class="text-center">Category</th>
					                            <th class="text-center">Priority</th>
					                            <th class="text-center align-middle">Baseline Target</th>
					                            <th class="text-center">Completion</th>
					                            <th class="text-center">User</th>
					                            <th class="text-center">Status</th>
					                            <th class="text-center">Action</th>
					                        </tr>
					                    </thead>
					                    <tbody>
											@isset($wpm_tasks)
											@foreach($wpm_tasks as $wpm_task)
					                    	<tr>
												
					                            <td class="text-center align-middle">{{ $loop->index+1 }}</td>
												<!-- <a href="{{url('/view-wpm-task/'.Request()->so .'/'.Request()->equip_id.'/'.Request()->client_name.'/'.Request()->po_date.'/'.Request()->delivery_date)}}"> -->
					                            <td class="text-center align-middle">{{$equipment->equipment_type}} {{ $equipment->equipment_name }}</td>
					                            <td class="align-middle">{{ $wpm_task->task_name }}</td>
					                            <td class="align-middle">{{ $wpm_task->category }}</td>
					                            <td class="align-middle">{{ $wpm_task->priority }}</td>
					                            <td class="align-middle">{{ date('d M Y', strtotime($wpm_task->baseline_target_date)) }}</td>
					                            <td class="align-middle">{{ date('d M Y', strtotime($wpm_task->completion_date)) }}</td>
												<?php $users = json_decode($wpm_task->action_user);?>
					                            <td class="align-middle">
													@foreach($users as $user)
													<?php $admin = App\Models\Admin::where('id',$user)->first();?>
														{{ $admin->name }}<br/>
													@endforeach</td>
												<td class="align-middle">
													<button data-bs-toggle="dropdown" id="status{{$wpm_task->id}}" class="btn btn-sm">{{ $wpm_task->status }} <i class="icon ion-ios-arrow-down tx-11 mg-l-3"></i></button>
                                        			<div class="dropdown-menu box-shadow-primary">
														<!-- <option value="NULL">Select Status</option> -->
														<a class="dropdown-item" onclick="orderStatus('Completed',{{$wpm_task->id}})">Completed</a>
														<a class="dropdown-item" onclick="orderStatus('Hold',{{$wpm_task->id}})">Hold</a>
														<a class="dropdown-item" onclick="orderStatus('Pending',{{$wpm_task->id}})">Pending</a>
														<a class="dropdown-item" onclick="orderStatus('Working',{{$wpm_task->id}})">Working</a>
													</div>
													</select>
												</td>
												<td class="align-middle">
													<a href="{{url('/view-wpm-task/'.$wpm_task->id .'/'.Request()->so .'/'.Request()->equip_id.'/'.Request()->client_name.'/'.Request()->po_date.'/'.Request()->delivery_date)}}" class="btn btn-outline-primary btn-shadow btn-sm" title="View WPM Task Details"><i class="fa fa-info-circle"></i></a>
													<a href="{{url('/edit-wpm-task/'.$wpm_task->id .'/'.Request()->equip_id)}}" class="btn btn-outline-primary btn-shadow btn-sm" title="Edit WPM Task"><i class="fa fa-pen"></i></a>
													<a href="javascript:void" rel="{{$wpm_task->id}}" rel1="delete-wpm" class="btn btn-outline-danger btn-shadow deleteBtn btn-sm" data-bs-toggle="tooltip" title="Delete Order"><i class="fa fa-trash"></i></a>
												</td>
											</tr>
					                        @endforeach
											@endisset
					                    </tbody>
					                </table>
									{{$wpm_tasks->appends(request()->input())->links('pagination::bootstrap-4')}}
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

@endsection

<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

@section('scripts')

    <!-- Internal Form-validation js -->
    {{-- <script src="{{asset('assets/js/form-validation.js')}}"></script> --}}
    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    {{-- <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script> --}}

    <!--Internal  Datatable js -->
    <script src="{{asset('assets/js/table-data.js')}}"></script>
	<script>
		function orderStatus(status,id){
            $.ajax({
                type:"get",
                url:"{{url('update-wpm-status')}}",
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
	</script>
@endsection