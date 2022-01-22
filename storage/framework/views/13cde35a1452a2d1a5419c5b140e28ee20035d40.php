
<?php $__env->startSection('content'); ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-pencil"></i> &nbsp;Change Password List</h1>
        </div>
        <!-- <ul class="app-breadcrumb breadcrumb">
                <a class="btn btn-primary icon-btn" href=""><i class="fa fa-eye"></i> Category List</a>
            </ul> -->
    </div>
    <div class="row bg-white py-3">
        <div class="col-md-12">
            <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
            <div class="flash-message">
                <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(Session::has('alert-' . $msg)): ?>

                <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?>

                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                </p>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="card-box">
                <div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="example" class="table  table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php $__currentLoopData = $usersDatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i); ?>.</td>
                                    <td><?php echo e($data->name); ?></td>
                                    <td><?php echo e($data->email); ?></td>
                                    <td><?php echo e($data->password); ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo e(route('adminPasswordUpdate',$data->id)); ?>"><span class="basic_table_icon" style="font-size: 20px;color: green;"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
                                    </td>





                                </tr>
                                <?php $i++ ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Essential javascripts for application to work-->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('masters.layout.default_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bignirman\resources\views/masters/setting/userPassword.blade.php ENDPATH**/ ?>