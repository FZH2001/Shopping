<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Phoenix</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicons/favicon-16x16.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicons/favicon.ico')}}">
    <link rel="manifest" href="{{asset('img/favicons/manifest.json')}}">
    <meta name="msapplication-TileImage" content="{{asset('img/favicons/mstile-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="{{asset('css/theme.min.css')}}" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{asset('css/user.min.css')}}" type="text/css" rel="stylesheet" id="user-style-default">
    <link href="{{asset('leaflet.css')}}" rel="stylesheet">
    <link href="{{asset('MarkerCluster.css')}}" rel="stylesheet">
    <link href="{{asset('MarkerCluster.Default.css')}}" rel="stylesheet">
</head>

<body>

@yield('content')


 
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{asset('scripts/popper.min.js')}}"></script>
    <script src="{{asset('scripts/bootstrap.min.js')}}"></script>
    <script src="{{asset('scripts/anchor.min.js')}}"></script>
    <script src="{{asset('scripts/is.min.js')}}"></script>
    <script src="{{asset('scripts/all.min.js')}}"></script>
    <script src="{{asset('scripts/lodash.min.js')}}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{asset('scripts/list.min.js')}}"></script>
    <script src="{{asset('scripts/feather.min.js')}}"></script>
    <script src="{{asset('scripts/dayjs.min.js')}}"></script>
    <script src="{{asset('scripts/phoenix.js')}}"></script>
    <script src="{{asset('scripts/echarts.min.js')}}"></script>
    <script src="{{asset('scripts/chart.min.js')}}"></script>
    <script src="{{asset('scripts/list.min.js')}}"></script>
    <script src="{{asset('scripts/leaflet.js')}}"></script>
    <script src="{{asset('scripts/leaflet.markercluster.js')}}"></script>
    <script src="{{asset('scripts/leaflet-tilelayer-colorfilter.min.js')}}"></script>
    <script src="{{asset('scripts/ecommerce-dashboard.js')}}"></script>
</body>

</html>