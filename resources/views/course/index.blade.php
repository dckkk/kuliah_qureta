@extends('layouts.app')

@section('og')
<meta property="fb:app_id" content="1800357880247740" />
<meta property="og:url" content="{{ url('/course/'.$course->slug) }}" />
<meta property="og:title" content="{{ $course->name }}" />
<meta property="og:image" content="{{ URL::asset('/uploads/course/'.$course->url_foto) }}" />
<meta property="og:image:width" content="640" />
<meta property="og:image:height" content="442" />
<meta property="og:type" content="article" />
<meta property="og:description" content="{{ substr(strip_tags($course->description), 0, 500) }}">
<meta name="shareaholic:image" content="{{ URL::asset('/uploads/course/'.$course->url_foto) }}" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ url('/course/'.$course->slug) }}">
<meta name="twitter:description" content="{{ substr(strip_tags($course->description), 0, 500) }}">
<meta name="twitter:text:description" content="{{ substr(strip_tags($course->description), 0, 500) }}">
<meta name="twitter:title" content="{{ $course->name }}">
<meta name="twitter:image" content="{{ URL::asset('/uploads/course/'.$course->url_foto) }}" />
@endsection

@section('content')
	@if(Auth::check())
		@if(enrolled($course->id))
			<div class="wrapper page">
				<div class="container">
					<div class="">
						<h3 class="font-roboto-condensed">{{ $course->name }}</h3>
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<h4 class="font-roboto-condensed no-margin">{{ $course->teachers->name }}</h4>
							</div>
							<div class="col-xs-12 col-md-4 icon-wrapper">
								<ul class="wrap-icon" style="padding: 18px 0 20px 0;">
									<li>
										<span class="fa fa-bookmark icon-video" aria-hidden="true"></span>
										{{ courseUser($course->id) }} peserta
									</li>
									<li>
										@if(liked($course->id))
										<a href="javascript:void(0)" onclick="unlike({{ $course->id }}, '{{ Auth::user()->id }}')">
											<span id="likes-{{$course->id}}" class="fa fa-thumbs-up icon-video" aria-hidden="true"></span>
											<span id="userlike-{{$course->id}}">{{ courseLikes($course->id) }} Likes</span>
										</a>
										@else
										<a href="javascript:void(0)" onclick="like({{ $course->id }}, '{{ Auth::user()->id }}')">
											<span id="likes-{{$course->id}}" class="fa fa-thumbs-o-up icon-video" aria-hidden="true"></span>
											<span id="userlike-{{$course->id}}">{{ courseLikes($course->id) }} Likes</span>
										</a>
										@endif
									</li>
									<li>
										<a href="javascript:void(0)" id="change-layout"><span class="fa fa-columns icon-video" aria-hidden="true"></span>
										Layout</a>
									</li>
									<li>
										<!--a href="#"><span class="fa fa-share icon-video" aria-hidden="true"></span>
										Share</a-->
									</li>
								</ul>
							</div>
							<div class="col-xs-12 col-md-2 shareaholic-canvas" style="clear:none" data-app="share_buttons" data-app-id="27820160"></div>
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
								        playerVars: {rel: 0},
								        events: {
								          'onReady': onPlayerReady,
									      'onStateChange': onPlayerStateChange,
									      // 'onPlaybackQualityChange': onPlayerPlaybackQualityChange,
									      // 'onError': onPlayerError
								        }
								      });
								    }

								    function onPlayerReady(event) {
								      event.target.playVideo();
								    }

								    var done = false;
								    function onPlayerStateChange(event) {
								      if (event.data == YT.PlayerState.PLAYING && !done) {
								        // setTimeout(stopVideo, 0);
								        done = true;
								      }
								    }

								    // function stopVideo() {
								    //   player.stopVideo();
								    // }

								</script>
								<!-- <video width="75%" height="auto" controls src="https://www.youtube.com/watch?v=-D14dMMyahM" >
									<source src="https://www.youtube.com/watch?v=AzBwVzsfkOE" type="video/mp4">
									Your browser does not support the video tag.
								</video> -->
							</div>
							<div class="col-md-3" id="video-bottom" style="height: 1907px;">
								<ul class="nav nav-tabs materi">
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
															<a href="/course/{{$course->slug}}/{{ $values->slug }}">
																<span class="chapter-title">{{ $values->name }}</span>
																<span class="chapter-duration">{{ $values->duration }}</span>
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
																<a href="/course/{{ $course->slug }}/{{ $values->slug }}/{{ $valuez->slug }}">
																	<!-- <span class="fa fa-lock" aria-hidden="true"></span> -->
																	<span class="chapter-title">{{ $valuez->name }}</span>
																	<span class="chapter-duration">{{ $valuez->duration }}</span>
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
															<span class="chapter-title" data-toggle="modal" data-target=".modal-dialog">{{ $values->name }}</span>
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
									<li class="materi1 active" style="display: none"><a data-toggle="tab" href="#materi1">Materi</a></li>
									<li class="silabus active"><a data-toggle="tab" href="#silabus">Silabus</a></li>
									<li class="silabus1" style="display: none"><a data-toggle="tab" href="#silabus1">Silabus</a></li>
									<!-- <li><a data-toggle="tab" href="#diskusi">Diskusi</a></li> -->
									<li><a data-toggle="tab" href="#pengumuman">Pengumuman</a></li>
									<!-- <li><a data-toggle="tab" href="#sertifikat">Sertifikat</a></li> -->
								</ul>
								<!--desktop-->
								<div class="tab-content">
									<div id="silabus" class="tab-pane fade in active">
										<h3 class="title-materi font-roboto-condensed">Tentang mata kuliah</h3><?php
											$release = substr($course->created_at, 0, 10);
											$arr = explode('-', $release);
											$release = $arr[2].'/'.$arr[1].'/'.$arr[0];
										?>
										<span class="tag-materi">Release : {{ $release }}</span>
										<p>{!! $course->description !!}</p>
										<div class="content-footer">
											<h3 class="title-materi">Pengajar</h3>
											<div class="row" style="margin:0;">
												<div class="col-xs-1"><img width="90px" height="90px" src="{{ URL::asset('uploads/teacher/'.$course->teachers->url_foto) }}" class="img-circle"></div>
												<div class="col-xs-11" style="left: 25px">
													<h4 class="no-margin">{{ $course->teachers->name }}</h4>
													<h5 class="no-margin">{{$course->teachers->job}}</h5>
													<a class="profile-pengajar" href="/teacher/{{$course->teachers->id}}">Lihat Profile Lengkap</a>
												</div>
											</div>

											@if($course->teachers2 !== null)
												<div class="row" style="margin:0;">
													<div class="col-xs-1"><img width="90px" height="90px" src="{{ URL::asset('uploads/teacher/'.$course->teachers2->url_foto) }}" class="img-circle"></div>
													<div class="col-xs-11" style="left: 25px">
														<h4 class="no-margin">{{ $course->teachers2->name }}</h4>
														<h5 class="no-margin">{{ $course->teachers2->job }}</h5>
														<a class="profile-pengajar" href="/teacher/{{$course->teachers2->id}}">Lihat Profile Lengkap</a>
													</div>
												</div>
											@endif

											@if($course->teachers3 !== null)
												<div class="row" style="margin:0;">
													<div class="col-xs-1"><img width="90px" height="90px" src="{{ URL::asset('uploads/teacher/'.$course->teachers3->url_foto) }}" class="img-circle"></div>
													<div class="col-xs-11" style="left: 25px">
														<h4 class="no-margin">{{ $course->teachers3->name }}</h4>
														<h5 class="no-margin">{{ $course->teachers3->job }}</h5>
														<a class="profile-pengajar" href="/teacher/{{$course->teachers3->id}}">Lihat Profile Lengkap</a>
													</div>
												</div>
											@endif
										</div>

										<hr class="seperator">

										<h3 class="title-materi">{{ courseUser($course->id) }} Orang terdaftar dalam mata kuliah ini. Profesi mereka adalah:</h3>
										<div class="row" style="margin:0;">
											<div class="col-xs-12">
												<!-- <h3 class="title-materi no-margin">Profesi Mereka</h3> -->
												<div class="col-xs-3 no-padding">
												<ul class="profesi">
												    @foreach($enroll_profession as $ep)
												    <li>{{ $ep->meta_value }}</li>
												    @endforeach
												</ul>
												</div>
											</div>
										</div>

										<hr class="seperator">

										<div class="row" style="margin:0">
											<h3 class="title-materi no-margin">Mata Kuliah Terkait</h3>
											@foreach($materi as $key => $value)
												<?php
													$teachers = array($value->teachers->name);

													if($value->teachers2 !== null){
														$teachers = array($value->teachers->name,$value->teachers2->name);
													}
													if($value->teachers3 !== null){
														$teachers = array($value->teachers->name,$value->teachers2->name,$value->teachers3->name);
													}

													$teacher = implode(', ', $teachers);
												?>
												<div class="row materi-terkait">
													<div class="col-xs-4"><img src="//static.adira.one/l/300x160/{{ URL::asset('uploads/course/'.$value->url_foto) }}" class="img"></div>
													<div class="col-xs-8">
														<h5 class="no-margin">{{ $value->topics->code }}</h5>
														<a href="/course/{{ $value->slug }}"><h4 style="font-weight: 600">{{ $value->name }}</h4></a>
														<span>Pengajar: {{ $teacher }}</span>
														<div class="materi-terkait-footer">
															<span class="duration" id="usercount-{{$value->id}}">{{ courseUser($value->id) }} Peserta</span>
															@if(enrolled($value->id))
															<a href="javascript:void(0)" onclick="unenroll({{ $value->id }}, '{{ Auth::user()->email }}')">
																<span id="enrolls-{{ $value->id }}" class="fa fa-bookmark" aria-hidden="true"></span>
															</a>
															@else
															<a href="javascript:void(0)" onclick="enrolling({{ $value->id }}, '{{ Auth::user()->email }}')">
																<span id="enrolls-{{ $value->id }}" class="fa fa-bookmark-o" aria-hidden="true"></span>
															</a>
															@endif
														</div>
													</div>
												</div>
											@endforeach
										</div>
									</div>
									<div id="materi1" class="tab-pane fade in active">
										<ul class="nav-materi">
											@foreach($chapters as $keys => $values)
												@if($values->parent == 2)
												<li class="chapter">
													<ul class="chapter-inner">
														<li class="duration-now">
															<a href="/course/{{$course->slug}}/{{ $values->slug }}">
																<span class="chapter-title">{{ $values->name }}</span>
																<span class="chapter-duration">{{ $values->duration }}</span>
															</a>
														</li>
													</ul>
												</li>
												@else
												<li class="chapter">
													<a data-toggle="collapse" href="javascript:void(0)" data-target="#{{ $values->slug }}1"> {{ $values->name }} <span class="fa fa-chevron-down" aria-hidden="true"></span>
													</a>
													<div id="{{ $values->slug }}1" class="collapse in">
														<ul class="chapter-inner">
														@foreach($lectures as $keyz => $valuez)
															@if($values->id == $valuez->chapter_id)

															<li>
																<a href="/course/{{ $course->slug }}/{{ $values->slug }}/{{ $valuez->slug }}">
																	<!-- <span class="fa fa-lock" aria-hidden="true"></span> -->
																	<span class="chapter-title">{{ $valuez->name }}</span>
																	<span class="chapter-duration">{{ $valuez->duration }}</span>
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
															<span class="chapter-title" data-toggle="modal" data-target=".modal-dialog">{{ $values->name }}</span>
														</a>
													</li>
												</ul>
											</li>
											@endforeach

										</ul>
									</div>
									<!--mobile-->
									<div id="silabus1" class="tab-pane fade">
										<h3 class="title-materi font-roboto-condensed">Tentang mata kuliah</h3>
										<span class="tag-materi">Release : {{ $course->created_at }}</span>
										<p>{!! $course->description !!}</p>
									</div>
									<div id="pengumuman" class="tab-pane fade">
										<h3 class="title-materi font-roboto-condensed">Pengumuman</h3>
										<p>{!! $course->announcement !!}</p>
									</div>
									<div id="sertifikat" class="tab-pane fade">
										<h3 class="title-materi font-roboto-condensed">Sertifikat</h3>
										<p>Curabitur malesuada tellus mattis placerat venenatis. Nullam aliquam sem at tellus condimentum commodo. Quisque interdum massa et mauris pulvinar, non ultricies sapien dignissim. Sed porta pharetra enim, in elementum massa dapibus a. Nunc ut quam lobortis, convallis neque eleifend, dapibus diam. Nullam pulvinar condimentum justo, nec ultrices sapien volutpat ut. Fusce ut egestas orci. Etiam tempor est ut ipsum interdum, sed sollicitudin urna malesuada. Aenean non viverra tellus. Integer sit amet ultrices nulla. Vestibulum elementum dapibus vulputate. Duis tincidunt scelerisque ipsum id pharetra. Morbi aliquam nibh eu eros tempor, ac elementum ex accumsan. Mauris maximus risus pulvinar justo finibus, eu dictum lectus viverra. Mauris mi erat, sollicitudin at nisl sit amet, vulputate tincidunt sapien.</p>
										<p>Duis iaculis faucibus placerat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer congue leo urna, at pretium risus lacinia nec. Proin vitae odio ac ex scelerisque placerat ut id elit. Pellentesque bibendum leo vulputate, fermentum neque sit amet, pretium justo. Fusce vitae elementum tortor. Ut quam nibh, molestie eu pretium id, vehicula ut mi. Pellentesque vitae nisi vestibulum, feugiat sapien sed, iaculis dolor. Vivamus vitae nisl nec urna placerat vulputate. Proin sodales, sem id gravida vulputate, turpis lectus cursus nunc, eu gravida justo nibh ac massa. Suspendisse potenti. Sed porttitor condimentum turpis, sed finibus urna commodo vitae. Duis porttitor semper erat at ornare. Nulla non ultrices erat. Nunc ultricies, ante nec gravida dictum, ante urna posuere eros, vitae gravida sapien odio nec justo.</p>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade modal-dialog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
				<div class="modal-content">
					@foreach($quiz_content as $key => $value)
					<div id="tab-quiz-{{ $value->order }}" class="tab-pane fade">
					    <div class="modal-header">
					        <h3><span class="label label-warning" id="qid">{{ $value->id }}</span> {{ $value->question }}</h3>
					    </div>
					    <div class="modal-body">
					        <div class="col-xs-3 col-xs-offset-5">
					            <div id="loadbar" style="display: none;">
					                <div class="blockG" id="rotateG_01"></div>
					                <div class="blockG" id="rotateG_02"></div>
					                <div class="blockG" id="rotateG_03"></div>
					                <div class="blockG" id="rotateG_04"></div>
					                <div class="blockG" id="rotateG_05"></div>
					                <div class="blockG" id="rotateG_06"></div>
					                <div class="blockG" id="rotateG_07"></div>
					                <div class="blockG" id="rotateG_08"></div>
					            </div>
					        </div>
					        <div class="quiz" id="quiz" data-toggle="buttons">
					        	@foreach($value->quiz_answer as $keys => $val)
						            <label class="element-animation1 btn btn-lg btn-primary btn-block" onclick="quizAnswer('{{$value->order}}')"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
						            	<input type="hidden" id="order-{{ $value->order }}" value="{{ $value->order }}">
						                <input type="radio" name="answer" value="1">{{ $val->order }} {{ $val->answer }}</label>
					            @endforeach
					        </div>
					    </div>
					</div>
					@endforeach
				</div>
			</div>
		@else
		<div class="modal" style="display: block; background-color: #000000c7" tabindex="-1" role="dialog">
		    <div class="modal-dialog" role="document">
		        <div class="modal-content">
		            <div class="modal-body">
		                <p><strong>Maaf, anda tidak dapat membuka mata kuliah ini sebelum mendaftar terlebih dahulu!</strong></p>
		            </div>
		            <div class="modal-footer">
		                <a class="btn btn-default" href="javascript:history.go(-1)">Cancel</a>
		                <a class="btn btn-danger" href="/enrollNow/{{$course->slug}}">Daftar Sekarang</a>
		            </div>
		        </div>
		    </div>
		</div>
		@endif
	@else
		<script type="text/javascript">
			location.href = 'https://qureta.com/login';
		</script>
	@endif

<!--shareaholic-->
	<script type="text/javascript" data-cfasync="false" src="//dsms0mj1bbhn4.cloudfront.net/assets/pub/shareaholic.js" data-shr-siteid="b91b857ba0550d40b8b5b2368fa0fe13" async="async"></script>

@endsection
