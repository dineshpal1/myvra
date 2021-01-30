<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\MeasureUnit;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MeasureUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.measureunit.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('admin.measureunit.addmeasure-unit');
        }
        if ($request->isMethod('POST')) {

            $validator = validator()->make($request->all(), [
                'unit_name' => 'required|unique:measure_units,unit_name',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }

            $obj = new MeasureUnit();
            $obj->unit_name = request('unit_name');
            $obj->is_active = (!empty(request('is_active')) ? request('is_active') : 0);
            $obj->save();
            return response()->json(['success' => true, 'errors' => ['Data Saved'],'tosatrMessage'=>'Data Added Successfully']);
        }
    }

    /**
     * Display the specified table.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getList($argPageno, $argSlot = null,$argOrderIn = null, $orderBy = null, $argSearchValue = null)
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
        // $varUserId = Session::get('admin')['id'];;

        $arrRecords = MeasureUnit::skip($varStartingRecords)->take($varTotalRecords)->where('unit_name', 'LIKE', '%' . $argSearchValue . '%')->orderBy($argOrderIn, $orderBy)->get();
        $varCheckDataInSlot = MeasureUnit::skip($varSlotStarting)->take(($varTotalNoOfPages * $varTotalRecordsPerPage))->orderBy($argOrderIn, $orderBy)->get()->count();

        $varTotal = MeasureUnit::count();
        $varPaginationCount = ceil($varCheckDataInSlot / $varTotalRecords);

        $varView = view('admin.measureunit.table')->with([
            'arrRecords' => $arrRecords, 'varTotal' => $varTotal, 'varPaginationCount' => $varPaginationCount, 'argSlot' => $argSlot, 'argPageno' => $argPageno, 'argSearchValue' => $argSearchValue, 'varTotalNoOfPages' => $varTotalNoOfPages, 'varRecordsForNext' => $varRecordsForNext, 'argOrderIn' => $argOrderIn, 'orderBy' => $orderBy,
        ])->render();
        return response()->json(['html' => $varView]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id=null)
    {
        if ($request->isMethod('GET') && !empty($id)) {
            $objData = MeasureUnit::find($id);
            return view('admin.measureunit.editmeasure-unit')->with('objRecord', $objData);
        }
        if ($request->isMethod('POST')) {
        $varId = request('id');
            $validator = validator()->make($request->all(), [
                'unit_name' => 'required|unique:measure_units,unit_name,'.$varId,
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }

            $obj = MeasureUnit::where('id', '=', $varId)->first();
            $obj->unit_name = request('unit_name');
            $obj->is_active = (!empty(request('is_active')) ? request('is_active') : 0);
            $obj->save();
            return response()->json(['success' => true, 'errors' => ['Data Saved'],'tosatrMessage'=>'Data Updated Successfully']);
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
        $objData = MeasureUnit::find($id);

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
                MeasureUnit::whereIn('id', explode(",", request('ids')))->update(['is_active' => '0', 'is_deleted' => '1']);
            } else {
                MeasureUnit::whereIn('id', explode(",", request('ids')))->update(['is_active' => $varAction, 'is_deleted' => '0']);
            }
            return response()->json(['success' => true, 'errors' => ['Data Deleted Successfully']]);
        }
    }

    public function conversion(Request $request)
    {
                //$data = $request->all();
               // print_r($data);die;
        $value=$request->value;
         //$converted_to=$request->to;
         $outputFormat=$request->to;
        //echo $value;
        //echo  $converted_to;
         //echo $outputFormat;die;
        ///exit;$inputNumber $inputFormat
        $outputNumber=0;

       // $numbers = preg_replace('/[^0-9]/', '', $value);
         $inputNumber = preg_replace('/[^0-9]/', '', $value);
       // $letters = preg_replace('/[^a-zA-Z]/', '', $value);
         $inputFormat = preg_replace('/[^a-zA-Z]/', '', $value);

        //echo $numbers;
        //echo $letters;
         //echo $inputNumber;
        // echo $inputFormat;
        // die;
        if ($numbers !=""){
            switch($inputFormat){
                case "meter":
                switch ($outputFormat){
                    case "yards": $outputNumber = $inputNumber*1.094;     //METER TO yards
                    break;
                    case "meter": $outputNumber = $inputNumber;     //METER TO METER
                    break; 
                    case "cm": $outputNumber = $inputNumber*100;   //METER TO CM
                    break;
                    case "feet": $outputNumber = $inputNumber*3.2808399; //METER TO FT
                    break;  
                    case "inches": $outputNumber = $inputNumber*39.3700787; //METER TO  INCHES
                    break;
                    case "mm": $outputNumber = $inputNumber*1000; //METER TO  INCHES
                    break;
                }
                  break;
                  case "cm":
                    switch ($outputFormat){
                    case "yards": $outputNumber = $inputNumber/91.44;     //cm TO yards
                    break;    
                    case "cm": $outputNumber = $inputNumber;     //cm TO cm
                    break; 
                    case "mm": $outputNumber = $inputNumber*10;   //  CM to mm
                    break;
                    case "feet": $outputNumber = $inputNumber/30.48; //cm TO FT
                    break;  
                    case "inches": $outputNumber = $inputNumber/2.54; //cm TO  INCHES
                    break;
                    case "meter": $outputNumber = $inputNumber/100; //cm TO METER   
                    break;

                }
                 break;
                  case "mm":
                    switch ($outputFormat){
                    case "yards": $outputNumber = $inputNumber/914;     //mm TO yards
                    break;  
                    case "mm": $outputNumber = $inputNumber;     //mm TO mm
                    break; 
                    case "cm": $outputNumber = $inputNumber/10;   //  mm to cm
                    break;
                    case "feet": $outputNumber = $inputNumber/305; //mm TO FT
                    break;  
                    case "inches": $outputNumber = $inputNumber/25.4; //mm TO  INCHES
                    break;
                    case "meter": $outputNumber = $inputNumber/1000; //mm TO METER   
                    break;
              }
              break;
              case "feet":
               switch ($outputFormat){
                    case "yards": $outputNumber = $inputNumber/3;     //feet TO yards
                    break;  
                    case "meter": $outputNumber = $inputNumber/3.28; //Ft TO METER   
                    break;
                    case "feet": $outputNumber = $inputNumber;     // FT TO FT
                    break; 
                    case "inches": $outputNumber = $inputNumber*12; //ft TO  INCHES
                    break;
                    case "cm": $outputNumber = $inputNumber*30.48;   //  ft to cm
                    break;
                    case "mm": $outputNumber = $inputNumber*305; //ft TO mm
                    break;  
                                    
              }
               break;
                case "inches":
                switch ($outputFormat){
                    case "yards": $outputNumber = $inputNumber/36;     //inches TO yards
                    break;  
                    case "meter": $outputNumber = $inputNumber/39.37; //inches TO METER   
                    break;
                    case "feet": $outputNumber = $inputNumber/12;     // inches TO FT
                    break; 
                    case "inches": $outputNumber = $inputNumber; //inches TO  INCHES
                    break;
                    case "cm": $outputNumber = $inputNumber*2.54;   // inches to cm
                    break;
                    case "mm": $outputNumber = $inputNumber*25.4; //inches TO mm
                    break;  

                }
                 break;
                case "yards":
                switch ($outputFormat){
                    case "yards": $outputNumber = $inputNumber;     //yards TO yards
                    break;  
                    case "meter": $outputNumber = $inputNumber*1.094; //yards TO METER   
                    break;
                    case "feet": $outputNumber = $inputNumber/3;     // yards TO FT
                    break; 
                    case "inches": $outputNumber = $inputNumber/36; //yards TO  INCHES
                    break;
                    case "cm": $outputNumber = $inputNumber/91.44;   // yards to cm
                    break;
                    case "mm": $outputNumber = $inputNumber/914; //yards TO mm
                    break;  

                }
    ///////For weight/////
                break;
                case "miligrams":
                switch ($outputFormat){
                    case "miligrams": $outputNumber = $inputNumber;     //mg TO mg
                    break;  
                    case "grams": $outputNumber = $inputNumber/1000; //mg TO g   
                    break;
                    case "pounds": $outputNumber = $inputNumber/453592;     // mg TO pound
                    break; 
                    case "ounces": $outputNumber = $inputNumber/28350;   // mg to ounces
                    break;
                    case "kilogram": $outputNumber = $inputNumber/1000000; //mg TO kg
                    break;  
                }
                 break;
                case "grams":
                switch ($outputFormat){
                    case "miligrams": $outputNumber = $inputNumber*1000;     //gm to mg
                    break;  
                    case "grams": $outputNumber = $inputNumber; //gm TO gm   
                    break;
                    case "pounds": $outputNumber = $inputNumber/454;     // gm TO pound
                    break; 
                    case "ounces": $outputNumber = $inputNumber/28.35;   // gm to ounces
                    break;
                    case "kilogram": $outputNumber = $inputNumber/1000; //gm TO kg
                    break;  
                }
                 break;
                case "pounds":
                switch ($outputFormat){
                    case "miligrams": $outputNumber = $inputNumber/453592;     //pounds to mg
                    break;  
                    case "grams": $outputNumber = $inputNumber/454; //pounds TO grams   
                    break;
                    case "pounds": $outputNumber = $inputNumber;     // pounds TO pound
                    break; 
                    case "ounces": $outputNumber = $inputNumber/16;   // pounds to ounces
                    break;
                    case "kilogram": $outputNumber = $inputNumber*2.20; //pounds TO kg
                    break;  
                }
                break;
                case "ounces":
                switch ($outputFormat){
                    case "miligrams": $outputNumber = $inputNumber/28350;     //ounces to mg
                    break;  
                    case "grams": $outputNumber = $inputNumber/28.35; //ounces TO grams   
                    break;
                    case "pounds": $outputNumber = $inputNumber/16;     //ounces to pounds 
                    break; 
                    case "ounces": $outputNumber = $inputNumber;   // ounces to ounces
                    break;
                    case "kilogram": $outputNumber = $inputNumber*35.274; //ounces TO kg
                    break;  
                }
                 break;
                case "kilogram":
                switch ($outputFormat){
                    case "miligrams": $outputNumber = $inputNumber*1000000;     //kilogram to mg
                    break;  
                    case "grams": $outputNumber = $inputNumber*1000; //kilogram TO grams   
                    break;
                    case "pounds": $outputNumber = $inputNumber*2.205;     //kilogram to pounds 
                    break; 
                    case "ounces": $outputNumber = $inputNumber*35.274;   // kilogram to ounces
                    break;
                    case "kilogram": $outputNumber = $inputNumber; //kilogram TO kg
                    break;  
                }
                    


            }
           // echo $outputNumber;

        }else{
            echo"Sorry!!No numeric value found for conversion";
        }

    }
}
