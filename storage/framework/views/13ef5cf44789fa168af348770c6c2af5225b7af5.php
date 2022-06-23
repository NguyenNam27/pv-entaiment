<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Thêm thông tin danh mục <a href="<?php echo e(route('admin.subcategory.index')); ?>" class="btn bg-purple "><i
                        class="fa fa-plus"></i> Danh sách danh mục</a>

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> danh sách</a></li>
                <li><a href="#">thông tin danh mục</a></li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nhập thông tin danh mục</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <form role="form" action="<?php echo e(route('admin.subcategory.store')); ?>" method="post"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tên danh mục </label>
                                        <input type="text" class="form-control" name="name" id="name"
                                               placeholder="nhập tiêu đề">
                                        <?php if($errors->has('name')): ?>
                                            <label class="Text-red"
                                                   style="font-size:15px;font-weight:600;margin-top:5px;color:red">
                                                <i class="fa fa-info"></i><?php echo e($errors->first('name')); ?>

                                            </label>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> Trạng thái </label>
                                        <select class="form-control" name="is_active">
                                            <option value="">--Chọn--</option>
                                            <option value="1">Hiển thị</option>
                                            <option value="0">No</option>
                                        </select>
                                        <?php if($errors->has('is_active')): ?>
                                            <label class="Text-red"
                                                   style=" font-size:15px;font-weight:600;margin-top:5px;color:red">
                                                <i class="fa fa-info"></i><?php echo e($errors->first('is_active')); ?>

                                            </label>
                                        <?php endif; ?>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="remember"> Check me out
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Tạo</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </section>


    </div>
<?php $__env->stopSection(); ?>

































<?php echo $__env->make('BE.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>