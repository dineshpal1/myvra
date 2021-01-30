@extends('admin.layouts.app')

@section('content')

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Home</h1>
        <ol class="breadcrumb">
            <li class="item">
                <a href="{{route('state')}}"><i class="bx bx-user-circle"></i></a>
            </li>

            <li class="item"><a href="{{route('state')}}">State</a></li>
            <li class="item">Edit State</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->
    <!-- Start -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card mb-30">
                <div
                    class="card-header d-flex justify-content-between align-items-center">
                    <h3>Edit State</h3>
                    <a href="{{route('country')}}">
                        <button type="button" class="btn back_btn shadow-none">
                            <i class="bx bx-chevrons-left"></i>Back
                        </button>
                    </a>
                </div>
                <form id="state-page" method="POST" action="{{route('state/edit')}}">
                    {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="{{$objRecord->id}}">
                                        <label>Country</label>
                                        <select id="country_id" name="country_id" class="form-control">
                                            <option value="">Select Country</option>
                                            @foreach (\App\Models\Country::getTitle() as $key => $value)
        
                                            <option value="{{ $key }}" @if ($objRecord->country_id==$key)
                                                selected
                                            @endif />{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <span class="hasTextErrors" id="country_id_error"></span>
        
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>State</label>
                                    <input type="text" class="form-control" name="state_name" value="{{$objRecord->state_name}}" id="state_name"
                                           />
                                            <span class="hasTextErrors" id="state_name_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>State Code</label>
                                        <input type="text" class="form-control" name="state_code" id="state_code"value="{{$objRecord->state_code}}"
                                            />
                                            <span class="hasTextErrors" id="state_code_error"></span>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Country Code ISO</label>
                                        <input type="text" class="form-control" name="country_code_iso" id="country_code_iso"
                                            placeholder="Country Code ISO" />
                                            <span class="hasTextErrors" id="country_code_iso_error"></span>
                                    </div>
                                </div> --}}
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="toggle-wrap">
                                        <div class="pretty p-switch p-fill">
                                            <input type="checkbox" name="is_active" id="is_active" value="1" @if($objRecord->is_active=='1')
                                            checked
                                            @endif >
                                            <div class="state p-success">
                                                <label>Active</label>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
    
                            </div>
                            <button type="button" class="btn btn-primary add_btn" id="statebtn" form_id="state-page">
                                <i class="bx bx-plus"></i> Update
                            </button>
                            <!-- <button type="submit" class="btn btn-outline-primary">
                        <i class="bx bx-list-plus"></i> Add More
                        </button> -->
                        <a href="{{route('state')}}">
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