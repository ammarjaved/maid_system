<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\maid;
use Exception;
use App\Http\Requests\MaidRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;
use Mockery\Expectation;
use App\Models\tbl_login;
use File;

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
    
        $maids = maid::where('created_by' , Auth::user()->email)->get();
        $client = Client::where('created_by' , Auth::user()->email)->get();

        
       
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
        //
        // return "Sdfsdf";
        // $data = new maid();
        // $data->agency_id= $request->agency_id;
        // $data->user_name = $request->user_name;
        // $data->first_name = $request->first_name;
        // $data->last_name= $request->last_name;
        // $data->full_name= $request->full_name;
        // $data->gender= $request->gender;
        // $data->email= $request->email;
        // $data->permanent_address= $request->permanent_address;
        // $data->date_of_birth= $request->date_of_birth;
        // $data->country= $request->country;
        // $data->contact_number= $request->contact_number;
        // $data->emergency_contact= $request->emergency_contact;
        // $data->education= $request->education;
        // $data->occupation= $request->occupation;
        // $data->skills= $request->skills;
        // $data->religion= $request->religion;
        // $data->profile_image= $request->profile_image;
        // $data->passport_number= $request->passport_number;
        // $data->passport_expiry= $request->passport_expiry;
        // $data->passport_image_front= $request->passport_image_front;
        // $data->passport_image_back= $request->passport_image_back;
        // $data->visa_expiry_date= $request->visa_expiry_date;
        // $data->visa_image_front= $request->visa_image_front;
        // $data->visa_image_back= $request->visa_image_back;
        // $data->created_by= $request->created_by;

        try{
            $data = maid::create($request->all());
        }catch(Exception $e){
            return redirect()->route('maid.create')->with('message' , "Something is worg try again later");
        }

        $this->save_images($request , $data->id);
        
        

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
        
        return redirect()->route('maid.index');
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
        $maid = maid::find($id);
        return $maid != "" ? view('Maids.show',['maid'=> $maid]): abort('404');
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
        $maid = maid::find($id);
        return $maid != "" ? view('Maids.edit',['maid'=> $maid,'countries'=> Country::all()]) : abort('404');
        
      
       
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
        try{
            maid::find($id)->update($request->all());
            }catch(Exception $e){
                return redirect()->route('maid.edit',$id)->with('message' , 'something is  worng try again later');
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

         tbl_login::where('user_name',$maid->user_name)->delete();

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
