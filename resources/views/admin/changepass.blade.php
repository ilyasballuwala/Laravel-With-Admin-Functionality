<!-- Admin Edit Profile Page -->
@extends('layouts.adminapp')

@section('content')
<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <!-- User Info -->
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset("images/photos/photo13@2x.jpg") }});">
        <div class="bg-primary-dark-op py-30">
            <div class="content content-full text-center">
                <!-- Avatar -->
                <div class="mb-15">
                    <a class="img-link" href="javascript:void(0)">
                        <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset("images/avatars/avatar15.jpg") }}" alt="">
                    </a>
                </div>
                <!-- END Avatar -->

                <!-- Personal -->
                <h1 class="h3 text-white font-w700 mb-10">{{ ucfirst(Auth::guard('admin')->user()->name) }}</h1>
                <h2 class="h5 text-white-op">
                    <a class="text-primary-light" href="javascript:void(0)">Super Admin</a>
                </h2>
                <!-- END Personal -->

                <!-- Actions -->
                <button type="button" class="btn btn-rounded btn-hero btn-sm btn-alt-success mb-5" data-toggle="layout" data-action="side_overlay_toggle">
                    <i class="fa fa-user-circle mr-5"></i> View Profile
                </button>
                <a class="btn btn-rounded btn-hero btn-sm btn-alt-primary mb-5" href="{{ url('/admin/editprofile') }}">
                    <i class="si si-wrench mr-5"></i>Edit Profile
                </a>
                <!-- END Actions -->
            </div>
        </div>
    </div>
    <!-- END User Info -->

    <!-- Main Content -->
    <div class="content">
        <!-- Projects -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Change Password</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option">
                        <i class="si si-wrench"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <div class="alert alert-{{ $msg }} alert-dismissable mb-0" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <p class="mb-0"><a class="alert-link" href="javascript:void(0)">{{ ucfirst(($msg == 'danger') ? "Error" : $msg) }}!</a> {{ Session::get('alert-' . $msg) }}</p>
                        </div>
                    @endif
                @endforeach    
                <div class="row justify-content-center py-20">
                    <div class="col-xl-6">
                        <!-- jQuery Validation (.js-validation-bootstrap class is initialized in js/pages/be_forms_validation.js) -->
                        <form class="js-validation-bootstrap" action="{{ url('/admin/changepass') }}" method="post" novalidate="novalidate">
                            {{ csrf_field() }}
                            <div class="form-group row {{ $errors->has('currentpass') ? 'is-invalid' : '' }}">
                                <label class="col-lg-4 col-form-label" for="name">Current Password <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" id="currentpass" name="currentpass" placeholder="Enter your current passowrd" type="password">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @if($errors->has('currentpass'))
                                        <div class="invalid-feedback">{{ $errors->first('currentpass') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('newpass') ? 'is-invalid' : '' }}">
                                <label class="col-lg-4 col-form-label" for="newpass">New Password <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" id="newpass" name="newpass" placeholder="Enter your new password" type="password">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-asterisk"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @if($errors->has('newpass'))
                                        <div class="invalid-feedback">{{ $errors->first('newpass') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('newpass_confirmation') ? 'is-invalid' : '' }}">
                                <label class="col-lg-4 col-form-label" for="newpass_confirmation">Confirm Password <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" id="newpass_confirmation" name="newpass_confirmation" placeholder="Reenter your new password" type="password">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-asterisk"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @if($errors->has('newpass_confirmation'))
                                        <div class="invalid-feedback">{{ $errors->first('newpass_confirmation') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-alt-primary">Submit</button>
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
@endsection