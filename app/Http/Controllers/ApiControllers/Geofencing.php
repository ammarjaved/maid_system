<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Geofencing extends Controller
{
    //

    public function userLocation(Request $request)
    {
       
        $log = $request->log ;
        $lat = $request->lat;
        $user = $request->username;
        $result = DB::select("select st_intersects(st_geomfromtext('POINT('||$lat||' '||$log||')',4326),geom)  
        from client_geoms  where id=1");

        return $result[0];
        
    }
}
