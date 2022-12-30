<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'tbl_client';
    protected $fillable=[
        'agency_id',
        'user_name',
        'first_name',
        'last_name',
        'full_name',
        'email',
        'contact_number',
        'emergency_contact',
        'client_address',
        'house_coords',
        'maid_working_address',
        'agency_id',
        // 'profile_image',
        'created_by',
        'client_boundary_id',
    ];
}
