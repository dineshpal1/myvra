
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

<!-----success message start--------->
@if (session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif
@if (session('errorMsg'))
    <div class="alert alert-danger text-center">
        {{ session('success') }}
    </div>
@endif
<!-----success message end--------->


  <!-- Start -->
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card mb-30">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3>ADD NEW MENU ITEM</h3>
          </div>
           <!-------form start here-------->   
            <form id="add-menu-item-page" method="POST" action="{{route('menucost_add_menu')}}" class="form-horizontal">
             <div class="form-group row ">    
             <span class="control-label col-lg-3">Menu Item Category :</span>
             <div class="col-lg-4">  
                     <select class="form-control" name="category" id="category">
                      <option value="">-select category-</option>
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->menu_category_name}}</option>
                      @endforeach
                     </select>
                      </div>
                      <a href="#">
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                      ADD NEW CATEGORY
                    </button>
                  </a>
                   </div>

                   <div class="from-group row mb-3">
                     <label class="control-label col-lg-3" for="pwd"> Enter Menu Item Title:</label>
                   <div class="col-lg-4">  
                    <input type="text" class="form-control span" name="menu_item_title" id="menu_item_title" placeholder="Enter menu item title"/>
                  </div>
                   </div>


                   <div class="from-group row mb-3">
                   <label class="control-label col-lg-3" for="pwd"> Enter Cooking Instructions:</label>
                    <div class="col-lg-4">  
                      <textarea class="form-control" name="discription" rows="4" cols="20" id="discription" value="{{old('discription')}}">
                       </textarea>
                  </div>
                   </div>             

                  <div class="from-group row mb-3">
                   <label class="control-label col-lg-3" for="pwd"> Upload Photo:</label>
                    <div class="col-lg-4">  
                     <input type="file" class="form-control" name="recipe_image" id="recipe_image" />
                  </div>
                   </div>             
              <!----for add item advance search add custom item and reset price start here---->          
          <div class="card-body">
                <form class="list-search-form">
          <div class="row align-items-center">
            <div class="col-lg-4 col-sm-6 col-6">
              <div class="form-group">
                  <label class="position-absolute mb-0" style="top: 0;width: 30px;    height: 45px;    font-size: 20px;    text-align: center;    line-height: 45px;"><i class="bx bx-search"></i></label>
                  <input type="text" class="form-control h-40 pl-4" id="textsearch"
                    name="textsearch" placeholder="Enter Item code to search"  />

              </div>
            </div>
            <div class="col-lg-4 col-sm-2 col-2">
              <div class="form-group">
                <button type="button" class="btn btn-info btn-sm" id="addItem">Add Item</button>&nbsp;OR
                  <!--<input  type="button" class="btn btn-info btn-sm" name="srchbtn" id="srchbtn" onclick="searchItemCode(document.getElementById('textsearch').value);" value="Add Item">&nbsp;OR-->
                
                  &nbsp;<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#mySearchModal">Advance Search</button>
              <!--  </form>-->
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-4 ">
              <div class="faq-accordion p-0 float-right">
                <div class="accordion">
              <a  href="#">
            &nbsp; <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myCustomeModal">Add Custom Item</button>  
            </a> 
            </div>
            </div>        
               <div class="faq-accordion p-0 float-right">
                <div class="accordion">
                  <a href="##">
                   <button type="button" class="btn btn-info btn-sm ">
                      Reset Ideal Cost
                    </button>
                  </a>
                </div>
              </div>
            </div>
              <!----for add item advance search  end here---->
                        <div class="col-lg-12">
            
              <table class="table table-bordered" id="userTable">
                <thead>
                  <tr class="bg-dark text-white">
                    <th>Ingredient</th>
                     <th>ItemCode#</th>
                     <th>Supplier</th>
                     <th>Portion</th>
                     <th>UOM</th>
                     <th>Yield(%)</th>
                     <th>Cost</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
                {{-- <span id="addMenuItem"></span>
                <span id="addRecipeItem"></span> --}}
                <tbody>
                  <tr>
                  <td colspan="7">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRecipe">Add Item From Recipe</button>
                  </td>
                </tr>
                <tr>
                  <td colspan="6" class="text-right" style="vertical-align: middle;">
                    <label class="mb-0 font-weight-bold">Cost</label>
                  </td>
                  <td style="width:150px">
                    <div class="form-group mb-0 d-flex align-items-center">
                    <span class="mr-1">$</span>
                    <input type="number" name="cost" id="cost" class="form-control">
                    </div>
                  </td>
                </tr>

                 <tr>
                  <td colspan="6" class="text-right" style="vertical-align: middle;">
                    <label class="mb-0 font-weight-bold">Sell Price</label>
                  </td>
                  <td style="width:150px">
                    <div class="form-group mb-0 d-flex align-items-center">
                      <span class="mr-1">$</span>
                      <input type="number" name="sell_price" id="sell_price" class="form-control">
                    </div>
                  </td>
                </tr>

                 <tr>
                  <td colspan="6" class="text-right" style="vertical-align: middle;">
                    <label class="mb-0 font-weight-bold">Cost %</label>
                  </td>
                  <td style="width:150px">
                    <div class="form-group mb-0 d-flex align-items-center">
                      <span class="mr-1"></span>
                      <input type="number" name="cost_percent" id="cost_percent" class="form-control">
                    </div>
                  </td>
                </tr>

                  <tr>
                  <td colspan="6" class="text-right" style="vertical-align: middle;">
                    <label class="mb-0 font-weight-bold">Contribution</label>
                  </td>
                  <td style="width:150px">
                    <div class="form-group mb-0 d-flex align-items-center">
                      <span class="mr-1">$</span>
                      <input type="number" name="contribution" id="contribution" class="form-control">
                    </div>
                  </td>
                </tr>
                </tbody>
              </table>
                    <!------------------->
                    <div class="row">
                    <div class="col text-center">
                     <button type="submit" id="add-menu-item-btn" form_id="add-menu-item-page" class="btn btn-danger add_btn">
                        SAVE MENU
                    </button>
                <a href="{{route('menu-cost')}}">
                    <button type="button" class="btn btn-dark cancel_btn"
                        data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i> CANCEL
                    </button>
                </a>
              </div>
            </div>
                    <!-------------------->
              </div>


             
         </form>

       <!----form end here--->
        </div>
              
              
      </div>

    
   <!--end--->

   <!---Model for add cateory start --->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-sm">
   <div class="modal-content">
    <div class="modal-header">
       <h4 class="modal-title">Add Category</h4>
       <button type="button" class="close" data-dismiss="modal">&times;</button>
      
    </div>

       <div class="modal-body">

          <p class="bg-dark text-white">Menu Category</p>
           <form role="form" method="post" action="{{route('saveCategory')}}">
            @csrf
        
           <input type="text" name="categroy" id="category" class="form-control" placeholder="enter categroy name" required>
           
         
        </div>
        <div class="modal-footer">
           <div class="col text-center">
          <button type="submit" class="btn btn-info ">Save</button>
        </div>
        </div>
         </form>
   </div>
