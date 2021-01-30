
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
        <li class="item">Edit Recipe</li>
    </ol>
</div>
<!-- End Breadcrumb Area -->
<!-- Start -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card mb-30">
            <div
                class="card-header d-flex justify-content-between align-items-center">
                <h3>Edit Recipe</h3>
                <a href="{{route('vendor-item',['vnId'=>$objData->id??''])}}">
                    <button type="button" class="btn back_btn shadow-none">
                        <i class="bx bx-chevrons-left"></i>Back
                    </button>
                </a>
            </div>
            <form id="vendor-item-page" action="{{url('recipe/edit',$obj->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                       
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Recipe Name</label>
                            <input type="text" class="form-control" name="recipe_name" id="recipe_name" value="{{old('recipe_name',$obj->recipe_name)}}"/>
                                     
                              @if ($errors->has('recipe_name'))
                                 <span class="text-danger">{{ $errors->first('recipe_name') }}</span>
                                  @endif  
                                    

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Recipe Discription</label>
                               
                                 <textarea class="form-control" name="discription" rows="4" cols="50" id="discription" value="{{old('discription')}}">
                                     {{$obj->recipe_description}}
                                 </textarea>
                                @if ($errors->has('discription'))
                                 <span class="text-danger">{{ $errors->first('discription') }}</span>
                                  @endif  
                            </div>
                        </div>
                       {{-- measure --}}
                       <div class="col-lg-6">
                        <div class="form-group">
                            <label>Recipe Image</label>
                       <input type="file" class="form-control" name="recipe_image" id="recipe_image" />
                          @if ($errors->has('recipe_image'))
                                 <span class="text-danger">{{ $errors->first('recipe_image') }}</span>
                                  @endif             
                              
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Recipe Yield</label>
                        <input type="number" class="form-control" name="recipe_yield" id="recipe_yield" value="{{old('recipe_yield',$obj->recipe_yield)}}"/>
                         @if ($errors->has('recipe_yield'))
                                 <span class="text-danger">{{ $errors->first('recipe_yield') }}</span>
                                  @endif             
                            
                        </div>
                    </div>
                         
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Recipe Batch Cost </label>
                     <input type="number" class="form-control" name="recipe_batch_cost" value="{{old('recipe_batch_cost',$obj->recipe_batch_cost)}}" id="recipe_batch_cost"/>
                        @if ($errors->has('recipe_batch_cost'))
                                 <span class="text-danger">{{ $errors->first('recipe_batch_cost') }}</span>
                                  @endif  
                               
                        </div>
                    </div>
                         <div class="col-lg-6">
                        <div class="form-group">
                            <label>Measure Unit</label>
                          <select class="form-control" name="measure_unit" id="measure_unit" >
                                    <option value="">Select Measure Unit </option>
                                    @foreach ($measures as $key=> $items)
                                    <option value="{{$items->id}}" @if($obj->measure_unit_id==$items->id) selected @endif>
                                        {{$items->unit_name }}
                                    </option>
                                    @endforeach
                                </select>
                          @if ($errors->has('measure_unit'))
                                 <span class="text-danger">{{ $errors->first('measure_unit') }}</span>
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
                        <i class="bx bx-plus"></i>Update
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