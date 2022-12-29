<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $table = 'tbl_salary';
    public $timestamps = false;

    protected $fillable = [
        'month',
        'user_name',
        'salary_ammount',
        'salary_status',
        'comment',
        'salary_slip',
        'created_by',
        'year'
    ];    
}
