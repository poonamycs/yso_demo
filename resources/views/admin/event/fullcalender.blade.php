
<!DOCTYPE html>
<html>
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
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    @include('layouts.horizontal.styles')
    <!-- Loader -->
		<div id="global-loader">
			<img src="{{asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- Page -->
		<div class="page">

    <!-- main-header opened -->
<div class="main-header nav nav-item hor-header">
	<div class="container" style="max-width:1200px">
		<div class="main-header-left ">
			<a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a><!-- sidebar-toggle-->
			<a class="header-brand" href="{{url('dashboard')}}">
				<img src="{{asset('assets/img/brand/logo-white.png')}}" class="desktop-dark">
				<img src="{{asset('assets/logo.png')}}" class="desktop-logo">
				<img src="{{asset('assets/img/brand/favicon.png')}}" class="desktop-logo-1">
				<img src="{{asset('assets/img/brand/favicon-white.png')}}" class="desktop-logo-dark">
			</a>
			<div class="main-header-center  ms-4">
				<!-- <div>
					<input class="form-control" placeholder="Search for anything..." type="search"><button class="btn"><i class="fe fe-search"></i></button>
				</div> -->
				<div>
					<!-- <a href="{{url('add-order')}}" class="btn btn-sm btn-primary"> <i class="fa fa-plus-circle"></i></a> -->
				</div>
			</div>
		</div>
		<div class="main-header-right">
			<ul class="nav nav-item  navbar-nav-right ms-auto">
				@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('1', json_decode(Auth::guard('admin')->User()->role->permissions)))
				<li class="nav-item fullscreen-button">
					<a style="border-color:#0D4C99;color:#0D4C99;height:35px;font-size:13px;font-weight:500" class="btn btn-outline-primary btn-sm nav-link" href="{{url('add-order')}}"><i class="fa fa-plus-circle"></i> Add Order</a>
				</li>
				@endif
				@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('10', json_decode(Auth::guard('admin')->User()->role->permissions)))
				<li class="nav-item fullscreen-button">
					<a style="border-color:#0D4C99;color:#0D4C99;height:35px;font-size:0.8rem;font-weight:500" class="btn btn-outline-primary btn-sm nav-link" href="{{url('view-enquiry-logs')}}"><i class="fa fa-tasks"></i> Enquiry Logs</a>
				</li>
				@endif
				<li class="nav-item  fullscreen-button">
					<a class="new nav-link full-screen-link text-muted" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Reload" href="javascript:void" onclick="window.location.reload();"><svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1459 11.0499L12.9716 9.05752L15.3462 8.84977C14.4471 7.98322 13.2242 7.4503 11.8769 7.4503C9.11547 7.4503 6.87689 9.68888 6.87689 12.4503C6.87689 15.2117 9.11547 17.4503 11.8769 17.4503C13.6977 17.4503 15.2911 16.4771 16.1654 15.0224L18.1682 15.5231C17.0301 17.8487 14.6405 19.4503 11.8769 19.4503C8.0109 19.4503 4.87689 16.3163 4.87689 12.4503C4.87689 8.58431 8.0109 5.4503 11.8769 5.4503C13.8233 5.4503 15.5842 6.24474 16.853 7.52706L16.6078 4.72412L18.6002 4.5498L19.1231 10.527L13.1459 11.0499Z" fill="currentColor" /></svg></a>
				</li>
				<li class="nav-link" id="bs-example-navbar-collapse-1">
					<form class="navbar-form" role="search">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search">
							<span class="input-group-btn">
								<button type="reset" class="btn btn-default">
									<i class="fas fa-times"></i>
								</button>
								<button type="submit" class="btn btn-default nav-link resp-btn">
									<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
								</button>
							</span>
						</div>
					</form>
				</li>
				<li class="dropdown nav-item main-header-notification">
					<a class="new nav-link" href="#">
					<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class=" pulse"></span></a>
					<div class="dropdown-menu">
						<div class="menu-header-content pt-3 pb-3 bg-primary text-start">
							<div class="d-flex">
								<h6 class="dropdown-title mb-0 tx-15 text-white fw-semibold">Notifications</h6>
								<!-- <span class="badge rounded-pill bg-warning ms-auto my-auto float-end">Mark All Read</span> -->
							</div>
							<!-- <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have 4 unread Notifications</p> -->
						</div>
						<div class="main-notification-list Notification-scroll">
							@foreach(App\Models\Notification::where('isread',0)->get() as $notify)
							<a class="d-flex p-3 border-bottom" href="{{url($notify->url)}}">
								<div class="notifyimg bg-pink">
									<i class="la la-file-alt text-white"></i>
								</div>
								<div class="ms-3">
									<h5 class="notification-label mb-1">{{$notify->title}}</h5>
									<div class="notification-subtext">{{$notify->updated_at->diffForHumans()}}</div>
								</div>
								<div class="ms-auto" >
									<i class="las la-angle-right text-end text-muted"></i>
								</div>
							</a>
							@endforeach
						</div>
						<div class="dropdown-footer">
							<a href="">VIEW ALL</a>
						</div>
					</div>
				</li>
				<li class="nav-item full-screen fullscreen-button">
					<a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 28 28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
				</li>
				<li class="dropdown main-profile-menu nav nav-item nav-link">
					<a class="profile-user d-flex" href="">
						@if(Auth::guard('admin')->User()->image)
						<img class="border" src="{{asset('assets/img/user/'.Auth::guard('admin')->User()->image)}}" />
						@else
						<div class="avatar avatar-md bg-info"> {{mb_substr(ucfirst(Auth::guard('admin')->User()->name) , 0, 1)}} </div>
						@endif
					</a>
					<div class="dropdown-menu">
						<div class="main-header-profile bg-primary p-3">
							<div class="d-flex wd-100p">
								<div class="main-img-user">
									@if(Auth::guard('admin')->User()->image)
									<img class="border bg-white" src="{{asset('assets/img/user/'.Auth::guard('admin')->User()->image)}}" />
									@else
									<div class="avatar avatar-md bg-info rounded-circle"> {{mb_substr(ucfirst(Auth::guard('admin')->User()->name) , 0, 1)}} </div>
									@endif
								</div>
								<div class="ms-3 my-auto">
									<h6>{{ Auth::guard('admin')->User()->name }}</h6><span class="font-weight-bold">@if(Auth::guard('admin')->User()->admin_role == 'Superadmin') Superadmin @else {{ Auth::guard('admin')->User()->role->name }}@endif</span>
								</div>
							</div>
						</div>
						<a class="dropdown-item" href="{{url('profile')}}"><i class="bx bx-user-circle"></i>Account</a>
						@if(Auth::guard('admin')->User()->admin_role == 'Superadmin')
						<a class="dropdown-item" href="{{url('settings')}}"><i class="bx bx-cog"></i> Settings</a>
						@endif
						<!-- <a class="dropdown-item" href="{{url('mail-compose')}}"><i class="bx bx-envelope"></i>Messages</a> -->
						<!-- <a class="dropdown-item" href="{{url('mail-settings')}}"><i class="bx bx-slider-alt"></i> Account Settings</a> -->
						<a class="dropdown-item" href="{{url('change-password')}}"><i class="bx bx-lock-open"></i> Change Password</a>
						<a class="dropdown-item" href="{{url('logout')}}"><i class="bx bx-log-out"></i> Sign Out</a>
					</div>
				</li>
				<!-- <li class="dropdown main-header-message right-toggle">
					<a class="nav-link pe-0" data-bs-toggle="sidebar-right" data-bs-target=".sidebar-right">
						<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
					</a>
				</li> -->
			</ul>
		</div>
	</div>
