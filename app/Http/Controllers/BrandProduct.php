<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
Use Illuminate\Support\Facades\Redirect;
class BrandProduct extends Controller
{
 
    //
    public function add_brands_product(){
    	return view('admin.add_brand_product');
    }
    public function all_brands_product(){
    	$all_brands_product = DB::table('tbl_brand_product')->get();
    	$manager_brands_product = view('admin.all_brand_product')->with('all_brands_product', $all_brands_product);
    	return view('admin_layout')->with('admin.all_brand_product', $manager_brands_product);
    	//return view('admin.all_brands_product'); 	
    }
}
