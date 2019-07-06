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
    {         
        $basket = Basket::all()->get('basket');
        $basket = Basket::where('user_id', auth()->id())->get();
        $item=BasketItem::where('basket_id', auth()->id())->get();
        $item=BasketItem::all()->get('item');
        if($basket){
                    if(!$item=BasketItem::where('article_id', 'article_id')){
                       $item = new BasketItem();
                        $item->article_id = $request['article_id'];
                        $item->quantity = "1";
                        $item['basket_id']= Basket::pluck('id')->implode(' ', 'id');$item->save();
                         
                    } 
                             $item=BasketItem::find('article_id');
            if(isset($item['article_id'])){
                        $item->article_id = Auth::article()->id;    

                $item=BasketItem::all()->map(function ($item, $key) {
                $item['quantity'] += 1;
                $item->save();
                });}
                if(!isset($item['article_id'])){
                      $item = new BasketItem();
                        $item->article_id = $request['article_id'];
                        $item->quantity = "1";
                        $item['basket_id']= Basket::pluck('id')->implode(' ', 'id');
                        $item->save();
                     }    
              return redirect('/basket/'.$basket[0]->id);
            }
          if(!$basket){
              $basket = new Basket();
              $basket->user_id = Auth::user()->id;
              $basket->save();  
             return redirect('/basket/'.$basket->id)->with('message', 'Your basket has been added💃💃💃💃!');
            }
            return redirect('/basket/'.$basket->id)->with('message', 'Your cart has been added💃💃💃💃!');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $item 
     * @return \Illuminate\Http\Response
     */
    public function show( BasketItem $item, Basket $basket )
    {		
     $items=BasketItem::all();
    return view('basket.index', ['items' => $items]); 
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
