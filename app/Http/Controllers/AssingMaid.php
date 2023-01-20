<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\maid;
use Exception;
use Illuminate\Support\Facades\DB;

class AssingMaid extends Controller
{
    //

    public function assign_maid(Request $request){
    
        // return $request;
        // return $request;
        try{
        maid::find($request->maid_id)->update([
            'client_id'=>$request->client_id,
        ]);

    }catch(Exception $e){
        return $e->getMessage();
    }
        // DB::select("UPDATE tbl_user set client_id = '$request->client_id' ,client_boundary_id = '$request->client_boundary_address' where id = $request->maid_id ");
        return back();
    }



    public function unAssign(Request $request){
        // return "SDfsd";
        
        maid::find($request->maid_id)->update([
            'client_id'=>"",
        ]);
        return back();
    }


}
