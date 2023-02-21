<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\agency;
use App\Models\Client;

class ServerEventContoller extends Controller
{
    //

    private $id = '';

    public function EventByCLient($username)
    {
        $agency = Client::where('user_name', $username)->first();
        $this->id = $agency->id;
        $response = new StreamedResponse();
        // $response->headers->set('Content-Type', 'text/event-stream');
        // $response->headers->set('Cache-Control', 'no-cache');
        // $response->headers->set('Connection', 'keep-alive');
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('X-Accel-Buffering', 'no');
        $response->headers->set('Cach-Control', 'no-cache');
        $response->setCallback(function () {
            while (true) {
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
       select id from tbl_user where client_id='$this->id'
       ) and b.id=a.user_id and a.geom!= ''	) as tbl1; ");

                if ($data) {
                    echo 'data: ' . json_encode($data[0]) . "\n\n";
                    ob_flush();
                    flush();
                }

                // sleep(15);
            }
        });

        return $response;
    }

    public function sse()
    {
        // return Auth::user()->name;

        $response = new StreamedResponse();
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->headers->set('Connection', 'keep-alive');

        $response->setCallback(function () {
            while (true) {
                if (Auth::user()->type == 'agency') {
                    $agency = agency::where('user_name', Auth::user()->name)->first();
                    $this->id = $agency->id;
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
       select id from tbl_user where agency_id='$this->id'
       ) and b.id=a.user_id and a.geom!= ''	) as tbl1; ");
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
   where a.user_id in( select id from tbl_user ) and b.id=a.user_id and a.geom!= ''	) as tbl1; ");
                }
                if ($data) {
                    // $lastId = $data[0]->id;
                    echo 'data: ' . json_encode($data[0]) . "\n\n";
                    ob_flush();
                    flush();
                }

                sleep(1);
            }
        });

        return $response;
    }
}
