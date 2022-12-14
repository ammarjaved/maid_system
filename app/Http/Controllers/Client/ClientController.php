<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Models\agency;
use App\Models\Client;
use App\Models\maid;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\newUserRegister;
use App\Models\changePassword;

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
        $clients = Client::where('created_by', Auth::user()->name)->orderBy('id', 'DESC')->get();
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
        
        // return $request;

        $agency_id = agency::where('user_name',Auth::user()->name)->get('id');
        $request['agency_id'] =$agency_id[0]['id'];
        
        $request['created_by'] = Auth::user()->name;
        $request['user_name'] = $request->name;

        

        try {
            $data = Client::create($request->all());
            User::create([
                'name'=>$request->user_name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'type'=>'client',
            ]);
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


        $file = $request->file('client_identity_img');
        $img1_dbopen = $file->getClientOriginalName();
        $filename = strtotime(now()) . $img1_dbopen;
        $file->move($destinationPath, $filename);
        $img->client_identity_img = $filename;

        try {
            $img->save();
        } catch (Exception $e) {
            return redirect()
                ->route('client.create')
                ->with('message', 'Image Not saved');
        }

        try{
            $token = rand();

            $details = [
                // 'title'=>'Mail from me',
                'subject' => 'Successfully registered in AeroSunergy',
                'name'=>$request->user_name,
                'password'=>$request->password,
                'url'=> asset('/change-my-password').'/'.$request->user_name.'/'. base64_encode($token),
            ];


            Mail::to($request->email)->send(new newUserRegister($details));
        }catch(Exception $e){
            // return $e->getMessage();
            return redirect()->route('client.index')->with('message' , 'Mail sending failed');
        }
        changePassword::create([
            'user_name' => $request->user_name,
            'token' => $token,
        ]);
        return redirect()->route('client.index');


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
        $maids = maid::where('client_id',$id)->get();
        return $client != '' ? view('Client.show', ['client' => $client,'maids'=>$maids]) : abort('404');
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
    public function update(ClientRequest $request, $id)
    {
        
        $client = Client::find($id);
        try {
            User::where('name',$client->user_name)
                ->update([
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
            
        }

        if ($request->client_identity_img != '') {
        $file = $request->file('client_identity_img');
        $destinationPath = 'asset/images/Client';
        $img1_dbopen = $file->getClientOriginalName();
        $filename = strtotime(now()) . $img1_dbopen;
        $file->move($destinationPath, $filename);
        $client->client_identity_img = $filename;
        }
        $client->update();

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

    public function getGeo($username)
    {
        $data = DB::select("SELECT json_build_object('type', 'FeatureCollection','crs',  json_build_object('type','name', 'properties', json_build_object('name', 'EPSG:4326'  )),'features', json_agg(json_build_object('type','Feature','id',id,'geometry',ST_AsGeoJSON(geom)::json,
        'properties', json_build_object(
        'user_name', user_name,
        'address',address
    
        )))) as geojson
        FROM (SELECT id,address, geom
            FROM public.client_geoms where user_name=$username) as tbl1;");
        return $data[0]->geojson;
    }
}
