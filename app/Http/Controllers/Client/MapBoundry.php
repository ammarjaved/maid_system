<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapBoundry extends Controller
{
    //

    public function update(Request $request){

        DB::select("UPDATE tbl_client SET geom = st_geomfromgeojson('$request->layer') WHERE id = '$request->id'");
    }


    public function destroy($id){
        DB::select("UPDATE tbl_client SET geom = null WHERE id = '$id'");
    }
}
