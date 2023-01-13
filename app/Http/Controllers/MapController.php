<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class MapController extends Controller
{
    //
    public function index()
    {
        // return "SDf";
        return view('Map.show');
    }

    public function show(){

        $id =Auth::user()->id;
        $arr =[];

        

        $data = DB::select("SELECT json_build_object('type', 'FeatureCollection','crs',  json_build_object('type','name', 'properties', json_build_object('name', 'EPSG:4326'  )),'features', json_agg(json_build_object('type','Feature','id',id,'geometry',ST_AsGeoJSON(geom)::json,
        'properties', json_build_object(
		'user_name', user_name,
        'gender',gender,
        'email',email,
        'contact_number',contact_number,
        'profile_image',profile_image
	
    
        )))) as geojson
        FROM (select b.user_name,b.gender,b.email, b.contact_number, b.profile_image,a.geom,a.id from tbl_user_activity a,tbl_user b
			where a.user_id in(
			select id from tbl_user where agency_id=$id
			) and b.id=a.user_id	) as tbl1; ");

             return $data[0]->geojson;
    }
}