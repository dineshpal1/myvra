@extends('admin.layouts.app')
@section('content')

  <!-- Breadcrumb Area -->
  <div class="breadcrumb-area">
    <h1>Home</h1>
    <ol class="breadcrumb">
      <li class="item">
        <a href="{{route('vendor')}}"><i class="bx bx-user-circle"></i></a>
      </li>

     
      <li class="item">Vendors</li>
    </ol>
  </div>
<!----->
@if (session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-success text-center">
        {{ session('error') }}
    </div>
@endif
<!----->
  <!-- Start -->
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card mb-30">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3>Vendors</h3>

          <div class="dropdown">
            <button class="dropdown-toggle" type="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="bx bx-dots-horizontal-rounded"></i>
            </button>
            <div class="dropdown-menu">
              <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                  <i class="bx bx-show"></i> View
                </a> -->
                <a class="dropdown-item d-flex align-items-center"  href="javascript:void(0)" onclick="applyAction('{{route('vendor-action')}}','active','{{route('vendor-list', ['1'])}}','table-list','1');">
                  <i class="bx bx-check-circle"></i> Active
                </a>
                <a class="dropdown-item d-flex align-items-center"  href="javascript:void(0)" onclick="applyAction('{{route('vendor-action')}}','inactive','{{route('vendor-list', ['1'])}}','table-list','1');">
                  <i class="bx bx-minus-circle"></i> Inactive
                </a>
                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)" onclick="applyAction('{{route('vendor-action')}}','delete','{{route('vendor-list', ['1'])}}','table-list','1');">
                  <i class="bx bx-trash"></i> Delete
                </a>
              <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                  <i class="bx bx-printer"></i> Print
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <i class="bx bx-download"></i> Download
                </a> -->
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4 col-sm-6 col-6">
              <div class="form-group">
                <form class="list-search-form">
                  <label><i class="bx bx-search"></i></label>
                  <input type="text" class="form-control h-40" id="textsearch"
                    name="textsearch" placeholder="Search by vendor name/email/branch" />

              </div>
            </div>
            <div class="col-lg-4 col-sm-2 col-2">
              <div class="form-group">
                <button type="button"
                  onclick="filter('{{route('vendor-list',['1','1'])}}','table-list','1',$('#sort-by-name').val(),$('#sort-by-type').val(),$('#textsearch').val());return false;"
                  class="btn search_btn shadow-none">
                  Search
                </button>&nbsp;<button type="button" onclick="$('#textsearch').val(''),$('#recordonpage').val('10');getTableData('{{route('vendor-list',['1','1'])}}', 'table-list', '1');" class="btn search_btn shadow-none">Reset</button>
                </form>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-4">
              <div class="faq-accordion p-0 float-right">
                <div class="accordion">
                  <a href="{{route('vendor/add')}}">
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
    getTableData('{{route("vendor-list",["1","1"])}}', 'table-list', '1');
    });
</script>

@endsection