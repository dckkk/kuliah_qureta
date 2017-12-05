<?php 
    $topics = \App\Topics::all(); 
    $teacher = \App\Teachers::all(); 
?>
<div class="form-group {{ $errors->has('topic_id') ? 'has-error' : ''}}">
    {!! Form::label('topic_id', 'Topic', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <!-- {!! Form::text('topic_id', null, ['class' => 'form-control']) !!} -->
        <select class="form-control" name='topic_id'>
            @foreach($topics as $key => $value)
                @if(isset($course))
                    @if($value->id == $course['topic_id'])
                    <?php $selected = "selected"; ?>
                    @else
                    <?php $selected = ""; ?>
                    @endif
                @endif
                <option value="{{ $value->id }}" @if(isset($course)){{ $selected }}@endif>{{ $value->topic }} ({{ $value->code }})</option>
            @endforeach
        </select>
        {!! $errors->first('topic_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('teacher_id') ? 'has-error' : ''}}">
    {!! Form::label('teacher_id1', 'Teacher 1', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <!-- {!! Form::text('teacher_id', null, ['class' => 'form-control']) !!} -->
        <select class="form-control" name='teacher_id1' required="required">
            <option></option>
            @foreach($teacher as $key => $value)
                @if(isset($course))
                    @if($value->id == $course['teacher_id1'])
                    <?php $selected = "selected"; ?>
                    @else
                    <?php $selected = ""; ?>
                    @endif
                @endif
                <option value="{{ $value->id }}" @if(isset($course)){{ $selected }}@endif>{{ $value->name }}</option>
            @endforeach
        </select>
        {!! $errors->first('teacher_id1', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('teacher_id2') ? 'has-error' : ''}}">
    {!! Form::label('teacher_id2', 'Teacher 2 (optional)', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <!-- {!! Form::text('teacher_id', null, ['class' => 'form-control']) !!} -->
        <select class="form-control" name='teacher_id2'>
            <option></option>
            @foreach($teacher as $key => $value)
                @if(isset($course))
                    @if($value->id == $course['teacher_id2'])
                    <?php $selected = "selected"; ?>
                    @else
                    <?php $selected = ""; ?>
                    @endif
                @endif
                <option value="{{ $value->id }}" @if(isset($course)){{ $selected }}@endif>{{ $value->name }}</option>
            @endforeach
        </select>
        {!! $errors->first('teacher_id2', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('teacher_id3') ? 'has-error' : ''}}">
    {!! Form::label('teacher_id3', 'Teacher 3  (optional)', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <!-- {!! Form::text('teacher_id', null, ['class' => 'form-control']) !!} -->
        <select class="form-control" name='teacher_id3'>
            <option></option>
            @foreach($teacher as $key => $value)
                @if(isset($course))
                    @if($value->id == $course['teacher_id3'])
                    <?php $selected = "selected"; ?>
                    @else
                    <?php $selected = ""; ?>
                    @endif
                @endif
                <option value="{{ $value->id }}" @if(isset($course)){{ $selected }}@endif>{{ $value->name }}</option>
            @endforeach
        </select>
        {!! $errors->first('teacher_id3', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Silabus', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control wysiwygeditor', 'required']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('announcement') ? 'has-error' : ''}}">
    {!! Form::label('announcement', 'Pengumuman', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('announcement', null, ['class' => 'form-control']) !!}
        {!! $errors->first('announcement', '<p class="help-block">:message</p>') !!}
    </div>
</div><!-- <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
    {!! Form::label('slug', 'Slug', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div> --><div class="form-group {{ $errors->has('url_foto') ? 'has-error' : ''}}">
    {!! Form::label('image', 'Image', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('image', null, ['class' => 'form-control']) !!}
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
        @if(Session::has('flash_message'))
        <div class="alert alert-danger" style="margin-top: 5px; padding: 7px">{!! Session::get('flash_message') !!}</div>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('url_foto') ? 'has-error' : ''}}">
    {!! Form::label('enrolls_start', 'Start Enroll Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('enrolls_start', null, ['class' => 'form-control', 'required']) !!}
        {!! $errors->first('enrolls_start', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('url_foto') ? 'has-error' : ''}}">
    {!! Form::label('enrolls_end', 'End Enroll Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('enrolls_end', null, ['class' => 'form-control', 'required']) !!}
        {!! $errors->first('enrolls_end', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
