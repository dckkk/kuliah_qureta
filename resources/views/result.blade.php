@extends('layouts.app')

@section('content')
	<div id="infinite-scroll">	
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
		<div class="wrapper" style="margin-top: 100px; margin-bottom: 150px;">
			<div class="col-xs-12"><h3 class="title">Result for "{{ $keyword }}"</h3></div>
			<div class="container-fluid">
				<div class="container">
				@if($teachers->isEmpty() && $course->isEmpty())
					<div style="margin: 120px 440px;">
						<h2>There is no result</h2>
					</div>
				@endif
				@if(!$teachers->isEmpty())
					<div class="row">
						<div class="col-xs-12">
							<h3 class="title-teacher">Pengajar</h3>
						</div>
						<div class="row-fluid">
						<!-- {{ Auth::user() }} -->
						    @foreach ($teachers as $key=>$value)
						    <!-- {{ $value }} -->
						    <div class="col-md-5ths">
							    <div class="col-md-12 col-xs-6 frame-pengajar"  style="margin-top: 10px;">
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
				@endif
				</div>
			</div>
			@if(!$course->isEmpty())
			<div class="container no-padding">
				<div class="row content">
					<div class="col-xs-12"><h3 class="title">Mata Kuliah</h3></div>
					<div class="infinite-scroll">
						@foreach($course as $key => $value)
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
					</div>
					{{ $course->links() }}
				</div>
			</div>
			@endif
		</div>
	</div>

	<script type="text/javascript">
        $('ul.pagination').hide(); 
        $(function() {
            $('#infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src=\"{{ URL::asset("img/loading.gif") }}\" alt="Loading..." />', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                }
            });
        });
    </script>
@endsection