</div>

    @include('layouts.horizontal.centerlogo-header')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0-rc.2/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/css/bootstrap-colorpicker.min.css" />
</head>
<div class="sticky">
	<div class="horizontal-main hor-menu clearfix side-header">
		<div class="horizontal-mainwrapper container clearfix" style="max-width:1200px;">
			<nav class="horizontalMenu clearfix">
				<ul class="horizontalMenu-list" >
					<li aria-haspopup="true"><a href="{{url('dashboard')}}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg>Dashboard</a></li>
					@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('9', json_decode(Auth::guard('admin')->User()->role->permissions)) && in_array('10', json_decode(Auth::guard('admin')->User()->role->permissions)))
					<li aria-haspopup="true"><a href="#" class="sub-icon"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" class="side-menu__icon" viewBox="0 0 24 24" ><g><rect fill="none"/></g><g><g/><g><path d="M21,5c-1.11-0.35-2.33-0.5-3.5-0.5c-1.95,0-4.05,0.4-5.5,1.5c-1.45-1.1-3.55-1.5-5.5-1.5S2.45,4.9,1,6v14.65 c0,0.25,0.25,0.5,0.5,0.5c0.1,0,0.15-0.05,0.25-0.05C3.1,20.45,5.05,20,6.5,20c1.95,0,4.05,0.4,5.5,1.5c1.35-0.85,3.8-1.5,5.5-1.5 c1.65,0,3.35,0.3,4.75,1.05c0.1,0.05,0.15,0.05,0.25,0.05c0.25,0,0.5-0.25,0.5-0.5V6C22.4,5.55,21.75,5.25,21,5z M3,18.5V7 c1.1-0.35,2.3-0.5,3.5-0.5c1.34,0,3.13,0.41,4.5,0.99v11.5C9.63,18.41,7.84,18,6.5,18C5.3,18,4.1,18.15,3,18.5z M21,18.5 c-1.1-0.35-2.3-0.5-3.5-0.5c-1.34,0-3.13,0.41-4.5,0.99V7.49c1.37-0.59,3.16-0.99,4.5-0.99c1.2,0,2.4,0.15,3.5,0.5V18.5z"/><path d="M11,7.49C9.63,6.91,7.84,6.5,6.5,6.5C5.3,6.5,4.1,6.65,3,7v11.5C4.1,18.15,5.3,18,6.5,18 c1.34,0,3.13,0.41,4.5,0.99V7.49z" opacity=".3"/></g><g><path d="M17.5,10.5c0.88,0,1.73,0.09,2.5,0.26V9.24C19.21,9.09,18.36,9,17.5,9c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,10.69,16.18,10.5,17.5,10.5z"/><path d="M17.5,13.16c0.88,0,1.73,0.09,2.5,0.26V11.9c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,13.36,16.18,13.16,17.5,13.16z"/><path d="M17.5,15.83c0.88,0,1.73,0.09,2.5,0.26v-1.52c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,16.02,16.18,15.83,17.5,15.83z"/></g></g></svg> Enquiry Log Sheet<i class="fe fe-chevron-down horizontal-icon"></i></a>
						<ul class="sub-menu">
							@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('9', json_decode(Auth::guard('admin')->User()->role->permissions)))
							<li><a href="{{url('add-enquiry')}}" class="slide-item">Add New Enquiry</a></li>
							@endif
							@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('10', json_decode(Auth::guard('admin')->User()->role->permissions)))
							<li><a href="{{url('view-enquiry-logs')}}" class="slide-item">View Enquiry Logs</a></li>
							@else
							<li aria-haspopup="true"><a href="javascript:void(0)" class="slide-item opacity-75 pe-none">View Enquiry Logs</a></li>
							@endif
							@if(Auth::guard('admin')->User()->admin_role == 'Superadmin')
							<li aria-haspopup="true"><a href="{{url('enquiry-report')}}" class="slide-item">HOT & WARM</a></li>
							@endif
							{{-- @if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('11', json_decode(Auth::guard('admin')->User()->role->permissions)))
							<li><a href="{{url('view-engineers')}}" class="slide-item">View Engineers</a></li>
							@endif --}}
						</ul>
					</li>
					@endif
					<li aria-haspopup="true"><a href="{{url('view-orders/In Process')}}" class="sub-icon"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/><path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/></svg> Orders<i class="fe fe-chevron-down horizontal-icon"></i></a>
						<ul class="sub-menu">
							@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('1', json_decode(Auth::guard('admin')->User()->role->permissions)))
							<li aria-haspopup="true"><a href="{{url('add-order')}}" class="slide-item">Add New Order</a></li>
							@endif
							@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('2', json_decode(Auth::guard('admin')->User()->role->permissions)))
							<li aria-haspopup="true"><a href="{{url('view-orders/In Process')}}" class="slide-item">View In-Process Order</a></li>
							<li aria-haspopup="true"><a href="{{url('view-orders/Completed')}}" class="slide-item">View Completed Order</a></li>
							@endif
							@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('15', json_decode(Auth::guard('admin')->User()->role->permissions)))
							<li aria-haspopup="true"><a href="{{url('order-booking-sheet')}}" class="slide-item">Order Booking Sheet</a></li>
							@endif
							@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('16', json_decode(Auth::guard('admin')->User()->role->permissions)))
							<li aria-haspopup="true"><a href="{{url('obf-tracker')}}" class="slide-item">OBF</a></li>
							@endif
						</ul>
					</li>
					@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('7', json_decode(Auth::guard('admin')->User()->role->permissions)) && in_array('8', json_decode(Auth::guard('admin')->User()->role->permissions)))
					<li aria-haspopup="true"><a href="#" class="sub-icon"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/><path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg> Equipment Types & Stages<i class="fe fe-chevron-down horizontal-icon"></i></a>
						<ul class="sub-menu">
							@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('7', json_decode(Auth::guard('admin')->User()->role->permissions)))
							<li><a href="{{url('add-equipment-type')}}" class="slide-item">Equipment Types</a></li>
							@else
							<li aria-haspopup="true"><a href="javascript:void(0)" class="slide-item opacity-75 pe-none">Equipment Types</a></li>
							@endif
							@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('8', json_decode(Auth::guard('admin')->User()->role->permissions)))
							<li><a href="{{url('view-equipment-stages')}}" class="slide-item">Equipment Stages</a></li>
							@else
							<li aria-haspopup="true"><a href="javascript:void(0)" class="slide-item opacity-75 pe-none">Equipment Stages</a></li>
							@endif
						</ul>
					</li>
					@endif
					@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('17', json_decode(Auth::guard('admin')->User()->role->permissions)))
					<li aria-haspopup="true"><a href="{{url('payment-tracker')}}" class="sub-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 13C7.44772 13 7 12.5523 7 12C7 11.4477 7.44772 11 8 11C8.55228 11 9 11.4477 9 12C9 12.5523 8.55228 13 8 13Z" fill="currentColor" /><path d="M8 17C7.44772 17 7 16.5523 7 16C7 15.4477 7.44772 15 8 15C8.55228 15 9 15.4477 9 16C9 16.5523 8.55228 17 8 17Z" fill="currentColor" /><path d="M11 16C11 16.5523 11.4477 17 12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16Z" fill="currentColor" /><path d="M16 17C15.4477 17 15 16.5523 15 16C15 15.4477 15.4477 15 16 15C16.5523 15 17 15.4477 17 16C17 16.5523 16.5523 17 16 17Z" fill="currentColor" /><path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" fill="currentColor" /><path d="M16 13C15.4477 13 15 12.5523 15 12C15 11.4477 15.4477 11 16 11C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13Z" fill="currentColor" /><path d="M8 7C7.44772 7 7 7.44772 7 8C7 8.55228 7.44772 9 8 9H16C16.5523 9 17 8.55228 17 8C17 7.44772 16.5523 7 16 7H8Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M6 3C4.34315 3 3 4.34315 3 6V18C3 19.6569 4.34315 21 6 21H18C19.6569 21 21 19.6569 21 18V6C21 4.34315 19.6569 3 18 3H6ZM18 5H6C5.44772 5 5 5.44772 5 6V18C5 18.5523 5.44772 19 6 19H18C18.5523 19 19 18.5523 19 18V6C19 5.44772 18.5523 5 18 5Z" fill="currentColor" /></svg> Payment Tracker</a>
					</li>
					@endif
					<li aria-haspopup="true"><a href="javascript:void" class="sub-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8 11C10.2091 11 12 9.20914 12 7C12 4.79086 10.2091 3 8 3C5.79086 3 4 4.79086 4 7C4 9.20914 5.79086 11 8 11ZM8 9C9.10457 9 10 8.10457 10 7C10 5.89543 9.10457 5 8 5C6.89543 5 6 5.89543 6 7C6 8.10457 6.89543 9 8 9Z" fill="currentColor" /><path d="M11 14C11.5523 14 12 14.4477 12 15V21H14V15C14 13.3431 12.6569 12 11 12H5C3.34315 12 2 13.3431 2 15V21H4V15C4 14.4477 4.44772 14 5 14H11Z" fill="currentColor" /><path d="M22 11H16V13H22V11Z" fill="currentColor" /><path d="M16 15H22V17H16V15Z" fill="currentColor" /><path d="M22 7H16V9H22V7Z" fill="currentColor" /></svg> Users<i class="fe fe-chevron-down horizontal-icon"></i></a>
						<ul class="sub-menu">
							@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('6', json_decode(Auth::guard('admin')->User()->role->permissions)))
							<li aria-haspopup="true"><a href="{{url('view-users')}}" class="slide-item">All Users</a></li>
							@endif
							@if(Auth::guard('admin')->User()->admin_role == 'Superadmin')
							<li aria-haspopup="true"><a href="{{url('user/roles')}}" class="slide-item">User Permissions</a></li>
							@endif
						</ul>
					</li>
					<li aria-haspopup="true"><a href="{{url('wpm-action-tracker')}}" class="sub-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 13C7.44772 13 7 12.5523 7 12C7 11.4477 7.44772 11 8 11C8.55228 11 9 11.4477 9 12C9 12.5523 8.55228 13 8 13Z" fill="currentColor" /><path d="M8 17C7.44772 17 7 16.5523 7 16C7 15.4477 7.44772 15 8 15C8.55228 15 9 15.4477 9 16C9 16.5523 8.55228 17 8 17Z" fill="currentColor" /><path d="M11 16C11 16.5523 11.4477 17 12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16Z" fill="currentColor" /><path d="M16 17C15.4477 17 15 16.5523 15 16C15 15.4477 15.4477 15 16 15C16.5523 15 17 15.4477 17 16C17 16.5523 16.5523 17 16 17Z" fill="currentColor" /><path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" fill="currentColor" /><path d="M16 13C15.4477 13 15 12.5523 15 12C15 11.4477 15.4477 11 16 11C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13Z" fill="currentColor" /><path d="M8 7C7.44772 7 7 7.44772 7 8C7 8.55228 7.44772 9 8 9H16C16.5523 9 17 8.55228 17 8C17 7.44772 16.5523 7 16 7H8Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M6 3C4.34315 3 3 4.34315 3 6V18C3 19.6569 4.34315 21 6 21H18C19.6569 21 21 19.6569 21 18V6C21 4.34315 19.6569 3 18 3H6ZM18 5H6C5.44772 5 5 5.44772 5 6V18C5 18.5523 5.44772 19 6 19H18C18.5523 19 19 18.5523 19 18V6C19 5.44772 18.5523 5 18 5Z" fill="currentColor" /></svg> WPM</a>
					</li>
					<li aria-haspopup="true"><a href="{{url('planner')}}" class="sub-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 13C7.44772 13 7 12.5523 7 12C7 11.4477 7.44772 11 8 11C8.55228 11 9 11.4477 9 12C9 12.5523 8.55228 13 8 13Z" fill="currentColor" /><path d="M8 17C7.44772 17 7 16.5523 7 16C7 15.4477 7.44772 15 8 15C8.55228 15 9 15.4477 9 16C9 16.5523 8.55228 17 8 17Z" fill="currentColor" /><path d="M11 16C11 16.5523 11.4477 17 12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16Z" fill="currentColor" /><path d="M16 17C15.4477 17 15 16.5523 15 16C15 15.4477 15.4477 15 16 15C16.5523 15 17 15.4477 17 16C17 16.5523 16.5523 17 16 17Z" fill="currentColor" /><path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" fill="currentColor" /><path d="M16 13C15.4477 13 15 12.5523 15 12C15 11.4477 15.4477 11 16 11C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13Z" fill="currentColor" /><path d="M8 7C7.44772 7 7 7.44772 7 8C7 8.55228 7.44772 9 8 9H16C16.5523 9 17 8.55228 17 8C17 7.44772 16.5523 7 16 7H8Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M6 3C4.34315 3 3 4.34315 3 6V18C3 19.6569 4.34315 21 6 21H18C19.6569 21 21 19.6569 21 18V6C21 4.34315 19.6569 3 18 3H6ZM18 5H6C5.44772 5 5 5.44772 5 6V18C5 18.5523 5.44772 19 6 19H18C18.5523 19 19 18.5523 19 18V6C19 5.44772 18.5523 5 18 5Z" fill="currentColor" /></svg> Planner</a>
					</li>
					@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('13', json_decode(Auth::guard('admin')->User()->role->permissions)))
					<li aria-haspopup="true" class="d-none"><a href="{{url('kanban-board')}}" class="sub-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M6 4C3.79086 4 2 5.79086 2 8V16C2 18.2091 3.79086 20 6 20H18C20.2091 20 22 18.2091 22 16V8C22 5.79086 20.2091 4 18 4H6ZM14 6H10V18H14V6ZM16 6V18H18C19.1046 18 20 17.1046 20 16V8C20 6.89543 19.1046 6 18 6H16ZM6 18H8V6H6C4.89543 6 4 6.89543 4 8V16C4 17.1046 4.89543 18 6 18Z" fill="currentColor"/></svg> Planning </a>
					</li>
					@endif
				</ul>
			</nav>
		</div>
	</div>
</div>
<body>
<div class="container">
	<div class="breadcrumb-header justify-content-between pt-3 mt-0">
		<div class="left-content">
			<div>
			<h2 class="main-content-title tx-22 pb-1 mg-b-1 mg-b-lg-1 gradient-text">Calender View</h2>
			</div>
		</div>
		<div class="pe-1 mb-xl-0">
            <button class="modal-effect btn btn-primary btn-block btn-sm" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#eventModal">
                <span class="btn-icon-wrapper pr-2"><i class="fa fa-plus-circle"></i></span> <b>Add Events</b>
            </button>
        </div>
		<!-- <form method="POST" action="{{url('/list-view-planner')}}">
			@csrf
			<div>
				<label for="message">Message:</label>
				<textarea name="message" id="message"></textarea>
			</div>
			<button type="submit">Send Message</button>
		</form> -->
		<div class="main-dashboard-header-right ">
			<h4 class="main-content-title tx-22 pb-1 mg-b-1 mg-b-lg-1"><a href="{{url('/list-view-planner')}}">List View</a></h2>
		</div>
	</div>
  <div id='calendar'></div>
</div> 
<div id="dialog" title="Create Event" style = "width:500px">

</div>
<div class="modal fade" id="eventModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-pencil"></i> Add Events</h5>
                <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="main-card card mb-0">
                <div class="card-body">
                    <!-- <form class="col-md-12 mx-auto" method="post" action="#">@csrf -->
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title" class="field-required">Title</label>
                                    <input type="text" class="form-control" id="demo_title" name="title" placeholder="Enter Title" autofocus="true" required="true" />
                                </div>
                            </div>
							<div class="col-md-12">
                                <div class="form-group">
                                    <label for="abbr" class="field-required">Date</label>
									<input type="text" name="datetimes" class="form-control" id="date-input"/>

                                    <!-- <input type="datetime-local" id="date-input" name="date" class="form-control" /> -->
                                </div>
							</div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="abbr" class="field-required">Time</label>
                                    <input type="text" id="fp-time" class="form-control flatpicker-time text-start flatpicker-input active" placeholder="HH:MM" />
                                </div>
							</div>
							<div class="col-md-12">
                                <div class="form-group">
                                    <label for="abbr" class="field-required">Color</label>
                                    <input type="text" id="demo-input" value="rgb(255, 128, 0)" name="color" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <button type="text" class="btn btn-primary float-right fw-500 submit-color"><i class="fa fa-check-circle"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.sidebar-right')

