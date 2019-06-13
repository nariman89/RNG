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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()  ///to call create Article
{
    $articles=Article::all()
                   ->$latest()
                   ->paginate(10);
        return view('layouts/app', ['articles' => $articles]);
    }
	public function adsByCategory($id)
     {
	$articles = Article::where('category_id', $id)->get();
	return view ('projects/showCategory', compact('articles'));
    }
}
