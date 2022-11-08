<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maid extends Model
{
    use HasFactory;

    protected $table = 'tbl_user';
    protected $fillable = [
        'agency_id',
        'user_name',
        'first_name',
        'last_name',
        'full_name',
        'gender',
        'email',
        'permanent_address',
        'date_of_birth',
        'country',
        'contact_number',
        'emergency_contact',
        'education',
        'occupation',
        'skills',
        'religion',
        // 'profile_image',
        'passport_number',
        'passport_expiry',
        // 'passport_image_front',
        // 'passport_image_back',
        'visa_expiry_date',
        // 'visa_image_front',
        // 'visa_image_back',
        'created_by',
        'client_id',
    ];
}
