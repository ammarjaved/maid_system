<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agency extends Model
{
    use HasFactory;

    protected $table = 'tbl_agency';
    protected $fillable = [
        'user_name',
        'agency_name',
        'agency_email',
        'agency_address',
        'agency_contact_number',
        'agency_sos',
        'agency_ssm',
        'agency_pic_number',
        'agency_aps_license_number',
        'number_of_maids',
        'created_by',];
    // public $timestamps = false;
}


