<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\{
       Article,
       Category
        };
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $categories = Category::where('parent_id', 0)->orderBy('name')->get();
        return view('layouts/app', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('name','id')->prepend(['none'], '');
        return view('/back/article/createCat',  compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        //only admin can create a new Category
        $category=new Category([ 
         'name'=> request('name'),
        'parent_id'=>request('parent_id'),
    
]);
        $this->validate($request,[
           'name'=>'required',
           'parent_id'=>'required',
        ]);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->save();
        // return redirect('/back/article/'.$category->parent_id);
         return redirect('/admin/article');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return('/back/article/');
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
    $category->user_id = Auth::user()->id;
    $category->name = $validData['name'];
    $category->parent_id = $validData['parent_id'];
    
    $category->save();
    return view('/index', ['categories' => $categories]);    }
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
