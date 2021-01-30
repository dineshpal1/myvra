<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Menu;
use App\Models\Admin\Vendor;
use App\Models\Admin\VendorItem;
use App\Models\Admin\MeasureUnit;
use App\Models\Customer;
use App\Models\Menu_category;
use App\Models\Menu_item;
use App\Models\Recipe;
use App\Models\Recipe_item;
use validator;
use Carbon\Carbon;
use DataTables;
use DB;



class MenucostController extends Controller
{
    public function index()
    {
    
    	$customerId=Session::get('customer')['id'];
    	$categories=Menu_category::where("customer_id",$customerId)->get();
    	// echo"<pre>";
    	// print_r($categories);die;
    	return view("frontend.menu_cost.index",compact('categories'));
    	
    }

    public function getList(Request $request)
    {

    	// echo"<pre>";
    	// print_r($request->all());die;
    	//$categoryid=($request->categoryId)?$request->categoryId:" ";
    	$categoryid=$request->categoryId;
    	//print_r($categoryid);die;
        $customerId=Session::get('customer')['id'];  

              $data=DB::table("menus")
                ->select("menus.id","menus.menu_name","menus.menu_cost","menus.menu_cost_percentage","menus.menu_contribution","menus.menu_selling_price","menu_categories.menu_category_name")
              
                ->join("menu_categories","menus.menu_category_id","=","menu_categories.id")
              
             	 ->when($categoryid,function($query) use ($categoryid){
             	 	return $query->where('menus.menu_category_id',$categoryid);
             	 })
                 ->where("menus.customer_id","=",$customerId)
                 ->where('menus.is_active','=','1')
                 ->where('menus.is_deleted','!=','1')
                ->get();

               // echo"<pre>";
                //print_r($data);die;
                
                $varView = view('frontend.menu_cost.table',compact('data'))
                           ->render();
               return response()->json(['html' => $varView]);

    }
    	public function store(Request $request)
    	{
    		//echo"add new menu item";
    			if ($request->isMethod('GET'))
      	{
      			
      			  $customerId=Session::get('customer')['id'];  
	              $menuItems=DB::table("menu_items")
                ->select("menu_items.id","menu_items.menu_item_name","menu_items.menu_item_code","measure_units.unit_name","vendors.vendor_name","vendor_items.pack_per_case","vendor_items.pack_size","brands.brand_name","item_classes.class_name")
                ->join("measure_units","menu_items.measure_unit_id","=","measure_units.id")
                ->join("vendors","menu_items.vendor_id","=","vendors.id")
                ->join("vendor_items","menu_items.vendor_item_id","=","vendor_items.id")
                ->join("brands","vendor_items.brand_id","=","brands.id")
                ->join("item_classes","vendor_items.item_class_id","=","item_classes.id")

               // ->where("menu_items.menu_item_code","=",$request->getValue)
                ->where("menu_items.customer_id","=",$customerId)
                 ->where('menu_items.is_active','=','1')
                 ->where('menu_items.is_deleted','!=','1')
                ->get();
                // echo "<pre>";
                // print_r($menuItems);die;
      			
      		    $recipes=Recipe::all();
      		  
      			
      			$measures=MeasureUnit::all();
      			//$recipes=Recipe::where("customer_id",$customerId)->get();
      			$vendors=Vendor::all();
    			$categories=Menu_category::where("customer_id",$customerId)->get();
       		    return view('frontend.menu_cost.add_menu_item',compact('categories','measures','recipes','vendors','menuItems'));
      	}

    	}

    	public function saveCategory(Request $request)
    	{
    		
    	    $obj=new Menu_category;
            $objUserId = Session::get('customer')['id'];
            $obj->menu_category_name  =request('categroy');
            $obj->customer_id  =$objUserId;
            $data=$obj->save();
            if($data)
    	    	 {
    	    	 return redirect("menucost_add-menu")->with("successMsg","MENU CATEGORY  ADDED SUCCESSFULLY !!");
    	    	 }else{
    	    	 return redirect("menucost_add-menu")->with("errorMsg","SOMETHING WRONG,PLEASE TRY AGAIN !");	
    	    	 }	 
            //return response()->json(['success' => true, 'errors' => ['Data Saved'], 'tosatrMessage' => 'Menu Category Added Successfully']);
    	}

