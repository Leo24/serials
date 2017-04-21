@extends('layouts.site')

@section('content')
    <aside class="accordion">
        <h1>{{$serial->title}}</h1>
        <div class="opened-for-codepen">
            @foreach($serial->seasons as $season)
                <h2>{{$season->title}}</h2>
                <div class="opened-for-codepen">
                    @foreach($season->episods as $episode)
                        <h4>{{$episode->title}}</h4>
                        <p>
                            <img class="img-thumbnail" src="{{ asset('storage/'.$episode->picture) }}" alt="{{$episode->title}}" />
                            <span>{{$episode->description}}</span>
                        </p>
                    @endforeach
                </div>
            @endforeach
        </div>
    </aside>

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



@endsection