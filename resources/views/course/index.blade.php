@extends('layouts.template')

@section('content')

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
						    
						    var urlVideo = '{{ $url_video }}';

						    var player;

						    function onYouTubeIframeAPIReady() {
						      player = new YT.Player('player', {
						        width: '75%',
						        videoId: urlVideo,
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
									@foreach($chapters as $keys => $values)
										@if($values->parent == 2)
										<li class="chapter">
											<ul class="chapter-inner">
												<li class="duration-now">
													<a href="/course/{{$value->slug}}/{{ $values->slug }}">
														<span class="chapter-title">{{ $values->name }}</span>
														<span class="chapter-duration">{{ $values->duration }}s</span>
													</a>
												</li>
											</ul>
										</li>
										@else
										<li class="chapter">
											<a data-toggle="collapse" href="javascript:void(0)" data-target="#{{ $values->slug }}"> {{ $values->name }} <span class="fa fa-chevron-down" aria-hidden="true"></span>
											</a>
											<div id="{{ $values->slug }}" class="collapse in">
												<ul class="chapter-inner">
												@foreach($lectures as $keyz => $valuez)
													@if($values->id == $valuez->chapter_id)

													<li>
														<a href="/course/{{ $value->slug }}/{{ $values->slug }}/{{ $valuez->slug }}">
															<span class="fa fa-lock" aria-hidden="true"></span>
															<span class="chapter-title">{{ $valuez->name }}</span>
															<span class="chapter-duration">{{ $values->duration }}</span>
														</a>
													</li>
													@endif
												@endforeach
											</ul>
											</div>
										</li>
										@endif
									@endforeach
									
									@foreach($quiz as $keys => $values)
									<li class="chapter">
										<ul class="chapter-inner">
											<li class="duration-now">
												<a href="javascript:void(0)">
													<span class="chapter-title">{{ $values->name }}</span>
												</a>
											</li>
										</ul>
									</li>
									@endforeach
									
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
							@foreach($materi as $key => $value)
								<div class="row materi-terkait">
									<div class="col-xs-3"><img src="{{ URL::asset('img/'.$value->url_foto) }}" class="img"></div>
									<div class="col-xs-9">
										<h5 class="no-margin">Course</h5>
										<a href="/course/{{ $value->slug }}"><h4 style="font-weight: 600">{{ $value->name }}</h4></a>
										<div class="materi-terkait-footer">
											<span class="duration">1h 58m</span>
											<a href="#"><span class="fa fa-bookmark-o" aria-hidden="true"></span></a>
										</div>
									</div>
								</div>
							@endforeach
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach

@endsection