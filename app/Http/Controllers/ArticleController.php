<?php

namespace App\Http\Controllers;
use Auth;

use App\{
       Article,
       Category
        };
use Illuminate\Http\Request;

class ArticleController extends Controller
    {
    protected $validation_rules = [
        'name' => 'required|min:2',
		'description' => 'required|min:2',
		'rent_price' => 'required|integer',
		'url'=> 'required|url',
		'category_id'=> 'required',
		'city' => 'required|min:1',

	];
	protected $validation_rules2 = [
        'name' => 'required|min:2',
		'rent_price' => 'required|integer',
		'url'=> 'required|url',

    ];
    public function __construct()
    {
        $this->middleware('auth', ['except' => [ 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    $articles=Article::select('article_id','name', 'rent_price', 'url' )
        ->latest()
        ->paginate(6);
    return view('/article/index', ['articles' => $articles]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ////för att sätta dem i dropDown i form NA
        $categories=Category::pluck('name','category_id');
        return view('/article/adsArticle',  compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ///det sparat innan två ggr därför jag skrev by fel =new två ggr NA
        $article=Article::create($request->all()+ ['user_id'=>$request->user()->user_id]);
        $validData = $request->validate($this->validation_rules);
        $article->user_id = Auth::user()->user_id;
        $article->name = $validData['name'];
        $article->description = $validData['description'];
        $article->rent_price= $validData['rent_price'];
        $article->url = $validData['url'];
        $article->category_id=$validData['category_id'];
        $article->city=$validData['city'];
        $article->save();
        return redirect()->back()->with('message', 'Your article has been added💃💃💃💃!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
	  //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::find($id);
        return view('article/edit', ['article'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
    $validData = $request->validate($this->validation_rules2);
    $article->user_id = Auth::user()->user_id;
    $article->name = $validData['name'];
    $article->url = $validData['url'];
    $article->rent_price = $validData['rent_price'];
    $article->city = $request->city;
    $article->description = $request->description;
    $article->category_id = $request->category_id;
    $article->save();
	return view('article.showDetail', compact('article'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article->delete();
		return redirect('/article')->with('message', 'Article successfully deleted 😅!');
    }
    public function adsDetails($id)
    {
        //kunde inte använda Model Binding
		$article=Article::find($id);
        return view('article/showDetail', compact('article'));
    }
}
