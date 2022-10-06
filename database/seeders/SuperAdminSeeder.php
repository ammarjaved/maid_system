<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@aero.com',
            'password' => Hash::make('abcd1234'),
            'type'=>'superAdmin',
        ]);
    }
}
