@extends('backend.layouts.app')
@section('content')
    @push('style')
        <link rel="stylesheet" type="text/css" href="/plugins/bootstrap/css/bootstrap-tagsinput.css">
        <link rel="stylesheet" type="text/css" href="/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/select2.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/dropzone.css">
    @endpush
    <!-- Content Header (Page header) -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Project Create</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Apps                                     </li>
                        <li class="breadcrumb-item active">Project Create</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                    <div class="bookmark">
                        <ul>
                            <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg></a></li>
                            <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Chat"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg></a></li>
                            <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-command"><path d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z"></path></svg></a></li>
                            <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg></a></li>
                            <li><a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star bookmark-search"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></a>
                                <form class="form-inline search-form">
                                    <div class="form-group form-control-search">
                                        <input type="text" placeholder="Search..">
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                <div class="card-body">

        {!! Form::open(array('action' => '\App\Http\Controllers\Admin\ArticleController@store', 'files'=>true)) !!}
        <div class="control-group {!! $errors->has('title') ? 'has-error' : '' !!}">
            <label class="control-label" for="title">Title</label>

            <div class="controls">
                {!! Form::text('title', null, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>old('title'))) !!}
                @if ($errors->first('title'))
                    <span class="help-block">{!! $errors->first('title') !!}</span>
                @endif
            </div>
        </div>
        <br>

        <div class="control-group {!! $errors->has('tag') ? 'has-error' : '' !!}">
            <label class="control-label" for="title">Tag</label>
            <div class="controls">
                {!! Form::text('tag', null, array('class'=>'form-control', 'id' => 'tag', 'placeholder'=>'Tag', 'value'=>old('tag'))) !!}
                @if ($errors->first('tag'))
                    <span class="help-block">{!! $errors->first('tag') !!}</span>
                @endif
            </div>
        </div>
        <br>
        <div class="mb-12">
            <label >
                Select Category
            </label>
            <select name="category_id" class="form-select js-example-basic-single">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
        </div>

       <br>

        <!-- Content -->
        <div class="control-group {!! $errors->has('content') ? 'has-error' : '' !!}">
            <label class="control-label" for="title">Content</label>

            <div class="controls">
                {!! Form::textarea('content', null, array('class'=>'form-control', 'id' => 'content', 'placeholder'=>'Content', 'value'=>old('content'))) !!}
                @if ($errors->first('content'))
                    <span class="help-block">{!! $errors->first('content') !!}</span>
                @endif
            </div>
        </div>
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th-list">
                </span>META DATA</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="control-group {!! $errors->has('meta_description') ? 'has-error' : '' !!}">
                                <label class="control-label" for="title">Meta Description</label>

                                <div class="controls">
                                    {!! Form::text('meta_description', null, array('class'=>'form-control', 'id' => 'meta_description', 'placeholder'=>'Meta Description', 'value'=>old('meta_description'))) !!}
                                    @if ($errors->first('meta_description'))
                                        <span class="help-block">{!! $errors->first('meta_description') !!}</span>
                                    @endif
                                </div>
                            </div>
                            <br>
                         <!-- Meta Keywords -->
                            <div class="control-group {!! $errors->has('meta_keywords') ? 'has-error' : '' !!}">
                                <label class="control-label" for="title">Meta Keywords</label>

                                <div class="controls">
                                    {!! Form::textarea('meta_keywords', null, array('class'=>'form-control', 'id' => 'meta_keywords', 'placeholder'=>'Meta Keywords', 'value'=>old('meta_keywords'))) !!}
                                    @if ($errors->first('meta_keywords'))
                                        <span class="help-block">{!! $errors->first('meta_keywords') !!}</span>
                                    @endif
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image -->
{{--        <form class="dropzone" id="singleFileUpload" action="/upload.php">--}}
{{--            <div class="dz-message needsclick"><i class="icon-cloud-up"></i>--}}
{{--                <h6>Drop files here or click to upload.</h6><span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>--}}
{{--            </div>--}}
{{--        </form>--}}
        <div class="fileinput fileinput-new control-group {!! $errors->has('image') ? 'has-error' : '' !!}" data-provides="fileinput">
            <div class="fileinput-preview thumbnail" data-trigger="fileinput" ></div>
            <div> <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span> {!! Form::file('image', null, array('class'=>'form-control', 'id' => 'image', 'placeholder'=>'Image', 'value'=>old('image'))) !!}
                    @if ($errors->first('image')) <span class="help-block">{!! $errors->first('image') !!}</span> @endif </span> <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
        </div>
        <br>

        <!-- Published -->
        <div class="control-group {!! $errors->has('is_published') ? 'has-error' : '' !!}">

            <div class="controls">
                <label class="">{!! Form::checkbox('is_published', 'is_published') !!} Publish ?</label>
                @if ($errors->first('is_published'))
                    <span class="help-block">{!! $errors->first('is_published') !!}</span>
                @endif
            </div>
        </div>
        <br>

        {!! Form::submit('Create', array('class' => 'btn btn-success')) !!}
        {!! Form::close() !!}

        @push("javascript")
            <script src="{{asset('/plugins/editor/ckeditor/ckeditor.js')}}"></script>
            {!! HTML::script('/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') !!}
            {!! HTML::script('/plugins/bootstrap/js/bootstrap-tagsinput.js') !!}
            <script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
            <script src="{{ asset('/plugins/select2/select2-custom.js') }}"></script>
            <script src="{{ asset('/plugins/dropzone/dropzone.js')}}"></script>
            <script src="{{ asset('/plugins/dropzone/dropzone-script.js')}}"></script>
        {!! HTML::script('/js/jquery.slug.js') !!}
        <script type="text/javascript">
            $(document).ready(function () {
                $("#title").slug();

            window.onload = function () {
                CKEDITOR.replace('content', {
                    "filebrowserBrowseUrl": "{!! url('filemanager/show') !!}"
                });
            };
                if ($('#tag').length != 0) {
                    var elt = $('#tag');
                    elt.tagsinput();
                }
            });
        </script>
        @endpush
    </div>
        </div>
    </div>
    </div>
    </div>
@stop
