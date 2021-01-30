<?php

namespace App\Http\Controllers\Admin;

use App\Models\State;
use App\Models\Country;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\CustomerExport;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.customer.index');
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

            return view('admin.customer.addcustomer')->with('arrData', $this->getCountry());
        }
        if ($request->isMethod('POST')) {

            $validator = validator()->make($request->all(), [
                'customer_code' => 'required',
                'restaurant_name' => 'required',
                //'country_id' => 'required',
                //'state_id' => 'required',
                // 'city' => 'required',
                'restaurant_address' => 'required',
                'customer_name' => 'required',
                'phone' => 'nullable|numeric|digits:10',
                'email' => 'required|email',
                'password' => 'required|min:4',

            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }

            $obj = new Customer();
            $obj->customer_code = request('customer_code');
            $obj->restaurant_name = request('restaurant_name');
            $obj->customer_code = request('customer_code');
            $obj->country_id = request('country_id');
            $obj->state_id = request('state_id');
            $obj->city = request('city');
            $obj->restaurant_address = request('restaurant_address');
            $obj->customer_name = request('customer_name');
            $obj->phone = request('phone');
            $obj->email = request('email');
            $obj->password = md5(request('password'));
            $obj->referral_code = request('referral_code');
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
        $varTotalRecordsPerPage = 5;
        $varTotalNoOfPages = 5;
        $varCheckDataInSlot = 0;
        $varRecordsForNext = $varTotalNoOfPages * $varTotalRecordsPerPage * $argSlot;
        $varSlotStarting = ($argSlot - 1) * ($varTotalRecordsPerPage * $varTotalNoOfPages);
        //here
        $varTotalRecords = ($argPageno * $varTotalRecordsPerPage) / $argPageno;
        $varStartingRecords = ($argPageno - 1) * $varTotalRecords;
     

        /*$arrRecords = Customer::skip($varStartingRecords)->take($varTotalRecords)->where('restaurant_name', 'LIKE', '%' . $argSearchValue . '%')->orWhere('email', 'LIKE', '%' . $argSearchValue . '%')->orderBy($argOrderIn, $orderBy)->get();
        $varCheckDataInSlot = Customer::skip($varSlotStarting)->take(($varTotalNoOfPages * $varTotalRecordsPerPage))->orderBy($argOrderIn, $orderBy)->get()->count();*/

        $arrRecords = Customer::skip($varStartingRecords)->take($varTotalRecords)->where('restaurant_name', 'LIKE', '%' . $argSearchValue . '%')->orWhere('email', 'LIKE', '%' . $argSearchValue . '%')->orWhere('city', 'LIKE', '%' . $argSearchValue . '%')->orWhere('phone', 'LIKE', '%' . $argSearchValue . '%')->orWhere('restaurant_address', 'LIKE', '%' . $argSearchValue . '%')->orderBy($argOrderIn, $orderBy)->get();
        $varCheckDataInSlot = Customer::skip($varSlotStarting)->take(($varTotalNoOfPages * $varTotalRecordsPerPage))->orderBy($argOrderIn, $orderBy)->get()->count();

        $varTotal = Customer::count();
        $varPaginationCount = ceil($varCheckDataInSlot / $varTotalRecords);

        $varView = view('admin.customer.table')->with([
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
    public function edit(Request $request, $id = null)
    {
        if ($request->isMethod('GET') && !empty($id)) {
            $objData = Customer::find($id);
            return view('admin.customer.editcustomer')->with(['objRecord' => $objData, 'arrData' => $this->getCountry()]);
        }
        if ($request->isMethod('POST')) {
            // print_r(request('is_active'));
            // die;
            $validator = validator()->make($request->all(), [
                'customer_code' => 'required',
                'restaurant_name' => 'required',
                //'country_id' => 'required',
                // 'state_id' => 'required',
                //'city' => 'required',
                'restaurant_address' => 'required',
                'customer_name' => 'required',
                'phone' => 'nullable|numeric|digits:10',
                'email' => 'required|email',
                //'password' => 'required|min:4',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }

            $obj = Customer::where('id', '=', request('id'))->first();
            $obj->customer_code = request('customer_code');
            $obj->restaurant_name = request('restaurant_name');
            $obj->customer_code = request('customer_code');
            $obj->country_id = request('country_id');
            $obj->state_id = request('state_id');
            $obj->city = request('city');
            $obj->restaurant_address = request('restaurant_address');
            $obj->customer_name = request('customer_name');
            $obj->phone = request('phone');
            $obj->email = request('email');
            $obj->password = $obj->password;
            $obj->referral_code = request('referral_code');
            $obj->is_active = (!empty(request('is_active')) ? request('is_active') : 0);
            $obj->save();

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
        $objData = Customer::find($id);
        $objData->is_active = 0;
        $objData->is_deleted = 1;
        $objData->update();
        return response()->json(['success' => true, 'errors' => ['Data Deleted Successfully']]);
    }

    public function getSateByCountry(Request $request, $argId = null, $argSelected = null)
    {
        // print_r($argSelected);
        // die;
        $varOptions = '
        <option value="">No States Available!</option>';
        $arrResponse = ['success' => false, 'html' => $varOptions];
        if (!empty($argId)) {
            $arrStates = State::where([['is_active', '=', '1'], ['country_id', '=', $argId]])->get(['id', 'state_name'])->toArray();
            if (!empty($arrStates)) {
                $varOptions = '<option value="">Select State !</option>';
                foreach ($arrStates as $objState) {
                    $varOptions .= '<option ' . (!empty($argSelected) && $argSelected == $objState['id'] ? "selected" : '') . ' value="' . $objState['id'] . '">' . $objState['state_name'] . '</option>';
                }
                $arrResponse['success'] = true;
                $arrResponse['html'] = $varOptions;
            }
        }
        return $arrResponse;
    }

    public function getCountry()
    {
        return $arrCountry = Country::where('is_active', '=', '1')->get();
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
                Customer::whereIn('id', explode(",", request('ids')))->update(['is_active' => '0', 'is_deleted' => '1']);
            } else {
                Customer::whereIn('id', explode(",", request('ids')))->update(['is_active' => $varAction, 'is_deleted' => '0']);
            }
            return response()->json(['success' => true, 'errors' => ['Data Deleted Successfully']]);
        }
    }

    public function view($id)
    {
        $objData = Customer::find($id);
        return view('admin.customer.viewcustomer')->with(['objRecord' => $objData, 'arrData' => $this->getCountry()]);
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
         return Excel::download(new CustomerExport, 'customer.xlsx');
        /*
        return[

            (new CustomerExport)->withFilename('users-' . time() . '.xlsx'),

        ];
*/
    }
}
