<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>LSMS | Login</title>

        <link href="{{ asset('public/inspinia/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/inspinia/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('public/inspinia/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('public/inspinia/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('public/inspinia/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('public/inspinia/css/custom_style.css') }}" rel="stylesheet">

    </head>

    <body class="gray-bg">

        @yield('content')

        <!-- Mainly scripts -->
        <script src="{{ asset('public/inspinia/js/jquery-3.1.1.min.js') }} "></script>
        <script src="{{ asset('public/inspinia/js/bootstrap.min.js') }} "></script>

        <!-- iCheck -->
        <script src="{{ asset('public/inspinia/js/plugins/iCheck/icheck.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
    </body>

</html>
