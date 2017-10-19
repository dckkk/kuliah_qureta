@extends('layouts.app')

@section('content') 
	<!-- modal enroll -->
	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-body">
					<H2>Oops Sorry!</H2>
					<h4>Maaf anda harus login terlebih dahulu sebelum enroll course</h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="button-modal" data-dismiss="modal">Close</button>
				</div>
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
					<!-- {{ Auth::user() }} -->
					    @foreach ($teachers as $key=>$value)
					    <!-- {{ $value }} -->
					    <div class="col-md-5ths">
						    <div class="col-md-12 col-xs-6 frame-pengajar">
								<div class="col-xs-4 no-padding">
									<img src="{{ URL::asset('uploads/teacher/'.$value->url_foto) }}" class="img avatar-teacher">
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
				<!-- {{ $value }} -->
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-1-1">
						<img src="{{ URL::asset('/uploads/course/'.$value->url_foto) }}" class="img">
						<div class="text-pengajar">
							<h4>{{ $value->topics->code }}</h4>
							<h4><a href="/course/{{ $value->slug }}">{{ $value->name }}</a></h4>
							<span>Pengajar: {{ $value->teachers->name }}</span>
						</div>
						<div class="row footer-pengajar">
							<div class="col-sm-10 col-xs-10">
								<span class="text">{{ courseUser($value->id) }} Peserta</span>
							</div>
							<div class="col-sm-2 col-xs-2">
								@if(!empty(Auth::user()->id))
									@if(enrolled($value->id))
									<a href="javascript:void(0)" onclick="unenroll({{ $value->id }}, '{{ Auth::user()->email }}')">
										<span id="enrolls-{{ $value->id }}" class="fa fa-bookmark" aria-hidden="true"></span>
									</a>
									@else
									<a href="javascript:void(0)" onclick="enrolling({{ $value->id }}, '{{ Auth::user()->email }}')">
										<span id="enrolls-{{ $value->id }}" class="fa fa-bookmark-o" aria-hidden="true"></span>
									</a>
									@endif
								@else
								<a href="javascript:void(0)">
									<span class="fa fa-bookmark-o" aria-hidden="true" data-toggle="modal" data-target=".bs-example-modal-lg"></span>
								</a>
								@endif
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<div id="topic-last"></div>
				<div class="text-center frame-materi-more col-lg-12">
					<div id="sk-cube-gridlast" class="sk-cube-grid" style="display:none">
						<div class="sk-cube sk-cube1"></div>
						<div class="sk-cube sk-cube2"></div>
						<div class="sk-cube sk-cube3"></div>
						<div class="sk-cube sk-cube4"></div>
						<div class="sk-cube sk-cube5"></div>
						<div class="sk-cube sk-cube6"></div>
						<div class="sk-cube sk-cube7"></div>
						<div class="sk-cube sk-cube8"></div>
						<div class="sk-cube sk-cube9"></div>
					</div>
					<input type="hidden" id="topic-show-last" value="1">
					@if(Auth::check())
					<a href="javascript:void(0)" id="topic-more-last" onclick="showMore('last', {{ Auth::user()->id }}, '{{ Auth::user()->email }}')">Show more <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
					@else
					<a href="javascript:void(0)" id="topic-more-last" onclick="showMore('last')">Show more <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
					@endif
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
						<img src="{{ URL::asset('/uploads/course/'.$values->url_foto) }}" class="img">
						<div class="text-pengajar">
							<h4>{{ $values->topics->code }}</h4>
							<h4><a href="/course/{{ $values->slug }}">{{ $values->name }}</a></h4>
							<span>Pengajar: {{ $values->teachers->name }}</span>
						</div>
						<div class="row footer-pengajar">
							<div class="col-sm-10 col-xs-10">
								<span class="text">{{ courseUser($values->id) }} Peserta</span>
							</div>
							<div class="col-sm-2 col-xs-2">
								@if(!empty(Auth::user()->id))
									@if(enrolled($values->id))
									<a href="javascript:void(0)" onclick="unenroll({{ $values->id }}, '{{ Auth::user()->email }}')">
										<span id="enrolls-{{ $values->id }}" class="fa fa-bookmark" aria-hidden="true"></span>
									</a>
									@else
									<a href="javascript:void(0)" onclick="enrolling({{ $values->id }}, '{{ Auth::user()->email }}')">
										<span id="enrolls-{{ $values->id }}" class="fa fa-bookmark-o" aria-hidden="true"></span>
									</a>
									@endif
								@else
								<a href="javascript:void(0)">
									<span class="fa fa-bookmark-o" aria-hidden="true" data-toggle="modal" data-target=".bs-example-modal-lg"></span>
								</a>
								@endif
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<div id="topic-{{ $value->id }}"></div>
				<div class="text-center frame-materi-more col-lg-12">
					<div id="sk-cube-grid{{ $value->id }}" class="sk-cube-grid" style="display:none">
						<div class="sk-cube sk-cube1"></div>
						<div class="sk-cube sk-cube2"></div>
						<div class="sk-cube sk-cube3"></div>
						<div class="sk-cube sk-cube4"></div>
						<div class="sk-cube sk-cube5"></div>
						<div class="sk-cube sk-cube6"></div>
						<div class="sk-cube sk-cube7"></div>
						<div class="sk-cube sk-cube8"></div>
						<div class="sk-cube sk-cube9"></div>
					</div>
					<input type="hidden" id="topic-show-{{$value->id}}" value="1">
					@if(Auth::check())
					<a href="javascript:void(0)" id="topic-more-{{$value->id}}" onclick="showMore({{ $value->id }}, {{ Auth::user()->id }}, '{{ Auth::user()->email }}')">Show more <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
					@else
					<a href="javascript:void(0)" id="topic-more-{{$value->id}}" onclick="showMore({{ $value->id }})">Show more <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
					@endif
				</div>
			</div>
		</div>	
		@endforeach
	</div>
@endsection