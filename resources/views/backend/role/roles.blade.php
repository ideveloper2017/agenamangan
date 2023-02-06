@extends('backend.layouts.limitless')
@section('content')
    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/css/datatables.css') }}">
    @endpush
    <div class="container-fluid">
        <div class="row clearfix">
            <!-- start message area-->
{{--            @include('include.message')--}}
            <!-- end message area-->
            <!-- only those have manage_role permission will get access -->
{{--            @can('manage_role')--}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h3>{{ __('Add Role')}}</h3></div>
                        <div class="card-body">
                            <form class="forms-sample" method="POST" action="{{url('admin/roles/create')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="role">{{ __('Role')}}<span class="text-red">*</span></label>
                                            <input type="text" class="form-control is-valid" id="role" name="name" placeholder="Role Name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <label for="exampleInputEmail3">{{ __('Assign Permission')}} </label>
                                        <div class="row">
                                            @foreach($permissions as $key => $permission)
                                                <div class="col-sm-4  checkbox checkbox-primary">
                                                    <input type="checkbox" class="custom-control-input" id="item_checkbox-{{$key}}" name="permissions[]" value="{{$key}}">
                                                    <label for="item_checkbox-{{$key}}">
                                                        <span class="custom-control-label">
                                                	<!-- clean unescaped data is to avoid potential XSS risk -->
                                                	{{ clean($permission,'titles')}}
                                                </span>
                                                    </label>

                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-rounded">{{ __('Save')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
{{--            @endcan--}}
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-header"><h3>{{ __('Roles')}}</h3></div>
                    <div class="card-body">
                        <table id="roles_table" class="table">
                            <thead>
                            <tr>
                                <th>{{ __('Role')}}</th>
                                <th>{{ __('Permissions')}}</th>
                                <th>{{ __('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('javascript')
        <script src="{{ asset('/plugins/datatable/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('/plugins/datatable/datatables/datatable.custom.js') }}"></script>
        {{--        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>--}}
        <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
        <!--server side users table script-->
        <script src="{{ asset('js/custom.js') }}"></script>
    @endpush
@endsection
