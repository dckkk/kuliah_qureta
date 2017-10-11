<?php 
    $course = \App\Course::all();
?>

<div class="form-group {{ $errors->has('course_id') ? 'has-error' : ''}}">
    {!! Form::label('course_id', 'Course', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <!-- {!! Form::text('course_id', null, ['class' => 'form-control']) !!} -->
        <select name="course_id" class="form-control">
            @foreach($course as $key => $value)
                @if($value->id == $chapter['course_id'])
                <?php $selected = "selected"; ?>
                @else
                <?php $selected = ""; ?>
                @endif
            <option value="{{ $value->id }}" {{ $selected }}>{{ $value->name }}</option>
            @endforeach
        </select>
        {!! $errors->first('course_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('parent') ? 'has-error' : ''}}">
    {!! Form::label('parent', 'Parent', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input type="radio" name="parent" value="1" <?= ($chapter->parent == 1)?"checked":""; ?>> Ya
        <input type="radio" name="parent" value="2" <?= ($chapter->parent == 2)?"checked":""; ?>> Tidak
        {!! $errors->first('parent', '<p class="help-block">:message</p>') !!}
    </div>
</div><!-- <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
    {!! Form::label('slug', 'Slug', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div> --><div class="form-group {{ $errors->has('duration') ? 'has-error' : ''}}">
    {!! Form::label('duration', 'Duration', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('duration', null, ['class' => 'form-control']) !!}
        {!! $errors->first('duration', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('url_video') ? 'has-error' : ''}}">
    {!! Form::label('url_video', 'Url Video', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('url_video', null, ['class' => 'form-control']) !!}
        {!! $errors->first('url_video', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

