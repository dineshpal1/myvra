<?php

namespace App\Http\Controllers\Frontend;
use App\Shared\Common;
use App\Shared\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
//use App\Models\Admin\AdminUser;



class CustomerController extends Controller
{
    public function dashboard()
    {
    	return view("frontend.customers.dashboard");
    }
}
