<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Author" content="ycs">

		<!-- Title -->
        <title>@if(!empty($meta_title)){{ $meta_title }} @else YSO Admin Dashboard @endif</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="Keywords" content="ycs"/>
		<meta name="Description" content="ycs">
        <!-- Favicon -->
        <link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/x-icon"/>

        @include('layouts.horizontal.styles')

    </head>

    <body class="main-body app sidebar-mini">
        @include('sweetalert::alert')
        
        <!-- Loader -->
		<div id="global-loader">
			<img src="{{asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- Page -->
		<div class="page">

        <!-- main-header -->
        @include('layouts.horizontal.main-header')
        <!-- main-header -->

        <!-- main-header -->
        @include('layouts.horizontal.centerlogo-header')
        <!--/main-header -->

        <!-- main-header -->
        @include('layouts.horizontal.horizontal-main')
        <!--/main-header -->

        <!-- main-content opened -->
        <div class="main-content horizontal-content">
            <div class="container-fluid" style="background-image: url({{asset('images/bg.png')}}); background-size: cover">
                @yield('content')
            </div>
            <!-- Container closed -->
        </div>
        <!-- main-content closed -->

        @include('layouts.sidebar-right')

        @include('layouts.footer')

        @yield('modal')

        </div>

        @include('layouts.horizontal.scripts')

    </body>
</html>
