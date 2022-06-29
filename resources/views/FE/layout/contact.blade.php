@extends('FE.master.layout_contact')
@section('contact')
    <section >
        <div class="banner">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../image/CTCHT-COVER-FB.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../image/CTCHT-COVER-FB.jpg" alt="Second slide">
                    </div>

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

        <div id="innerBox">
            <div id="about">

                <div class="contactt">
                    <ul class="contactul">
                        <li class="contactfli">Audition</li>
                        <li class="contactsli"></li>
                        <li class="contacttli">audition@mym-ent.com</li><br>
                        <li class="contacttli conhover"><a href="MYM.docx">지원서 양식 다운로드</a></li>
                    </ul>
                    <ul class="contactul">
                        <li class="contactfli">Business &amp; Customer</li>
                        <li class="contactsli"></li>
                        <li class="contacttli"><span class="ctspan">AD / Business</span>biz@mym-ent.com</li><br>
                        <li class="contacttli"><span class="ctspan">Customer</span>mym@mym-ent.com</li>

                    </ul>
                    <ul class="contactul2">
                        <li class="contactfli2">Tel &amp; Address</li>
                        <li class="contactsli2"></li>
                        <li class="contacttli2">02-546-9669<br>
                            서울특별시 강남구 학동로 46길 23<br>
                            23, Hakdong-ro 46-gil, Gangnam-gu, Seoul,<br>
                            Republic of Korea</li>
                    </ul>
                    <ul class="contactul2">
                        <li class="contactfli2">Working Hour</li>
                        <li class="contactsli2"></li>
                        <li class="contacttli2"><span class="ctspan">Weekday</span>10 : 00 - 17 : 00<br>
                            (Break time 12 : 30 - 13 : 30)</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
@endsection
