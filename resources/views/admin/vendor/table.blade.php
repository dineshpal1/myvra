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
                                onclick="filter('{{route('vendor-list',['1','1'])}}','table-list','1','vendor_name','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Vendor Name
                                @if($argOrderIn == 'vendor_name')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>

                           {{-- <th class="column4"
                                onclick="filter('{{route('vendor-list',['1','1'])}}','table-list','1','vendor_branch','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Vendor Branch
                                @if($argOrderIn == 'vendor_branch')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th> --}}

                              <th class="column4"
                                onclick="filter('{{route('vendor-list',['1','1'])}}','table-list','1','vendor_address','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Vendor Address
                                @if($argOrderIn == 'vendor_address')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>



                            {{--
                            <th class="column4"
                                onclick="filter('{{route('vendor-list',['1','1'])}}','table-list','1','contact_email','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                               Contact Email
                                @if($argOrderIn == 'contact_email')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                            --}}

                              <th class="column4"
                                onclick="filter('{{route('vendor-list',['1','1'])}}','table-list','1','city','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                               City
                                @if($argOrderIn == 'city')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                            <th class="column4"
                                onclick="filter('{{route('vendor-list',['1','1'])}}','table-list','1','contact_number','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                               Contact Number
                                @if($argOrderIn == 'contact_number')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                            {{-- <th class="column4">Country</th> --}}
                            <th class="column4"
                                onclick="filter('{{route('vendor-list',['1','1'])}}','table-list','1','created_at','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Created At
                                @if($argOrderIn == 'created_at')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                            {{-- <th class="column4"
                                onclick="filter('{{route('vendor-list',['1','1'])}}','table-list','1','updated_at','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Updated At
                                @if($argOrderIn == 'updated_at')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th> --}}
                            <th class="column4"
                                onclick="filter('{{route('vendor-list',['1','1'])}}','table-list','1','is_active','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Status
                                @if($argOrderIn == 'is_active')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                              <th class="column4"
                                onclick="filter('{{route('vendor-list',['1','1'])}}','table-list','1','is_active','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Current Status
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
                                <a href="{{route('vendor/view',['id'=>$objData->id])}}"
                                    class="name">{{$objData->vendor_name}}</a>
                                <a href="{{route('vendor/edit',['id'=>$objData->id])}}"
                                    class="d-inline-block text-success mr-3 edit-icon"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Edit" style="color: #9e9e9e!important;"><i
                                        class="bx bx-edit"></i></a>
                                <a href="javascript:void(0)"
                                    onclick="deleteRequest('{{route('vendor/delete',['id'=>$objData->id])}}',{{$objData->id}},'{{route('vendor-list', ['1'])}}','table-list','1')"
                                    class="d-inline-block text-danger edit-icon"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Delete"
                                    style="color: #9e9e9e!important;"><i
                                        class="bx bx-trash"></i></a>
                                <a href="{{route('vendor-item',['vnId'=>$objData->id])}}"
                                    class="d-inline-block text-danger edit-icon"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Items"
                                    style="color: #9e9e9e!important;"><i
                                        class="bx bx-list-ul"></i></a>
                                        
                            </td>
                            <td class="column4">{{$objData->vendor_branch}}
                            </td>
                            {{--
                            <td class="column4">{{$objData->contact_email}}
                            </td>
                            --}}
                             <td class="column4">{{$objData->city}}
                            </td>
                            <td class="column4">{{$objData->contact_number}}
                            </td>
                            <td class="column4">
                                {{\App\Shared\Common::changeDateFormat($objData->created_at,'M d, Y')}}
                            </td>
                            {{-- <td class="column4">
                                {{\App\Shared\Common::changeDateFormat($objData->updated_at,'M d, Y')}}
                            </td> --}}
                            @if ($objData->is_active=='1')
                            <td class="column4"> 
                                <span class="badge badge-success">{{\App\Shared\Common::getActiveStatus($objData->is_active)}}</span>
                            </td>

                            @else
                            <td class="column4"><span
                                    class="badge badge-danger">{{\App\Shared\Common::getActiveStatus($objData->is_active)}}</span>
                            </td>
                            @endif
                          
                            <td class="column4">
                              <button class="btn btn-success btn-default" onclick="$('#selected_vendor_id').val({{$objData->id}})" style="background-color: #D5DBDB  !important;" data-id="{{$objData->id}}" data-toggle="modal" id="stus_{{$objData->is_active}}" data-target="#modalForm2" style="padding-top: 2px;
                               height: 21px;">
                              <?php if($objData->is_active==0)
                              {
                                    echo "<b style='background-color: #334BFF !important;'>";
                                    echo "PENDING";
                                    echo "</b>";
                                 }elseif($objData->is_active==1)
                               {
                                    echo "<b style='background-color: #FF3333 !important;'>";
                                    echo "APPROVED";
                                    echo "</b>";
                               }else
                               {
                                    echo "<b style='background-color: #33FF5D !important;'>";
                                    echo "REJECT"; echo "</b>";
                               }
                              ?>
                                </button>
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
                    onclick="getTableData('{{route('vendor-list',[(($varTotalNoOfPages * ($argSlot - 1)) - ($varTotalNoOfPages) + 1), ($argSlot - 1), $argSearchValue])}}','table-list','1')"
                    title="previous page">&#10094;</button>
            </li>
            @for ($i = 1; $i <= $varPaginationCount; $i++) @php $varPageNo=($i +
                (($varTotalNoOfPages * ($argSlot - 1))));
                $varActiveClass=($varPageNo==$argPageno) ? 'active' : '' ; @endphp
                <li>
                <button type="button" class="{{$varActiveClass}}"
                    onclick="getTableData('{{route('vendor-list',[$varPageNo, $argSlot, $argSearchValue])}}','table-list','1')"
                    title="page 1">{{$varPageNo}}</button>
                </li>

                @endfor
                <li>
                    <button class="next" {{$varRecordsForNext < $varTotal ? '' : 'disabled'}} title="next page"  onclick="getTableData('{{route('vendor-list',[(($varTotalNoOfPages * ($argSlot)) + 1), ($argSlot + 1), $argSearchValue])}}','table-list','1')">&#10095;</button>
                </li>
        </ul>
    </div>
    @else
    <tr>
        <td class="column4">No Data Found !!</td>
    </tr>
    @endif
