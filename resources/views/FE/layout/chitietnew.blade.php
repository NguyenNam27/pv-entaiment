@extends('FE.master.layout_chitietnew')
@section('chitietnew')
    <section class=" mt-3 mb-3 ">
        <div class="container">
            <div class="new__title">
{{--                {{dd($detail->content)}}--}}
                <h4>{{ $detail->title }}</h4>
                <span>NOTICE</span>
                <span>|</span>
                <span> <i class="fa-regular fa-clock"></i> {{$detail->created_at}}</span>
            </div>
            <div class="new__info" >
                {!! $detail->content  !!}
            </div>
        </div>
    </section>
@endsection
