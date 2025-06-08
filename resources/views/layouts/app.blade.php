<!DOCTYPE html>
<html lang="es">

<head>
    <title>DINO S.R.L</title>
    @include('partials.head')
</head>

<body class="theme-color-2 bg-effect">

    <!-- Loader Start -->
    @include('partials.loader')
    <!-- Loader End -->

    <!-- Header Start -->
    @include('partials.header')
    <!-- Header End -->

    @yield('content')

    <!-- Footer Start -->
    @include('partials.footer')
    <!-- Footer End -->

    <!-- Tap to top and theme setting button start -->
    <div class="theme-option">
        <div class="back-to-top">
            <a id="back-to-top" href="#">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <!-- Tap to top and theme setting button end -->

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->

    @include('partials.js')
</body>

</html>
