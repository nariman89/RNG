<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
        protected $primaryKey = 'role_id';
        public function article(){
   return $this->hasMany(Article::class);
 }
}
