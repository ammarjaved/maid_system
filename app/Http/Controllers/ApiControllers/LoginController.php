<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function login(Request $req){

        $input = $req->all();

        if ( auth()->attempt([
                    'name' => $input['username'], 
                    'password' => $input['password']
                    ])) {
                    
                        return response()
                                ->json([
                                    'statusCode' => 200, 
                                    'message' => 'Success', 
                                    'type' => Auth::user()->type,
                                ]);
        } else {

            return response()
                    ->json([
                        'statusCode' => 404, 
                        'message' => 'Failed', 
                        'type' => 'N/A',
                    ]);
        }
    }

    public function test(){
        return "Asdas";
    }
}
