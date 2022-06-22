@extends('FE.master.layout_dangbai')
@section('dangbai')
    <section>
        <div class="container mb-5">
            <div class="d-flex flex-column justify-content-center ">
                <h3 class="title">FANBOARD - WRITE POST</h3>
                <input type="text" placeholder="Tiêu đề">
                <textarea name="" id="" cols="30" rows="7" placeholder="NỘI DUNG"></textarea >
                <div class="button">
                    <button>Gửi</button>
                    <button>Reset</button>
                </div>
            </div>
        </div>
    </section>
@endsection
