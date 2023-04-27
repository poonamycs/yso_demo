@extends('layouts.app')
@section('content')

    @section('styles')
        <link href="{{asset('assets/plugins/datatable/datatables.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/datatable/responsive.dataTables.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/responsive.bootstrap5.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    @endsection
    <div class="breadcrumb-header justify-content-between pt-3 mt-0">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">New IndiaMart Enquiries <span class="badge bg-dark h6 mb-0">8</span></h4>
            </div>
        </div>
    </div>

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-body">
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
                    
                    <div class="text-right">
                        <button class="btn btn-primary mb-3" onclick="$('#addIMEnq').submit();"><i class="fa fa-check-circle"></i> Submit</button>
                    </div>
                    <div class="table-responsive">
                        <table id="example-" class="table key-buttons text-md-nowrap datatab1">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0 text-left"><input type="checkbox" class="checkAll" name="checkAll" /></th>
                                    <th class="border-bottom-0 text-center">ID</th>
                                    <th class="border-bottom-0 text-left">Name</th>
                                    <th class="border-bottom-0 text-center">Contact Details</th>
                                    <th class="border-bottom-0 text-center">Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{url('add-indiamart-enq')}}" method="post" id="addIMEnq">@csrf
                                @foreach($indiamartEnq as $enq)
                                @php 
                                    $enquiries = App\Models\Enquiry::select('qrn')->where('enq_from','IndiaMart')->get()->toArray();
                                    $enquiries = Arr::flatten(json_decode(json_encode($enquiries),true));
                                @endphp
                                @if(!in_array($enq->UNIQUE_QUERY_ID, $enquiries))
                                <tr>
                                    <td class="text-left align-middle"><input type="checkbox" name="enquiries[]" value="{{json_encode($enq)}}" /></td>
                                    <td class="text-center align-middle">{{ $enq->UNIQUE_QUERY_ID }}</td>
                                    <td class="text-center">{{$enq->SENDER_NAME}} <br> {{$enq->SENDER_COMPANY}}</td>
                                    <td class="text-center">{{$enq->SENDER_MOBILE}} <br> {{$enq->SENDER_EMAIL}}</td>
                                    <td class="text-center">{!!$enq->QUERY_MESSAGE!!}</td>
                                </tr>
                                @endif
                                @endforeach
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

    <script>
        $(document).ready(function() {
            $(".checkAll").on("click", function() {
                $(this)
                .closest("table")
                .find("tbody :checkbox")
                .prop("checked", this.checked)
                .closest("tr")
                .toggleClass("selected", this.checked);
            });

            $("tbody :checkbox").on("click", function() {
                // toggle selected class to the checkbox in a row
                $(this)
                .closest("tr")
                .toggleClass("selected", this.checked);

                // add selected class on check all
                $(this).closest("table")
                .find(".checkAll")
                .prop("checked",
                $(this)
                    .closest("table")
                    .find("tbody :checkbox:checked").length ==
                    $(this)
                    .closest("table")
                    .find("tbody :checkbox").length
                );
            });
        });
    </script>
    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>

    <!--Internal  Datatable js -->
    <script src="{{asset('assets/js/table-data.js')}}"></script>
@endsection