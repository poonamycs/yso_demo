@extends('layouts.app')
@section('styles')
    <!-- Internal Select2 css -->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/telephoneinput/telephoneinput.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection
@section('content')

	<div class="row d-flex justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="breadcrumb-header justify-content-between m-2">
                <div class="my-auto">
                    <div class="d-flex">
                        <h4 class="content-title mb-0 my-auto">{{$enqDetail->customer_name}}</h4>
                    </div>
                </div>
            </div>
            <div class="card p-4">
				@if(Session::has('error_message'))
		        <div class="alert alert-danger alert-block">
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
                <div id="enqDetail" class="main-content-body main-content-body-chat">
                    <div class="main-chat-header bg-primary" style="border-radius: 4px 4px 0 0;">
                        <div class="main-chat-msg-name m-0">
                            <h6 class="text-white"></h6>
                                <?php if(!empty($enqDetails->enq_labels)){
                                foreach ($enqDetails->enq_labels as $label) {
                                    $lab = DB::table('enq_labels')->where('id', $label)->first();
                                    if(!empty($lab)){?>
                                        <i class="fa fa-tag" style="color: '.$lab->code.'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="'.$lab->title.'"></i>
                                    <?php }
                                    }
                                }
                                ?>
                            <small class="font-weight-bold text-white">Enquiry ID: {{$enqDetail->id}}</small> | <small class="font-weight-bold text-white">Enquiry On: {{date('d M Y', strtotime($enqDetail->enq_date))}}</small>
                        </div>
                        <nav class="nav"> 
                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-light m-1 pl-1 pr-1 btn-sm" data-bs-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fa fa-clock"></i> Set Reminder</button>
                            <div class="dropdown-menu box-shadow-primary p-2 w-50">
                                <form action="javascript:void" method="post" onsubmit="setReminder({{$enqDetail->id}})" id="setReminderForm">
                                    <div class="form-group m-0">
                                        <label for="note">Remind me on</label>
                                        <div class="">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="reminder_note" id="reminder_note" value="{{$enqDetail->reminder_note}}" placeholder="Reminder note" />
                                            </div>
                                            <div class="form-group">
                                                <input type="datetime-local" class="form-control" name="reminder_date" id="reminder_date" value="{{date('Y-m-d\TH:i', strtotime($enqDetail->reminder_date))}}" required />
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-sm mt-1 pt-2 pb-2" id="addReminder"><i class="fa fa-check"></i> Set</button>
                                </form>
                            </div>
                            <!-- <a class="btn ripple btn-light pr-1 btn-sm" href="#setLabel" type="button"><i class="fa fa-tags"></i> Set Label</a> -->
                            <a class="btn btn-light m-1 pl-1 btn-sm" href="{{url('edit-enquiry/'.$enqDetail->id)}}" title="Edit"><i class="fa fa-pencil-alt"></i></a> 
                            <a class="btn btn-light pl-1 pr-1 btn-sm deleteBtn text-black" data-bs-toggle="tooltip" title="Delete Enquiry" rel1="delete-enquiry" rel="{{$enqDetail->id}}" title="Delete"><i class="fa fa-trash"></i></a>
                        </nav>
                    </div>
                    <div class="main-chat-body" id="ChatBody">
                        <div class="card-body">
                            <div class="ps-0">
                                <div class="main-profile-overview">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <h6 class=""><i class="fa fa-terminal"></i> <span class="font-weight-normal">QRN</span>: {{$enqDetail->qrn}}</h6>
                                        </div>
                                        <div class="col-md-4">
                                            <h6><i class="fa fa-calendar-alt"></i> <span class="font-weight-normal">QTE Date</span>: {{$qte}}</h6>
                                        </div>
                                        
                                        <div class="col-md-4 {{$assignEnq}}">
                                            <h6 class=""><i class="fa fa-user-tie"></i> <span class="font-weight-normal">Assignee</span>: <button data-bs-toggle="dropdown" id="assignee" class="btn btn-sm btn-outline-dark">{{$assignee}} <i class="icon ion-ios-arrow-down tx-11 mg-l-3"></i></button>
                                                <div class="dropdown-menu box-shadow-primary ht-200 overflow-scroll">
                                                    <?php foreach (App\Models\Admin::select('id','name')->orderBy('name','ASC')->get() as $user) {?>
                                                        <form action="{{url('assign-enquiry/')}}" method="Post">@csrf
                                                        <input type="hidden" class="id" name ="id" value="{{$user->id}}" />
                                                        <input type="hidden" class="enq_id" name="enq_id" value="{{$enqDetail->id}}" />
                                                        <button type="submit" class="dropdown-item" >{{$user->name}}</button>
                                                        </form>
                                                   <?php }?>
                                                </div>
                                            </h6>
                                        </div>
                                    </div>
                                    <h6 class="font-weight-normal opacity-75">Contact Details </h6>
                                    <div class="row mb-2">
                                        <div class="col-md-3 col">
                                            <h6>{{$contact_person}}</h6>
                                            <h6 class="text-small text-muted mb-0 font-weight-normal"><i class="fa fa-user-alt"></i> Name</h6>
                                        </div>
                                        <div class="col-md-3 col">
                                            <h6><a href="tel:{{$person_phone}}">{{$person_phone}}</a></h6>
                                            <h6 class="text-small text-muted mb-0 font-weight-normal"><i class="fa fa-phone-alt"></i> Phone</h6>
                                        </div>
                                        <div class="col-md-6 col">
                                            <h6><a href="mailto:{{$person_email}}">{{$person_email}}</a></h6>
                                            <h6 class="text-small text-muted mb-0 font-weight-normal"><i class="fa fa-envelope"></i> Email</h6>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 col">
                                            <h6>{{$enqDetail->address}}</h6>
                                            <h6 class="text-small text-muted mb-0 font-weight-normal"><i class="fas fa-address-card"></i></i> Address</h6>
                                        </div>
                                        <div class="col-md-3 col">
                                            <h6>{{$enqDetail->city}}</h6>
                                            <h6 class="text-small text-muted mb-0 font-weight-normal"><i class="fas fa-city"></i> City</h6>
                                        </div>
                                        <div class="col-md-6 col">
                                            <h6>{{$enqDetail->region}}</h6>
                                            <h6 class="text-small text-muted mb-0 font-weight-normal"><i class="fas fa-city"></i> Region</h6>
                                        </div>
                                    </div>
                                    <h6 class="font-weight-normal opacity-75">Price </h6>
                                    <div class="main-profile-bio card card-body p-2 bg-light">{{$price}}</div>

                                    <h6 class="font-weight-normal opacity-75">Message </h6>
                                    <div class="main-profile-bio card card-body p-2 bg-light">{{$enqDetail->description}}</div>
                                    <div id="addedNote"></div>
                                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-light m-1 pl-1 pr-1 btn-sm" data-bs-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fa fa-clock"></i> Set Reminder</button>
                                    <div class="dropdown-menu box-shadow-primary p-2 w-50">
                                        <div class="form-group m-0">
                                            <label for="note">Add Note</label>
                                            <div class="modal-body pt-2 pb-3">
                                                <form action="javascript:void" method="post" id="addEnqNote">@csrf
                                                    <div class="form-group mb-1">
                                                        <label for="note"><small>250 Characters Limit</small></label>
                                                        <div class="media">
                                                            <textarea class="form-control" name="note" id="note" rows="3" maxlength="250" required></textarea>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="enq_id" id="enq_id" value="{{$enqDetail->id}}"/>
                                                    <button type="submit" class="btn btn-dark btn-sm mt-1 pt-2 pb-2" id="addButton"><i class="fa fa-check-circle"></i> Add Note</button>
                                                    <button data-bs-dismiss="modal" type="button" class="btn btn-link mt-1"><i class="fa fa-times"></i> Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                        
                                
                                    <div class="media invisible m-0 w-100">
                                        <div class="" data-bs-toggle="tooltip">d M, y</div>
                                            <div class="media-body">
                                                <span class="tx-12-f">Curabitur non nulla sitCurabitur non nulla sitCurabitur non nulla sitCurabitur non nulla sit Curabitur non nulla sitCurabitur non nulla sitCurabitur non nulla sitCurabitur non nulla sit</span>
                                            </div>
                                            <div class=""><i class="fa fa-trash"></i></div>
                                        </div>
                                    </div>
                                    
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
        $(document).ready(function(){
            $(".assignEnq").click(function(){
                var id = $(this).val();
                var enq_id = $(".enq_id").val();
                
                $.ajax({
                type:"get",
                url:"{{url('assign-enquiry')}}",
                data:{id:id,enq_id:enq_id},
                beforeSend:function(){
                    $("#assignee").html("<i class='fa fa-spin fa-spinner'></i>");
                },
                success:function(data){
                    // console.log(data);
                    if(data){
                        $('#assignee').html(data);
                    }else{
                        alert('Something went wrong.');
                    }
                }
            });
            if({{Request()->id}}){
                viewEnquiryDetail({{Request()->id}});
            }
            });
            $("#addButton").click(function(){
                alert("hello");
                var formEl = document.forms.addEnqNote;
                var formData = new FormData(formEl);
                var note = formData.get('note');
                var enq_id = formData.get('enq_id');
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ URL::to('/add-note') }}',
                data:{
                    note:note,
                    enq_id:enq_id,
                },
                beforeSend:function(){
                    $("#addButton").html("<i class='fa fa-spin fa-spinner'></i> Adding");
                },
                success:function(resp){
                    console.log(resp);
                    $('#addedNote').prepend('<div class="media mr-1 w-100" id="media'+resp[0]+'"><a class="profile-user d-flex mr-1" href="javascript:void" title=""><div class="avatar avatar-xs bg-info tx-14-f"> {{mb_substr(ucfirst(Auth::guard("admin")->User()->name) , 0, 1)}} </div></a><div class="media-body"><span class="tx-14-f">'+resp[1]+'</span><small><i class="fa fa-clock"></i> '+resp[2]+'</small></div><div><a href="javascript:void(0)" class="text-black" onclick="deleteNote('+resp[0]+')"><i class="fa fa-trash"></i></a></div></div>');

                    $("#addButton").html("<i class='fa fa-check'></i> Add Note");
                    $('#modaldemo8').modal('hide');
                    document.getElementById('addEnqNote').reset();
                },
                error:function(){
                    $("#addButton").html("<i class='fa fa-times'></i> Note not added. Try again.");
                }
            });
            });
        });
</script>
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
    
    <script src="{{asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>

    <script src="{{asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>

    <script>
        $(document).ready(function(){
            $("#assignEnq").click(function(){
                $.ajax({
                type:"get",
                url:"{{url('assign-enquiry')}}",
                data:{id:id,enq_id:enq_id},
                beforeSend:function(){
                    $("#assignee").html("<i class='fa fa-spin fa-spinner'></i>");
                },
                success:function(data){
                    // console.log(data);
                    if(data){
                        $('#assignee').html(data);
                    }else{
                        alert('Something went wrong.');
                    }
                }
            });
            if({{Request()->id}}){
                viewEnquiryDetail({{Request()->id}});
            }
            });
        function assignEnq(id,enq_id){
            $.ajax({
                type:"get",
                url:"{{url('assign-enquiry')}}",
                data:{id:id,enq_id:enq_id},
                beforeSend:function(){
                    $("#assignee").html("<i class='fa fa-spin fa-spinner'></i>");
                },
                success:function(data){
                    // console.log(data);
                    if(data){
                        $('#assignee').html(data);
                    }else{
                        alert('Something went wrong.');
                    }
                }
            });
        }
    });
</script>
@endsection