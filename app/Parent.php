<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $primaryKey = 'parent_id';
        public function categorey(){
   return $this->hasMany(Category::class, 'parent_id');
 }
}
