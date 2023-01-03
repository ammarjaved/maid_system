<?php

namespace App\Http\Controllers\Maid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\maid;
use Exception;
use App\Http\Requests\MaidRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;
use Mockery\Expectation;
use App\Models\tbl_login;
use App\Models\User;
use File;
use App\Models\user_activity;
use App\Models\agency;
use App\Models\health;
use Illuminate\Support\Facades\Hash;

class MaidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    
        $maids = maid::where('created_by' , Auth::user()->name)->get();
        $client = Client::where('created_by' , Auth::user()->name)->get();

        
       
        return view('Maids.index',['maids'=>$maids,'clients'=>$client]);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
         $countries = Country::all();
         if(!$countries){
            $countries = "";
         }
        
        return view('Maids.create',['countries'=>$countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaidRequest $request)
    {

        
      
        $agency_id = agency::where('user_name',Auth::user()->name)->get('id');
        $request['agency_id'] =$agency_id[0]['id'];
        $request['created_by'] = Auth::user()->name;
        $request['user_name'] = $request->name;
        $request['full_name'] = $request->first_name .' '.$request->last_name;

        // return $request;
        try{
            health::create($request->all());
            $data = maid::create($request->all());
            // $request->addUser();

            User::create([
                'name' => $request->user_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => 'maid',
            ]);
            
           
           
            user_activity::create([
                'user_id'=>$data->id,
                'coords'=>'0,0',
            ]);
        }catch(Exception $e){
            return $e->getMessage();
            return redirect()->route('maid.create')->with('message' , "Something is worg try again later");
        }

        $this->save_images($request , $data->id);
        
        

        
        
        return redirect()->route('maid.index');

        try{
            tbl_login::create([
                'user_name'=>$request->user_name,
                'password' => "abcd1234",
                'user_type' => 'maid'
            ]);
        }catch(Exception $e){
            // return $e->getMessage();
            return redirect()->route('maid.create')->with('message' , 'Except user login all data is saved');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        //
        $maid = maid::where('user_name',$username)->first();
    
        $client = '';
        if($maid->client_id != ''){
        $client = Client::where('id',$maid->client_id)->get();
        }
      
        if(!health::where('user_name',$username)->first()){
            return redirect()->route('maid.index')->with('message','Something is wrong try again letter');
       
        }
        $health = health::where('user_name',$username)->first();
     
        return $maid != "" ? view('Maids.show',['maid'=> $maid,'client'=>$client,'health'=>$health]): abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        //
        $maid = maid::where('user_name' , $username)->first();
        if(!health::where('user_name',$username)->first()){
            return redirect()->route('maid.index')->with('message','Something is wrong try again letter');
       
        }
        $health = health::where('user_name',$username)->first();
        // $maid = maid::where('user_name' , $username)
        // ->join('tbl_health', 'tbl_user.user_name', 'tbl_health.user_name')
        // ->first();
        return $maid != "" ? view('Maids.edit',['maid'=> $maid,'countries'=> Country::all(),'health'=>$health]) : abort('404');
        
      
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MaidRequest $request, $id)
    {
        //
        
        $maid = maid::find($id);
        try{
            
            
            $maid->update($request->all());
            
                $request['user_name'] = $maid->user_name;
                
            
            
            }catch(Exception $e){
                // return $e->getMessage();
                return redirect()->route('maid.edit',$maid->user_name)->with('message' , 'something is  worng try again later');
            }

            try{
                health::where('user_name',$request->user_name)->update([
                    'health_card_expiry'=>$request->health_card_expiry,
                    'health_certificate_status'=>$request->health_certificate_status,
                ]);
            }catch(Exception $e){
                
            }

            $this->save_images($request , $id);

        return redirect()->route('maid.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img_exits = public_path().'/asset/images/Maid/';
        //
         $maid = maid::find($id);
         $this->removeImage($maid->profile_image);
         $this->removeImage($maid->passport_image_front);
         $this->removeImage($maid->passport_image_back);
         $this->removeImage($maid->visa_image_front);
         $this->removeImage($maid->visa_image_back);

         User::where('name',$maid->user_name)->delete();

         $maid->delete();

        return redirect()->route('maid.index');
    }

    public function save_images($req , $id){

        $destinationPath = 'asset/images/Maid';
        $img_exits = public_path().'/asset/images/Maid/';

        $maid = maid::find($id);

        if($req->has('profile_image')){

            $this->removeImage($maid->profile_image);

            $file5 = $req->file('profile_image');   

            $exc = $file5->getClientOriginalExtension();
            $filename =   $maid->user_name.'-profile-image-'.strtotime(now()).'.'.$exc;
            $file5->move($destinationPath, $filename);
            $maid->profile_image = $filename;

        }


        if($req->has('passport_image_front')){

            $this->removeImage($maid->passport_image_front);

            $file5 = $req->file('passport_image_front');   

            $exc = $file5->getClientOriginalExtension();
            $filename =  $maid->user_name.'-passport-front-image-'.strtotime(now()).'.'.$exc;
            $file5->move($destinationPath, $filename);
            $maid->passport_image_front = $filename;

        }

        if($req->has('passport_image_back')){

            $this->removeImage($maid->passport_image_back);

            $file5 = $req->file('passport_image_back');   

            $exc = $file5->getClientOriginalExtension();
            $filename =  $maid->user_name.'-passport-front-image-'.strtotime(now()).'.'.$exc;
            $file5->move($destinationPath, $filename);
            $maid->passport_image_back = $filename;
            
        }

        if($req->has('visa_image_front')){

            $this->removeImage($maid->visa_image_front);
            $file5 = $req->file('visa_image_front');   
 
            $exc = $file5->getClientOriginalExtension();
            $filename =  $maid->user_name.'-visa-image-front-'.strtotime(now()).'.'.$exc;
            $file5->move($destinationPath, $filename);
            $maid->visa_image_front = $filename;
            
        }

        if($req->has('visa_image_back')){

            $this->removeImage($maid->visa_image_back);
           

            $file5 = $req->file('visa_image_back');   

            $exc = $file5->getClientOriginalExtension();
            $filename =  $maid->user_name.'-visa-image-back-'.strtotime(now()).'.'.$exc;
            $file5->move($destinationPath, $filename);
            $maid->visa_image_back = $filename;
            
        }

        $maid->save();

        if($req->has('health_certificate')){

            $health = health::where('user_name', $req->user_name)->first();
            $this->removeImage($health->health_certificate);
           

            $file5 = $req->file('health_certificate');   

            $exc = $file5->getClientOriginalExtension();
            $filename =  $health->user_name.'-health-card-expiry-'.strtotime(now()).'.'.$exc;
            $file5->move($destinationPath, $filename);
            $health->health_certificate = $filename;

            $health->save();
            
        }
    }

    public function assign_maid(Request $request){
    
        maid::find($request->maid_id)->update([
            'client_id'=>$request->client_id,
        ]);
        return back();
    }

    public function removeImage($name){

        $img_exits = public_path().'/asset/images/Maid/';
        if(File::exists($img_exits.$name)){
            File::delete($img_exits.$name);
        }


    }
}
