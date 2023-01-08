<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\agency;
use App\Models\Client;
use App\Models\maid;
use Illuminate\Http\Request;

class adminDashboard extends Controller
{
    //

    public function home()
    {
        $data =[];

        $data['total_agency'] = agency::all()->count();
        $data['total_maids'] = maid::all()->count();
        $data['total_clients'] = Client::all()->count();
        return view('Dashboards.admin-dashboard',['data'=>$data]);
    }
}
