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
        'quantity'=> 'required'
	];
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BasketItem $item)
    {
        return view('basket.index', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('/basket.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  BasketItem $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BasketItem $item )
    {   
       $item->quantity=$request->quantity+1;
       $item->save();
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
