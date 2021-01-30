@extends('frontend.layouts.welcome')

@section('content')
<section class="login-section">
    <div class="container">
        <div class="card card-login">
            <div class="card-body">
                <div class="row form mb-4">
                    <div class="col-md-7">
                        <div class="login-form">
                            <h3 class="heading">{{ __('Member Login') }}</h3>
                            <form id="frm_login" method="POST" action="{{ route('userlogin') }}">
                                @csrf
                                <div class="alert alert-danger d-none" role="alert" id="err_toastr_login"></div>

                                @if(Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                @endif

                                <div class="form-group">
                                    <input id="email"  type="email" class="form-control @error('email') is-invalid @enderror login-page" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <span class="label-title"><i class="fa fa-envelope-o"></i></span>
                                    <span class="invalid-feedback" id="email_login_error"></span>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password"  type="password" class="form-control @error('password') is-invalid @enderror login-page" name="password" placeholder="********" required autocomplete="current-password">
                                    <span class="label-title"><i class="fa fa-lock"></i></span>
                                    <span class="invalid-feedback" id="password_login_error"></span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <input type="button" class="btn send-btn btn-block" value="{{ __('Login') }}" name="btn_login" id="btn_login" />
                                 <!--<input type="submit" class="btn send-btn btn-block" value="{{ __('Login') }}" name="btn_login" id="btn_login" />-->
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="ragister_content">
                            <h3 class="mb-5">Not a Member yet?</h3>
                            <p>
                                Register today to take back control of your time, your money and your food cost.
                            </p>
                            <!--<a href="https://www.restaurantsystemsmastery.com/fch" class="register-btn btn mt-4 mb-4">Register now</a>-->
                            <a href="{{route('register')}}" class="register-btn btn mt-4 mb-4">Register now</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 bd-t">
                        <div class="forgot-section login-form mt-4">
                            <h3 class="mb-3">{{ __('Forgot Password?') }}</h3>
                            <p>Enter the email address you registered with below.</p>
                            <div class="alert alert-danger d-none" role="alert" id="err_toastr_forgot"></div>
                            <form id="frm_forgot_password" method="POST" class="forgot_password d-flex" action="{{ route('forgot.password') }}">
                                @csrf                                
                                <div class="form-group mr-3">
                                    <input type="email" class="form-control forgot-page"  placeholder="{{ __('E-Mail Address') }}" name="email" value="" required autocomplete="email" id="forgot_email">
                                    <span class="label-title"><i class="fa fa-envelope-o"></i></span>

                                    <span class="invalid-feedback" id="email_forgot_error"></span>
                                </div>
                                <input type="button" class="btn send-btn" value="{{ __('Send') }}" name="btn_forgot_password" id="btn_forgot_password" />
                            </form>
                        </div>
                    </div>
                </div>

            </div>
           
        </div>
        
    </div>
</section>


@endsection

