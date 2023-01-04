<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

        if ($currentURL == route('maid.store')) {
            return [
                'name' => ['required', Rule::unique('users')],
                'first_name' => 'required',
                'last_name' => 'required',
                // 'full_name' => 'required',
                'gender' => 'required',
                'email' => 'required|email',
                'permanent_address' => 'required',
                'date_of_birth' => 'required',
                'country' => 'required',
                'contact_number' => 'required|min:9|max:11',
                'emergency_contact' => 'required|min:9|max:11',
                'education' => 'required',
                'occupation' => 'required',
                'skills' => 'required',
                'religion' => 'required',
                'profile_image' => 'required',
                'passport_number' => 'required',
                'passport_expiry' => 'required|date|after:tomorrow',
                'passport_image_front' => 'required',
                'passport_image_back' => 'required',
                'visa_expiry_date' => 'required|date|after:tomorrow',
                'visa_image_front' => 'required',
                'visa_image_back' => 'required',
                'health_certificate_status' => 'required',
                'health_card_expiry' => 'required|date|after:tomorrow',
                'health_certificate' => 'required',
                'password' => 'required|string|min:8',
                'password_confirmation' => 'required|same:password|min:8',
            ];
        }
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            // 'full_name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'permanent_address' => 'required',
            'date_of_birth' => 'required',
            'country' => 'required',
            'contact_number' => 'required|min:9|max:11',
            'emergency_contact' => 'required|min:9|max:11',
            'education' => 'required',
            'occupation' => 'required',
            'skills' => 'required',
            'religion' => 'required',
            // 'profile_image'=>'required',
            'passport_number' => 'required',
            'passport_expiry' => 'required',
            'health_certificate_status' => 'required',
            'health_card_expiry' => 'required',
            // 'health_certificate' => 'required',
            // 'passport_image_front'=>'required',
            // 'passport_image_back'=>'required',
            // 'visa_expiry_date'=>'required',
            // 'visa_image_front'=>'required',
            // 'visa_image_back'=>'required',
        ];
    }

    public function addUser()
    {
        dd($_REQUEST);
        User::create([
            'name' => $_REQUEST['user_name'],
            'email' => $_REQUEST['email'],
            'password' => Hash::make($_REQUEST['password']),
            'type' => 'maid',
        ]);
    }
}
