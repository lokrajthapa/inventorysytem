@include('innerLayout.header')

<body class="cbp-spmenu-push">
	<div class="main-content">
		<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
			<!--left-fixed -navigation-->
			<aside class="sidebar-left">
				<nav class="navbar navbar-inverse">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a class="navbar-brand" href="/">Tuki Soft</a></h1>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="sidebar-menu">
							<li class="header">MAIN NAVIGATION</li>
							<li class="treeview">
								<a href="/">
									<span>Dashboard</span>
								</a>
							</li>
							<li class="treeview">
								<a href="#">
									<span>Master Entry</span>
									<i class="fa fa-angle-left pull-right"></i>
								</a>
								<ul class="treeview-menu">
									<li><a href="{{ url('/stockin') }}"><i class="fa fa-angle-right"></i> Stock In</a></li>
									<li><a href="{{ url('/stockOut') }}"><i class="fa fa-angle-right"></i> Stock Out</a></li>
									<li><a href="#"><i class="fa fa-angle-right"></i>Stock Adjustment</a></li>
								</ul>
							</li>


							<!-- <li class="treeview">
								<a href="#">

									<span>Items</span>
									<i class="fa fa-angle-left pull-right"></i>
								</a>
								<ul class="treeview-menu">
									<li><a href="#"><i class="fa fa-angle-right"></i> Create</a></li>
									<li><a href="#"><i class="fa fa-angle-right"></i> Alter</a></li>
									<li><a href="#"><i class="fa fa-angle-right"></i> Delete</a></li>

								</ul>
							</li> -->
							<li class="treeview">
								<a href="#">

									<span>Items</span>
									<i class="fa fa-angle-left pull-right"></i>
								</a>
								<ul class="treeview-menu">
									<li><a href="{{ url('/item') }}"><i class="fa fa-angle-right"></i> Items</a></li>
									<li><a href="{{ url('/group') }}"><i class="fa fa-angle-right"></i> Item Group</a></li>
									<li><a href="{{ url('/subgroup') }}"><i class="fa fa-angle-right"></i> Item Subgroup</a></li>
									<li><a href="{{ url('/Company') }}"><i class="fa fa-angle-right"></i> Item Brand / Company</a></li>
								</ul>
							</li>
							<li class="treeview">
								<a href="#">

									<span>Misc.</span>
									<i class="fa fa-angle-left pull-right"></i>
								</a>
								<ul class="treeview-menu">
									<li><a href="{{ url('/companyInfo')}}"><i class="fa fa-angle-right"></i>Company Info</a></li>
									<li><a href="#"><i class="fa fa-angle-right"></i> Print Setting</a></li>
									<li><a href="#"><i class="fa fa-angle-right"></i> Reminder Setting</a></li>
									<li><a href="{{ url('/facialyear')}}"><i class="fa fa-angle-right"></i> Facial year</a></li>

								</ul>
							</li>
							<li class="header">REPORTS</li>
							<li><a href=""><i class="fa fa-angle-right text-red"></i> <span>Stock Status</span></a>
							</li>
							<li><a href="{{ url('/reports')}}"><i class="fa fa-angle-right text-yellow"></i> <span>Report
										</span></a></li>
							<li><a href="{{ url('/instock')}}"><i class="fa fa-angle-right text-aqua"></i> <span>In Stock</span></a></li>
							<li><a href="{{ url('/outstock')}}"><i class="fa fa-angle-right text-aqua"></i> <span>Out Stock</span></a></li>
							<li><a href="{{ url('/itemwisestock')}}"><i class="fa fa-angle-right text-aqua"></i> <span>Item wise stock</span></a></li>
							<li><a href="{{ url('/Groupwisestock')}}"><i class="fa fa-angle-right text-aqua"></i> <span>Group wise stock</span></a></li>
							<li><a href="{{ url('/SubGroupwisestock')}}"><i class="fa fa-angle-right text-aqua"></i> <span>Sub Group wise stock</span></a></li>




						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</nav>
			</aside>
		</div>
		<!--left-fixed -navigation-->

		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button style="margin-left: 20px;" id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<div class="profile_details_left">

					<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				<div class="profile_details">
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">
									<span class="prfil-img"><img src="images/2.jpg" alt=""> </span>
									<div class="user-name">
										<p>Admin Name</p>
										<span>Administrator</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>
								</div>
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
								<li> <a href="#"><i class="fa fa-user"></i> My Account</a> </li>
								<li> <a href="#"><i class="fa fa-suitcase"></i> Profile</a> </li>
								<li>
									<div>
										<form method="post" action="{{ route('logout')}}" >
										   @csrf
											   <a href="{{route('logout')}}"  class="hvr-bounce-to-right" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fa fa-cog nav_icon"></i> <span class="nav-label" style="padding-left:px"> Logout </span>  </a>				   
										</form>
									   </div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!-- //header-ends -->
		<!-- main content start-->




		@yield('content')





		<!--footer-->
		<div class="footer">
			<p>&copy; 2022 Inventory System. All Rights Reserved | Developed by <a href="https://http://tukisoft.com.np/" target="_blank">Tuki Soft Pvt.Ltd.</a></p>
		</div>
		<!--//footer-->
	</div>

	@include('innerLayout.footer')

</body>

</html>