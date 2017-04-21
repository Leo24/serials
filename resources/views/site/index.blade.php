@extends('layouts.site')

@section('content')
    <div id="wrapper">
        <div class="content animate-panel">
            <div class="row masonry">
                @foreach($data as $item)
                    <div class="col-md-3 masonry-item">
                        <div class="hpanel">
                            <div class="panel-body">
                                <div class="text-center">
                                    <p class="font-bold">{{$item->title}}</p>
                                    <div class="m">
                                        <img class="img-thumbnail" src="{{ asset('storage/'.$item->picture) }}" alt="{{$item->title}}" />
                                    </div>
                                    <p class="small">
                                        {!! $item->description !!}
                                    </p>
                                    <a href="{{route('site.show', ['id'=>$item->id])}}"><button class="btn btn-info btn-sm">View details</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection