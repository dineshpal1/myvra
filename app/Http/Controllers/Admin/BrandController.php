<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brand.index');
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
            return view('admin.brand.addbrand');
        }
        if ($request->isMethod('POST')) {

            $validator = validator()->make($request->all(), [
                'brand_name' => 'required|unique:brands,brand_name',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }

            $obj = new Brand();
            $obj->brand_name = request('brand_name');
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
    public function getBrandList($argPageno, $argSlot = null, $argOrderIn = null, $orderBy = null, $argSearchValue = null)
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

        $arrRecords = Brand::skip($varStartingRecords)->take($varTotalRecords)->where('brand_name', 'LIKE', '%' . $argSearchValue . '%')->orderBy($argOrderIn, $orderBy)->get();
        $varCheckDataInSlot = Brand::skip($varSlotStarting)->take(($varTotalNoOfPages * $varTotalRecordsPerPage))->orderBy($argOrderIn, $orderBy)->get()->count();

        $varTotal = Brand::count();
        $varPaginationCount = ceil($varCheckDataInSlot / $varTotalRecords);

        $varView = view('admin.brand.table')->with([
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
            $objData = Brand::find($id);
            return view('admin.brand.editbrand')->with('objRecord', $objData);
        }
        if ($request->isMethod('POST')) {
            $varId = request('id');
            $validator = validator()->make($request->all(), [
                'brand_name' => 'required|unique:brands,brand_name,' . $varId,
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()]);
            }

            $obj = Brand::where('id', '=', $varId)->first();
            $obj->brand_name = request('brand_name');
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
        $objData = Brand::find($id);
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
                Brand::whereIn('id', explode(",", request('ids')))->update(['is_active' => '0', 'is_deleted' => '1']);
            } else {
                Brand::whereIn('id', explode(",", request('ids')))->update(['is_active' => $varAction, 'is_deleted' => '0']);
            }
            return response()->json(['success' => true, 'errors' => ['Data Deleted Successfully']]);
        }
    }
}
