<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetDetailsController extends Controller
{
    //

    public function userExists($user_name)
    {
        return User::where('name', $user_name)->first() ? false : true;
    }

    public function assignedMaids($client_user_name)
    {
        if ($this->userExists($client_user_name)) {
            return response()->json(['message' => 'user not found']);
        }
        $data = DB::select("Select * from tbl_user where client_id = (Select id from tbl_client where user_name = '$client_user_name')::text");
        return $data;
    }

    public function maidDetail($maid_user_name)
    {
        if ($this->userExists($maid_user_name)) {
            return response()->json(['message' => 'user not found']);
        }
        $data = DB::select("Select * from tbl_user where user_name = '$maid_user_name'");

        return $data;
    }

    public function getAgency($client_user_name)
    {
        if ($this->userExists($client_user_name)) {
            return response()->json(['message' => 'user not found']);
        }
        $data = DB::select("Select * from tbl_agency where id = (Select agency_id from tbl_client where user_name = '$client_user_name')::int");

        return $data;
    }
}
