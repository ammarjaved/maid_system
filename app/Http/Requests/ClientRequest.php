<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
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
            'agency_id'=>'required',
            'user_name'=>['required', Rule::unique('tbl_client')],
            'first_name'=>'required',
            'last_name'=>'required',
            'full_name'=>'required',
            'email'=>'required',
            'contact_number'=>'required',
            'emergency_contact'=>'required',
            'client_address'=>'required',
            'house_coords'=>'required',
            'maid_working_address'=>'required',
            'agency_id'=>'required',
            'profile_image'=>'required',
            'created_by'=>'required',

        ];
    }
}
