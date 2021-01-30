
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
                <h3>Add Menu Item</h3>
                <a href="{{route('vendor-item',['vnId'=>$objData->id??''])}}">
                    <button type="button" class="btn back_btn shadow-none">
                        <i class="bx bx-chevrons-left"></i>Back
                    </button>
                </a>
            </div>
            <form id="vendor-item-page" action="{{route('add_menu_item')}}" method="POST" >
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Menu </label>
                                <select class="form-control" name="menu" id="menu" >
                                    <option value="">Select Menu </option>
                                    @foreach ($menus as $key=> $menu)
                                    <option value="{{$menu->id}}">
                                        {{$menu->menu_name}}
                                    </option>
                                    @endforeach
                                </select>
                          @if ($errors->has('menu'))
                                 <span class="text-danger">{{ $errors->first('menu') }}</span>
                                  @endif  
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>vendor</label>
                           <select class="form-control" name="vendor" id="vendor" onchange="renderAjaxContent('{{route('getVendorItemByVendor')}}','#vendor_item',$(this).val()),$('#vendor_item').html('<option>Select Vendor Items</option>')">
                                    <option value="">Select vendor </option>
                                    @foreach ($vendors as $key=> $vendor)
                                    <option value="{{$vendor->id}}">
                                        {{$vendor->vendor_name}}
                                    </option>
                                    @endforeach
                                </select>
                                     
                              @if ($errors->has('vendor'))
                                 <span class="text-danger">{{ $errors->first('vendor') }}</span>
                                  @endif  
                                    

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>menu_item_vendor_name</label>
                                  <input type="text" class="form-control" name="menu_item_vendor_name" id="menu_item_vendor_name" value="{{old('menu_item_vendor_name')}}"/>
                               
                                @if ($errors->has('menu_item_vendor_name'))
                                 <span class="text-danger">{{ $errors->first('menu_item_vendor_name') }}</span>
                                  @endif  
                            </div>
                        </div>
                       {{-- measure --}}
                       <div class="col-lg-6">
                        <div class="form-group">
                            <label>vendor_item</label>
                          <select class="form-control" name="vendor_item" id="vendor_item" >
                                    <option value="">Select vendor item </option>
                                  
                                </select>
                          @if ($errors->has('vendor_item'))
                                 <span class="text-danger">{{ $errors->first('vendor_item') }}</span>
                                  @endif             
                              
                        </div>
                    </div>


                       <div class="col-lg-6">
                        <div class="form-group">
                            <label>Measure Unit</label>
                          <select class="form-control" name="measure_unit" id="measure_unit" >
                                    <option value="">Select Measure Unit </option>
                                    @foreach ($measures as $key=> $items)
                                    <option value="{{$items->id}}">
                                        {{$items->unit_name }}
                                    </option>
                                    @endforeach
                                </select>
                          @if ($errors->has('measure_unit'))
                                 <span class="text-danger">{{ $errors->first('measure_unit') }}</span>
                                  @endif             
                              
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Menu Item Name </label>
                        <input type="text" class="form-control" name="menu_item_name" id="menu_item_name" value="{{old('menu_item_name')}}"/>
                         @if ($errors->has('menu_item_name'))
                                 <span class="text-danger">{{ $errors->first('menu_item_name') }}</span>
                                  @endif             
                            
                        </div>
                    </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>Menu Item Code </label>
                        <input type="text" class="form-control" name="menu_item_code" id="menu_item_code" value="{{old('menu_item_code')}}"/>
                         @if ($errors->has('menu_item_name'))
                                 <span class="text-danger">{{ $errors->first('menu_item_code') }}</span>
                                  @endif             
                            
                        </div>
                    </div>
                         
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Menu Item Portion</label>
                     <input type="number" class="form-control" name="menu_item_portion" value="{{old('menu_item_portion')}}" id="menu_item_portion"/>
                        @if ($errors->has('menu_item_portion'))
                                 <span class="text-danger">{{ $errors->first('menu_item_portion') }}</span>
                                  @endif  
                               
                        </div>
                    </div>
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Menu Item Yields</label>
                            <input type="number" class="form-control" name="menu_item_yields" value="{{old('menu_item_yields')}}" id="menu_item_yields"/>
                             @if ($errors->has('menu_item_yields'))
                                 <span class="text-danger">{{ $errors->first('menu_item_yields') }}</span>
                                  @endif
                                
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Menu Item Cost</label>
                               <input type="number" class="form-control" name="cost" value="{{old('cost')}}" id="cost"/>
                                @if ($errors->has('cost'))
                                 <span class="text-danger">{{ $errors->first('cost') }}</span>
                                  @endif
                                    
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <label>Menu Item Type</label>
                               <input type="text" class="form-control" name="menu_item_type" value="{{old('menu_item_type')}}" id="menu_item_type"/>
                                @if ($errors->has('menu_item_type'))
                                 <span class="text-danger">{{ $errors->first('menu_item_type') }}</span>
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