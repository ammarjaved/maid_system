<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\maid;
use Exception;

class UpdateUserInfo extends Controller
{
    //

    public function updateMaid(Request $request, $id)
    {
        $maid = maid::find($id);

        if(!$maid){ return response()->json(['message'=>"user not found"]); }   

        try{ 
            $maid = $maid->update($request->all());
        }
        catch(Exception $e){ return $e->getMessage(); }

        return response()->json(['message'=>"update successfully"]);
    
    }


    public function updateClient(Request $request, $id)
    {
        $client = Client::find($id);

        if(!$client){ return response()->json(['message'=>"user not found"]); }   

        try{ 
             $client->update($request->all());
        }
        catch(Exception $e){ return $e->getMessage(); }

        return response()->json(['message'=>"update successfully"]);
    
    }
}
