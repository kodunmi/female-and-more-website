<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from iglyphic.com/themes/html/thefund/lazyload/causes.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Nov 2019 14:34:31 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>The Fund</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- ================= Favicon ================== -->
    <link rel="icon" sizes="72x72" href="images/favicon-96x96.png">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900%7COpen+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" data-turbolinks-track="true" data-turbolinks-eval="false">
    <!-- Bootsrap css-->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" data-turbolinks-track="true" data-turbolinks-eval="false">
    <!-- Magnific Popup-->
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}" data-turbolinks-track="true" data-turbolinks-eval="false">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}" data-turbolinks-track="true" data-turbolinks-eval="false">
    <!-- notiny -->
    <link rel="stylesheet" href="{{ asset('frontend/css/snackbar.css') }}" data-turbolinks-track="true" data-turbolinks-eval="false">
    <!-- REVOLUTION SLIDER STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/settings.css') }}" data-turbolinks-track="true" data-turbolinks-eval="false">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/layers.css') }}" data-turbolinks-track="true" data-turbolinks-eval="false">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/navigation.css') }}" data-turbolinks-track="true" data-turbolinks-eval="false">
    <!-- Animate css-->
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}" data-turbolinks-track="true" data-turbolinks-eval="false">
    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" data-turbolinks-track="true" data-turbolinks-eval="false">
    <!-- Color Swhicher css-->
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.countdown.css') }}" data-turbolinks-track="true" data-turbolinks-eval="false">
    <!-- jquery count down css -->
    <!-- Modernizr-->
    <script src="/frontend/js/modernizr-2.8.3.min.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script>
    <!-- date picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" data-turbolinks-track="true" data-turbolinks-eval="false"/>
    <script src="/frontend/js/turbolinks.js"></script>
</head>
<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div class="preloader">
        <div class="loader-inner ball-scale-multiple">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!--/.preloader-->
    @include('frontend.layouts.header')
    @include('frontend.layouts.mobile-nav')
    @include('frontend.layouts.menu')
    <div id="app">
         @yield('content')
    </div>
    @include('frontend.layouts.footer')
    <!-- // End Footer  -->
    <!-- == jQuery Librery == -->
    <script src="/frontend/js/jquery-2.2.4.min.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script>
    <!-- == Bootsrap js File == -->
    <script src="/frontend/js/bootstrap.min.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script>
    <!-- == mixitup == -->
    <script src="/frontend/js/mixitup.min.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script>
    <!-- == Select 2 == -->
    <script src="/frontend/js/select2.min.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script>
    <!-- == Color box == -->
    <script src="/frontend/js/jquery.colorbox-min.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script>
    <!-- == Slick == -->
    <script src="/frontend/js/slick.min.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script>
    <!-- == Image Lazy Load == -->
    <script src="/frontend/js/jquery.lazy.min.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script>
    <!-- == Wow js == -->
    <script src="/frontend/js/wow.min.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script>
    <!-- == Notiny js == -->
    <script src="/frontend/js/snackbar.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script>
    <!-- == Revolution Slider JS == -->
    <script src="/frontend/js/revolution/jquery.themepunch.tools.min.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script>
    <script src="/frontend/js/revolution/jquery.themepunch.revolution.min.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script>
    <script src="/frontend/js/revolution/extensions/revolution.extension.actions.min.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script>
    <script src="/frontend/js/revolution/extensions/revolution.extension.layeranimation.min.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script>
    <script src="/frontend/js/revolution/extensions/revolution.extension.navigation.min.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script>
    <script src="/frontend/js/revolution/extensions/revolution.extension.slideanims.min.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script>
    <script src="/frontend/js/revolution-active.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script>
    <!-- == custom Js File == -->
    <!-- bootstarp date picker cdn -->
    <!-- jquery validator -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script>
    <script src="/frontend/js/custom.js" data-turbolinks-eval="false"></script>
    <!-- page related js -->
    <script>
        @yield('js')
    </script>
    <!-- <script src="/js/app.js" data-turbolinks-track="true" data-turbolinks-eval="false"></script> -->
    </body>

<!-- Mirrored from iglyphic.com/themes/html/thefund/lazyload/causes.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Nov 2019 14:34:31 GMT -->
</html>
