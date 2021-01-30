<?php

namespace App\Imports;

// use App\Models\VendorItem;

use App\Models\Admin\Brand;
use App\Models\Admin\Vendor;
use App\Models\Admin\ItemClass;
use App\Models\Admin\VendorItem;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VendorItemImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // print_r($row[$var]);
        // die;
        // Log::info($row);
       
       return VendorItem::all();
        // return new VendorItem([

        //     'item_title' => $row['item_name'],
        //   //  'vendor_name' =>$row['vendor'],
        //  //   'brand_name' => $row['brand'],
        //   //  'item_class_name' =>$row['class'],
        //    // 'measure_unit_name' =>$row['Unit_of_Measure'],
        //     'item_code' => $row['item_code'],
        //     'item_price' => $row['item_price']??null,
        //     'item_description' => $row['description']??null,
        //     'pack_per_case' => $row['pack_per_case'],
        //     'pack_size' => $row['pack_size'],
        //     'measure_unit' => $row['unit_of_measure']??null,
        //     'item_catch_weight' => $row['catch_weight']??null,
        //     'is_active'=>'1'
        // ]);
    }
}