    	public function saveMenuItem(Request $request)
    	{
    		    		
    		$vendor=Vendor::firstOrCreate(['vendor_name'=>request('supplier')]);
    		$vendorItems=VendorItem::firstOrCreate(['pack_size'=>request('pack_size')],['vendor_id'=>$vendor->id]);
    		 $objUserId = Session::get('customer')['id'];
    		 $obj=new Menu_item;;
    		$obj->customer_id=$objUserId;
    		$obj->vendor_id=$vendor->id;
    		$obj->vendor_item_id=$vendorItems->id;
    		$obj->menu_item_name=request('item_name');
    		$obj->menu_item_code=request('item_code');
    		$obj->measure_unit_id=request('unit_of_measure');
    		$obj->menu_item_yield=request('yield');
    		$obj->menu_item_cost=request('price');
    		 // echo"<pre>";
    		 // print_r($obj);die;
    		
    		$data=$obj->save();
    		if($data)
    		 {
    	    	 return redirect("menucost_add-menu")->with("successMsg","MENU CATEGORY  ADDED SUCCESSFULLY !!");
    	    	 }else{
    	    	 return redirect("menucost_add-menu")->with("errorMsg","SOMETHING WRONG,PLEASE TRY AGAIN !");	
    	    	 }	 
    	
    	    	  //return response()->json(['success' => true, 'errors' => ['Data Saved'], 'tosatrMessage' => 'Menu Category Added Successfully']);

    	}

    	public function getItemCode(Request $request)
    	{
    		
		     $customerId=Session::get('customer')['id'];  
	              $menuItems=DB::table("menu_items")
                ->select("menu_items.id","menu_items.menu_item_name","menu_items.menu_item_code","menu_items.menu_item_portion","menu_items.menu_item_yield","menu_items.menu_item_cost","vendors.vendor_name","measure_units.unit_name")
                ->join("measure_units","menu_items.measure_unit_id","=","measure_units.id")
                ->join("vendors","menu_items.vendor_id","=","vendors.id")
                ->where("menu_items.menu_item_code","=",$request->getValue)
                 ->where("menu_items.customer_id","=",$customerId)
                 ->where('menu_items.is_active','=','1')
                 ->where('menu_items.is_deleted','!=','1')
                ->get();
                // print_r($menuItems);die;
                 $userData['data'] = $menuItems;

			     echo json_encode($userData);
			     exit;

		}

    	public function addRecipeItems(Request $request)
    	{
    		//recipe
    		// echo "<pre>";
    		// print_r($request->all());

	    		  $customerId=Session::get('customer')['id'];  
	              $recipeItems=DB::table("recipe_items")
                ->select("recipe_items.id","recipe_items.recipe_item_name","recipe_items.recipe_item_code","recipe_items.recipe_item_portion","recipe_items.recipe_item_yield","recipe_items.recipe_item_cost","vendors.vendor_name","measure_units.unit_name")
                ->join("measure_units","recipe_items.measure_unit_id","=","measure_units.id")
                ->join("vendors","recipe_items.vendor_id","=","vendors.id")
                 ->where("recipe_items.customer_id","=",$customerId)
                 ->where("recipe_items.recipe_id","=",$request->id)
                 ->where('recipe_items.is_active','=','1')
                 ->where('recipe_items.is_deleted','!=','1')
                ->get();
                   $userData['data'] = $recipeItems;

			     echo json_encode($userData);
			     exit;
          		// echo"<pre>";
    		    // print_r($data);
    	}
    	public function print($id = null)
    	{
    		//$categoryid=$request->categoryId;
    	//print_r($categoryid);die;
       /*      $customerId=Session::get('customer')['id'];  

              $data=DB::table("menus")
                ->select("menus.id","menus.menu_name","menus.menu_cost","menus.menu_cost_percentage","menus.menu_contribution","menus.menu_selling_price","menu_categories.menu_category_name")
              
                ->join("menu_categories","menus.menu_category_id","=","menu_categories.id")
              
             	
                 ->where("menus.customer_id","=",$customerId)
                 ->where('menus.is_active','=','1')
                 ->where('menus.is_deleted','!=','1')
                ->get();
*/
                // echo"<pre>";
                // print_r($data);die;
              // return view("frontend.menu_cost.print",compact('data')); 
               // if(!empty($id) )
               // {
                	//$obj=Menu_item::findOrFail($id);
                $customerId=Session::get('customer')['id'];  
                $data=DB::table("menu_items")
              	->select("menu_items.menu_item_name","menu_items.menu_item_portion","menu_items.menu_item_yield","menu_items.menu_item_cost","measure_units.unit_name","menus.menu_description","menu_categories.menu_category_name","menus.menu_name")
                ->join("measure_units","menu_items.measure_unit_id","=","measure_units.id")
               	->join("menus","menu_items.menu_id","=","menus.id")
                	
               	->join("menu_categories","menus.menu_category_id","=","menu_categories.id")

                ->where("menu_items.customer_id","=",$customerId)
			    ->where('menu_items.is_active','=','1')
			    ->where('menu_items.is_deleted','!=','1')
			    ->get();
			    	// echo"<pre>";
			    	// print_r($data);die;
			    return view("frontend.menu_cost.print",compact('data')); 
			  // }              
	}

}
