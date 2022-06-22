@extends('FE.master.layout_store')
@section('store')
    <section>
        <div class="container">
            <h2>Sản phẩm</h2>
            <div class="row">
                @foreach($product as $pro)
                <div class="col-md-3 info">
                    <div class="item">
                        <div class="item__img">
                            <a href="{{route('chitietsanpham',['slug'=>$pro->slug])}}}">
                                <img src="{{asset($pro->image)}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="desc">
                        @if($pro->is_active==1)
                        <span>new</span>
                        @endif
                    </div>
                    <a href="{{route('chitietsanpham',['slug'=>$pro->slug])}}">{{$pro->name}}</a>
                    <p>{{number_format($pro->price)}} VNĐ</p>
                </div>
                @endforeach
            </div>
            <div class="box-footer clearfix">
                {{$product->links()}}

            </div>
        </div>
    </section>
@endsection
