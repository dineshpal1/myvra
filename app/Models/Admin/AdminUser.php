<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminUser extends Model
{
    use HasFactory;

    protected $table="administrators";
}
