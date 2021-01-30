@extends('admin.layouts.master')

@section('content')
<!-- Start Reset Password Area -->
<div class="reset-password-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="reset-password-content">
                <div class="row m-0">
                    <div class="col-lg-5 p-0">
                        <div class="image">
                            <img src="{{asset('/img/computer.png')}}" alt="image">
                        </div>
                    </div>

                    <div class="col-lg-7 p-0">
                        <div class="reset-password-form">
                            <h2>Reset Your Password</h2>

                            <form id="admin-forgot-page"
                                action="{{route('reset_password')}}" method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="reset_token"
                                        value="{{$argToken}}">
                                    {{ csrf_field() }}
                                    <input type="password" class="form-control"
                                        name="password" id="password"
                                        placeholder="Enter a new password">
                                    <span class="label-title"><i
                                            class='bx bx-lock'></i></span>
                                    <span class="hasTextErrors"
                                        id="password_error"></span>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control"
                                        name="confirm_password" id="confirm_password"
                                        placeholder="Confirm your new password">
                                    <span class="label-title"><i
                                            class='bx bx-lock-alt'></i></span>
                                    <span class="hasTextErrors"
                                        id="confirm_password_error"></span>
                                </div>

                                <button type="button" id="resetpasswordbtn"
                                    form_id="admin-forgot-page"
                                    class="reset-password-btn">Reset my
                                    Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Reset Password Area -->
@endsection