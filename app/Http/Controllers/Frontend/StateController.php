<?php

namespace App\Http\Controllers\Frontend;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    public function index($id = 0)
    {
        $states = State::where('country_id', $id)->pluck('state_name', 'id');
        return response()->json(['success' => true, 'data' => $states]);
    }

    public function index2()
    {
        return view('admin.state.index');
    }

    public function getStateList($argPageno, $argSlot = null,$argOrderIn = null, $orderBy = null, $argSearchValue = null)
    {
        //  print_r($argRecordsPerPage);
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

        $arrState = State::skip($varStartingRecords)->take($varTotalRecords)->where('state_name', 'LIKE', '%' . $argSearchValue . '%')->orderBy($argOrderIn, $orderBy)->get();
        $varCheckDataInSlot = State::skip($varSlotStarting)->take(($varTotalNoOfPages * $varTotalRecordsPerPage))->orderBy($argOrderIn, $orderBy)->get()->count();

        $varTotalState = State::count();
        $varPaginationCount = ceil($varCheckDataInSlot / $varTotalRecords);

        $varView = view('admin.state.table')->with([
            'arrState' => $arrState, 'varTotal' => $varTotalState, 'varPaginationCount' => $varPaginationCount, 'argSlot' => $argSlot, 'argPageno' => $argPageno, 'argSearchValue' => $argSearchValue, 'varTotalNoOfPages' => $varTotalNoOfPages, 'varRecordsForNext' => $varRecordsForNext, 'argOrderIn' => $argOrderIn, 'orderBy' => $orderBy,
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
            return view('admin.state.addstate');
        }
        if ($request->isMethod('POST')) {

            $validator = validator()->make($request->all(), [
                'country_id' => 'required',
                'state_name' => 'required|unique:states,state_name',
                'state_code' => 'required|max:4|unique:states,state_code',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }

            $obj = new State();
            $obj->country_id = request('country_id');
            $obj->state_name = request('state_name');
            $obj->state_code = request('state_code');
            $obj->is_active = (!empty(request('is_active')) ? request('is_active') : 0);
            $obj->save();

            return response()->json(['success' => true, 'errors' => ['Data Saved'],'tosatrMessage'=>'Data Added Successfully']);
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
        $objData = State::find($id);

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
            $objData = State::find($id);
            return view('admin.state.editstate')->with('objRecord', $objData);
        }
        if ($request->isMethod('POST')) {
        
            $varId = request('id');
            $validator = validator()->make($request->all(), [
                'country_id' => 'required',
                'state_name' => 'required|unique:states,state_name,'. $varId ,
                'state_code' => 'required|max:4|unique:states,state_code,'. $varId ,
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }

            $obj = State::where('id', '=',$varId)->first();
            $obj->country_id = request('country_id');
            $obj->state_name = request('state_name');
            $obj->state_code = request('state_code');
            $obj->is_active = (!empty(request('is_active')) ? request('is_active') : 0);
            $obj->save();

            return response()->json(['success' => true, 'errors' => ['Data Saved'],'tosatrMessage'=>'Data Updated Successfully']);
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
                State::whereIn('id', explode(",", request('ids')))->update(['is_active' => '0', 'is_deleted' => '1']);
            } else {
                State::whereIn('id', explode(",", request('ids')))->update(['is_active' => $varAction, 'is_deleted' => '0']);
            }
            return response()->json(['success' => true, 'errors' => ['Data Deleted Successfully']]);
        }
    }
}
