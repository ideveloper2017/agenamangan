@extends('backend.layouts.app')
@section('content')
{{--    {!! HTML::style('ckeditor/contents.css') !!}--}}
    <!-- Content Header (Page header) -->
    <div class="container">
        <div class="col-lg-10">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{!! route('admin.page.index') !!}"
                       class="btn btn-primary"> <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back </a>
                </div>
            </div>
            <br> <br> <br>
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td><strong>Title</strong></td>
                    <td>{!! $page->title !!}</td>
                </tr>
                <tr>
                    <td><strong>Published</strong></td>
                    <td>{!! $page->is_published !!}</td>
                </tr>
                <tr>
                    <td><strong>Content</strong></td>
                    <td>{!! $page->content !!}</td>
                </tr>
                <tr>
                    <td><strong>Date Created</strong></td>
                    <td>{!! $page->created_at !!}</td>
                </tr>
                <tr>
                    <td><strong>Date Updated</strong></td>
                    <td>{!! $page->updated_at !!}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop
