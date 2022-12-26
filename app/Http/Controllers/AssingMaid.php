<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\maid;

class AssingMaid extends Controller
{
    //

    public function assign_maid(Request $request){
    
        maid::find($request->maid_id)->update([
            'client_id'=>$request->client_id,
        ]);
        return back();
    }



    public function unAssign(Request $request){
    
        
        maid::find($request->maid_id)->update([
            'client_id'=>"",
        ]);
        return back();
    }


}
