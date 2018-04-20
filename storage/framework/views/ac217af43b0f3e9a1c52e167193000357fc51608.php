<!-- Add new layout of forgot password page as per admin theme -->

<?php $__env->startSection('content'); ?>

<div id="page-container" class="main-content-boxed">
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-gd-lake">
            <div class="hero-static content content-full bg-white invisible" data-toggle="appear">
                <!-- Header -->
                <div class="py-30 px-5 text-center">
                    <a class="link-effect font-w700" href="<?php echo e(url('/admin')); ?>">
                        <i class="si si-fire"></i>
                        <span class="font-size-xl text-primary-dark"><?php echo e(config('app.name', 'Umbilical')); ?></span>
                    </a>
                    <h1 class="h2 font-w700 mt-50 mb-10">Don’t worry, we’ve got your back</h1>
                    <h2 class="h4 font-w400 text-muted mb-0">Please enter your username or email</h2>
                </div>
                <!-- END Header -->

                <!-- Reminder Form -->
                <div class="row justify-content-center px-5">
                    <div class="col-sm-8 col-md-6 col-xl-4">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success mb-0">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                        <form class="js-validation-reminder" role="form" method="POST" action="<?php echo e(url('/admin/password/email')); ?>">
                        <?php echo e(csrf_field()); ?>

                            <div class="form-group row <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>">
                                <div class="col-12">
                                    <div class="form-material floating">
                                        <input type="text" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>">
                                        <label for="reminder-credential">Email Address</label>
                                    </div>
                                    <?php if($errors->has('email')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('email')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-primary">
                                    <i class="fa fa-asterisk mr-10"></i> Send Password Reset Link
                                </button>
                                <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary" href="<?php echo e(url('/admin/login')); ?>">
                                    <i class="si si-login text-muted mr-10"></i> Sign In
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Reminder Form -->
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.auth.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>