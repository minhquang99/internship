<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;
use Session;
Use Illuminate\Support\Facades\Redirect;
class ProductController extends Controller
{
    //
	 public function add_product(){
	 	$cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
	 	$brand_product = DB::table('tbl_brand_product')->orderby('brand_id', 'desc')->get();
    	

    	return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }
    public function all_product(){
    	$all_product = DB::table('tbl_product')->get();
    	$manager_product = view('admin.all_product')->with('all_product', $all_product);
    	return view('admin_layout')->with('admin.all_product', $manager_product);
    	//return view('admin.all_category_product'); 	
    }
		public function save_product(Request $request){
    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['brand_id'] = $request->product_brand;
    	$data['category_id'] = $request->product_cate;	
    	
    	$data['product_price'] = $request->product_price;
    	$data['product_des'] = $request->product_des;
    	$get_image = $request->file('product_image');
    	if($get_image){
    		$new_image = rand(0,99).'.'.$get_image->getClientOriginalExtension();
    		$get_image->move('public/upload/product', $new_image);
    		$data['product_image'] = $new_image;
    		DB::table('tbl_product')->insert($data);
    	Session::put('message','Them thanh cong!');
    	return Redirect::to('add-product');
    	}
    	$data['product_image'] = '';
    	DB::table('tbl_product')->insert($data);
    	Session::put('message','Them thanh cong!');
    	return Redirect::to('add-product'); 
    
}
}
