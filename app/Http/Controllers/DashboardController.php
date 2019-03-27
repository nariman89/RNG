<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function index() {
		return view('/layouts/index'); // To index page after registratioonnn
	}
	public function show() {
		return view('/projects/myarticles');
	}


}
