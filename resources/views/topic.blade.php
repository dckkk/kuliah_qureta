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
		@foreach ($topics as $key => $value)
		<div class="container no-padding">
			<div class="row content">
				<div class="col-xs-12"><h3 class="title">{{ $value->topic }} ({{ $value->code }})</h3></div>
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