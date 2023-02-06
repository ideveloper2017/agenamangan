@extends('backend.layouts.limitless')
@section('title', 'Page')
@section('parentPageTitle', 'Control Panel')
@section('content')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <div class="row clearfix">
        <div class="col-lg-12">
            @include('flash::message')
            <div class="card">
                <div class="body m-10">
                    <div class="pull-left p-2">
                        <div class="btn-toolbar"><a href="{!! route('admin.page.create') !!}" class="btn btn-primary">
                                <span class="glyphicon glyphicon-plus"></span>&nbsp;Add Page </a></div>
                    </div>
                    @if($pages->count())
                        <div class="">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Название страница</th>
                                    <th>Язык</th>
                                    <th>Актив</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $counter = 0; ?>
                                @foreach( $pages as $page )
                                    <tr>
                                        <td>{{ $counter+=1 }}</td>
                                        <td> {!! link_to_route('admin.page.show', $page->title, $page->id, array(
                                    'class' => 'btn btn-link btn-xs' )) !!}
                                        </td>
                                        <td>{{ $page->lang }}</td>
                                        <td>
                                            <a href="#" id="{!! $page->id !!}" class="publish">
                                                <i id="publish-image-{!! $page->id !!}"
                                                   class="{!! ($page->is_published) ? 'fa fa-check' : 'fa fa-remove'  !!}"></i>
                                            </a>
                                        </td>
                                        <td>{!! $page->created_at !!}</td>
                                        <td>{!! $page->updated_at !!}</td>
                                        <td>

                                            <a href="{{route('admin.page.edit', $page)}}"
                                               class="btn btn-primary">Edit</a>
                                            <form class="d-inline"
                                                  action="{{route('admin.page.destroy', $page->id)}}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Sure Want Delete?')"
                                                        class="btn btn-danger">Delete
                                                </button>
                                            </form>
                                            </ul>


                                        </td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-danger">No results found</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="pull-left">
        <ul class="pagination">
            {!! $pages->render() !!}
        </ul>
    </div>
    </div>
@stop
