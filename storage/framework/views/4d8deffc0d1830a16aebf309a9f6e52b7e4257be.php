<?php $__env->startSection('content'); ?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-image"></i>  Add Slider</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <a class="btn btn-primary icon-btn" href="<?php echo e(route('slider_mange')); ?>"><i class="fa fa-eye"></i> Slider List</a>
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
                    <form action="<?php echo e(route('slider_save')); ?>" method="post" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                        <div class="row col-sm-12">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Slider Image <span class="text-danger">(Image Dimensions - 1920*550 Pixel *)</span></label>
                                    <input class="form-control" type="file" name="image" accept="image/x-png,image/gif,image/jpeg" autofocus required>
                                </div>
                            </div>

                            

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Active<span class="text-danger"> <b> * </b> </span></label>
                                    <select type="text" class="form-control" required name="is_active">
                                        <option value="">-- Please Select --</option>
                                        <option value="ACTIVE">Active</option>
                                        <option value="INACTIVE">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            

                            <div class="col-sm-12">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- Essential javascripts for application to work-->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('masters.layout.default_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bignirman\resources\views/masters/slider/add_slider.blade.php ENDPATH**/ ?>