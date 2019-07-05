<?php

namespace App\Http\Controllers;
use Auth;
use App\Basket;
use App\BasketItem;
use App\Article;

use Illuminate\Http\Request;

class BasketController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Basket $basket)
    {
         $items=BasketItem::all();   
    	return view('basket.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('basket.index', ['baskets' => $baskets]);
       }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Basket $basket)
    {         $basket = Basket::all()->get('basket');

      if($basket){   
          
 $basket = Basket::where('user_id', auth()->id())->get();         
    	return redirect('/basket/'.$basket[0]->id);}
      if(!$basket){
          
                

        $basket = new Basket();
         $basket->user_id = Auth::user()->id;
        $basket->save();  
    	return redirect('/basket/'.$basket->id);}
      
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $item 
     * @return \Illuminate\Http\Response
     */
    public function show( BasketItem $item )
    {
        return view('basket.index', ['item' => $item]);
       }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Basket $basket)
    {
        return view('/basket.index', ['basket' => $basket]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  BasketItem $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Basket $basket )
    {   
       
       $changed->save();
       return view('/basket/index');
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
