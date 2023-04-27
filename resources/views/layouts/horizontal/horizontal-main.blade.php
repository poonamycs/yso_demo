<!--Horizontal-main -->
<div class="sticky">
	<div class="horizontal-main hor-menu clearfix side-header">
		<div class="horizontal-mainwrapper container clearfix">
			<nav class="horizontalMenu clearfix">
				<ul class="horizontalMenu-list">
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
<!--Horizontal-main -->