<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class QuickViewController extends Controller
{
	

    public function show($id){


		$product = DB::table('tbl_product')
		->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
		->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
		->where('tbl_product.product_id',$id)->get();


		return Response()->json(array('product'=>$product));

	}

}