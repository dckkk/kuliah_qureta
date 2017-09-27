<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kuliah Qureta @yield('title')</title>

    <!-- Styles -->

    <!-- load css -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css'). '?v=' . filemtime('./css/style.css') }}">
    <!-- load cdn google font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">
    <!-- load script -->
    <script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <!-- navigation -->
    <div class="menu" id="menu-wrapper" style="visibility: hidden;">
        <div class="container">
            <ul class="menu-list col-sm-4 col-xs-12">
                <li class="menu-header">header 1</li>
                <li class="menu-item"><a href="#">menu 1</a></li>
                <li class="menu-item"><a href="#">menu 2</a></li>
                <li class="menu-item"><a href="#">menu 3</a></li>
                <li class="menu-item"><a href="#">menu 4</a></li>
                <li class="menu-item"><a href="#">menu 5</a></li>
                <li class="menu-item"><a href="#">menu 6</a></li>
                <li class="menu-item"><a href="#">menu 7</a></li>
            </ul>
            <ul class="menu-list col-sm-4 col-xs-12">
                <li class="menu-header">header 2</li>
                <li class="menu-item"><a href="#">menu 1</a></li>
                <li class="menu-item"><a href="#">menu 2</a></li>
                <li class="menu-item"><a href="#">menu 3</a></li>
                <li class="menu-item"><a href="#">menu 4</a></li>
                <li class="menu-item"><a href="#">menu 5</a></li>
                <li class="menu-item"><a href="#">menu 6</a></li>
                <li class="menu-item"><a href="#">menu 7</a></li>
            </ul>
            <ul class="menu-list col-sm -4 col-xs-12">
                <li class="menu-header">header 3</li>
                <li class="menu-item"><a href="#">menu 1</a></li>
                <li class="menu-item"><a href="#">menu 2</a></li>
                <li class="menu-item"><a href="#">menu 3</a></li>
                <li class="menu-item"><a href="#">menu 4</a></li>
                <li class="menu-item"><a href="#">menu 5</a></li>
                <li class="menu-item"><a href="#">menu 6</a></li>
                <li class="menu-item"><a href="#">menu 7</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid header navbar navbar-default navbar-fixed-top">
        <div class="row row-margin">
            <div class="col-lg-2 col-md-3 col-sm-12 col-xs-4 logo">
                <a href="/">
                    <img class="logo" src="{{ URL::asset('/img/logo.png') }}" style="width:80%">
                </a>
                    <!-- ul.menu-list*3>li.menu-header{header $}r+li.menu-item*7>a[href=#]{menu $} -->
                
            </div>
            <div class="col-lg-8 col-md-7 col-sm-10 col-xs-6 search-bar">
                <a href="#" class="menu-icon" id="toggle"><img src="{{ URL::asset('/img/menu.svg') }}"></a>

                <div class="search">
                    <form>
                        <input class="search-input" type="text" placeholder="Cari topik, mata kuliah, atau pengajar"><button type="submit"><span class="fa fa-search"></span></button>
                    </form>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 user text-center">
                <a href="/login" class="wrap-user">
                    <span class="fa fa-user-o user-icon"></span>
                    <span class="user-logo">Sign in</span>
                </a>
            </div>
        </div>
    </div>

    @yield('content')
    
    <!-- footer -->