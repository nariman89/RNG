<?php

namespace App;

use App\BasketItem;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function items() {
    	return $this->hasMany(BasketItem::class);
    }
}
