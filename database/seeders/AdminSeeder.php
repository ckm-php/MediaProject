<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['name'=>'J-SAT テスト','email'=>'demo@jsat.com','password'=>bcrypt('1111'),'birthdate'=>'1990-01-18','address'=>'OOsaka']

        ];
        DB::table('admins')->insert($data);
    }
}
