<?php

namespace App\Http\Controllers;

use App\Http\Middleware\agency;
use App\Models\agency as ModelsAgency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\maid;

use function PHPSTORM_META\type;

class MapController extends Controller
{
    //
    public function index()
    {
        // return "SDf";

        if (Auth::user()->type == 'superAdmin') {
            $client = Client::all();
        } else {
           
            $client = Client::where('created_by', Auth::user()->name)->get();
        }

        $clont = [];
         foreach($client as $cli){
            
               $maid = maid::where('client_id',$cli->id)->get();
            //    echo $cli->user_name.'<br>';
                foreach ($maid as $madi) {
                    if (DB::select("select * from tbl_user_activity where user_id = $madi->id") ) {
                        $clont[] = $cli->user_name;
                        break;
                    }
                }
        }
        // return $clont;
        return view('Map.show', ['client' => $clont]);
    }

    public function show()
    {
        $id = ModelsAgency::where('user_name', Auth::user()->name)->first();

        // return $id;

        if (Auth::user()->type == 'agency') {
            $data = DB::select("SELECT json_build_object('type', 'FeatureCollection','crs',  json_build_object('type','name', 'properties', json_build_object('name', 'EPSG:4326'  )),'features', json_agg(json_build_object('type','Feature','id',id,'geometry',ST_AsGeoJSON(geom)::json,
        'properties', json_build_object(
  'user_name', user_name,
        'gender',gender,
        'email',email,
        'contact_number',contact_number,
        'profile_image',profile_image,
        'last_updated',last_updated
 
    
        )))) as geojson
        FROM (select b.user_name,b.gender,b.email, b.contact_number,a.last_updated, b.profile_image,a.geom,a.id from tbl_user_activity a,tbl_user b
   where a.user_id in(
   select id from tbl_user where agency_id=$id->id
   ) and b.id=a.user_id and a.geom !=''	) as tbl1; ");
        } else {
            $data = DB::select("SELECT json_build_object('type', 'FeatureCollection','crs',  json_build_object('type','name', 'properties', json_build_object('name', 'EPSG:4326'  )),'features', json_agg(json_build_object('type','Feature','id',id,'geometry',ST_AsGeoJSON(geom)::json,
        'properties', json_build_object(
  'user_name', user_name,
        'gender',gender,
        'email',email,
        'contact_number',contact_number,
        'profile_image',profile_image,
        'last_updated',last_updated
 
    
        )))) as geojson
        FROM (select b.user_name,b.gender,b.email, b.contact_number, b.profile_image,a.last_updated,a.geom,a.id from (select * from tbl_user_activity where geom != '')a,tbl_user b
   where a.user_id in(
   select id from tbl_user
   ) and b.id=a.user_id	 and a.geom !='') as tbl1; ");
        }

        return $data[0]->geojson;
    }

    public function maidByClient($username)
    {
         $id = Client::where('user_name', $username)->first();
        $data = DB::select("SELECT json_build_object('type', 'FeatureCollection','crs',  json_build_object('type','name', 'properties', json_build_object('name', 'EPSG:4326'  )),'features', json_agg(json_build_object('type','Feature','id',id,'geometry',ST_AsGeoJSON(geom)::json,
        'properties', json_build_object(
        'user_name', user_name,
        'gender',gender,
        'email',email,
        'contact_number',contact_number,
        'profile_image',profile_image,
        'last_updated',last_updated
 
    
        )))) as geojson
        FROM (select b.user_name,b.gender,b.email, b.contact_number,a.last_updated, b.profile_image,a.geom,a.id from tbl_user_activity a,tbl_user b
   where a.user_id in(
   select id from tbl_user where client_id='$id->id'
   ) and b.id=a.user_id and a.geom !=''	) as tbl1; ");
        return $data[0]->geojson;
    }
}
