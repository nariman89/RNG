<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
	    protected $primaryKey = 'id';
protected $fillable=['name', 'email', 'phone', 'date_start'];

    public function article(){
   return $this->belongsTo(Article::class);
}
}
