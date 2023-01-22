<?php

namespace App\Http\Controllers;
use File;
use Illuminate\Http\Request;
 
class DownloadFile extends Controller
{
    //

    public function download($file_name, $type)
    {
        // return $file_name;
        if ($type == 'client') {
            $destination_path = "asset/images/Client/".$file_name;
        }
        if ($type == 'maid') {
            
            $destination_path = "asset/images/Maid/".$file_name;
        }

        return response()->download($destination_path);
        if (File::exists($destination_path)) {
        
        }
        else{
            return redirect('/client')->with('message',"something is worng........");
        }
        

    }

    
}
