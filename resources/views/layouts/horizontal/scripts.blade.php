		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

		<!-- Jquery js-->
		<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

		<!-- Bootstrap js-->
		<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

		<!-- Ionicons js-->
		<script src="{{asset('assets/plugins/ionicons/ionicons.js')}}"></script>

		<!-- Moment js -->
		<script src="{{asset('assets/plugins/moment/moment.js')}}"></script>

		<!-- P-scroll js -->
		<script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
		<script src="{{asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>

		<!-- Rating js-->
		<script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>
		<script src="{{asset('assets/plugins/rating/jquery.barrating.js')}}"></script>

		<!-- Custom Scroll bar Js-->
		<script src="{{asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

		<!-- Horizontalmenu js-->
		<script src="{{asset('assets/plugins/horizontal-menu/horizontal-menu-2/horizontal-menu.js')}}"></script>

				<!-- Sticky js -->
		<script src="{{asset('assets/js/sticky.js')}}"></script>

		<!-- Right-sidebar js -->
		<script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>
		<script src="{{asset('assets/plugins/sidebar/sidebar-custom.js')}}"></script>

		<!-- eva-icons js -->
		<script src="{{asset('assets/plugins/eva-icons/eva-icons.min.js')}}"></script>

		@yield('scripts')
		
		<!-- custom js -->
		<script src="{{asset('assets/js/custom.js')}}"></script>
		<script src="{{asset('assets/js/jquery.validate.js')}}"></script>
		<script src="{{asset('assets/js/sweetalert-dev.js')}}"></script>
		{{-- <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script> --}}
		{{-- <script src="{{asset('assets/js/form-validation.js')}}"></script> --}}

		<script src="{{asset('assets/js/summernote.min.js')}}"></script>
		<script>
		    $(document).ready(function() {
		        $('#summernote').summernote();
		    });
  		</script>
  		<script>
	  		$(document).ready(function() {
				$('.summernote').summernote({
				  toolbar: [
				    // [groupName, [list of button]]
				    ['style', ['bold', 'italic', 'underline', 'clear']],
				    ['font', ['strikethrough']],
				    ['para', ['ul', 'ol']],
				  ]
				});
			});
		</script>