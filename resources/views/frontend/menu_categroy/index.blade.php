@extends('frontend.layouts.apps')
@section('content')

<!-- Breadcrumb Area -->
  <div class="breadcrumb-area">
    <h1>Home</h1>
    <ol class="breadcrumb">
      <li class="item">
        <a href="{{route('customer')}}"><i class="bx bx-user-circle"></i></a>
      </li>

      <li class="item">Menu Category</li>
    </ol>
  </div>


  <!-- Start -->
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card mb-30">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3>Menu Category</h3>

         
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4 col-sm-6 col-6">
              <div class="form-group">
                <form class="list-search-form">
                  <label><i class="bx bx-search"></i></label>
                  <input type="text" class="form-control h-40" id="textsearch"
                    name="textsearch" placeholder="Search by menu category" />

              </div>
            </div>
            <div class="col-lg-4 col-sm-2 col-2">
              <div class="form-group">
                <button type="button"
                  onclick="filter('{{route('menu-category-list',['1','1'])}}','table-list','1',$('#sort-by-name').val(),$('#sort-by-type').val(),$('#textsearch').val());return false;"
                  class="btn search_btn shadow-none">
                  Search
                </button>&nbsp;<button type="button" onclick="$('#textsearch').val(''),$('#recordonpage').val('10');getTableData('{{route('menu-category-list',['1','1'])}}', 'table-list', '1');" class="btn search_btn shadow-none">Reset</button>
                </form>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-4 ">
             
               <div class="faq-accordion p-0 float-right">
                <div class="accordion">
                  <a href="{{route('menuCategory/add')}}">
                    <button type="button" class="btn accordion-title shadow-none">
                      <i class="bx bx-plus"></i>
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <span id="table-list"></span>
      </div>
    </div>

  </div>
  <!-- End -->
 
<script type="text/javascript">
  jQuery(document).ready(function () {
    getTableData('{{route("menu-category-list",["1","1"])}}', 'table-list', '1');
    });
</script>
@endsection