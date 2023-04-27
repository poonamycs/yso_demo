<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Valex – Laravel Admin & Dashboard Template">
		<meta name="Author" content="SPRUKO™">
		<meta name="Keywords" content="laravel admin panel, laravel admin panel template, laravel admin dashboard template, laravel bootstrap admin template, laravel ui, laravel dashboard, laravel dashboard template, admin, admin template, bootstrap dashboard, bootstrap 5 admin template, laravel blade, laravel blade template bootstrap, php laravel, laravel mix"/>

		<!-- Title -->
		<title> Valex – Laravel Admin & Dashboard Template </title>
        
        @include('layouts.horizontal.styles')
        
    </head>

    <body class="main-body app sidebar-mini dark-theme">

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

            <div class="container">

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
