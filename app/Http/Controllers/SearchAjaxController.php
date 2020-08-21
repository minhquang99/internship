<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SearchajaxController extends Controller
{
    public function showsearch(Request $request){
        if ($request->ajax()){
            
            
            $search_result = DB::table('tbl_product')->where('product_name','LIKE','%'.$request->search.'%')->get();
      
            return Response()->json(array( 'search_result'=>$search_result ));
        }
    }
}