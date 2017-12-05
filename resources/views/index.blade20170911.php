<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kuliah Qureta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- load css -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') . '?v=' . filemtime('./css/style.css') }}" />
	<!-- load cdn google font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">
	<!-- load script -->
	<script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
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
				<a href="http://www.qureta.com/login" class="wrap-user">
					<span class="fa fa-user-o user-icon"></span>
					<span class="user-logo">Sign in</span>
				</a>
			</div>
		</div>
	</div>

	<!-- start content -->
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center banner">
					<div class="owl-carousel">
						@foreach ($slider as $key => $value)
					 	<div><img src="{{ URL::asset('/img/'.$value->url) }}"></div>
					 	@endforeach
					</div>
					<!-- <img src="img/banner.jpg" class="img"> -->
				</div>
			</div>
		</div>

		<div class="container-fluid teacher-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h3 class="title-teacher">Para Pengajar</h3>
					</div>
					<div class="row-fluid">
					    @foreach ($teachers as $key=>$value)
					    <!-- {{ $value }} -->
					    <div class="col-md-5ths">
						    <div class="col-md-12 col-xs-6 frame-pengajar">
								<div class="col-xs-4 no-padding">
									<img src="{{ URL::asset('img/'.$value->url_foto) }}" class="img avatar-teacher">
								</div>
								<div class="col-xs-8">
									<h5><strong>{{ $value->name }}</strong></h5>
									<h6>{{ $value->job }}</h6>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		
		<div class="container no-padding">
			<div class="row content">
				<div class="col-xs-12"><h3 class="title">Mata Kuliah Terbaru</h3></div>
				<?php
					$shows = empty($show)?2:$show;
				?>
				@foreach($courseLast as $key => $value)
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-1-1">
						<!--img src="{{ URL::asset('/img/'.$value->url_foto) }}" class="img full-width"-->
						<img src="http://lorempixel.com/262/180/nature/<?php echo rand(1,10) ?>" class="img full-width">
						<div class="text-pengajar">
							<h4>{{ $value->topics->code }}</h4>
							<h4>{{ $value->name }}</h4>
							<span>Pengajar: {{ $value->teachers->name }}</span>
						</div>
						<div class="row footer-pengajar">
							<div class="col-sm-10 col-xs-10">
								<span class="text">67,349 Peserta</span>
							</div>
							<div class="col-sm-2 col-xs-2">
								<a href="#">
									<span class="fa fa-bookmark-o" aria-hidden="true"></span>
								</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<div class="text-center frame-materi-more col-lg-12">
					<a href="/home/more/{{$shows}}">Show more <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>

		@foreach ($topics as $key => $value)
		<div class="container no-padding">
			<div class="row content">
				<div class="col-xs-12"><h3 class="title">{{ $value->topic }} ({{ $value->code }})</h3></div>
				@if ($value->id == 1)
					<?php $course = $courseIs; ?>
				@elseif ($value->id == 2)
					<?php $course = $courseEb; ?>
				@elseif ($value->id == 3)
					<?php $course = $courseSt; ?>
				@elseif ($value->id == 4)
					<?php $course = $courseIk; ?>
				@elseif ($value->id == 5)
					<?php $course = $courseSb; ?>
				@endif

				@foreach($course as $keys => $values)
				<!-- {{$values}} -->
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-2-1">
						<!--img src="{{ URL::asset('/img/'.$values->url_foto) }}" class="img full-width"-->
						<img src="http://lorempixel.com/262/180/people/<?php echo rand(1,10) ?>" class="img full-width">
						<div class="text-pengajar">
							<h4>{{ $values->topics->code }}</h4>
							<h4>{{ $values->name }}</h4>
							<span>Pengajar: {{ $values->teachers->name }}</span>
						</div>
						<div class="row footer-pengajar">
							<div class="col-sm-9 col-xs-8">
								<span class="text">67,349 Peserta</span>
							</div>
							<div class="col-sm-3 col-xs-4">
								<a href="#">
									<span class="fa fa-bookmark-o" aria-hidden="true"></span>
								</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<div class="text-center frame-materi-more col-lg-12">
					<a href="/home/{{$values->topics->id}}">Show more <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>	
		@endforeach
	</div>

	<!-- footer -->
	<div class="footer-bottom container-fluid">
			<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
				<div class="footer-menu">
				@foreach ($pages as $key => $value)
					<a href="{{ $value->content }}">{{ $value->title }}</a>
				@endforeach
				</div>
				<div class="footer-logo">
					<img src="{{ URL::asset('img/logo.png') }}" width="120">
				</div>
				<span class="copyright">
					&copy; Qureta 2017
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
	</script>
</body>
</html> 