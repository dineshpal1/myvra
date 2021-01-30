<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VendorItem extends Model
{
    protected $fillable = ['item_title','item_code','item_price','vendor_id','brand_id','item_class_id','item_description','pack_per_case','pack_size','measure_unit','item_catch_weight','is_active','brand_name','vendor_name','item_class_name','measure_unit_name'];
    use HasFactory;

    public static function boot()
    {
        // Order by Created at ASC
        parent::boot();
        static::addGlobalScope('is_deleted', function (Builder $builder) {
            $builder->orderBy('created_at', 'asc')->where('is_deleted', '=', '0');
        });
        return true;
    }

    public static function getVendorName($argId=null){
        return !empty($argId)?Vendor::where('id',$argId)->pluck('vendor_name')->first():'N/A';
    }
}
