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
		return view('/layouts/index'); // To index page after registratioonnn
	}
	public function adsByCategory($id)
     {
	$articles = Article::where('category_id', $id)->get();
	return view ('projects/showCategory', compact('articles'));
    }
}
