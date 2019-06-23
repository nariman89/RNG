<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index() {

    	$basket = Auth::user()->basket;

    	return view('basket.index', ['basket' => $basket]);
    }
}
