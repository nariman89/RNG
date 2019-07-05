<?php

namespace App\Http\Controllers;

use Auth;
use App\Basket;
use App\BasketItem;
use App\Article;



use Illuminate\Http\Request;

class BasketController extends Controller
{
    protected $validation_rules = [
        'basket_id' => 'required|min1',
		'article_id'=> 'required',
	];
    public function index() {
       $items=BasketItem::all();   
    	return view('basket.index', ['items' => $items]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BasketItem $item
     * @return \Illuminate\Http\Response
     */
    public function edit(BasketItem $item)
    {
        return view('/basket.index');
      
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BasketItem $item
     * @return \Illuminate\Http\Response
     */
    public function update( BasketItem $item)
    {
       $item=BasketItem::first()->get();
             

      
       return view('/basket/index');
     }
    
 

    }