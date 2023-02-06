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
                                <h5>Interactive</h5>
                            </div>
                            <div class="card-body">
                                <form class="theme-form" method="post" action="{{route('admin.interactive.store')}}"
                                      enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Interactive_services</label> <select name="interactive_services_id" id=""
                                                                          class="form-control mt-1">
                                                <option hidden>Select Interactive_services</option>

                                                @foreach($interactive_service as $interactive_service_id)
                                                    <option
                                                        value="{{$interactive_service_id->id}}">{{$interactive_service_id->name}}</option>

                                                @endforeach

                                            </select>

                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="form-label-group">
                                                <label for="form_message">File *</label>
                                                <input id="form_message" type="file" name="file"
                                                       class="form-control @error('file') is-invalid @enderror"
                                                       placeholder="Please enter your file *"
                                                       data-error="file is required.">
                                                @error('file')
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


