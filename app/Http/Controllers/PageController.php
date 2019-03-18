<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
	public function index() {
		$msg = "Some message";

		if (Auth::check()) {
			$user = Auth::user();

			$msg = "You are logged in as {$user->name}!";
		}

		return view('/projects/index', ['msg' => $msg]);
	}
}
