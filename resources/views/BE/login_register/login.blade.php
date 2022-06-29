@extends('BE.login_register.layout')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Chào mừng bạn đến với PV ENTERTAINMENT</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <h3><p class="login-box-msg"><b>LOGIN</b></p></h3>
            @if(session()->has('success'))
                <div class="alert alert-success">{{session()->get('success')}}</div>
            @endif

            <form action="{{route('admin.checkout')}}" method="post" >
                @csrf
                @if(session()->has('error'))
                    <div class="alert alert-error">{{session()->get('error')}}</div>
                @endif
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name = "email" placeholder="Nhập email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if($errors->has('email'))
                        <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                            <i class="fa fa-info"></i>{{$errors->first('email')}}
                        </label>
                    @endif
                </div>


                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name = "password" placeholder="Nhập password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if($errors->has('password'))
                        <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                            <i class="fa fa-info"></i>{{$errors->first('password')}}
                        </label>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="checkbox" class="form-control" value="remember_token" name="remember_token" >
                    <label for="">Nhớ mật khẩu</label>
                </div>
                <div class="row" >
                    <div class="col-xs-4" style="align-items: center">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" >Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <a href="#">Quên mật khẩu</a><br>
            <a href="{{route('register')}}" class="text-center">Đăng ký thành viên</a>

        </div>
        <!-- /.login-box-body -->
    </div>
@endsection
