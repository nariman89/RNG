<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\{
		 Article
        };

class PageController extends Controller
{
	public function index() {
		
    {
      $articles=Article::select('article_id','name', 'rent_price', 'url' )
            ->latest()
            ->paginate(6);
        return view('/article/index', ['articles' => $articles]);  
    }
	}
	public function adsByCategory($id)
     {
	$articles = Article::where('category_id', $id)->get();
	return view ('projects/showCategory', compact('articles'));
    }
}
