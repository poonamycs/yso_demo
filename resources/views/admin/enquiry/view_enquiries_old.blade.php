@extends('layouts.app')
@section('content')
    @section('styles')
        <style>
            .fa-tag, .fa-tags{
                opacity: 0.8
            }
        </style>
        {{-- <link href="{{asset('assets/plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/datatable/responsive.dataTables.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/responsive.bootstrap5.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet"> --}}

        <link rel="stylesheet" href="{{asset('assets/plugins/sumoselect/sumoselect.css')}}">
    @endsection

    <!-- <div id="popup1" class="overlay">
        <div class="popup">
            <h2>Here i am</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
                Thank to pop me out of that button, but now i'm done so you can close this window.
            </div>
        </div>
    </div> -->

    <div class="breadcrumb-header justify-content-between mb-0 mt-0 pt-2">
        <div class="my-auto">
            <div class="d-flex">
                <h5 class="content-title mb-0 my-auto">Enquiry Log Sheet <span class="badge bg-dark h6 mb-0">@if(Auth::guard('admin')->User()->admin_role == 'Superadmin') {{App\Models\Enquiry::count()}} @else {{App\Models\Enquiry::where('assignee',Auth::id())->count()}} @endif </span></h5>
            </div>
            <form class="" action="{{url('view-enquiry-logs')}}" method="get">
                <div class="d-flex">
                    <div class="mb-xl-0">
                        <div class="form-group mt-2 mb-2">
                            <select name="status" id="status" class="form-control form-control-sm" onchange="this.form.submit()">
                                <option value="">Status</option>
                                @foreach(App\Models\Enquiry::select('status')->groupBy('status')->get() as $stat)
                                <option value="{{$stat->status}}" @if(!empty($enqstatus) && $stat->status == $enqstatus) selected @endif>{{$stat->status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-xl-0">
                        <div class="form-group mt-2 mb-2">
                            <select name="city" id="city" class="form-control form-control-sm" onchange="this.form.submit()">
                                <option value="">Cities</option>
                                @foreach(App\Models\Enquiry::select('city')->groupBy('city')->get() as $ct)
                                <option value="{{$ct->city}}" @if(!empty($city) && $ct->city == $city) selected @endif>{{$ct->city}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-xl-0">
                        <div class="form-group mt-2 mb-2">
                            <select name="region" id="region" class="form-control form-control-sm" onchange="this.form.submit()">
                                <option value="">Regions</option>
                                @foreach(App\Models\Enquiry::select('region')->groupBy('region')->get() as $reg)
                                <option value="{{$reg->region}}" @if(!empty($region) && $region == $reg->region) selected @endif>{{$reg->region}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-xl-0">
                        <div class="form-group mt-2 mb-2">
                            <select name="assignee" class="form-control form-control-sm" onchange="this.form.submit()">
                                <option value="">Asignee</option>
                                @foreach(App\Models\Enquiry::select('enquiry.assignee','admins.name')->join('admins','admins.id','enquiry.assignee')->groupBy('enquiry.assignee')->get() as $assig)
                                <option value="{{$assig->assignee}}" @if($assig->assignee == $assignee) selected @endif>{{$assig->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-xl-0">
                        <div class="form-group mt-2 mb-2">
                            <select name="label" class="form-control form-control-sm" onchange="this.form.submit()">
                                <option value="">Labels</option>
                                @foreach(DB::table('enq_labels')->select('title','id')->get() as $lable)
                                <option value="{{$lable->id}}">{{$lable->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-xl-0">
                        <div class="form-group mt-2 mb-2">
                            <select name="source" class="form-control form-control-sm" onchange="this.form.submit()">
                                <option value="">Source</option>
                                <option value="Direct" @if(!empty($source) && $source == 'Direct') selected @endif>Direct</option>
                                <option value="IndiaMart" @if(!empty($source) && $source == 'IndiaMart') selected @endif>IndiaMart</option>
                            </select>
                        </div>
                    </div>
                    <div class="pe-1 mb-xl-0">
                        <div class="form-group mt-2 mb-2">
                            <input type="search" name="search" class="form-control form-control-sm" placeholder="Search...">
                        </div>
                    </div>
                    <div class="pe-1 mb-xl-0 align-self-center">
                        <div class="form-group mt-2 mb-2">
                            <button type="submit" class="btn btn-primary btn-sm pt-1 pb-1"> <i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="pe-1 mb-xl-0 align-self-center">
                        <div class="form-group mt-2 mb-2">
                            <a href="{{url('view-enquiry-logs')}}">Clear</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="d-flex align-self-baseline my-xl-auto- right-content-">
            @if(Auth::guard('admin')->User()->admin_role == 'Superadmin')
            <div class="pe-1 mb-xl-0">
                <a class="btn btn-sm tx-13 btn-light" data-bs-toggle="modal" data-bs-target="#labelModal"><i class="fa fa-tags"></i> Create Labels</a>
            </div>
            <div class="pe-1 mb-xl-0">
                <a href="{{url('view-indiamart-enq')}}" class="btn btn-primary btn-sm"><span class="btn-icon-wrapper pr-2"><i class="fa fa-plus-circle"></i></span> New IndiaMart Enquiries</a>
                {{-- <button class="modal-effect btn btn-primary btn-sm" data-bs-target="#modaldemo3" data-bs-toggle="modal" onclick="viewIndiaMartEnq()"><span class="btn-icon-wrapper pr-2"><i class="fa fa-plus-circle"></i></span> New IndiaMart Enquiries</button> --}}
            </div>
            @endif
            <div class="pe-1 mb-xl-0">
                <a href="{{url('add-enquiry')}}" class="modal-effect btn btn-primary btn-sm"><span class="btn-icon-wrapper pr-2"><i class="fa fa-plus-circle"></i></span> Add New Enquiry</a>
            </div>
        </div>
    </div>

    <div class="row row-sm main-content-app mb-4">
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
        <div class="col-xl-4 col-lg-5">
            <div class="card">
                <div class="main-content-left main-content-left-chat">
                    {{-- <nav class="nav main-nav-line main-nav-line-chat">
                        <select name="status" class="form-select-sm nav-link">
                            @foreach($status as $row)
                            <option value="{{$row->status}}">{{$row->status}}</option>
                            @endforeach
                        </select>
                    </nav> --}}
                    <div class="main-chat-contacts-wrapper d-none">
                        <form action="" method="post" class="row">@csrf
                            <div class="col-md-12">
                                <div class="form-group m-0">
                                    <input type="search" id="searchEnq" name="keyword" class="form-control" placeholder="Search by Company Name, Person, City, Description">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group m-0">
                                    <select name="status" id="status" class="form-control" onchange="this.form.submit()">
                                        <option value="">-- All Status --</option>
                                        @foreach(App\Models\Enquiry::select('status')->groupBy('status')->get() as $stat)
                                        <option value="{{$stat->status}}" @if($stat->status == $enqstatus) selected @endif>{{$stat->status}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="main-chat-list searchResp1" id="ChatList">
                        <ul class="results"></ul>
                        @if(count($allEnq) > 0)
                        @foreach($allEnq as $row)
                        @php $i=1; @endphp
                        <a class="media new" onclick="viewEnquiryDetail({{$row->id}})" href="javascript:void">
                            <div class="media-body m-0" data-bs-toggle="tooltip" data-bs-placement="right" title="{{strip_tags($row->description)}}">
                                <div class="media-contact-name">
                                    <span>{{$row->customer_name}} @if($row->phone), <code>{{$row->phone}}</code>@endif @if(!empty($row->enq_labels))  @php $cnt = count($row->enq_labels)-1; @endphp@if($cnt > 1) <i class="fa fa-tags"></i> @elseif($cnt == 1) <i class="fa fa-tag"></i> @endif @endif</span> <span>{{$row->created_at->diffForHumans()}}</span>
                                </div>
                                <p class="mb-1 font-italic">{{Str::limit($row->description, 70)}}</p>
                                <p class="fw-500"><i class="fa fa-map-marker-alt"></i>@if(!empty($row->city)) {{$row->city}} @else NA @endif, @if(!empty($row->region)) {{$row->region}} @else NA @endif <span class="badge badge-purple-transparent">{{$row->status}}</span></p>
                            </div>
                        </a>
                        @endforeach
                        @else
                        <div class="content-inner min-vh-70 justify-content-center align-items-center">
                            <div class="main-chat-msg-name text-center">
                                <img src="{{asset('not_found.jpg')}}" height="150">
                                <h6 class="text-center">No Enquiry Found</h6>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <nav aria-label="Page navigation example" class="mt-3 overflow-scroll">
                    <ul class="pagination">
                        {{ $allEnq->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7">
            <div class="card" style="backdrop-filter: blur(2px);background: #ffffffa6!important;">
                <a class="main-header-arrow" href="" id="ChatBodyHide"><i class="icon ion-md-arrow-back"></i></a>
                <div id="enqDetail" class="main-content-body main-content-body-chat min-vh-70 justify-content-center align-items-center">
                    <div class="main-chat-body" id="ChatBody">
                        <div class="content-inner">
                            <div class="main-chat-msg-name">
                                <img src="{{asset('ufo.png')}}" height="150">
                                <h6 class="text-center text-primary">No Enquiry Selected</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- add label modal -->
    <div class="modal" id="labelModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Create Label</h6>
                    <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-around">
                        <div class="col-lg-5 col-xl-5 p-0">
                            <form action="javascript:void" method="post" class="form-horizontal" id="addLabelForm" onsubmit="addLabelForm()">@csrf
                                <div class="form-group mb-1">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Label Title" required>
                                </div>
                                <div class="form-group">
                                    <input type="color" class="form-control" name="code" id="code" placeholder="Color">
                                </div>
                                <div class="form-group mb-0 mt-3 justify-content-end">
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-sm addLabel"><i class="fa fa-check-circle"></i> Add</button>
                                        <button data-bs-dismiss="modal" type="button" aria-label="Close" class="btn btn-outline-secondary btn-sm">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 col-xl-6 p-0">
                            <div class="card mb-0">
                                <div class="card-body p-0 labels" style="max-height: 250px; overflow-y: scroll;">
                                    @foreach($alllabels as $label)
                                    <div class="d-flex p-2 border-top label{{$label->id}}">
                                        <a class="align-self-center ml-1 mr-1" onclick="removeLabel({{$label->id}})"><i class="fa fa-times"></i> &nbsp;&nbsp;</a> 
                                        <label class="mb-0"><span>{{$label->title}}</label> 
                                        <span class="ms-auto"> 
                                            <i class="fa fa-tag tx-16-f" style="color: {{$label->code}}"></i> 
                                        </span> 
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- indiaMart Enquiries modal -->
    <div class="modal" id="modaldemo3">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">IndiaMart Enquiries</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="imEnq">
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header pt-2 pb-2">
                    <h6 class="modal-title">Add Note</h6>
                </div>
                <div class="modal-body pt-2 pb-3">
                    <form action="javascript:void" method="post" onsubmit="addNote()" id="addEnqNote">@csrf
                        <div class="form-group mb-1">
                            <label for="note"><small>250 Characters Limit</small></label>
                            <div class="media">
                                <textarea class="form-control" name="note" id="note" rows="3" maxlength="250" required></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="enq_id" id="enq_id">
                        <button type="submit" class="btn btn-dark btn-sm mt-1 pt-2 pb-2" id="addButton"><i class="fa fa-check-circle"></i> Add Note</button>
                        <button data-bs-dismiss="modal" type="button" class="btn btn-link mt-1"><i class="fa fa-times"></i> Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

    <script>
        $(document).ready(function(){
            if({{Request()->id}}){
                viewEnquiryDetail({{Request()->id}});
            }
        });
    </script>

    <script>
        function addEnquiryLabels(enq_id){
            // console.log('submit'); return false;

            var form = document.addEnquiryLabelForm;
            var dataString = $(form).serialize();
            // console.log(dataString); return false;

            // var label = { 'labels[]' : []};
            // $(":checked").each(function() {
            //     label['labels[]'].push($(this).val());
            // });
            // var labels = $(formEl).serialize();
            // console.log(label);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ URL::to('add-enq-labels') }}',
                data:{
                    label:dataString,
                    enq_id:enq_id
                },
                success:function(resp){
                    console.table(resp);
                    viewEnquiryDetail(enq_id);
                    $(".popup"+enq_id).hide();
                    document.getElementById('addLabelForm').reset();
                },
                error:function(){
                    $(".addLabel").html("<i class='fa fa-times'></i> Label added. Try again.");
                }
            });
        }

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

        function addLabelForm() {
            var formEl = document.forms.addLabelForm;
            var formData = new FormData(formEl);
            var title = formData.get('title');
            var code = formData.get('code');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ URL::to('add-label') }}',
                data:{
                    title:title,
                    code:code,
                },
                beforeSend:function(){
                    $(".addLabel").html("<i class='fa fa-spin fa-spinner'></i> Adding");
                },
                success:function(resp){
                    $(".addLabel").html("<i class='fa fa-check'></i> Add");
                    $('.labels').prepend('<div class="d-flex p-2 border-top label'+resp+'"><a class="align-self-center mb-0 ml-1 mr-1"><i class="fa fa-times" onclick="removeLabel('+resp+')"></i> &nbsp;&nbsp;</a> <label class="mb-0"><span>'+title+'</label> <span class="ms-auto"> <i class="fa fa-tag tx-16-f" style="color: '+code+'"></i></span></div>');
                    // $('#labelModal').modal('toggle');
                    // swal({
                    //     title: "New Label Added",
                    //     type: "success",
                    //     confirmButtonColor: '#00b9ff',
                    // });
                    document.getElementById('addLabelForm').reset();
                },
                error:function(){
                    $(".addLabel").html("<i class='fa fa-times'></i> Label added. Try again.");
                }
            });
        }

        function removeLabel(id){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"post",
                url:"{{url('delete-label')}}",
                data:{id:id},
                success:function(data){
                    $('.label'+data).hide();
                    $('.label'+data).removeClass('d-flex');
                }
            });
        }

        function setReminder(enq_id) {
            var formEl = document.forms.setReminderForm;
            var formData = new FormData(formEl);
            var note = formData.get('reminder_note');
            var date = formData.get('reminder_date');
            // console.log(enq_id+note+date);
            // e.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'{{ URL::to('/add-reminder') }}',
                data:{
                    note:note,
                    date:date,
                    enq_id:enq_id,
                },
                beforeSend:function(){
                    $("#addReminder").html("<i class='fa fa-spin fa-spinner'></i> Adding");
                },
                success:function(resp){
                    $('#addedNote').prepend('');
                    $("#addReminder").html("<i class='fa fa-check'></i> Add Reminder");
                    document.getElementById('setReminderForm').reset();
                },
                error:function(){
                    $("#addReminder").html("<i class='fa fa-times'></i> Reminder not added. Try again.");
                }
            });
        }

        function addNote() {
            var formEl = document.forms.addEnqNote;
            var formData = new FormData(formEl);
            var note = formData.get('note');
            var enq_id = formData.get('enq_id');
            // e.preventDefault();
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
                    // console.log(resp);
                    $('#addedNote').prepend('<div class="media mr-1 w-100" id="media'+resp[0]+'"><a class="profile-user d-flex mr-1" href="javascript:void" title=""><div class="avatar avatar-xs bg-info tx-14-f"> {{mb_substr(ucfirst(Auth::guard("admin")->User()->name) , 0, 1)}} </div></a><div class="media-body"><span class="tx-14-f">'+resp[1]+'</span><small><i class="fa fa-clock"></i> '+resp[2]+'</small></div><div><a href="javascript:void(0)" class="text-black" onclick="deleteNote('+resp[0]+')"><i class="fa fa-trash"></i></a></div></div>');

                    $("#addButton").html("<i class='fa fa-check'></i> Add Note");
                    $('#modaldemo8').modal('hide');
                    document.getElementById('addEnqNote').reset();
                },
                error:function(){
                    $("#addButton").html("<i class='fa fa-times'></i> Note not added. Try again.");
                }
            });
        }

        function addNoteModal(id) {
            $('#enq_id').val(id);
        }

        function deleteNote(id){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"post",
                url:"{{url('delete-note')}}",
                data:{id:id},
                success:function(data){
                    // alert(data);
                    $('#media'+data).hide();
                }
            });
        }

        function viewEnquiryDetail(id){
            $.ajax({
                type:"get",
                url:"{{url('view-enquiry-details')}}",
                data:{id:id},
                success:function(data){
                    // console.table(data);
                    $('#enqDetail').html(data);
                }
            });
        }

        function viewIndiaMartEnq(){
            $.ajax({
                type:"get",
                url:"{{url('get-indiamart-enq')}}",
                beforeSend:function(){
                    $("#imEnq").html('<div class="text-left font-weight-bold p-2"><i class="fa fa-spin fa-spinner"></i> Loading...</div>');
                },
                success:function(data){
                    // console.table(data);
                    $('#imEnq').html(data);
                },
                error:function(){
                    $("#imEnq").html("<div class='alert alert-dark font-weight-bold m-0'><i class='fa fa-exclamation-triangle text-warning'></i> It is advised to hit this API once in every 5 minutes,but it seems that you have crossed this limit. please try again after 5 minutes.</div>");  
                }
            });
        }

        $(document).ready(function(){
            $("#searchEnq").keyup(function(){
                var keyword = $(this).val();
                if(keyword.length >= 3){
                    // alert(keyword);
                    $.ajax({
                        url:'{{url('search-enquiry')}}',
                        data:{keyword:keyword},
                        dataType:'json',
                        beforeSend:function(){
                            $(".results").html('<div style="background: aliceblue !important;" class="media new"><div class="media-body m-0"><div class="media-contact-name"> Getting</div></div></div>');
                        },
                        success:function(resp){
                            var suggetion = '';
                            resp.forEach(myFunction);
                            function myFunction(resp, index) {
                                const d = new Date(resp.created_at);
                                const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
                                suggetion += '<a style="background: aliceblue !important;" class="media new" onclick="viewEnquiryDetail('+resp.id+')" href="javascript:void"><div class="media-body m-0"><div class="media-contact-name"><span>'+resp.customer_name+' <i class="fa fa-tags tx-10"></i></span> <span>'+d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear()+'</span></div><p>'+resp.city+', '+resp.region+' <span class="badge badge-purple-transparent">'+resp.status+'</span></p></div></a>';
                                // suggetion += '<li><a href="products/'+resp.customer_name+'">'+resp.customer_name+'</a></li>';
                            }
                            // console.log(suggetion);
                            $(".results").html(suggetion);
                        }
                    });
                }else{
                    $(".results").html('');
                    return false;
                }
            });
        });
    </script>
    {{-- <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script> --}}

    <script src="{{asset('assets/js/table-data.js')}}"></script>
    <script src="{{asset('assets/plugins/lightslider/js/lightslider.min.js')}}"></script>

    <script src="{{asset('assets/js/chat.js')}}"></script>
    <script src="{{asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
    <script src="{{asset('assets/js/select2.js')}}"></script>
    <script src="{{asset('assets/js/advanced-form-elements.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endsection