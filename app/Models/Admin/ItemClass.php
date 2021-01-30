<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemClass extends Model
{
    use HasFactory;
   protected $fillable=['class_name'];
    public static function getTitle($argid = null)
    {
        $arrvar[] = !empty($argid) ? self::where('id', '!=', $argid)->pluck('class_name', 'id')->first() : self::where('parent_id', '=', null)->pluck('class_name', 'id');
        return $arrvar;
    }

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
