<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\tbl_login;

class LoginController extends Controller
{
    //

    public function login(Request $req){

        $input = $req->all();

        $find = tbl_login::where('user_name',$input['username'])->where('password' , $input['password'])->first();
        
        if ( $find) {
            
                return response()
                        ->json([
                            'statusCode' => 200, 
                            'message' => 'Success', 
                            'type' => $find->user_type,
                        ]);
            } else {

                return response()
                        ->json([
                            'statusCode' => 404, 
                            'message' => 'Failed', 
                            'type' => 'N/A',
                        ]);
            }






        // if ( auth()->attempt([
        //             'name' => $input['username'], 
        //             'password' => $input['password']
        //             ])) {
                    
        //                 return response()
        //                         ->json([
        //                             'statusCode' => 200, 
        //                             'message' => 'Success', 
        //                             'type' => Auth::user()->type,
        //                         ]);
        // } else {

        //     return response()
        //             ->json([
        //                 'statusCode' => 404, 
        //                 'message' => 'Failed', 
        //                 'type' => 'N/A',
        //             ]);
        // }
    }

    public function test(){
        return "Asdas";
    }
}
