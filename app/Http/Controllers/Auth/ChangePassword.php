<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User;
use App\Models\tbl_login;
use Exception;

class ChangePassword extends Controller
{
    //

    public function changePassword($name){
        if(Auth::user()->name == $name){
            return view('Auth.Change-password');
        }
        return redirect()->back();
    }

    public function newPassword(Request $req){
        $req->validate([
            'old_password'=>'required',
            'new_password' => 'required|string|min:8',
            'new_password_confirm' => 'required|same:new_password|min:8',
        ]);

        $user = User::find(Auth::user()->id);
        if(!Hash::check($req->old_password, $user->password)){
            return back()->with('message','Old password does not match');
        }
      
       

        try{
        tbl_login::where('user_name', $req->name)->update([
            'password'=>$req->new_password,
        ]);

        User::where('name',$req->name)->update([
            'password'=>Hash::make($req->new_password),
        ]);
        return back()->with('message',"Your password is update successfully");
        }catch(Exception $e){
            return back()->with('message','Something is worng try again later');
        }
        

    }
}
