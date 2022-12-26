<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\maid;
use Exception;
use File;

class UploadImages extends Controller
{
    
    public function upload(Request $req){

        $destinationPath = 'asset/images/Maid';
        $img_exits = public_path().'/asset/images/Maid/';

        $maid = maid::find($req->id);

        if($req->has('profile_image')){

            if(File::exists($img_exits.$maid->profile_image)){
                File::delete($img_exits.$maid->profile_image);
            }

            $file5 = $req->file('profile_image');   

            $exc = $file5->getClientOriginalExtension();
            $filename =   $maid->user_name.'-profile-image-'.strtotime(now()).'.'.$exc;
            $file5->move($destinationPath, $filename);
            $maid->profile_image = $filename;

        }


        if($req->has('passport_image_front')){

            if(File::exists($img_exits.$maid->passport_image_front)){
                File::delete($img_exits.$maid->passport_image_front);
            }

            $file5 = $req->file('passport_image_front');   

            $exc = $file5->getClientOriginalExtension();
            $filename =  $maid->user_name.'-passport-front-image-'.strtotime(now()).'.'.$exc;
            $file5->move($destinationPath, $filename);
            $maid->passport_image_front = $filename;

        }

        if($req->has('passport_image_back')){

            if(File::exists($img_exits.$maid->passport_image_back)){
                File::delete($img_exits.$maid->passport_image_back);
            }

            $file5 = $req->file('passport_image_back');   

            $exc = $file5->getClientOriginalExtension();
            $filename =  $maid->user_name.'-passport-front-image-'.strtotime(now()).'.'.$exc;
            $file5->move($destinationPath, $filename);
            $maid->passport_image_back = $filename;
            
        }

        if($req->has('visa_image_front')){

            if(File::exists($img_exits.$maid->visa_image_front)){
                File::delete($img_exits.$maid->visa_image_front);
            }

            $file5 = $req->file('visa_image_front');   
 
            $exc = $file5->getClientOriginalExtension();
            $filename =  $maid->user_name.'-visa-image-front-'.strtotime(now()).'.'.$exc;
            $file5->move($destinationPath, $filename);
            $maid->visa_image_front = $filename;
            
        }

        if($req->has('visa_image_back')){

            if(File::exists($img_exits.$maid->visa_image_back)){
                File::delete($img_exits.$maid->visa_image_back);
            }

            $file5 = $req->file('visa_image_back');   

            $exc = $file5->getClientOriginalExtension();
            $filename =  $maid->user_name.'-visa-image-back-'.strtotime(now()).'.'.$exc;
            $file5->move($destinationPath, $filename);
            $maid->visa_image_back = $filename;
            
        }
        try {
            $maid->save();
        }catch(Exception $e){
            return $e->getMessage();
        }
        return response()->json(['message'=>"Upload Successfully"]);
    }
}
