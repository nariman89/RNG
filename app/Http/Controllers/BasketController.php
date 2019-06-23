<?php

namespace App\Http\Controllers;

use Auth;
use App\Basket;
use App\BasketItem;


use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index() {

        // $basket = Auth::user()->basket;
       $items=BasketItem::all();   
    	return view('basket.index', ['items' => $items]);
    }

}
