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
                'user_name'=>'required',
                'agency_name'=>['required', Rule::unique('tbl_agency')],
                'agency_email'=>'required|email',
                'agency_address'=>'required',
                'agency_contact_number'=>'required',
                'agency_sos'=>'required',
                'agency_ssm'=>'required',
                'agency_pic_number'=>'required',
                'agency_aps_license_number'=>'required',
                'number_of_maids'=>'required',
                'created_by'=>'required',
    
            ];
       
    }
}
