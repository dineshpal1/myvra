@extends('admin.layouts.app')

@section('content')



    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Home</h1>
        <ol class="breadcrumb">
            <li class="item">
                <a href="{{route('measure_unit')}}"><i class="bx bx-user-circle"></i></a>
            </li>
            <li class="item"><a href="{{route('measure_unit')}}">Measure Unit</a></li>
            <li class="item">Add Measure Unit</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->
    <!-- Start -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card mb-30">
                <div
                    class="card-header d-flex justify-content-between align-items-center">
                    <h3>Add Measure Unit</h3>
                    <a href="{{route('measure_unit')}}">
                        <button type="button" class="btn back_btn shadow-none">
                            <i class="bx bx-chevrons-left"></i>Back
                        </button>
                    </a>
                </div>
            <form id="measure_unit-page" method="POST" action="{{route('measure_unit/add')}}">
                {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Unit Name</label>
                                    <input type="text" class="form-control" name="unit_name" id="unit_name"
                                      />
                                        <span class="hasTextErrors" id="unit_name_error"></span>
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
                        <button type="button" class="btn btn-primary add_btn" id="measureunitbtn" form_id="measure_unit-page">
                            <i class="bx bx-plus"></i> Add
                        </button>
                        <!-- <button type="submit" class="btn btn-outline-primary">
                    <i class="bx bx-list-plus"></i> Add More
                    </button> -->
                    <a href="{{route('measure_unit')}}">
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