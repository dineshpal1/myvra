
@extends('frontend.layouts.apps')
@section('content')

  <!-- Breadcrumb Area -->
  <div class="breadcrumb-area">
    <h1>Home</h1>
    <ol class="breadcrumb">
      <li class="item">
        <a href="{{route('customer_dashboard')}}"><i class="bx bx-user-circle"></i></a>
      </li>

      <li class="item">Menu Costing</li>
    </ol>
  </div>

  <!-- Start -->
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card mb-30">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3>Menu Costing</h3>
        </div>
        <div>

          Menu Category :   <select name="category" id="category" >
                          <option value="">-All-</option>
                          @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->menu_category_name}}</option>
                          @endforeach
                        </select>
        <div class="faq-accordion p-0 float-right">
                <div class="accordion">
                    <a href="{{route('menucost_add_menu')}}">
                    <button type="button" class="btn btn-info">
                      ADD NEW MENU ITEM
                    </button>
                  </a>
                </div>
              </div>
       



        </div>
       <br/>
{{--
        <table class="table table-bordered yajra-datatable">
        <thead class="bg-dark text-white">
            <tr>
                <th>Menu Item Category</th>
                <th>Menu Item</th>
                <th>Current Cost</th>
                <th>Cost(%)</th>
                <th>Contribution</th>
                <th>Sell Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
--}}
        <span id="table-list"></span>

      </div>

    </div>

  </div>
  <!-- End -->

<script type="text/javascript">
  jQuery(document).ready(function () {
    getTableData('{{route("menu-cost-list")}}', 'table-list', '1');
    });
</script>



 <script type="text/javascript">
 
  $("#category").change(function(){
      var categoryId=$(this).val();
      // alert(categoryId);
      $.ajax({
 
        url:'menu_cost_list?categoryId=' +categoryId,
        type:'GET',
        dataType:'json',
        success:function(response){
          $('#table-list').html('');
          if(response && response.html){
          $('#table-list').html(response.html);
           }
       }


      });


      
  });


</script>   

@endsection

