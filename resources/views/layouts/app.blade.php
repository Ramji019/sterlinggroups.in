<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Favicon -->
		<link rel="icon" type="image/x-icon" href="{{ asset('../assetss/img/favicon.png') }}">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('../assetss/css/bootstrap.min.css') }}">

		<!-- Linearicon Font -->
		<link rel="stylesheet" href="{{ asset('../assetss/css/lnr-icon.css') }}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('../assetss/css/font-awesome.min.css') }}">

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{ asset('../assetss/plugins/select2/select2.min.css') }}">

		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{ asset('../assetss/css/bootstrap-datetimepicker.min.css') }}">

		<!-- Tagsinput CSS -->
		<link rel="stylesheet" href="{{ asset('../assetss/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">

		<!-- Custom CSS -->
		<link rel="stylesheet" href="{{ asset('../assetss/css/style.css') }}">

	<title>Sterlinggroups.com</title>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="{{ asset('../assetss/js/html5shiv.min.js') }}"></script>
		<script src="{{ asset('../assetss/js/respond.min.js') }}"></script>
		<![endif]-->

</head>

<body>

	<!-- Inner wrapper -->
	<div class="inner-wrapper">

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

		<!-- Header -->
		@include('layouts.header')
		<!-- /Header -->

		<!-- Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					@include('layouts.sidebar')

					@yield('content')
				</div>
			</div>
		</div>
		<!--/Content-->

	</div>
	<div class="sidebar-overlay" id="sidebar_overlay"></div>

		<!-- jQuery -->
		<script src="{{ asset('../assetss/js/jquery-3.2.1.min.js') }}"></script>

		<!-- Bootstrap Core JS -->
		<script src="{{ asset('../assetss/js/popper.min.js') }}"></script>
		<script src="{{ asset('../assetss/js/bootstrap.min.js') }}"></script>

		<!-- Datetimepicker JS -->
		<script src="{{ asset('../assetss/plugins/select2/moment.min.js') }}"></script>
		<script src="{{ asset('../assetss/js/bootstrap-datetimepicker.min.js') }}"></script>

		<!-- Select2 JS -->
		<script src="{{ asset('../assetss/plugins/select2/select2.min.js') }}"></script>

		<!-- Tagsinput JS -->
		<script src="{{ asset('../assetss/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>

		<!-- Sticky sidebar JS -->
		<script src="{{ asset('../assetss/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
		<script src="{{ asset('../assetss/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

		<!-- Custom Js -->
		<script src="{{ asset('../assetss/js/script.js') }}"></script>

		<!-- Chart JS -->
		<script src="{{ asset('../assetss/js/Chart.min.js') }}"></script>
		<script src="{{ asset('../assetss/js/chart.js') }}"></script>
        @stack('page_scripts')
	</body>
</html>
