@extends('backend.layouts.app')
@section('content')
               <div class="container-fluid">
            <div class="row">
                <div class="col-xxl-12 col-xl-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h5>Blogs</h5>
                                </div>
                                <div class="card-body">
                                    <form class="theme-form" method="post" action="{{route('admin.blog.store')}}"
                                          enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <label for="form_name">Title</label>
                                                <input id="form_name" type="text" name="title"
                                                       class="form-control  @error('title') is-invalid @enderror"
                                                       placeholder="Please enter your address *"
                                                       data-error="address is required."
                                                       value="{{old('title')}}">

                                                @error('title')
                                                <span style="color: red">{{$message}} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 mt-5">
                                            <div class="form-label-group">
                                                <label for="form_name">Description</label>
                                                <textarea id="editor1" name="description" cols="30"
                                                          rows="10"></textarea>

                                                @error('description')
                                                <span style="color: red">{{$message}} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group">
                                                <label for="form_message">Image *</label>
                                                <input id="form_message" type="file" name="image"
                                                       class="form-control @error('image') is-invalid @enderror"
                                                       placeholder="Please enter your image *"
                                                       data-error="Image is required.">
                                                @error('image')
                                                <span style="color: red">{{$message}} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="margin-top: 20px;" class="block-header">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@push('javascript')
    <script src="{{asset('/plugins/editor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('/plugins/editor/ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{asset('/plugins/editor/ckeditor/styles.js')}}"></script>
    <script src="{{asset('/plugins/editor/ckeditor/ckeditor.custom.js')}}"></script>
@endpush
