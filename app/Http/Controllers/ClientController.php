<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Exception;
use Illuminate\Support\Facades\Auth;

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
        $clients = Client::where('created_by',Auth::user()->email)->get();
        return view('Client.index',['clients'=>$clients]);
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
        try{
        $data = Client::create($request->all());
        }catch(Exception $e){
            return redirect()->route('client.create')->with('message' , 'Something is Worng Try again later');
        }
        
        

        $img = Client::find($data->id);

        $file = $request->file('profile_image');
        $destinationPath = 'asset/images/Client';
        $img1_dbopen = $file->getClientOriginalName();
        $filename = strtotime(now()) . $img1_dbopen;
        $file->move($destinationPath, $filename);
        $img->profile_image = $filename;

        try{
            $img->save();
        }catch(Exception $e){
            return redirect()->route('client.create')->with('message' , 'Image Not saved');
        }
        return redirect()->route('client.create');

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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
