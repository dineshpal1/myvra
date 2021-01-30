@extends('admin.layouts.app')

@section('content')

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Home</h1>
        <ol class="breadcrumb">
            <li class="item">
                <a href="{{route('country')}}"><i class="bx bx-user-circle"></i></a>
            </li>

            <li class="item"><a href="{{route('country')}}">Country</a></li>
            <li class="item">Add Country</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->
    <!-- Start -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card mb-30">
                <div
                    class="card-header d-flex justify-content-between align-items-center">
                    <h3>Add Country</h3>
                    <a href="{{route('country')}}">
                        <button type="button" class="btn back_btn shadow-none">
                            <i class="bx bx-chevrons-left"></i>Back
                        </button>
                    </a>
                </div>
            <form id="country-page" method="POST" action="{{route('country/add')}}">
                {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" name="country_name" id="country_name"
                                      />
                                        <span class="hasTextErrors" id="country_name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Country Code</label>
                                    <input type="text" class="form-control" name="country_code" id="country_code"
                                      />
                                        <span class="hasTextErrors" id="country_code_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Country Code ISO</label>
                                    <input type="text" class="form-control" name="country_code_iso" id="country_code_iso"
                                       />
                                        <span class="hasTextErrors" id="country_code_iso_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="toggle-wrap">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="is_active"
                                                value="1">
                                            <div class="state p-success">
                                                <label>Active</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                        </div>
                        <button type="button" class="btn btn-primary add_btn" id="countrybtn" form_id="country-page">
                            <i class="bx bx-plus"></i> Add
                        </button>
                        <!-- <button type="submit" class="btn btn-outline-primary">
                    <i class="bx bx-list-plus"></i> Add More
                    </button> -->
                    <a href="{{route('country')}}">
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