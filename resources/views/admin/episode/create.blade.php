@extends('layouts.admin')

@section('content')
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">

                    <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8 m-b">
                                    @if(isset($episode) && isset($episode->id))
                                        <h3 class="text-center ">{{ trans('admin.episode.edit_title') }} {{$episode->season->title}}, {{$episode->serial->title}} </h3>
                                    @else
                                        <h3 class="text-center ">{{ trans('admin.episode.create_title') }} {{$season->title}}, {{$serial->title}}</h3>
                                    @endif
                                </div>
                            </div>

                        <form method="POST" action="@if(isset($episode) && isset($episode->id)) {{ route('admin.episode.update', $episode->id) }} @else {{ route('admin.episode.create') }} @endif" enctype="multipart/form-data" class="form-horizontal" novalidate>
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="@if(isset($episode) && isset($episode->id)) {{ $episode->id }}@endif">
                            <input type="hidden" name="serial_id" value="@if(isset($episode) && isset($episode->id)) {{ $episode->serial->id }}@endif">
                            <input type="hidden" name="season_id" value="@if(isset($episode) && isset($episode->id)) {{ $episode->season->id }}@endif">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('admin.episode.title') }}</label>
                                <div class="col-sm-10 m-b {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <input name="title" type="text" value="@if(isset($episode) && isset($episode->id)) {{$episode->title}} @else {{ old('title') }} @endif" placeholder="{{ trans('admin.episode.title') }}" class="form-control m-b">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.episode.content') }}</label>
                                <div class="col-sm-10 m-b {{ $errors->has('content') ? 'has-error' : '' }}">
                                <textarea name="description" placeholder="{{ trans('admin.episode.title') }}" class="form-control m-b">@if(isset($episode) && isset($episode->id)) {{$episode->description}} @else {{ old('description') }} @endif</textarea>
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">Premiere date:</label>
                                <div id="sandbox-container" class="col-sm-10 m-b">
                                    <div class="input-group date">
                                        <input type="text" class="form-control" name="premiere_date"
                                               value="@if(isset($episode) && isset($episode->id)) {{$episode->premiere_date}} @endif"
                                               placeholder="Premiere date" value="{{ old('premiere_date') }}"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                    </div>
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.episode.picture') }}</label>
                                <div class="col-sm-10 m-b {{ $errors->has('picture') ? 'has-error' : '' }}">
                                    @if ($errors->has('picture'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('picture') }}</strong>
                                        </div>
                                    @endif
                                        <div class="col-sm-10">
                                            @if(isset($episode->picture))
                                                <div class=" m-b">
                                                    <div id="thumbnail">
                                                        <div class="image-holder">
                                                            <img class="fake-img"  src="{{ asset('storage/'.$episode->picture) }}" />
                                                            <div style="background: url({{ asset('storage/'.$episode->picture) }}) no-repeat center;background-size: cover;" class="img"></div>
                                                        </div>
                                                        <a href="{{ route('episode.remove.picture', $episode->id) }}" id="remove-photo" class="btn btn-danger alert-delete-photo">
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