@include('layouts.footer')
</div>
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0-rc.2/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/js/bootstrap-colorpicker.min.js"></script>

		<!-- Jquery js-->
		<!-- <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script> -->

		<!-- Bootstrap js-->
		<!-- <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script> -->
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
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
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
<script>
$(document).ready(function () {
    $("#dialog").hide();
	$('#demo-input').colorpicker({showOn:'focus'});
	$('input[name="datetimes"]').daterangepicker();
	// $('input[name="datetimes"]').daterangepicker({
	// 	timePicker: true,
	// 	startDate: moment().startOf('hour'),
	// 	endDate: moment().startOf('hour').add(32, 'hour'),
	// 	locale: {
	// 	format: 'M/DD hh:mm A'
	// 	}
  	// });
	  
var SITEURL = "{{ url('/') }}";

$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $('#calendar').fullCalendar({
	editable: true,
	events: SITEURL + "/planner",
	eventTimeFormat: 'H(:mm)',
	editable: true,
	eventRender: function (event, element, view) {
		
		if (event.allDay === 'true') {
				event.allDay = true;
		} else {
				event.allDay = false;
		}
	},
	eventDrop: function (event, delta) {
		
		var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
		var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
		alert(start);
		alert(end);
		$.ajax({
			url: SITEURL + '/fullcalenderAjax',
			data: {
				title: event.title,
				start: start,
				end: end,
				id: event.id,
				type: 'update'
			},
			type: "POST",
			success: function (response) {
				displayMessage("Event Updated Successfully");
			}
		});
	},
	eventClick: function (event) {
		var deleteMsg = confirm("Do you really want to delete?");
		if (deleteMsg) {
			$.ajax({
				type: "POST",
				url: SITEURL + '/fullcalenderAjax',
				data: {
						id: event.id,
						type: 'delete'
				},
				success: function (response) {
					calendar.fullCalendar('removeEvents', event.id);
					displayMessage("Event Deleted Successfully");
					
				}
			});
		}		
	}
});
$(document).on('click', '.submit-color', function() {
		var date = $('#date-input').val();
		var color = $('#demo-input').val();
		var title = $('#demo_title').val();
		var time = $('#fp-time').val();
		$.ajax({
			url: SITEURL + "/fullcalenderAjax",
			data: {
				title: title,
				time: time,
				color: color,
				date: date,
				type: 'add'
			},
			type: "POST",
			success: function (data) {
				alert(data.id);
				alert(data.title);
				displayMessage("Event Created Successfully");
				location.reload();
				calendar.fullCalendar('renderEvent',
				{
					id: data.id,
					title: data.title,
				},true);
				
			}
		});
	});

var calendar = $('#calendar').fullCalendar({
                    editable: true,
                    events: SITEURL + "/planner",
                    eventTimeFormat: 'H(:mm)',
                    // displayEventTime: false,
                    // timeZone: 'UTC',
                    editable: true,
                    eventRender: function (event, element, view) {
                        
                        if (event.allDay === 'true') {
                                event.allDay = true;
                        } else {
                                event.allDay = false;
                        }
                    },
                    dayClick: function(date, jsEvent, view) {
						event.ResetDates;
                        $('#demo-input').colorpicker();
                        $("#dialog").dialog({ modal: true});
                    },
                    // eventTimeFormat: 'HH:mm',
                    selectable: true,
                    selectHelper: true,
                    select: function (start, end, allDay) {
                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                        $(document).on('click', '.submit-color', function() {
                            
                            var color = $('#demo-input').val();
                            var title = $('#demo-title').val();
                            var time = $('#fp-time').val();
                            // $("#dialog").hide();
                            $.ajax({
                                url: SITEURL + "/fullcalenderAjax",
                                data: {
                                    title: title,
                                    color: color,
                                    start: start,
                                    time: time,
                                    end: end,
                                    type: 'add'
                                },
                                type: "POST",
                                success: function (data) {
                                    console.log(data);
                                    displayMessage("Event Created Successfully");
                                    location.reload();
                                    calendar.fullCalendar('renderEvent',
                                        {
                                            id: data.id,
                                            title: title,
                                            allDay: allDay,
                                            color: color,
                                            start: start,
                                            end: end,
                                            time: time,
                                        },true);

                                    calendar.fullCalendar('unselect');
                                }
                            });
                        });
                    },
                    eventDrop: function (event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
  
                        $.ajax({
                            url: SITEURL + '/fullcalenderAjax',
                            data: {
                                title: event.title,
                                start: start,
                                end: end,
                                id: event.id,
                                type: 'update'
                            },
                            type: "POST",
                            success: function (response) {
                                displayMessage("Event Updated Successfully");
                            }
                        });
                    },
                    eventClick: function (event) {
                        var deleteMsg = confirm("Do you really want to delete?");
                        if (deleteMsg) {
                            $.ajax({
                                type: "POST",
                                url: SITEURL + '/fullcalenderAjax',
                                data: {
                                        id: event.id,
                                        type: 'delete'
                                },
                                success: function (response) {
                                    calendar.fullCalendar('removeEvents', event.id);
                                    displayMessage("Event Deleted Successfully");
                                }
                            });
                        }

                        
                    }
 
                });
 
});
function displayMessage(message) {
    toastr.success(message, 'Event');
} 
  
</script>
  
</body>
</html>