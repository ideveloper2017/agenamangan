@extends('backend.layouts.app')
@section('title', 'Page')
@section('parentPageTitle', 'Add Page')
@section('content')
{{--    {!! HTML::script('ckeditor/ckeditor.js') !!}--}}
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    {!! Form::open( array( 'route' => array('admin.page.update', $page->id), 'method' => 'PATCH', 'files'=>true)) !!}
                    <!-- Title -->
                    <div class="form-group m-t-20 m-b-20 {!! $errors->has('title') ? 'has-error' : '' !!}">
                        <label class="control-label" for="title">Title</label>
                        <div class="controls">
                            {!! Form::text('title', $page->title, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>old('title'))) !!}
                            @if ($errors->first('title'))
                                <span class="help-block">{!! $errors->first('title') !!}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group m-t-20 m-b-20 {!! $errors->has('is_published') ? 'has-error' : '' !!}">
                        <div class="controls">
                            <label class="">{!! Form::checkbox('is_published', 'is_published',$page->is_published) !!} Publish ?</label>
                            @if ($errors->first('is_published'))
                                <span class="help-block">{!! $errors->first('is_published') !!}</span>
                            @endif
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="form-group m-t-20 m-b-20 {!! $errors->has('content') ? 'has-error' : '' !!}">
                        <label class="control-label" for="title">Content</label>

                        <div class="controls">
                            {!! Form::textarea('content', $page->content, array('class'=>'form-control', 'id' => 'content', 'placeholder'=>'Content', 'value'=>old('content'))) !!}
                            @if ($errors->first('content'))
                                <span class="help-block">{!! $errors->first('content') !!}</span>
                            @endif
                        </div>
                    </div>
                    <br>
                    <!-- Published -->

                    <br>
                    <!-- Form actions -->
                    {!! Form::submit('Update', array('class' => 'btn btn-success')) !!}
                    {!! Form::close() !!}
                    <script>
                        window.onload = function () {
                            CKEDITOR.replace('content', {
                                "filebrowserBrowseUrl": "{!! url('filemanager/show') !!}"
                            });
                        };
                    </script>
                </div>
            </div>
        </div>
    </div>
@stop
