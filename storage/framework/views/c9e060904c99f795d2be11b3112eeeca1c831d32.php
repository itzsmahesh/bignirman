<?php $__env->startSection('content'); ?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-users"></i>  <?php echo e($page_head); ?></h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <a class="btn btn-primary icon-btn" href="<?php echo e(route('seller')); ?>"><i class="fa fa-eye"></i> Seller List</a>
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
                    <form action=" <?php echo e(route(!empty($seller)?'sellerUpdate':'sellerSave')); ?>" method="post" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                      <?php if(!empty($seller)): ?>
                        <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                      <?php endif; ?>
                        <div class="row col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Name<span class="text-danger"> <b> * </b></span></label>
                                    <input class="form-control" type="text" value="<?php echo e(!empty($seller) ? $seller->name : old('name')); ?>" name="name" required placeholder="Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Email<span class="text-danger"> <b> * </b></span></label>
                                    <input class="form-control" type="email" name="email" value="<?php echo e(!empty($seller) ? $seller->email : old('email')); ?>" required placeholder="Email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Password<span class="text-danger"> <b> * </b></span></label>
                                    <input class="form-control" type="password" name="password" required placeholder="Password">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Company Name<span class="text-danger"> <b> * </b></span></label>
                                    <input class="form-control" type="text" name="company" value="<?php echo e(!empty($seller) ? $seller->company : old('company')); ?>" required placeholder="Company Name">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Image <span class="text-danger">(Image Dimensions - 120 * 120 Pixel)</span>   </label>
                                    <input class="form-control" type="file" name="image" accept="image/x-png,image/gif,image/jpeg" autofocus <?php echo e(!empty($seller) ? '' : 'required'); ?>>
                                </div>
                            </div>




                            <div class="col-sm-12">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><?php echo e(!empty($seller) ? 'Update' : 'Save'); ?></button>&nbsp;
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- Essential javascripts for application to work-->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('masters.layout.default_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bignirman\resources\views/masters/seller/new.blade.php ENDPATH**/ ?>