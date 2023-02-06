@extends('backend.layouts.limitless')
@section('content')

    <div class="container-fluid">
        <div class="row clearfix">
            <!-- start message area-->
{{--            @include('include.message')--}}
            <!-- end message area-->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Edit Role')}}</h3></div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{url('admin/roles/update')}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="role">{{ __('Role')}}<span class="text-red">*</span></label>
                                        <input type="text" class="form-control is-valid" id="role" name="name" value="{{ clean($role->name, 'titles')}}" placeholder="Insert Role">
                                        <input type="hidden" name="id" value="{{$role->id}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <label for="exampleInputEmail3">{{ __('Assign Permission')}} </label>
                                    <div class="row">
                                        @foreach($permissions as $key => $permission)
                                            <div class="col-sm-4 checkbox checkbox-primary">
                                                <input type="checkbox" class="checkbox checkbox-primary" id="item_checkbox-{{ $key }}" name="permissions[]" value="{{$key}}"
                                                       @if(in_array($key, $role_permission))
                                                           checked
                                                    @endif>
                                                <label for="item_checkbox-{{ $key }}">
                                                    <!-- check permission exist -->

                                                    <span class="custom-control-label">
                                                <!-- clean unescaped data is to avoid potential XSS risk -->
                                                {{ clean($permission, 'titles')}}
                                            </span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-rounded">{{ __('Update')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
