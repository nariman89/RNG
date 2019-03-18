<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
         Article,
         City,
         Category,
         Image
        };
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
        public function index()
    {
      $articles=Article::select('article_id','name', 'rent_price' )
                      ->latest()
                     ->paginate(9);
        return view('/projects/index', ['articles' => $articles]);  //
    
    }
       public function adsByCategory($id)
    {
        $articles=Article::where('category_id',$id)->get();
        return view ('layouts.byCategory',compact($articles));
        ///måste category_name som skickat =category _id

    }
}
