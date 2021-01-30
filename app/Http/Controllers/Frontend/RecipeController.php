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
use App\Models\Recipe;
use validator;
use Carbon\Carbon;
use DataTables;





class RecipeController extends Controller
{
    public function index()
	{
		echo "Hi";
	}
	public function store(Request $request)
	{
		 $customerId=Session::get('customer')['id'];
		  $measures=MeasureUnit::where('is_active','=','1')->where('is_deleted', '!=', '1')->get();
		 if($request->isMethod('GET'))
		 {
		 	return view("frontend.recipe.addRecipe",compact('measures'));
		 }
		 if($request->isMethod('POST'))
		 {
		 	// echo "<pre>";
		 	// print_r($request->all());die;
		 	$validator = validator()->make($request->all(),[
    				 "recipe_name" => "required",
    				 "recipe_yield" => "required",
    				 "discription" => "required",
    				 "recipe_image" =>"required|mimes:jpeg,png,jpg",
    				 "recipe_batch_cost" =>"required",
    				 "measure_unit" =>"required",
    	    	]);
		 	 if($validator->fails())
		 	 {
		 	 	return redirect()->back()->withInput()->withErrors($validator->errors());
		 	 } else{
		 	 	$image=$request->file("recipe_image");
    	    	$currDate=Carbon::now()->toDateString();
    	    	$imageName=$currDate.'-'.$image->getClientOriginalName().'.'.$image->getClientOriginalExtension();
    	    	$image->move("uploads/recipe_image",$imageName);
    	    	 $obj=new Recipe();
    	    	 $obj->customer_id=$customerId;
    	    	 $obj->recipe_name=request('recipe_name');
    	    	 $obj->recipe_description=request('discription');
    	    	 $obj->recipe_image=isset($imageName)?$imageName:" ";
    	    	 $obj->recipe_yield=request('recipe_yield');
    	    	 $obj->recipe_batch_cost=request('recipe_batch_cost');
    	    	 $obj->measure_unit_id=request('measure_unit');
    	    	 $data=$obj->save();	
    	    	  if($data)
    	    	 {
    	    	 return redirect("recipe")->with("successMsg","RECIPE ADDED SUCCESSFULLY !!");
    	    	 }else{
    	    	 return redirect("recipe")->with("errorMsg","SOMETHING WRONG,PLEASE TRY AGAIN !");	
    	    	 } 

		 	 }
		 }
	}
		 public function edit(Request $request, $id = null)
		 {
		 	 $customerId=Session::get('customer')['id'];
		 	 $measures=MeasureUnit::where('is_active','=','1')->where('is_deleted', '!=', '1')->get();
		 	 if($request->isMethod('GET') && !empty($id))
		 	 {
		 	 $obj=Recipe::findOrFail($id);
    		return view("frontend.recipe.editRecipe",compact('obj','measures'));
		 	 }
		 	 if($request->isMethod('POST'))
		 	 {
		 	 	$validator = validator()->make($request->all(),[
    				 "recipe_name" => "required",
    				 "recipe_yield" => "required",
    				 "discription" => "required",
    				 "recipe_image" =>"required|mimes:jpeg,png,jpg",
    				 "recipe_batch_cost" =>"required",
    				 "measure_unit" =>"required",
    	    	]);
    	    	 if($validator->fails())
    	    	 {
    	    	 	return redirect()->back()->withInput()->withErrors($validator->errors());
    	    	 } else{
    	    	 $image=$request->file("recipe_image");
    	    	$currDate=Carbon::now()->toDateString();
    	    	$imageName=$currDate.'-'.$image->getClientOriginalName().'.'.$image->getClientOriginalExtension();
    	    	$image->move("uploads/recipe_image",$imageName);

    	    	$obj=Recipe::findOrFail($id);
    	    	 $obj->customer_id=$customerId;
    	    	 $obj->recipe_name=request('recipe_name');
    	    	 $obj->recipe_description=request('discription');
    	    	 $obj->recipe_image=isset($imageName)?$imageName:" ";
    	    	 $obj->recipe_yield=request('recipe_yield');
    	    	 $obj->recipe_batch_cost=request('recipe_batch_cost');
    	    	 $obj->measure_unit_id=request('measure_unit');
    	    	 $data=$obj->save();	

    	    	 if($data)
    	    	 {
    	    	 return redirect("recipe")->with("successMsg","RECIPE ADDED SUCCESSFULLY !!");
    	    	 }else{
    	    	 return redirect("recipe")->with("errorMsg","SOMETHING WRONG,PLEASE TRY AGAIN !");	
    	    	 } 
    	    	 }
		 	 }
		 }
	 public function delete($id)
    {
    	$obj=Recipe::findOrFail($id);
    	$obj->is_active=0;
    	$obj->is_deleted=1;
    	$data=$obj->update();
    	if($data)
    	{
    		 
    	    	 return redirect("menu")->with("successMsg","RECIPE IS DELETED SUCCESSFULLY !!");
    	 }else{
    	    	 return redirect("menu")->with("errorMsg","SOMETHING WRONG,PLEASE TRY AGAIN !");	
    	      }
    	}
}
