<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      	for ($i = 1; $i < 300; $i++) {
            $product = new \App\Product(['name' => 'Shirt No '.$i,
                'catalog_id' => ($i%18+1),
                'slug' => 'shirt-no-'.$i,
                'brand_id' => ($i%22+1),
                'made_in' => 'China',
                'material' => 'cotton',
                'regular_price' => $i*100000,
                'sale_price' => $i*90000,
                'discount' => 10,
                'image_link' => 'assets/users/images/home/product'.($i%4+1).'.jpg',
                'product_description'=> '',
                'image_catalog' => ''
                ]);
            $product->save();
        }
    }
}
