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
    <meta name="csrf-token" content="{{ csrf_token() }}" />

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
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/bootstrap-switch.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css'). '?v=' . filemtime('./css/style.css') }}">
    <!-- froalaplugin -->
    <link rel="stylesheet" href="{{ URL::asset('froala/css/froala_editor.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('froala/css/froala_style.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
    <link rel="stylesheet" href="{{ URL::asset('froala/css/plugins/char_counter.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('froala/css/plugins/code_view.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('froala/css/plugins/colors.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('froala/css/plugins/emoticons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('froala/css/plugins/file.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('froala/css/plugins/fullscreen.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('froala/css/plugins/image.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('froala/css/plugins/image_manager.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('froala/css/plugins/line_breaker.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('froala/css/plugins/quick_insert.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('froala/css/plugins/table.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('froala/css/plugins/video.css') }}">
    <!-- load cdn google font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">
    <!-- load script -->
    <script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/js/bootstrap-switch.min.js') }}"></script>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ URL::asset('/js/global.js') }}"></script>
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
                <!-- <a href="#" class="menu-icon" id="toggle"><img src="{{ URL::asset('/img/menu.svg') }}"></a> -->

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
                    <span class="user-icon-profile"><img src="{{ URL::asset('uploads/profile/'.Auth::user()->image_url) }}" width="42px" height="42px" class="img-circle" style="border: 2px solid #635b5b;"></span>
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

    <!-- forala js plugin -->
    <script type="text/javascript" src="{{ URL::asset('froala/js/froala_editor.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/align.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/char_counter.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/code_beautifier.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/code_view.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/colors.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/emoticons.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/entities.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/file.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/font_size.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/fullscreen.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/image.min.js') }}"></script>
    <!--script type="text/javascript" src="{{ URL::asset('froala/js/plugins/image_manager.min.js') }}"></script-->
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/inline_style.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/line_breaker.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/link.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/lists.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/paragraph_format.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/paragraph_style.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/quick_insert.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/quote.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/table.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/save.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/url.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('froala/js/plugins/video.min.js') }}"></script>
    <!-- end -->
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
