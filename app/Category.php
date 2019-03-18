<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
protected $primaryKey = 'category_id';
public function article(){
   return $this->hasMany(Article::class);
}
}

