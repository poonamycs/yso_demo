@extends('layouts.app')
@section('styles')
    <!-- Internal Select2 css -->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/datatable/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('content')

	<div class="breadcrumb-header justify-content-between pt-3 mt-0">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Stages Attachments</h4>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pe-1 mb-xl-0">
                <button data-bs-toggle="modal" data-bs-target="#viewAttachment" class="modal-effect btn btn-primary btn-block"><i class="fa fa-paperclip"></i> Add Attachment</button>
            </div>
        </div>
    </div>

	<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">    
	    <div class="app-main">
	        <div class="app-main__outer">
	        	<div class="app-main__inner">
			        <div class="main-card mb-3 card">
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
			            <div class="card-body mb-4">
			                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
			                    <thead>
			                        <tr>
			                            <th class="text-center">Sr. No.</th>
			                            <th>Attachments</th>
			                            <th>Uploaded By and On</th>
			                            <th class="text-center">Action</th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                    	@foreach($attachments as $row)
			                    	<?php 
			                    		$extension = File::extension($row->attachments);
			                    		$user = explode('-', $row->email);
			                    	?>
			                        <tr>
			                            <td class="text-center">{{ $loop->index+1 }}</td>
			                            <td><a href="{{ url('images/attachments/'.$row->attachments) }}" target="_blank"><i class="fa fa-file-{{$icons[$extension]}}-o"></i> {{ $row->attachments }}</a></td>
			                            <td>{{ $user[0] }} | {{ date('d M Y, h:i a', strtotime($row->created_at)) }}</td>
			                            <td class="text-center">
			                            	<a href="{{ url('images/attachments/'.$row->attachments) }}" target="_blank" class="btn mr-2 mb-2 btn-shadow btn-outline-primary btn-sm"><i class="fa fa-eye"></i> View</a>
			                            	<a href="{{ url('images/attachments/'.$row->attachments) }}" target="_blank" download="true" class="btn mr-2 mb-2 btn-shadow btn-outline-secondary btn-sm"><i class="fa fa-download"></i> Download</a>
			                            	<a href="javascript:void" rel="{{ $row->id }}" rel1="delete-attachment" class="btn mr-2 mb-2 btn-shadow btn-outline-danger btn-sm deleteBtn"><i class="fa fa-trash"></i> Delete</a>
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

<!-- view attachments -->
<div class="modal fade bd-example-modal-lg" id="viewAttachment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Attachments </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            	<form class="" action="{{ url('admin/add-attachments/') }}" method="post" enctype="multipart/form-data">@csrf
	                <div class="position-relative row form-group">
	                    <div class="col-sm-10">
	                        <input type="file" name="attachments[]" class="form-control-file" required="true" multiple="true" id="files">
	                        <!-- <small class="form-text text-muted"> you can add multiple files. (Supported files - .pdf, .jpeg, .png, .txt, .pptx, .csv, .docx, xlsx)</small> -->
	                        <div class="row">
	                        	<div class="col-md-2">
	                        		<div class="gallery d-flex"></div>
	                        	</div>
	                        </div>
	                    </div>
	                </div>
	                <input type="hidden" name="order_id" value="{{ $order_id }}">
	                <input type="hidden" name="stage_id" value="{{ $stage_id }}">
		            <div class="modal-footer">
		                <button type="button" class="btn btn-outline-secondary btn-shadow" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
		                <button type="submit" class="btn btn-primary btn-shadow"><i class="fa fa-check"></i> Add Attachment</button>
		            </div>
	            </form>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
	$(function() {
		var imagesPreview = function(input, placeToInsertImagePreview) {
		    if (input.files) {
		        var filesAmount = input.files.length;
		        for (i = 0; i < filesAmount; i++) {
		            var reader = new FileReader();

		            reader.onload = function(event) {
		                $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
		            }

		            reader.readAsDataURL(input.files[i]);
		        }
		    }
		};

	    $('#files').on('change', function() {
	        imagesPreview(this, 'div.gallery');
	    });
	});
</script>

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
    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>

    <!--Internal  Datatable js -->
    <script src="{{asset('assets/js/table-data.js')}}"></script>
@endsection