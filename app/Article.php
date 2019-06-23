<?php

namespace App;
use App\User;
use App\Category;


use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\ArticleRequest;


class Article extends Model
{

  /**
     * The attributes that are mass assignable.
     *
     * @var array

     */

    protected $fillable = [
    'name', 'descraption', 'rent_price','category_id', 'city', 'user_id', 'url'];

   public function category() {
    	return $this->belongsTo(Category::class);
    }

   public function user(){
      return $this->belongsTo(User::class);
   }
   public function booking(){
      return $this->belongsTo(Booking::class);
   }

}

