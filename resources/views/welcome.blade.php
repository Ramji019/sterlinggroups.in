<!DOCTYPE html>
<html lang="en">
	<head>
	
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Favicon -->
		<link rel="icon" type="image/x-icon" href="{{ asset('assetss/img/favicon.png') }}">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('assetss/css/bootstrap.min.css') }}">
		
		<!-- Linearicon Font -->
		<link rel="stylesheet" href="{{ asset('assetss/css/lnr-icon.css') }}">
				
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('assetss/css/font-awesome.min.css') }}">
		
		
		<!-- Custom CSS -->
		<link rel="stylesheet" href="{{ asset('assetss/css/style.css') }}">
		
		<title>Sterlinggroups.com</title>
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="{{ asset('assetss/js/html5shiv.min.js') }}"></script>
		<script src="{{ asset('assetss/js/respond.min.js') }}"></script>
		<![endif]-->
		
	</head>
	<body>
			
			<!-- Loader -->
			<div id="loader-wrapper">
				
				<div class="loader">
				  <div class="dot"></div>
				  <div class="dot"></div>
				  <div class="dot"></div>
				  <div class="dot"></div>
				  <div class="dot"></div>
				</div>
			</div>

		<!-- Main Wrapper -->
		<div class="inner-wrapper login-body">
			<div class="login-wrapper">
				<div class="container">
					<div class="loginbox shadow-sm grow">
						<div class="login-left">
							<img class="img-fluid" src="{{ asset('assetss/img/logo.png') }}" alt="Logo">
						</div>
						<div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								
								<!-- Form -->
								<form method="POST" action="{{ route('login') }}">
									@csrf
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Email" name="email">
									</div>
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Password" name="password">
									</div>
									<div class="form-group">
										<button class="btn btn-theme button-1 text-white ctm-border-radius btn-block" type="submit">Login</button>
									</div>
								</form>
								<!-- /Form -->
								@if (Route::has('password.request'))
								<div class="text-center forgotpass"><a href="{{ route('password.request') }}">Forgot Password?</a></div>
								@endif
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								
								<!-- Social Login -->
								<div class="social-login">
									<span>Login with</span>
									<a href="javascript:void(0)" class="facebook"><i class="fa fa-facebook"></i></a><a href="javascript:void(0)" class="google"><i class="fa fa-google"></i></a>
								</div>
								<!-- /Social Login -->
								
								<div class="text-center dont-have">Don’t have an account? <a href="{{ url('/register') }}">Register</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
		<script src="{{ asset('assetss/js/jquery-3.2.1.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{ asset('assetss/js/popper.min.js') }}"></script>
		<script src="{{ asset('assetss/js/bootstrap.min.js') }}"></script>
		
		<!-- Sticky sidebar JS -->
		<script src="{{ asset('assetss/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>		
		<script src="{{ asset('assetss/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>		
					
		<!-- Custom Js -->
		<script src="{{ asset('assetss/js/script.js') }}"></script>
		
	</body>
</html>