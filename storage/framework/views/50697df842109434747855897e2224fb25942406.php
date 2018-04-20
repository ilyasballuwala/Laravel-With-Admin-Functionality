<!-- Edit Relationship Manager for Admin -->

<?php $__env->startSection('content'); ?>

<!-- Main Container -->
<main id="main-container">

    <!-- Main Content -->
    <div class="content">
    	<!-- Relationship Manager Management -->
    	<h2 class="content-heading"><?php echo e($title); ?> Management</h2>
        <!-- Projects -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit <?php echo e($title); ?></h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option">
                        <i class="si si-wrench"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
                <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Session::has('alert-' . $msg)): ?>
                        <div class="alert alert-<?php echo e($msg); ?> alert-dismissable mb-0" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <p class="mb-0"><a class="alert-link" href="javascript:void(0)"><?php echo e(ucfirst(($msg == 'danger') ? "Error" : $msg)); ?>!</a> <?php echo e(Session::get('alert-' . $msg)); ?></p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                <div class="row justify-content-center py-20">
                    <div class="col-xl-10">
                        <form id="js-validation-bootstrap" action="<?php echo e(url('/admin/relationshipmanager/')); ?>/<?php echo e($managerdata->id); ?>" method="post" novalidate="novalidate">
							<?php echo e(csrf_field()); ?>

							<?php echo e(method_field('PUT')); ?>

							<input type="hidden" name="manager_id" value="<?php echo e($managerdata->id); ?>" />
                            <div class="form-group row <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>">
                                <label class="col-lg-4 col-form-label" for="name">Name <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" id="name" name="name" placeholder="Enter name" value="<?php echo e($managerdata->name); ?>" type="text">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <?php if($errors->has('name')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('name')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>">
                                <label class="col-lg-4 col-form-label" for="email">Email <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo e($managerdata->email); ?>" type="text">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <?php if($errors->has('email')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('email')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row <?php echo e($errors->has('phone') ? 'is-invalid' : ''); ?>">
                                <label class="col-lg-4 col-form-label" for="phone">Phone <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" id="phone" name="phone" placeholder="Enter phone no" value="<?php echo e($managerdata->phone); ?>" type="text" required onkeypress='return (event.charCode >= 46 && event.charCode <= 57) || event.keyCode == 8 || event.keyCode == 9' maxlength="12" minlength="10">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <?php if($errors->has('phone')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('phone')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
							<div class="form-group row <?php echo e($errors->has('rm_code') ? 'is-invalid' : ''); ?>">
                                <label class="col-lg-4 col-form-label" for="rm_code">RM Code <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" id="rm_code" name="rm_code" placeholder="Enter unique RM Code" value="<?php echo e($managerdata->rm_code); ?>" type="text">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-code"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <?php if($errors->has('rm_code')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('rm_code')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row <?php echo e($errors->has('username') ? 'is-invalid' : ''); ?>">
                                <label class="col-lg-4 col-form-label" for="username">Username <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" id="username" name="username" placeholder="Enter username" value="<?php echo e($managerdata->username); ?>" type="text">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user-circle"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <?php if($errors->has('username')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('username')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>">
                                <label class="col-lg-4 col-form-label" for="password">Password</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" id="password" name="password" placeholder="Enter password" type="password">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-asterisk"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <?php if($errors->has('password')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('password')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row <?php echo e($errors->has('password_confirmation') ? 'is-invalid' : ''); ?>">
                                <label class="col-lg-4 col-form-label" for="password_confirmation">Confirm Password</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re enter password" type="password">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-asterisk"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <?php if($errors->has('password_confirmation')): ?>
                                        <div class="invalid-feedback"><?php echo e($errors->first('password_confirmation')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="status">Status <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <label class="css-control css-control-sm css-control-success css-switch">
                                        <input name="status" type="checkbox" class="css-control-input" <?php if($managerdata->status == 'Active'): ?> checked <?php endif; ?>>
                                        Inactive  <span class="css-control-indicator"></span>  Active
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-alt-primary">Submit</button>
                                    <a class="btn btn-alt-secondary" href="<?php echo e(url('/admin/relationshipmanager')); ?>">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- END Projects -->
    </div>
    <!-- END Main Content -->
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>