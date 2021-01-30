
@extends('frontend.layouts.apps')


@section('content')

<!-- Breadcrumb Area -->
<div class="breadcrumb-area">
    <h1>Home</h1>
    <ol class="breadcrumb">
        <li class="item">
            <a href="{{route('menu-category')}}"><i class="bx bx-user-circle"></i></a>
        </li>
        <li class="item">
            <a href="{{route('menu-category')}}">Menu Category</a></li>
          <a  href="{{route('vendor-item',['vnId'=>$objData->id??''])}}">
            <li class="item">Vendor Items</a></li>
          
        <li class="item">
       @php
           echo Str::ucfirst($objData->vendor_name??'N/A')
        @endphp</li>
        <li class="item">Add Menu</li>
    </ol>
</div>
<!-- End Breadcrumb Area -->
<!-- Start -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card mb-30">
            <div
                class="card-header d-flex justify-content-between align-items-center">
                <h3>Add Menu</h3>
                <a href="{{route('vendor-item',['vnId'=>$objData->id??''])}}">
                    <button type="button" class="btn back_btn shadow-none">
                        <i class="bx bx-chevrons-left"></i>Back
                    </button>
                </a>
            </div>
            <form id="vendor-item-page" action="{{route('add_menu')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Menu Category</label>
                                <select class="form-control" name="menu_category" id="menu_category_id" >
                                    <option value="">Select Menu Category</option>
                                    @foreach ($menu_cat as $key=> $objdata)
                                    <option value="{{$objdata->id}}">
                                        {{$objdata->menu_category_name}}
                                    </option>
                                    @endforeach
                                </select>
                          @if ($errors->has('menu_category'))
                                 <span class="text-danger">{{ $errors->first('menu_category') }}</span>
                                  @endif  
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Menu Name</label>
                            <input type="text" class="form-control" name="menu_name" id="menu_name" value="{{old('menu_name')}}"/>
                                     
                              @if ($errors->has('menu_name'))
                                 <span class="text-danger">{{ $errors->first('menu_name') }}</span>
                                  @endif  
                                    

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Discription</label>
                               
                                 <textarea class="form-control" name="discription" rows="4" cols="50" id="discription" value="{{old('discription')}}">
                                     
                                 </textarea>
                                @if ($errors->has('discription'))
                                 <span class="text-danger">{{ $errors->first('discription') }}</span>
                                  @endif  
                            </div>
                        </div>
                       {{-- measure --}}
                       <div class="col-lg-6">
                        <div class="form-group">
                            <label>Menu Image</label>
                       <input type="file" class="form-control" name="menu_image" id="menu_image" />
                          @if ($errors->has('menu_image'))
                                 <span class="text-danger">{{ $errors->first('menu_image') }}</span>
                                  @endif             
                              
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Menu Cost</label>
                        <input type="number" class="form-control" name="menu_cost" id="menu_cost" value="{{old('menu_cost')}}"/>
                         @if ($errors->has('menu_cost'))
                                 <span class="text-danger">{{ $errors->first('menu_cost') }}</span>
                                  @endif             
                            
                        </div>
                    </div>
                         
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Menu Cost Percentage</label>
                     <input type="number" class="form-control" name="menu_percent" value="{{old('menu_percent')}}" id="menu_percent"/>
                        @if ($errors->has('menu_percent'))
                                 <span class="text-danger">{{ $errors->first('menu_percent') }}</span>
                                  @endif  
                               
                        </div>
                    </div>
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Menu Contribution</label>
                            <input type="number" class="form-control" name="menu_contribution" value="{{old('menu_contribution')}}" id="menu_contribution"/>
                             @if ($errors->has('menu_contribution'))
                                 <span class="text-danger">{{ $errors->first('menu_contribution') }}</span>
                                  @endif
                                
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Menu Selling Price</label>
                               <input type="number" class="form-control" name="selling_price" value="{{old('selling_price')}}" id="selling_price"/>
                                @if ($errors->has('selling_price'))
                                 <span class="text-danger">{{ $errors->first('selling_price') }}</span>
                                  @endif
                                    
                            </div>
                        </div>
                      
                      
                       {{--
                        <div class="col-lg-2">
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
                        </div>--}}

                      {{--  <div class="col-lg-4">
                            <div class="form-group">
                                <label>Item Catch Weight</label>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="toggle-wrap">
                                            <div class="pretty p-switch p-fill">
                                                <input type="radio" name="item_catch_weight" id="item_catch_weight" value="Yes">
                                                <div class="state p-success">
                                                    <label>Yes</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="toggle-wrap">
                                            <div class="pretty p-switch p-fill">
                                                <input type="radio" name="item_catch_weight" id="item_catch_weight" value="No">
                                                <div class="state p-success">
                                                    <label>No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>--}}
                       
                     

                    </div>
                    {{--<button type="button" id="vendoritembtn" form_id="vendor-item-page" class="btn btn-primary add_btn">
                        <i class="bx bx-plus"></i> Add
                    </button>--}}
                    <!-- <button type="submit" class="btn btn-outline-primary">
                  <i class="bx bx-list-plus"></i> Add More
                  </button> -->
                   <button type="submit" id="addmenubtn" form_id="add-menu-page" class="btn btn-primary add_btn">
                        <i class="bx bx-plus"></i> Add
                    </button>
                <a href="{{route('menu')}}">
                    <button type="button" class="btn btn-outline-danger cancel_btn"
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