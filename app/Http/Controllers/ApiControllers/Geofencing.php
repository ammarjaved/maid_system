<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\geom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Geofencing extends Controller
{
    //

    public function userLocation(Request $request)
    {
       if(geom::where('user_name',$request->username)->first()){

       
        $log = $request->log ;
        $lat = $request->lat;
        $user = $request->username;
        $result = DB::select("select st_intersects(st_geomfromtext('POINT('||$lat||' '||$log||')',4326),geom)  
        from client_geoms  where user_name='$user'");

        return $result[0];
       }
       else{
        return response()->json(['message'=>'user not found']);
       }
        
    }
}
