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
                                onclick="filter('{{route('vendor-item-list',[$argId,'1','1'])}}','table-list','1','item_title','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                              Item Name
                                @if($argOrderIn == 'item_title')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>








                            <th class="column4"
                                onclick="filter('{{route('vendor-item-list',[$argId,'1','1'])}}','table-list','1','item_code','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Item Code
                                @if($argOrderIn == 'item_code')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                            {{--
                            <th class="column4"
                                onclick="filter('{{route('vendor-item-list',[$argId,'1','1'])}}','table-list','1','item_price','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Item Price
                                @if($argOrderIn == 'item_price')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                        --}}

                             <th class="column4"
                                onclick="filter('{{route('vendor-item-list',[$argId,'1','1'])}}','table-list','1','pack_size','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Size
                                @if($argOrderIn == 'pack_size')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>

                             <th class="column4"
                                onclick="filter('{{route('vendor-item-list',[$argId,'1','1'])}}','table-list','1','pack_per_case','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Pack
                                @if($argOrderIn == 'pack_per_case')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                            <th class="column4"
                                onclick="filter('{{route('vendor-item-list',[$argId,'1','1'])}}','table-list','1','vendor_id','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                               Vendor Name
                                @if($argOrderIn == 'vendor_id')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>

                             <th class="column4"
                                onclick="filter('{{route('vendor-item-list',[$argId,'1','1'])}}','table-list','1','vendor_branch','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                               Vendor Branch
                                @if($argOrderIn == 'vendor_branch')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>


                            {{-- <th class="column4">Country</th> --}}
                            <th class="column4"
                                onclick="filter('{{route('vendor-item-list',[$argId,'1','1'])}}','table-list','1','created_at','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Created At
                                @if($argOrderIn == 'created_at')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                            <th class="column4"
                                onclick="filter('{{route('vendor-item-list',[$argId,'1','1'])}}','table-list','1','is_active','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Status
                                @if($argOrderIn == 'is_active')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                            <!-- <th class="column4">Action</th> -->

                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($arrRecords[0]))
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
                                <a href="{{route('vendor-item/view',['vnId'=>$argId,'id'=>$objData->id])}}"
                                    class="name">{{$objData->item_title}}</a>
                                <a href="{{route('vendor-item/edit',['id'=>$objData->id])}}"
                                    class="d-inline-block text-success mr-3 edit-icon"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Edit" style="color: #9e9e9e!important;"><i
                                        class="bx bx-edit"></i></a>
                                <a href="javascript:void(0)"
                                    onclick="deleteRequest('{{route('vendor-item/delete',['id'=>$objData->id])}}',{{$objData->id}},'{{route('vendor-item-list', [$argId,'1','1'])}}','table-list','1')"
                                    class="d-inline-block text-danger edit-icon"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Delete"
                                    style="color: #9e9e9e!important;"><i
                                        class="bx bx-trash"></i></a>
                                        
                            </td>
                            <td class="column4">{{$objData->item_code}} 
                            </td>
                            {{--
                            <td class="column4">{{$objData->item_price}}
                            </td>
                          pack_size --}}

                              <td class="column4">{{$objData->pack_per_case}}
                              </td>
                               <td class="column4">{{$objData->pack_size}}
                              </td>
                            <td class="column4">{{\App\Models\Admin\VendorItem::getVendorName($objData->vendor_id)}}
                            </td>
                             <td class="column4">{{isset($objData->vendor_branch)?$objData->vendor_branch:'N/A'}}
                            </td>
                            <td class="column4">
                                {{\App\Shared\Common::changeDateFormat($objData->created_at,'M d, Y')}}
                            </td>
                            {{-- <td class="column4">
                                {{\App\Shared\Common::changeDateFormat($objData->updated_at,'M d, Y')}}
                            </td> --}}
                            @if ($objData->is_active=='1')
                            <td class="column4"> <span
                                    class="badge badge-success">{{\App\Shared\Common::getActiveStatus($objData->is_active)}}</span>
                            </td>

                            @else
                            <td class="column4"><span
                                    class="badge badge-danger">{{\App\Shared\Common::getActiveStatus($objData->is_active)}}</span>
                            </td>
                            @endif

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
                    onclick="getTableData('{{route('vendor-item-list',[($argId),(($varTotalNoOfPages * ($argSlot - 1)) - ($varTotalNoOfPages) + 1), ($argSlot - 1), $argSearchValue])}}','table-list','1')"
                    title="previous page">&#10094;</button>
            </li>
            @for ($i = 1; $i <= $varPaginationCount; $i++) @php $varPageNo=($i +
                (($varTotalNoOfPages * ($argSlot - 1))));
                $varActiveClass=($varPageNo==$argPageno) ? 'active' : '' ; @endphp
                <li>
                <button type="button" class="{{$varActiveClass}}"
                    onclick="getTableData('{{route('vendor-item-list',[$argId,$varPageNo, $argSlot, $argSearchValue])}}','table-list','1')"
                    title="page 1">{{$varPageNo}}</button>
                </li>

                @endfor
                <li>
                    <button class="next" {{$varRecordsForNext < $varTotal ? '' : 'disabled'}} title="next page"  onclick="getTableData('{{route('vendor-item-list',[($argId),(($varTotalNoOfPages * ($argSlot)) + 1), ($argSlot + 1), $argSearchValue])}}','table-list','1')">&#10095;</button>
                </li>
        </ul>
    </div>
    @else
    <tr>
        <td class="column4">No Data Found !!</td>
    </tr>
    @endif
</div>