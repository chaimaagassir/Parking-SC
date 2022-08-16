<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <base href="/public">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>@yield('title') </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="client/assets/img/logo-mini.svg">

		<!-- CSS here -->
            
            <link rel="stylesheet" href="client/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="client/assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="client/assets/css/flaticon.css">
            <link rel="stylesheet" href="client/assets/css/price_rangs.css">
            <link rel="stylesheet" href="client/assets/css/slicknav.css">
            <link rel="stylesheet" href="client/assets/css/animate.min.css">
            <link rel="stylesheet" href="client/assets/css/magnific-popup.css">
            <link rel="stylesheet" href="client/assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="client/assets/css/themify-icons.css">
            <link rel="stylesheet" href="client/assets/css/slick.css">
            <link rel="stylesheet" href="client/assets/css/nice-select.css">
            <link rel="stylesheet" href="client/assets/css/style.css">
            
           
@yield('links')
          
            
   </head>

   <body>
       
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="images/logo-mini.svg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        @include('client/partials.navbar')
        <!-- Header End -->
    </header>
    <main>
        @yield('content')
    </main>
     <!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="./client/assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./client/assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./client/assets/js/popper.min.js"></script>
        <script src="./client/assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./client/assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./client/assets/js/owl.carousel.min.js"></script>
        <script src="./client/assets/js/slick.min.js"></script>
        <script src="./client/assets/js/price_rangs.js"></script>
        
		<!-- One Page, Animated-HeadLin -->
        <script src="./client/assets/js/wow.min.js"></script>
		<script src="./client/assets/js/animated.headline.js"></script>
        <script src="./client/assets/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="./client/assets/js/jquery.scrollUp.min.js"></script>
        <script src="./client/assets/js/jquery.nice-select.min.js"></script>
		<script src="./client/assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="./client/assets/js/contact.js"></script>
        <script src="./client/assets/js/jquery.form.js"></script>
        <script src="./client/assets/js/jquery.validate.min.js"></script>
        <script src="./client/assets/js/mail-script.js"></script>
        <script src="./client/assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./client/assets/js/plugins.js"></script>
        <script src="./client/assets/js/main.js"></script>

        

        <script src="vendors/js/vendor.bundle.base.js"></script>
       
        
    </body>
    @include('client/partials.footer')
</html>