@extends('backend.layouts.limitless')
@section('title', 'Меню')
@section('parentPageTitle', 'Меню список')

@section('content')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <div class="row clearfix">
        <div class="col-lg-6 col-md-12 col-sm-12">

            <div class="card">
                <div class="body m-10">
                    <div class="pull-right">
                        <div id="msg"></div>
                    </div>
                    <h6>Меню</h6>
                    <hr>
                    <div class="clearfix m-b-20">
                        <div class="dd" id="nestable">
                            {!! $menus !!}
                        </div>
                    </div>
                    @if($menus === null)
                        <div class="alert alert-danger">No results found</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">

            <div class="card m-10 ">
                <div class="body m-20 ">
                    {!! Form::open(array('action' => '\App\Http\Controllers\Admin\MenuController@store')) !!}
                    <div class="pull-right">
                        <div id="msg"></div>
                    </div>
                    <button class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-check"></span>&nbsp;save
                    </button>
                    <a href="{!! route('admin.menus.create') !!}" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span>&nbsp;cancel </a> <br>
                    <hr>
                    <div class="clearfix ">
                        <h6>Заголовок пункта меню</h6>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Название меню"
                                   aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="form-group">
                            <label>Тип</label>
                            <div class="col">
                                <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                    <div class="radio radio-primary">
                                        <input id="radioinline1" class="type" type="radio" name="type" value="module">
                                        <label class="mb-0" for="radioinline1">Модул<span class="digits"> </span></label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input id="radioinline2" class="type" type="radio" name="type" value="custom">
                                        <label class="mb-0" for="radioinline2">Custom<span class="digits"> </span></label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group {!! $errors->has('options') ? 'has-error' : '' !!} modules">
                            <label class="control-label" for="title">Опция</label>

                            <div class="controls">
                                {!! Form::select('option', $options, null, array('class'=>'form-control', 'id' => 'options', 'value'=>old('options'))) !!}
                                @if ($errors->first('options'))
                                    <span class="help-block">{!! $errors->first('options') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div style="display:none" class="form-group {!! $errors->has('url') ? 'has-error' : '' !!} url">
                            <label class="control-label" for="first-name">URL</label>

                            <div class="controls">
                                {!! Form::text('url',null, array('class'=>'form-control', 'id' => 'url', 'placeholder'=>'Url', 'value'=>old('url'))) !!}
                                @if ($errors->first('url'))
                                    <span class="help-block">{!! $errors->first('url') !!}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label><h6>Язык</h6></label>
                            {!! Form::select('lang', $langs, null, array('class'=>'form-control', 'id' => 'lang', 'value'=>old('lang'))) !!}
                        </div>

                        <div class="form-group">
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="is_public" id="is_public" value="1" required
                                       data-parsley-errors-container="#error-checkbox">
                                <span style="color: black;font-weight: bold" >Актив</span>
                            </label>

                            <p id="error-checkbox"></p>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            // $('#notification').show().delay(4000).fadeOut(700);
            // publish settings
            $(".publish").bind("click", function (e) {
                var id = $(this).attr('id');
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "{!! url( '/admin/menus/" + id + "/toggle-publish/') !!}",
                    headers: {
                        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                    },
                    success: function (response) {
                        if (response['result'] == 'success') {
                            var imagePath = (response['changed'] == 1) ? "fa fa-check" : "fa fa-remove";
                            var message = (response['changed'] == 1) ? "published" : "unpublished";
                            $("#publish-image-" + id).attr('class', imagePath);
                            $("#msg").html('<div class="msg-save" style="float:right; color:red;">' + message + '</div>');
                        }
                    },
                    error: function () {
                        $("#msg").html('<div class="msg-save" style="float:right; color:red;">Saving!</div>');
                        alert("error");
                    }
                });
            });

            $('.type').change(function () {
                    var selected = $('input[class="type"]:checked').val();
                    if (selected == "custom") {
                        $('.modules').css('display', 'none');
                        $('.url').css('display', 'block');
                    } else {
                        $('.modules').css('display', 'block');
                        $('.url').css('display', 'none');
                    }
                }
            );

            $(".type").trigger("change");


            var updateOutput = function (e) {
                var list = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    var jsonData = window.JSON.stringify(list.nestable('serialize'));
                    console.log(window.JSON.stringify(list.nestable('serialize')));
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.menus.save') }}",
                        data: {'json': jsonData},
                        headers: {
                            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                        },
                        success: function (response) {

                            //$("#msg").append('<div class="alert alert-success msg-save">Saved!</div>');
                            $("#msg").html('<div class="msg-save" style="float:right; color:red;">Saving!</div>');
                            // $('.msg-save').delay(1000).fadeOut(500);
                        },
                        error: function () {
                            alert("error");
                        }
                    });

                } else {
                    alert('error');
                }
            };

            $('#nestable').nestable({
                group: 1
            }).on('change', updateOutput);
        });
    </script>

@endpush


