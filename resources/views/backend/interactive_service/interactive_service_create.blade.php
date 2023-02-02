@extends('backend.layouts.app')
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
                                <h5>Interactive Services</h5>
                            </div>
                            <div class="card-body">
                                <form class="theme-form" method="post" action="{{route('admin.interactive_services.store')}}"
                                      enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <label for="form_name">Name</label>
                                            <input id="form_name" type="text" name="name"
                                                   class="form-control  @error('name') is-invalid @enderror"
                                                   placeholder="Please enter your name *"
                                                   data-error="name is required."
                                                   value="{{old('name')}}">

                                            @error('name')
                                            <span style="color: red">{{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-12 ">
                                        <label for="validationTooltip01">Status</label>
                                        <select class="form-control " name="status">

                                            <option value="1">Active</option>
                                            <option value="0">No Active</option>
                                        </select>
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


