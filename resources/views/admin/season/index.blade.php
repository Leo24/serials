@extends('layouts.admin')

@section('content')
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-10 m-b">
                            <h2 class="margin0">{{ trans('admin.season.page_title') }} "{{$serial->title}}"</h2>
                            </div>
                            <div class="col-md-2 m-b">

                                <a href="{{ route('admin.season.create') }}" class="btn w-xs btn-success">
                                    <i class="fa fa-plus"></i>
                                    <span class="bold">{{ trans('admin.season.button_create_title') }}</span>
                                </a>

                            </div>
                        </div>



                        <aside class="accordion">
{{--                            <h1>{{ trans('admin.season.page_title') }} "{{$serial->title}}"</h1>--}}
                            <div class="opened-for-codepen">
                                @foreach($data as $season)
                                    <h2>{{$season->title}}
                                        <span class="col-sm-4 pull-right">
                                            <a href="{{ route('admin.episode.create', ['id' => $season->id]) }}" class="btn w-xs btn-success pull-left">
                                                <i class="fa fa-plus"></i>
                                                <span class="bold">{{ trans('admin.episode.button_create_title') }}</span>
                                            </a>
                                        <a class="btn btn-info pull-left" href="{{ route('admin.season.edit', $season->id) }}" title="{{ trans('admin.season.edit') }}">
                                            <i class="fa fa-paste"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.season.delete', $season->id) }}">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger alert-delete-item" type="submit" title="{{ trans('admin.season.delete') }}">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    </span>
                                    </h2>

                                    <div class="opened-for-codepen">
                                        @foreach($season->episods as $episode)
                                            <h4>{{$episode->title}}
                                                <span class="col-sm-4 pull-right">
                                                    <a class="btn btn-info pull-left" href="{{ route('admin.episode.edit', $episode->id) }}" title="{{ trans('admin.episode.edit') }}">
                                                        <i class="fa fa-paste"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('admin.episode.delete', $episode->id) }}">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-danger alert-delete-item" type="submit" title="{{ trans('admin.episode.delete') }}">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>
                                                </span>
                                            </h4>
                                            <p>
                                                <img class="img-thumbnail" src="{{ asset('storage/'.$episode->picture) }}" alt="{{$episode->title}}" />
                                                <span>{{$episode->description}}</span>
                                            </p>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </aside>


                        {{--@if (session('success'))--}}
                        {{--<div class="alert alert-success">--}}
                        {{--{{ session('success') }}--}}
                        {{--</div>--}}
                        {{--@endif--}}

                    </div>
                    <div class="panel-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>






    <script>
        window.onload = function () {
            var headers = ["H1", "H2", "H3", "H4", "H5", "H6"];
            $(".accordion").click(function (e) {
                var target = e.target,
                        name = target.nodeName.toUpperCase();
                if ($.inArray(name, headers) > -1) {
                    var subItem = $(target).next();
                    //slideUp all elements (except target) at current depth or greater
                    var depth = $(subItem).parents().length;
                    var allAtDepth = $(".accordion p, .accordion div").filter(function () {
                        if ($(this).parents().length >= depth && this !== subItem.get(0)) {
                            return true;
                        }
                    });
                    $(allAtDepth).slideUp("fast");

                    //slideToggle target content and adjust bottom border if necessary
                    subItem.slideToggle("fast", function () {
                        $(".accordion :visible:last").css("border-radius", "0 0 10px 10px");
                    });
                    $(target).css({"border-bottom-right-radius": "0", "border-bottom-left-radius": "0"});
                }
            });

        }
    </script>





    {{--@include('admin.partials.js_remove_script')--}}

@endsection