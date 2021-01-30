@extends('admin.layouts.app')

@section('content')
   <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Home</h1>
        <ol class="breadcrumb">
            <li class="item">
                <a href="{{route('dashboard')}}"><i class="bx bx-user-circle"></i></a>
            </li>

            {{-- <li class="item"><a href="{{route('state')}}">State</a></li> --}}
            <li class="item">Change Password</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->
    <!-- Start -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card mb-30">
                <div
                    class="card-header d-flex justify-content-between align-items-center">
                    <h3>Change Password</h3>
                    <a href="{{route('dashboard')}}">
                        <button type="button" class="btn back_btn shadow-none">
                            <i class="bx bx-chevrons-left"></i>Back
                        </button>
                    </a>
                </div>
            <form id="password-page" method="POST" action="{{route('change-password')}}">
                {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input type="text" class="form-control" name="old_password" id="old_password"
                                       />
                                        <span class="hasTextErrors" id="old_password_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="text" class="form-control" name="new_password" id="new_password"
                                       />
                                        <span class="hasTextErrors" id="new_password_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="text" class="form-control" name="confirm_password" id="confirm_password"
                                       />
                                        <span class="hasTextErrors" id="confirm_password_error"></span>
                                </div>
                            </div>
                           

                        </div>
                        <button type="button" class="btn btn-primary add_btn" id="changpassbtn" form_id="password-page">
                            <i class="bx bx-plus"></i> Update
                        </button>
                    <a href="{{route('dashboard')}}">
                        <button type="button"
                            class="btn btn-outline-danger cancel_btn"
                            data-dismiss="modal" aria-label="Close">
                            <i class="bx bx-x"></i> Cancel
                        </button>
                    </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End -->
@endsection