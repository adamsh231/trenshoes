<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('karma/img/fav.png') }}">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Tren Shoes - @yield('title')</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('karma/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('karma/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('karma/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('karma/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('karma/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('karma/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('karma/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('karma/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('karma/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('karma/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('karma/css/main.css') }}">
    @yield('add_style')
</head>

<body>

    <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
                            {{-- <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="category.html">Shop Category</a></li>
                                    <li class="nav-item"><a class="nav-link" href="single-product.html">Product Details</a></li>
                                    <li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a></li>
                                    <li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
                                    <li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                                    <li class="nav-item"><a class="nav-link" href="tracking.html">Tracking</a></li>
                                    <li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li> --}}
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- End Header Area -->


    @yield('content')


    <!-- start footer Area -->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <p class="footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <script src="{{ asset('karma/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="{{ asset('karma/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('karma/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('karma/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('karma/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('karma/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('karma/js/countdown.js') }}"></script>
    <script src="{{ asset('karma/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('karma/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('karma/js/main.js') }}"></script>
    @yield('add_script')

</body>

</html>
