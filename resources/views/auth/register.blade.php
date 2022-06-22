@extends('FE.master.layout_sigup')

@section('sigup')

<section class="sign-in">
    <form action="{{ route('signup.post') }}" method="post" aria-label="{{ __('Register') }} ">
        @csrf
        <h4>SIGN UP</h4>
        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif
        <label for="">NAME</label>
        <input type="text" name="name" placeholder="EMAIL">
        @if($errors->has('name'))
            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                <i class="fa fa-info"></i>{{$errors->first('name')}}
            </label>
        @endif
        <label for="">EMAIL</label>
        <input type="text" name="email" placeholder="EMAIL">
        @if($errors->has('email'))
            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                <i class="fa fa-info"></i>{{$errors->first('email')}}
            </label>
        @endif
        <label for="">PASSWORD</label>
        <input type="password" name="password" placeholder="PASSWORD">
        @if($errors->has('password'))
            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                <i class="fa fa-info"></i>{{$errors->first('password')}}
            </label>
        @endif

        <div class="form-group">
            <label for="exampleInputPassword1">Hình ảnh</label>
            <input type="file" name="image" >
            @if($errors->has('image'))
                <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                    <i class="fa fa-info"></i>{{$errors->first('image')}}
                </label>
            @endif
        </div>
        <button type="submit" >SIGN UP</button>

    </form>
</section>
@endsection
