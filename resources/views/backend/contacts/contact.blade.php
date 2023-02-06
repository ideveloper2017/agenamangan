@extends('backend.layouts.limitless')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="bookmark">
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <h5>Contact</h5>
                    </div>
                    <div class="title m-l-5 m-1"><a
                            class="btn mr-1 mb-3 btn-primary btn-sm " href="{{route('admin.contacts.create')}}">Contact
                            add</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Address</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($contact))
                                @foreach($contact as $key => $contact_a)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>{{substr($contact_a->address, 0, 20)}}</td>
                                        <td>{{substr($contact_a->email, 0, 20)}}</td>
                                        <td>{{$contact_a->phone}}</td>
                                        <td style="width: 50px; height: 50px; border-radius: 50%;"><img
                                                style="width: 50px; height: 50px; border-radius: 50%;"
                                                src="{{ asset('uploads/'.$contact_a->image) }}"
                                                alt="">
                                        </td>
                                        <td>
                                            <a href="{{route('admin.contacts.edit', $contact_a)}}" class="btn btn-primary">Edit</a>
                                            <form class="d-inline"
                                                  action="{{route('admin.contacts.destroy', $contact_a->id)}}"
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
