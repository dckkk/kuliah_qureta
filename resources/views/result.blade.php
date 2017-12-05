@extends('layouts.app')

@section('content')
	<div id="infinite-scroll">	
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
						@foreach($course as $key => $value)
						<!-- {{ $value }} -->
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
						<div class="col-md-3 col-xs-12">
							<div class="frame-materi" data-target="button-frame-1-1">
								<div class="materi-img">
									<img src="//static.adira.one/l/400x300/{{ URL::asset('/uploads/course/'.$value->url_foto) }}" class="img img-course">
								</div>
								<div class="text-pengajar">
									<h4>{{ $value->topics->code }}</h4>
									@if(Auth::check())
										<h4><a href="/course/{{ $value->slug }}">{{ $value->name }}</a></h4>
									@else
										<h4><a href="https://qureta.com/login">{{ $value->name }}</a></h4>
									@endif
									<span>Pengajar: {{ $teacher }}</span>
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
										<a href="https://qureta.com/login">
											<span class="fa fa-bookmark-o" aria-hidden="true"></span>
										</a>
										@endif
									</div>
								</div>
							</div>
						</div>
						@endforeach
						<div id="topic-last"></div>
							<div class="text-center frame-materi-more col-lg-12 col-md-12 col-xs-12">
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