@extends('layouts.app')

@section('content')

<div class="wrapper" style="background-image: url('{{ URL::asset('/img/bg-profile.jpg')  }}'); background-repeat: no-repeat;">
	<div class="container">
		<div class="row">
			<div class="container-profile">
				@foreach($user as $key => $users)
				<table>
					<tr>
						<td rowspan="2">
							@if(Auth::user()->user_image !== null)
		                    <span class="user-icon-profile"><img src="https://www.qureta.com/uploads/avatar/{{Auth::user()->user_image}}" width="80px" height="80px" class="img-circle" style="border: 2px solid #635b5b;"></span>
		                    @else
		                    <span class="user-icon fa fa-user-o"></span>
		                    @endif
						</td>
						<td><h3 style="margin-left: 8px">{{ $users->name }}</h3></td>
					</tr>
					<tr>
						<td><p style="margin-top: -11px; margin-left: 10px">{{ $profession[0]->meta_value }}</p></td>
					</tr>
				</table>
				@endforeach
			</div>

			<div class="container no-padding">
				<div class="row content">
					<div class="col-xs-12"><h3 class="title">Mata Kuliah Anda</h3></div>
					@foreach($course as $key => $value)
					<?php 
						$teachers = array("<a href='/teacher/".$value->course->teachers->id."'>".$value->course->teachers->name."</a>");

						if($value->course->teachers2 !== null){	
							$teachers = array("<a href='/teacher/".$value->course->teachers->id."'>".$value->course->teachers->name."</a>","<a href='/teacher/".$value->course->teachers2->id."'>".$value->course->teachers2->name."</a>");
						}
						if($value->course->teachers3 !== null){	
							$teachers = array("<a href='/teacher/".$value->course->teachers->id."'>".$value->course->teachers->name."</a>","<a href='/teacher/".$value->course->teachers2->id."'>".$value->course->teachers2->name."</a>","<a href='/teacher/".$value->course->teachers3->id."'>".$value->course->teachers3->name."</a>");
						}

						$teacher = implode(', ', $teachers);
					?>
					<div class="col-md-3 col-xs-6">
						<div class="frame-materi" data-target="button-frame-1-1">
							<img src="//static.adira.one/l/400x280/{{ URL::asset('/uploads/course/'.$value->course->url_foto) }}" class="img">
							<div class="text-pengajar">
								<h4>{{ $value->course->topics->code }}</h4>
								<h4><a href="/course/{{ $value->course->slug }}">{{ $value->course->name }}</a></h4>
								<span>Pengajar: {!! $teacher !!}</span>
							</div>
							<div class="row footer-pengajar">
								<div class="col-sm-10 col-xs-10">
									<span class="text">{{ courseUser($value->course->id) }} Peserta</span>
								</div>
								<div class="col-sm-2 col-xs-2">
									@if(!empty(Auth::user()->id))
										@if(enrolled($value->course->id))
										<a href="javascript:void(0)" onclick="unenroll({{ $value->course->id }}, '{{ Auth::user()->email }}')">
											<span id="enrolls-{{ $value->course->id }}" class="fa fa-bookmark" aria-hidden="true"></span>
										</a>
										@else
										<a href="javascript:void(0)" onclick="enrolling({{ $value->course->id }}, '{{ Auth::user()->email }}')">
											<span id="enrolls-{{ $value->course->id }}" class="fa fa-bookmark-o" aria-hidden="true"></span>
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
					<!-- <div id="topic-last"></div>
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
				</div> -->
			</div>
		</div>
	</div>
</div>

@endsection