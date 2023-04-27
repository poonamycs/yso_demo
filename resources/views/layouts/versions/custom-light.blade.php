<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="SO">
		<meta name="Author" content="YCS">
		<meta name="Keywords" content=""/>

		<!-- Title -->
		<title> @if(!empty($meta_title)){{ $meta_title }} @else YSO Login @endif </title>

        @include('layouts.custom-styles')

    </head>

	<body class="">
		@include('sweetalert::alert')
		
		@yield('class')

        <!-- Loader -->
		<div id="global-loader">
			<img src="{{asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- Page -->
		<div class="page">

                @yield('content')

            </div>
            <!-- Container closed -->
        </div>

        @include('layouts.custom-scripts')

	</div>

    </body>
</html>
