<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    //public $table ='customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_code',
        'email',
        'password',
        'customer_name',
        'restaurant_name',
        'restaurant_address',
        'country_id',
        'state_id',
        'city',
        'phone',
        'referral_code',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        // Order by Created at ASC
        parent::boot();
        static::addGlobalScope('is_deleted', function (Builder $builder) {
         $builder->orderBy('created_at', 'asc')->where('is_deleted', '=', '0');
        });
        return true;
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
