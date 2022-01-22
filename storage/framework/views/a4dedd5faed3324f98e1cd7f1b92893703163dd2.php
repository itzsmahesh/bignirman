<?php $__env->startSection('content'); ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-flag"></i> Seller  List</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="<?php echo e(route('newSeller')); ?>"><i class="fa fa-plus"></i> New Seller </a>
        </ul>
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

                                    <th>  Details </th>
                                    <th> Image </th>

                                    <th colspan="1">
                                        <center>Action</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php $__currentLoopData = $seller; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i); ?>.</td>

                                    <td>
                                        <table>
                                            <tr>
                                                <th>Name </th>
                                                <td>:</td>
                                                <td><?php echo e($data->name); ?></td>
                                            </tr>
                                             <tr>
                                                <th>Email </th>
                                                <td>:</td>
                                                <td><?php echo e($data->email); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Company </th>
                                                <td>:</td>
                                                <td><?php echo e($data->company); ?></td>
                                            </tr>

                                        </table>
                                    </td>
                                     <td><img src="<?php echo e(URL::asset('public/upload/home/seller/'.$data->image)); ?>" width="150px"></td>




                                    <td class="text-center">
                                        <a href="<?php echo e(route('sellerEdit',$data->id)); ?>"><span class="basic_table_icon" style="font-size: 20px;color: green;"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
                                        <a href="<?php echo e(route('testimonialsDelete',$data->id)); ?>" onClick="return confirm('Are you sure?');"><span class="basic_table_icon" style="font-size: 20px;color: red;margin-left: 20px;"><i class="fa fa-trash-o" aria-hidden="true"></i></span></a>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('masters.layout.default_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bignirman\resources\views/masters/seller/list.blade.php ENDPATH**/ ?>