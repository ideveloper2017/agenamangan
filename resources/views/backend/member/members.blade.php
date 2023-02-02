@extends('backend.layouts.app')
@section('content')
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
                        <h5>Team Members </h5>
                    </div>
                    <div class="title m-l-5"><a
                            class="btn mr-1 mb-3 btn-primary btn-sm " href="{{route('admin.members.create')}}">Team Members
                            add</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Specialty</th>
                                <th scope="col">Working time</th>
                                <th scope="col">Experience</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($employeess))
                                @foreach($employeess as $key => $employees)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>{{$employees->name}}</td>
                                        <td style="width: 50px; height: 50px; border-radius: 50%;"><img
                                                style="width: 50px; height: 50px; border-radius: 50%;"
                                                src="{{ asset('storage/images/'.$employees->image) }}"
                                                alt="">
                                        </td>
                                        <td>{{$employees->specialty}}</td>
                                        <td>{{$employees->working_time}}</td>
                                        <td>{{$employees->experience}}</td>
                                        <td>{{$employees->contact}}</td>
                                        <td>
                                            <a href="{{route('admin.members.edit', $employees)}}"
                                               class="btn btn-primary">Edit</a>
                                            <form class="d-inline"
                                                  action="{{route('admin.members.destroy', $employees->id)}}"
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
@endsection