</div>
<!-----------------model--------------------------->
<div class="modal fade" id="modalForm2" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Vendor Status Pending/Approved/Merge</h4>

                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
<!--                 <p class="statusMsg"></p>
 -->              <!--   <form role="form" > -->
              <form role="form" method="post" action="{{route('vendor/merge')}}">
              @csrf
                  <div class="row">
                    <div class="form-check">
                     <label for="name">VENDOR CURRENT STATUS</label>
                     <br>
                     <input type="hidden" name="vendorid" id="selected_vendor_id" value="">
                        <label class="form-radio-label">
                        <input class="form-radio-input" type="radio" name="current_status" id="pending" value="0" checked="checked">
                        <span class="form-radio-sign">Pending</span>
                        </label>
                        <label class="form-radio-label ml-3">
                        <input class="form-radio-input" type="radio" name="current_status" id="approved" value="1">
                        <span class="form-radio-sign">Approved</span>
                        </label>
                        <!--
                        <label class="form-radio-label ml-3">
                        <input class="form-radio-input" type="radio" name="current_status" id="reject" value="2">
                        <span class="form-radio-sign">Reject</span>
                        </label>
                    -->
                         <label class="form-radio-label ml-3">
                        <input class="form-radio-input" type="radio" name="current_status" id="merge" value="2">
                        <span class="form-radio-sign">Merge</span>
                        </label>

                        <!------select2--------->
                       
                       <select id="vendorId" style="width:200px;" name="existing_vendor" required>
                        <option value="">Select Vendor</option>
                        @foreach($arrActiveVendors as $vendor)

                        <option value="{{$vendor['id']}}">{{$vendor['vendor_name']}}</option>
                        @endforeach
                        </select>
                        <!----->
                       </div> 
                  
                        </div>
                         <div class="row">
                         <div class="form-group">
                             <label for="name">Remarks</label><br>
                             <textarea name="status_remarks" rows="4" cols="50" id="remarks" required></textarea>
                                                        
                               </div> 
                          
                        </div>

                       

                                  <!-- Modal Footer -->
                        <div class="modal-footer">
                            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                          <button type="submit" class="btn btn-primary submitBtn">SUBMIT</button>

                          <!--<input type="hidden" name="vendor_status" id="vendor_status" value="">-->
                        </div>
                            </form>
                        </div>
                        
                      
                    </div>
                </div>
            </div> 



            <script>
            $("#vendorId").select2({
                placeholder:'select a vendor',
                allowClear:true
            });
            </script>
            <!--------------------------------------------->