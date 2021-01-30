<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable=['vendor_name'];
    public static function boot()
    {
        // Order by Created at ASC
        parent::boot();
        static::addGlobalScope('is_deleted', function (Builder $builder) {
            $builder->orderBy('created_at', 'asc')->where('is_deleted', '=', '0');
        });
        return true;
    }

    
}
