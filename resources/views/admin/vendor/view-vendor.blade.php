@extends('admin.layouts.app')

@section('content')
     <!-- Breadcrumb Area -->
     <div class="breadcrumb-area">
        <h1>Home</h1>
        <ol class="breadcrumb">
          <li class="item">
            <a href="{{route('vendor')}}"><i class="bx bx-user-circle"></i></a>
          </li>

          <li class="item"><a href="{{route('customer')}}">Vendors</a></li>
          <li class="item">View Vendor</li>
        </ol>
      </div>
      <!-- End Breadcrumb Area -->
      <!-- Start -->
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card mb-30">
            <div
              class="card-header d-flex justify-content-between align-items-center"
            >
              <h3>View Vendor Details</h3>

              <a href="{{route('vendor')}}">
                <button type="button" class="btn back_btn shadow-none">
                  <i class="bx bx-chevrons-left"></i>Back
                </button>
              </a>  
            </div>
         {{-- {{$objRecord}} --}}
            <div class="card-body">
              <div class="mt-1">
                <div class="row">
                    <div class="col-lg-5 form-group row">
                        <span class="col-lg-6">Vendor Name :</span>
                        <strong class="col-lg-6">{{$objRecord->vendor_name}}</strong>
                    </div>
                    <div class="col-lg-7 form-group row">
                        <span class="col-lg-6">Vendor Branch :</span>
                        <strong class="col-lg-6">{{$objRecord->vendor_branch}}</strong>
                     
                      
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 form-group row">
                        <span class="col-lg-6">Contact Name :</span>
                        <strong class="col-lg-6">{{$objRecord->contact_name}}</strong>
                    </div>
                    <div class="col-lg-7 form-group row">
                      <span class="col-lg-6">Contact Email :</span>
                      <strong class="col-lg-6">{{$objRecord->contact_email}}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 form-group row">
                      <span class="col-lg-6">Contact Number :</span>
                      <strong class="col-lg-6">{{$objRecord->contact_number}}
                      </strong>
                    </div>
                    <div class="col-lg-7 form-group row">
                      <span class="col-lg-6">Vendor Address :</span>
                      <strong class="col-lg-6">{{$objRecord->vendor_address}}
                      </strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 form-group row">
                        <span class="col-lg-6">Added date :</span>
                        <strong class="col-lg-6">{{\App\Shared\Common::changeDateFormat($objRecord->created_at,'F d, Y')}}</strong>
                    </div>
                    <div class="col-lg-7 form-group row">
                        <span class="col-lg-6">Status :</span>
                        <strong class="col-lg-6"> @if($objRecord->is_active=='1')
                          Active @else InActive
                        @endif </strong>
                    </div>
                </div>
            </div>
            </div>
          </div>
          
        </div>

      </div>
      <!-- End -->
@endsection