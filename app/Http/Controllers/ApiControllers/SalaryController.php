<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Models\Salary;
 use Exception;


class SalaryController extends Controller
{
    

    public function addSalaryInfo(Request $req){

        $destinationPath = 'asset/images/Maid';

       try{
        $file5 = $req->file('slip_image');   
        $exc = $file5->getClientOriginalExtension();
        $filename =   $req->username.'-slip-image-'.strtotime(now()).'.'.$exc;
        $file5->move($destinationPath, $filename);
        

        Salary::create([
            'month'=>$req->month,
            'user_name'=>$req->username,
            'salary_ammount'=>$req->salary_amount,
            'salary_status'=>'Pending',
            'comment'=>$req->comment,
            'salary_slip'=>$filename, 
            'created_by'=>$req->created_by,
            'year'=>$req->year
        ]);

       return 'Success';
    }
    catch(Exception $e){
        return $e->getMessage();
    }

    }
}
