@extends('FE.master.layout_picture')
@section('picture')
    <section >
        <div class="container">
            <h3 class="title">GALLERY</h3>
            <div class="row">
                @foreach($picture as $pic)
                <div class="col-lg-3 col-md-6 picture-img" >
                    <img src="{{asset($pic->image)}}" alt="">
                </div>
                @endforeach
            </div>
        </div>
        <div class="modal_image">
            <div class="overlay"></div>
            <div class="show_img">
                <i class="fa-solid fa-circle-xmark"></i>
                <img src="{{asset($pic->image)}}" alt="">
            </div>
        </div>
    </section>
@endsection
