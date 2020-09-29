<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="@yield('favicon')">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('web/images/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('web/images/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('web/images/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('web/images/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00a300">
    <meta name="theme-color" content="#ffffff">

    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')"/>
    <meta property="og:image" itemprop="image" content="@yield('favicon')">
    <meta property="og:site_name" content="@yield('sitename')">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="author" content="@yield('author')">

    <meta name="twitter:site" content="@yield('sitename')">
    <meta name="twitter:creator" content="@yield('author')">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="javascript:window.location.href">

    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="@yield('favicon')" />

    <meta name="keywords" content="@yield('keywords')">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:100,200,300,400,500,600,700,800|Droid+Serif:400,400italic,700,700italic|PT+Serif:400,400i' rel='stylesheet' type='text/css'>

    <link href="{{asset('web/css/external.css')}}" rel="stylesheet">
    <link href="{{asset('web/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('web/css/style.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('web/revolution/css/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('web/revolution/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('web/revolution/css/navigation.css')}}">

    <!--[if lt IE 9]>
        <script src="{{asset('web/js/html5shiv.js')}}"></script>
        <script src="{{asset('web/js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body>

    {{-- Preloader --}}
    <div class="preloader">
        <div class="spinner">
            <div class="bounce1">
            </div>
            <div class="bounce2">
            </div>
            <div class="bounce3">
            </div>
        </div>
    </div>

    @yield('content')

    <script src="{{asset('web/js/jquery-2.1.1.min.js')}}"></script>
    <script src="{{asset('web/js/plugins.js?v=1.0.0')}}"></script>
    <script src="{{asset('web/js/functions.js?v=1.2.0')}}"></script>

    @stack('script')
</body>
</html>
