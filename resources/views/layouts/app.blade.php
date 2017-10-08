<?php 
$pages = \App\Pages::all();
$topics = \App\Topics::all();
$course = \App\Course::all();
?>
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
            @foreach($topics as $key => $value)
                <ul class="menu-list col-sm-4 col-xs-12">
                    <li class="menu-header">{{ $value->topic }}</li>
                    @foreach($course as $keys=> $val)
                        @if($value->id == $val->topic_id)
                        <li class="menu-item"><a href="/course/{{ $val->slug }}">{{ $val->name }}</a></li>
                        @endif
                    @endforeach
                </ul>
            @endforeach
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
            @if(Auth::check())
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 user text-center">
                <a data-toggle="popover" data-container="body" data-placement="bottom" type="button" data-html="true" href="javascript:void(0)" id="login">
                    @if(Auth::user()->image_url !== null)
                    <span class="user-icon-profile"><img src="{{ URL::asset('uploads/profile/'.Auth::user()->image_url) }}" width="50px" height="50px" class="img-circle"></span>
                    @else
                    <span class="user-icon fa fa-user-o"></span>
                    @endif
                    <span class="user-logo">{{ Auth::user()->name }}</span>
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
            <div id="popover-content-login" class="hide">
                <ul class="list-group">
                    @if(Auth::user()->role == 'admin')
                    <a href="/admin" class="list-group-item">Administrator</a>
                    @endif
                    <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();" class="list-group-item">Log out</a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </ul>
            </div>
            @else
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 user text-center">
                <a href="{{ url('/login') }}" class="wrap-user">
                    <span class="fa fa-user-o user-icon"></span>
                    <span class="user-logo">Sign in</span>
                </a>
            </div>
            @endif
        </div>
    </div>

    @yield('content')
    
    <!-- footer -->
    <div class="footer-bottom container-fluid">
            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                <div class="footer-menu">
                @foreach ($pages as $key => $value)
                    <a href="/page/{{ $value->slug }}">{{ $value->title }}</a>
                @endforeach
                </div>
                <div class="footer-logo">
                    <img src="{{ URL::asset('img/logo.png') }}" width="120">
                </div>
                <span class="copyright">
                    &copy;<a href="https://www.qureta.com">Qureta</a>  2017
                </span>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 playstore-logo">
                    <a href="#" class="footer-icon-store">
                        <img src="{{ URL::asset('img/appstore.png') }}">
                    </a>
                    <a href="#" class="footer-icon-store">
                        <img src="{{ URL::asset('img/playstore.png') }}">
                    </a>
            </div>
    </div>

    <script type="text/javascript" src="{{ URL::asset('/js/mjs.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/js/owl.carousel.min.js') }}"></script>
    <script>
        function parent(val) {
            console.log(val)
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
          $(".owl-carousel").owlCarousel();
        });
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items:1,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true
        });

        $("[data-toggle=popover]").each(function(i, obj) {
            $(this).popover({
              html: true,
              content: function() {
                var id = $(this).attr('id')
                return $('#popover-content-' + id).html();
              }
            });
        });
    </script>
</body>
</html>
