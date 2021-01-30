
@extends('frontend.layouts.apps')
@section('content')

  <!-- Breadcrumb Area -->
  <div class="breadcrumb-area">
    <h1>Home</h1>
    <ol class="breadcrumb">
      <li class="item">
        <a href="{{route('recipeItem')}}"><i class="bx bx-user-circle"></i></a>
      </li>

      <li class="item">Recipe Items</li>
    </ol>
  </div>


  <!-- Start -->
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card mb-30">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3>Recipe Items</h3>

        <div class="faq-accordion p-0 float-right">
                <div class="accordion">
                  <a href="{{route('add-recipe-item')}}">
                    <button type="button" class="btn accordion-title shadow-none">
                      <i class="bx bx-plus"></i>
                    </button>
                  </a>
                </div>
              </div>
       
        </div>
        <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>recipe_id</th>
                <th>vendor_id</th>
                <th>measure_unit_id</th>
                <th>recipe_item_name</th>
                <th>recipe_item_code</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

        <!--<span id="table-list"></span>-->

      </div>

    </div>

  </div>
  <!-- End -->

<script type="text/javascript">
$(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('recipe_item_list') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'recipe_id', name: 'recipe_id'},
            {data: 'vendor_id', name: 'vendor_id'},
            {data: 'measure_unit_id', name: 'measure_unit_id'},
            {data: 'recipe_item_name', name: 'recipe_item_name'},
            {data: 'recipe_item_code', name: 'recipe_item_code'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
  
</script>
    
@endsection