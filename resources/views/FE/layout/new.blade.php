@extends('FE.master.layout_new')
@section('new')
    <section class="news-main ">
        <div class="container">
            <h2>News</h2>
            @foreach($new as $new)
            <div class="row news">
                <div class="col-md-4">
                    <div class="news__img">
                        <img src="{{asset($new->image)}}" alt="">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="news__info">
                        <span>{{$new->created_at}}</span>
                        <a href="{{route('chitiettintuc',['slug'=>$new->slug])}}">{{$new->title}}</a>
                        <p>{{strip_tags($new->short_description)}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="box-footer clearfix">
{{--            {{$new->links()}}--}}
        </div>

    </section>
@endsection
