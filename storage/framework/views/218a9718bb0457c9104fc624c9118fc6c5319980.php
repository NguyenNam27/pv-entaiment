<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ĐĂNG KÝ</title>
    <base href="<?php echo e(asset('')); ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="backend/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="backend/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="backend/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="backend/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="backend/index2.html"><b>ĐĂNG KÝ</b> </a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Đăng ký thành viên</p>
        <?php if(session()->has('success')): ?>
            <div class="alert alert-success"><?php echo e(session()->get('success')); ?></div>
        <?php endif; ?>
        <form action="<?php echo e(route('register.post')); ?>" method="post" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <?php if(Session::has('thanhcong')): ?>
                <div class="alert alert-success"><?php echo e(Session::get('thanhcong')); ?></div>
            <?php endif; ?>
            <div class="form-group has-feedback">
                <input type="text" name="name" class="form-control" placeholder="Nhập tên">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <?php if($errors->has('name')): ?>
                    <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                        <i class="fa fa-info"></i><?php echo e($errors->first('name')); ?>

                    </label>
                <?php endif; ?>
            </div>

            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Nhập email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <?php if($errors->has('email')): ?>
                    <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                        <i class="fa fa-info"></i><?php echo e($errors->first('email')); ?>

                    </label>
                <?php endif; ?>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?php if($errors->has('password')): ?>
                    <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                        <i class="fa fa-info"></i><?php echo e($errors->first('password')); ?>

                    </label>
                <?php endif; ?>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                <?php if($errors->has('password')): ?>
                    <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                        <i class="fa fa-info"></i><?php echo e($errors->first('password')); ?>

                    </label>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Hình ảnh</label>
                        <input type="file" name="image" >
                    <?php if($errors->has('image')): ?>
                            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                <i class="fa fa-info"></i><?php echo e($errors->first('image')); ?>

                            </label>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng ký</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Đăng ký với
                Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Đăng ký với
                Google+</a>
        </div>

        <a href="<?php echo e(route('admin.index')); ?>" class="text-center">Quay lại đăng nhập</a>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="backend/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
