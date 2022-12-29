<?php

namespace App\Http\Controllers\Agency;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AgencyRequest;
use App\Models\agency;
use Exception;
use App\Models\tbl_login;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgencyController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Agency.index',['agencys'=> agency::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        //
        // return "asdasd";
        return view('Agency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgencyRequest $request)
    {
      
        $request['user_name']= $request->name;
        try{
            agency::create($request->all());
            }catch(Exception $e){
                return redirect()->back()->with('message','Something is worng');
            }

           
            try{
            User::create([
                'name'=>$request->user_name,
                'email'=>$request->agency_email,
                'password' => Hash::make($request->password),
                'type' => 'agency',
            ]);
        }catch(Exception $e){
            return redirect()->route('agency.create')->with('message' , 'Except user login all data is saved');
        }
    
            return redirect()->route('agency.index');



             // try{
            //     tbl_login::create([
            //         'user_name'=>$request->user_name,
            //         'password' => $request->password,
            //         'user_type' => 'agency'
            //     ]);
            // }catch(Exception $e){
            //     // return $e->getMessage();
            //     return redirect()->route('agency.create')->with('message' , 'Except user login all data is saved');
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
        $agency = agency::find($id);
        return $agency != "" ? view('Agency.show',['agency'=>$agency]) : abort('404');
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
        $agency = agency::find($id);
        return $agency != "" ? view('Agency.edit',['agency'=>$agency]) : abort('404');
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
        
        $request['user_name'] = Auth::user()->name;
        //
        try{
            $id = agency::find($id);
            
            User::where('name', $id->user_name)->update([
                'email'=>$request->agency_email,     
            ]);

            $id->update($request->all());
        }catch(Exception $e){
            return redirect()->back()->with('message' , 'Something is worng Try again later');
        }
        return redirect()->route('agency.show', $id->id);
       
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
        agency::where('user_name',$id)->delete();
        User::where('name',$id)->delete();
        return redirect()->route('agency.index');
    }

    public function myAccount($name){
        $agency = agency::where("user_name",$name)->first();
        return $agency != "" ? view('Agency.show',['agency'=>$agency]) : abort('404');
    }
}
