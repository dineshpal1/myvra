<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CsvImportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       // return false;
         return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file'=>'required|mimes:csv,txt',
            '0'=>'required|min:2|max:30|unique:vendor_items|regex:/^[a-zA-Z0-9@&*()+_|><?":$#%]+$/',
            '1' => 'required|min:2|max:30|regex:/^[a-zA-Z0-9 !@#$%^&*)(]{2,20}$/',
            '2' => 'required|regex:/^\d{0,8}(\.\d{1,4})?$/',
            '3' => 'required|min:2|max:50|regex:/^[a-zA-Z0-9 !@#$%^&*)(]{2,50}$/',
            '4'=> 'required|min:1|max:15|regex:/^[a-zA-Z0-9 !@#$%^&*)(]{2,15}$/',
            '5'=>'required|min:1|max:20|regex:/^[a-zA-Z0-9 !@#$%^&*)(]{1,20}$/',
            '6'=>'required|min:1|max:200|regex:/^[a-zA-Z0-9 !@#$%^&*)(]{1,200}$/',
            '7'=>'required|min:1|max:20|regex:/^[a-zA-Z0-9 !@#$%^&*)(]{1,20}$/',
            '8'=>'required|min:1|max:10|regex:/^[a-zA-Z0-9 !@#$%^&*)(]{1,10}$/',
            '9'=>'required|min:1|max:10|regex:/^[a-zA-Z0-9 !@#$%^&*)(]{1,10}$/',
        ];
    }
      /**
     * Custom message for validation
     *
     * @return array
     */
/*
    public function messages()
    {
         return [

            'email.required' => 'Email is required!',
            'name.required' => 'Name is required!',
            'password.required' => 'Password is required!'

        ];
       
    }*/
}
