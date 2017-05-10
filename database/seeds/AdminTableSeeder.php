<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Admin(['username' => 'admin', 'password' => bcrypt('admin'), 'root' => 1]);
        $admin->save();
    }
}
