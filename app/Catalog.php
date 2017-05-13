<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Catalog extends Model
{
  use Sluggable;
  protected $fillable = ['name', 'slug', 'catalog_description', 'sort_order', 'parent_id'];

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
   * Return id of one catalog by catalog name
   * @return integer or 0
   */
   public static function findIdByName($name){
     if (Catalog::where('name', '=', $name)->exists()) {
       return Catalog::where('name', '=', $name)->first()->id;
     }
     else return 0; // Not found
   }

   /**
    * One might have children
    */
   public function children(){
       return $this->hasMany('App\Catalog', 'parent_id');
   }

   /**
    * One can have only one parent
    */
   public function parent(){
       return $this->belongsTo('App\Catalog', 'parent_id');
   }
}
