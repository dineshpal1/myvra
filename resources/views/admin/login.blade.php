@extends('admin.layouts.master')

@section('content')
<div class="login-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="login-form">
                <div class="logo">
                    <a href="index.html"><img src="{{asset('img/cook-3.png')}}"
                            width="150" alt="image" /></a>
                </div>

                <h2>Welcome</h2>

                <form id="admin-login-page" action="{{route('login')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control " name="email" id="email"
                            placeholder="Email" />
                        <span class="label-title"><i class="bx bx-user"></i></span>
                        <span class="hasTextErrors" id="email_error"></span>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Password" />
                        <span class="label-title"><i class="bx bx-lock"></i></span>
                        <span class="hasTextErrors" id="password_error"></span>
                    </div>

                    <div class="form-group">
                        <div class="remember-forgot">
                            <label class="checkbox-box">Remember me
                                <input type="checkbox" />
                                <span class="checkmark"></span>
                            </label>

                            <a href="{{route('forgot_password')}}"
                                class="forgot-password">Forgot password?</a>
                        </div>
                    </div>

                    <button type="button"id="adminloginbtn" form_id="admin-login-page" class="login-btn">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection