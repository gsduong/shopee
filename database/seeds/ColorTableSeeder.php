<?php

use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $color = new \App\Color(['color_name' => 'black', 'hexa_code' => '#000000']);
        $color->save();

        $color = new \App\Color(['color_name' => 'blue', 'hexa_code' => '#0000FF']);
        $color->save();

        $color = new \App\Color(['color_name' => 'brown', 'hexa_code' => '#A52A2A']);
        $color->save();

        $color = new \App\Color(['color_name' => 'gray', 'hexa_code' => '#808080']);
        $color->save();

        $color = new \App\Color(['color_name' => 'green', 'hexa_code' => '#008000']);
        $color->save();

        $color = new \App\Color(['color_name' => 'orange', 'hexa_code' => '#FFA500']);
        $color->save();

        $color = new \App\Color(['color_name' => 'pink', 'hexa_code' => '#FFC0CB']);
        $color->save();

        $color = new \App\Color(['color_name' => 'purple', 'hexa_code' => '#800080']);
        $color->save();

        $color = new \App\Color(['color_name' => 'red', 'hexa_code' => '#FF0000']);
        $color->save();

        $color = new \App\Color(['color_name' => 'white', 'hexa_code' => '#FFFFFF']);
        $color->save();

        $color = new \App\Color(['color_name' => 'yellow', 'hexa_code' => '#FFFF00']);
        $color->save();

        $color = new \App\Color(['color_name' => 'tổng hợp', 'hexa_code' => '#000000']);
        $color->save();
    }
}
