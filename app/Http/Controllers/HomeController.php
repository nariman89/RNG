<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
         Article,
         City,
         Category
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

    //     public function index()
    // {
    //   $articles=Article::select('article_id','name', 'rent_price', 'url' )
    //                   ->latest()
    //                  ->paginate(10);
    //     return view('/layouts/index', ['articles' => $articles]);  //

    // }
       public function adsByCategory($id)
  {


		$articles = Article::where('category_id', $id)->get();
			  return view ('projects/showCategory', compact('articles'));


        // return view ('projects/showCategory',['category' => $category, 'articles' => $articles ]);
        ///måste category_name som skickat =category _id

	}
	public function show(Category $category)
  {
	// s
	// $categories = Category::find($category);
	// $categories = Category::All();
 $articles = Article::where('category_id', $category->id)->get();
	// 	return view ('projects/showCategory',['category' => $category, 'articles' => $articles ]);

    return view ('projects/showCategory', compact('articles'));
	 }


    // public function show()

    // {
	// 	$articles = Article::where('category_id', $category->id)->get();
	// 			$articles = $category->articles;

    //     return view ('projects/showCategory',compact($articles));
    // }
    public function adsDetails($id){

		$article=Article::find($id);
		$articles=Article::all();
        return view ('layouts/showDetail', compact('article'));
    }
}
