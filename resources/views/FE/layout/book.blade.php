@extends('FE.master.layout_book')
@section('book')
    <section class="booking ">
        <div class="container">
            @if(session()->has('success'))
                <div class="alert alert-success">{{session()->get('success')}}</div>
            @endif
            <div class="row">
                <div class="col-12">
                    <label for="">Booking Type</label>
                    <select name="booking_type">
                        <option value="1" >brand</option>
                    </select>
                </div>
            </div>

            <form method="post" action="{{route('post')}} " enctype="multipart/form-data">
                @csrf

                <div class="row " >
                    <div class="col-md-12">
                        <label for="">Company Name</label>
                        <input type="text" name="name_company">
                        @if($errors->has('name_company'))
                            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                <i class="fa fa-info"></i>{{$errors->first('name_company')}}
                            </label>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="">Budget (ĐVT:VNĐ)</label>
                        <input type="text" name="budget">
                        @if($errors->has('budget'))
                            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                <i class="fa fa-info"></i>{{$errors->first('budget')}}
                            </label>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="">Your Full Name </label>
                        <input type="text" name="full_name">
                        @if($errors->has('full_name'))
                            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                <i class="fa fa-info"></i>{{$errors->first('full_name')}}
                            </label>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="">Email Address</label>
                        <input type="text" name="email">
                        @if($errors->has('email'))
                            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                <i class="fa fa-info"></i>{{$errors->first('email')}}
                            </label>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="">Phone</label>
                        <input type="text" name="phone">
                        @if($errors->has('phone'))
                            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                <i class="fa fa-info"></i>{{$errors->first('phone')}}
                            </label>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="">Your Requirement</label>
                        <textarea name="massage" id="" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" value="" class="button">SUBMIT</button>
                </div>
            </form>

        </div>
    </section>
@endsection
