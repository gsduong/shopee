<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Brand extends Model
{
  use Sluggable;
  protected $fillable = ['name', 'slug'];

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


    /**
     * One brand has many products
     */
    public function products(){
        return $this->hasMany('App\Product', 'brand_id');
    }
}
