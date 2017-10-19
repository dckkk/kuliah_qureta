<div class="form-group {{ $errors->has('quiz_id') ? 'has-error' : ''}}">
    {!! Form::label('quiz_id', 'Quiz Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('quiz_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('quiz_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('order') ? 'has-error' : ''}}">
    {!! Form::label('order', 'Order', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('order', null, ['class' => 'form-control']) !!}
        {!! $errors->first('order', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('question') ? 'has-error' : ''}}">
    {!! Form::label('question', 'Question', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('question', null, ['class' => 'form-control']) !!}
        {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
