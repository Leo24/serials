@extends('layouts.admin')

@section('content')
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">

                    <div class="panel-body">
                        <form method="POST" action="@if(isset($serial) && isset($serial->id)) {{ route('admin.serial.update', $serial->id) }} @else {{ route('admin.serial.create') }} @endif" enctype="multipart/form-data" class="form-horizontal" novalidate>
                            {{ csrf_field() }}

                            @if(isset($serial) && isset($serial->id))
                                <h3 class="text-center m-b">{{ trans('admin.serial.edit_title') }}</h3>
                            @else
                                <h3 class="text-center m-b">{{ trans('admin.serial.create_title') }}</h3>
                            @endif
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('admin.serial.title') }}</label>
                                <div class="col-sm-10 m-b {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <input name="title" type="text" value="@if(isset($serial) && isset($serial->id)) {{$serial->title}} @else {{ old('title') }} @endif" placeholder="{{ trans('admin.serial.title') }}" class="form-control m-b">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.serial.content') }}</label>
                                <div class="col-sm-10 m-b {{ $errors->has('content') ? 'has-error' : '' }}">
                                <textarea name="description" placeholder="{{ trans('admin.serial.title') }}" class="form-control m-b">@if(isset($serial) && isset($serial->id)) {{$serial->description}} @else {{ old('description') }} @endif</textarea>
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.serial.genre') }}</label>
                                <div class="col-sm-10 m-b">
                                    <select class="selectpicker form-control m-b js-source-states" name="genres[]" multiple>
                                    @foreach($genres as $genre)
                                            <option value="{{$genre->id}}" @if(isset($serial) && isset($serial->id)) {{(in_array($genre->id, $serial->genreList())) ? 'selected' : '' }} @endif>{{$genre->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.serial.country') }}</label>
                                <div class="col-sm-10 m-b">
                                    <select class="selectpicker form-control m-b js-source-states-2" name="countries[]" multiple>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}" @if(isset($serial) && isset($serial->id)) {{(in_array($country->id, $serial->countryList())) ? 'selected' : '' }} @endif>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="col-sm-2 control-label">Start date:</label>
                                <div id="sandbox-container" class="col-sm-10 m-b">
                                    <div class="input-group date">
                                        <input type="text" class="form-control" name="start_date"
                                               value="@if(isset($serial) && isset($serial->id)) {{$serial->start_date}} @endif"
                                               placeholder="Start date" value="{{ old('start_date') }}"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                    </div>
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('admin.serial.picture') }}</label>
                                <div class="col-sm-10 m-b {{ $errors->has('picture') ? 'has-error' : '' }}">
                                    @if ($errors->has('picture'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('picture') }}</strong>
                                        </div>
                                    @endif
                                        <div class="col-sm-10">
                                            @if(isset($serial->picture))
                                                <div class=" m-b">
                                                    <div id="thumbnail">
                                                        <div class="image-holder">
                                                            <img class="fake-img"  src="{{ asset('storage/'.$serial->picture) }}" />
                                                            <div style="background: url({{ asset('storage/'.$serial->picture) }}) no-repeat center;background-size: cover;" class="img"></div>
                                                        </div>
                                                        <a href="{{ route('serial.remove.picture', $serial->id) }}" id="remove-photo" class="btn btn-danger alert-delete-photo">
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