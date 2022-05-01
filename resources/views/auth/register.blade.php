
<!DOCTYPE HTML>
<html>

<head>
	<title>Glance Design Dashboard an Admin Panel Category Flat Bootstrap Responsive Website Template | Login Page ::
		w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script
		type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<!-- Bootstrap Core CSS -->
	<link href="{{ asset('web/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />

	<!-- Custom CSS -->
	<link href="{{ asset('web/css/style.css') }}" rel='stylesheet' type='text/css' />

	<!-- font-awesome icons CSS-->
	<link href="{{ asset('web/css/font-awesome.css') }}" rel="stylesheet">
	<!-- //font-awesome icons CSS-->

	<!-- side nav css file -->
	<link href="{{ asset('web/css/SidebarNav.min.css') }} " media='all' rel='stylesheet' type='text/css' />
	<!-- side nav css file -->

	<!-- js-->
	<script src="{{ asset('web/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('web/js/modernizr.custom.js') }}"></script>



	<!-- Metis Menu -->
	<script src="{{ asset('web/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('web/js/custom.js') }}"></script>
	<link href="{{ asset('web/css/custom.css') }}" rel="stylesheet">
	<!--//Metis Menu -->

</head>

<body>
	<div class="main-content">

		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h2 class="title1">Register</h2>
				<div class="widget-shadow">
					<div class="login-body">
						<form action="/register" method="post">
                        @csrf
							<input type="name" class="user" name="name" placeholder="Enter Your Name" required="">
                            <span class="text-danger">@error('name') {{ $message }} @enderror</span>

							<input type="email" class="user" name="email" placeholder="Enter Your Email" required="">
                            <span class="text-danger">@error('email') {{ $message }} @enderror</span>


							<input type="password" name="password" class="lock" placeholder="Password" required="">
                            <span class="text-danger">@error('Password') {{ $message }} @enderror</span>

							<input type="password" name="password_confirmation" class="lock" placeholder="Confirm Password" required="">
                            <span class="text-danger">@error('password_confirmation') {{ $message }} @enderror</span>

						
							<input type="submit" name="" value="Register">
							<div class="registration">
								
								<a class="" href="/login">
								  Already login ?
								</a>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>

	</div>
	<!--footer-->
	<div class="footer">
		<p>&copy; 2022 Inventory System. All Rights Reserved | Developed by <a href="https://http://tukisoft.com.np/"
				target="_blank">Tuki Soft Pvt.Ltd.</a></p>
	</div>
	<!--//footer-->

</body>

</html>