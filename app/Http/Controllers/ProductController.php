<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GucciController extends Controller
{
    //
	public function index($brand){

		return view('pages.gucci');
	}
}
