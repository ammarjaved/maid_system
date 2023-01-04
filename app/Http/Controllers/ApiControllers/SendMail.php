<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MobileMial;
use App\Models\agency;
use App\Models\Client;
use App\Models\maid;
use Exception;

class SendMail extends Controller
{
    //
    public function sendMail(Request $req)
    {
        $failed = [];
        if ($req->maid_id != '') {
            $maid = maid::find($req->maid_id);
            try {
                $details = [
                    'subject' => $req->subject,
                    'body' => $req->body,
                ];

                Mail::to($maid->email)->send(new MobileMial($details));
            } catch (Exception $e) {
                $failed['maid'] = "failed";
            }
        }
    
       
        if ($req->client_id != '') {
         $client = Client::find($req->client_id);
            try {
                $details = [
                    'subject' => $req->subject,
                    'body' => $req->body,
                ];

                Mail::to($client->email)->send(new MobileMial($details));
            } catch (Exception $e) {
                $failed['client'] = "failed";
            }
        }

        if ($req->agency_id != '') {
          $agency = agency::find($req->agency_id);
         
            try {
                $details = [
                    'subject' => $req->subject,
                    'body' => $req->body,
                ];

                Mail::to($agency->agency_email)->send(new MobileMial($details));
            } catch (Exception $e) {
                $failed['agency'] = "failed";
            }
        
        }
        if ($failed == []){
            return response()->json(['message'=>'successfull']);
        }
        return response()->json(['message'=>$failed]);
    }
}
