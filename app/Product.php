<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Sluggable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'sku', 'catalog_id', 'slug', 'brand_id', 'made_in', 'regular_price', 'sale_price', 'discount', 'counter', 'view', 'image_link', 'image_catalog', 'product_description', 'material'];

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

    public function catalog(){
        return $this->belongsTo('App\Catalog');
    }

    public function brand(){
        return $this->belongsTo('App\Brand');
    }
}
