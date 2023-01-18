<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use Exception;
use App\Models\geom;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\agency;

class MapBoundry extends Controller
{
    //

    public function update(Request $request)
    {
        if ($request->layer == null) {
            DB::select("UPDATE client_geoms SET address = '$request->address' WHERE id = '$request->id'");
        } else {
            DB::select("UPDATE client_geoms SET geom = st_geomfromgeojson('$request->layer'), address = '$request->address' WHERE id = '$request->id'");
        }
        return redirect()
            ->back()
            ->with('message', 'Update Successfully');
    }

    public function destroy($id)
    {
        DB::select("UPDATE tbl_client SET geom = null WHERE id = '$id'");
    }

    public function create($username)
    {
        // $client = Client::all();
        return view('Client.Boundary.add-boundary', ['username' => $username]);
    }

    public function store(Request $req)
    {
        //    return $req;

        try {
            DB::select("INSERT INTO client_geoms (address, user_name, geom)
        values('$req->address', '$req->username', st_geomfromgeojson('$req->layer'))");
            return redirect()
                ->back()
                ->with('message', 'Boundary added');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit($name)
    {
        $address = geom::where('user_name', $name)
            ->orderBy('id', 'DESC')
            ->get();
        return view('Client.Boundary.edit', ['client' => $name, 'address' => $address]);
    }

    public function getLayer($username)
    {
        // return $username;
        $data = DB::select("SELECT json_build_object('type', 'FeatureCollection','crs',  json_build_object('type','name', 'properties', json_build_object('name', 'EPSG:4326'  )),'features', json_agg(json_build_object('type','Feature','id',id,'geometry',ST_AsGeoJSON(geom)::json,
        'properties', json_build_object(
        'user_name', 'user_name',
        'address','address'
    
        )))) as geojson
        FROM (SELECT id,address, geom
            FROM public.client_geoms where user_name='$username') as tbl1;");
        return $data[0]->geojson;
    }

    public function show($username)
    {
        // return "SDf";
        return view('Client.Boundary.show', ['username' => $username]);
    }

    public function getAllBoundry($username)
    {
        $data = DB::select("SELECT json_build_object('type', 'FeatureCollection','crs',  json_build_object('type','name', 'properties', json_build_object('name', 'EPSG:4326'  )),'features', json_agg(json_build_object('type','Feature','id',id,'geometry',ST_AsGeoJSON(geom)::json,
        'properties', json_build_object(
        'user_name', 'user_name',
        'address','address'
    
        )))) as geojson
        FROM (SELECT id,address, geom
            FROM public.client_geoms where user_name='$username') as tbl1;");
        return $data[0]->geojson;
    }

    public function getAddress($username)
    {
        $address = geom::where('user_name', $username)->get();
        return $address;
    }

    public function showAllBoundaries()
    {
        if (Auth::user()->type == 'superAdmin') {
            $client = Client::all();
        } else {
            $client = Client::where('created_by', Auth::user()->name)->get();
        }
        return view('Boundary.show', ['client' => $client]);
    }

    private $id = '';
    public function testsse()
    {
        // return Auth::user()->name;
       
        $response = new StreamedResponse();
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->headers->set('Connection', 'keep-alive');

        $response->setCallback(function () {
             
            while (true) {
                if(Auth::user()->type == 'agency'){
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
       select id from tbl_user where agency_id=$this->id
       ) and b.id=a.user_id	) as tbl1; ");
                }else{
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
   ) and b.id=a.user_id	) as tbl1; ");
                }      
                if ($data) {
                    // $lastId = $data[0]->id;
                    echo 'data: ' . json_encode($data[0]) . "\n\n";
                    ob_flush();
                    flush();
                }

                sleep(5);
            }
        });
        // $res = json_decode($response);

        return $response;
    }
}
