<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    //

    public function show($user_name)
    {
        // $salary = DB::select("select * from tbl_salary where user_name = '$user_name' order by id DESC");
        $salary = Salary::where('user_name',$user_name)->orderBy('created_at', 'ASC')->get();
        return view('Maids.maid-salary.maid-salary-detail',['salary'=>$salary,'user_name'=>$user_name]);
    }
}
