<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        /*
        $this->call(ColorTableSeeder::class);
        $this->call(SizeTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(CatalogTableSeeder::class);
        $this->call(BrandTableSeeder::class);
        
        $this->call(ProductTableSeeder::class);
        */
        $this->call(StockTableSeeder::class);
    }
}
