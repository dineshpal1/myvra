<div class="card-body">
    <div class="container-table100 bg-transparent p-0">
        <div class="wrap-table100 w-100">
            <div class="table100 table-admin table-local">
                <table>
                    <thead>
                        <tr class="table100-head">

                            <th class="column4">
                                <div class="checkbox">
                                    <input class="inp-cbx master" id="cbx-all"
                                        onclick="($(this).is(':checked',true))? $('.sub_chk').prop('checked', true):$('.sub_chk').prop('checked', false)"
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
                                onclick="filter('{{route('customer-list',['1','1'])}}','table-list','1','customer_code','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Customer ID#
                                @if($argOrderIn == 'customer_code')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                            <th class="column4"
                                onclick="filter('{{route('customer-list',['1','1'])}}','table-list','1','customer_name','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Customer Details
                                @if($argOrderIn == 'customer_name')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                            <!---city and state name start----->
                            <th class="column4"
                                onclick="filter('{{route('customer-list',['1','1'])}}','table-list','1','city','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Customer city
                                @if($argOrderIn == 'city')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>

                            <th class="column4"
                                onclick="filter('{{route('customer-list',['1','1'])}}','table-list','1','state_id','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Customer State
                                @if($argOrderIn == 'state_id')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                            <!----city and state name end---->    
                            <th class="column4"
                                onclick="filter('{{route('customer-list',['1','1'])}}','table-list','1','restaurant_name','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Restaurant Details
                                @if($argOrderIn == 'restaurant_name')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                            {{-- <th class="column4"
                                onclick="filter('{{route('customer-list',['1','1'])}}','table-list','1','customer_name','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                            Assigned Employee
                            @if($argOrderIn == 'customer_name')
                            @if($orderBy == 'desc')
                            <i class="bx bx-sort-up"></i>
                            @elseif($orderBy == 'asc')
                            <i class="bx bx-sort-down"></i>
                            @endif
                            @endif
                            </th> --}}
                            {{-- <th class="column4">Country</th> --}}
                            <th class="column4"
                                onclick="filter('{{route('customer-list',['1','1'])}}','table-list','1','created_at','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
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
                                onclick="filter('{{route('customer-list',['1','1'])}}','table-list','1','is_active','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
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

                        <tr>
                            <td class="column4">
                                <div class="checkbox">
                                    <input class="inp-cbx sub_chk"
                                        id="cbx-all{{$objData->id}}"
                                        data-id="{{$objData->id}}" type="checkbox"
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
                            <td class="column4">
                                 <a href="{{route('customer/edit',['id'=>$objData->id])}}">
                                {{$objData->customer_code}}
                                </a>
                            </td>
                            <td class="column4">
                                <div class="media text-break">

                                    <div class="media-body">
                                        <div
                                            class="d-flex align-items-start justify-content-start">
                                            <a href="{{route('customer/view',['id'=>$objData->id])}}"
                                                class="text-dark-75 font-weight-bolder h6 mb-0 mr-2">
                                                {{$objData->customer_name}}
                                            </a>
                                            <a href="{{route('customer/edit',['id'=>$objData->id])}}"
                                                class="text-dark-75 font-weight-bolder h6 mb-0 mr-2 edit-icon"
                                                data-toggle="tooltip"
                                                data-placement="top" title="Edit"
                                                style="color: #9e9e9e!important;"><i
                                                    class="bx bx-edit"></i></a>
                                            <a href="javascript:void(0)"
                                                onclick="deleteRequest('{{route('customer/delete',['id'=>$objData])}}',{{$objData->id}},'{{route('customer-list', ['1'])}}','table-list','1')"
                                                class="text-dark-75 font-weight-bolder h6 mb-0 mr-2 edit-icon"
                                                data-toggle="tooltip"
                                                data-placement="top" title="Delete"
                                                style="color: #9e9e9e!important;"><i
                                                    class="bx bx-trash"></i></a>
                                        </div>
                                        <div class="d-flex">
                                            <p class="mb-0 text-capitalize">

                                                {{$objData->email}}
                                            </p>
                                        </div>
                                        <div class="d-flex">
                                            <p class="mb-0 text-capitalize">

                                                {{$objData->phone}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="column4">
                                {{$objData->city}}
                            </td>
                             <td class="column4">
                                {{$objData->state->state_name}}
                            </td>

                            <td class="column4">
                                <div class="media text-break">

                                    <div class="media-body">
                                        <div
                                            class="d-flex align-items-start justify-content-start">
                                            <a href="#"
                                                class="text-dark-75 font-weight-bolder h6 mb-0 mr-2">
                                                {{$objData->restaurant_name}}
                                            </a>
                                        </div>
                                        <div class="d-flex">
                                            <p class="mb-0 text-capitalize">

                                                {{$objData->restaurant_address}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="column4">
                                {{\App\Shared\Common::changeDateFormat($objData->created_at,'M d, Y')}}
                            </td>

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
                    onclick="getTableData('{{route('customer-list',[(($varTotalNoOfPages * ($argSlot - 1)) - ($varTotalNoOfPages) + 1), ($argSlot - 1), $argSearchValue])}}','table-list','1')"
                    title="previous page">&#10094;</button>
            </li>
            @for ($i = 1; $i <= $varPaginationCount; $i++) @php $varPageNo=($i +
                (($varTotalNoOfPages * ($argSlot - 1))));
                $varActiveClass=($varPageNo==$argPageno) ? 'active' : '' ; @endphp
                <li>
                <button type="button" class="{{$varActiveClass}}"
                    onclick="getTableData('{{route('customer-list',[$varPageNo, $argSlot, $argSearchValue])}}','table-list','1')"
                    title="page 1">{{$varPageNo}}</button>
                </li>

                @endfor
                <li>
                    <button class="next"
                        {{$varRecordsForNext < $varTotal ? '' : 'disabled'}}
                        title="next page"
                        onclick="getTableData('{{route('customer-list',[(($varTotalNoOfPages * ($argSlot)) + 1), ($argSlot + 1), $argSearchValue])}}','table-list','1')">&#10095;</button>
                </li>
        </ul>
    </div>
    @else
    <tr>
        <td class="column4">No Data Found !!</td>
    </tr>
    @endif
</div>