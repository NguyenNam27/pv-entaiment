<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Thêm banner <a href="<?php echo e(route('admin.banner.index')); ?>" class="btn bg-purple "><i class="fa fa-plus"></i> Danh sách banner</a>

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"> Banner </a></li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chỉnh sửa banner</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <form action="<?php echo e(route('admin.banner.update',['edit'=>$edit->id])); ?>" method ="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="box-body">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập tên mới</label>
                                        <input value="<?php echo e($edit->name); ?>" type="text" class="form-control" name="name" placeholder="Enter name">
                                        <?php if($errors->has('name')): ?>
                                            <label class="Text-red  " style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                                <i class="fa fa-info"></i><?php echo e($errors->first('name')); ?>

                                            </label>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Hình ảnh mới</label>
                                        <input type="file" id="image" name="image" >
                                        <img src="<?php echo e(asset($edit->image)); ?> " width="100px" height="70px">
                                        <p class="help-block">Example block-level help text here.</p>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1"> Mô tả</label>
                                        <input value="<?php echo e($edit->description); ?>" type="text" class="form-control" name ="description" id="description" placeholder="Enter description">
                                        <?php if($errors->has('description')): ?>
                                            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                                <i class="fa fa-info"></i><?php echo e($errors->first('description')); ?>

                                            </label>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Trạng thái</label>
                                        <select class="form-control" name="is_active">
                                            <option value="<?php echo e($edit->is_active); ?>"><?php echo e(($edit->is_active == 1) ? 'Hiển thị' : 'không hiển thị'); ?></option>
                                            <option value="1">Hiển thị</option>
                                            <option value="0">Không hiển thị</option>
                                        </select>

                                    </div>


                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember_token"> Lưu
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Cập nhập</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('BE.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>