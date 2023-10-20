<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>E-Shop</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/2x/external-shopping-cart-technology-ecommerce-flaticons-lineal-color-flat-icons.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/2x/external-shopping-cart-technology-ecommerce-flaticons-lineal-color-flat-icons.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/2x/external-shopping-cart-technology-ecommerce-flaticons-lineal-color-flat-icons.png">
    <link rel="manifest" href="{{asset('img/favicons/manifest.json')}}">
    <meta name="msapplication-TileImage" content="{{asset('img/favicons/mstile-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet">

    <link href="{{asset('css/theme.min.css')}}" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{asset('css/user.min.css')}}" type="text/css" rel="stylesheet" id="user-style-default">
    <link href="{{asset('css/swiper-bundle.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{asset('owl_carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('owl_carousel/owl.theme.default.css')}}">
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
     {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
<style>
 .group{
        display:flex;
        max-height: 300px;
        overflow-x:auto;
    }
.group > .item{
    min-width:200px;
  margin: 15px;
    text-align: center;
}

.grid-container{


    display:flex;
    overflow-x: auto;
  
}
.grid-item{
margin:5px;
}
</style>

<script type="text/javascript">
    const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'vertical',
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});
(function(){
    $('.selectpicker').selectpicker();
});
</script>
<script src="{{asset('scripts/popper.min.js')}}"></script>
<script src="{{asset('scripts/bootstrap.min.js')}}"></script>
<script src="{{asset('scripts/anchor.min.js')}}"></script>
<script src="{{asset('scripts/is.min.js')}}"></script>
<script src="{{asset('scripts/all.min.js')}}"></script>
<script src="{{asset('scripts/lodash.min.js')}}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js"></script> --}}
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="{{asset('scripts/list.min.js')}}"></script>
<script src="{{asset('scripts/feather.min.js')}}"></script>
<script src="{{asset('scripts/dayjs.min.js')}}"></script>
<script src="{{asset('scripts/phoenix.js')}}"></script>
<script src="{{asset('scripts/swiper-bundle.min.js')}}"></script>
<script src="{{asset('scripts/dropzone.min.js')}}"></script>
<script src="{{asset('scripts/index.js')}}"></script>
<script src="{{asset('scripts/echarts.min.js')}}"></script>
<script src="{{asset('scripts/chart.min.js')}}"></script>
<script src="{{asset('scripts/leaflet.js')}}"></script>
<script src="{{asset('scripts/leaflet.markercluster.js')}}"></script>
<script src="{{asset('scripts/leaflet-tilelayer-colorfilter.min.js')}}"></script>
<script src="{{asset('scripts/ecommerce-dashboard.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- owl carousel -->
<script src="{{asset('owl_carousel/owl.carousel.js')}}"></script>
<script src="{{asset('scripts/script.js')}}"></script>
</body>
{{-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> --}}

</head>

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

        <!-- ============================================-->
        <!-- <section> begin ============================-->
        @include('layouts.customer_topbar')
        @yield('content')


        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="bg-100">
            <div class="container-small">
                <div class="row py-9 justify-content-between gy-4">
                    <div class="col-12 col-lg-4">
                        <div class="d-flex align-items-center mb-3"><img src="{{asset('img/icons/logo.png')}}"
                                alt="phoenix" width="32" />
                            <p class="logo-text ms-2">phoenix</p>
                        </div>
                        <p class="text-700 mb-1 fw-semi-bold lh-sm">Phoenix is a free in-house admin dashboard template
                            with fascinating features and amazing layout. The template is responsive to all major
                            browsers and is compatible with all available devices and screen sizes.</p>
                    </div>
                    <div class="col-6 col-md-auto">
                        <h5 class="fw-bolder mb-3">About Phoenix</h5>
                        <div class="d-flex flex-column"><a class="text-700 fw-semi-bold fs--1 mb-1"
                                href="#!">Careers</a><a class="text-700 fw-semi-bold fs--1 mb-1"
                                href="#!">Affiliate Program</a><a class="text-700 fw-semi-bold fs--1 mb-1"
                                href="#!">Privacy Policy</a><a class="text-700 fw-semi-bold fs--1 mb-1"
                                href="#!">Terms & Conditions</a></div>
                    </div>
                    <div class="col-6 col-md-auto">
                        <h5 class="fw-bolder mb-3">Stay Connected</h5>
                        <div class="d-flex flex-column"><a class="text-700 fw-semi-bold fs--1 mb-1"
                                href="#!">Blogs</a><a class="mb-1 fw-semi-bold fs--1" href="#!"><span
                                    class="fab fa-facebook-square text-facebook me-2"></span><span
                                    class="text-800">Facebook</span></a><a class="mb-1 fw-semi-bold fs--1"
                                href="#!"><span class="fab fa-twitter-square text-twitter me-2"></span><span
                                    class="text-800">Twitter</span></a></div>
                    </div>
                    <div class="col-6 col-md-auto">
                        <h5 class="fw-bolder mb-3">Customer Service</h5>
                        <div class="d-flex flex-column"><a class="text-700 fw-semi-bold fs--1 mb-1" href="#!">Help
                                Desk</a><a class="text-700 fw-semi-bold fs--1 mb-1" href="#!">Support, 24/7</a><a
                                class="text-700 fw-semi-bold fs--1 mb-1" href="#!">Community of Phoenix</a></div>
                    </div>
                    <div class="col-6 col-md-auto">
                        <h5 class="fw-bolder mb-3">Payment Method</h5>
                        <div class="d-flex flex-column"><a class="text-700 fw-semi-bold fs--1 mb-1" href="#!">Cash
                                on Delivery</a><a class="text-700 fw-semi-bold fs--1 mb-1" href="#!">Online
                                Payment</a><a class="text-700 fw-semi-bold fs--1 mb-1" href="#!">PayPal</a><a
                                class="text-700 fw-semi-bold fs--1 mb-1" href="#!">Installment</a></div>
                    </div>
                </div>
            </div><!-- end of .container-->
        </section><!-- <section> close ============================-->
        <!-- ============================================-->

        <footer class="footer">
            <div class="row g-0 justify-content-between align-items-center h-100 mb-3">
                <div class="col-12 col-sm-auto text-center">
                    <p class="mb-0 mt-2 mt-sm-0 text-900">Thank you for creating with Phoenix<span
                            class="d-none d-sm-inline-block"></span><span class="mx-1">|</span><br
                            class="d-sm-none" />2022 &copy; <a href="https://themewagon.com">Themewagon</a></p>
                </div>
                <div class="col-12 col-sm-auto text-center">
                    <p class="mb-0 text-600">v1.2.0</p>
                </div>
            </div>
        </footer>
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
   
   
</body>

</html>