</div>
</div>
   <!---Model for add cateory end --->

   <!---Model for add custom item start --->
<div class="modal fade" id="myCustomeModal" role="dialog">
<div class="modal-dialog ">
   <div class="modal-content">
    <div class="modal-header">
       <h4 class="modal-title">ADD CUSTOM ITEM</h4>
       <button type="button" class="close" data-dismiss="modal">&times;</button>
      
    </div>

       <div class="modal-body">

          <p class="bg-dark text-white">Enter Item's Information</p>
           <form role="form" method="post" action="{{route('saveMenuItem')}}">
            @csrf
            <div class="from-group row mb-3">
               <label class="control-label col-lg-4"> Item Name/Title    :</label>
                <div class="col-lg-6">  
           <input type="text" name="item_name" id="item_name" class="form-control span" required>
           </div>
          </div>

           <div class="from-group row mb-3">
               <label class="control-label col-lg-4"> Item Code#   :</label>
                <div class="col-lg-6">  
           <input type="text" name="item_code" id="item_code" class="form-control span" required>
           </div>
          </div>

          <div class="from-group row mb-3">
               <label class="control-label col-lg-4"> Supplier   :</label>
                <div class="col-lg-6">  
           <input type="text" name="supplier" id="supplier" class="form-control span" required>
           </div>
          </div>


          <div class="from-group row mb-3">
               <label class="control-label col-lg-4"> Pack Size   :</label>
                <div class="col-lg-6">  
           <input type="text" name="pack_size" id="pack_size" class="form-control span" required>
           </div>
          </div>


          <div class="from-group row mb-3">
               <label class="control-label col-lg-4"> Unit of Measure   :</label>
                <div class="col-lg-6">  
           <!--<input type="text" name="item_code" id="item_code" class="form-control span" required>-->
           <select name="unit_of_measure" id="unit_of_measure" class="form-control" required>
              @foreach($measures as $measure)
              <option value="{{$measure->id}}">{{$measure->unit_name}}</option>
              @endforeach
           </select>
           </div>
          </div>

          <div class="from-group row mb-3">
               <label class="control-label col-lg-4"> Yield   :</label>
                <div class="col-lg-6">  
           <input type="number" name="yield" id="yield" class="form-control span" required>
           </div>
          </div>

           <div class="from-group row mb-3">
               <label class="control-label col-lg-4"> Price   :</label>
                <div class="col-lg-6">  
           <input type="number" name="price" id="price" class="form-control span" required>
           </div>
          </div>


        </div>
        <div class="modal-footer">
           <div class="col text-center">
          <button type="submit" class="btn btn-info">Add Item</button>
        </div>
        </div>
         </form>
   </div>
