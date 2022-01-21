<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserRollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['roll_id' => '001','roll_name'=>'Shop A','remark'=>'demo@jsat.com'],
            ['roll_id' => '002','roll_name'=>'Shop B','remark'=>'demo@jsat.com'],
            ['roll_id' => '003','roll_name'=>'Shop C','remark'=>'demo@jsat.com'],
            ['roll_id' => '004','roll_name'=>'Shop D','remark'=>'demo@jsat.com'],
            ['roll_id' => '005','roll_name'=>'Shop E','remark'=>'demo@jsat.com']
        ];
        DB::table('client_roll')->insert($data);
    }
}
