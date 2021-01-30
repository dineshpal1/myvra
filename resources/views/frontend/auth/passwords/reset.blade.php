@extends('frontend.layouts.welcome')

@section('content')
<section class="login-section">
    <div class="container">
        <div class="card card-login">
            <div class="card-body">
                <div class="row form mb-4">
                    <div class="col-md-7">
                        <div class="login-form">
                            <h3 class="heading">{{ __('Reset Password') }}</h3>
                            <form id="frm_reset_password" method="POST" action="{{ route('update.password') }}">
                                @csrf
                                
                                @if(Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                @endif

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"  minlength="6"  maxlength="50" placeholder="********" name="password" required1 autocomplete="new-password">
                                        <span class="label-title"><i class="fa fa-lock"></i></span>
                                        <span class="ml-3 message">(Minimum 6 characters, letter (a-z), number (0-9))</span>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="Re-Enter Password" name="confirm_password" required1 autocomplete="new-password">
                                        <span class="label-title"><i class="fa fa-lock"></i></span>

                                        @error('confirm_password')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div> 
                                <input type="submit" class="btn send-btn btn-block" value="{{ __('Reset Password') }}" name="btn_reset_password" id="btn_reset_password" />
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="ragister_content">
                            <h3 class="mb-4">Already A Member?</h3>
                            <a class="login-btn btn mt-4 mb-4" href="{{ route('login') }}">Login Here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
