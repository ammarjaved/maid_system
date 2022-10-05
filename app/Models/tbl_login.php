<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_login extends Model
{
    use HasFactory;
    protected $table = "tbl_login";
    public $timestamps = false;
    protected $fillable = [
        'user_name','password','user_type'
    ];
    
}
