<div class="form-group {{ $errors->has('project_id') ? 'has-error' : ''}}">
    {!! Form::label('project_id', 'Project', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('project_id', App\Project::pluck('name', 'id'), old('project_id'), ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('start') ? 'has-error' : ''}}">
    {!! Form::label('start', 'Start', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('start', isset($digitalreport) ? $digitalreport->start : null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        <small class="form-text text-muted">Campaign start date(required)</small>
        {!! $errors->first('start', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('end') ? 'has-error' : ''}}">
    {!! Form::label('end', 'End', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('end', isset($digitalreport) ? $digitalreport->end : null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        <small class="form-text text-muted">Campaign end date(required)</small>
        {!! $errors->first('end', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('video_link') ? 'has-error' : ''  }}">
    {!! Form::label('video_link', 'Link to youtube video', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('video_link', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('video_link', '<p class="help-block">:message</p>') !!}
    </div>
</div>


