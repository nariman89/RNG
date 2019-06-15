<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\{
         Article,
         Category
        };

class PageController extends Controller
{
	public function index()
    {
	//
    }
    public function admin()
    {
	 $articles=Article::paginate(9);
        return view('back/article/index', compact('articles', 'categories'));
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
    public function show(Article $article)
      {
        return view('projects/myarticles',compact('articles'));
    }
}
