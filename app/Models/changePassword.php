<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class changePassword extends Model
{
    use HasFactory;

    protected $table = 'change_password';
    public $timestamps = false;
    protected $fillable=[
        'user_name',
        'token',
        'created_at',
    ];
}
