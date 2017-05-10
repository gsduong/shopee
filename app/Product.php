<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable;
    protected $fillable = ['name', 'sku', 'catalog_id', 'slug', 'brand_id', 'made_in', 'regular_price', 'sale_price', 'discount', 'counter', 'view', 'image_link', 'image_catalog', 'product_description'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
