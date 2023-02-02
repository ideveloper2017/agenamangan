@extends('backend.layouts.app')

@section('title','Category')

@push('css')

@endpush

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-xxl-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div style="padding: 30px" class="card ">
                            <div class="card-header pb-0">
                                <h5> ADD NEW CATEGORY</h5>
                            </div>
                            <div class="card-body ">
                                <form class="theme-form" method="post" action="{{ route('admin.category.store') }}"
                                      enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <label for="form_name">Category name</label>
                                            <input id="form_name" type="text" name="name"
                                                   class="form-control  @error('name') is-invalid @enderror"
                                                   placeholder="Please enter your address *"
                                                   data-error="name is required."
                                                   value="{{old('name')}}">

                                            @error('name')
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
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label><h6>Язык</h6></label>
                                            {!! Form::select('lang', $langs, null, array('class'=>'form-control', 'id' => 'lang', 'value'=>old('lang'))) !!}
                                        </div>
                                    </div>
                                    <div style="margin-top: 20px;" class="block-header">
                                        <a class="btn btn-danger  waves-effect"
                                           href="{{ route('admin.category.index') }}">BACK</a>
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
