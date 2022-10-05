<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\maid;
use Exception;
use App\Http\Requests\MaidRequest;
use Illuminate\Support\Facades\Auth;

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
        return view('Maids.index',['maids'=>$maids]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Maids.create');
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

        $img = maid::find($data->id);

        $file = $request->file('profile_image');
        $destinationPath = 'asset/images/Maid';
        $img1_dbopen = $file->getClientOriginalName();
        $filename = strtotime(now()) . $img1_dbopen;
        $file->move($destinationPath, $filename);
        $img->profile_image = $filename;

        $file = $request->file('passport_image_front');
        $destinationPath = 'asset/images/Maid';
        $img1_dbopen = $file->getClientOriginalName();
        $filename = strtotime(now()) . $img1_dbopen;
        $file->move($destinationPath, $filename);
        $img->passport_image_front = $filename;

        $file = $request->file('passport_image_back');
        $destinationPath = 'asset/images/Maid';
        $img1_dbopen = $file->getClientOriginalName();
        $filename = strtotime(now()) . $img1_dbopen;
        $file->move($destinationPath, $filename);
        $img->passport_image_back = $filename;

        $file = $request->file('visa_image_front');
        $destinationPath = 'asset/images/Maid';
        $img1_dbopen = $file->getClientOriginalName();
        $filename = strtotime(now()) . $img1_dbopen;
        $file->move($destinationPath, $filename);
        $img->visa_image_front = $filename;

        $file = $request->file('visa_image_back');
        $destinationPath = 'asset/images/Maid';
        $img1_dbopen = $file->getClientOriginalName();
        $filename = strtotime(now()) . $img1_dbopen;
        $file->move($destinationPath, $filename);
        $img->visa_image_back = $filename;

        try{
            $img->save();
        }catch(Exception $e){
            return $e->getMessage();
            return redirect()->route('maid.create')->with('message','Images not Saved ');
        }
        return redirect()->back();
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
