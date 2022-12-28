<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_activity extends Model
{
    use HasFactory;

    protected $table = "tbl_user_activity";
    public $timestamps = false;

    protected $fillable = [
        'user_id','coords'
    ];
}
