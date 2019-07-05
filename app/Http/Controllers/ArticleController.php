<?php
namespace App\Http\Controllers;
use Auth;
use App\{
       Article,
       Category,
       User
        };
use Illuminate\Http\Request;
class ArticleController extends Controller
    {
/**
 * Validation Rules
 */
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
       
       $articles=Article::select('id','name', 'rent_price', 'url' )
                     ->latest()
                     ->paginate(6);
    return view('article/index', ['articles' => $articles]);  
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guest()) {
            abort(403);
        }
        ////för att sätta dem i dropDown i form NA
        $categories=Category::pluck('name','id');
        return view('article/create', ['categories' => $categories]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Article $article, Request $request)
    {
        ///det sparat innan två ggr därför jag skrev by fel =new två ggr NA
        
        $validData = $request->validate($this->validation_rules);
        $article->user_id = Auth::user()->id;
        $article->name = $validData['name'];
        $article->description = $validData['description'];
        $article->rent_price= $validData['rent_price'];
        $article->url = $validData['url'];
        $article->category_id=$validData['category_id'];
        $article->city=$validData['city'];
        $article->save();
        return redirect('/article/'.$article->article_id)->with('message', 'Your article has been added💃💃💃💃!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
         
        return view('article/showDetail', ['article' => $article]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article/edit', ['article'=>$article]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
   
    $validData = $request->validate($this->validation_rules2);
    $article->user_id = Auth::user()->id;
    $article->name = $validData['name'];
    $article->url = $validData['url'];
    $article->rent_price = $validData['rent_price'];
    $article->city = $request->city;
    $article->description = $request->description;
    $article->category_id = $request->category_id;
    $article->save();
	 return redirect('article')->with('message', 'Your article has been added💃💃💃💃!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
		return redirect('/article')->with('message', 'Article successfully deleted 😅!');
    }
   
}
