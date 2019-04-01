<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\{
         Article,
         City,
         Category,
         Image
        };


class ArticleController extends Controller
{
    protected $validation_rules = [
        'name' => 'required|min:5',
        'description' => 'required|min:5',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    ////för att man kam inte lägga till en article innan man logga in
     public function index()
    {
      $articles=Article::select('article_id','name', 'rent_price', 'url' )
                      ->latest()
                     ->paginate(6);
        return view('/layouts/index', ['articles' => $articles]);  //

    }
   public function create()

    {
        ////för att sätta dem i dropDown i form NA
        $categories=Category::pluck('category_name','category_id');
        // $cities=City::pluck('city_name','city_id');
        $articles=Article::all();
        return view('/layouts/adsCategory', [
            'categories' => $categories,
        ]);
    }

     public function store(Request $request)  ////to save data från db to form
    {
		//spara article
		///det sparat innan två ggr därför jag skrev by fel =new två ggr NA
        $article=Article::create($request->all()+ ['user_id'=>$request->user()->user_id]);
        $validData = $request->validate($this->validation_rules);
        $article->user_id = Auth::user()->user_id;
        $article->name = $validData['name'];
        $article->description = $validData['description'];
        $article->rent_price=$request->rent_price;
        $article->url = $request->url;
         $article->category_id=$request->category_id;
       $article->city_id=$request->city_id;
              $article->save();

               return redirect()->back()->with('message', 'Your article has been added💃💃💃💃!');

    }
//
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

public function show($id)
  {
    $articles = Article::find($id);
    return redirect('layouts.show',compact('articles'));
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
			$articles = Article::find($id);
			$articles->edit();

	        return redirect('/layouts/index' . $article->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     $article->name = $request->name;
        $article->url = $request->url;
        $article->rent_price = $request->rent_price;
        $article->save();

	        return redirect('/layouts/index' . $article->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	$articles = Article::find($id);
	$article->delete();
	        return redirect('/layouts/index' . $article->id);

    }
}
