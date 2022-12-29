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
        $currentURL = \Request::url();
        if ($currentURL == route('client.store')){
        return [
            'name'=>['required', Rule::unique('users')],
            'first_name'=>'required',
            'last_name'=>'required',
            'full_name'=>'required',
            'email'=>'required|email',
            'contact_number'=>'required|min:9|max:11',
            'emergency_contact'=>'required|min:9|max:11',
            'client_address'=>'required',
            'house_coords'=>'required',
            'maid_working_address'=>'required',
            // 'agency_id'=>'required',
            'profile_image'=>'required',
            // 'geo'=>'required',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password|min:8',
            

        ];
        }
        return [
           

            'first_name'=>'required',
            'last_name'=>'required',
            'full_name'=>'required',
            'email'=>'required|email',
            'contact_number'=>'required|min:9|max:11',
            'emergency_contact'=>'required|min:9|max:11',
            'client_address'=>'required',
            'house_coords'=>'required',
            'maid_working_address'=>'required',
          
            // 'profile_image'=>'required',

        ];
    }
}
