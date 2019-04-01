<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
         Article,
         City
        };

class Category extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
 $childs=Child::pluck('parent_id','name');

$categories = Category1::all();
    dd($categories->child->name);

    return view('/layouts/app',['childs'=> $childs]);
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
		// dd($categories);


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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