</div>
</div>
   <!---Model for add custome item end --->
<!----MODEL FOR ADD ITEM FROM RECIPE START--->

<div class="modal fade" id="addRecipe" role="dialog">
<div class="modal-dialog ">
   <div class="modal-content">
    <div class="modal-header">
       <h4 class="modal-title">ADD NEW ITEM FROM RECIPE</h4>
       <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
       <div class="modal-body">
           <form role="form" method="post" action="{{route('addRecipeItems')}}">
            @csrf
                <div class="from-group row mb-3">
               <label class="control-label col-lg-4"> Select Recipe   :</label>
                <div class="col-lg-8">  
          
           <select name="recipe" id="recipeId" class="form-control" >
              <option value="">-Select Recipe-</option>
              @foreach($recipes as $recipe)
              <option value="{{$recipe->id}}">{{$recipe->recipe_name}}</option>
              @endforeach

           </select>
           </div>
          </div>
        </div>
        <div class="modal-footer">

           <!--<div class="col text-center">
          <button type="submit" class="btn btn-info" id="addRecipeBtn">Add Recipe Items</button>
        </div>-->

        </div>
         </form>
   </div>
</div>
</div>

<!----MODEL FOR ADD ITEM FROM RECIPE END--->


<!----MODEL FOR ADVANCE SEARCH START--->

