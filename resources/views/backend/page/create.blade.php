@extends('backend.layouts.limitless')
@section('title', 'Page')
@section('parentPageTitle', 'Add Page')

@section('content')
{{--    {!! HTML::script('ckeditor/ckeditor.js') !!}--}}
    <div class="row clearfix">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="body m-15 p-2">
                    {!! Form::open(array('action' => '\App\Http\Controllers\Admin\PageController@store')) !!}
                    <!-- Title -->
                    <div class="form-group m-t-20 m-b-20 {!! $errors->has('title') ? 'has-error' : '' !!}">
                        <label class="control-label" for="title">Title</label>
                        <div class="form-group m-t-20 m-b-20">
                            {!! Form::text('title', null, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>old('title'))) !!}
                            @if ($errors->first('title'))
                                <span class="help-block">{!! $errors->first('title') !!}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group m-t-20 m-b-20 {!! $errors->has('is_published') ? 'has-error' : '' !!}">
                        <div class="controls">
                            <label class="">{!! Form::checkbox('is_published', 'is_published') !!} Publish ?</label>
                            @if ($errors->first('is_published'))
                                <span class="help-block">{!! $errors->first('is_published') !!}</span>
                            @endif
                        </div>
                    </div>
                    <br>
                    <!-- Content -->
                    <div class="form-group m-t-20 m-b-20 {!! $errors->has('content') ? 'has-error' : '' !!}">
                        <label class="control-label" for="title">Content</label>
                        <div class="controls">
                            {!! Form::textarea('content', null, array('class'=>'form-control', 'id' => 'content', 'placeholder'=>'Content', 'value'=>old('content'))) !!}
                            @if ($errors->first('content'))
                                <span class="help-block">{!! $errors->first('content') !!}</span>
                            @endif
                        </div>
                    </div>
                    <br>
                    <!-- Published -->

                    <br>
                    <!-- Form actions -->
                    {!! Form::submit('Create', array('class' => 'btn btn-success')) !!}
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
