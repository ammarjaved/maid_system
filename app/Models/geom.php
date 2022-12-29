<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class geom extends Model
{
    use HasFactory;

    protected $table = "client_geoms";
    public $timestamps = false;

    protected $fillable = [
        'user_name',
        'address',
        'geom',

    ];
    
}
