<!-- Add new layout of forgot password page as per admin theme -->
@extends('admin.auth.master')
@section('content')

<div id="page-container" class="main-content-boxed">
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-gd-lake">
            <div class="hero-static content content-full bg-white invisible" data-toggle="appear">
                <!-- Header -->
                <div class="py-30 px-5 text-center">
                    <a class="link-effect font-w700" href="{{ url('/admin') }}">
                        <i class="si si-fire"></i>
                        <span class="font-size-xl text-primary-dark">{{ config('app.name', 'Umbilical') }}</span>
                    </a>
                    <h1 class="h2 font-w700 mt-50 mb-10">Don’t worry, we’ve got your back</h1>
                    <h2 class="h4 font-w400 text-muted mb-0">Please enter your username or email</h2>
                </div>
                <!-- END Header -->

                <!-- Reminder Form -->
                <div class="row justify-content-center px-5">
                    <div class="col-sm-8 col-md-6 col-xl-4">
                        @if (session('status'))
                            <div class="alert alert-success mb-0">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="js-validation-reminder" role="form" method="POST" action="{{ url('/admin/password/email') }}">
                        {{ csrf_field() }}
                            <div class="form-group row {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                <div class="col-12">
                                    <div class="form-material floating">
                                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                        <label for="reminder-credential">Email Address</label>
                                    </div>
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-primary">
                                    <i class="fa fa-asterisk mr-10"></i> Send Password Reset Link
                                </button>
                                <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary" href="{{ url('/admin/login') }}">
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
@endsection