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
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}">
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

	@foreach($course as $key => $value)
	<div class="wrapper page">
		<div class="container">
			<div class="row">
				<h3 class="font-roboto-condensed">{{ $value->name }}</h3>
				<div class="row">
					<div class="col-xs-12 col-md-7">
						<h4 class="font-roboto-condensed no-margin">{{ $value->teachers->name }}</h4>						
					</div>
					<div class="col-xs-12 col-md-5 icon-wrapper">
						<ul class="wrap-icon">
							<li>
								<a href="#"><span class="fa fa-bookmark-o icon-video" aria-hidden="true"></span>
								218 peserta</a>
							</li>
							<li>
								<a href="#"><span class="fa fa-thumbs-o-up icon-video" aria-hidden="true"></span>
								126 Likes</a>
							</li>
							<li>
								<a href="javascript:void(0)" id="change-layout"><span class="fa fa-columns icon-video" aria-hidden="true"></span>
								Layout</a>
							</li>
							<li>
								<a href="#"><span class="fa fa-share icon-video" aria-hidden="true"></span>
								Share</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" id="video-wrapper">
						<div id="player"></div>
						<script type="text/javascript">
							var tag = document.createElement('script');
							tag.src = "https://www.youtube.com/iframe_api";
						    var firstScriptTag = document.getElementsByTagName('script')[0];
						    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
						    
						    var player;
						    function onYouTubeIframeAPIReady() {
						      player = new YT.Player('player', {
						        width: '75%',
						        videoId: '-D14dMMyahM',
						        events: {
						          'onReady': onPlayerReady,
						          'onStateChange': onPlayerStateChange
						        }
						      });
						    }

						    function onPlayerReady(event) {
						      event.target.playVideo();
						    }

						    var done = false;
						    function onPlayerStateChange(event) {
						      if (event.data == YT.PlayerState.PLAYING && !done) {
						        setTimeout(stopVideo, 6000);
						        done = true;
						      }
						    }

						    function stopVideo() {
						      player.stopVideo();
						    }
						
						</script>
						<!-- <video width="75%" height="auto" controls src="https://www.youtube.com/watch?v=-D14dMMyahM" >
							<source src="https://www.youtube.com/watch?v=AzBwVzsfkOE" type="video/mp4">
							Your browser does not support the video tag.
						</video> -->
					</div>
					<div class="col-md-3" id="video-bottom">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#materi">Materi</a></li>
						</ul>

						<div class="tab-content">
							<div id="materi" class="overflow-tag tab-pane fade in active">
								<ul class="nav-materi">
									<li class="chapter">
										<ul class="chapter-inner">
											<li class="duration-now">
												<a href="#">
													<span class="chapter-title">Welcome</span>
													<span class="chapter-duration">56s</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="chapter-title">What you should know</span>
													<span class="chapter-duration">58s</span>
												</a>
											</li>
										</ul>
									</li>
									<li class="chapter">
										<a data-toggle="collapse" href="javascript:void(0)" data-target="#chapter-part-1">
											1. Prepare <span class="fa fa-chevron-down" aria-hidden="true"></span>
										</a>
										<div id="chapter-part-1" class="collapse in">
											<ul class="chapter-inner">
											<li>
												<a href="#">
													<span class="fa fa-lock" aria-hidden="true"></span>
													<span class="chapter-title">Welcome</span>
													<span class="chapter-duration">56s</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="fa fa-lock" aria-hidden="true"></span>
													<span class="chapter-title">What you should know</span>
													<span class="chapter-duration">58s</span>
												</a>
											</li>
										</ul>
										</div>
									</li>
									<li class="chapter">
										<a data-toggle="collapse" href="javascript:void(0)" data-target="#chapter-part-2">
											2. Prepare <span class="fa fa-chevron-down" aria-hidden="true"></span>
										</a>
										<div id="chapter-part-2" class="collapse in">
											<ul class="chapter-inner">
											<li>
												<a href="#">
													<span class="fa fa-lock" aria-hidden="true"></span>
													<span class="chapter-title">Welcome</span>	
													<span class="chapter-duration">56s</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="fa fa-lock" aria-hidden="true"></span>
													<span class="chapter-title">What you should know</span>
													<span class="chapter-duration">58s</span>
												</a>
											</li>
										</ul>
										</div>
									</li>
									<li class="chapter">
										<a data-toggle="collapse" href="javascript:void(0)" data-target="#chapter-part-3">
											3. Prepare <span class="fa fa-chevron-down" aria-hidden="true"></span>
										</a>
										<div id="chapter-part-3" class="collapse in">
											<ul class="chapter-inner">
											<li>
												<a href="#">
													<span class="fa fa-lock" aria-hidden="true"></span>
													<span class="chapter-title">Welcome</span>
													<span class="chapter-duration">56s</span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="fa fa-lock" aria-hidden="true"></span>
													<span class="chapter-title">What you should know</span>
													<span class="chapter-duration">58s</span>
												</a>
											</li>
										</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-9" id="video-bottom-text">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#silabus">Silabus</a></li>
							<li><a data-toggle="tab" href="#diskusi">Diskusi</a></li>
							<li><a data-toggle="tab" href="#pengumuman">Pengumuman</a></li>
							<li><a data-toggle="tab" href="#sertifikat">Sertifikat</a></li>
						</ul>

						<div class="tab-content">
							<div id="silabus" class="tab-pane fade in active">
								<h3 class="title-materi font-roboto-condensed">Tentang mata kuliah</h3>
								<span class="tag-materi">33m 38s - General - Release : {{ $value->created_at }}</span>
								<p>{{ $value->description }}</p>
							</div>
							<div id="diskusi" class="tab-pane fade">
								<h3 class="title-materi font-roboto-condensed">Diskusi</h3>
								<p>Curabitur malesuada tellus mattis placerat venenatis. Nullam aliquam sem at tellus condimentum commodo. Quisque interdum massa et mauris pulvinar, non ultricies sapien dignissim. Sed porta pharetra enim, in elementum massa dapibus a. Nunc ut quam lobortis, convallis neque eleifend, dapibus diam. Nullam pulvinar condimentum justo, nec ultrices sapien volutpat ut. Fusce ut egestas orci. Etiam tempor est ut ipsum interdum, sed sollicitudin urna malesuada. Aenean non viverra tellus. Integer sit amet ultrices nulla. Vestibulum elementum dapibus vulputate. Duis tincidunt scelerisque ipsum id pharetra. Morbi aliquam nibh eu eros tempor, ac elementum ex accumsan. Mauris maximus risus pulvinar justo finibus, eu dictum lectus viverra. Mauris mi erat, sollicitudin at nisl sit amet, vulputate tincidunt sapien.</p>
								<p>Duis iaculis faucibus placerat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer congue leo urna, at pretium risus lacinia nec. Proin vitae odio ac ex scelerisque placerat ut id elit. Pellentesque bibendum leo vulputate, fermentum neque sit amet, pretium justo. Fusce vitae elementum tortor. Ut quam nibh, molestie eu pretium id, vehicula ut mi. Pellentesque vitae nisi vestibulum, feugiat sapien sed, iaculis dolor. Vivamus vitae nisl nec urna placerat vulputate. Proin sodales, sem id gravida vulputate, turpis lectus cursus nunc, eu gravida justo nibh ac massa. Suspendisse potenti. Sed porttitor condimentum turpis, sed finibus urna commodo vitae. Duis porttitor semper erat at ornare. Nulla non ultrices erat. Nunc ultricies, ante nec gravida dictum, ante urna posuere eros, vitae gravida sapien odio nec justo.</p>
							</div>
							<div id="pengumuman" class="tab-pane fade">
								<h3 class="title-materi font-roboto-condensed">Pengumuman</h3>
								<p>{{ $value->announcement }}</p>
							</div>
							<div id="sertifikat" class="tab-pane fade">
								<h3 class="title-materi font-roboto-condensed">Sertifikat</h3>
								<p>Curabitur malesuada tellus mattis placerat venenatis. Nullam aliquam sem at tellus condimentum commodo. Quisque interdum massa et mauris pulvinar, non ultricies sapien dignissim. Sed porta pharetra enim, in elementum massa dapibus a. Nunc ut quam lobortis, convallis neque eleifend, dapibus diam. Nullam pulvinar condimentum justo, nec ultrices sapien volutpat ut. Fusce ut egestas orci. Etiam tempor est ut ipsum interdum, sed sollicitudin urna malesuada. Aenean non viverra tellus. Integer sit amet ultrices nulla. Vestibulum elementum dapibus vulputate. Duis tincidunt scelerisque ipsum id pharetra. Morbi aliquam nibh eu eros tempor, ac elementum ex accumsan. Mauris maximus risus pulvinar justo finibus, eu dictum lectus viverra. Mauris mi erat, sollicitudin at nisl sit amet, vulputate tincidunt sapien.</p>
								<p>Duis iaculis faucibus placerat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer congue leo urna, at pretium risus lacinia nec. Proin vitae odio ac ex scelerisque placerat ut id elit. Pellentesque bibendum leo vulputate, fermentum neque sit amet, pretium justo. Fusce vitae elementum tortor. Ut quam nibh, molestie eu pretium id, vehicula ut mi. Pellentesque vitae nisi vestibulum, feugiat sapien sed, iaculis dolor. Vivamus vitae nisl nec urna placerat vulputate. Proin sodales, sem id gravida vulputate, turpis lectus cursus nunc, eu gravida justo nibh ac massa. Suspendisse potenti. Sed porttitor condimentum turpis, sed finibus urna commodo vitae. Duis porttitor semper erat at ornare. Nulla non ultrices erat. Nunc ultricies, ante nec gravida dictum, ante urna posuere eros, vitae gravida sapien odio nec justo.</p>
							</div>
						</div>

						<div class="content-footer">
							<h3 class="title-materi">Pengajar</h3>
							<div class="row" style="margin:0;">
								<div class="col-xs-1" style="padding:0 10px"><img src="{{ URL::asset('img/'.$value->teachers->url_foto) }}" class="img-circle img-pengajar"></div>
								<div class="col-xs-11 no-padding">
									<h4 class="no-margin">{{ $value->teachers->name }}</h4>
									<h5 class="no-margin">Pengajar Materi</h5>
									<a class="profile-pengajar" href="#">Lihat Profile Lengkap</a>
								</div>
							</div>
						</div>
						
						<hr class="seperator">
						
						<h3 class="title-materi">218 Orang terdaftar dalam mata kuliah ini</h3>
						<div class="row" style="margin:0;">
							<div class="col-xs-12">
								<h3 class="title-materi no-margin">Profesi Mereka</h3>
								<div class="col-xs-3 no-padding">
								<ul class="profesi">
									<li>Mahasiswa</li>
									<li>Karyawan</li>
									<li>Pedagang</li>
									<li>Pengusaha</li>
									<li>Guru</li>
								</ul>
								</div>
								<div class="col-xs-3 no-padding">
								<ul class="profesi">
									<li>Pelajar</li>
									<li>Mekanik</li>
								</ul>			
								</div>
							</div>
						</div>

						<hr class="seperator">

						<div class="row" style="margin:0">
							<h3 class="title-materi no-margin">Mata kuliah Terkait</h3>
							<div class="row materi-terkait">
								<div class="col-xs-3"><img src="" class="img"></div>
								<div class="col-xs-9">
									<a href="#"><h5 class="no-margin">Course</h5></a>
									<a href="http://google.com"><h4 style="font-weight: 600">Writing a Business Report</h4></a>
									<div class="materi-terkait-footer">
										<span class="duration">1h 58m</span>
										<a href="#"><span class="fa fa-bookmark-o" aria-hidden="true"></span></a>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach

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
					<img src="img/logo.png">
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
</body>
</html> 