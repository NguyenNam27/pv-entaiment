@extends('FE.master.layout_login')

@section('login')
<section class="sign-in">
    <form action="{{ route('login') }}" method="post" aria-label="{{ __('Login') }}" >
        @csrf
        <h4>SIGN IN</h4>
        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif
        <label for="">EMAIL</label>
        <input type="email" name="email" placeholder="EMAIL">
        @if($errors->has('email'))
            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                <i class="fa fa-info"></i>{{$errors->first('email')}}
            </label>
        @endif
        <label for="">PASSWORD</label>
        <input type="password" name="password" placeholder="PASSWORD">
        @if($errors->has('email'))
            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                <i class="fa fa-info"></i>{{$errors->first('email')}}
            </label>
        @endif

        <button type="submit" id="sign-in">SIGN IN</button>
        <a class="signup" href="#">DONT HAVE ACCOUNT ? SIGN UP HERE</a>
        <a href="#" class="facebook">
            <i class="fa-brands fa-facebook-f" style="margin-left: 10px"></i>
            facebook
        </a>
    </form>
</section>
@endsection
