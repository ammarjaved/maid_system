<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AgencyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
                'name'=>['required',Rule::unique('users')],
                'agency_name'=>'required' ,
                'email'=>['required','email', Rule::unique('users').$this->user()->id],
                'agency_address'=>'required',
                'agency_contact_number'=>'required|min:9|max:11',
                'agency_sos'=>'required',
                'agency_ssm'=>'required',
                'agency_pic_number'=>'required',
                'agency_aps_license_number'=>'required',
                'number_of_maids'=>'required',
                'created_by'=>'required',
                'password' => 'required|string|min:8',
                'password_confirmation' => 'required|same:password|min:8',
                
    
            ];
       
    }
}