<div class="modal fade" id="mySearchModal" role="dialog" >
<div class="modal-dialog modal-xl " style="margin-left: 300px;">
  <!--<div class='modal-dialog mw-100 w-75'>-->
   <div class="modal-content">
    <div class="modal-header">
       <h4 class="modal-title">SEARCH ITEM</h4>
       <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-------------->
       <div class="panel panel-default">
         <div class="panel-heading">
          <h5 class="bg-dark text-white">Items's Information</h5>
         </div>

         <!---->
          <div class="container">
              <div class="from-group row mb-3">
               <label class="control-label col-lg-1">Search   :</label>
                <div class="col-lg-3">  
               <input type="text" class="form-control h-40 pl-4" id="search-item"
                    name="search-item"  />
          
           </div>
           <label class="control-label col-lg-2">Vendors   :</label>
           <div class="col-lg-3">  
            <select name="select_vendor" id="select_vendor" class="form-control"  >
              <option value="" >----Select----</option>
              @foreach($vendors as $vendor)
              <option value="{{$vendor->id}}">{{$vendor->vendor_name}}</option>
              @endforeach
            </select>
           </div>
        <!-------button start------->
         <!--<div class="col-lg-4 col-sm-2 col-2">-->
              <div class="form-group">
                <!--<button type="button" class="btn btn-info btn-sm" id="addItem" >Search</button>-->
                <button type="button" class="btn btn-info btn-sm" id="addItem" 
                onclick="filter('{{route('menucost_add_menu')}}','table-list','1',$('#sort-by-name').val(),$('#sort-by-type').val(),$('#search-item').val());return false;" >
                Search
               </button>

                 &nbsp;
               
                  &nbsp;
                  <!--<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#mySearchModal">clear Filter</button>-->
                  <!--<button type="button" class="btn btn-info btn-sm">clear Filter</button>-->
                  <button type="button" class="btn btn-info btn-sm"
                  onclick="$('#search-item').val(''),getTableData('{{route('menucost_add_menu')}}', 'table-list', '1');"

                  >clear Filter</button>
              <!--  </form>-->
              </div>
               <div class="col-lg-6 col-sm-2 col-2">
                ([Note : Search Item By Code, Title, Brand, Class, Pack Per Case, Size])
            </div>

        <!-------button end------->
          </div>
        </div>


         <!---->
         <hr>
       </div>

      <!--------------->
       <form role="form" method="post"  id="itemAdd" name="itemAdd">
       <div class="modal-body">
        
          <!--------table start here---------->
          <!--<div class="col-lg-12">-->
            <table width="!00%" class="table table-bordered" id="vendorTable">
              <thead>
                <tr class="bg-dark text-white">
                  <th>
                    <div class="checkbox">
                                <input class="inp-cbx master" id="cbx-all" onclick="($(this).is(':checked',true))? $('.sub_chk').prop('checked', true):$('.sub_chk').prop('checked', false)"
                                        type="checkbox" style="display: none;" />
                                    <label class="cbx" for="cbx-all">
                                        <span>
                                            <svg width="12px" height="10px"
                                                viewbox="0 0 12 10">
                                                <polyline
                                                    points="1.5 6 4.5 9 10.5 1">
                                                </polyline>
                                            </svg>
                                        </span>
                                    </label>
                                </div> 


                  </th>
                  <th>Item Code#</th>
                  <th>Item</th>
                  <th>Vendor</th>
                  <th>Brand</th>
                  <th>class</th>
                  <th>Pack Per Case</th>
                  <th>Pack Size#</th>
                  <th>UOM</th>
                </tr>
              </thead>
              <tbody>
                @if(!empty($menuItems))
                @foreach($menuItems as $key=> $objData)
                <tr>
                <td>
                     <div class="checkbox">
                                    <input class="inp-cbx sub_chk"
                                        id="cbx-all{{$objData->id}}"
                                        data-id="{{$objData->id}}"
                                        data-code="{{$objData->menu_item_code}}"
                                         type="checkbox"
                                        style="display: none;" />
                                    <label class="cbx" for="cbx-all{{$objData->id}}">
                                        <span>
                                            <svg width="12px" height="10px"
                                                viewbox="0 0 12 10">
                                                <polyline
                                                    points="1.5 6 4.5 9 10.5 1">
                                                </polyline>
                                            </svg>
                                        </span>
                                    </label>
                               </div> 

                </td>

                <td>{{$objData->menu_item_code}}</td>
                <td>{{$objData->menu_item_name}}</td>
                <td>{{$objData->vendor_name}}</td>
                <td>{{$objData->brand_name}}</td>
                <td>{{$objData->class_name}}</td>
                <td>{{$objData->pack_per_case}}</td>
                <td>{{$objData->pack_size}}</td>
                <td>{{$objData->unit_name}}</td>
             

              </tr>
              @endforeach
              </tbody>
              @else
              <tr>
                <td colspan="9">No Data Found</td>
              </tr>
              @endif
            </table>
          <!--</div>-->
          <!------------table end here-------------------->
               
        </div>
        <div class="modal-footer">

           <div class="col text-center">
          <!--<button type="submit" class="btn btn-info" id="addRecipeBtn">Select Item</button>-->
          <button type="button" class="btn btn-info" id="addSearchBtn">Select Item</button>
        </div>

        </div>
      </form>
         
   </div>
</div>
</div>

