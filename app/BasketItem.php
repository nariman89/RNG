<?php

namespace App;

use App\Basket;
use App\Article;
use Illuminate\Database\Eloquent\Model;

class BasketItem extends Model
{
	protected $fillable = [ "quantity", "basket_id", "article_id" ];

    public function basket() {
    	return $this->belongsTo(Basket::class);
    }

    public function article() {
    	return $this->belongsTo(Article::class);
    }
}
