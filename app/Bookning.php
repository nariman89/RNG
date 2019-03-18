<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookning extends Model
{
	    protected $primaryKey = 'id';

    public function article(){
   return $this->belongsTo(Article::class);
}
}
