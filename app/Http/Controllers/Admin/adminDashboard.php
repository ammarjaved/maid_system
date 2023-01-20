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
        $agency = DB::select("SELECT *, (SELECT COUNT(*) FROM tbl_user WHERE created_by = tbl_agency.user_name) as total_maid ,
        (SELECT COUNT(*) FROM tbl_client WHERE created_by = tbl_agency.user_name) as total_client
FROM tbl_agency");

        $data = DB::select("SELECT a.total_agency ,b.total_maids ,c.total_clients, d.total_offline , e.visa_expiry, f.health_expiry FROM
        (SELECT count(*) total_agency from tbl_agency) a
        ,(SELECT count(*) total_maids from tbl_user) b,
        (SELECT count(*) total_clients from tbl_client) c,
        (SELECT count(*) total_offline from tbl_user_activity where last_updated <NOW() - INTERVAL '5 minutes')d,
        (select count(*) visa_expiry from tbl_user where visa_expiry_date::date < now()::date +60)e,
        (select count(*) health_expiry from tbl_health where health_card_expiry::date < now()::date +60)f");

        $offline = DB::select("SELECT *, tbl_user_activity.last_updated
        FROM tbl_user
        INNER JOIN tbl_user_activity ON tbl_user.id=tbl_user_activity.user_id");

        $health_expiry = DB::select('select * from tbl_health where health_card_expiry::date < now()::date +60');
        $visa_expiry = DB::select('select * from tbl_user where visa_expiry_date::date < now()::date +60');

        return view('Dashboards.admin-dashboard', ['data' => $data[0], 'agency' => $agency, 'offline' => $offline,'health_expiry'=>$health_expiry,'visa_expiry'=>$visa_expiry]);
    }

    public function health_expiry()
    {
        $visa_expiry = DB::select('select * from tbl_health where health_card_expiry::date < now()::date +60');
        return $visa_expiry;
    }

    public function visa_expiry()
    {
        $visa_expiry = DB::select('select * from tbl_user where visa_expiry_date::date < now()::date +60');
        return $visa_expiry;
    }

    public function offline()
    {
        return $offline = DB::select("SELECT *, tbl_user_activity.last_updated
        FROM tbl_user
        INNER JOIN tbl_user_activity ON tbl_user.id=tbl_user_activity.user_id");
    }
}
