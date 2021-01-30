@extends('admin.layouts.app')

@section('content')

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Home</h1>
        <ol class="breadcrumb">
            <li class="item">
                <a href="{{route('customer')}}"><i class="bx bx-user-circle"></i></a>
            </li>

            <li class="item"><a href="{{route('customer')}}">Customers</a></li>
            <li class="item">Add Customer</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->
    <!-- Start -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card mb-30">
                <div
                    class="card-header d-flex justify-content-between align-items-center">
                    <h3>Add Customers</h3>
                    <a href="{{route('customer')}}">
                        <button type="button" class="btn back_btn shadow-none">
                            <i class="bx bx-chevrons-left"></i>Back
                        </button>
                    </a>
                </div>
            <form id="customer-page" method="POST" action="{{route('customer/add')}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>
                                        Customer ID # </label>
                                    <input type="text" class="form-control" name="customer_code" id="customer_code"
                                      />
                                        <span class="hasTextErrors" id="customer_code_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Contact Name</label>
                                    <input type="text" class="form-control" name="customer_name" id="customer_name"
                                       />
                                        <span class="hasTextErrors" id="customer_name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Contact Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                      />
                                        <span class="hasTextErrors" id="phone_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                      />
                                        <span class="hasTextErrors" id="email_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                       />
                                        <span class="hasTextErrors" id="password_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Restaurant Name</label>
                                    <input type="text" class="form-control" name="restaurant_name" id="restaurant_name"
                                       />
                                        <span class="hasTextErrors" id="restaurant_name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Restaurant Address</label>
                                    <input type="text" class="form-control" name="restaurant_address" id="restaurant_address"
                                     />
                                        <span class="hasTextErrors" id="restaurant_address_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control h-40" name="country_id" id="country_id" onchange="renderAjaxContent('{{route('getSateByCountry')}}','#state_id',$(this).val()),$('#state_id').html('<option>Select State</option>')">
                                        <option value="">Select</option>
                                        @foreach ($arrData as $key=> $objdata)
                                        <option value="{{$objdata->id}}">
                                            {{$objdata->country_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="hasTextErrors" id="country_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <select class="form-control" id="state_id" name="state_id">
                                        <option value="">Select</option>
                                        {{-- <option>British Columbia</option> --}}
                                    </select>
                                    <span class="hasTextErrors" id="state_id_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city" id="city"
                                       />
                                        <span class="hasTextErrors" id="city_error"></span>
                                </div>
                                
                            </div>
                           
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Bonus/Referral Code</label>
                                    <input type="text" class="form-control" name="referral_code" id="referral_code"
                                      />
                                        <span class="hasTextErrors" id="referral_code_error"></span>
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
                        <button type="button" class="btn btn-primary add_btn" id="customerbtn" form_id="customer-page">
                            <i class="bx bx-plus"></i> Add
                        </button>
                        <!-- <button type="submit" class="btn btn-outline-primary">
                  <i class="bx bx-list-plus"></i> Add More
                  </button> -->
                  <a href="{{route('customer')}}">
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