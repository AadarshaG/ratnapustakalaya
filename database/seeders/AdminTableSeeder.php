<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB as DBS;
use Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = array(
            array(
                'name'=> 'Admin',
                'email'=> 'web@shreeratnapustakalaya.com',
                'password'=> Hash::make('$hreer@tn@pust@k@l@y@'),
                'role'=> 'admin'
            )
        );
        DBS::table('admins')->insert($admins);

    }
}
