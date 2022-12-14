<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\geom;
use App\Models\maid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Geofencing extends Controller
{
    //

    public function userLocation(Request $request)
    {
    
        $maid = maid::where('user_name',$request->username)->first();
       if($maid){

       
        $log = (float)$request->log ;
        $lat = (float)$request->lat;
         $user = $maid->client_boundary_id;
        $query="select st_intersects(st_geomfromtext('POINT('||$lat||' '||$log||')',4326),geom)  
        from client_geoms  where id='$user'"; 
        if($user==''){
            return response()->json(['message'=>'no found boundary found against this user']);
        }else{
        //echo  $query;
        //exit();
        $result = DB::select($query);

        return $result[0];
        }
       }
       else{
        return response()->json(['message'=>'user not found']);
       }
        
    }
}
