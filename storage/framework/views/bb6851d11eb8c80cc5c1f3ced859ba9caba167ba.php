<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->

    <title>Admin Login</title>
   <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('public/masters/css/main.css')); ?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <section class="login-content">
        <div class="logo text-center">
            <h1 class="text-dark"> Master Admin Login </h1>
            <!--<img src="<?php echo e(URL::asset('public/img/logo.png')); ?>" alt="" width="100%">-->
        </div>
        <div class="login-box">
            <form class="login-form" action="<?php echo e(route('login')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
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
                <div class="form-group">
                    <label class="control-label">USERNAME</label>
                    <input class="form-control" type="email" placeholder="Email" autofocus name="email">
                </div>
                <div class="form-group">
                    <label class="control-label">PASSWORD</label>
                    <input class="form-control" type="password" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <div class="utility">
                        <div class="animated-checkbox">
                            <!-- <label>
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>-->
                        </div>
                       <!-- <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>-->
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
                </div>
            </form>
            <form class="forget-form" action="<?php echo e(url('checklogin')); ?>">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
                <div class="form-group">
                    <label class="control-label">EMAIL</label>
                    <input class="form-control" type="text" placeholder="Email">
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
                </div>
                <div class="form-group mt-3">
                    <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
                </div>
            </form>
        </div>
    </section>
    <!-- Essential javascripts for application to work-->
     <script src="<?php echo e(URL::asset('public/masters/js/jquery-3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/masters/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/masters/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('public/masters/js/main.js')); ?>"></script> 
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo e(URL::asset('public/masters/js/plugins/pace.min.js')); ?>"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript">
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });

    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\bignirman\resources\views/masters/login/login.blade.php ENDPATH**/ ?>