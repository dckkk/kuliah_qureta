<?php 
    $course = \App\Course::all();
    $chapter = \App\Chapters::all();
?>
<div class="form-group {{ $errors->has('course_id') ? 'has-error' : ''}}">
    {!! Form::label('course_id', 'Course', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <!-- {!! Form::text('course_id', null, ['class' => 'form-control']) !!} -->
        <select name="course_id" class="form-control" onchange="chapterOptions(this.value)">
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
        {!! $errors->first('course_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('chapter_id') ? 'has-error' : ''}}">
    {!! Form::label('chapter_id', 'Chapter', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <!-- {!! Form::text('chapter_id', null, ['class' => 'form-control']) !!} -->
        <div id="chapter-options">
            <select name="chapter_id" class="form-control">
                <option></option>
                @foreach($chapter as $key => $value)
                    @if(isset($lecture))
                        @if($value->id == $lecture['chapter_id'])
                        <?php $selected = "selected"; ?>
                        @else
                        <?php $selected = ""; ?>
                        @endif
                    @endif
                <option value="{{ $value->id }}" @if(isset($lecture)){{ $selected }}@endif>{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
        {!! $errors->first('chapter_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('url_video') ? 'has-error' : ''}}">
    {!! Form::label('url_video', 'Video', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('url_video', null, ['class' => 'form-control']) !!}
        {!! $errors->first('url_video', '<p class="help-block">:message</p>') !!}
        <small>(https://www.youtube.com/watch?v=)</small>
    </div>
</div><div class="form-group {{ $errors->has('duration') ? 'has-error' : ''}}">
    {!! Form::label('duration', 'Duration', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('duration', null, ['class' => 'form-control']) !!}
        {!! $errors->first('duration', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
