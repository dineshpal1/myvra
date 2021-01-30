<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
	<script src="{{ asset('js/print.js') }}"></script>
	<style>
		table{
			border:1px solid;
			border-collapse: collapse;
			width:90%;
			margin:0 auto;
			text-align: left;
		}
		tr th{
			background: #eee;
			border: 1px solid;
		}
		tr td{
			border:1px solid;
		}

	</style>
<!--<a href="{{ url('/print') }}" class="btnprn btn">Print Preview</a>-->
  <a href="{{route('print')}}" class="btnprn btn">Print</a>|
<script type="text/javascript">
$(document).ready(function(){
$('.btnprn').printPage();
});
</script>
<center>
</head>
<body>
	@foreach($data as $key=>$value)
	<div style="text-align:center;margin-top: 40px;">

	{{$value->menu_name}}

   </div>
   <div><strong>Category:</strong>{{$value->menu_category_name}}</div>
   <div><strong>Instructions:</strong>{{$value->menu_description}}</div>
   @endforeach
   <hr>
	<table>
	<caption></caption>
	<thead>
		<tr>
			<th>Sr.No</th>
			<th>Ingredient</th>
			<th>Portion </th>
			<th>UOM</th>
			<th>Yield</th>
			<th>Cost</th>

		</tr>
	</thead>
	<tbody>
		@php $i=1;@endphp
		@foreach($data as $key=>$value)
		<tr>
			<td>{{$i++}}</td>
			<td>{{$value->menu_item_name}}</td>
			<td>{{$value->menu_item_portion}}</td>
			<td>{{$value->unit_name}}</td>
			<td>{{$value->menu_item_yield}}</td>
			<td>{{$value->menu_item_cost}}</td>
		</tr>
		@endforeach
	</tbody>
</table>

{{--
 <script type="text/javascript">
    $(document).ready(function(){
      $(".printItem").printPage();
    });

  </script>
  --}}
</body>
</html>