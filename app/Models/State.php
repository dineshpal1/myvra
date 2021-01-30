<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
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
    public static function getState($argid = null)
    {
       print_r($argid);
       die;
        return isset($argid) && !empty($argid) ? State::where('id', $argid)->pluck('state_name', 'id')->first() : State::all()->pluck('state_name', 'id');

    }
     public function customers()
     {
        return $this->hasMany(Customer::class);
        //return $this->hasOne(Customer::class);
     }

}
