<?php

namespace App\Http\Controllers\Frontend;
use App\Shared\Common;
use App\Shared\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Menu_category;
use validator;




class MenuCategory extends Controller
{
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    Public function index()
    {
    	return view('frontend.menu_categroy.index');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  
     * @return \Illuminate\Http\Response
     */
      public function store(Request $request)
      {
      	if ($request->isMethod('GET'))
      	{
         return view('frontend.menu_categroy.add_menu_category');
      	}
      	if($request->isMethod('POST'))
      	{
         
      		  $validator = validator()->make($request->all(),[
                'category_name' => 'required'
              
            ]);

      		  if ($validator->fails())
      	   {
               // return response()->json(['success' => false, 'errors' => $validator->errors()]);
      	   	return redirect()->back()->withInput()->withErrors($validator->errors());
            } 
            $obj=new Menu_category;
            $objUserId = Session::get('customer');
            $obj->menu_category_name  =request('category_name');
            $obj->customer_id  =$objUserId['id'];
            $obj->save();

            return response()->json(['success' => true, 'errors' => ['Data Saved'], 'tosatrMessage' => 'Menu Category Added Successfully']);
      	}
      }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function edit(Request $request,$id=null)
      {
      	if($request->isMethod('GET') && !empty($id))
      	{
      		$objData=Menu_category::findOrFail($id);
      		return view('frontend.menu_categroy.edit_menu_category',compact('objData'));
      	}
      	if($request->isMethod('POST'))
      	{
      		$validator = validator()->make($request->all(),[
                'category_name' => 'required'
              
            ]);
            if($validator->fails())
            {
            return redirect()->back()->withInput()->withErrors($validator->errors());
            }
             $obj=Menu_category::where('id','=',request('id'))->first();
             $obj->menu_category_name=request('category_name');
             $obj->save();

              return response()->json(['success' => true, 'errors' => ['Data Saved'], 'tosatrMessage' => 'Menu Category Updated Successfully']);
      	}
      }
      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

      public function delete($id)
      {
      	$objData=Menu_category::findOrFail($id);
      	$objData->is_active=0;
      	$objData->is_deleted=1;
      	$objData->update();

    return response()->json(['success' => true, 'errors' => ['Menu category Deleted Successfully']]);
      }
    
      /**
     * Display the specified table.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getList($argPageno, $argSlot = null, $argOrderIn = null, $orderBy = null, $argSearchValue = null)
    {


    	  $argOrderIn = !empty($argOrderIn) ? $argOrderIn : 'created_at';
    	  $orderBy = !empty($orderBy) ? $orderBy : 'desc';
    	  $argSlot = empty($argSlot) ? 1 : $argSlot;
    	  $varTotalRecordsPerPage = 5;
    	  $varTotalNoOfPages = 5;
    	  $varCheckDataInSlot = 0;
    	  $varRecordsForNext = $varTotalNoOfPages * $varTotalRecordsPerPage * $argSlot;
    	  $varSlotStarting = ($argSlot - 1) * ($varTotalRecordsPerPage * $varTotalNoOfPages);
    	  $varTotalRecords = ($argPageno * $varTotalRecordsPerPage) / $argPageno;
    	  $varStartingRecords = ($argPageno - 1) * $varTotalRecords;
    	  $arrRecords =Menu_category::skip($varStartingRecords)->take($varTotalRecords)->where('menu_category_name','LIKE','%'.$argSearchValue.'%')->orderBy($argOrderIn, $orderBy)->get();
    	  $varTotal = Menu_category::count();
         $varCheckDataInSlot = Menu_category::skip($varSlotStarting)->take(($varTotalNoOfPages * $varTotalRecordsPerPage))->orderBy($argOrderIn, $orderBy)->get()->count();
        // echo "<pre>";
        // print_r($arrRecords);die;
                $varPaginationCount = ceil($varCheckDataInSlot / $varTotalRecords);

    	  $varView=view('frontend.menu_categroy.table')->with([
            'arrRecords' => $arrRecords, 'varTotal' => $varTotal, 'varPaginationCount' => $varPaginationCount, 'argSlot' => $argSlot, 'argPageno' => $argPageno, 'argSearchValue' => $argSearchValue, 'varTotalNoOfPages' => $varTotalNoOfPages, 'varRecordsForNext' => $varRecordsForNext, 'argOrderIn' => $argOrderIn, 'orderBy' => $orderBy,])->render();

          return response()->json(['html' => $varView]);
    }
    	
}
