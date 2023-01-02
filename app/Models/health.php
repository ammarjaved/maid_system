<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class health extends Model
{
    use HasFactory;
    protected $table = "tbl_health";
    public $timestamps = false;
    protected $fillable =[
        'user_name',
        'health_card_expiry',
        'health_certificate',
        'health_certificate_status',
        'created_by'
    ];
}
