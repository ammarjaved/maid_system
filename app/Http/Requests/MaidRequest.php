<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;


class MaidRequest extends FormRequest
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
        $currentURL = \Request::url();
       
        if ($currentURL == route('maid.store')){
        return [
            'agency_id'=>'required',
            'user_name'=>['required', Rule::unique('tbl_user')],
            'first_name'=>'required',
            'last_name'=>'required',
            'full_name'=>'required',
            'gender'=>'required',
            'email'=>'required|email',
            'permanent_address'=>'required',
            'date_of_birth'=>'required',
            'country'=>'required',
            'contact_number'=>'required',
            'emergency_contact'=>'required',
            'education'=>'required',
            'occupation'=>'required',
            'skills'=>'required',
            'religion'=>'required',
            'profile_image'=>'required',
            'passport_number'=>'required',
            'passport_expiry'=>'required',
            'passport_image_front'=>'required',
            'passport_image_back'=>'required',
            'visa_expiry_date'=>'required',
            'visa_image_front'=>'required',
            'visa_image_back'=>'required',
            'created_by'=>'required',

        ];
    }
    return [
        'agency_id'=>'required',
        'user_name'=>'required',
        'first_name'=>'required',
        'last_name'=>'required',
        'full_name'=>'required',
        'gender'=>'required',
        'email'=>'required|email',
        'permanent_address'=>'required',
        'date_of_birth'=>'required',
        'country'=>'required',
        'contact_number'=>'required',
        'emergency_contact'=>'required',
        'education'=>'required',
        'occupation'=>'required',
        'skills'=>'required',
        'religion'=>'required',
        // 'profile_image'=>'required',
        'passport_number'=>'required',
        'passport_expiry'=>'required',
        // 'passport_image_front'=>'required',
        // 'passport_image_back'=>'required',
        // 'visa_expiry_date'=>'required',
        // 'visa_image_front'=>'required',
        // 'visa_image_back'=>'required',
        'created_by'=>'required',
    ];
    }
}
