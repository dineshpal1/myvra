@extends('admin.layouts.master')

@section('content')
<div class="forgot-password-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="forgot-password-content">
                <div class="row m-0">
                    <div class="col-lg-5 p-0">
                        <div class="image">
                            <img src="{{asset('/img/computer.png')}}" alt="image" />
                        </div>
                    </div>

                    <div class="col-lg-7 p-0">
                        <div class="forgot-password-form">
                            <h2>Recover your password</h2>
                            <p class="mb-0">
                                Please provide the email address
                                that you
                                used when you signed up.
                            </p>

                            <form id="admin-forgot-page"
                                action="{{route('forgot_password')}}" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        name="email" id="email"
                                        placeholder="Email" />
                                    <span class="label-title"><i
                                            class="bx bx-envelope"></i></span>
                                    <span class="hasTextErrors"
                                        id="email_error"></span>
                                </div>
                                {{-- <div class="form-group">
                                    <input type="text" class="form-control"
                                        name="otp" placeholder="OTP" />
                                    <span class="label-title"><i
                                            class="bx bx-lock-open-alt"></i></span>
                                </div> --}}

                                <button type="button" class="forgot-password-btn"
                                    id="frgtbtn" form_id="admin-forgot-page">
                                    Submit
                                </button>
                                <a href="{{route('login')}}"> Back
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Forgot Password Area -->
@endsection