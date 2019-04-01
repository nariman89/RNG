<?php

namespace App;
use App\Admin;
use App\User;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\ArticleRequest;


class Article extends Model
{

  protected $primaryKey = 'article_id';

	 protected $fillable=['name', 'descraption', 'rent_price','category_id', 'city_name
	', 'user_id', 'url'];

public function category() {
    	return $this->belongsTo(Category::class);
    }
public function city(){
   return $this->belongsTo(City::class);
}
public function user(){
   return $this->belongsTo(User::class);
}
// public function delete(){
// 	$this->images()->delete();
// 	return parent::delete();

// }
}

