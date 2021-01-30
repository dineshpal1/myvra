<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Collection;
use App\Models\Country;
use App\Models\Admin\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.vendor.index');
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
            return view('admin.vendor.addvendor')->with('arrData', $this->getCountry());
        }
        if ($request->isMethod('POST')) {

            $validator = validator()->make($request->all(), [
                'vendor_name' => 'required',
                'vendor_branch' => 'required',
                'contact_email' => 'required|email',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }

            $obj = new Vendor();
            $obj->vendor_name = request('vendor_name');
            $obj->vendor_branch = request('vendor_branch');
            $obj->contact_email = request('contact_email');
            $obj->contact_name = request('contact_name');
            $obj->contact_number = request('contact_phone');
            $obj->country_id  = request('country_id');
            $obj->state_id  = request('state_id');
            $obj->city = request('city');
            $obj->vendor_address = request('vendor_address');
            $obj->is_active = (!empty(request('is_active')) ? request('is_active') : 0);
            $obj->save();

            return response()->json(['success' => true, 'errors' => ['Data Saved'], 'tosatrMessage' => 'Data Added Successfully']);
        }
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
        //    $argRecordsPerPage = empty($argRecordsPerPage) ? 10 : $argRecordsPerPage;

        //here
        $arrActiveVendors=Vendor::where('is_active','=','1')->get(['id', 'vendor_name']);
      
        $varTotalRecordsPerPage = 5;
        $varTotalNoOfPages = 5;
        $varCheckDataInSlot = 0;
        $varRecordsForNext = $varTotalNoOfPages * $varTotalRecordsPerPage * $argSlot;
        $varSlotStarting = ($argSlot - 1) * ($varTotalRecordsPerPage * $varTotalNoOfPages);
        //here
        $varTotalRecords = ($argPageno * $varTotalRecordsPerPage) / $argPageno;
        $varStartingRecords = ($argPageno - 1) * $varTotalRecords;

        $arrRecords = Vendor::skip($varStartingRecords)->take($varTotalRecords)->where('vendor_name', 'LIKE', '%' . $argSearchValue . '%')->orWhere('contact_email', 'LIKE', '%' . $argSearchValue . '%')->orWhere('vendor_branch', 'LIKE', '%' . $argSearchValue . '%')->orderBy($argOrderIn, $orderBy)->get();
        $varCheckDataInSlot = Vendor::skip($varSlotStarting)->take(($varTotalNoOfPages * $varTotalRecordsPerPage))->orderBy($argOrderIn, $orderBy)->get()->count();

        $varTotal = Vendor::count();
        $varPaginationCount = ceil($varCheckDataInSlot / $varTotalRecords);

        $varView = view('admin.vendor.table')->with([
            'arrRecords' => $arrRecords, 'varTotal' => $varTotal, 'varPaginationCount' => $varPaginationCount, 'argSlot' => $argSlot, 'argPageno' => $argPageno, 'argSearchValue' => $argSearchValue, 'varTotalNoOfPages' => $varTotalNoOfPages, 'varRecordsForNext' => $varRecordsForNext, 'argOrderIn' => $argOrderIn, 'orderBy' => $orderBy,'arrActiveVendors'=>$arrActiveVendors
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
        if ($request->isMethod('GET') && !empty($id)) {
            $objData = Vendor::find($id);
            return view('admin.vendor.editvendor')->with(['objRecord'=> $objData,'arrData'=>$this->getCountry()]);
        }
        if ($request->isMethod('POST')) {
            $varId = request('id');
            $validator = validator()->make($request->all(), [
                'vendor_name' => 'required',
                'vendor_branch' => 'required',
                'contact_email' => 'required|email',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }

            $obj = Vendor::where('id', '=', $varId)->first();
            $obj->vendor_name = request('vendor_name');
            $obj->vendor_branch = request('vendor_branch');
            $obj->contact_email = request('contact_email');
            $obj->contact_name = request('contact_name');
            $obj->contact_number = request('contact_phone');
            $obj->country_id  = request('country_id');
            $obj->state_id  = request('state_id');
            $obj->city = request('city');
            $obj->vendor_address = request('vendor_address');
            $obj->is_active = (!empty(request('is_active')) ? request('is_active') : 0);
            $obj->save();

            return response()->json(['success' => true, 'errors' => ['Data Saved'], 'tosatrMessage' => 'Data Updated Successfully']);
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
        $objData = Vendor::find($id);
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
                Vendor::whereIn('id', explode(",", request('ids')))->update(['is_active' => '0', 'is_deleted' => '1']);
            } else {
                Vendor::whereIn('id', explode(",", request('ids')))->update(['is_active' => $varAction, 'is_deleted' => '0']);
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
    public function view($id)
    {
        $objData = Vendor::find($id);
        return view('admin.vendor.view-vendor')->with(['objRecord' => $objData]);
    }
    public function getCountry()
    {
        return $arrCountry = Country::where('is_active', '=', '1')->get();
    }

    public function vendorMerge(Request $request)
    {
     
        
        $existing_vendor_id=$request->existing_vendor;
        $existing_vendor_details=Vendor::findOrFail($existing_vendor_id)->toArray();
       // echo"<pre>";
       // print_r($existing_vendor_details);die;
        $selected_vendor_to_merge_id=$request->vendorid;
        $selected_vendor_to_merge_details=Vendor::findOrFail($selected_vendor_to_merge_id);
        $current_status=$request->current_status;
        if($current_status==1)
        {
          $selected_vendor_to_merge_details->is_active=1; 
          $selected_vendor_to_merge_details->save(); 

          //return redirect()->route("vendor");
          return redirect()->route('vendor')->with('success',"Vendor is activated successfully");
        }else if($current_status==2)
        {
            $existing = collect($existing_vendor_details);
            // echo"<pre>";
            // print_r($existing);die;
            $to_be_merge = collect($selected_vendor_to_merge_details);
            // echo"<pre>";
            // print_r($to_be_merge);die;
            $merged = $to_be_merge->merge($existing)->toArray();
            //echo"<pre>";
          //  print_r($merged);die;
           
            //echo $existing['id'];die;
          //  echo $existing_vendor_details['id'];die;
              $data= Vendor::where('id', '=', $existing_vendor_details['id'])->first();
           //  $data=Vendor::findOrFail('id',$existing_vendor_details['id'])->first();//->update($merged);
              $data->update($merged);
         
            
            if($data)
            {

             return redirect()->route('vendor')->with('success',"Vendor is merged successfully");
            }else{
                return redirect()->route('vendor')->with('error',"Woops!!! There is something worng,Please try again later"); 
            }

        }else{    return redirect()->route('vendor')->with('error',"Woops!!! There is something worng,Please try again later"); 
        }
       
    }
}
