@extends('layouts.app')
@section('content')

    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Edit Order Details - SO #{{ base64_decode(request()->so) }}</h4>
            </div>
        </div>
    </div>

	<div class="row row-sm">
        <div class="col-xl-12">
            <div class="card mg-b-20">
				<div class="main-card mb-3 card" id="app">
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
					<div class="card-body mb-3">
						<form id="editOrder" name="editOrder" class="col-md-10 mx-auto" method="post" action="{{ url('edit-order/'.$orders[0]->so) }}">@csrf 
                        <span class="mb-2"><span class="text-danger">*</span> fields are mandatory</span>
                        <div class="form-row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="so" class="">SO Number</label>
                                    <input type="text" class="form-control disabled" id="so" name="so" readonly="true" value="{{ $orders[0]->so }}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="po" class="field-required">PO Number</label>
                                    <input type="text" class="form-control" id="po" name="po" value="{{ $orders[0]->po }}" maxlength="50" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="client_name" class="field-required">Client Name</label>
                            <input type="text" class="form-control" id="client_name" name="client_name" value="{{ $orders[0]->client_name }}" />
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="po_date" class="field-required">PO Date</label>
                                    <input type="date" class="form-control" id="po_date" name="po_date" value="{{ $orders[0]->po_date }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="delivery_date" class="field-required">Delivery Date</label>
                                    <input type="date" class="form-control" name="delivery_date" value="{{ $orders[0]->delivery_date }}" />
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tpi" class="field-required">TPI</label>
                                    <select name="tpi" id="tpi" class="form-control">
                                        <option @if($orders[0]->tpi == 'Yes') selected @endif value="Yes">Yes</option>
                                        <option @if($orders[0]->tpi == 'No') selected @endif value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tpi_agency" class="">TPI Agency</label>
                                    <input type="text" class="form-control" id="tpi_agency" name="tpi_agency" value="{{ $orders[0]->tpi_agency }}" />
                                </div>
                            </div>
                        </div><hr>
                        <a aria-controls="collapseExample" aria-expanded="false" class="btn ripple btn-link p-0" data-bs-toggle="collapse" href="#collapseExample" role="button"><i class="fa fa-list"></i> Equimpments <i class="fa fa-angle-down"></i></a>
                        <div class="collapse" id="collapseExample">                        
                            @foreach($orders as $row)
                            <input type="hidden" name="idOrder[]" value="{{$row->id}}">
                            <div class="form-row border p-2 mb-2 mt-2" style="border-radius: 8px; box-shadow: 2px 2px 1px 0px #aaaaaa7a;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="equipment_type" class="field-required">Equipment Type</label>
                                        <input type="text" class="form-control" id="equipment_type" name="equipment_type[]" readonly="true" value="{{ $row->equipment_type }}" />
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="mfr" class="field-required">MFR Number</label>
                                        <input type="text" class="form-control disabled" id="mfr" required="" name="mfr[]" value="{{ $row->mfr }}" readonly />
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group text-right">
                                        <a href="javascript:void" rel="{{ $row->id }}" rel1="delete-equipment" class="btn mr-1 mb-1 btn-outline-danger btn-sm deleteEquipment"><i class="fa fa-trash"></i> Remove</a>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="equipment_name" class="field-required">Equipment Name</label>
                                        <input type="text" class="form-control" id="equipment_name" name="equipment_name[]" value="{{ $row->equipment_name }}" />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="tag" class="">Tag Number</label>
                                        <input type="text" class="form-control" id="tag" name="tag[]" value="{{ $row->tag }}" maxlength="30" />
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div><hr>

                        <div class="table-responsive">  
                            <table class="table table-bordered field_wrapper" id="dynamic_field-">  
                                <tr class="mb-2">  
                                    <td>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="equipment_type" class="field-required">Equipment Type</label>
                                                    <select name="equipment_type1[]" id="equipment" class="form-control">
                                                        <option value="">-- Select option from below --</option>
                                                        @foreach($equipTypes as $row)
                                                        <option value="{{ $row->equipment_type }}" data-type="{{ $row->abbr }}">{{ $row->equipment_type }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mfr" class="field-required">MFR Number</label>
                                                    <input type="text" name="mfr1[]" class="form-control" id="mfrno" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="equipment_name" class="field-required">Equipment Name</label>
                                                    <input type="text" name="equipment_name1[]" class="form-control" id="equipment_name" placeholder="Enter Equipment Name" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tag" class="">Tag Number</label>
                                                    <input type="text" name="tag1[]" class="form-control" id="tag" placeholder="Enter Tag Number" />
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><button type="button" id="add" class="btn btn-outline-success btn-sm"><i class="fa fa-plus"></i> Add More</button></td>  
                                </tr>  
                            </table>
                        </div>

                        <center>
                        	<div class="form-group col-md-6">
								<button type="submit" class="btn btn-primary float-right btn-block"><b><i class="fa fa-check"></i> Update Details</b></button>
							</div>
                        </center>
                    </form>
					</div>
				</div>
			</div>
        </div>
    </div>
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#equipment').change(function() {
            var type = $(this).find(':selected').data('type');
            var mfr = "CDPS-"+"{{ $orders[0]->so }}"+"-"+type+"-"+"{{ $mfr+1 }}"+"-"+"{{ $year }}";
            $('#mfrno').val(mfr);
        });

        var maxField = 100;
        var addButton = $('#add');
        var wrapper = $('.field_wrapper');
        var i = 1;
        var x = 1;
        
        $(addButton).click(function(){
            i++;

            $(document).ready(function(){
                $('#equipment_type1').change(function() {
                    var type = $(this).find(':selected').data('type');
                    mfrno = {{$mfr}}+i;
                    var mfr = "CDPS-"+"{{ $orders[0]->so }}"+"-"+type+"-"+mfrno+"-"+"{{ $year }}";
                    $('#mfr1').val(mfr);
                });
            });

            var fieldHTML = '<tr id="row'+i+'" class="dynamic-added"><td><div class="form-row"><div class="col-md-6"><div class="form-group"><label for="equipment_type'+i+'" class="field-required">Equipment Type</label><select name="equipment_type1[]" id="equipment_type'+i+'" class="form-control" required=""><option value="">-- Select option from below --</option>@foreach($equipTypes as $row)<option value="{{ $row->equipment_type }}" data-type="{{ $row->abbr }}">{{ $row->equipment_type }}</option>@endforeach </select></div></div><div class="col-md-6"><div class="form-group"><label for="mfr'+i+'" class="">MFR Number</label><input type="text" class="form-control" id="mfr'+i+'" name="mfr1[]" /></div></div><div class="col-md-6"><div class="form-group"><label for="equipment_name" class="field-required">Equipment Name</label><input type="text" class="form-control" id="equipment_name" name="equipment_name1[]" required placeholder="Enter Equipment Name" /></div></div><div class="col-md-6"><div class="form-group"><label for="tag" class="">Tag Number</label><input type="text" class="form-control" id="tag" name="tag1[]" placeholder="Enter Tag Number"></div></div></div></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-outline-danger btn_remove btn-sm"><i class="fa fa-times"></i> Remove</button></td></tr>';

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
@endsection