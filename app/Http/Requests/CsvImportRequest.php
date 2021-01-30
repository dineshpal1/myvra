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
            'Item_Code'=>['required','min:2','max:255','unique:vendor_items','regex:/^[a-zA-Z0-9@&*()+_|><?":$#%]+$/'],
          //  'Item_Name' => ['required','min:2','max:255','regex:/^[a-zA-Z0-9!@#$%^&*)(]{2,255}+$/'],
           'Item_Name' =>['required','min:2','max:255','regex:/^[a-zA-Z0-9 @&*()+_|><?":$#%]+$/'],
           // 'Item_Name' => ['required','min:2','max:255','regex:/^[a-zA-Z0-9\-!,\'\"/@\.:\(\)#$%^&*)(]{2,255}+$/'],
             'Item_price' => ['required','regex:/^\d{0,8}(\.\d{1,4})?$/'],
             'Vendor' => ['required','min:2','max:250','regex:/^[a-zA-Z0-9 !@#$%^&*)(]{2,250}$/'],
             'Brand'=> ['required','min:1','max:255','regex:/^[a-zA-Z0-9 !@#$%^&*)(]{2,255}$/'],
             'Class'=>['required','min:1','max:255','regex:/^[a-zA-Z0-9 !@#$%^&*)(]{1,255}$/'],
             'Description'=>['required','min:10','max:200','regex:/^[a-zA-Z0-9 !@#$%^&*)(]{10,200}$/'],
             'Pack Per Case'=>['required','min:1','max:20','regex:/^[a-zA-Z0-9 !@#$%^&*)(]{1,20}$/'],
            'Pack Size'=>['required','min:1','max:10','regex:/^[a-zA-Z0-9 !@#$%^&*)(]{1,10}$/'],
             //'Unit_of_Measure'=>['required','min:2','max:20','regex:/^[a-zA-Z0-9 !@#$%^&*)(]{2,20}$/'],
             //'Unit_of_Measure'=>['required','min:2','max:20','regex:/^[a-zA-Z0]'


        ];
    }
      /**
     * Custom message for validation
     *
     * @return array
     */

    public function messages()
    {
         return [

            'Item_Code.required' => 'Item_Code is required!',
            'Item_Code.min' => 'Item_Code contains atleast 2 characters!',
            'Item_Code.max' => 'Item_Code can not exceeds 255 characters !',
            'Item_Code.unique' =>'Item_Code already taken !',
            'Item_Code.regex' =>'Item_Code contains invalid special characters !',

            'Item_Name.required' => 'Item_Name is required!',
            'Item_Name.min' => 'Item_Name contains atleast 2 characters!',
            'Item_Name.max' => 'Item_Name can not exceeds 255 characters !',
            'Item_Name.regex' =>'Item_Code contains invalid special characters !',

            'Item_price.required' => 'Item_price is required!',
            'Item_price.regex' =>'Invalid Item_price format !',

            'Vendor.required' => 'Vendor is required!',
            'Vendor.min' => 'Vendor contains atleast 2 characters!',
            'Vendor.max' => 'Vendor can not exceeds 250 characters !',
            'Vendor.regex' =>'Vendor contains invalid special characters !',

            'Brand.required' => 'Brand is required!',
            'Brand.min' => 'Brand contains atleast 1 characters!',
            'Brand.max' => 'Brand can not exceeds 255 characters !',
            'Brand.regex' =>'Brand contains invalid special characters !',

            'Class.required' => 'Class is required!',
            'Class.min' => 'Class contains atleast 1 characters!',
            'Class.max' => 'Class can not exceeds 255 characters !',
            'Class.regex' =>'Class contains invalid special characters !',

           
            'Description.required' => 'Description is required!',
            'Description.min' => 'Description contains atleast 10 characters!',
            'Description.max' => 'Description can not exceeds 200 characters !',

            'Pack Per Case.required' => 'Pack Per Case is required!',
            'Pack Per Case.min' => 'Pack Per Case contains atleast 1 characters!',
            'Pack Per Case.max' => 'Pack Per Case can not exceeds 20 characters !',
            'Pack Per Case.regex' =>'Pack Per Case contains invalid special characters !',

            'Pack Size.required' => 'Pack Size is required!',
            'Pack Size.min' => 'Pack Size contains atleast 1 characters!',
            'Pack Size.max' => 'Pack Size can not exceeds 10 characters !',
            'Pack Size.regex' =>'Pack Size contains invalid special characters !',

            'Unit_of_Measure.required' => 'Unit_of_Measure is required!',
            'Unit_of_Measure.min' => 'Unit_of_Measure contains atleast 2 characters!',
            'Unit_of_Measure.max' => 'Unit_of_Measure can not exceeds 20 characters !',
            'Unit_of_Measure.regex' =>'Unit_of_Measure contains invalid special characters !',

             'file.required' => 'file is required!',
             'file.mimes' => 'Please upload the file in csv or text format only !',

        ];
       
    }
}
