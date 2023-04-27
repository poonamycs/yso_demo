@extends('layouts.app')
@section('styles')
    <style>
        .expired{
            --bs-table-accent-bg: #ff000021 !important;
            color: var(--bs-table-striped-color)
        }
    </style>
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('assets/plugins/datatable/datatables.min.css')}}" rel="stylesheet" /> -->
    <!-- <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet"> -->
    <link href="{{asset('assets/plugins/datatable/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection('styles')

@section('content')

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
                    <!-- <div class="mb-xl-0">
                        <div class="form-group mt-2 mb-2">
                            <select name="label" class="form-control form-control-sm" onchange="this.form.submit()">
                                <option value="">Labels</option>
                                @foreach(DB::table('enq_labels')->select('title','id')->get() as $lable)
                                <option value="{{$lable->id}}">{{$lable->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> -->
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
                <!-- <a class="btn btn-sm tx-13 btn-light" data-bs-toggle="modal" data-bs-target="#labelModal"><i class="fa fa-tags"></i> Create Labels</a> -->
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

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card mg-b-20">
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
                <div class="card-body table-responsive mb-3">
                    <div class="table-responsive">
                        <!-- <div class="card-body">
                            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" class="form-control">
                                <br>
                                <button class="btn btn-success">Import User Data</button>
                                <a class="btn btn-warning" href="{{ route('export-users') }}">Export User Data</a>
                            </form>
                        </div> -->
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th class="text-center align-middle">QRN</th>
                                    <th class="text-center align-middle">Customer Detail</th>
                                    <th class="text-center align-middle">Status</th>
                                    <th class="text-center align-middle">Assignee</th>
                                    <th class="text-center align-middle">Enquiry date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($allEnq)
                                @foreach($allEnq as $row)
                                <tr>
                                    <td class="text-center align-middle">{{ $loop->index+1 }}</td>
                                    <td class="text-center align-middle"><a href="{{url('detail-enquiry/'.$row->id)}}" title="View Enquiry Details">{{ $row->qrn }}</a></td>
                                    <td>
                                    <i class="fa fa-user-tie"></i> {{ $row->customer_name }}<br/>
                                    @if($row->phone)<i class="fa fa-phone-alt"></i> {{ $row->phone }} @endif  @if($row->email)<i class="fa fa-envelope"></i> {{ $row->email }}@endif<br/> 
                                    @if($row->city || $row->region)<i class="fas fa-address-card"></i> {{ $row->city }} {{ $row->region }}@endif<br/>
                                    </td>
                                    <td class="text-center align-middle">@if($row->status)<mark>{{ $row->status }}@endif</mark></td>
                                    <td class="text-center align-middle">{{ $row->name }}</td>
                                    <td class="text-center align-middle">{{ date('d M Y', strtotime($row->enq_date)) }}</td>
                                    <td class="text-center align-middle">
                                        <a href="{{url('edit-enquiry/'.$row->id)}}" class="btn btn-outline-info btn-shadow btn-sm" data-bs-toggle="tooltip" title="Edit Enquiry Details"><i class="fa fa-pencil-alt"></i> </a>
                                        <a href="javascript:void" rel="{{$row->id}}" rel1="delete-enquiry" class="btn btn-outline-danger btn-shadow deleteBtn btn-sm" data-bs-toggle="tooltip" title="Delete Order"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @endisset
                            </tbody>
                        </table>
                        {{$allEnq->appends(request()->input())->links('pagination::bootstrap-4')}}
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- cashmodal modal -->
    <div class="modal" id="paymentCashflowModal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo" id="viewCashflowModal">
            </div>
        </div>
    </div>

    <!-- order details modal -->
    <div class="modal" id="orderDetailModal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo" id="viewModal">viewModal
            </div>
        </div>
    </div>
@endsection('content')

@section('scripts')
    <script>
        $(document).ready(function(){
            
                viewEnquiryDetail({{Request()->id}});
            
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
        function viewEnquiryDetail(id){
            $.ajax({
                type:"get",
                url:"{{url('view-enquiry-details')}}",
                data:{id:id},
                success:function(data){
                    // console.table(data);
                    // $('#enqDetail').html(data);
                    $('#viewModal').html(data);
                }
            });
        }
    </script>

    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>

    <!--Internal  Datatable js -->
    <script src="{{asset('assets/js/table-data.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endsection('scripts')