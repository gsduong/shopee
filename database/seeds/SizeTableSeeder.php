<?php

use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $size = new \App\Size(['size' => 'S']);
        $size->save();

        $size = new \App\Size(['size' => 'M']);
        $size->save();

        $size = new \App\Size(['size' => 'L']);
        $size->save();

        $size = new \App\Size(['size' => 'XL']);
        $size->save();

        $size = new \App\Size(['size' => 'XXL']);
        $size->save();

        $size = new \App\Size(['size' => 'autofit']);
        $size->save();

        $size = new \App\Size(['size' => 'oversize']);
        $size->save();

        $size = new \App\Size(['size' => 'no-size']);
        $size->save();
    }
}
