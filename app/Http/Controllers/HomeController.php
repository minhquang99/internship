<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE DB;
use App\Pagination;
class HomeController extends Controller
{
    //
   
    public function index(){
    	$data = Pagination::paginate(2);
    	 $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id', 'desc')->get();
	 	$brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id', 'desc')->get();
	 	$all_product = DB::table('tbl_product')->orderby('product_id','desc')->limit(6)->get();
    	return view('pages.home')->with('data', $data)->with('category', $cate_product)->with('brand', $brand_product)->with('all_product',$all_product);
    }
    	

}
