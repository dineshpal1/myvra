<?php

namespace App\Http\Controllers\Admin;


use App\Models\Admin\Brand;
use App\Models\Admin\Vendor;
use Illuminate\Http\Request;
use App\Models\Admin\ItemClass;
use App\Models\Admin\VendorItem;
use App\Imports\VendorItemImport;
use App\Models\Admin\MeasureUnit;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Validator;
use App\Http\Requests\CsvImportRequest;

class VendorItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($argId = 0)
    {
        return view('admin.vendoritem.index')->with('argId', $argId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $argId = null)
    {
        if ($request->isMethod('GET')) {
            $objData = Vendor::where('id', '=', $argId)->first(['id', 'vendor_name']);
            return view('admin.vendoritem.addvendor-item')->with(['objData' => $objData, 'arrVendorData' => $this->getVendor(), 'arrBrandData' => $this->getBrand(), 'arrClassData' => $this->getItemClass(), 'arrMeasureUnit' => $this->getMeasureUnit()]);
        }
        if ($request->isMethod('POST')) {

            $validator = validator()->make($request->all(), [
                'vendor_id' => 'required',
                'brand_id' => 'required',
                'item_class_id' => 'required',
                'measure_unit' => 'required',
                'item_title' => 'required',
                'item_price' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }

            $obj = new VendorItem();
            $obj->vendor_id = request('vendor_id');
            $obj->brand_id = request('brand_id');
            $obj->item_class_id = request('item_class_id');
            $obj->measure_unit = request('measure_unit');
            $obj->item_title = request('item_title');
            $obj->item_price = request('item_price');
            $obj->item_code = request('item_code');
            $obj->pack_per_case = request('pack_per_case');
            $obj->pack_size = request('pack_size');
            $obj->item_catch_weight = request('item_catch_weight');
            $obj->item_description = request('item_description');
            $obj->is_active = (!empty(request('is_active')) ? request('is_active') : 0);
            $obj->save();
            $varUrl = route('vendor-item', ['vnId' => $argId]);
            return response()->json(['success' => true, 'errors' => ['Data Saved'], 'tosatrMessage' => 'Data Added Successfully', 'url' => $varUrl]);
        }
    }

    /**
     * Display the specified table.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getList($argId = null, $argPageno = null, $argSlot = null, $argOrderIn = null, $orderBy = null, $argSearchValue = null)
    {

        $argOrderIn = !empty($argOrderIn) ? $argOrderIn : 'created_at';
        $orderBy = !empty($orderBy) ? $orderBy : 'desc';
        $argSlot = empty($argSlot) ? 1 : $argSlot;
        //    $argRecordsPerPage = empty($argRecordsPerPage) ? 10 : $argRecordsPerPage;

        //here
        $varTotalRecordsPerPage = 5;
        $varTotalNoOfPages = 5;
        $varCheckDataInSlot = 0;
        $varRecordsForNext = $varTotalNoOfPages * $varTotalRecordsPerPage * $argSlot;
        $varSlotStarting = ($argSlot - 1) * ($varTotalRecordsPerPage * $varTotalNoOfPages);
        //here
        $varTotalRecords = ($argPageno * $varTotalRecordsPerPage) / $argPageno;
        $varStartingRecords = ($argPageno - 1) * $varTotalRecords;

        $arrRecords = VendorItem::skip($varStartingRecords)->take($varTotalRecords)->where('item_title', 'LIKE', '%' . $argSearchValue . '%')->orWhere('item_code', 'LIKE', '%' . $argSearchValue . '%');
        if (!empty($argId)) {
            $arrRecords = $arrRecords->where('vendor_id', '=', $argId);
        }
        $arrRecords = $arrRecords->orderBy($argOrderIn, $orderBy)->get();
        $varCheckDataInSlot = VendorItem::skip($varSlotStarting)->take(($varTotalNoOfPages * $varTotalRecordsPerPage))->orderBy($argOrderIn, $orderBy)->get()->count();

        $varTotal = VendorItem::where('vendor_id', '=', $argId)->count();

        $varPaginationCount = ceil($varCheckDataInSlot / $varTotalRecords);

        $varView = view('admin.vendoritem.table')->with([
            'arrRecords' => $arrRecords, 'varTotal' => $varTotal, 'varPaginationCount' => $varPaginationCount, 'argSlot' => $argSlot, 'argPageno' => $argPageno, 'argSearchValue' => $argSearchValue, 'varTotalNoOfPages' => $varTotalNoOfPages, 'varRecordsForNext' => $varRecordsForNext, 'argOrderIn' => $argOrderIn, 'orderBy' => $orderBy, 'argId' => $argId,
        ])->render();
        return response()->json(['html' => $varView]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id = null)
    {
        /*
       $brandName = "";
       
        $vendorName="";
        $className="";
         
       $vendorItem=Db::table('vendor_items')->where('id','=',$id)->first();
      
       if(!empty($vendorItem)){
         $brandName = $vendorItem->brand_name;
       
         $vendorName=$vendorItem->vendor_name;
         $className=$vendorItem->item_class_name;
       }
       $brand=Brand::firstOrCreate(['brand_name'=>$brandName]);
       $vendor=Vendor::firstOrCreate(['vendor_name'=>$vendorName]);
       $itemClass=ItemClass::firstOrCreate(['class_name'=>$className]);
       $vendorItem->brand_id=$brand->id;
       $vendorItem->vendor_id=$vendor->id;
       $vendorItem->item_class_id=$itemClass->id;
       
       echo '<pre>';
       print_r($vendorItem);
       die;
        
    */
      
   
  
    
        if ($request->isMethod('GET')) {
            $objData = VendorItem::find($id);
            $objVebdorData = Vendor::where('id', '=', $objData->vendor_id)->first(['id', 'vendor_name']);

            return view('admin.vendoritem.editvendor-item')->with(['objVebdorData' => $objVebdorData, 'objData' => $objData, 'arrVendorData' => $this->getVendor(), 'arrBrandData' => $this->getBrand(), 'arrClassData' => $this->getItemClass(), 'arrMeasureUnit' => $this->getMeasureUnit()]);
        }
        if ($request->isMethod('POST')) {
            $varId = request('id');
            $validator = validator()->make($request->all(), [
                'vendor_id' => 'required',
                'brand_id' => 'required',
                'item_class_id' => 'required',
                'measure_unit' => 'required',
                'item_title' => 'required',
                'item_price' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }

            $obj = VendorItem::where('id', '=', $varId)->first();
          //  $obj->vendor_id = request('vendor_id');
            $obj->vendor_id = $vendor->id;
            $obj->brand_id = request('brand_id');
           // $obj->brand_id = $brand->id;
            $obj->item_class_id = request('item_class_id');
            //$obj->item_class_id =$class->id ;
            $obj->item_class_id = request('item_class_id');
            $obj->measure_unit = request('measure_unit');
            $obj->item_title = request('item_title');
            $obj->item_price = request('item_price');
            $obj->item_code = request('item_code');
            $obj->pack_per_case = request('pack_per_case');
            $obj->pack_size = request('pack_size');
            $obj->item_catch_weight = request('item_catch_weight');
            $obj->item_description = request('item_description');
            $obj->is_active = (!empty(request('is_active')) ? request('is_active') : 0);
            $obj->save();

            $varUrl = route('vendor-item', ['vnId' => $obj['vendor_id']]);
            // print_r($varUrl);
            // die;
            return response()->json(['success' => true, 'errors' => ['Data Saved'], 'tosatrMessage' => 'Data Updated Successfully', 'url' => $varUrl]);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objData = VendorItem::find($id);
        $objData->is_active = 0;
        $objData->is_deleted = 1;
        $objData->update();
        return response()->json(['success' => true, 'errors' => ['Data Deleted Successfully']]);
    }

    /**
     * ApplyActions
     *
     * @return void
     */
    public function applyActions(Request $request)
    {
        if (!empty(request('ids'))) {
            $varAction = (request('action') == 'active') ? 1 : 0;
            if (request('action') == 'delete') {
                VendorItem::whereIn('id', explode(",", request('ids')))->update(['is_active' => '0', 'is_deleted' => '1']);
            } else {
                VendorItem::whereIn('id', explode(",", request('ids')))->update(['is_active' => $varAction, 'is_deleted' => '0']);
            }
            return response()->json(['success' => true, 'errors' => ['Data Deleted Successfully']]);
        }
    }

    /**
     * view
     *
     * @param  mixed $id
     * @return void
     */
    public function view($argvnId = null, $id)
    {
        $objData = VendorItem::find($id);
        return view('admin.vendoritem.view-vendor-item')->with(['objRecord' => $objData]);
    }
    /**
     * getVendor
     *
     * @return void
     */
    public function getVendor()
    {
        return Vendor::where('is_active', '=', '1')->get(['id', 'vendor_name']);
    }
    /**
     * getBrand
     *
     * @return void
     */
    public function getBrand()
    {
        return Brand::where('is_active', '=', '1')->get(['id', 'brand_name']);
    }
    /**
     * getItemClass
     *
     * @return void
     */
    public function getItemClass()
    {
        return ItemClass::where('is_active', '=', '1')->get(['id', 'class_name']);
    }
    /**
     * getMeasureUnit
     *
     * @return void
     */
    public function getMeasureUnit()
    {
        return MeasureUnit::where('is_active', '=', '1')->get(['id', 'unit_name']);
    }

    public function import(Request $request)
    {
        // echo"<pre>";
        // print_r($request->all());die;
        // $file=$request->file('file');
       // $data= Excel::import(new VendorItemImport, request()->file('file'));
       // dd($file);
       //$path= request()->file('file')->getRealPath();
       //$data = Excel::load($path, function($reader) {})->get();
      
       //$rows = Excel::import(new CsvImport, $path);
        $path = $request->file('file')->getRealPath();
        $line=0;
        //echo"<pre>";
       // print_r($request->all());die;
       // $rows = Excel::import(new CsvImport, $path);
        //Excel::import($request->file('file'),$path, function ($reader) {
          //   foreach ($reader->toArray() as $row) {
            //         dd($row);
             //}
        //});
        // $data = Excel::toArray(new VendorItemImport,request()->file('file'));
        // echo"<pre>";
        // print_r($path);die;
          $f_pointer=fopen($path,"r"); // file pointer

        while(! feof($f_pointer)){
        $data[]=$tempData=fgetcsv($f_pointer);
        $line++;
            // echo"<pre>";
            //  print_r($tempData);
            //  die;
        // echo "<br>";
 ////////////////////////////////////////
       $book=array();
        list(
             $book['Item_Code'],
             $book['Item_Name'],
             $book['Item_price'],
             $book['Vendor'],
             $book['Brand'],
             $book['Class'],
             $book['Description'],
             $book['Pack Per Case'],
             $book['Pack Size'],
             $book['Unit_of_Measure'],
             $book['Catch_Weight'],
        ) = $tempData;
          echo"<pre>";
             print_r($book);
             die;
        $csv_errors=Validator::make($book,(new CsvImportRequest)->rules())->errors();
        if($csv_errors->any())
        {
            return redirect()->route('vendor-item')->withErrors($csv_errors,'import')
                                                   ->with('error_line',$line);
        }
///////////////////////
        }


    if($data && count($data) >0){
     unset($data[0]);
    }
      // dd($array);
        //print_r('success');
       
        //echo count($data);die;
       // echo"<pre>";
       // print_r($data);die;
        foreach($data as $name)
       {

            
            if($name)
            {

           // foreach($values as $item=>$name)
           // {
               
               $itemCodeName=trim($name[0]); 
               $vendor_item=VendorItem::where('item_code','=',$itemCodeName)->first();
               
               if(!$vendor_item){
                  $vendor_item=new VendorItem;
               }
                $brandName= $name[4];
            
                $vendorName= $name[3];
                $className= $name[5];//
                $measure=$name[9];
                
               // $vendor=Vendor::firstOrCreate(['vendor_name'=>$vendorName]);
                $vendor=Vendor::updateOrCreate(['vendor_name'=>$vendorName]);
                // dd($vendor);//
                //$brand=Brand::firstOrCreate(['brand_name'=>$brandName]);
                 $brand=Brand::updateOrCreate(['brand_name'=>$brandName]);
                //dd($brand->id);
               // $className=ItemClass::firstOrCreate(['class_name'=>$className]);
                $className=ItemClass::updateOrCreate(['class_name'=>$className]);
                //dd($className->id);
                //$measureUnitName=MeasureUnit::firstOrCreate(['unit_name'=>$measure]);
                $measureUnitName=MeasureUnit::updateOrCreate(['unit_name'=>$measure]);
                
               
                $vendor_item->vendor_id=$vendor->id;
                $vendor_item->brand_id=$brand->id; 
                $vendor_item->item_class_id=$className->id;
                
               // $vendor_item->measure_unit =$name['unit_of_measure'];
                $vendor_item->measure_unit =$measureUnitName->id;

                $vendor_item->item_code=$name[0];
                $vendor_item->item_title=$name[1];
                $vendor_item->item_price=$name[2];
                $vendor_item->item_description=$name[6];
                $vendor_item->pack_per_case=$name[7];
                $vendor_item->pack_size=$name[8];
                $vendor_item->item_catch_weight=$name[10];
                $vendor_item->is_active=1;
                   // echo"<pre>";
                   //print_r($vendor_item);die;
                
                 $data=$vendor_item->save();
                  
             }
                if ($data){
                return redirect()->route('vendor-item')->with('success',"File is imported successfully");
               
           // }

          }

        }
    }


    ////////////code for editing of vendor items //////////////

    


}
