@extends('admin.layouts.app')
@section('content')
<style>
  .sideform{
    justify-content: space-between;
  }
  .sideform form input.form-control{
   width: 227px;
  margin-right: 20px;
  }
  .sideform form button{
   height: 38px;
   background-color: #909090 !important;
  }
</style>
<!-- Breadcrumb Area -->
<div class="breadcrumb-area">
  <h1>Home</h1>
  <ol class="breadcrumb">
    <li class="item">
      <a href="{{route('vendor')}}"><i class="bx bx-user-circle"></i></a>
    </li>

    <li class="item">
      <a href="{{route('vendor')}}">Vendors</a></li>
    <li class="item">Vendor Items</li>
    {{-- <li class="item">Vendor Name</li> --}}
  </ol>
</div>
<!-----success message start--------->
@if (session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif
<!-----success message end--------->
<!-----import error message start-->
@if ($errors->import->any())
  <div class="alert alert-danger">
    The imported file has following errors in <strong>line {{ session('error_line') }}</strong>:
      <ul>
        @foreach ($errors->import->all() as $message)
          <li>{{ $message }}</li>
        @endforeach
      </ul>
    </div>
@endif

@if(session()->has('extension_errors'))
    <div class="alert alert-danger">
        {{ session()->get('extension_errors') }}
    </div>
@endif

{{--
@if(session()->has('heading_errors'))
    <div class="alert alert-danger">
     
        {{ session()->get('heading_errors') }}
      
    </div>
@endif--}}
@if ($errors->heading_errors->any())
  <div class="alert alert-danger">
    
      <ul>
        @foreach ($errors->heading_errors->all() as $message)
          <li>{{ $message}}</li>
        @endforeach
      </ul>
    </div>
@endif
<!-----import error message end--------->
<!-- Start -->
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="card mb-30">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Vendor Items</h3>

        <div class="dropdown">
          <button class="dropdown-toggle" type="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-horizontal-rounded"></i>
          </button>
          <div class="dropdown-menu">
            <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                  <i class="bx bx-show"></i> View
                </a> -->
            <a class="dropdown-item d-flex align-items-center"
              href="javascript:void(0)"
              onclick="applyAction('{{route('vendor-item-action')}}','active','{{route('vendor-item-list', [$argId??'','1','1'])}}','table-list','1');">
              <i class="bx bx-check-circle"></i> Active
            </a>
            <a class="dropdown-item d-flex align-items-center"
              href="javascript:void(0)"
              onclick="applyAction('{{route('vendor-item-action')}}','inactive','{{route('vendor-item-list', [$argId??'','1','1'])}}','table-list','1');">
              <i class="bx bx-minus-circle"></i> Inactive
            </a>
            <a class="dropdown-item d-flex align-items-center"
              href="javascript:void(0)"
              onclick="applyAction('{{route('vendor-item-action')}}','delete','{{route('vendor-item-list', [$argId??'','1','1'])}}','table-list','1');">
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
                  name="textsearch" placeholder="Search by item name/code" />

            </div>
          </div>
          <div class="col-lg-3 col-sm-2 col-2">
            <div class="form-group">
              <button type="button"
                onclick="filter('{{route('vendor-item-list',[$argId??'0','1','1'])}}','table-list','1',$('#sort-by-name').val(),$('#sort-by-type').val(),$('#textsearch').val());return false;"
                class="btn search_btn shadow-none">
                Search
              </button>&nbsp;<button type="button"
                onclick="$('#textsearch').val(''),$('#recordonpage').val('10');getTableData('{{route('vendor-item-list',[$argId??'0','1','1'])}}', 'table-list', '1');"
                class="btn search_btn shadow-none">Reset</button>
              </form>
            </div>
           
          </div>
        
          <div class="col-lg-5 col-sm-4 col-4 d-flex sideform">
          <form action="{{route('venodritem-import')}}" method="POST" enctype="multipart/form-data" class="d-flex ">
             {{ csrf_field() }}
              <input type="file" name="file" class="form-control" required id="upload">
            
             
              <br>
            
              <button type="submit" class="btn btn-success">Import</button>
          </form>
            <div class="faq-accordion p-0 float-right">
              <div class="accordion">
                <a href="{{route('vendor-item/add',['vnId'=>$argId??''])}}">
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
    getTableData('{{route("vendor-item-list",[($argId??''),"1","1"])}}', 'table-list', '1');
    });
</script>

@endsection