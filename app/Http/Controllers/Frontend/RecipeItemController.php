<?php

namespace App\Http\Controllers\Frontend;
use App\Shared\Common;
use App\Shared\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Menu_category;
use App\Models\Menu;
use App\Models\Customer;
use App\Models\Admin\MeasureUnit;
use App\Models\Admin\Vendor;
use App\Models\Admin\VendorItem;
use App\Models\Recipe;
use App\Models\Recipe_item;
use validator;
use Carbon\Carbon;
use DataTables;
use DB;





class RecipeItemController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$data=Recipe_item::all();
    		return DataTables::of($data)->addIndexColumn()->addColumn('action', function($row){
    			          // $btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm">View</a>';
                           $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                           $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-danger btn-sm">Delete</a>';
                           return $btn;
    		})
    		->rawColumns(['action'])->make(true);
    	}
    	return view("frontend.recipe_item.index");
    }
     public function store(Request $request)
     {

     	 $customerId=Session::get('customer')['id'];
     	
     	 $recipes=Recipe::where('customer_id',$customerId)->where('is_deleted', '!=', '1')->get();
     	 $vendors=Vendor::where('is_active','=','1')->where('is_deleted', '!=', '1')->get();
     	 $vendor_items=VendorItem::where('is_active','=','1')->where('is_deleted', '!=', '1')->get();
     	 $measures=MeasureUnit::where('is_active','=','1')->where('is_deleted', '!=', '1')->get();

     	 // echo"<pre>";
     	 // print_r($vendor);die;
     	 if($request->isMethod('GET'))
     	 {
     	 	return view("frontend.recipe_item.addRecipeItem",compact('recipes','vendors','vendor_items','measures'));
     	 }
     	 if($request->isMethod('POST'))
     	 {
     	 	$validator = validator()->make($request->all(),[
    						"recipe"	=> "required",
    						"vendor" => "required",
    						"recipe_item_name"=> "required",
    						"vendor_item"=> "required",
    						"measure_unit"=> "required",
    						"recipe_item_vendor_name"=> "required",
    						"recipe_item_portion"=> "required",
    						"recipe_item_yields"=> "required",
    						"cost"=> "required",
    						"recipe_item_code"=>"required",
    						"recipe_item_type"=> "required",


    		]);
    		if($validator->fails())
    		{
    			return redirect()->back()->withInput()->withErrors($validator->errors());
    		}else{
    			    $obj=new Recipe_item;
    		  		$obj->recipe_id=request('recipe');
    		  		$obj->customer_id=$customerId;
    		  		$obj->vendor_id=request('vendor');
    		  		$obj->vendor_item_id=request('vendor_item');
    		  		$obj->measure_unit_id=request('measure_unit');
    		  		$obj->recipe_item_vendor_name=request('recipe_item_vendor_name');
    		  		
    		  		$obj->recipe_item_name=request('recipe_item_name');
    		  		$obj->recipe_item_code=request('recipe_item_code');
    		  		$obj->recipe_item_portion=request('recipe_item_portion');
    		  		$obj->recipe_item_yield=request('recipe_item_yields');
    		  		//$obj->menu_item_yield=request('recipe_item_yields');
    		  		$obj->recipe_item_cost=request('cost');
    		  		$obj->recipe_item_type=request('recipe_item_type');
    		  		$data=$obj->save();
    		  		 if($data)
    	    	 {
    	    	 return redirect("recipeItem")->with("successMsg","MENU IS ADDED SUCCESSFULLY !!");
    	    	 }else{
    	    	 return redirect("recipeItem")->with("errorMsg","SOMETHING WRONG,PLEASE TRY AGAIN !");	
    	    	 }
    		}

     	 }
     }

     public function edit(Request $request, $id = null)
     {
     	 $customerId=Session::get('customer')['id'];
     	
     	 $recipes=Recipe::where('customer_id',$customerId)->where('is_deleted', '!=', '1')->get();
     	 $vendors=Vendor::where('is_active','=','1')->where('is_deleted', '!=', '1')->get();
     	 $vendor_items=VendorItem::where('is_active','=','1')->where('is_deleted', '!=', '1')->get();
     	 $measures=MeasureUnit::where('is_active','=','1')->where('is_deleted', '!=', '1')->get();

     	 if($request->isMethod('GET') && !empty($id))
     	 {
     	 	$obj=Recipe_item::findOrFail($id);
     	 	// echo"<pre>";
     	 	// print_r($obj);die;
     	 	return view("frontend.recipe_item.editRecipeItem",compact('obj','recipes','vendors','vendor_items','measures'));
     	 }
     	 if($request->isMethod('POST'))
     	 {
     	 	$validator = validator()->make($request->all(),[
    						"recipe"	=> "required",
    						"vendor" => "required",
    						"recipe_item_name"=> "required",
    						"vendor_item"=> "required",
    						"measure_unit"=> "required",
    						"recipe_item_vendor_name"=> "required",
    						"recipe_item_portion"=> "required",
    						"recipe_item_yields"=> "required",
    						"cost"=> "required",
    						"recipe_item_code"=>"required",
    						"recipe_item_type"=> "required",


    		]);
    		if($validator->fails())
    		{
    			return redirect()->back()->withInput()->withErrors($validator->errors());	
    		} else {

    				 $obj = Recipe_item::where('id', '=', request('id'))->first();
    			   // $obj=Recipe_item::findOrFail($id);

    			    // echo"<pre>";
    			    // print_r($obj);die;
    		  		$obj->recipe_id=request('recipe');
    		  		$obj->customer_id=$customerId;
    		  		$obj->vendor_id=request('vendor');
    		  		$obj->vendor_item_id=request('vendor_item');
    		  		$obj->measure_unit_id=request('measure_unit');
    		  		$obj->recipe_item_vendor_name=request('recipe_item_vendor_name');
    		  		
    		  		$obj->recipe_item_name=request('recipe_item_name');
    		  		$obj->recipe_item_code=request('recipe_item_code');
    		  		$obj->recipe_item_portion=request('recipe_item_portion');
    		  		$obj->recipe_item_yield=request('recipe_item_yields');
    		  		//$obj->menu_item_yield=request('recipe_item_yields');
    		  		$obj->recipe_item_cost=request('cost');
    		  		$obj->recipe_item_type=request('recipe_item_type');
    		  		$data=$obj->save();
    		  		 if($data)
    	    	 {
    	    	 return redirect("recipeItem")->with("successMsg","MENU IS ADDED SUCCESSFULLY !!");
    	    	 }else{
    	    	 return redirect("recipeItem")->with("errorMsg","SOMETHING WRONG,PLEASE TRY AGAIN !");	
    	    	 }
    		}
     	 }
     }
      public function delete($id)
    {
    	$obj=Recipe_item::findOrFail($id);
    	$obj->is_active=0;
    	$obj->is_deleted=1;
    	$data=$obj->update();
    	if($data)
    	{
    		 
    	    	 return redirect("recipeItem")->with("successMsg","RECIPE ITEM IS DELETED SUCCESSFULLY !!");
    	 }else{
    	    	 return redirect("recipeItem")->with("errorMsg","SOMETHING WRONG,PLEASE TRY AGAIN !");	
    	      }
    	}

    	public function getRecipeItem(Request $request)
    	{
    		 // $data = Recipe_item::where('is_deleted','!=','1')->where('is_active','=','1')->get();
       //       print_r($data);die;

    		 if ($request->ajax())
    		 {
    		 	 $data = Recipe_item::where('is_deleted','!=','1')->where('is_active','=','1')->get();



              


    		 	  return Datatables::of($data)->addIndexColumn()->addColumn('action', function($row){
    		 	   $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> 
    		 	   <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
    		 	    return $actionBtn;	
    		 	  })
    		 	    ->rawColumns(['action'])
    		 	     ->make(true);
    		 }
    	}

}
