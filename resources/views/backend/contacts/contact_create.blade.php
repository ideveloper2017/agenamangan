@extends('backend.layouts.limitless')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h5>Contact</h5>
                            </div>
                            <div class="card-body">
                                <form class="theme-form" method="post" action="{{route('admin.contacts.store')}}"
                                      enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <label for="form_name">Address</label>
                                            <input id="form_name" type="text" name="address"
                                                   class="form-control  @error('address') is-invalid @enderror"
                                                   placeholder="Please enter your address *"
                                                   data-error="address is required."
                                                   value="{{old('address')}}">

                                            @error('address')
                                            <span style="color: red">{{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <label for="form_name">Phone</label>
                                            <input id="form_name" type="phone" name="phone"
                                                   class="form-control  @error('phone') is-invalid @enderror"
                                                   placeholder="Please enter your phone *"
                                                   data-error="phone is required."
                                                   value="{{old('phone')}}">

                                            @error('phone')
                                            <span style="color: red">{{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <label for="form_name">Email</label>
                                            <input id="form_name" type="email" name="email"
                                                   class="form-control  @error('email') is-invalid @enderror"
                                                   placeholder="Please enter your email *"
                                                   data-error="email is required."
                                                   value="{{old('email')}}">

                                            @error('email')
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
