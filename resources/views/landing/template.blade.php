<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>{{$title}}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">



    <!-- Bootstrap core CSS -->
    <link href="{{asset('landing/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('landing/assets/img/favicons/apple-touch-icon.png')}}" sizes="180x180">
    <link rel="icon" href="{{asset('landing/assets/img/favicons/favicon-32x32.png')}}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{asset('landing//assets/img/favicons/favicon-16x16.png')}}" sizes="16x16" type="image/png">
    <link rel="manifest" href="{{asset('landing/assets/img/favicons/manifest.json')}}">
    <link rel="mask-icon" href="{{asset('landing/assets/img/favicons/safari-pinned-tab.svg')}}" color="#7952b3">
    <link rel="icon" href="{{asset('landing/assets/img/favicons/favicon.ico')}}">
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .img-fluid {
            width: 300px !important;
            height: 200px !important;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{asset('landing/custome/carousel.css')}}" rel="stylesheet">
</head>

<body>

    <!-- navbar -->
   @include('landing.include.navbar')
    <!-- end navbar -->
    <main>
        <!-- carousel slide -->

        <!-- end carousel -->

        <!-- between -->
        {{-- biar carousel nya cuma ad pas di index doang , makanya dimasukin di index,blade ny aja. --}}
        @yield('content')


    </main>

  @include('landing.include.footer')




    <script src="{{asset('landing/js/bootstrap.bundle.min.js')}}"></script>


</body>

</html>
