<!-- main-header opened -->
<div class="main-header nav nav-item hor-header">
	<div class="container">
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
					<a class="btn btn-outline-primary btn-sm nav-link" href="{{url('add-order')}}"><i class="fa fa-plus-circle"></i> Add Order</a>
				</li>
				@endif
				@if(Auth::guard('admin')->User()->admin_role == 'Superadmin' || in_array('10', json_decode(Auth::guard('admin')->User()->role->permissions)))
				<li class="nav-item fullscreen-button">
					<a class="btn btn-outline-primary btn-sm nav-link" href="{{url('view-enquiry-logs')}}"><i class="fa fa-tasks"></i> Enquiry Logs</a>
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
<!-- /main-header