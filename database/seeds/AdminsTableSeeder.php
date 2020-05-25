<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
            'name' => 'Admin Tit;koma',
            'email' => 'admin@titikoma.id',
            'password' => bcrypt('secret')
        ]);

    }
}
