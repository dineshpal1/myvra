<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use DB;
class CustomerExport implements FromCollection,WithHeadings
{
	use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

       // return Customer::all();
    	$showAllCustomer=DB::table('customers')
    					->select('customers.customer_code','customers.email','customers.customer_name','customers.restaurant_address','customers.city','customers.phone','countries.country_name as country_name','states.state_name as state_name')
    					->join('countries','customers.country_id','=','countries.id')
    					->join('states','customers.state_id','=','states.id')
    					->get();
    					return $showAllCustomer;

    }
    public function headings():array
    {
    	return [
    			'customer_code',
    			'email',
    			'customer_name',
    			'restaurant_address',
    			'city',
    			'phone',
    			'country_name',
    			'state_name',
    			

    	];
    }
}
