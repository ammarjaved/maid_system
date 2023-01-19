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
            return response()->json(['message'=>'no boundary found against this user']);
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



    public function TrackUserLocation(Request $req)
    {

        $lat_log = DB::select("Select st_x(geom) as lon, st_y(geom) as lat from tbl_user_activity where user_id = $req->user_id");
        if(!$lat_log){
            return response()->json(['status'=>'failed','message'=>'latitude or longitude not found']);
        }
        
        $user = DB::select("select client_boundary_id from tbl_user where id = $req->user_id");
        if(!$user){
            return response()->json(['status'=>'failed','message'=>'client boundary id not found']);
        }
     
        $boundary = DB::select("select st_intersects(st_geomfromtext('POINT('||".$lat_log[0]->lat."||' '||".$lat_log[0]->lon."||')',4326),geom) from client_geoms where id='".$user[0]->client_boundary_id."'");

        if(!$boundary){
            return response()->json(['status'=>'failed','message'=>'client geom not found']);
        }
        return response()->json(['status'=>'success','data'=>$boundary[0]]);
        
    }
}
