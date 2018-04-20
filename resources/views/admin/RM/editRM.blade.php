<!-- Edit Relationship Manager for Admin -->
@extends('layouts.adminapp')
@section('content')

<!-- Main Container -->
<main id="main-container">

    <!-- Main Content -->
    <div class="content">
    	<!-- Relationship Manager Management -->
    	<h2 class="content-heading">{{ $title }} Management</h2>
        <!-- Projects -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit {{ $title }}</h3>
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
                    <div class="col-xl-10">
                        <form id="js-validation-bootstrap" action="{{ url('/admin/relationshipmanager/') }}/{{ $managerdata->id }}" method="post" novalidate="novalidate">
							{{ csrf_field() }}
							{{ method_field('PUT') }}
							<input type="hidden" name="manager_id" value="{{ $managerdata->id }}" />
                            <div class="form-group row {{ $errors->has('name') ? 'is-invalid' : '' }}">
                                <label class="col-lg-4 col-form-label" for="name">Name <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $managerdata->name }}" type="text">
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
                            <div class="form-group row {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                <label class="col-lg-4 col-form-label" for="email">Email <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" id="email" name="email" placeholder="Enter email" value="{{ $managerdata->email }}" type="text">
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
                            <div class="form-group row {{ $errors->has('phone') ? 'is-invalid' : '' }}">
                                <label class="col-lg-4 col-form-label" for="phone">Phone <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" id="phone" name="phone" placeholder="Enter phone no" value="{{ $managerdata->phone }}" type="text" required onkeypress='return (event.charCode >= 46 && event.charCode <= 57) || event.keyCode == 8 || event.keyCode == 9' maxlength="12" minlength="10">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @if($errors->has('phone'))
                                        <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                            </div>
							<div class="form-group row {{ $errors->has('rm_code') ? 'is-invalid' : '' }}">
                                <label class="col-lg-4 col-form-label" for="rm_code">RM Code <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" id="rm_code" name="rm_code" placeholder="Enter unique RM Code" value="{{ $managerdata->rm_code }}" type="text">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-code"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @if($errors->has('rm_code'))
                                        <div class="invalid-feedback">{{ $errors->first('rm_code') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('username') ? 'is-invalid' : '' }}">
                                <label class="col-lg-4 col-form-label" for="username">Username <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" id="username" name="username" placeholder="Enter username" value="{{ $managerdata->username }}" type="text">
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
                            <div class="form-group row {{ $errors->has('password') ? 'is-invalid' : '' }}">
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
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
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
                                    @if($errors->has('password_confirmation'))
                                        <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="status">Status <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <label class="css-control css-control-sm css-control-success css-switch">
                                        <input name="status" type="checkbox" class="css-control-input" @if($managerdata->status == 'Active') checked @endif>
                                        Inactive  <span class="css-control-indicator"></span>  Active
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-alt-primary">Submit</button>
                                    <a class="btn btn-alt-secondary" href="{{ url('/admin/relationshipmanager') }}">Cancel</a>
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