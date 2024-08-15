@extends('layouts.app')

@section('content')
<div class="row g-0 app-auth-wrapper">
    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
        <div class="d-flex flex-column align-content-end">
            <div class="app-auth-body mx-auto">	
                <div class="app-auth-branding mb-4">
                    <a class="app-logo" href="{{ url('/') }}">
                        <img class="logo-icon me-2" src="{{ asset('assets/images/app-logo.svg') }}" alt="logo">
                    </a>
                </div>
                <h2 class="auth-heading text-center mb-5">Log in to Portal</h2>
                <div class="auth-form-container text-start">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="sr-only" for="email">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control signin-email @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="sr-only" for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control signin-password @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="extra mt-3 row justify-content-between">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="RememberPassword" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="RememberPassword">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="forgot-password text-end">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">{{ __('Login') }}</button>
                        </div>
                    </form>

                    <div class="auth-option text-center pt-5">
                        {{ __('No Account?') }} <a class="text-link" href="{{ route('register') }}">{{ __('Sign up here') }}</a>.
                    </div>
                </div><!--//auth-form-container-->	
            </div><!--//app-auth-body-->

            <footer class="app-auth-footer">
                <div class="container text-center py-3">
                    <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
                </div>
            </footer><!--//app-auth-footer-->
        </div><!--//flex-column-->   
    </div><!--//auth-main-col-->
    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
        <div class="auth-background-holder">
        </div>
        <div class="auth-background-mask"></div>
        <div class="auth-background-overlay p-3 p-lg-5">
            <div class="d-flex flex-column align-content-end h-100">
                <div class="h-100"></div>
                <div class="overlay-content p-3 p-lg-4 rounded">
                    <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
                    <div>Portal is a free Bootstrap 5 admin dashboard template. You can download and view the template license <a href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.</div>
                </div>
            </div>
        </div><!--//auth-background-overlay-->
    </div><!--//auth-background-col-->
</div><!--//row-->
@endsection