<!----MODEL FOR ADVANCE SEARCH END--->


   <script type="text/javascript">

    $(document).ready(function(){
      $('#addItem').click(function(){
        var getValue=$('#textsearch').val().trim();
        var _toekn =$('meta[name="csrf-token"]').attr('content');

       // alert(value);
       // if(value > 0)
        if(getValue !==null && getValue !=='')
        {
          fetchRecord(getValue);
        }else{
          alert("Please enter an item code to serach");
        }

     // });

    //}); 

   // url:"/pricingmodal?getid="+getid,menucost_search_item_code

        function fetchRecord(getValue)
        {
          $.ajax({
          
            url:"/menucost_search_item_code?getValue="+getValue,
           
            type:'GET',
            //data:{getValue:getValue,_toekn:_toekn},
            dataType:'json',
            success:function(response)
            {
              var len=0;
              //$('#userTable tbody').empty()  //empty<tbody>
              if(response['data'] !=null)
              {
                len=response['data'].length;
              }
              if(len > 0)
              {
                for(var i=0;i<len;i++)
                {
                  var name=response['data'][i].menu_item_name;
                  var vendorName=response['data'][i].vendor_name;
                  var code=response['data'][i].menu_item_code;
                  var portion=response['data'][i]?response['data'][i].menu_item_portion:'';
                  var unit=response['data'][i].measure_unit_id;
                  var yields=response['data'][i].menu_item_yield;
                  var cost=response['data'][i].menu_item_cost;
                  console.log(response['data']);
                  var tr_str="<tr>" +
                              "<td align='center'>"+ name +"</td>" +
                              "<td align='center'>"+ code +"</td>" +
                              "<td align='center'>"+ vendorName +"</td>" +
                              "<td align='center'>"+ portion +"</td>" +
                              "<td align='center'>"+ unit +"</td>" +
                              "<td align='center'>"+ yields +"</td>" +
                              "<td align='center'>"+ cost +"</td>" +
                              "</tr>";
                             
                  //$("#userTable tbody").append(tr_str);
                  // console.log($("#addMenuItem").find(''));
                  //$("#userTable").find('tbody').append(tr_str);
                  $("#userTable").first('tbody').append(tr_str);
                }
              }
             else{
                         var tr_str = "<tr>" +
                         //"<td align='center' colspan='6'>"+No Record Found + "</td>" +
                         "<td align='center' colspan=6>No record found.</td>" +

                         "</tr>";
                     //$("#userTable tbody").append(tr_str);
                     //$("#userTable").find('tbody')
                      //$("#addMenuItem").append(tr_str);
                      //$("#userTable").find('tbody').append(tr_str);
                    $("#userTable").first('tbody').append(tr_str);

              }
            }
          });
        }
    });
      });
   </script>

<script type="text/javascript">
   $(document).ready(function(){
  $(document).on('change','#recipeId',function(){
    //var recipe_id=$("#recipeId").val();
    var recipe_id=$("#recipeId option:selected").val();

   // alert(recipe_id);
   $.ajax({
            url:"menucost_add_recipe_items?id="+recipe_id,
            type:'GET',
            dataType:'json',
            success:function(res)
            {
              //console.log(res);
              var len=0;
              if(res['data'] !=null)
              {
                len=res['data'].length;
              }
              if(len >0)
              {
                for(var i=0; i < len; i++)
                {
                  var name=res['data'][i].recipe_item_name;
                  var vendorName=res['data'][i].vendor_name;
                  var code=res['data'][i].recipe_item_code;
                  var portion=res['data'][i]?res['data'][i].recipe_item_portion:'';
                  var unit=res['data'][i].unit_name;
                  var yields=res['data'][i].recipe_item_yield;
                  var cost=res['data'][i].recipe_item_cost;
                  console.log(res['data']);
                   var tr_str="<tr>" +
                              "<td align='center'>"+ name +"</td>" +
                              "<td align='center'>"+ code +"</td>" +
                              "<td align='center'>"+ vendorName +"</td>" +
                              "<td align='center'>"+ portion +"</td>" +
                              "<td align='center'>"+ unit +"</td>" +
                              "<td align='center'>"+ yields +"</td>" +
                              "<td align='center'>"+ cost +"</td>" +
                              "</tr>";
                            // $("#userTable").find('tbody').append(tr_str);
                             //$("#userTable").find('tbody').append(tr_str);
                             //$("#userTable").sibling('tbody').append(tr_str);
                            // $('#userTable').closest('tbody').children().append(tr_str);
                            $("#userTable").first('tbody').append(tr_str);

                }
              } else {
                         var tr_str = "<tr>" +
                         //"<td align='center' colspan='6'>"+No Record Found + "</td>" +
                         "<td align='center' colspan=6>No record found.</td>" +

                         "</tr>";
                     //$("#userTable tbody").append(tr_str);
                     //$("#userTable").find('tbody')
                      //$("#addMenuItem").append(tr_str);
                      //$("#userTable").find('tbody').append(tr_str);
                // $("#userTable").find('tbody').append(tr_str);
                 // $('#userTable').closest('tbody').children().append(tr_str);;
                 $("#userTable").first('tbody').append(tr_str);

              }
            }

   });


  });
});


</script>
@endsection

