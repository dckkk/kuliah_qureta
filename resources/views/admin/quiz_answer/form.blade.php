<?php 
    $quiz_questions = App\QuizQuestions::all();
?>
<div class="form-group {{ $errors->has('quiz_questions_id') ? 'has-error' : ''}}">
    {!! Form::label('quiz_questions_id', 'Quiz Questions Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="quiz_questions_id" class="form-control" onchange="">
            <option></option>
            @foreach($course as $key => $value)
                @if(isset($lecture))
                    @if($value->id == $lecture['course_id'])
                    <?php $selected = "selected"; ?>
                    @else
                    <?php $selected = ""; ?>
                    @endif
                @endif
            <option value="{{ $value->id }}" @if(isset($lecture)){{ $selected }}@endif>{{ $value->name }}</option>
            @endforeach
        </select>
        <!-- {!! Form::text('quiz_questions_id', null, ['class' => 'form-control']) !!} -->
        {!! $errors->first('quiz_questions_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nilai') ? 'has-error' : ''}}">
    {!! Form::label('nilai', 'Nilai', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('nilai', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nilai', '<p class="help-block">:message</p>') !!}
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
