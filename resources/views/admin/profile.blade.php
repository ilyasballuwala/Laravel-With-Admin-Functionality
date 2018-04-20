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
                <a class="btn btn-rounded btn-hero btn-sm btn-alt-primary mb-5" href="{{ url('/admin/changepass') }}">
                    <i class="si si-wrench mr-5"></i> Change Password
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
                <h3 class="block-title">Edit Profile</h3>
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
                        <form class="js-validation-bootstrap" action="{{ url('/admin/updateprofile') }}" method="post" novalidate="novalidate">
                            {{ csrf_field() }}
                            <div class="form-group row {{ $errors->has('name') ? 'is-invalid' : '' }}">
                                <label class="col-lg-4 col-form-label" for="name">Name <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" id="name" name="name" placeholder="Enter your name" value="{{ Auth::guard('admin')->user()->name }}" type="text">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('username') ? 'is-invalid' : '' }}">
                                <label class="col-lg-4 col-form-label" for="username">Username <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" id="username" name="username" placeholder="Enter your username" value="{{ Auth::guard('admin')->user()->username }}" type="text">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user-circle"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @if($errors->has('username'))
                                        <div class="invalid-feedback">{{ $errors->first('username') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                <label class="col-lg-4 col-form-label" for="email">Email <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" id="email" name="email" placeholder="Enter your email" value="{{ Auth::guard('admin')->user()->email }}" type="text">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
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