<?php
////jag har den här sida för admin om jag vill lägga till mer function till admin
namespace App\Http\Controllers\Admin;
use App\Article;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$articles=Article::paginate(9);
        return view('back/article/index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
	}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{

    $category = new Category;

    $category->name = $request->get('name');

    $category->save();

    return \Redirect::route('categories.show', array($category->id));

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
    $category = Category::find($id);
    $message = "$category->name has been added succefully";

    return $message;
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

		       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$article=Article::find($id);
		$article->delete();
		       return redirect()->back();

   }
}
