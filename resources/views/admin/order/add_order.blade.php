@extends('layouts.app')
@section('styles')

    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/wizard-form.css')}}" rel="stylesheet" />
	
@endsection

@section('content')
	<div class="row">
		<div class="container-fluid">
			<div class="breadcrumb-header justify-content-between">
		        <div class="my-auto">
		            <div class="d-flex">
		                <h5 class="content-title mb-0 my-auto">Add New Order</h5>
		            </div>
		        </div>
		    </div>
		    
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

		    <form id="addOrder" name="addOrder" class="mx-auto" method="post" action="{{ url('add-order/') }}" enctype="multipart/form-data">@csrf
		        <div class="mb-3">
		            <h3>Order Details</h3>
		            <section>
		                <span class="mb-1"><span class="text-danger">*</span> marked fields are mandatory</span>
						<div class="form-row mt-2">
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<label for="so" class="required_field">SO Number</label>
									<input type="text" class="form-control" id="so" name="so" required>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<label for="po" class="required_field">PO Number</label>
									<input type="text" class="form-control" id="po" name="po" placeholder="Enter PO Number" required />
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<label for="country" class="required_field">Location</label>
									<input type="text" class="form-control" id="country" name="country" placeholder="Enter Location" required />
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label for="client_name" class="required_field">Client Name</label>
									<input type="text" class="form-control" id="client_name" name="client_name" required placeholder="Enter Client Name" />
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<label for="po_date" class="required_field">PO Date</label>
									<input type="date" class="form-control" id="po_date" name="po_date" required  />
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<label for="delivery_date" class="required_field">Delivery Date</label>
									<input type="date" class="form-control" id="delivery_date" name="delivery_date" required />
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group">
				                    <label for="tpi" class="required_field">TPI</label>
				                    <select name="tpi" id="tpi" class="form-control" required>
				                        <option value="">-- Select option from below --</option>
				                        <option value="Yes">Yes</option>
				                        <option value="No">No</option>
				                    </select>
				                </div>
				            </div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group">
				                    <label for="region" class="required_field">Region</label>
				                    <select name="region" id="region" class="form-control" required>
				                        <option value="">-- Select region from below --</option>
				                        <option value="MH">MH</option>
				                        <option value="WEST">WEST</option>
				                        <option value="SOUTH">SOUTH</option>
				                        <option value="NORTH">NORTH</option>
				                        <option value="EAST">EAST</option>
				                        <option value="EXPORT">EXPORT</option>
				                    </select>
				                </div>
				            </div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group">
									<label for="tpi_agency" class="">TPI Agency</label>
									<input type="text" class="form-control" id="tpi_agency" name="tpi_agency" placeholder="Enter TPI Agency" />
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group">
				                    <label for="attachment" class="">Attachment</label>
				                    <input type="file" class="form-control" id="attachment" name="attachment" />
				                </div>
				            </div>
							<!-- <div class="col-md-3 col-sm-6">
								<div class="form-group">
									<div id="addedfield">
										<input type="hidden" name="index_value" id="index_value">
										<input type="hidden" id="newfieldvalue">
									</div>
									<a class="btn btn-primary" id="ordermodal" style="background-color:#0162e8;color:#FFFFFF">
										Add New Field
									</a>
				                </div>
				            </div> -->
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
								
				                </div>
				            </div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
								
				                </div>
				            </div>
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
										<select class="form-control datatype" id="datatype" name="datatype" onchange="GetSelectedTextValue(this)">
											<option value="">Select Data Type</option>
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
										<input type="date" class="form-control value_date" id="value_date" name="value_date" />
									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="form-group">
									<label class="form-label"><span class="tx-danger"></span></label>
										<a class="form-control value btn btn-primary pd-x-20 addUser" style="background-color:#0162e8;color:#FFFFFF" id="new_field_btn"><i class="fa fa-check-circle"></i></a>
									</div>
								</div>
							</div>
				        </div>
		            </section>

		            <h3>Equipment Details</h3>
		            <section>
		            	<div class="table-responsive">  
			                <table class="table table-bordered field_wrapper" id="dynamic_field-">  
			                    <tr>  
			                        <td>
			                        	<div class="form-row">
				                        	<div class="col-md-6 col-sm-6">
												<div class="form-group">
								                    <label for="equipment_type" class="required_field">Equipment Type</label>
								                    <select name="equipment_type[]" id="equipment_type" class="form-control select2" required>
								                        <option value="">-- Select option from below --</option>
								                        @foreach($equipTypes as $row)
								                        <option value="{{ $row->equipment_type }}" data-type="{{ $row->abbr }}">{{ $row->equipment_type }}</option>
								                        @endforeach
								                    </select>
								                </div>
								            </div>
								            <div class="col-md-6 col-sm-6">
										        <div class="form-group">
													<label for="mfr" class="">MFR Number</label>
													<input type="text" class="form-control disabled" id="mfr" name="mfr[]" required/>
												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label for="equipment_name" class="required_field">Equipment Name</label>
													<input type="text" class="form-control" id="equipment_name" name="equipment_name[]" placeholder="Enter Equipment Name" required/>
												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label for="tag" class="">Tag Number</label>
													<input type="text" class="form-control" id="tag" name="tag[]" placeholder="Enter Tag Number" />
												</div>
											</div>
										</div>
				                    </td>
			                        <td class="align-middle text-center"><div id="add" onclick="addEquipmentField()" class="btn btn-outline-success"><i class="fa fa-plus"></i></div></td>  
			                    </tr>  
			                </table>
			            </div>
		            </section>

		            <h3>Payment Cycles</h3>
		            <section>
		                <div class="form-row">
							<div class="col-md-3 col-sm-12 form-group">
								<label class="form-label required_field">Total Order Amount (in Rs)</label>
								<input type="number" class="form-control" name="order_size" id="order_size" required placeholder="Total Order Amount" />
							</div>
							<!-- <div class="col-md-3 col-sm-12 form-group">
								<label class="form-label">PO Basic Amount </label>
								<input type="number" class="form-control" name="po_amt" id="po_amt" required placeholder="Enter PO Basic Amount" />
							</div> -->
							<div class="col-md-3 col-sm-12 form-group">
								<label class="form-label" for="po_amt_received">PO Amount Received?</label>
								<div class="mt-1">
                                    <label class="ckbox">
                                        <input type="checkbox" name="po_amt_received" id="po_amt_received"><span></span>
                                    </label>
                                </div>
							</div>
							<div class="col-md-3 col-sm-12 form-group">
								<label class="form-label">Tax(%) </label>
								<input type="number" class="form-control" name="tax" id="tax" placeholder="Enter Tax"/>
							</div>
							<!-- <div class="col-md-3 col-sm-12 form-group">
								<label class="form-label">Tax (18%) </label>
								<div class="mt-1">
                                    <label class="ckbox">
                                        <input type="checkbox" name="tax" value="18"><span></span>
                                    </label>
                                </div>
							</div> -->
						</div>
		                <div class="form-row">
							<div class="col-md-6 col-sm-12 form-group">
								<label class="form-label">Payment Terms</label>
								<textarea type="text" class="form-control summernote" name="payment_terms" rows="2"></textarea>
							</div>
						</div>

						<div class="field_wrapper1">
							<div class="form-row mb-2">
								<div class="col-sm-3">
									<div class="form-group mb-sm-0">
										<label class="form-label">Payment Type</label>
										<select class="form-select form-control form-control-lg" name="payment_type[]">
											<option value="Amendment" selected>Amendment</option>
											<option value="Installment">Installment</option>
										</select>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-0">
										<label class="form-label">Amount (in Rs)</label>
										<input type="number" name="amount[]" class="form-control" required/>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group mb-0">
										<label class="form-label">Date</label>
										<input type="date" name="date[]" class="form-control" required/>
									</div>
								</div>
								<div class="col-sm-3">
									<label class="form-label invisible"> <i class="fa fa-question-circle"></i></label>
									<div class="form-group mb-0">
										<div onclick="addPayemntField()" class="btn btn-outline-info" id="add1"><i class="fa fa-plus-circle"></i></div>
									</div>
								</div>
							</div>
						</div>
		            </section>
		        </div>
		    </form>
		</div>
    </div>
