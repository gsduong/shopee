<?php

use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = new \App\Brand(['name' => 'Lamer']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Thời trang Ivinci']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Ceci cela']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'ZARA']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'H&M']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Bersha Fashion']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Forever 21']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Thời trang May10']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Sexy Forever']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Victoria Secret']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Uniqlo']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Topshop']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Momoco']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Others']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Mango']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Thời trang xuất khẩu']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'CANARY FASHION']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Dolce & Gabbana']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Versace']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Louis Vuitton']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Bottega Veneta']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Gucci']);
        $brand->save();

        $brand = new \App\Brand(['name' => 'Thời trang Canifa']);
        $brand->save();
    }
}
