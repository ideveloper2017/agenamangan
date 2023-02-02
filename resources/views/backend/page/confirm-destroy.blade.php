@extends('backend.layouts.app')
@section('title', 'Меню')
@section('parentPageTitle', 'Меню список')
@section('content')
    <div class="col-lg-10">
        {!! Form::open( array(  'route' => array('admin.page.destroy', $page->id ) ) ) !!}
        {!! Form::hidden('_method', 'DELETE') !!}
        <div class="alert alert-danger">
            There might be a link given to this page, <a href="">Check it</a>
        </div>
        <div class="alert alert-warning">
            <div class="pull-left"><b> Be Careful!</b> Are you sure you want to delete <b>{!! $page->title !!} </b> ?
            </div>
            <div class="pull-right">
                {!! Form::submit('Yes', array('class' => 'btn btn-danger')) !!}
                {!! link_to( URL::previous(), 'No', array( 'class' => 'btn btn-primary' ) ) !!}
            </div>
            <div class="clearfix"></div>
        </div>
        {!! Form::close() !!}
    </div>
@stop
