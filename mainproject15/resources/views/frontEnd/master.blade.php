<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')</title>

    <!--===================================
    All CSS Style Link Start
    =======================================--

    <!-- ====Google font Open Sans==== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- ====Bootstrap css==== -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/bootstrap.min.css')}}">

    <!-- ====Font awesome css==== -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- ====Animate css==== -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/animate.css')}}">

    <!-- ====Owl carousel 2 css==== -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/owl.carousel.css')}}">

    <!-- ====Mean Menu / Mobile Menu css==== -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/meanmenu.min.css')}}">

    <!-- ====Custom css==== -->
    <link rel="stylesheet" href="{{asset('public/frontEnd/style.css')}}">
    <!-- Toast message -->
    <link rel="stylesheet" href="{{asset('public/backEnd/dist/css/jquery.toast.css')}}">
    <!--All CSS Style Link End-->
    <!-- FAVICONS -->
    <link rel="icon" href="{{asset('public/frontEnd/img/favicon.png')}}" type="image/png" sizes="16x16">
    <link rel="shortcut icon" href="{{asset('public/frontEnd/img/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('public/frontEnd/img/favicon.png')}}">

    
    
    <style>
        .main-menu-area .sub-menu{
            width: 1178px;
        }
    </style>
    @yield('pageCss')

</head>
<body>

@include('frontEnd.includes.header')

@yield('mainContent')

@include('frontEnd.includes.footer')

<!--=======================================
        All Jquery Script link
===========================================-->

<!--[if (!IE)|(gt IE 8)]><!-->
<script src="{{asset('public/frontEnd/js/jquery-2.1.4.min.js')}}"></script>
<!--<![endif]-->

<!-- ====Bootstrap JS==== -->
<script src="{{asset('public/frontEnd/js/bootstrap.min.js')}}"></script>

<!-- ====jQuery owl carousel==== -->
<script src="{{asset('public/frontEnd/js/owl.carousel.min.js')}}"></script>

<!-- =====jQuery easing==== -->
<script src="{{asset('public/frontEnd/js/jquery.easing.1.3.min.js')}}"></script>

<!-- =====jQuery Parallax==== -->
<script src="{{asset('public/frontEnd/js/jquery.parallax-1.1.3.js')}}"></script>

<!-- ====WOW Animation==== -->
<script src="{{asset('public/frontEnd/js/wow.min.js')}}"></script>

<!--Activating WOW Animation only for modern browser-->
<!--[if !IE]><!-->
<script type="text/javascript">new WOW().init();</script>
<!--<![endif]-->

<!--Oh Yes, IE 9+ Supports animation, lets activate for IE 9+-->
<!--[if gte IE 9]>
<script type="text/javascript">new WOW().init();</script>
<![endif]-->

<!-- ====Mean Menu Js / Mobile Menu JS==== -->
<script src="{{asset('public/frontEnd/js/jquery.meanmenu.min.js')}}"></script>

<!-- ====jQuery main script==== -->
<script src="{{asset('public/frontEnd/js/main.js')}}"></script>
<!-- Toast message -->
<script src="{{asset('public/backEnd/dist/js/jquery.toast.js')}}"></script>
 <!-- recaptcha -->
<script src='https://www.google.com/recaptcha/api.js'></script>
@yield('pageScript')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function(){
         @yield('script')
    });
</script>
<!--========================================
        All Jquery Script link End
============================================-->

</body>
</html>