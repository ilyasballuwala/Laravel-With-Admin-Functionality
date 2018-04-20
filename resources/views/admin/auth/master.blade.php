<!-- New layout for login and registration page -->
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ config('app.name', 'Umbilical') }}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="robots" content="noindex, nofollow">
        
        <!-- Open Graph Meta -->
        <meta property="og:title" content="Umbilical">
        <meta property="og:site_name" content="Umbilical">
        <meta property="og:description" content="Umbilical - Account Software">
        <meta property="og:type" content="portal">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Google icon -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Custom -->
        <link rel="stylesheet" type="text/css" href="{{ asset("css/codebase.min.css") }}" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript"> var hosturl = '{{ url('/') }}'; </script>
	</head>
    <body class="body-custom login-page">
        @yield('content')

        <script src="{{ asset("js/core/jquery.min.js") }}"></script>
        <script src="{{ asset("js/core/bootstrap.bundle.min.js") }}"></script>
        <script src="{{ asset("js/core/jquery.slimscroll.min.js") }}"></script>
        <script src="{{ asset("js/core/jquery.scrollLock.min.js") }}"></script>
        <script src="{{ asset("js/core/jquery.appear.min.js") }}"></script>
        <script src="{{ asset("js/core/jquery.countTo.min.js") }}"></script>
        <script src="{{ asset("js/core/js.cookie.min.js") }}"></script>
        <script src="{{ asset("js/codebase.js") }}"></script>
        <script src="{{ asset("js/plugins/jquery-validation/jquery.validate.min.js") }}"></script>
        <script src="{{ asset("js/pages/op_auth_signin.js") }}"></script>
        <script src="{{ asset("js/pages/op_auth_reminder.js") }}"></script>
        <script src="{{ asset("js/pages/op_auth_lock.js") }}"></script>
    </body>
</html>