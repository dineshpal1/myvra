@extends('admin.layouts.app')

@section('content')

<?php // echo"<pre>";print_r($objVebdorData); exit;?>

<!-- Breadcrumb Area -->
<div class="breadcrumb-area">
    <h1>Home</h1>
    <ol class="breadcrumb">
        <li class="item">
            <a href="{{route('vendor')}}"><i class="bx bx-user-circle"></i></a>
        </li>

        <li class="item">
            <a href="{{route('vendor')}}">Vendors</a></li>
          <a  href="{{route('vendor-item',['vnId'=>$objVebdorData->id??''])}}">
            <li class="item">Vendor Items</a></li>
          
        <li class="item">
       @php
           echo Str::ucfirst($objVebdorData->vendor_name??'')
        @endphp</li>
        <li class="item">Edit Vendor Item</li>
    </ol>
</div>
<!-- End Breadcrumb Area -->
<!-- Start -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card mb-30">
            <div
                class="card-header d-flex justify-content-between align-items-center">
                <h3>Edit Vendor Item</h3>
                <a href="{{route('vendor-item',['vnId'=>$objVebdorData->id])}}">
                    <button type="button" class="btn back_btn shadow-none">
                        <i class="bx bx-chevrons-left"></i>Back
                    </button>
                </a>
            </div>
            <form id="vendor-item-page" action="{{route('vendor-item/edit',['id'=>$objData->id])}}" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Vendor</label>
                            <input type="hidden" name="id" value="{{$objData->id}}">
                                <select class="form-control" name="vendor_id" id="vendor_id" >
                                    <option value="">Select</option>
                                    @foreach ($arrVendorData as $key=> $objdata)
                                    <option value="{{$objdata->id}}" @if ($objdata->id==$objData->vendor_id)
                                        selected
                                    @endif>
                                        {{$objdata->vendor_name}}</option>
                                    @endforeach
                                </select>
                                <span class="hasTextErrors" id="vendor_id_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Item Title</label>
                            <input type="text" class="form-control" name="item_title" id="item_title" value="{{$objData->item_title}}"
                                     />
                                     <span class="hasTextErrors" id="item_title_error"></span>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Brand</label>
                                <select class="form-control" name="brand_id" id="brand_id" >
                                    <option value="">Select</option>
                                    @foreach ($arrBrandData as $key=> $objdata)
                                    <option value="{{$objdata->id}}" @if ($objdata->id==$objData->brand_id)
                                        selected
                                    @endif>
                                        {{$objdata->brand_name}}</option>
                                    @endforeach
                                </select>
                                <span class="hasTextErrors" id="brand_id_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Item Code</label>
                                <input type="text" class="form-control" name="item_code" id="item_code" value="{{$objData->item_code}}"
                                  />
                                    <span class="hasTextErrors" id="item_code_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Item Class</label>
                                <select class="form-control" name="item_class_id" id="item_class_id" >
                                    <option value="">Select</option>
                                    @foreach ($arrClassData as $key=> $objdata)
                                    <option value="{{$objdata->id}}" @if ($objdata->id==$objData->item_class_id)
                                        selected
                                    @endif>
                                        {{$objdata->class_name}}</option>
                                    @endforeach
                                </select>
                                <span class="hasTextErrors" id="item_class_id_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Item Price</label>
                                <input type="text" class="form-control" name="item_price" id="item_price" value="{{$objData->item_price}}"
                                  />
                                    <span class="hasTextErrors" id="item_price_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Measure Unit</label>
                                <select class="form-control" name="measure_unit" id="measure_unit" >
                                    <option value="">Select</option>
                                    @foreach ($arrMeasureUnit as $key=> $objdata)
                                    <option value="{{$objdata->id}}" @if ($objdata->id==$objData->measure_unit)
                                        selected
                                    @endif>
                                        {{$objdata->unit_name}}</option>
                                    @endforeach
                                </select>
                                <span class="hasTextErrors" id="measure_unit_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Item Pack Size</label>
                                <input type="text" class="form-control" name="pack_size" id="pack_size" value="{{$objData->pack_size}}"
                                  />
                                    <span class="hasTextErrors" id="pack_size_error"></span>
                            </div>
                        </div>
                        
                      
                    
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Status</label>
                                <div class="toggle-wrap">
                                <div class="pretty p-switch p-fill">
                                    <input type="checkbox" name="is_active" value="1" @if ($objData->is_active=='1')
                                        checked
                                    @endif>
                                    <div class="state p-success">
                                        <label>Active</label>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Item Catch Weight</label>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="toggle-wrap">
                                            <div class="pretty p-switch p-fill">
                                                <input type="radio" name="item_catch_weight" id="item_catch_weight" value="Yes" @if ($objData->item_catch_weight=='Yes')
                                                    checked
                                                @endif>
                                                <div class="state p-success">
                                                    <label>Yes</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="toggle-wrap">
                                            <div class="pretty p-switch p-fill">
                                                <input type="radio" name="item_catch_weight" id="item_catch_weight" value="No"  @if ($objData->item_catch_weight=='No')
                                                checked
                                            @endif>
                                                <div class="state p-success">
                                                    <label>No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Item Pack(per/case)</label>
                                <input type="text" class="form-control" name="pack_per_case" id="pack_per_case" value="{{$objData->pack_per_case}}"
                                  />
                                    <span class="hasTextErrors" id="pack_per_case_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Item Description</label>
                            <textarea name="item_description" id="item_description" class="form-control" cols="0" rows="">{{$objData->item_description}}</textarea>
                                  
                                     <span class="hasTextErrors" id="item_description_error"></span>
                            </div>
                        </div>

                    </div>
                    <button type="button" id="vendoritembtn" form_id="vendor-item-page" class="btn btn-primary add_btn">
                        <i class="bx bx-plus"></i> Update
                    </button>
                    <!-- <button type="submit" class="btn btn-outline-primary">
                  <i class="bx bx-list-plus"></i> Add More
                  </button> -->
                <a href="{{route('vendor-item',['vnId'=>$objVebdorData->id])}}">
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