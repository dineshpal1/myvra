@extends('admin.layouts.app')

@section('content')

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Home</h1>
        <ol class="breadcrumb">
            <li class="item">
                <a href="{{route('brand')}}"><i class="bx bx-user-circle"></i></a>
            </li>

        <li class="item"> <a href="{{route('brand')}}">Item Brand</a> </li>
            <li class="item">Add Item Brand</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->
    <!-- Start -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card mb-30">
                <div
                    class="card-header d-flex justify-content-between align-items-center">
                    <h3>Add Item Brand</h3>
                    <a href="{{route('brand')}}">
                        <button type="button" class="btn back_btn shadow-none">
                            <i class="bx bx-chevrons-left"></i>Back
                        </button>
                    </a>
                </div>
            <form id="brand-page" method="POST" action="{{route('brand/add')}}">
                {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Brand Name</label>
                                    <input type="text" class="form-control" name="brand_name" id="brand_name"
                                     />
                                        <span class="hasTextErrors" id="brand_name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="toggle-wrap">
                                    <div class="pretty p-switch p-fill">
                                        <input type="checkbox" name="is_active" value="1">
                                        <div class="state p-success">
                                            <label>Active</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                        </div>
                        <button type="button" class="btn btn-primary add_btn" id="brandbtn" form_id="brand-page">
                            <i class="bx bx-plus"></i> Add
                        </button>
                        <!-- <button type="submit" class="btn btn-outline-primary">
                    <i class="bx bx-list-plus"></i> Add More
                    </button> -->
                    <a href="{{route('brand')}}">
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