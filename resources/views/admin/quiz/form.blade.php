<?php
    $course = App\Course::all();
?>
<div class="form-group {{ $errors->has('course_id') ? 'has-error' : ''}}">
    {!! Form::label('course_id', 'Course', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="course_id" class="form-control">
            @foreach($course as $key => $value)
            @if(isset($quiz))
                @if($value->id == $quiz['course_id'])
                <?php $selected = "selected"; ?>
                @else
                <?php $selected = ""; ?>
                @endif
            @endif
            <option value="{{ $value->id }}" @if(isset($quiz)){{ $selected }}@endif>{{ $value->name }}</option>
            @endforeach
        </select>
        <!-- {!! Form::text('course_id', null, ['class' => 'form-control']) !!} -->
        {!! $errors->first('course_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
