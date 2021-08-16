<!DOCTYPE html>
<html>
<style>
    .background {
        background: linear-gradient(to right, #2a1f4c 45%, #ef9b11 80%)
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('assets')}}/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('assets')}}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('assets')}}/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('assets')}}/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
</head>

<body class="login-page background">
<div class="login-box">

    <main class="py-4">
        @yield('content')
    </main>

</div>

<!-- Jquery Core Js -->
<script src="{{asset('assets')}}/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('assets')}}/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('assets')}}/plugins/node-waves/waves.js"></script>

<!-- Validation Plugin Js -->
<script src="{{asset('assets')}}/plugins/jquery-validation/jquery.validate.js"></script>

<!-- Custom Js -->
<script src="{{asset('assets')}}/js/admin.js"></script>
<script src="{{asset('assets')}}/js/pages/examples/sign-in.js"></script>
</body>

</html>

    </div>
</body>
</html>
