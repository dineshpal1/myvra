<div class="card-body">
    <div class="container-table100 bg-transparent p-0">
        <div class="wrap-table100 w-100">
            <div class="table100 table-admin table-local">
                <table>

                    <thead>
                        <tr class="table100-head">

                            <th class="column4">
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
                            <th class="column4"
                                onclick="filter('{{route('menu-item-list',['1','1'])}}','table-list','1','menu_item_vendor_name','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Menu Item Vendor Name
                                @if($argOrderIn == 'menu_item_vendor_name')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>

                            <th class="column4"
                                onclick="filter('{{route('menu-item-list',['1','1'])}}','table-list','1','menu_item_name','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Menu Item Name
                                @if($argOrderIn == 'menu_item_name')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>

                              <th class="column4"
                                onclick="filter('{{route('menu-item-list',['1','1'])}}','table-list','1','menu_item_code','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Menu Item Code
                                @if($argOrderIn == 'menu_item_code')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>



                            
                            <th class="column4"
                                onclick="filter('{{route('menu-item-list',['1','1'])}}','table-list','1','menu_name','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                               Menu Name
                                @if($argOrderIn == 'menu_name')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                            

                              <th class="column4"
                                onclick="filter('{{route('menu-item-list',['1','1'])}}','table-list','1','vendor_name','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                               Vendor Name
                                @if($argOrderIn == 'vendor_name')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                            <th class="column4"
                                onclick="filter('{{route('menu-item-list',['1','1'])}}','table-list','1','item_title','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                               Item Title
                                @if($argOrderIn == 'item_title')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                             <th class="column4"
                                onclick="filter('{{route('menu-item-list',['1','1'])}}','table-list','1','menu_category_name','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Menu Category Name 
                                @if($argOrderIn == 'menu_category_name')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th> 
                            {{-- <th class="column4">Country</th> --}}
                          
                             <th class="column4"
                                onclick="filter('{{route('menu-item-list',['1','1'])}}','table-list','1','category','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Category
                                @if($argOrderIn == 'category')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                           <th class="column4"
                                onclick="filter('{{route('menu-item-list',['1','1'])}}','table-list','1','created_at','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Created At
                                @if($argOrderIn == 'created_at')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                     
                        @if (!empty($arrRecords[0]))
                        <?php //echo "<pre>"; print_r($arrRecords);die;?>
                        @foreach ($arrRecords as $key=> $objData)
                        <tr id="tr_{{$objData->id}}">
                            <td class="column4">
                                <div class="checkbox">
                                    <input class="inp-cbx sub_chk" id="cbx-all{{$objData->id}}" data-id="{{$objData->id}}" 
                                    type="checkbox" style="display: none;" />
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
                            <td class="column4">
                                {{--<a href="{{route('vendor/view',['id'=>$objData->id])}}"
                                    class="name">{{$objData->vendor_name}}</a>--}}
                                <a href="{{route('menu_item_edit',['id'=>$objData->id])}}"
                                    class="d-inline-block text-success mr-3 edit-icon"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Edit" style="color: #9e9e9e!important;"><i
                                        class="bx bx-edit"></i></a>
                                <a href="javascript:void(0)"
                                    onclick="deleteRequest('{{route('menu_item_delete',['id'=>$objData->id])}}',{{$objData->id}},'{{route('menu-item-list', ['1'])}}','table-list','1')"
                                    class="d-inline-block text-danger edit-icon"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Delete"
                                    style="color: #9e9e9e!important;"><i
                                        class="bx bx-trash"></i></a>
                                {{--<a href="{{route('vendor-item',['vnId'=>$objData->id])}}"
                                    class="d-inline-block text-danger edit-icon"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Items"
                                    style="color: #9e9e9e!important;"><i
                                        class="bx bx-list-ul"></i></a>--}}
                                        
                            </td>
                          
                            <td class="column4">{{$objData->menu_item_vendor_name}}
                            </td>
                            {{--
                            <td class="column4">{{$objData->contact_email}}
                            </td>
                            --}}
                             <td class="column4">{{$objData->menu_item_name}}
                            </td>
                            <td class="column4">{{$objData->menu_item_code}}
                            </td>

                            

                            <td class="column4">
                                {{\App\Shared\Common::changeDateFormat($objData->created_at,'M d, Y')}}
                            </td>
                            {{-- @php
                            echo '<pre>';
                                print_r($objData);
                                die('');
                            @endphp --}}
                            <td class="column4">{{$objData->menu}}
                            </td>
                            <td class="column4">{{$objData->vendor}}
                            </td>
                            <td class="column4">{{$objData->item}}
                            </td>
                              <td class="column4">{{$objData->category}}
                            </td>
                            {{-- <td class="column4">
                                {{\App\Shared\Common::changeDateFormat($objData->updated_at,'M d, Y')}}
                            </td> --}}
                            {{--}}
                            @if ($objData->is_active=='1')
                            <td class="column4"> 
                                <span class="badge badge-success">{{\App\Shared\Common::getActiveStatus($objData->is_active)}}</span>
                            </td>

                            @else
                            <td class="column4"><span
                                    class="badge badge-danger">{{\App\Shared\Common::getActiveStatus($objData->is_active)}}</span>
                            </td>
                            @endif
                          --}}
                            <td class="column4">
                             
                            </td>    

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="pagination__wrapper">
        <ul class="pagination">
            <li>
                <button class="prev" {{ $argSlot > 1 ? "" : "disabled"}}
                    onclick="getTableData('{{route('menu-item-list',[(($varTotalNoOfPages * ($argSlot - 1)) - ($varTotalNoOfPages) + 1), ($argSlot - 1), $argSearchValue])}}','table-list','1')"
                    title="previous page">&#10094;</button>
            </li>
            @for ($i = 1; $i <= $varPaginationCount; $i++) @php $varPageNo=($i +
                (($varTotalNoOfPages * ($argSlot - 1))));
                $varActiveClass=($varPageNo==$argPageno) ? 'active' : '' ; @endphp
                <li>
                <button type="button" class="{{$varActiveClass}}"
                    onclick="getTableData('{{route('menu-item-list',[$varPageNo, $argSlot, $argSearchValue])}}','table-list','1')"
                    title="page 1">{{$varPageNo}}</button>
                </li>

                @endfor
                <li>
                    <button class="next" {{$varRecordsForNext < $varTotal ? '' : 'disabled'}} title="next page"  onclick="getTableData('{{route('menu-item-list',[(($varTotalNoOfPages * ($argSlot)) + 1), ($argSlot + 1), $argSearchValue])}}','table-list','1')">&#10095;</button>
                </li>
        </ul>
    </div>
    @else
    <tr>
        <td class="column4">No Data Found !!</td>
    </tr>
    @endif
</div>
