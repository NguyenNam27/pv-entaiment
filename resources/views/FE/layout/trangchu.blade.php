@extends('FE.master.layout_trangchu')
@section('trangchu')
<section>
    <div class="banner">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @php
                    $i=0;
                @endphp
                @foreach($banner as $ban)
                    @php
                        $i++;
                    @endphp

                <div class="carousel-item {{$i == 1 ?'active':''}}">
                    <img class="d-block w-100" src="{{asset($ban->image)}}" alt="" >
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="row" >
            <div class="col-md-4">
                <div class="content">
{{--                    <div class="items">--}}
{{--                        @foreach($video as $vi)--}}
{{--                        <div class="item__info">--}}
{{--                            <div class="item__img">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="{{asset($vi->image)}}"  alt="">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <span>22/02/2022</span>--}}
{{--                            <a href="{{$vi->URL}}">{{$vi->title}}</a>--}}
{{--                        </div>--}}

{{--                        @endforeach--}}
{{--                    </div>--}}
                    <div class="list__item">
                        @foreach($video as $vi)
                            <div class="item2 d-flex ">
                                <div class="item2__img">
                                    <a href="#">
                                        <img src="{{asset($vi->image)}}" height="70%" width="70%" alt="">
                                    </a>
                                </div>
                                <div class="item2__text">
                                    <a href="{{$vi->URL}}">{{$vi->title}}</a>
                                    <span>22/02/2022</span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <a href="#">All video</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="content">
                    <div class="list__item">
                        @foreach($post as $post)
                        <div class="item2 d-flex ">
                            <div class="item2__img">
                                <a href="{{route('chitiettintuc',['slug'=>$post->slug])}}">
                                    <img src="{{asset($post->image)}}" height="70%" width="70%" alt="">
                                </a>
                            </div>
                            <div class="item2__text">
                                <a href="{{route('chitiettintuc',['slug'=>$post->slug])}}">{{$post->title}}</a>
                                <p>{{strip_tags($post->short_description)}}</p>
                                <span>{{$post->created_at}}</span>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <a href="{{route('tintuc')}}">All Post</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="content">
                    <div class="list__item">
                        <div class="wpb_wrapper">
                            <div >
                                <span >
                                   <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FVinhOfficialFanpage&tabs=timeline&width=320&height=320&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=true&appId"
                                           width="320" height="320" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                                           allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                                </span>
                            </div>
                            <div class="socical-widget">
                                <h5>Follow us on</h5>
                                <a href="https://www.facebook.com/VinhOfficialFanpage" target="_blank"><i class="fab fa-facebook-square"></i></a>
                                <a href="https://www.youtube.com/phamvinhofficial99" target="_blank"><i class="fab fa-youtube"></i></a>
                                <a href="https://www.tiktok.com/@phamvinh99" target="_blank"><i class="fab fa-tiktok"></i></a>
                                <a href="https://www.instagram.com/vinhhaycuoi/" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>

                    </div>

                </div>
                        <a href="https://www.facebook.com/VinhOfficialFanpage" target="_blank">Go to Facebook</a>
            </div>
        </div>
    </div>
</section>
@endsection
