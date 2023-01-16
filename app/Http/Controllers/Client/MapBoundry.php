<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use Exception;
use App\Models\geom;

class MapBoundry extends Controller
{
    //

    public function update(Request $request)
    {
        if ($request->layer == null) {
            DB::select("UPDATE client_geoms SET address = '$request->address' WHERE id = '$request->id'");
        }else{
        DB::select("UPDATE client_geoms SET geom = st_geomfromgeojson('$request->layer'), address = '$request->address' WHERE id = '$request->id'");
        }
        return redirect()->back()->with('message','Update Successfully');
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

    public function getLayer($id)
    {
        // return $id;
        $data = DB::select("SELECT json_build_object('type', 'FeatureCollection','crs',  json_build_object('type','name', 'properties', json_build_object('name', 'EPSG:4326'  )),'features', json_agg(json_build_object('type','Feature','id',id,'geometry',ST_AsGeoJSON(geom)::json,
        'properties', json_build_object(
        'user_name', 'user_name',
        'address','address'
    
        )))) as geojson
        FROM (SELECT id,address, geom
            FROM public.client_geoms where id=$id) as tbl1;");
        return $data[0]->geojson;
    }

    public function show($username)
    {
        // return "SDf";
       return view('Client.Boundary.show',['username'=>$username]);
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
        $address = geom::where('user_name',$username)->get();
        return $address;
    }
}
