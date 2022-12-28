<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::where('agency_id', Auth::user()->id)->get();
        return view('Client.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {

        $request['agency_id'] = Auth::user()->id;
        $request['created_by'] = Auth::user()->email;
        $request['user_name'] = $request->name;
        try {
            $data = Client::create($request->all());
            User::create([
                'name'=>$request->user_name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'type'=>'client',
            ]);
            DB::select("UPDATE tbl_client SET geom = st_geomfromgeojson('$request->geo') WHERE id = '$data->id'");
        } 
        catch (Exception $e) {
            return $e->getMessage();

            return redirect()
                ->route('client.create')
                ->with('message', 'Something is Worng Try again later');
        }

        $img = Client::find($data->id);

        $file = $request->file('profile_image');
        $destinationPath = 'asset/images/Client';
        $img1_dbopen = $file->getClientOriginalName();
        $filename = strtotime(now()) . $img1_dbopen;
        $file->move($destinationPath, $filename);
        $img->profile_image = $filename;

        try {
            $img->save();
        } catch (Exception $e) {
            return redirect()
                ->route('client.create')
                ->with('message', 'Image Not saved');
        }

        //
        return redirect()->route('client.index');

        // try{
        //     tbl_login::create([
        //         'user_name'=>$request->user_name,
        //         'password' => "abcd1234",
        //         'user_type' => 'client'
        //     ]);
        // }catch(Exception $e){
        //     // return $e->getMessage();
        //     return redirect()->route('client.create')->with('message' , 'Except user login all data is saved');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $client = Client::find($id);
        return $client != '' ? view('Client.show', ['client' => $client]) : abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $client = Client::find($id);
        return $client != '' ? view('Client.edit', ['client' => $client]) : abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $client = Client::find($id);
        try {
            User::where('name',$client->user_name)
                ->update([
                    'name'=>$request->user_name,
                    'email'=>$request->email
                ]);
            $client->update($request->all());
            

        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('message', 'Something is worng try again later');
        }

        if ($request->profile_image != '') {
            $file = $request->file('profile_image');
            $destinationPath = 'asset/images/Client';
            $img1_dbopen = $file->getClientOriginalName();
            $filename = strtotime(now()) . $img1_dbopen;
            $file->move($destinationPath, $filename);
            $client->profile_image = $filename;
            $client->update();
        }

        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        Client::where('user_name',$username)->delete();
        User::where('name',$username)->delete();
        return redirect()->route('client.index');
    }

    public function getGeo($id)
    {
        $data = DB::select("SELECT json_build_object('type', 'FeatureCollection','crs',  json_build_object('type','name', 'properties', json_build_object('name', 'EPSG:4326'  )),'features', json_agg(json_build_object('type','Feature','id',id,'geometry',ST_AsGeoJSON(geom)::json,
        'properties', json_build_object(
        'id', $id,
        'first_name', first_name,
        'pe_name',last_name ,
        'full_name',full_name,
        'email', email,
        'contact_number', contact_number,
        'emergency_contact', emergency_contact,
        'client_address', client_address,
        'maid_working_address',maid_working_address,
        'profile_image', profile_image
        )))) as geojson
        FROM (SELECT id, first_name, last_name, full_name, email, contact_number, emergency_contact, client_address, maid_working_address, profile_image, geom
            FROM public.tbl_client where id=$id) as tbl1;");
        return $data[0]->geojson;
    }
}
