<!-- Side Overlay-->
<aside id="side-overlay">
    <!-- Side Overlay Scroll Container -->
    <div id="side-overlay-scroll">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow">
            <div class="content-header-section align-parent">
                <!-- Close Side Overlay -->
                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Side Overlay -->

                <!-- User Info -->
                <div class="content-header-item">
                    <a class="img-link mr-5" href="javascript:void(0)">
                        <img class="img-avatar img-avatar32" src="<?php echo e(asset("images/avatars/avatar15.jpg")); ?>" alt="">
                    </a>
                    <a class="align-middle link-effect text-primary-dark font-w600" href="javascript:void(0)"><?php echo e(ucfirst(Auth::guard('admin')->user()->name)); ?> </a>
                </div>
                <!-- END User Info -->
            </div>
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="content-side">

            <!-- Mini Stats -->
            <div class="block pull-r-l">
                <div class="block-content block-content-full block-content-sm bg-body-light">
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Relationship Manager</div>
                            <div class="font-size-h4">5</div>
                        </div>
                        <div class="col-4">
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Product Unit Head</div>
                            <div class="font-size-h4">2</div>
                        </div>
                        <div class="col-4">
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Unit Executives</div>
                            <div class="font-size-h4">15</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Mini Stats -->

            <!-- Profile -->
            <div class="block pull-r-l">
                <div class="block-header bg-body-light">
                    <h3 class="block-title">
                        <i class="fa fa-fw fa-pencil font-size-default mr-5"></i>User Profile
                    </h3>
                    <!-- <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                    </div> -->
                </div>
                <div class="block-content">
                    <div class="form-group mb-15">
                        <label for="side-overlay-profile-name">Name : <?php echo e(ucfirst(Auth::guard('admin')->user()->name)); ?></label>
                    </div>
                    <div class="form-group mb-15">
                        <label for="side-overlay-profile-email">Username : <?php echo e(Auth::guard('admin')->user()->username); ?></label>
                    </div>
                    <div class="form-group mb-15">
                        <label for="side-overlay-profile-email">Email : <?php echo e(Auth::guard('admin')->user()->email); ?></label>
                    </div>
                </div>
            </div>
            <!-- END Profile -->
        </div>
        <!-- END Side Content -->
    </div>
    <!-- END Side Overlay Scroll Container -->
</aside>
<!-- END Side Overlay -->

 <nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="content-header content-header-fullrow px-15">
                <!-- Mini Mode -->
                <div class="content-header-section sidebar-mini-visible-b">
                    <!-- Logo -->
                    <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                        <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                    </span>
                    <!-- END Logo -->
                </div>
                <!-- END Mini Mode -->

                <!-- Normal Mode -->
                <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <!-- END Close Sidebar -->

                    <!-- Logo -->
                    <div class="content-header-item">
                        <a class="link-effect font-w700" href="<?php echo e(url('/admin/dashboard')); ?>">
                            <i class="si si-fire text-primary"></i>
                            <span class="font-size-xl text-dual-primary-dark"><?php echo e(config('app.name', 'Umbilical')); ?></span>
                        </a>
                    </div>
                    <!-- END Logo -->
                </div>
                <!-- END Normal Mode -->
            </div>
            <!-- END Side Header -->

            <!-- Side User -->
            <div class="content-side content-side-full content-side-user px-10 align-parent">
                <!-- Visible only in mini mode -->
                <div class="sidebar-mini-visible-b align-v animated fadeIn">
                    <img class="img-avatar img-avatar32" src="<?php echo e(asset("images/avatars/avatar15.jpg")); ?>" alt="">
                </div>
                <!-- END Visible only in mini mode -->

                <!-- Visible only in normal mode -->
                <div class="sidebar-mini-hidden-b text-center">
                    <a class="img-link" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                        <img class="img-avatar" src="<?php echo e(asset("images/avatars/avatar15.jpg")); ?>" alt="user-image">
                    </a>
                    <ul class="list-inline mt-10">
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle"><?php echo e(ucfirst(Auth::guard('admin')->user()->name)); ?></a>
                        </li>
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark" href="<?php echo e(url('/admin/logout')); ?>" title="Logout">
                                <i class="si si-logout"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Visible only in normal mode -->
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li>
                        <a href="<?php echo e(url('/admin/dashboard')); ?>" <?php if(Request::segment(1) == 'admin' && (Request::segment(2) == 'dashboard' || Request::segment(2) == '')): ?> class="active" <?php endif; ?>><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                    </li>
                    <li <?php if(Request::segment(1) == 'admin' && Request::segment(2) == 'relationshipmanager'): ?> class="open" <?php endif; ?>>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-trophy"></i><span class="sidebar-mini-hide">Relationship Manager</span></a>
                        <ul>
                            <li>
                                <a href="<?php echo e(url('/admin/relationshipmanager')); ?>" <?php if(Request::segment(1) == 'admin' && Request::segment(2) == 'relationshipmanager' && (Request::segment(4) == 'edit' || Request::segment(3) == '')): ?> class="active" <?php endif; ?>>View Listing</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/admin/relationshipmanager/create')); ?>" <?php if(Request::segment(1) == 'admin' && Request::segment(2) == 'relationshipmanager' && (Request::segment(3) == 'create')): ?> class="active" <?php endif; ?>>Add New RM</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-energy"></i><span class="sidebar-mini-hide">Product Unit Head</span></a>
                        <ul>
                            <li>
                                <a href="javascript:void(0)">View Listing</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Add New Unit Head</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-layers"></i><span class="sidebar-mini-hide">Unit Executive</span></a>
                        <ul>
                            <li>
                                <a href="javascript:void(0)">View Listing</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Add New Executive</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>