@endsection

@section('scripts')
	
	<script>
        $(document).on('change','#equipment_type', function(){
    		var type = $(this).find(':selected').data('type');
    		var mfr = "CDPS-"+type+'-{{date('Y')}}';
    		$('#mfr').val(mfr);
    	});
	</script>

	<script>
		var i = 0;
		var x = 1;
		
    	function addEquipmentField(){
        	var maxField = 100;
	        var addButton = $('#add');
	        var wrapper = $('.field_wrapper');
	        i++;
	        // var x = 1;

	        $(document).on('change','#equipment_type'+i, function(){
	    		var type = $(this).find(':selected').data('type');
	    		var mfr = "CDPS-"+type+'-{{date('Y')}}';
	    		$('#mfr'+i).val(mfr);
	    	});

	        var fieldHTML = '<tr id="row'+i+'" class="dynamic-added"><td><div class="form-row"><div class="col-md-6 col-sm-6"><div class="form-group"><label for="equipment_type'+i+'" class="required_field">Equipment Type</label><select name="equipment_type[]" id="equipment_type'+i+'" class="form-control" required><option value="">-- Select option from below --</option>@foreach($equipTypes as $row)<option value="{{ $row->equipment_type }}" data-type="{{ $row->abbr }}">{{ $row->equipment_type }}</option>@endforeach </select></div></div><div class="col-md-6 col-sm-6"><div class="form-group"><label for="mfr'+i+'" class="">MFR Number</label><input type="text" class="form-control" id="mfr'+i+'" name="mfr[]" required /></div></div><div class="col-md-6 col-sm-6"><div class="form-group"><label for="equipment_name" class="required_field">Equipment Name</label><input type="text" class="form-control" id="equipment_name" name="equipment_name[]" required placeholder="Enter Equipment Name" required /></div></div><div class="col-md-6 col-sm-6"><div class="form-group"><label for="tag" class="">Tag Number</label><input type="text" class="form-control" id="tag" name="tag[]" placeholder="Enter Tag Number"></div></div></div></td><td class="align-middle text-center"><div id="'+i+'" class="btn btn-outline-danger btn_remove" onclick="deleteEquipmentField('+i+')"><i class="fa fa-times"></i></div></td></tr>';

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

	        var fieldHTML1 = '<div id="row'+j+'" class="form-row mb-4"><div class="col-sm-3"><div class="form-group mb-sm-0"><label class="form-label">Payment Type</label><select class="form-select form-control form-control-lg" name="payment_type[]"><option value="Installment">Installment</option><option value="Amendment">Amendment</option></select></div></div><div class="col-sm-3"><div class="form-group mb-0"><label class="form-label">Amount (in Rs) <i class="fa fa-question-circle"></i></label><input type="number" name="amount[]" class="form-control" required=""></div></div><div class="col-sm-3"><div class="form-group mb-0"><label class="form-label">Date <i class="fa fa-question-circle"></i></label><input type="date" name="date[]" class="form-control" required=""></div></div><div class="col-sm-3"><label class="form-label invisible"> <i class="fa fa-question-circle"></i></label><div class="form-group mb-0"><div onclick="deletePaymentField('+j+')" id="'+j+'" class="btn btn-outline-danger btn_remove1"><i class="fa fa-times"></i></div></div></div></div>';

            if(y < maxField1){
                y++;
                $(wrapper1).append(fieldHTML1);
            }
    	}

    	function deletePaymentField(id1){
            $('#row'+id1+'').remove();
            y--;
    	}
		function GetSelectedTextValue(data) {
			var selVal = data.value;
			if(selVal == "Date")
			{
				$('#value_date').show();
				$('#value').hide();
			}
			else
			{
				$('#value_date').hide();
				$('#value').show();
			}
			}
	    // $(document).ready(function(){
	    //     var maxField = 100;
	    //     var addButton = $('#add');
	    //     var wrapper = $('.field_wrapper');
	    //     var i = 0;
	    //     var x = 1;
	        
	    //     $(addButton).click(function(){
	    //     	i++;

		   //      var fieldHTML = '<tr id="row'+i+'" class="dynamic-added"><td><div class="form-row"><div class="col-md-6"><div class="form-group"><label for="equipment_type'+i+'" class="required_field">Equipment Type</label><select name="equipment_type[]" id="equipment_type'+i+'" class="form-control" onchange="equipmentType('+i+',{{$so_num}},{{date('Y')}})" required><option value="">-- Select option from below --</option>@foreach($equipTypes as $row)<option value="{{ $row->equipment_type }}" data-type="{{ $row->abbr }}">{{ $row->equipment_type }}</option>@endforeach </select></div></div><div class="col-md-6"><div class="form-group"><label for="mfr'+i+'" class="">MFR Number</label><input type="text" class="form-control" id="mfr'+i+'" name="mfr[]" /></div></div><div class="col-md-6"><div class="form-group"><label for="equipment_name" class="required_field">Equipment Name</label><input type="text" class="form-control" id="equipment_name" name="equipment_name[]" required placeholder="Enter Equipment Name" /></div></div><div class="col-md-6"><div class="form-group"><label for="tag" class="">Tag Number</label><input type="text" class="form-control" id="tag" name="tag[]" placeholder="Enter Tag Number"></div></div></div></td><td class="align-middle text-center"><button type="button" name="remove" id="'+i+'" class="btn btn-outline-danger btn_remove btn-sm"><i class="fa fa-times"></i> Remove</button></td></tr>';

	    //         if(x < maxField){ 
	    //             x++;
	    //             $(wrapper).append(fieldHTML);
	    //         }
		   //  });
	        
	    //     $(wrapper).on('click', '.btn_remove', function(e){
	    //         e.preventDefault();
	    //         var button_id = $(this).attr("id");
	    //         // $(this).parent('div').remove();
	    //         $('#row'+button_id+'').remove();
	    //         x--;
	    //     });
	    // });

	    $(document).ready(function(){
	        var maxField1 = 100;
	        var addButton1 = $('#add1');
	        var wrapper1 = $('.field_wrapper1');
	        var j = 0;
	        var y = 1;
			$('#value_date').hide();
	        
	        $(addButton1).click(function(){
	        	j++;

		        var fieldHTML1 = '<div id="row'+j+'" class="form-row mb-4"><div class="col-sm-3"><div class="form-group mb-sm-0"><label class="form-label">Type</label><select class="form-select form-control form-control-lg" name="payment_type[]"><option value="Amendment">Amendment</option><option value="Installment" selected>Installment</option></select></div></div><div class="col-sm-3"><div class="form-group mb-0"><label class="form-label">Amount (in Rs) <i class="fa fa-question-circle"></i></label><input type="number" name="amount[]" class="form-control" required=""></div></div><div class="col-sm-3"><div class="form-group mb-0"><label class="form-label">Date <i class="fa fa-question-circle"></i></label><input type="date" name="date[]" class="form-control" required=""></div></div><div class="col-sm-3"><label class="form-label invisible"> <i class="fa fa-question-circle"></i></label><div class="form-group mb-0"><button type="button" id="'+j+'" class="btn btn-outline-danger btn_remove1"><i class="fa fa-times"></i> Remove</button></div></div></div>';

	            if(y < maxField1){ 
	                y++;
	                $(wrapper1).append(fieldHTML1);
	            }
		    });
	        
	        $(wrapper1).on('click', '.btn_remove1', function(e){
	            e.preventDefault();
	            var button_id1 = $(this).attr("id");
	            // $(this).parent('div').remove();
	            $('#row'+button_id1+'').remove();
	            y--;
	        });
	    });
	</script>

	<script>
		var i = 1;
		$(document).ready(function(){
			var form = $("#addOrder");
				form.validate({
					debug: false,
				    errorPlacement: function errorPlacement(error, element) { element.after(error); },
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
							required: true,
						},
						'equipment_name[]': {
							required: true,
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
						'payment_type[]': {
							required : "Please enter payment type",
						},
						'amount[]': {
							required : "Please enter amount",
						},
						'date[]': {
							required : "Please enter date",
						},
					},
					submitHandler: function(form) {
						form.submit();
					},
					invalidHandler: function(event, validator) {
						// 'this' refers to the form
						var errors = validator.numberOfInvalids();
						if (errors) {
							var message = errors == 1
								? 'You missed 1 field. It has been highlighted'
								: 'You missed ' + errors + ' fields. They have been highlighted';
								console.log(message)
							$("div.error span").html(message);
							$("div.error").show();
						} else {
							$("div.error").hide();
						}
					},
					showErrors: function(errorMap, errorList) {
						console.log(errorMap, errorList);
						$("#summary").html("Your form contains "
						+ this.numberOfInvalids()
						+ " errors, see details below.");
						this.defaultShowErrors();
					}
				});
				form.children("div").steps({
				    headerTag: "h3",
				    bodyTag: "section",
				    transitionEffect: "slideLeft",
				    onStepChanging: function (event, currentIndex, newIndex){
				        form.validate().settings.ignore = ":disabled,:hidden";
						console.log(form.valid());
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
			$("div#newfield").hide();
			$("div#addedfield").hide();
			$("#ordermodal").click(function(){
				$("div#newfield").show();
				
			});
			
			
			$("#new_field_btn").click(function(){
				
				var label = $(".label").val();
				var datatype = $(".datatype").val();
				var value = $(".value").val();	
				var value_date = $(".value_date").val();
				if(value_date)
				{
					value = value_date;
				}
				var url =  "{{url('/')}}";
				
				if(label && datatype && value)
				{
					
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
								var fieldHTML = '<td><div class="row mg-b-20 mt-2 mg-10"><div class="col-md-3 col-sm-6"><div class="form-group"><label class="" id="label_field">'+data['data'][1]+'</label><input type="text" class="form-control" id="field" name="field" style="width:200px" value="'+data['data'][3]+'" required /></div></div></div></td>';
								$("div#addedfield").show();
								$("div#addedfield").append(fieldHTML);
								$('#index_value').val(i);
								i++;
							}
							$('#label').val('');
							$('#datatype').val('');
							$('#value').val('');
							$('#value_date').val('');
							$("div#newfield").hide();
							
						}
					});
				
			}
				else
				{
					alert("please fill label,datatype,value");
				}

			});
			});
	</script>
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/form-validation.js')}}"></script>
    {{-- <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script> --}}

	<script src="{{asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
	<script src="{{asset('assets/js/form-wizard.js')}}"></script>
	
	
@endsection