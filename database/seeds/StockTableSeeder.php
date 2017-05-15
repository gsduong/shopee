<?php

use Illuminate\Database\Seeder;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      	for ($i = 10; $i < 100; $i++) {
            $stock = new \App\Stock(['product_id' => $i,
                'size_id' => 4,
                'color_id' => 4,
                'stock' => 0
                ]);
            $stock->save();
        }
    }
}
