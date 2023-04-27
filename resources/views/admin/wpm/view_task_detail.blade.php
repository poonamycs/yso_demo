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
                        <h4 class="content-title mb-0 my-auto">{{$wpm_tasks->task_name}}</h4>
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
                            <small class="font-weight-bold text-white">Equipment: {{$equipment->equipment_type}} {{ $equipment->equipment_name }}</small> 
                        </div>
                    </div>
                    <div class="main-chat-body" id="ChatBody">
                        <div class="card-body">
                            <div class="ps-0">
                                <div class="main-profile-overview">
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <h6 class=""><i class="fa fa-terminal"></i> <span class="font-weight-normal">Task Name</span>: {{$wpm_tasks->task_name}}</h6>
                                        </div>
                                        <div class="col-md-3">
                                            <h6><i class="fa fa-calendar-alt"></i> <span class="font-weight-normal">Category</span>: {{$wpm_tasks->category}}</h6>
                                        </div>
                                        <input type="hidden" id="id" value="{{$wpm_tasks->id}}">
                                        <?php $user_name = json_decode($wpm_tasks->action_user);
                                        ?>
                                        <div class="col-md-3">
                                            <h6 class=""><i class="fa fa-user-tie"></i> <span class="font-weight-normal">User</span>:<select name="action_user[]" id="action_user" multiple="multiple" class="SlectBox form-control select2" required>
                                                    <option value="">-- Select User from below --</option>
                                                    @foreach($users as $user)
                                                        <option value="{{$user->id}}"  {{ (in_array($user->id, $user_name)) ? 'selected' : '' }}>{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </h6>
                                        </div>
                                        <div class="col-md-3">
                                            <h6 class=""><i class="fa fa-user-tie"></i> <span class="font-weight-normal">Status</span>:
                                                <button data-bs-toggle="dropdown" id="status{{$wpm_tasks->id}}" class="btn btn-sm">{{ $wpm_tasks->status }} <i class="icon ion-ios-arrow-down tx-11 mg-l-3"></i></button>
                                        			<div class="dropdown-menu box-shadow-primary">
														<a class="dropdown-item" onclick="orderStatus('Completed',{{$wpm_tasks->id}})">Completed</a>
														<a class="dropdown-item" onclick="orderStatus('Hold',{{$wpm_tasks->id}})">Hold</a>
														<a class="dropdown-item" onclick="orderStatus('Pending',{{$wpm_tasks->id}})">Pending</a>
														<a class="dropdown-item" onclick="orderStatus('Working',{{$wpm_tasks->id}})">Working</a>
													</div>
													</select>
                                                
                                            </h6>
                                        </div>
                                    </div>
                                    <h6 class="font-weight-normal opacity-75">Task Details </h6>
                                    <div class="row mb-2">
                                        <div class="col-md-3 col">
                                            <h6>{{$wpm_tasks->task_name}}</h6>
                                            <h6 class="text-small text-muted mb-0 font-weight-normal">Task Name</h6>
                                        </div>
                                        <div class="col-md-3 col">
                                            <h6><a href="tel:">{{$wpm_tasks->category}}</a></h6>
                                            <h6 class="text-small text-muted mb-0 font-weight-normal">Category</h6>
                                        </div>
                                        <div class="col-md-6 col">
                                            <h6><a href="mailto:">{{$wpm_tasks->priority}}</a></h6>
                                            <h6 class="text-small text-muted mb-0 font-weight-normal">Priority</h6>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 col">
                                            <h6>{{ date('d M Y', strtotime($wpm_tasks->baseline_target_date)) }}</h6>
                                            <h6 class="text-small text-muted mb-0 font-weight-normal">BaseLine Target</h6>
                                        </div>
                                        <div class="col-md-3 col">
                                            <h6>{{ date('d M Y', strtotime($wpm_tasks->completion_date)) }}</h6>
                                            <h6 class="text-small text-muted mb-0 font-weight-normal">Completion Date</h6>
                                        </div>
                                        <div class="col-md-6 col">
                                            <h6>{{$wpm_tasks->description}}</h6>
                                            <h6 class="text-small text-muted mb-0 font-weight-normal"> Description</h6>
                                        </div>
                                    </div>
                                    @foreach($wpmcomments as $wpmcomment)
                                        <div class="media mr-1 w-100" id="media{{$wpmcomment->id}}">
                                                <a class="profile-user d-flex mr-1" href="javascript:void" title="">
                                                    <div class="avatar avatar-xs bg-info tx-14-f"> {{mb_substr(ucfirst(Auth::guard("admin")->User()->name) , 0, 1)}} </div>
                                                </a>
                                            <div class="media-body"><span class="tx-14-f">{{$wpmcomment->comments}}</span><small><i class="fa fa-clock"></i>{{date('d M, Y', strtotime($wpmcomment->updated_at))}}</small></div>
                                            <div><a href="javascript:void(0)" class="text-black" onclick="deleteNote('{{$wpmcomment->id}}')"><i class="fa fa-trash"></i></a></div>
                                        </div>
                                    @endforeach
                                    <div id="addedNote"></div>
                                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-light m-1 pl-1 pr-1 btn-sm" data-bs-toggle="dropdown" id="dropdownMenuButton" type="button"><i class="fa fa-edit"></i> Add Comment</button>
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
                                                    <input type="hidden" name="task_id" id="task_id" value="{{$wpm_tasks->id}}"/>
                                                    <button type="submit" class="btn btn-dark btn-sm mt-1 pt-2 pb-2" id="addButton"><i class="fa fa-check-circle"></i> Add Comment</button>
                                                    <button data-bs-dismiss="modal" type="button" class="btn btn-link mt-1"><i class="fa fa-times"></i> Cancel</button>
                                                </form>
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
            });
            $("#addButton").click(function(){
                var formEl = document.forms.addEnqNote;
                var formData = new FormData(formEl);
                var note = formData.get('note');
                var task_id = formData.get('task_id');
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ URL::to('/add-wpm-comment') }}',
                data:{
                    note:note,
                    task_id:task_id,
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
            $("#action_user").change(function(){
                var action_user = $(this).val();
                var id = $("#id").val();
                $.ajax({
                type:"get",
                url:"{{url('action-user-change')}}",
                data:{id:id,action_user:action_user},
                
                success:function(data){
                    // if(data){
                    //     $('#assignee').html(data);
                    // }else{
                    //     alert('Something went wrong.');
                    // }
                }
            });
            });
        });
        function deleteNote(id){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"post",
                url:"{{url('delete-wpm-comment')}}",
                data:{id:id},
                success:function(data){
                    // alert(data);
                    $('#media'+data).hide();
                }
            });
        }
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