<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use Illuminate\Http\Request;
use App\Mail\newUserRegister;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    //

    public $details;

    public function test(){
        $details = [
            // 'title'=>'Mail from me',
            'subject' => 'Successfully registered in AeroSunergy',
            'name'=>"sdfsdf",
            'password'=>"sdfsdfsdf",
            'url'=> asset('/change-password').'/sdfsdfsdf',
        ];
        $this->details = $details;

        try {
            // dispatch(function () {
            // Mail::to('ak6275732@gmail.com')->send(new newUserRegister($this->details));
            // })->afterResponse();
            // SendMailJob::dispatch($details);
            Mail::to('a.rehman5110@gmail.com')->send(new newUserRegister($details));
        } catch (newUserRegister $e) {
            // return $e->getMessage();
            return"sdfsd";
            return redirect('/users')->with('message', 'Something is worng');
        }
    }
}
