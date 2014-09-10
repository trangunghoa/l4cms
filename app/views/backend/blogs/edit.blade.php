@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Blog Post Update ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Update Post
            <a href="{{ route('blogs') }}" class="btn btn-outline btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Back</a>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- Tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
    <li><a href="#tab-meta-data" data-toggle="tab">Meta Data</a></li>
</ul>

<form class="form-horizontal" method="post" action="" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

    <div class="row col-md-12">
        <div class="col-md-9">
            <!-- Tabs Content -->
            <div class="tab-content">
                <!-- General tab -->
                <div class="tab-pane fade in active" id="tab-general">
                    <!-- Post Title -->
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label class="control-label" for="title">Post Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ Input::old('title', $post->title) }}"/>
                        {{ $errors->first('title', '<span class="help-block">:message</span>') }}
                    </div>

                    <!-- Post Slug -->
                    <div class="form-group">
                        <label class="control-label" for="slug">Slug</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                {{ str_finish(URL::to('/'), '/') }}
                            </span>
                            <input class="form-control" type="text" name="slug" id="slug"
                                   value="{{ Input::old('slug', $post->slug) }}">
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                        <label class="control-label" for="content">Content</label>
                        <textarea class="form-control" name="content" value="content" rows="10">{{ Input::old('content',
                            $post->content) }}</textarea>
                        {{ $errors->first('content', '<span class="help-block">:message</span>') }}
                    </div>
                </div>

                <!-- Meta Data tab -->
                <div class="tab-pane fade" id="tab-meta-data">
                    <!-- Meta Title -->
                    <div class="form-group {{ $errors->has('meta-title') ? 'has-error' : '' }}">
                        <label class="control-label" for="meta-title">Meta Title</label>
                        <input class="form-control" type="text" name="meta-title" id="meta-title" value="{{ Input::old('meta-title', $post->meta_title) }}"/>
                        {{ $errors->first('meta-title', '<span class="help-block">:message</span>') }}
                    </div>

                    <!-- Meta Description -->
                    <div class="form-group {{ $errors->has('meta-description') ? 'error' : '' }}">
                        <label class="control-label" for="meta-description">Meta Description</label>
                        <input class="form-control" type="text" name="meta-description" id="meta-description" value="{{ Input::old('meta-description', $post->meta_description) }}"/>
                        {{ $errors->first('meta-description', '<span class="help-block">:message</span>') }}
                    </div>

                    <!-- Meta Keywords -->
                    <div class="form-group {{ $errors->has('meta-keywords') ? 'error' : '' }}">
                        <label class="control-label" for="meta-keywords">Meta Keywords</label>
                        <input class="span10" type="text" name="meta-keywords" id="meta-keywords" value="{{ Input::old('meta-keywords', $post->meta_keywords) }}"/>
                        {{ $errors->first('meta-keywords', '<span class="help-block">:message</span>') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Actions -->
    <div class="form-group">
        <div class="controls">
            <a class="btn btn-link" href="{{ route('blogs') }}">Cancel</a>

            <button type="reset" class="btn btn-default btn-sm">Reset</button>

            <button type="submit" class="btn btn-primary btn-sm">Publish</button>
        </div>
    </div>
</form>
@stop
