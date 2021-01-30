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
use validator;
use Carbon\Carbon;
use DataTables;

class MenuController extends Controller
{
	public function index(Request $request)
	{
		echo "Hi";
	}

    public function store(Request $request)
    {
    	 $customerId=Session::get('customer')['id'];
    	 $menu_cat=Menu_category::where('customer_id',$customerId)->get();

    	
    	if($request->isMethod('GET'))
    	{
    		
    		return view("frontend.menu.addMenu",compact('menu_cat'));
    	}
    	if($request->isMethod('POST'))
    	{
    		// echo"<pre>";
    		// print_r($request->all());die;
    	$validator = validator()->make($request->all(),[
    				 "menu_category" => "required",
    				 "menu_name" => "required",
    				 "discription" => "required",
    				 "menu_image" =>"required|mimes:jpeg,png,jpg",
    				 "menu_cost" =>"required",
    				 "menu_percent" =>"required",
    				 "menu_contribution" =>"required",
    				 "selling_price" =>"required",


    	]);
    	    if($validator->fails())
    	    {
    	    	return redirect()->back()->withInput()->withErrors($validator->errors());
    	    } else{

    	    	$image=$request->file("menu_image");
    	    	$currDate=Carbon::now()->toDateString();
    	    	$imageName=$currDate.'-'.$image->getClientOriginalName().'.'.$image->getClientOriginalExtension();
    	    	
    	    	$image->move("uploads/menu_image",$imageName);
    	    	 $obj=new Menu();
    	    	 // $obj->menu_category_id=$request->menu_category;
    	    	 // $obj->customer_id=$customerId;
    	    	 // $obj->menu_name=$request->menu_name;
    	    	 // $obj->menu_description=$request->discription;
    	    	 // $obj->menu_image=isset($imageName)?$imageName:" ";;
    	    	 // $obj->menu_cost=$request->menu_cost;
    	    	 // $obj->menu_cost_percentage=$request->
    	    	 // $obj->menu_contribution=$request->menu_contribution;
    	    	 // $obj->menu_selling_price=$request->selling_price;
    	    	  $obj->menu_category_id=request('menu_category');
    	    	 $obj->customer_id=$customerId;
    	    	 $obj->menu_name=request('menu_name');
    	    	 $obj->menu_description=request('discription');
    	    	 $obj->menu_image=isset($imageName)?$imageName:" ";
    	    	 $obj->menu_cost=request('menu_cost');
    	    	 $obj->menu_cost_percentage=request('menu_percent');
    	    	 $obj->menu_contribution=request('menu_contribution');
    	    	 $obj->menu_selling_price=request('selling_price');
    	    	 $data=$obj->save();	 
    	    	 if($data)
    	    	 {
    	    	 return redirect("menu")->with("successMsg","MENU IS ADDED SUCCESSFULLY !!");
    	    	 }else{
    	    	 return redirect("menu")->with("errorMsg","SOMETHING WRONG,PLEASE TRY AGAIN !");	
    	    	 }


    	    }
    	    
    	}
    }

    public function edit(Request $request, $id = null)
    {
    	 $customerId=Session::get('customer')['id'];
    	 $menu_cat=Menu_category::where('customer_id',$customerId)->get();

    	if($request->isMethod('GET') && !empty($id))
    	{
    		$obj=Menu::findOrFail($id);
    		return view("frontend.menu.editMenu",compact('obj','menu_cat'));

    	}
    	if($request->isMethod('POST'))
    	{
    		
    		$validator = validator()->make($request->all(),[
    				 "menu_category" => "required",
    				 "menu_name" => "required",
    				 "discription" => "required",
    				 "menu_image" =>"required|mimes:jpeg,png,jpg",
    				 "menu_cost" =>"required",
    				 "menu_percent" =>"required",
    				 "menu_contribution" =>"required",
    				 "selling_price" =>"required",


    	]);
    	    if($validator->fails())
    	    {
    	    	return redirect()->back()->withInput()->withErrors($validator->errors());
    	    } else{
    	    	$image=$request->file("menu_image");
    	    	$currDate=Carbon::now()->toDateString();
    	    	$imageName=$currDate.'-'.$image->getClientOriginalName().'.'.$image->getClientOriginalExtension();
    	    	
    	    	$image->move("uploads/menu_image",$imageName);

    	    	$obj=Menu::findOrFail($id);
    	    	 $obj->menu_category_id=request('menu_category');
    	    	 $obj->customer_id=$customerId;
    	    	 $obj->menu_name=request('menu_name');
    	    	 $obj->menu_description=request('discription');
    	    	 $obj->menu_image=isset($imageName)?$imageName:" ";;
    	    	 $obj->menu_cost=request('menu_cost');
    	    	 $obj->menu_cost_percentage=request('menu_percent');
    	    	 $obj->menu_contribution=request('menu_contribution');
    	    	 $obj->menu_selling_price=request('selling_price');
    	    	 $data=$obj->save();	 
    	    	  if($data)
    	    	 {
    	    	 return redirect("menu")->with("successMsg","MENU IS UPDATED SUCCESSFULLY !!");
    	    	 }else{
    	    	 return redirect("menu")->with("errorMsg","SOMETHING WRONG,PLEASE TRY AGAIN !");	
    	    	 }

    	   } 	
    	}
    }
    public function delete($id)
    {
    	$obj=Menu::findOrFail($id);
    	$obj->is_active=0;
    	$obj->is_deleted=1;
    	$data=$obj->update();
    	if($data)
    	{
    		 
    	    	 return redirect("menu")->with("successMsg","MENU IS DELETED SUCCESSFULLY !!");
    	 }else{
    	    	 return redirect("menu")->with("errorMsg","SOMETHING WRONG,PLEASE TRY AGAIN !");	
    	      }
    	}
    

}
