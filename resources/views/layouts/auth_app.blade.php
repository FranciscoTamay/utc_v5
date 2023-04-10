<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('') UTC</title>

    <!-- General CSS Files -->
    <link href="{{ asset('all-css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('all-css/font-awesome.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('all-css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('all-css/components.css')}}">
    <link rel="stylesheet" href="{{ asset('all-css/iziToast.min.css') }}">
    <link href="{{ asset('all-css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('all-css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="icon" type="image/png" href="img/utc.png">
</head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="login-brand">
                        <img src="{{ asset('img/utc.png') }}" alt="logo" width="100"
                             class="shadow-light">
                    </div>
                    @yield('content')
                    <div class="simple-footer">
{{--                        Copyright &copy; {{ getSettingValue('application_name') }}  {{ date('Y') }}--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- General JS Scripts -->
<script src="{{ asset('all-js/jquery.min.js') }}"></script>
<script src="{{ asset('all-js/popper.min.js') }}"></script>
<script src="{{ asset('all-js/bootstrap.min.js') }}"></script>
<script src="{{ asset('all-js/jquery.nicescroll.js') }}"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="{{ asset('all-js/stisla.js') }}"></script>
<script src="{{ asset('all-js/scripts.js') }}"></script>
<!-- Page Specific JS File -->
</body>
</html>
