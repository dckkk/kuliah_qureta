@extends('layouts.template')

@section('content')
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
				<!-- {{ $value }} -->
				<div class="col-md-3 col-xs-6">
					<div class="frame-materi" data-target="button-frame-1-1">
						<img src="{{ URL::asset('/img/'.$value->url_foto) }}" class="img">
						<div class="text-pengajar">
							<h4>{{ $value->topics->code }}</h4>
							<h4><a href="/course/{{ $value->slug }}">{{ $value->name }}</a></h4>
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
						<img src="{{ URL::asset('/img/'.$values->url_foto) }}" class="img">
						<div class="text-pengajar">
							<h4>{{ $values->topics->code }}</h4>
							<h4><a href="/course/{{ $values->slug }}">{{ $values->name }}</a></h4>
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
@endsection