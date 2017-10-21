<div class="form-group {{ $errors->has('qureta_id') ? 'has-error' : ''}}">
    {!! Form::label('qureta_id', 'Qureta Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('qureta_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('qureta_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => '20']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('introduction') ? 'has-error' : ''}}">
    {!! Form::label('introduction', 'Introduction', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('introduction', null, ['class' => 'form-control']) !!}
        {!! $errors->first('introduction', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('job') ? 'has-error' : ''}}">
    {!! Form::label('job', 'Job', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('job', null, ['class' => 'form-control', 'maxlength' => '20']) !!}
        {!! $errors->first('job', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('url_foto') ? 'has-error' : ''}}">
    {!! Form::label('url_foto', 'Foto Profile', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('image', null, ['class' => 'form-control']) !!}
        {!! $errors->first('url_foto', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
