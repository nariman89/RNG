<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
protected $primaryKey = 'category_id';
public function category() {
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
    public function childs()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'category_id');
    }
}

