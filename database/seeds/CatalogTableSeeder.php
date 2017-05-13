<?php

use Illuminate\Database\Seeder;

class CatalogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catalog = new \App\Catalog(['name' => 'Thời trang nam']);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Thời trang nữ']);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Thời trang đôi']);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Thời trang cho bé']);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Thời trang tổng hợp']);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Đầm nữ', 'parent_id' => \App\Catalog::findIdByName('Thời trang nữ')]);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Áo khoác nữ', 'parent_id' => \App\Catalog::findIdByName('Thời trang nữ')]);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Áo thun nữ', 'parent_id' => \App\Catalog::findIdByName('Thời trang nữ')]);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Quần nữ', 'parent_id' => \App\Catalog::findIdByName('Thời trang nữ')]);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Chân váy', 'parent_id' => \App\Catalog::findIdByName('Thời trang nữ')]);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Quần Short Nữ', 'parent_id' => \App\Catalog::findIdByName('Thời trang nữ')]);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Đồ lót & Đồ ngủ', 'parent_id' => \App\Catalog::findIdByName('Thời trang nữ')]);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Đầm bầu', 'parent_id' => \App\Catalog::findIdByName('Thời trang nữ')]);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Đồ bơi nữ', 'parent_id' => \App\Catalog::findIdByName('Thời trang nữ')]);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Thắt lưng', 'parent_id' => \App\Catalog::findIdByName('Thời trang nữ')]);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Áo khoác nam', 'parent_id' => \App\Catalog::findIdByName('Thời trang nam')]);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Áo thun nam', 'parent_id' => \App\Catalog::findIdByName('Thời trang nam')]);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Áo Cardigan nam', 'parent_id' => \App\Catalog::findIdByName('Thời trang nam')]);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Áo sơ mi', 'parent_id' => \App\Catalog::findIdByName('Thời trang nam')]);
        $catalog->save();
        $catalog = new \App\Catalog(['name' => 'Áo len', 'parent_id' => \App\Catalog::findIdByName('Thời trang nam')]);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Quần nam', 'parent_id' => \App\Catalog::findIdByName('Thời trang nam')]);
        $catalog->save();

        $catalog = new \App\Catalog(['name' => 'Cà vạt & nơ bướm', 'parent_id' => \App\Catalog::findIdByName('Thời trang nam')]);
        $catalog->save();

    }
}
