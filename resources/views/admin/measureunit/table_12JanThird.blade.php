<div class="card-body">
    <div class="container-table100 bg-transparent p-0">
        <div class="wrap-table100 w-100">
            <div class="table100 table-admin table-local">
                <table id="mytable">
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
                                onclick="filter('{{route('measure_unit-list',['1','1'])}}','table-list','1','unit_name','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Unit Name
                                @if($argOrderIn == 'unit_name')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                            <!----->
                            <!--<th class="column4">
                                Unit From
                             </th>-->
                            <th class="column4">
                                Unit Converted To
                             </th>
                             <th class="column4">
                                Converted Value
                             </th>
                            <!----->
                            {{-- <th class="column4">Country</th> --}}
                            <th class="column4"
                                onclick="filter('{{route('measure_unit-list',['1','1'])}}','table-list','1','created_at','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Creatd At
                                @if($argOrderIn == 'created_at')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                            <th class="column4"
                                onclick="filter('{{route('measure_unit-list',['1','1'])}}','table-list','1','updated_at','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
                                Updated At
                                @if($argOrderIn == 'updated_at')
                                @if($orderBy == 'desc')
                                <i class="bx bx-sort-up"></i>
                                @elseif($orderBy == 'asc')
                                <i class="bx bx-sort-down"></i>
                                @endif
                                @endif
                            </th>
                            <th class="column4"
                                onclick="filter('{{route('measure_unit-list',['1','1'])}}','table-list','1','is_active','{{ $orderBy == 'desc'?'asc':'desc'}}',$('#textsearch').val())">
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
                       <?php $c=0;?> 
                        @foreach ($arrRecords as $key=> $objData)
                       <?php $c=$c+1; ?> 

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
                                <a href="view_local.html"
                                    class="name" id="unitName">{{$objData->unit_name}}</a>
                                <a href="{{route('measure_unit/edit',['id'=>$objData->id])}}"
                                    class="d-inline-block text-success mr-3 edit-icon"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Edit" style="color: #9e9e9e!important;"><i
                                        class="bx bx-edit"></i></a>
                                <a href="javascript:void(0)"
                                    onclick="deleteRequest('{{route('measure_unit/delete',['id'=>$objData])}}',{{$objData->id}},'{{route('measure_unit-list', ['1'])}}','table-list','1')"
                                    class="d-inline-block text-danger edit-icon"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Delete"
                                    style="color: #9e9e9e!important;"><i
                                        class="bx bx-trash"></i></a>
                            </td>
                            <!--<form id="form1">-->
                           <!-- <td class="column4">
                            
                            <select name="unit_from" id="unitFrom">
                            <option vlaue="" >Select Unit From</option>
                            <option value="miligrams">MiliGrams</option>
                            <option value="grams">Grams</option>    
                            <option value="pounds">Pounds</option>
                            
                            <option value="ounces">Ounces</option>
                            <option value="kilogram">Kilogram</option>
                            <option value="mm">MM</option>
                            <option value="cm">CM</option>
                            <option value="inches">Inches</option>
                            <option value="feet">Feet</option>
                            <option value="meter">Meter</option>
                            <option value="yards">Yards</option>
                              
                             </select>
                        </td>-->
                        <td class="column4">
                         <select name="unit_to" id="post_title" onchange="convert()" >
                            <!--<option vlaue="o" selected="selected">
                            Select Unit To</option>-->
                            <option vlaue="" >Select Unit To</option>
                            <option value="miligrams" data-id="1">MiliGrams</option>
                            <option value="grams" data-id="2">Grams</option>    
                            <option value="pounds" data-id="3">Pounds</option>
                            <!--<option value="stones">Stones</option>-->
                            <option value="ounces">Ounces</option>
                            <option value="kilogram">Kilogram</option>
                            <option value="mm">MM</option>
                            <option value="cm">CM</option>
                            <option value="inches">Inches</option>
                            <option value="feet">Feet</option>
                            <option value="meter">Meter</option>
                            <option value="yards">Yards</option>
                            <!--<option value="kilometer">Kilometer</option>
                            <option value="miles">Miles</option>    -->   
                             </select>
                        </td>
                            
                    <!--</form>-->
                    <td class="column4"  id="result{{$objData->id}}" >

                    </td>

                            {{-- <td class="column4">{{\App\Models\Country::getTitle($objData->id)}}
                            </td> --}}
                            <td class="column4">
                                {{\App\Shared\Common::changeDateFormat($objData->created_at,'M d, Y')}}
                            </td>
                            <td class="column4">
                                {{\App\Shared\Common::changeDateFormat($objData->updated_at,'M d, Y')}}
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
                    onclick="getTableData('{{route('measure_unit-list',[(($varTotalNoOfPages * ($argSlot - 1)) - ($varTotalNoOfPages) + 1), ($argSlot - 1), $argSearchValue])}}','table-list','1')"
                    title="previous page">&#10094;</button>
            </li>
            @for ($i = 1; $i <= $varPaginationCount; $i++) @php $varPageNo=($i +
                (($varTotalNoOfPages * ($argSlot - 1))));
                $varActiveClass=($varPageNo==$argPageno) ? 'active' : '' ; @endphp
                <li>
                <button type="button" class="{{$varActiveClass}}"
                    onclick="getTableData('{{route('measure_unit-list',[$varPageNo, $argSlot, $argSearchValue])}}','table-list','1')"
                    title="page 1">{{$varPageNo}}</button>
                </li>

                @endfor
                <li>
                    <button class="next"
                        {{$varRecordsForNext < $varTotal ? '' : 'disabled'}}
                        title="next page"
                        onclick="getTableData('{{route('measure_unit-list',[(($varTotalNoOfPages * ($argSlot)) + 1), ($argSlot + 1), $argSearchValue])}}','table-list','1')">&#10095;</button>
                </li>
        </ul>
    </div>
    @else
    <tr>
        <td class="column4">No Data Found !!</td>
    </tr>
    @endif
</div>

<script>
    function convert(){
        
var id = $(this).data("id");
alert(id);
$.ajax({
    url: '{{"measure_unit-conversion"}}',
    type: "POST",

     data:{
          //value:value,
          "id": id,
          value:value,
          to:to,
          
        },
        cache: false,
      beforeSend: function() {
      $('#result' + id).text('Loading...');
      },
     success: function (html) {
       //response
       //console.log(res);result all_result
      // alert(res);
      // return false;
      $("#result" + id).html(html+" "+to);

     // var row = $(this).closest('.result');
     //  $("data-id").html(res+" "+to);
       
    }
});

}  


</script>

 