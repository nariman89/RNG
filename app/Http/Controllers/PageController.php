<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
	public function index() {
		return view('/layouts/index'); // To index page after registratioonnn
	}
}
