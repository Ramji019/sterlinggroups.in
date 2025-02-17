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

    <title>Client Register</title>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="{{ asset('assetss/js/html5shiv.min.js') }}"></script>
  <script src="{{ asset('assetss/js/respond.min.js') }}"></script>
  <![endif]-->

</head>

<body>

    <div class="inner-wrapper login-body">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong> {{ session('success') }} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong> {{ session('error') }} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox shadow-sm grow">
                    <div class="login-left">
                        <img class="img-fluid" src="assetss/img/logo.png" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Register</h1>
                            <p class="account-subtitle">I Need Website</p>

                            <form method="post" action="{{ url('/saveregister') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" maxlength="20" type="text" name="name"
                                        placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label>Mobile No</label>
                                    <input class="form-control number" maxlength="10" name="phone" type="text"
                                        placeholder="Mobile No">
                                </div>
                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input class="form-control" type="email" name="email" placeholder="E-MAIL"
                                        maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label>If You Have Api</label>
                                    <select class="form-control" name="api">
                                        <option value="">Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>If You Have Domain</label>
                                    <select class="form-control" name="domain"placeholder="Domain" id="youdomain">
                                        <option value="">Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                                <div class="form-group" style="display: none;" id="domainhide">
                                    <label>Domain Name</label>
                                    <input class="form-control" type="text" name="domain_name"
                                        placeholder="Domain Name" maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label>Type Of Website</label>
                                    <input class="form-control" type="text" name="website_name"
                                        placeholder="Type Of Website" maxlength="50">
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block"
                                        type="submit">Register</button>
                                </div>
                            </form>

                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>

                            <div class="text-center dont-have">Already have an account? <a
                                    href="{{ url('/login') }}">Login</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <script>
        $('#youdomain').change(function() {
            if ($('#youdomain').val() == 'yes') {
                $('#domainhide').show("slow");
            } else if ($('#youdomain').val() == 'no') {
                $('#domainhide').hide("slow");
            }
        });
    </script>
</body>

</html>
