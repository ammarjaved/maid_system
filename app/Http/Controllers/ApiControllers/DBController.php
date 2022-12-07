<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class DBController extends Controller
{
    //

    public function GetResults(Request $req)
    {

        try {
            $data = DB::select($req->qury);
        } 
            catch (Exception $e) {
                return $e->getMessage();
            }

        return $req->function_name == "InsertQuery" ?
             response()
                ->json([
                    'message'=> "Insert successfully"
                    ]) :  $data;

    }

    public function check(){
        return"Sdf";
    }
}
