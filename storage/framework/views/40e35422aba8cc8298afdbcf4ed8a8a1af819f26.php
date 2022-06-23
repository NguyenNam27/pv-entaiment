<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                DANH SÁCH NGƯỜI ĐẶT LỊCH

            </h1>

        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh Sách </h3>


                        </div>
                        <?php if(session()->has('success')): ?>
                            <div class="alert alert-success"><?php echo e(session()->get('success')); ?></div>
                        <?php endif; ?>
                        <div class="box-body">
                            <table class="table table-border">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">STT</th>
                                    <th>Booking Type</th>
                                    <th>Tên tổ chức</th>
                                    <th>Ngân sách</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Lời nhắn</th>
                                    <th>Trạng thái</th>
                                    <th>Chức năng</th>
                                </tr>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$con): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="item-<?php echo e($con->id); ?>">
                                        <td><?php echo e($key+1); ?></td>
                                        <td><?php echo e(($con->booking_type==1)?'Brand':'Brand'); ?></td>
                                        <td><?php echo e($con->name_company); ?></td>
                                        <td><?php echo e(number_format($con->budget)); ?> vnđ</td>
                                        <td><?php echo e($con->full_name); ?></td>
                                        <td><?php echo e($con->email); ?></td>
                                        <td><?php echo e($con->phone); ?></td>
                                        <td><?php echo e($con->massage); ?></td>

                                        <td>trạng thái</td>


                                        <td>
                                            <a href="<?php echo e(route('admin.post.edit',['id'=>$con->id])); ?>"
                                               class="btn btn-warning btn-edit"><i class="fa fa-pencil"></i></a>
                                            <button data-id="<?php echo e($con->id); ?>" class="btn btn-danger btn-delete"><i
                                                    class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer clearfix">
                            <?php echo e($data->links()); ?>

                        </div>
                    </div>
                </div>

            </div>

        </section>
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('my_js'); ?>

            <script type="text/javascript">
                $(document).ready(function () {
                    // Thiết lập csrf => chổng giả mạo
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })

                    $('.btn-delete').on('click', function () {

                        let id = $(this).data('id');

                        // let result = confirm("Bạn có chắc chắn muốn xóa ?");

                        Swal.fire({
                            title: 'Bạn có chắc không?',
                            text: "Bạn có chắc chắn muốn xóa ?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes'
                        }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: 'admin/post/' + id,
                                        type: 'DELETE',
                                        data: {
                                            name: ''
                                        },
                                        dataType: "json",
                                        success: function (res) {
                                            if (res.success != 'undefined' && res.success == 1) {
                                                $('.item-' + id).remove();
                                                Swal.fire(
                                                    'Deleted!',
                                                    'Xoá thành công',
                                                    'success'
                                                )
                                            }
                                            window.location.reload();
                                        },
                                        error: function (e) {
                                            console.log(e);
                                        }
                                    })
                                }
                            }
                        );

                    });
                });
            </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('BE.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>