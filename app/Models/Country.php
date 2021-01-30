<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected static function getAllCountry()
    {
        $countries = Country::all();
        foreach ($countries as $country) {
            $arr[$country->id] = $country->name;
        }
        return $arr;
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
    public static function getTitle($argid = null)
    {
        $obj = self::where('id', '=', $argid)->first(['country_name','id']);

        // print_r($obj->country_name);
        // die;
        return !empty($obj->country_name) ? $obj->country_name :  Country::all()->pluck('country_name', 'id');

        // return !empty($argid) ? Country::where('id','=', $argid)->get('country_name') : Country::all()->pluck('country_name', 'id');
    }
}
