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
use validator;
use Carbon\Carbon;
use DataTables;
use DB;

class MenuItemController extends Controller
{
    public function index()
    {
    	return view("frontend.menu_items.index");
    }
    public function store(Request $request)
    {
    	 $customerId=Session::get('customer')['id'];
    	 $menu_cat=Menu_category::where('customer_id',$customerId)->where('is_deleted', '!=', '1')->get();
    	 $menus=Menu::where('is_active','=','1')->where('is_deleted', '!=', '1')->where("customer_id",'=', $customerId)->get();
    	 $vendors=Vendor::where('is_active','=','1')->where('is_deleted', '!=', '1')->get();
    	 $vendor_items=VendorItem::where('is_active','=','1')->where('is_deleted', '!=', '1')->get();
    	 				         
    	 $measures=MeasureUnit::where('is_active','=','1')->where('is_deleted', '!=', '1')->get();
    	 // echo "<pre>";
    	 // print_r($vendors);die;

    	if($request->isMethod('GET'))
    	{
    		
    		return view("frontend.menu_items.addMenuItem",compact('menus','vendors','vendor_items','measures'));
    	}
    	if($request->isMethod('POST'))
    	{
    		// echo"<pre>";
    		// print_r($request->all());die;
    		$validator = validator()->make($request->all(),[
    						"menu"	=> "required",
    						"vendor" => "required",
    						"menu_item_vendor_name"=> "required",
    						"vendor_item"=> "required",
    						"measure_unit"=> "required",
    						"menu_item_name"=> "required",
    						"menu_item_portion"=> "required",
    						"menu_item_yields"=> "required",
    						"cost"=> "required",
    						"menu_item_code"=>"required",
    						"menu_item_type"=> "required",


    		]);
    		  if($validator->fails())
    		  {
    		  		return redirect()->back()->withInput()->withErrors($validator->errors());
    		  	}else{

    		  		$obj=new Menu_item;
    		  		$obj->menu_id=request('menu');
    		  		$obj->customer_id=$customerId;
    		  		$obj->vendor_id=request('vendor');
    		  		$obj->menu_item_vendor_name=request('menu_item_vendor_name');
    		  		$obj->vendor_item_id=request('vendor_item');
    		  		$obj->menu_item_name=request('measure_unit');
    		  		$obj->menu_item_code=request('menu_item_name');
    		  		$obj->menu_item_portion=request('menu_item_code');
    		  		$obj->measure_unit_id=request('menu_item_portion');
    		  		$obj->menu_item_yield=request('menu_item_yields');
    		  		$obj->menu_item_cost=request('cost');
    		  		$obj->menu_item_type=request('menu_item_type');
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
    public function getVendorItemByVendor(Request $request, $argId = null, $argSelected = null)
    	{
    		 $varOptions = '<option value="">No States Available!</option>';
    		 $arrResponse = ['success' => false, 'html' => $varOptions];
        	if (!empty($argId))
        	{
        	$arrVendorItems = VendorItem::where([['is_active', '=', '1'], ['vendor_id', '=', $argId]])->get(['id', 'item_title'])->toArray();
        	 if (!empty($arrVendorItems))
        	 {
        	 	$varOptions = '<option value="">Select Vendor Items</option>';
        	 	foreach ($arrVendorItems as $objState)
        	 	{
        	 	  $varOptions .= '<option ' . (!empty($argSelected) && $argSelected == $objState['id'] ? "selected" : '') . ' value="' . $objState['id'] . '">' . $objState['item_title'] . '</option>';	
        	 	}
        	 	 $arrResponse['success'] = true;
                $arrResponse['html'] = $varOptions;
        	 }
        	}
        	 return $arrResponse;
    	}
    public function edit(Request $request, $id = null)
    {
    	 $customerId=Session::get('customer')['id'];
    	 $menu_cat=Menu_category::where('customer_id',$customerId)->where('is_deleted', '!=', '1')->get();
    	 $menus=Menu::where('is_active','=','1')->where('is_deleted', '!=', '1')->where("customer_id",'=', $customerId)->get();
    	 $vendors=Vendor::where('is_active','=','1')->where('is_deleted', '!=', '1')->get();
    	 $vendor_items=VendorItem::where('is_active','=','1')->where('is_deleted', '!=', '1')->get();
    	 				         
    	 $measures=MeasureUnit::where('is_active','=','1')->where('is_deleted', '!=', '1')->get();
    	if($request->isMethod('GET') && !empty($id))
    	{
    		$obj=Menu::findOrFail($id);
    		return view("Frontend.menu_items.editMenuItem",compact('obj','menu_cat','menus','vendors','vendor_items','measures'));
    	}
    	if($request->isMethod('POST'))
    	{
    		$validator = validator()->make($request->all(),[
    						"menu"	=> "required",
    						"vendor" => "required",
    						"menu_item_vendor_name"=> "required",
    						"vendor_item"=> "required",
    						"measure_unit"=> "required",
    						"menu_item_name"=> "required",
    						"menu_item_portion"=> "required",
    						"menu_item_yields"=> "required",
    						"cost"=> "required",
    						"menu_item_code"=>"required",
    						"menu_item_type"=> "required",


    		]);
    		 if($validator->fails())
    		  {
    		  		return redirect()->back()->withInput()->withErrors($validator->errors());
    		  }else{

    		  		$obj=Menu_item::findOrFail($id);
    		  		$obj->menu_id=request('menu');
    		  		$obj->customer_id=$customerId;
    		  		$obj->vendor_id=request('vendor');
    		  		$obj->menu_item_vendor_name=request('menu_item_vendor_name');
    		  		$obj->vendor_item_id=request('vendor_item');
    		  		$obj->menu_item_name=request('measure_unit');
    		  		$obj->menu_item_code=request('menu_item_name');
    		  		$obj->menu_item_portion=request('menu_item_code');
    		  		$obj->measure_unit_id=request('menu_item_portion');
    		  		$obj->menu_item_yield=request('menu_item_yields');
    		  		$obj->menu_item_cost=request('cost');
    		  		$obj->menu_item_type=request('menu_item_type');
    		  		$data=$obj->save();
    		  		 if($data)
    	    	 {
    	    	 return redirect("menu")->with("successMsg","MENU ITEM IS UPDATED SUCCESSFULLY !!");
    	    	 }else{
    	    	 return redirect("menu")->with("errorMsg","SOMETHING WRONG,PLEASE TRY AGAIN !");	
    	    	 }

    		  	}
    	}	
    } 

     public function delete($id)
    {
    	$obj=Menu_item::findOrFail($id);
    	$obj->is_active=0;
    	$obj->is_deleted=1;
    	$data=$obj->update();
    	if($data)
    	{
    		 
    	    	 return redirect("menu")->with("successMsg","MENU ITEM IS DELETED SUCCESSFULLY !!");
    	 }else{
    	    	 return redirect("menu")->with("errorMsg","SOMETHING WRONG,PLEASE TRY AGAIN !");	
    	      }
    	}

        public function getMenuItemList()
        {

         $customerId=Session::get('customer')['id'];  
         $data=DB::table("menu_items")
                ->select("menu_items.menu_item_vendor_name","menu_items.menu_item_name","menu_items.menu_item_code","menu_items.menu_item_cost","menu_items.menu_item_type","menu_items.created_at","menus.menu_name","vendors.vendor_name","vendor_items.item_title","menu_categories.menu_category_name")
                ->join("menus","menu_items.menu_id","=","menus.id")
                ->join("menu_categories","menus.menu_category_id","=","menu_categories.id")
                ->join("vendors","menu_items.vendor_id","=","vendors.id")
                ->join("vendor_items","menu_items.vendor_item_id","=","vendor_items.id")
               // ->join("measure_units","menu_items.measure_unit_id","=","measure_units.id")
                 ->where("menu_items.customer_id","=",$customerId)
                 ->where('menu_items.is_active','=','1')
                 ->where('menu_items.is_deleted','!=','1')
                 ->take(1)
                  ->skip(0)
                ->get();
                //$data=$data1->take(1)->skip(0)->get();
                 
                echo"<pre>";
                print_r($data);
        }
        

       public function getList($argPageno, $argSlot = null, $argOrderIn = null, $orderBy = null, $argSearchValue = null)

        {

             $customerId=Session::get('customer')['id'];  
              $data=DB::table("menu_items")
                ->select("menu_items.menu_item_vendor_name","menu_items.menu_item_name","menu_items.menu_item_code","menu_items.menu_item_cost","menu_items.menu_item_type","menu_items.created_at","menus.menu_name","vendors.vendor_name","vendor_items.item_title","menu_categories.menu_category_name")
                ->join("menus","menu_items.menu_id","=","menus.id")
                ->join("menu_categories","menus.menu_category_id","=","menu_categories.id")
                ->join("vendors","menu_items.vendor_id","=","vendors.id")
                ->join("vendor_items","menu_items.vendor_item_id","=","vendor_items.id")
               // ->join("measure_units","menu_items.measure_unit_id","=","measure_units.id")
                 ->where("menu_items.customer_id","=",$customerId)
                 ->where('menu_items.is_active','=','1')
                 ->where('menu_items.is_deleted','!=','1')
                ->get();
                // echo"<pre>";
                // print_r($data);
                // die;


            $argOrderIn = !empty($argOrderIn) ? $argOrderIn : 'created_at';
            $orderBy = !empty($orderBy) ? $orderBy : 'desc';
            $argSlot = empty($argSlot) ? 1 : $argSlot;
        
        $varTotalRecordsPerPage = 5;
        $varTotalNoOfPages = 5;
        $varCheckDataInSlot = 0;
        $varRecordsForNext = $varTotalNoOfPages * $varTotalRecordsPerPage * $argSlot;
        $varSlotStarting = ($argSlot - 1) * ($varTotalRecordsPerPage * $varTotalNoOfPages);
        //here
        $varTotalRecords = ($argPageno * $varTotalRecordsPerPage) / $argPageno;
        $varStartingRecords = ($argPageno - 1) * $varTotalRecords;




        // $arrRecords = Vendor::skip($varStartingRecords)->take($varTotalRecords)->where('vendor_name', 'LIKE', '%' . $argSearchValue . '%')->orWhere('contact_email', 'LIKE', '%' . $argSearchValue . '%')->orWhere('vendor_branch', 'LIKE', '%' . $argSearchValue . '%')->orderBy($argOrderIn, $orderBy)->get();

         $arrRecords=DB::table("menu_items")
                ->select("menu_items.id","menu_items.menu_item_vendor_name","menu_items.menu_item_name","menu_items.menu_item_code","menu_items.menu_item_cost","menu_items.menu_item_type","menu_items.created_at","menus.menu_name as menu","vendors.vendor_name as vendor","vendor_items.item_title as item","menu_categories.menu_category_name as category")
                ->join("menus","menu_items.menu_id","=","menus.id")
                ->join("menu_categories","menus.menu_category_id","=","menu_categories.id")
                ->join("vendors","menu_items.vendor_id","=","vendors.id")
                ->join("vendor_items","menu_items.vendor_item_id","=","vendor_items.id")
               // ->join("measure_units","menu_items.measure_unit_id","=","measure_units.id")
                 ->where("menu_items.customer_id","=",$customerId)
                 ->where('menu_items.is_active','=','1')
                 ->where('menu_items.is_deleted','!=','1')
                 ->skip($varStartingRecords)
                 ->take($varTotalRecords)
                 ->orderBy($argOrderIn, $orderBy)
                ->get();

                

        $varCheckDataInSlot = Menu_item::skip($varSlotStarting)->take(($varTotalNoOfPages * $varTotalRecordsPerPage))->orderBy($argOrderIn, $orderBy)->get()->count();

        $varTotal = Menu_item::count();
        $varPaginationCount = ceil($varCheckDataInSlot / $varTotalRecords);

        $varView = view('frontend.menu_items.table')->with([
            'arrRecords' => $arrRecords, 'varTotal' => $varTotal, 'varPaginationCount' => $varPaginationCount, 'argSlot' => $argSlot, 'argPageno' => $argPageno, 'argSearchValue' => $argSearchValue, 'varTotalNoOfPages' => $varTotalNoOfPages, 'varRecordsForNext' => $varRecordsForNext, 'argOrderIn' => $argOrderIn, 'orderBy' => $orderBy,
        ])->render();
        return response()->json(['html' => $varView]);
        }
        
   
}
