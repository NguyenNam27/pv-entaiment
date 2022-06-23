<?php $__env->startSection('content'); ?>
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Chào mừng bạn đến với PV ENTERTAINMENT</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <h3><p class="login-box-msg"><b>LOGIN</b></p></h3>
      <?php if(session()->has('success')): ?>
          <div class="alert alert-success"><?php echo e(session()->get('success')); ?></div>
      <?php endif; ?>

    <form action="<?php echo e(route('admin.checkout')); ?>" method="post" >
    <?php echo csrf_field(); ?>
        <?php if(session()->has('error')): ?>
            <div class="alert alert-error"><?php echo e(session()->get('error')); ?></div>
        <?php endif; ?>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name = "email" placeholder="Nhập email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          <?php if($errors->has('email')): ?>
          <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
              <i class="fa fa-info"></i><?php echo e($errors->first('email')); ?>

          </label>
          <?php endif; ?>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" name = "password" placeholder="Nhập password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <?php if($errors->has('password')): ?>
              <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                  <i class="fa fa-info"></i><?php echo e($errors->first('password')); ?>

              </label>
          <?php endif; ?>
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
    <a href="<?php echo e(route('admin.register')); ?>" class="text-center">Đăng ký thành viên</a>

  </div>
  <!-- /.login-box-body -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('BE.login_register.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>