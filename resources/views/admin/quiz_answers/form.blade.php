<div class="form-group {{ $errors->has('quiz_questions_id') ? 'has-error' : ''}}">
    {!! Form::label('quiz_questions_id', 'Quiz Questions Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('quiz_questions_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('quiz_questions_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('order') ? 'has-error' : ''}}">
    {!! Form::label('order', 'Order', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('order', null, ['class' => 'form-control']) !!}
        {!! $errors->first('order', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('answer') ? 'has-error' : ''}}">
    {!! Form::label('answer', 'Answer', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('answer', null, ['class' => 'form-control']) !!}
        {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
