<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\agency;
use App\Models\Client;
use App\Models\maid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminDashboard extends Controller
{
    //

    public function home()
    {
        $agency = agency::all();

       foreach($agency as $agen){
        $qury = DB::select("select a.maid,b.client from (select count(*) maid from tbl_user b where  
         created_by = '$agen->user_name') a, (select count(*) client from tbl_client b where   created_by = '$agen->user_name')b");
        $agen['total_client'] = $qury[0]->maid;
        $agen['total_maid'] = $qury[0]->client;
       }

        $data =[];

        $data['total_agency'] = agency::all()->count();
        $data['total_maids'] = maid::all()->count();
        $data['total_clients'] = Client::all()->count();
        return view('Dashboards.admin-dashboard',['data'=>$data,'agency'=>$agency]);
    }
}
