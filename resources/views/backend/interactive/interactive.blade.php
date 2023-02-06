@extends('backend.layouts.limitless')
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
                        <h5>Interactive</h5>
                    </div>
                    <div class="title m-l-5 m-1"><a
                            class="btn mr-1 mb-3 btn-primary btn-sm "
                            href="{{route('admin.interactive.create')}}">Interactive

                            add</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Interactive</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(isset($interactive))
                                @foreach($interactive as $key => $interactives)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>{{$interactives->interactive_service->name}}</td>
                                        <td>
                                <span style=" padding: 10px 20px 10px 20px; border-radius: 30px; " ;
                                      class="badge bg-{{$interactives->status == 1 ? 'success' : 'danger' }}">
                                    {{$interactives->status == 1 ? 'active' : 'inactive'}}
                                </span>
                                        </td>
                                        <td>{{$interactives->created_at}}</td>
                                        <td>{{$interactives->updated_at}}</td>

                                        <td>
                                            <a href="{{route('admin.interactive.edit', $interactives)}}"
                                               class="btn btn-primary">Edit</a>
                                            <form class="d-inline"
                                                  action="{{route('admin.interactive.destroy', $interactives->id)}}"
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



