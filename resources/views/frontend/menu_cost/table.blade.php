<div class="card-body">
    <div class="container-table100 bg-transparent p-0">
        <div class="wrap-table100 w-100">
            <div class="table100 table-admin table-local ">
                <table class="table-bordered">

                    <thead>
                        <tr class=" bg-dark text-white">

                           
                            <th class="column4"> Menu Item Category </th>     
                             <th class="column4"> Menu Item</th>
                             <th class="column4">Current Cost</th>
                             <th class="column4"> Cost (%)</th>
                             <th class="column4">Contribution</th>
                             <th class="column4">Sell Price</th>
                             <th class="column4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                          @if (!empty($data))
                           @foreach ($data as $key=> $objData)
                           <div class="col-sm-12 " id="statusapprovaladmin">
                        <tr >
                            
                          
                         <td class="column4">{{$objData->menu_category_name}}</td>
                         <td class="column4">{{$objData->menu_name}}</td>
                         <td class="column4">{{"$".$objData->menu_cost}} </td>
                         <td class="column4">{{$objData->menu_cost_percentage}}</td>
                        <td class="column4">{{$objData->menu_contribution}}</td>  
                        <td class="column4">{{"$".$objData->menu_selling_price}}</td>
                         <td class="column4">

                         {{--<td class="column4">{{$objData->menu_category_name}}</td>
                         <td class="column4">{{$objData->menu_item_name}}</td>
                         <td class="column4">{{"$".$objData->menu_cost}} </td>
                         <td class="column4">{{$objData->menu_cost_percentage}}</td>
                        <td class="column4">{{$objData->menu_contribution}}</td>  
                        <td class="column4">{{"$".$objData->menu_selling_price}}</td> <td class="column4">--}}
                              <a href="{{route('menu_edit',['id'=>$objData->id])}}">Edit </a> |
                              <!--<a href="javascript:void(0)" onclick="window.print()">Print </a> | --> 
                               <!--<a href="{{route('print',['id'=>$objData->id])}}" class="printItem" >Print </a> | -->
                               <a href="{{route('print',['id'=>$objData->id])}}" id="btnprn btn">Print</a>|
                               <!--<a href="#">Delete </a> --> 
                               <a href="javascript:void(0)"
                                    onclick="deleteRequest('{{route('menu_delete',['id'=>$objData->id])}}',{{$objData->id}},'{{route('menu-cost-list', ['1'])}}','table-list','1')">Delete </a>
                                    
                                           
                            </td>   
                                </tr>
                                </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
    @else 
    <tr>
        <td class="column4">No Data Found !!</td>
    </tr>
    @endif


                            
                            
</div>

                        
                               
                            

                          
                               
                            
                          
                            
                     