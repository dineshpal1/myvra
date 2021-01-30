<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Menu_category extends Model
{
    use HasFactory;

     public $table ='menu_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 	  protected $fillable = ['customer_id','menu_category_name'];
    


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
