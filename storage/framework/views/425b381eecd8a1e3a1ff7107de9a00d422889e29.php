<!-- Add new layout of reset password page as per admin theme -->

<?php $__env->startSection('content'); ?>

<div id="page-container" class="main-content-boxed">
  <!-- Main Container -->
  <main id="main-container">
      <!-- Page Content -->
      <div class="bg-image" style="background-image: url(<?php echo e(asset("images/photos/photo2@2x.jpg")); ?>);">
          <div class="hero-static content content-full bg-white-op-90 invisible" data-toggle="appear" data-class="animated fadeIn">
              <!-- Avatar -->
              <div class="py-0 px-5 text-center">
                  <a class="link-effect text-pulse font-w700" href="<?php echo e(url('/admin')); ?>">
                      <i class="si si-fire"></i>
                      <span class="font-size-xl text-pulse-dark"><?php echo e(config('app.name', 'Umbilical')); ?></span>
                  </a>
                  <h1 class="h2 font-w700 mt-20 mb-10">Forgot password?</h1>
                  <h2 class="h4 font-w400 text-muted mb-30">Reset your new password with your email address.</h2>
                  <img class="img-avatar img-avatar96" src="<?php echo e(asset("images/avatars/avatar15.jpg")); ?>" alt="">
              </div>
              <!-- END Avatar -->

              <!-- Unlock Content -->
              <div class="row justify-content-center px-5">
                  <div class="col-sm-8 col-md-6 col-xl-4">
                      <?php if(session('status')): ?>
                        <div class="alert alert-success mb-0">
                            <?php echo e(session('status')); ?>

                        </div>
                      <?php endif; ?>
                      <form class="js-validation-lock" role="form" method="POST" action="<?php echo e(url('/admin/password/reset')); ?>">
                      <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="token" value="<?php echo e($token); ?>">
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
                          <div class="form-group row <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>">
                              <div class="col-12">
                                  <div class="form-material floating">
                                      <input type="password" class="form-control" id="password" name="password">
                                      <label for="lock-password">Password</label>
                                  </div>
                                  <?php if($errors->has('password')): ?>
                                      <div class="invalid-feedback"><?php echo e($errors->first('password')); ?></div>
                                  <?php endif; ?>
                              </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-12">
                                  <div class="form-material floating">
                                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                      <label for="lock-password">Retype Password</label>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <!-- <button type="submit" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-danger">
                                  <i class="si si-lock-open mr-10"></i> Unlock
                              </button> -->
                              <button type="submit" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-primary">
                                        <i class="si si-lock-open mr-10"></i> Submit
                                    </button>
                              <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary" href="<?php echo e(url('/admin/login')); ?>">
                                  <i class="si si-login text-muted mr-10"></i> Log In
                              </a>
                          </div>
                      </form>
                  </div>
              </div>
              <!-- END Unlock Content -->
          </div>
      </div>
      <!-- END Page Content -->
  </main>
  <!-- END Main Container -->
</div>      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.auth.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>