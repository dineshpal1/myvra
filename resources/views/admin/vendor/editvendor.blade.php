@extends('admin.layouts.app')

@section('content')



<!-- Breadcrumb Area -->
<div class="breadcrumb-area">
    <h1>Home</h1>
    <ol class="breadcrumb">
        <li class="item">
            <a href="{{route('vendor')}}"><i class="bx bx-user-circle"></i></a>
        </li>

        <li class="item">
            <a href="{{route('vendor')}}">Vendors</a></li>
        <li class="item">Edit Vendor</li>
    </ol>
</div>
<!-- End Breadcrumb Area -->
<!-- Start -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card mb-30">
            <div
                class="card-header d-flex justify-content-between align-items-center">
                <h3>Edit Vendor</h3>
                <a href="{{route('vendor')}}">
                    <button type="button" class="btn back_btn shadow-none">
                        <i class="bx bx-chevrons-left"></i>Back
                    </button>
                </a>
            </div>
            <form id="vendor-page" action="{{route('vendor/edit')}}" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Vendor Name</label>
                                <input type="hidden" name="id"
                                    value="{{$objRecord->id}}">
                                <input type="text" class="form-control"
                                    name="vendor_name" id="vendor_name"
                                    value="{{$objRecord->vendor_name}}" />
                                <span class="hasTextErrors"
                                    id="vendor_name_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Vendor Branch</label>
                                <input type="text" class="form-control"
                                    name="vendor_branch" id="vendor_branch"
                                    value="{{$objRecord->vendor_branch}}" />
                                <span class="hasTextErrors"
                                    id="vendor_branch_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Contact Name</label>
                                <input type="text" class="form-control"
                                    name="contact_name" id="contact_name"
                                    value="{{$objRecord->contact_name}}" />
                                <span class="hasTextErrors"
                                    id="contact_name_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Contact E-mail</label>
                                <input type="text" class="form-control"
                                    name="contact_email" id="contact_email"
                                    value="{{$objRecord->contact_email}}" />
                                <span class="hasTextErrors"
                                    id="contact_email_error"></span>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" class="form-control"
                                    name="contact_phone" id="contact_phone"
                                    value="{{$objRecord->contact_number}}" />
                                <span class="hasTextErrors"
                                    id="contact_phone_error"></span>
                            </div>
                        </div>
                    
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Country</label>
                                <select class="form-control h-40" name="country_id"
                                    id="country_id"
                            onchange="renderAjaxContent('{{route('getSateByCountry')}}','#state_id',$(this).val(),'{{$objRecord->state_id}}')">
                                    <option value="">Select</option>
                                    @foreach ($arrData as $key=> $objdata)
                                    <option value="{{$objdata->id}}" @if ($objRecord->country_id==$objdata->id)
                                        selected
                                        @endif>
                                        {{$objdata->country_name}}</option>
                                    @endforeach
                                </select>
                                <span class="hasTextErrors"
                                    id="country_id_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>State</label>
                                <select class="form-control" id="state_id"
                                    name="state_id">
                                    <option value="">Select</option>
                                </select>
                                <span class="hasTextErrors"
                                    id="state_id_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control"
                                    value="{{$objRecord->city}}" name="city"
                                    id="city" />
                                <span class="hasTextErrors" id="city_error"></span>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control"
                                    name="vendor_address" id="vendor_address"
                                    value="{{$objRecord->vendor_address}}" />
                                <span class="hasTextErrors"
                                    id="vendor_address_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Status</label>
                                <div class="toggle-wrap">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="is_active"
                                            value="1" @if ($objRecord->is_active=='1')
                                        checked
                                        @endif>
                                        <div class="state p-success">
                                            <label>Active</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <button type="button" id="vendorbtn" form_id="vendor-page"
                        class="btn btn-primary add_btn">
                        <i class="bx bx-plus"></i> Update
                    </button>
                    <!-- <button type="submit" class="btn btn-outline-primary">
                  <i class="bx bx-list-plus"></i> Add More
                  </button> -->
                    <a href="{{route('vendor')}}">
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
<script>
    jQuery(document).ready(function () {
          setTimeout(() => {
        $('#country_id').trigger('change');    
          }, 500);   
    });
</script>
@endsection