<?php

namespace App\Http\Controllers;

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
    public function index()
    {
	  //
	}


	
  // public function __construct()
  // {
  //   ////för att man kam inte lägga till en article innan man logga in
  //    return $this->middleware('auth');
  // }
   public function create()

    {
        ////för att sätta dem i create form NA
        $categories=Category::pluck('category_name','category_id');
        $cities=City::pluck('city_name','city_id');
        $articles=Article::all();
        return view('/layouts/adsCategory', [
            'categories' => $categories,
            'cities' => $cities,
        ]);
    }

     public function store(Request $request)  ////to save data från db to form
    {
        //spara images
        $article=Article::create($request->all()+ ['user_id'=>$request->user()->user_id]);
        ///laravel5.5 NA
            foreach($request->images as $img)
             {
             $filename=$img->store('public/img');
              $image=new Image();
              $image->image=basename($filename);
              $article->images()->save($image);  ////to save images
              }
        //         $validData = $request->validate($this->validation_rules);

        // $article->user_id = Auth::user()->id;
        // $article->name = $validData['name'];
        // $article->description = $validData['description'];
        // $article->category_id = $validData['category_id'];
        // $article->city_id = $validData['city_id'];

        // $article->save();
            //redirect('/projects')
              return redirect('layouts/adsCategory')->with('success', 'Your Article has been added! 💃💃💃💃💃');
    }
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
