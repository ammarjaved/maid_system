<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\maid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //

    public function index()
    {
        // return date('Y-m-d ', strtotime('+60 day'));
        // return Carbon::now()->addDays(10);
        // return date(DATE_ATOM, time() + (5 * 60 * 60)) ;
         $date = date('Y-m-d ', strtotime('+60 day'));
         $username = Auth::user()->name;

        $data = [];

        $data['total_clients'] = Client::where('created_by',Auth::user()->name)->count();

        $data['total_maids'] = maid::where('created_by',Auth::user()->name)->count();
    
        // $visa_expiry = DB::select("select count(*) from tbl_user where created_by = '$username' and visa_expiry_date::date < now()::date +60");
        

        //   $health_expiry = DB::select("select count(*) from tbl_health where created_by = '$username' and health_card_expiry::date < now()::date +60");
        //  $data['health_expiry']= $health_expiry[0]->count;

         $data['maids'] = DB::select("select * from tbl_user where created_by = '$username' and visa_expiry_date::date < now()::date +60");
         $data['visa_expiry']= sizeof($data['maids']);

         $data['health'] = DB::select("select * from tbl_health where created_by = '$username' and health_card_expiry::date < now()::date +60");
        //  return sizeof($data['maids']);
         $data['health_expiry'] = sizeof($data['health']);
        return view('Dashboards.Agency-dashboard',['data'=>$data]);
    }
}
