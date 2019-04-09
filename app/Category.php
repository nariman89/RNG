<?php

namespace App;
use App\Category;
use App\Article;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
protected $primaryKey = 'category_id';
public function articles() {
    	return $this->hasMany(Article::class);
	}
	////create child category
protected $fillable = [
        'name', 'parent_id'
    ];

    /**
     * A Category has many child categories
     *
     * @return void
     */
    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'category_id');
    }
}

