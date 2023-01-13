<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Mail\newUserRegister;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use App\Models\changePassword;
use Exception;
use App\Models\agency;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class mailController extends Controller
{
    //

    public function sendMail($user_name, $type)
    {
        $post_user = changePassword::where('user_name',$user_name)->first();
        if($post_user){
            $post_user->delete();
        }
        if ($type == 'agency') {
            $user = agency::where('user_name', $user_name)->first();
            if (!$user) {
                return redirect()->route('agency.index');
            }
            $email = $user->agency_email;
        } elseif ($type == 'client') {
            $user = Client::where('user_name', $user_name)->first();
            if (!$user) {
                return redirect('/dashboard');
            }
            $email = $user->email;
        }

        $token = rand();

        changePassword::create([
            'user_name' => $user_name,
            'token' => $token,
            'created_at' => date('Y-m-d', strtotime('+1 day')),
        ]);

        try {
            $details = [
                'subject' => 'Change password request',
                'url' => asset('/change-my-password') . '/' . $user_name . '/' . base64_encode($token),
            ];

            Mail::to($email)->send(new ResetPassword($details));
        } catch (Exception $e) {
            // return $e->getMessage();
            return redirect()
                ->back()
                ->with('message', 'Mail sending failed');
        }
        return redirect()->back();
    }

    public function test()
    {
        $details = [
            // 'title'=>'Mail from me',
            'subject' => 'Successfully registered in AeroSunergy',
            'name' => 'sdfsdf',
            'password' => 'sdfsdfsdf',
            'url' => asset('/change-password') . '/sdfsdfsdf',
        ];

        try {
            // dispatch(function () {
            // Mail::to('ak6275732@gmail.com')->send(new newUserRegister($this->details));
            // })->afterResponse();
            // SendMailJob::dispatch($details);
            Mail::to('a.rehman5110@gmail.com')->send(new newUserRegister($details));
        } catch (newUserRegister $e) {
            return $e->getMessage();
            return 'sdfsd';
            return redirect('/users')->with('message', 'Something is worng');
        }
    }
}
