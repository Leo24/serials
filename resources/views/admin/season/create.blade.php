@extends('layouts.admin')

@section('content')
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">

                    <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8 m-b">
                                    @if(isset($season) && isset($season->id))
                                        <h3 class="text-center ">{{ trans('admin.season.edit_title') }}</h3>
                                        <div class="col-md-2 m-b">
                                            <a href="{{ route('admin.episode.create') }}" class="btn w-xs btn-info">
                                                <i class="fa fa-plus"></i>
                                                <span class="bold">{{ trans('admin.episode.button_create_title') }}</span>
                                            </a>
                                        </div>
                                    @else
                                        <h3 class="text-center ">{{ trans('admin.season.create_title') }}</h3>
                                    @endif
                                </div>
                            </div>

                        <form method="POST" action="@if(isset($season) && isset($season->id)) {{ route('admin.season.update', $season->id) }} @else {{ route('admin.season.create') }} @endif" enctype="multipart/form-data" class="form-horizontal" novalidate>
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="@if(isset($season) && isset($season->id)) {{ $season->id }}@endif">
                            <input type="hidden" name="serial_id" value="@if(isset($season) && isset($season->id)) {{ $season->serial->id }}@endif">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('admin.season.title') }}</label>
                                <div class="col-sm-10 m-b {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <input name="title" type="text" value="@if(isset($season) && isset($season->id)) {{$season->title}} @else {{ old('title') }} @endif" placeholder="{{ trans('admin.season.title') }}" class="form-control m-b">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.season.content') }}</label>
                                <div class="col-sm-10 m-b {{ $errors->has('content') ? 'has-error' : '' }}">
                                <textarea name="description" placeholder="{{ trans('admin.season.title') }}" class="form-control m-b">@if(isset($season) && isset($season->id)) {{$season->description}} @else {{ old('description') }} @endif</textarea>
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">Start date:</label>
                                <div id="sandbox-container" class="col-sm-10 m-b">
                                    <div class="input-group date">
                                        <input type="text" class="form-control" name="start_date"
                                               value="@if(isset($season) && isset($season->id)) {{$season->start_date}} @endif"
                                               placeholder="Start date" value="{{ old('start_date') }}"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                    </div>
                                </div>

                                <label class="col-sm-2 control-label">End date:</label>
                                <div id="sandbox-container" class="col-sm-10 m-b">
                                    <div class="input-group date">
                                        <input type="text" class="form-control" name="end_date"
                                               value="@if(isset($season) && isset($season->id)) {{$season->end_date}} @endif"
                                               placeholder="End date" value="{{ old('end_date') }}"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                    </div>
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.season.picture') }}</label>
                                <div class="col-sm-10 m-b {{ $errors->has('picture') ? 'has-error' : '' }}">
                                    @if ($errors->has('picture'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('picture') }}</strong>
                                        </div>
                                    @endif
                                        <div class="col-sm-10">
                                            @if(isset($season->picture))
                                                <div class=" m-b">
                                                    <div id="thumbnail">
                                                        <div class="image-holder">
                                                            <img class="fake-img"  src="{{ asset('storage/'.$season->picture) }}" />
                                                            <div style="background: url({{ asset('storage/'.$season->picture) }}) no-repeat center;background-size: cover;" class="img"></div>
                                                        </div>
                                                        <a href="{{ route('season.remove.picture', $season->id) }}" id="remove-photo" class="btn btn-danger alert-delete-photo">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </div>

                                                </div>
                                            @else
                                                <input name="picture" type="file" class="form-control">
                                            @endif
                                        </div>
                                </div>

                                <div class="col-sm-8 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">{{ trans('admin.save') }}</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection