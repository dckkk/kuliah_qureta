<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kuliah Qureta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- load css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- load cdn google font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">
	<!-- load script -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
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
					<img class="logo" src="img/logo.png" style="width:80%">
				</a>
					<!-- ul.menu-list*3>li.menu-header{header $}r+li.menu-item*7>a[href=#]{menu $} -->
				
			</div>
			<div class="col-lg-8 col-md-7 col-sm-10 col-xs-6 search-bar">
				<a href="#" class="menu-icon" id="toggle"><img src="img/menu.svg"></a>

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
					 	<div><img src="img/1.png"></div>
					 	<div><img src="img/2.png"></div>
					 	<div><img src="img/3.png"></div>
					 	<div><img src="img/4.png"></div>
					 	<div><img src="img/5.png"></div>
					 	<div><img src="img/6.png"></div>
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
									<img src="img/{{ $value->url_foto }}" class="img avatar-teacher">
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
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-1-1">
						<a class="remove-icon hide" id="button-frame-1-1" href="#">
							<span class="fa fa-times" aria-hidden="true"></span>
						</a>
						<img src="img/pic2.jpg" class="img full-width">
						<div class="text-pengajar">
							<h4>SB</h4>
							<h4>Dasar-Dasar Penulisan Esai</h4>
							<span>Pengajar: Jhon Doe</span>
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
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-1-2">
						<a class="remove-icon hide" id="button-frame-1-2" href="#">
							<span class="fa fa-times" aria-hidden="true"></span>
						</a>
						<img src="img/pic2.jpg" class="img full-width">
						<div class="text-pengajar">
							<h4>SB</h4>
							<h4>Dasar-Dasar Penulisan Esai</h4>
							<span>Pengajar: Jhon Doe</span>
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
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-1-3">
						<a class="remove-icon hide" id="button-frame-1-3" href="#">
							<span class="fa fa-times" aria-hidden="true"></span>
						</a>
						<img src="img/pic2.jpg" class="img full-width">
						<div class="text-pengajar">
							<h4>SB</h4>
							<h4>Dasar-Dasar Penulisan Esai</h4>
							<span>Pengajar: Jhon Doe</span>
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
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-1-4">
						<a class="remove-icon hide" id="button-frame-1-4" href="#">
							<span class="fa fa-times" aria-hidden="true"></span>
						</a>
						<img src="img/pic2.jpg" class="img full-width">
						<div class="text-pengajar">
							<h4>SB</h4>
							<h4>Dasar-Dasar Penulisan Esai</h4>
							<span>Pengajar: Jhon Doe</span>
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
				<div class="text-center frame-materi-more col-lg-12">
					<a href="#">Show more <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>

		<div class="container no-padding">
			<div class="row content">
				<div class="col-xs-12"><h3 class="title">Mata Kuliah Terbaru</h3></div>
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-2-1">
						<a class="remove-icon hide" id="button-frame-2-1" href="#">
							<span class="fa fa-times" aria-hidden="true"></span>
						</a>
						<img src="img/pic2.jpg" class="img full-width">
						<div class="text-pengajar">
							<h4>SB</h4>
							<h4>Dasar-Dasar Penulisan Esai</h4>
							<span>Pengajar: Jhon Doe</span>
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
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-2-2">
						<a class="remove-icon hide" id="button-frame-2-2" href="#">
							<span class="fa fa-times" aria-hidden="true"></span>
						</a>
						<img src="img/pic2.jpg" class="img full-width">
						<div class="text-pengajar">
							<h4>SB</h4>
							<h4>Dasar-Dasar Penulisan Esai</h4>
							<span>Pengajar: Jhon Doe</span>
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
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-2-3">
						<a class="remove-icon hide" id="button-frame-2-3" href="#">
							<span class="fa fa-times" aria-hidden="true"></span>
						</a>
						<img src="img/pic2.jpg" class="img full-width">
						<div class="text-pengajar">
							<h4>SB</h4>
							<h4>Dasar-Dasar Penulisan Esai</h4>
							<span>Pengajar: Jhon Doe</span>
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
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-2-4">
						<a class="remove-icon hide" id="button-frame-2-4" href="#">
							<span class="fa fa-times" aria-hidden="true"></span>
						</a>
						<img src="img/pic2.jpg" class="img full-width">
						<div class="text-pengajar">
							<h4>SB</h4>
							<h4>Dasar-Dasar Penulisan Esai</h4>
							<span>Pengajar: Jhon Doe</span>
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
				<div class="text-center frame-materi-more col-lg-12">
					<a href="#">Show more <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>

		<div class="container no-padding">
			<div class="row content">
				<div class="col-xs-12"><h3 class="title">Mata Kuliah Terbaru</h3></div>
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-3-1">
						<a class="remove-icon hide" id="button-frame-3-1" href="#">
							<span class="fa fa-times" aria-hidden="true"></span>
						</a>
						<img src="img/pic2.jpg" class="img full-width">
						<div class="text-pengajar">
							<h4>SB</h4>
							<h4>Dasar-Dasar Penulisan Esai</h4>
							<span>Pengajar: Jhon Doe</span>
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
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-3-2">
						<a class="remove-icon hide" id="button-frame-3-2" href="#">
							<span class="fa fa-times" aria-hidden="true"></span>
						</a>
						<img src="img/pic2.jpg" class="img full-width">
						<div class="text-pengajar">
							<h4>SB</h4>
							<h4>Dasar-Dasar Penulisan Esai</h4>
							<span>Pengajar: Jhon Doe</span>
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
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-3-3">
						<a class="remove-icon hide" id="button-frame-3-3" href="#">
							<span class="fa fa-times" aria-hidden="true"></span>
						</a>
						<img src="img/pic2.jpg" class="img full-width">
						<div class="text-pengajar">
							<h4>SB</h4>
							<h4>Dasar-Dasar Penulisan Esai</h4>
							<span>Pengajar: Jhon Doe</span>
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
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-3-4">
						<a class="remove-icon hide" id="button-frame-3-4" href="#">
							<span class="fa fa-times" aria-hidden="true"></span>
						</a>
						<img src="img/pic2.jpg" class="img full-width">
						<div class="text-pengajar">
							<h4>SB</h4>
							<h4>Dasar-Dasar Penulisan Esai</h4>
							<span>Pengajar: Jhon Doe</span>
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
				<div class="text-center frame-materi-more col-lg-12">
					<a href="#">Show more <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>

		<div class="container no-padding">
			<div class="row content">
				<div class="col-xs-12"><h3 class="title">Mata Kuliah Terbaru</h3></div>
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-4-1">
						<a class="remove-icon hide" id="button-frame-4-1" href="#">
							<span class="fa fa-times" aria-hidden="true"></span>
						</a>
						<img src="img/pic2.jpg" class="img full-width">
						<div class="text-pengajar">
							<h4>SB</h4>
							<h4>Dasar-Dasar Penulisan Esai</h4>
							<span>Pengajar: Jhon Doe</span>
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
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-4-2">
						<a class="remove-icon hide" id="button-frame-4-2" href="#">
							<span class="fa fa-times" aria-hidden="true"></span>
						</a>
						<img src="img/pic2.jpg" class="img full-width">
						<div class="text-pengajar">
							<h4>SB</h4>
							<h4>Dasar-Dasar Penulisan Esai</h4>
							<span>Pengajar: Jhon Doe</span>
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
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-4-3">
						<a class="remove-icon hide" id="button-frame-4-3" href="#">
							<span class="fa fa-times" aria-hidden="true"></span>
						</a>
						<img src="img/pic2.jpg" class="img full-width">
						<div class="text-pengajar">
							<h4>SB</h4>
							<h4>Dasar-Dasar Penulisan Esai</h4>
							<span>Pengajar: Jhon Doe</span>
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
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-4-4">
						<a class="remove-icon hide" id="button-frame-4-4" href="#">
							<span class="fa fa-times" aria-hidden="true"></span>
						</a>
						<img src="img/pic2.jpg" class="img full-width">
						<div class="text-pengajar">
							<h4>SB</h4>
							<h4>Dasar-Dasar Penulisan Esai</h4>
							<span>Pengajar: Jhon Doe</span>
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
				<div class="text-center frame-materi-more col-lg-12">
					<a href="#">Show more <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>	
	</div>

	<!-- footer -->
	<div class="footer-bottom container-fluid">
			<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
				<div class="footer-menu">
					<a href="#">Tentang</a>
					<a href="#">Kontak</a>
					<a href="#">Bantuan</a>
					<a href="#">Karir</a>
					<a href="#">Penggunaan</a>
					<a href="#">Privasi</a>
				</div>
				<div class="footer-logo">
					<img src="img/logo.png" width="120">
				</div>
				<span class="copyright">
					&copy; Qureta 2017
				</span>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 playstore-logo">
					<a href="#" class="footer-icon-store">
						<img src="img/appstore.png">
					</a>
					<a href="#" class="footer-icon-store">
						<img src="img/playstore.png">
					</a>
			</div>
	</div>

	<script type="text/javascript" src="js/mjs.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
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