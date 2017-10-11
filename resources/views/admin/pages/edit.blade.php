@extends('layouts.app')

@section('content')
    <div class="container" style='margin-top:100px; margin-bottom: 200px'>
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit page #{{ $page->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/pages') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($page, [
                            'method' => 'PATCH',
                            'url' => ['/admin/pages', $page->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.pages.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
