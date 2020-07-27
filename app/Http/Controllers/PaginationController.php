<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pagination;
class PaginationController extends Controller
{
    //
    public function phantrang(){
    	$data = Pagination::paginate(2);
    	return view('pages.home',['data'=>$data]);
    }
}
