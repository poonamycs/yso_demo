(()=>{function e(t){return e="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},e(t)}$((function(){"use strict";$("#global-loader").fadeOut("slow"),window.matchMedia("(min-width: 992px)").matches&&($(".main-navbar .active").removeClass("show"),$(".main-header-menu .active").removeClass("show")),$(".main-header .dropdown > a").on("click",(function(e){e.preventDefault(),$(this).parent().toggleClass("show"),$(this).parent().siblings().removeClass("show"),$(this).find(".drop-flag").removeClass("show")})),$(".country-flag1").on("click",(function(e){$(this).parent().toggleClass("show"),$(".main-header .dropdown > a").parent().siblings().removeClass("show")})),$(document).on("click",".full-screen",(function(){$("html").addClass("fullscreen-button"),void 0!==document.fullScreenElement&&null===document.fullScreenElement||void 0!==document.msFullscreenElement&&null===document.msFullscreenElement||void 0!==document.mozFullScreen&&!document.mozFullScreen||void 0!==document.webkitIsFullScreen&&!document.webkitIsFullScreen?document.documentElement.requestFullScreen?document.documentElement.requestFullScreen():document.documentElement.mozRequestFullScreen?document.documentElement.mozRequestFullScreen():document.documentElement.webkitRequestFullScreen?document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT):document.documentElement.msRequestFullscreen&&document.documentElement.msRequestFullscreen():($("html").removeClass("fullscreen-button"),document.cancelFullScreen?document.cancelFullScreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitCancelFullScreen?document.webkitCancelFullScreen():document.msExitFullscreen&&document.msExitFullscreen())}));function t(){var e=$('.main-header form[role="search"].active');e.find("input").val(""),e.removeClass("active")}$(".rating-stars").ratingStars({selectors:{starsSelector:".rating-stars",starSelector:".rating-star",starActiveClass:"is--active",starHoverClass:"is--hover",starNoHoverClass:"is--no-hover",targetFormElementSelector:".rating-value"}}),$(".cover-image").each((function(){var t=$(this).attr("data-bs-image-src");"undefined"!==e(t)&&!1!==t&&$(this).css("background","url("+t+") center center")})),$(".toast").toast(),$(window).on("scroll",(function(e){$(window).scrollTop()>=66?$("main-header").addClass("fixed-header"):$(".main-header").removeClass("fixed-header")})),$('body, .main-header form[role="search"] button[type="reset"]').on("click keyup",(function(e){(27==e.which&&$('.main-header form[role="search"]').hasClass("active")||"reset"==$(e.currentTarget).attr("type"))&&t()})),$(document).on("click",'.main-header form[role="search"]:not(.active) button[type="submit"]',(function(e){e.preventDefault();var t=$(this).closest("form"),n=t.find("input");t.addClass("active"),n.focus()})),$(document).on("click",'.main-header form[role="search"].active button[type="submit"]',(function(e){e.preventDefault();var n=$(this).closest("form").find("input");$("#showSearchTerm").text(n.val()),t()})),$(".main-navbar .with-sub").on("click",(function(e){e.preventDefault(),$(this).parent().toggleClass("show"),$(this).parent().siblings().removeClass("show")})),$(".dropdown-menu .main-header-arrow").on("click",(function(e){e.preventDefault(),$(this).closest(".dropdown").removeClass("show")})),$("#mainNavShow, #azNavbarShow").on("click",(function(e){e.preventDefault(),$("body").addClass("main-navbar-show")})),$("#mainContentLeftShow").on("click touch",(function(e){e.preventDefault(),$("body").addClass("main-content-left-show")})),$("#mainContentLeftHide").on("click touch",(function(e){e.preventDefault(),$("body").removeClass("main-content-left-show")})),$("#mainContentBodyHide").on("click touch",(function(e){e.preventDefault(),$("body").removeClass("main-content-body-show")})),$("body").append('<div class="main-navbar-backdrop"></div>'),$(".main-navbar-backdrop").on("click touchstart",(function(){$("body").removeClass("main-navbar-show")})),$(document).on("click touchstart",(function(e){(e.stopPropagation(),$(e.target).closest(".main-header .dropdown").length||$(".main-header .dropdown").removeClass("show"),window.matchMedia("(min-width: 992px)").matches)?($(e.target).closest(".main-navbar .nav-item").length||$(".main-navbar .show").removeClass("show"),$(e.target).closest(".main-header-menu .nav-item").length||$(".main-header-menu .show").removeClass("show"),$(e.target).hasClass("main-menu-sub-mega")&&$(".main-header-menu .show").removeClass("show")):$(e.target).closest("#mainMenuShow").length||$(e.target).closest(".main-header-menu").length||$("body").removeClass("main-header-menu-show")})),$("#mainMenuShow").on("click",(function(e){e.preventDefault(),$("body").toggleClass("main-header-menu-show")})),$(".main-header-menu .with-sub").on("click",(function(e){e.preventDefault(),$(this).parent().toggleClass("show"),$(this).parent().siblings().removeClass("show")})),$(".main-header-menu-header .close").on("click",(function(e){e.preventDefault(),$("body").removeClass("main-header-menu-show")})),$(".card-header-right .card-option .fe fe-chevron-left").on("click",(function(){var e=$(this);e.hasClass("icofont-simple-right")?e.parents(".card-option").animate({width:"35px"}):e.parents(".card-option").animate({width:"180px"}),$(this).toggleClass("fe fe-chevron-right").fadeIn("slow")}));[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map((function(e){return new bootstrap.Tooltip(e)})),[].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map((function(e){return new bootstrap.Popover(e)}));eva.replace(),$(document).ready((function(){$(".horizontalMenu-list li a").each((function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&($(this).addClass("active"),$(this).parent().addClass("active"),$(this).parent().parent().prev().addClass("active"),$(this).parent().parent().prev().click())}))})),$(document).ready((function(){$(".horizontalMenu-list li a").each((function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&($(this).addClass("active"),$(this).parent().addClass("active"),$(this).parent().parent().prev().addClass("active"),$(this).parent().parent().prev().click())})),$(".horizontal-megamenu li a").each((function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&($(this).addClass("active"),$(this).parent().addClass("active"),$(this).parent().parent().parent().parent().parent().parent().parent().prev().addClass("active"),$(this).parent().parent().prev().click())})),$(".horizontalMenu-list .sub-menu .sub-menu li a").each((function(){var e=window.location.href.split(/[?#]/)[0];this.href==e&&($(this).addClass("active"),$(this).parent().addClass("active"),$(this).parent().parent().parent().parent().prev().addClass("active"),$(this).parent().parent().prev().click())}))}));var n=$("#back-to-top");$(window).scroll((function(){$(window).scrollTop()>300?$("#back-to-top").fadeIn():$("#back-to-top").fadeOut()})),n.on("click",(function(e){e.preventDefault(),$("html, body").animate({scrollTop:0},"300")}))}))})();


$(function(){
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

$(document).ready(function () {

	$(document).ready(function(){
	    var maxField = 30;
	    var addButton = $('.add_button');
	    var wrapper = $('.field_wrapper');
	    var fieldHTML = '<div class="d-flex mt-2"><input type="text" class="form-control col-md-6" id="equipment_name" name="stage[]" placeholder="Enter Equipment Stage" /><input type="text" class="form-control col-md-4 ml-1" id="stage" name="days[]" placeholder="Task Duration (in Days)" required /><a href="javascript:void(0);" class="remove_button nounderline"> &nbsp;&nbsp;<button type="button" class="btn btn-outline-danger"><i class="fa fa-times"></i> Remove</button></a></div>';
	    var x = 1;
	    
	    //Once add button is clicked
	    $(addButton).click(function(){
	        if(x < maxField){ 
	            x++;
	            $(wrapper).append(fieldHTML);
	        }
	    });
	    
	    //Once remove button is clicked
	    $(wrapper).on('click', '.remove_button', function(e){
	        e.preventDefault();
	        $(this).parent('div').remove();
	        x--;
	    });
	});

	$("#show-pass").click(function() {
		$(this).toggleClass("fa-eye-slash fa-eye");
		var input = $($(this).attr("toggle"));
		if(input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});

	$("#current_pwd").keyup(function(){
		var current_pwd = $("#current_pwd").val();
		$.ajax({
			type:'get',
			url:'/check-pwd',
			data:{current_pwd:current_pwd},
			beforeSend:function(resp){
				$("#chkPwd").html("<label>checking...</label>");
			},
			success:function(resp){
				// alert(resp);
				if(resp=="false"){
					$("#chkPwd").html("<label class='text-danger'>Current password is incorrect</label>");
				}else if(resp=="true"){
					$("#chkPwd").html("<label class='text-success'>Current password is correct</label>");
				}
			},
			error:function(){
				$("#chkPwd").html("<label class='text-danger'>Couldn't update password. Try again in some time</label>");
			}
		});
	});

	$("#editcycle").validate({
		rules:{
			payment_type:{
				required:true,
			},
			amount:{
				required:true,
				number:true,
			},
			date:{
				required:true,
			},
			remark:{
				required:true,
			},
		},
	});

	$("#loginForm").validate({
		rules:{
			email:{
				required:true,
				email: true,
			},
			password:{
				required:true,
			},
		},
		messages:{
			email:{ 
				email: "Please enter valid email",
			},
		},
		submitHandler: function(form) {
            $(".loginbtn").attr("disabled", true);
            form.submit();
        }
	});
	
	$("#addUser").validate({
		rules:{
			name:{
				required:true,
				number: false
			},
			email:{
				required:true,
				email: true,
			},
			image:{
				accept: "jpg|jpeg|png"
			},
			role:{
				required:true,
			},
			password:{
				required:true,
				minlength: 6,
			},
		},
		messages:{
			name:{ 
				required: "Please enter name",
			},
			email:{ 
				required: "Please enter email",
				email: "Please enter valid email",
			},
			password:{ 
				required:"Please enter password. ",	
			},
			role:{ 
				required:"Please select role. ",	
			},
			image:{ 
				required:"Please select image. ",	
			},
		},
		submitHandler: function(form) {
            $(".addUser").attr("disabled", true);
            form.submit();
        }
	});

	$("#password_validate").validate({
		rules: {
			current_pwd:{
				required: true,
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20,
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd",
			},
		},
		messages: {
			current_pwd:{ 
				required:"Please enter current password",
			},
			new_pwd:{
				required: "Please enter new password",
				email: "Please enter valid email",
			},
			confirm_pwd:{ 
				required:"Please enter confirm password",
				minlength:"Password must be between 6 to 20 characters",
				maxlength:"Password must be between 6 to 20 characters",
				equalTo:"Please enter same password as above",
			},
		},
	});

	$("#addOrder_old").validate({
		rules: {
			so: "required",
			client_name: {
				required: true,
				minlength: 7,
				maxlength: 70,
			},
			po: {
				required: true,
			},
			po_date: "required",
			delivery_date: "required",
			tpi: "required",
			tpi_agency: {
				required: false,
				maxlength: 70,
			},
			drawing_approved: "required",
			'equipment_type[]': "required",
			'equipment_name[]': "required",
			'tag[]': {
				required: false,
			},
		},
		messages: {
			so: "Please enter SO number",
			client_name: {
				required : "Please enter client name",
				minlength : "Client name should be 7 to 70 characters long",
				maxlength : "Client name should be 7 to 70 characters long",
			},
			po: {
				required : "Please enter PO number",
			},
			po_date: "Please enter po date",
			delivery_date: "Please enter delivery date",
			tpi: "Please select option",
			tpi_agency: {
				required : "Not mandatory field",
				maxlength : "Max length is 70 charcters",
			},
			drawing_approved: "Please select option",
			'equipment_type[]': "Please select equipment type",
			'equipment_name[]': "Please enter equipment name",
			'tag[]': {
				required : "Please enter tag number",
			},
		},
	});

	$("#addEnquiry").validate({
		rules: {
			customer_name: {
				required: true,
			},
			city: {
				required: true,
			},
			region: "required",
			enq_date: "required",
			engineer: "required",
			description: "required",
			price: {
				required: false,
				number: true,
			},
			contact_person: "required",
			email: {
				required: false,
				email: true,
			},
			phone: {
				required: false,
				minlength:9,
				maxlength:15,
			},
		},
		messages: {
			customer_name: {
				required : "* Required field",
			},
			city: {
				required : "* Required field",
			},
			region: "* Required field",
			enq_date: "* Required field",
			engineer: "* Required field",
			description: "* Required field",
			price: {
				required : "* Required field",
				number : "Please enter valid number",
			},
			contact_person: "* Required field",
			email: {
				required : "* Required field",
				email : "Please enter valid email",
			},
			phone: {
				required : "* Required field",						
				number : "Please enter numbers only",						
				minlength: "Please enter valid number",
				maxlength: "Please enter valid number",
			},
		},
		submitHandler: function(form) {
            $(".addEnq").attr("disabled", true);
            form.submit();
        }
	});

	$("#editEnquiry").validate({
		rules: {
			customer_name: {
				required: true,
			},
			city: {
				required: true,
			},
			region: "required",
			enq_date: "required",
			engineer: "required",
			description: "required",
			price: {
				required: false,
				number: true,
			},
			contact_person: "required",
			email: {
				required: false,
				email: true,
			},
			phone: {
				required: false,
				minlength:9,
				maxlength:15,
			},
		},
		messages: {
			customer_name: {
				required : "* Required field",
			},
			city: {
				required : "* Required field",
			},
			region: "* Required field",
			enq_date: "* Required field",
			engineer: "* Required field",
			description: "* Required field",
			price: {
				required : "* Required field",
				number : "Please enter valid number",
			},
			contact_person: "* Required field",
			email: {
				required : "* Required field",
				email : "Please enter valid email",
			},
			phone: {
				required : "* Required field",
				minlength: "Please enter valid number",
				maxlength: "Please enter valid number",
			},
		},
		submitHandler: function(form) {
            $(".editEnq").attr("disabled", true);
            form.submit();
        }
	});

	$("#editEnquiry-old").validate({
		rules: {
			customer_name: {
				required: true,
			},
			city: "required",
			region: "required",
			enq_date: "required",
			qte_date: "required",
			engineer: "required",					
			price: "required",
			status: "required",
			contact_person: "required",
			email: {
				required: true,
				email: true,
			},
			phone: {
				required: true,
				number: true,
				minlength:10,
				maxlength:10,
			},
		},
		messages: {
			customer_name: {
				required : "* Required field",
			},
			city: "* Required field",
			region: "* Required field",
			enq_date: "* Required field",
			qte_date: "* Required field",
			engineer: "* Required field",					
			price: "* Required field",
			status: "* Required field",
			contact_person: "* Required field",
			email: {
				required : "* Required field",
				email : "Please enter valid email",
			},
			phone: {
				required : "* Required field",						
				number : "Please enter numbers only",						
				minlength: "Please enter valid number",
				maxlength: "Please enter valid number",
			},
		},
	});

	$("#editOrder").validate({
		rules: {
			client_name: {
				required: true,
				number: false,
			},
			po: {
				required: true,
				text: false,
			},
			po_date: "required",
			delivery_date: "required",
			tpi: "required",
			drawing_approved: "required",
			equipment_type: "required",
			equipment_name: "required",
		},
		messages: {
			client_name: {
				required : "Please enter client name",
				number : "Please enter characters only",
			},
			po: {
				required : "Please enter PO number",
				text : "Please enter numbers only",
			},
			po_date: "Please enter po date",
			tpi: "Please select option",
			drawing_approved: "Please select option",
			equipment_type: "Please select equipment type",
		},
	});

	$("#addStagesForm").validate({
		rules: {
			equipment_name: {
				required: true,
			},
			'stage[]': {
				required: true,
			},
			'days[]': {
				required: true,
			},
		},
		messages: {
			equipment_name: {
				required : "Please enter equipment name",
			},
			'stage[]': {
				required : "Please enter stage name",
			},
			'days[]': {
				required : "Please enter task duration",
			},
		},
	});

	// delete
	$(document).on('click','.deleteBtn',function(e){
	    var id = $(this).attr('rel');
	    var deleteFunction = $(this).attr('rel1');
	    swal({
			title: "Are you sure?",
			text: "You will not be able to recover this record again!",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: "Yes, Delete it!",
			confirmButtonColor: '#ff4b4b',
	    }, function(){
	        window.location.href = "/"+deleteFunction+"/"+id;
	    });
	});

	// delete equipment stage
	$(document).on('click','.deleteStage',function(e){
	    var id = $(this).attr('rel');
	    var deleteFunction = $(this).attr('rel1');
	    swal({
	      	title: "Are you sure?",
			text: "You will not be able to recover this record again!",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: "Yes, Delete it!",
			confirmButtonColor: '#ff4b4b',
	    },
	    function(){
	        window.location.href="/"+deleteFunction+"/"+id;
	    });
	});

	// delete Order
	$(document).on('click','.deleteOrder',function(e){
	    var id = $(this).attr('rel');
	    var deleteFunction = $(this).attr('rel1');
	    swal({
	      title: "Are you sure?",
	      text: "You will not be able to recover this Record Again!",
	      type: "warning",
	      showCancelButton: true,
	      confirmButtonClass: "btn-danger",
	      confirmButtonText: "Yes, delete it!",
	      confirmButtonColor: '#ff4b4b',
	    },
	    function(){
	        window.location.href="/"+deleteFunction+"/"+id;
	    });
	});

	// delete Equipment
	$(document).on('click','.deleteEquipment',function(e){
	    var id = $(this).attr('rel');
	    var deleteFunction = $(this).attr('rel1');
	    swal({
	      title: "Are you sure?",
	      text: "You will not be able to recover this Record Again!",
	      type: "warning",
	      showCancelButton: true,
	      confirmButtonClass: "btn-danger",
	      confirmButtonText: "Yes, Remove it!",
	      confirmButtonColor: '#ff4b4b',
	    },
	    function(){
	        window.location.href="/"+deleteFunction+"/"+id;
	    });
	});

	// delete stage attachment
	$(document).on('click','.deleteStageAttachment',function(e){
	    var id = $(this).attr('rel');
	    // alert(id);
	    var deleteFunction = $(this).attr('rel1');
	    swal({
	      title: "Are you sure?",
	      text: "You will not be able to recover this Record Again!",
	      type: "warning",
	      showCancelButton: true,
	      confirmButtonClass: "btn-danger",
	      confirmButtonText: "Yes, delete it!",
	    },
	    function(){
	        window.location.href="/"+deleteFunction+"/"+id;
	    });
	});

	// delete stage attachment
	$(document).on('click','.deleteEquipmentType',function(e){
	    var id = $(this).attr('rel');
	    // alert(id);
	    var deleteFunction = $(this).attr('rel1');
	    swal({
	      title: "Are you sure?",
	      text: "You will not be able to recover this Record Again!",
	      type: "warning",
	      showCancelButton: true,
	      confirmButtonClass: "btn-danger",
	      confirmButtonText: "Yes, delete it!",
	    },
	    function(){
	        window.location.href="/"+deleteFunction+"/"+id;
	    });
	});

	// delete enquiry attachment
	$(document).on('click','.deleteEnquiry',function(e){
	    var id = $(this).attr('rel');
	    var deleteFunction = $(this).attr('rel1');
	    swal({
	      title: "Are you sure?",
	      text: "You will not be able to recover this Record Again!",
	      type: "warning",
	      showCancelButton: true,
	      confirmButtonClass: "btn-danger",
	      confirmButtonText: "Yes, delete it!",
	    },
	    function(){
	        window.location.href="/"+deleteFunction+"/"+id;
	    });
	});

	// delete engineer attachment
	$(document).on('click','.deleteEngineer',function(e){
	    var id = $(this).attr('rel');
	    var deleteFunction = $(this).attr('rel1');
	    swal({
	      title: "Are you sure?",
	      text: "You will not be able to recover this Record Again!",
	      type: "warning",
	      showCancelButton: true,
	      confirmButtonClass: "btn-danger",
	      confirmButtonText: "Yes, delete it!",
	    },
	    function(){
	        window.location.href="/"+deleteFunction+"/"+id;
	    });
	});
});    