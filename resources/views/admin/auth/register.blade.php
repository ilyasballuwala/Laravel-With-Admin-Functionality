<!-- Edited Amit on 21/07/2017 -->
<!-- Add new layout of login page as per admin theme -->
@extends('admin.auth.master')
@section('content')

<div class="logincard">
    <div class="pmd-card card-default pmd-z-depth">

    <div class="register-card">
      <div class="pmd-card-title card-header-border text-center">
        <div class="loginlogo">
          <a href="javascript:void(0);"><img src="{{ asset('images/starrinsurance-logo.png') }}" alt="Logo"></a>
        </div>
        <h3>Sign Up <span>with <strong>Starr Insurance</strong></span></h3>
      </div>
      <form role="form" method="POST" action="{{ url('/admin/register') }}">
        {{ csrf_field() }}  
        <div class="pmd-card-body">
          <div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name" class="control-label pmd-input-group-label">Name</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" autofocus>
            </div>
            @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group pmd-textfield pmd-textfield-floating-label  {{ $errors->has('username') ? 'has-error' : '' }}">
            <label for="username" class="control-label pmd-input-group-label">Username</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}">
            </div>
            @if ($errors->has('username'))
              <span class="help-block">
                  <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif  
          </div>
          
          <div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('email') ? 'has-error' : '' }}">
              <label for="email" class="control-label pmd-input-group-label">Email address</label>
              <div class="input-group">
                  <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">email</i></div>
                  <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
              </div>
              @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>
          
          <div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('password') ? 'has-error' : '' }}">
              <label for="password" class="control-label pmd-input-group-label">Password</label>
              <div class="input-group">
                  <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">lock_outline</i></div>
                  <input type="password" name="password" id="password" class="form-control">
              </div>
              @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
              <label for="password" class="control-label pmd-input-group-label">Retype Password</label>
              <div class="input-group">
                  <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">lock_outline</i></div>
                  <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
              </div>
          </div>

        </div>
        
        <div class="pmd-card-footer card-footer-no-border card-footer-p16 text-center">
        <button type="submit" class="btn pmd-ripple-effect btn-primary btn-block">Register</button>
          <p class="redirection-link">Already have an account? <a href="{{ url('/admin/login') }}" class="register-login">Sign In</a>. </p>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.register-box -->
@endsection