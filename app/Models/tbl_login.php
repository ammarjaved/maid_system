<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class tbl_login extends Model
{
    use HasApiTokens,HasFactory;
    protected $table = "tbl_login";
    public $timestamps = false;
    protected $fillable = [
        'user_name','password','user_type'
    ];
    
}
