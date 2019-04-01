<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $primaryKey = 'parent_id';
    public function category(){
   return $this->hasMany(Category::class, 'parent_id', 'category_id');
 }
}
