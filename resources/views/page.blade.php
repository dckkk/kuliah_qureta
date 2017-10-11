@extends('layouts.app')

@section('content')
	
	<div class="wrapper">
		<div class="container" style="margin-bottom: 410px">
			<div class="row">
				@foreach($page as $key => $value)
					<h1 class="text-center">{{ $value->title }}</h1>
					<p>{{ $value->content }}</p>
				@endforeach
			</div>
		</div>
	</div>

@endsection