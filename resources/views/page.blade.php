@extends('layouts.template')

@section('content')
	
	<div class="wrapper">
		<div class="container">
			<div class="row">
				@foreach($page as $key => $value)
					<h1 class="text-center">{{ $value->title }}</h1>
					<p>{{ $value->content }}</p>
				@endforeach
			</div>
		</div>
	</div>

@endsection