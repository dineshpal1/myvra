
@extends('frontend.layouts.apps')

@section('content')

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <h1>Home</h1>
        <ol class="breadcrumb">
            <li class="item">
                <a href="{{route('customer_dashboard')}}"><i class="bx bx-user-circle"></i></a>
            </li>

            <li class="item"><a href="{{route('menu-category')}}">Menu Category</a></li>
            <li class="item">Add Menu Category</li>
        </ol>
    </div>
    <!-- End Breadcrumb Area -->
    <!-- Start -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card mb-30">
                <div
                    class="card-header d-flex justify-content-between align-items-center">
                    <h3>Add Menu Category</h3>
                    <a href="{{route('menu-category')}}">
                        <button type="button" class="btn back_btn shadow-none">
                            <i class="bx bx-chevrons-left"></i>Back
                        </button>
                    </a>
                </div>
            <form id="menuCategory-page" method="POST" action="{{route('menuCategory/add')}}">
                @csrf
                    <div class="card-body">
                        <div class="row">
                          
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Menu Category Name</label>
                                <input type="text" class="form-control" name="category_name" id="category_name"/>
                                   @if($errors->has('category_name'))    
                                        <span class="text-danger">{{$errors->first('category_name') }}</span>
                                    @endif    
                                </div>
                            </div>
                          
                            <!--<div class="col-lg-6">
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
                            </div>-->

                        </div>
                      <!--<button type="button" class="btn btn-primary add_btn" id="menucategorybtn" form_id="menucategory">
                            <i class="bx bx-plus"></i> Add
                        </button>-->
                        <button type="submit" class="btn btn-danger">
                  <i class="bx bx-plus"></i> Add 
                  </button>
                  <a href="{{route('menu-category')}}">
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