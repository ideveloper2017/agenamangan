@extends('backend.layouts.app')
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Interactive Services</h5>
                    </div>
                    <div class="title m-l-5"><a
                            class="btn mr-1 mb-3 btn-primary btn-sm "
                            href="{{route('admin.interactive_services.create')}}">Interactive
                            Services
                            add</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Title</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(isset($interactive_service))
                                @foreach($interactive_service as $key => $interactive_services)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>

                                        <td>{{$interactive_services->name}}</td>
                                        <td>
                                <span style=" padding: 10px 20px 10px 20px; border-radius: 30px; " ;
                                      class="badge bg-{{ $interactive_services->status == 1 ? 'success' : 'danger' }}">
                                    {{$interactive_services->status == 1 ? 'active' : 'inactive'}}
                                </span>
                                      </td>

                                        {{--                                        <td style="width: 50px; height: 50px; border-radius: 50%;"><img--}}
                                        {{--                                                style="width: 50px; height: 50px; border-radius: 50%;"--}}
                                        {{--                                                src="{{ asset('storage/images/'.$blogs->image) }}"--}}
                                        {{--                                                alt="">--}}
                                        {{--                                        </td>--}}

                                        <td>
                                            <a href="{{route('admin.interactive_services.edit', $interactive_services)}}"
                                               class="btn btn-primary">Edit</a>
                                            <form class="d-inline"
                                                  action="{{route('admin.interactive_services.destroy', $interactive_services->id)}}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Sure Want Delete?')"
                                                        class="btn btn-danger">Delete
                                                </button>
                                            </form>


                                        </td>

                                    </tr>

                                @endforeach

                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Container-fluid Ends-->

@endsection



