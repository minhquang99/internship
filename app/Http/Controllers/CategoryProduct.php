<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
Use Illuminate\Support\Facades\Redirect;
class CategoryProduct extends Controller
{
    //
    public function add_category_product(){
    	return view('admin.add_category_product');
    }
    public function all_category_product(){
    	$all_category_product = DB::table('tbl_category_product')->get();
    	$manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
    	return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
    	//return view('admin.all_category_product'); 	
    }
    public function save_category_product(Request $request){
    	$data = array();
    	$data['category_name'] = $request->category_product_name;
    	$data['category_des'] = $request->category_product_des;
    	$data['category_status'] = $request->category_product_status;
    	echo '<pre>';
    	//print_r($data);
    	echo '<pre>';
    	DB::table('tbl_category_product')->insert($data);
    	Session::put('message','Them thanh cong!');
    	return redirect::to('add-category-product');
    }
}

