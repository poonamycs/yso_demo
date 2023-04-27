@extends('layouts.app')
@section('styles')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }

        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }
    </style>
    <!-- Internal Select2 css -->
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/wizard-form.css')}}" rel="stylesheet" />
@endsection
@section('content')

	<div class="row row-sm">
        <div class="container-fluid">
            <div class="breadcrumb-header justify-content-between">
                <div class="my-auto">
                    <div class="d-flex">
                        <h5 class="content-title mb-0 my-auto">Edit Order - {{$order->client_name}}</h5>
                    </div>
                </div>
            </div>
            <form id="addOrder" name="addOrder" class="mx-auto" method="post" action="{{ url('edit-order/'.base64_encode($order->id)) }}" enctype="multipart/form-data">@csrf
                <div>
                    <h3>Order Details</h3>
                    <section>
                        <span class="mb-1"><span class="text-danger">*</span> marked fields are mandatory</span>
                        <div class="form-row mt-2">
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label for="so" class="required_field">SO Number</label>
                                    <input type="text" class="form-control disabled" disabled id="so" name="so" value="{{ $order->so }}" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label for="po" class="required_field">PO Number</label>
                                    <input type="text" class="form-control" id="po" name="po" placeholder="Enter PO Number" value="{{ $order->po }}" required />
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label for="country" class="required_field">Country </label>
                                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter Location" value="{{$order->country}}" required />
                                    {{-- <select name="country" id="country" class="form-control select2" required>
                                        <option value="">-- Select Country --</option>
                                        @foreach(DB::table('countries')->orderBy('name')->get() as $country)
                                        <option value="{{$country->name}}" @if($country->name == $order->country) selected @endif>{{$country->name}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="client_name" class="required_field">Client Name</label>
                                    <input type="text" class="form-control" id="client_name" name="client_name" value="{{ $order->client_name }}" required placeholder="Enter Client Name" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="po_date" class="required_field">PO Date</label>
                                    <input type="date" class="form-control" id="po_date" name="po_date" required value="{{ date('Y-m-d', strtotime($order->po_date)) }}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="delivery_date" class="required_field">Delivery Date</label>
                                    <input type="date" class="form-control" id="delivery_date" name="delivery_date" required value="{{ date('Y-m-d', strtotime($order->delivery_date)) }}" />
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tpi" class="required_field">TPI</label>
                                    <select name="tpi" id="tpi" class="form-control" required>
                                        <option value="">-- Select option from below --</option>
                                        <option value="Yes" @if($order->tpi == 'Yes') selected @endif>Yes</option>
                                        <option value="No" @if($order->tpi == 'No') selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tpi_agency" class="">TPI Agency</label>
                                    <input type="text" class="form-control" id="tpi_agency" name="tpi_agency" placeholder="Enter TPI Agency" value="{{ $order->tpi_agency }}" />
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="attachment" class="">Attachment</label>
                                    <input type="file" class="form-control" id="attachment" name="attachment" />
                                </div>
                            </div>
                            @if($order->new_field != NULL)
                            <div class="col-md-4">
                                <div class="form-group"><?php 
                                    $row = json_decode($order->new_field, true);
                                    $c = 0; 
                                    if($row)
                                    {
                                        foreach($row as $key=>$value){
                                            if($row[$key] != NULL)
                                            {
                                                $c++;
                                                $row_data = json_decode($row[$key], true);?>
                                                <label for="new_field_data" class="" id="new_field_label">{{$row_data['data'][1]}}</label>
                                                <input type="hidden" name="new_field_label[{{$c}}]" value="{{$row_data['data'][1]}}">
                                                <input type="hidden" name="new_field_datatype[{{$c}}]" value="{{$row_data['data'][2]}}">
                                                <input type="text" class="form-control" id="new_field_value" name="new_field_value[{{$c}}]" value="{{$row_data['data'][3]}}"/>        
                                            <?php 
                                            }
                                        }
                                           
                                    }
                                    else
                                    {
                                        $row1 = json_decode($row, true);
                                        $c++;
                                    ?>
                                        <label for="new_field_data" class="" id="new_field_label">{{$row1['data'][1]}}</label>
                                        <input type="hidden" name="new_field_label[1]" value="{{$row1['data'][1]}}">
                                        <input type="hidden" name="new_field_datatype[1]" value="{{$row1['data'][2]}}">
                                        <input type="text" class="form-control" id="new_field_value" name="new_field_value[1]" value="{{$row1['data'][3]}}"/>
                            <?php   }
                                        ?>
                                    <input type="hidden" name="count" value={{$c}}>
                                </div>
                            </div>
                            @endif
                            <div id="addedfield">
								<input type="hidden" name="index_value" id="index_value">		
                                <input type="hidden" id="newfieldvalue">
							</div>
                            <!-- <div class="col-md-4">
								<div class="form-group">
								<a class="btn btn-primary" id="ordermodal">
									Add New Field
								</a>
				                </div>
				            </div> -->
                            <div class="row mg-b-20 mt-2 mg-10" id="newfield">
								<div class="col-md-3 col-sm-6">
									<div class="form-group">
										<label class="">Label <span class="tx-danger">*</span></label>
										<input type="text" class="form-control label" id="label" name="label" placeholder="Enter label" />
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="form-group">
										<label class="form-label">Data Type <span class="tx-danger">*</span></label>
										<select class="form-control datatype" id="datatype" name="datatype">
											<option value="Integer">Integer</option>
											<option value="String">String</option>
											<option value="Float">Float</option>
											<option value="Date">Date</option>
										</select>
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="form-group">
										<label class="form-label">Value <span class="tx-danger">*</span></label>
										<input type="text" class="form-control value" id="value" name="value" placeholder="Enter value" />
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="form-group">
										<a class="btn btn-main-primary pd-x-20 addUser" id="new_field_btn"><i class="fa fa-check-circle"></i></a>
									</div>
								</div>
							</div>
                        </div>
                    </section>

                    <h3>Equipment Details</h3>
                    <section>
                        <div class="table-responsive">  
                            <table class="table table-bordered field_wrapper" id="dynamic_field-">
                                @php $orderEquipments = App\Models\OrderEquipments::where('order_id',$order->id)->get(); @endphp
                                @foreach($orderEquipments as $row)
                                <input type="hidden" name="order_equip_id" value="{{$row->id}}">
                                <tr>
                                    <td>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="equipment_type{{$row->id}}" class="required_field">Equipment Type</label>
                                                    <select name="equipment_type[]" id="equipment_type{{$row->id}}" disabled class="form-control select2 disabled" required>
                                                        <option value="">-- Select option from below --</option>
                                                        @foreach($equipTypes as $equipment)
                                                        <option value="{{ $equipment->equipment_type }}" @if($equipment->equipment_type == $row->equipment_type) selected @endif data-type="{{ $equipment->abbr }}">{{ $equipment->equipment_type }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mfr" class="">MFR Number</label>
                                                    <input type="text" class="form-control disabled" id="mfr0" required name="mfr[]" value="{{$row->mfr}}" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="equipment_name" class="required_field">Equipment Name</label>
                                                    <input type="text" class="form-control" id="equipment_name" required name="equipment_name[]" placeholder="Enter Equipment Name" value="{{$row->equipment_name}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tag" class="">Tag Number</label>
                                                    <input type="text" class="form-control" id="tag" name="tag[]" value="{{$row->tag}}" placeholder="Enter Tag Number" />
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center"><div rel="{{ $row->id }}" rel1="delete-equipment" class="btn btn-outline-danger deleteEquipment"><i class="fa fa-trash"></i></div></td>  
                                </tr>
                                @endforeach
                                <tr>  
                                    <td>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="equipment_type" class="required_field">Equipment Type</label>
                                                    <select name="equipment_type1[]" id="equipment_type" class="form-control">
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
                                                    <input type="text" class="form-control" id="mfr" name="mfr1[]" value="" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="equipment_name" class="required_field">Equipment Name</label>
                                                    <input type="text" class="form-control" id="equipment_name" name="equipment_name1[]" placeholder="Enter Equipment Name" value="" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tag" class="">Tag Number</label>
                                                    <input type="text" class="form-control" id="tag" name="tag1[]" placeholder="Enter Tag Number" />
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center"><div id="add" onclick="addEquipmentField()" class="btn btn-outline-success"><i class="fa fa-plus"></i></div></td>  
                                </tr> 
                            </table>
                        </div>
                    </section>
                    
                    <h3>Payment Details</h3>
                    <section>
                        <div class="form-row">
                            <div class="col-sm-3 form-group">
                                <label class="form-label">Total Order Size (in Rs.)</label>
                                <input type="number" class="form-control" name="order_size" id="order_size" placeholder="Total Order Size" value="{{$order->order_size}}">
                            </div>
                            <div class="col-md-3 col-sm-12 form-group">
                                <label class="form-label" for="po_amt_received">PO Amount Received?</label>
                                <div class="mt-1">
                                    <label class="ckbox">
                                        <input type="checkbox" name="po_amt_received" id="po_amt_received" @if($order->po_amt_received == '1') checked @endif value="1"><span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 form-group">
                                <label class="form-label">Tax (%) </label>
                                <input type="number" class="form-control" name="tax" id="tax" placeholder="Enter Tax" value="{{$order->tax}}" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 col-sm-12 form-group">
                                <label class="form-label">Payment Terms</label>
                                <textarea type="text" class="form-control summernote" name="payment_terms" rows="2">{{$order->payment_terms}}</textarea>
                            </div>
                        </div>

                        {{-- <div class="field_wrapper1">
                            @php $payments = DB::table('payment_cashflow')->where('order_id',$order->id)->get(); @endphp
                            @foreach($payments as $payment)
                            <div class="form-row mb-4">
                                <div class="col-sm-3">
                                    <div class="form-group mb-sm-0">
                                        <label class="form-label">Payment Type</label>
                                        <select class="form-select form-control form-control-lg" name="payment_type[]">
                                            <option value="Advanced" @if($payment->payment_type == 'Advanced') selected @endif>Advanced</option>
                                            <option value="Installment" @if($payment->payment_type == 'Installment') selected @endif>Installment</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group mb-0">
                                        <label class="form-label">Amount <i class="fa fa-question-circle" data-bs-toggle="tooltip" title="Test"></i></label>
                                        <input type="number" name="amount[]" class="form-control" required value="{{$payment->amount}}" />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group mb-0">
                                        <label class="form-label">Date <i class="fa fa-question-circle" data-bs-toggle="tooltip" title="Test"></i></label>
                                        <input type="date" name="date[]" class="form-control" required value="{{date('Y-m-d', strtotime($payment->date))}}" />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label class="form-label invisible"> <i class="fa fa-question-circle"></i></label>
                                    <div class="form-group mb-0">
                                        <div rel="{{$payment->id}}" rel1="delete-payment-cashflow" class="btn btn-outline-danger deleteBtn"><i class="fa fa-trash"></i> Remove</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="form-row mb-4">
                                <div class="col-sm-3">
                                    <div class="form-group mb-sm-0">
                                        <label class="form-label">Payment Type</label>
                                        <select class="form-select form-control form-control-lg" name="payment_type[]">
                                            <option value="Advanced">Advanced</option>
                                            <option value="Installment">Installment</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group mb-0">
                                        <label class="form-label">Amount <i class="fa fa-question-circle"></i></label>
                                        <input type="number" name="amount[]" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group mb-0">
                                        <label class="form-label">Date <i class="fa fa-question-circle"></i></label>
                                        <input type="date" name="date[]" class="form-control" required value="" />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label class="form-label invisible"> <i class="fa fa-question-circle"></i></label>
                                    <div class="form-group mb-0">
                                        <div onclick="addPayemntField()" class="btn btn-outline-info" id="add1"><i class="fa fa-plus-circle"></i> Add</div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </section>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var i = 0;
        var x = 1;
        function addEquipmentField(){
            var maxField = 100;
            var addButton = $('#add');
            var wrapper = $('.field_wrapper');
            i++;
            // var x = 1;

            var fieldHTML = '<tr id="row'+i+'" class="dynamic-added"><td><div class="form-row"><div class="col-md-6"><div class="form-group"><label for="equipment_typee'+i+'" class="required_field">Equipment Type</label><select name="equipment_type1[]" id="equipment_typee'+i+'" class="form-control" required><option value="">-- Select option from below --</option>@foreach($equipTypes as $row)<option value="{{ $row->equipment_type }}" data-type="{{ $row->abbr }}">{{ $row->equipment_type }}</option>@endforeach </select></div></div><div class="col-md-6"><div class="form-group"><label for="mfr'+i+'" class="">MFR Number</label><input type="text" class="form-control" id="mfr'+i+'" name="mfr1[]" required /></div></div><div class="col-md-6"><div class="form-group"><label for="equipment_name" class="required_field">Equipment Name</label><input type="text" class="form-control" id="equipment_name" name="equipment_name1[]" required placeholder="Enter Equipment Name" required /></div></div><div class="col-md-6"><div class="form-group"><label for="tag" class="">Tag Number</label><input type="text" class="form-control" id="tag" name="tag1[]" placeholder="Enter Tag Number"></div></div></div></td><td class="align-middle text-center"><div id="'+i+'" class="btn btn-outline-danger btn_remove" onclick="deleteEquipmentField('+i+')"><i class="fa fa-times"></i> Remove</div></td></tr>';

            if(x < maxField){ 
                x++;
                $(wrapper).append(fieldHTML);
            }
        }

        function deleteEquipmentField(id){
            $('#row'+id+'').remove();
            x--;
        }

        var j = 0;
        var y = 1;
        function addPayemntField(){
            var maxField1 = 100;
            var addButton1 = $('#add1');
            var wrapper1 = $('.field_wrapper1');
            j++;

            var fieldHTML1 = '<div id="row'+j+'" class="form-row mb-4"><div class="col-sm-3"><div class="form-group mb-sm-0"><label class="form-label">Payment Type</label><select class="form-select form-control form-control-lg" name="payment_type[]"><option value="Advanced">Advanced</option><option value="Installment">Installment</option></select></div></div><div class="col-sm-3"><div class="form-group mb-0"><label class="form-label">Amount <i class="fa fa-question-circle"></i></label><input type="number" name="amount[]" class="form-control" required=""></div></div><div class="col-sm-3"><div class="form-group mb-0"><label class="form-label">Date <i class="fa fa-question-circle"></i></label><input type="date" name="date[]" class="form-control" required=""></div></div><div class="col-sm-3"><label class="form-label invisible"> <i class="fa fa-question-circle"></i></label><div class="form-group mb-0"><div onclick="deletePaymentField('+j+')" id="'+j+'" class="btn btn-outline-danger btn_remove1"><i class="fa fa-times"></i> Remove</div></div></div></div>';

            if(y < maxField1){ 
                y++;
                $(wrapper1).append(fieldHTML1);
            }
        }

        function deletePaymentField(id1){
            $('#row'+id1+'').remove();
            y--;
        }
    </script>

    <script>
        $(document).ready(function(){
            
            var form = $("#addOrder");
                form.validate({
                    errorPlacement: function errorPlacement(error, element) { element.before(error); },
                    rules: {
                        so: {
                            required: true,
                        },
                        client_name: {
                            required: true,
                            minlength: 3,
                            maxlength: 70,
                        },
                        po: {
                            required: true,
                        },
                        po_date: {
                            required: true,
                        },
                        delivery_date: {
                            required: true,
                        },
                        tpi: {
                            required: true,
                        },
                        tpi_agency: {
                            required: false,
                            maxlength: 70,
                        },
                        drawing_approved: {
                            required: true,
                        },
                        'equipment_type[]': {
                            required: false,
                        },
                        'equipment_name[]': {
                            required: false,
                        },
                        'mfr[]': {
                            required: false,
                        },
                        'tag[]': {
                            required: false,
                        },
                        order_size: {
                            required: true,
                        },
                        'payment_type[]': {
                            required: true,
                        },
                        'amount[]': {
                            required: true,
                        },
                        'date[]': {
                            required: true,
                        },
                    },
                    messages: {
                        so: {
                            required : "Please enter SO number",
                        },
                        client_name: {
                            required : "Please enter name",
                            minlength : "Please enter valid name",
                            maxlength : "Please enter valid name",
                        },
                        po: {
                            required : "Please enter PO number",
                        },
                        po_date: {
                            required : "Please enter PO date",
                        },
                        delivery_date: {
                            required : "Please enter delivery date",
                        },
                        tpi: {
                            required : "Please select option",
                        },
                        tpi_agency: {
                            required : "Not mandatory field",
                            maxlength : "Max length is 70 charcters",
                        },
                        drawing_approved: {
                            required : "Please select option",
                        },
                        'equipment_type[]': {
                            required : "Please select equipment type",
                        },
                        'equipment_name[]': {
                            required : "Please enter equipment name",
                        },
                        'mfr[]': {
                            required : "Please enter tag number",
                        },
                        'tag[]': {
                            required : "Please enter tag number",
                        },
                        order_size: {
                            required : "Please enter order size",
                        },
                    },
                });
                
           
                form.children("div").steps({
                    headerTag: "h3",
                    bodyTag: "section",
                    transitionEffect: "slideLeft",
                    onStepChanging: function (event, currentIndex, newIndex){
                        form.validate().settings.ignore = ":disabled,:hidden";
                        return form.valid();
                    },
                    onFinishing: function (event, currentIndex){
                        form.validate().settings.ignore = ":disabled";
                        return form.valid();
                    },
                    onFinished: function (event, currentIndex){
                        $(form).submit();
                    }
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

    <script src="{{asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{asset('assets/js/form-wizard.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("div#newfield").hide();
                $("#ordermodal").click(function(){
                    $("div#newfield").show();
                });
                $("#new_field_btn").click(function(){
				var label = $(".label").val();
				var datatype = $(".datatype").val();
				var value = $(".value").val();	
				var url =  "{{url('/')}}";
				$.ajax({
                    url: url+'/add-field',
                    method:'get',
                    data:{
                            label:label,
							datatype:datatype,
							value:value,
                        },
                        success: function(data){
							console.log(data);
							var newfield = '<input type="hidden" name="new_field_data['+i+']">'
							$("#newfieldvalue").append(newfield);
							$('input[name="new_field_data['+i+']"]').val(data);
							var data = jQuery.parseJSON(data);
							if($.isEmptyObject(data.error)){
								var index = $('#index_value').val();
								var fieldHTML = '<tr id="row'+i+'" class="dynamic-added"><td><div class="row mg-b-20 mt-2 mg-10"><div class="col-md-3 col-sm-6"><div class="form-group"><label class="" id="label_field">'+data['data'][1]+'</label><input type="text" class="form-control" id="field" name="field" style="width:200px" value="'+data['data'][3]+'" required /></div></div></div></td></tr>';
								$("div#addedfield").show();
								$("div#addedfield").append(fieldHTML);
								$('#index_value').val(i);
								i++;
							}
							$('#label').val('');
							$('#datatype').val('');
							$('#value').val('');
							$("div#newfield").hide();
							
						}
					});

			});
            });
    </script>
@endsection