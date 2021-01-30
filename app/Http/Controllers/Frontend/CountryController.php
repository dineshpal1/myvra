<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Country;
// use Illuminate\Http\Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.country.index');
    }

    public function getCountryList($argPageno, $argSlot = null, $argOrderIn = null, $orderBy = null, $argSearchValue = null)
    {
        //  print_r($argRecordsPerPage);
        $argOrderIn = !empty($argOrderIn) ? $argOrderIn : 'created_at';
        $orderBy = !empty($orderBy) ? $orderBy : 'desc';
        $argSlot = empty($argSlot) ? 1 : $argSlot;

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

        $arrCountry = Country::skip($varStartingRecords)->take($varTotalRecords)->where('country_name', 'LIKE', '%' . $argSearchValue . '%')->orderBy($argOrderIn, $orderBy)->get();
        $varCheckDataInSlot = Country::skip($varSlotStarting)->take(($varTotalNoOfPages * $varTotalRecordsPerPage))->orderBy($argOrderIn, $orderBy)->get()->count();

        $varTotalCountry = Country::count();
        $varPaginationCount = ceil($varCheckDataInSlot / $varTotalRecords);

        $varView = view('admin.country.table')->with([
            'arrCountry' => $arrCountry, 'varTotal' => $varTotalCountry, 'varPaginationCount' => $varPaginationCount, 'argSlot' => $argSlot, 'argPageno' => $argPageno, 'argSearchValue' => $argSearchValue, 'varTotalNoOfPages' => $varTotalNoOfPages, 'varRecordsForNext' => $varRecordsForNext, 'argOrderIn' => $argOrderIn, 'orderBy' => $orderBy,
        ])->render();
        return response()->json(['html' => $varView]);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('admin.country.addcountry');
        }
        if ($request->isMethod('POST')) {
            $validator = validator()->make($request->all(), [
                'country_name' => 'required|unique:countries,country_name',
                'country_code' => 'required|max:4|unique:countries,country_code',
                'country_code_iso' => 'required|max:4|unique:countries,country_code_iso',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }

            $obj = new Country();
            $obj->country_name = request('country_name');
            $obj->country_code = request('country_code');
            $obj->country_code_iso = request('country_code_iso');
            $obj->is_active = (!empty(request('is_active')) ? request('is_active') : 0);
            $obj->save();

            return response()->json(['success' => true, 'errors' => ['Data Saved'], 'tosatrMessage' => 'Data Added Successfully']);
        }
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $objData = Country::find($id);

        $objData->is_active = 0;
        $objData->is_deleted = 1;
        $objData->update();
        return response()->json(['success' => true, 'errors' => ['Data Deleted Successfully']]);
    }

    /**
     * edit
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function edit(Request $request, $id = null)
    {

        if ($request->isMethod('GET') && !empty($id)) {
            $objData = Country::find($id);
            return view('admin.country.editcountry')->with('objRecord', $objData);
        }
        if ($request->isMethod('POST')) {
            $varId = request('id');
            $validator = validator()->make($request->all(), [
                'country_name' => 'required|unique:countries,country_name,'.$varId,
                'country_code' => 'required|max:4|unique:countries,country_code,'.$varId,
                'country_code_iso' => 'required|max:4|unique:countries,country_code_iso,'.$varId,
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }

            $obj = Country::where('id', '=', $varId)->first();
            $obj->country_name = request('country_name');
            $obj->country_code = request('country_code');
            $obj->country_code_iso = request('country_code_iso');
            $obj->is_active = (!empty(request('is_active')) ? request('is_active') : 0);
            $obj->save();

            return response()->json(['success' => true, 'errors' => ['Data Saved'], 'tosatrMessage' => 'Data Updated Successfully']);
        }
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
                Country::whereIn('id', explode(",", request('ids')))->update(['is_active' => '0', 'is_deleted' => '1']);
            } else {
                Country::whereIn('id', explode(",", request('ids')))->update(['is_active' => $varAction, 'is_deleted' => '0']);
            }
            return response()->json(['success' => true, 'errors' => ['Data Deleted Successfully']]);
        }
    }
}
