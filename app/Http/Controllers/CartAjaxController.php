<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE DB;
use App\Pagination;
use Session;
use App\Cart;
use Auth;
session_start();
class CartAjaxController extends Controller
{
    //
	// public function gio_hang(Request $request){
	// 	$meta_desc = "Gio hang cua ban";
	// 	$meta_keywords = "Gio hang ajax";
	// 	$meta_title = "Gio hang Ajax";
	// 	$url_canonical = $request->url();
	// 	$cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id', 'desc')->get();
	// 	$brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id', 'desc')->get();
	// 	return view('pages.cart.show_cart')->with('category', $cate_product)->with('brand', $brand_product)->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical);
	// }
	public function add_cart_ajax($id){
		$products = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$id)->get();
        // $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id', 'desc')->get();
        // $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id', 'desc')->get();
        
        //$product = array();
        
        //return view('pages.show_cart')->with('category',$cate_product)->with('brand', $brand_product)->with('product', $product);
        return Response()->json(array('product'=>$product));
        

    }
    // public function gio_hang(){
    //     $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id', 'desc')->get();
    //      $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id', 'desc')->get();
    //      return view('pages.show_cart')->with('category',$cate_product)->with('brand', $brand_product);
    // }
    public function add_cart(Request $request, $id){
        $product = DB::table('tbl_product')->where('product_id', $id)->first();
        if($product != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);

            $request->Session()->put('Cart', $newCart);
            
        }
        return view('pages.cart', compact('newCart'));
       
    }

    public function add_cart_quanty(Request $request , $id , $quanty){
        $product = DB::table('tbl_product')->where('product_id',$id)->first();
        if($product != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCartQuanty($product, $id, $quanty);
            Session::put('Cart', $newCart);
        }
        return view('pages.cart', compact('newCart'));
    }

    public function DeleteItemCart(Request $request, $id){
        $oldCart = Session('Cart') ? Session('Cart') : null; //lay lai gio hang cu
        $newCart = new Cart($oldCart); //tao newcart de gan cart roi moi xoa
        $newCart->DeleteItemCart($id);
        //kiem tra sp trong gio hang
        if(Count($newCart->products) > 0){
            $request->Session()->put('Cart', $newCart);
        }else{
            $request->Session()->forget('Cart');
        }
        return view('pages.cart');
    }
    public function ViewListCart(){
        if (Auth::check()){
            return view('pages.list',['user'=>Auth::user()]);
        }
        return view('pages.list');
    }
    public function DeleteListItemCart(Request $request, $id){
        $oldCart = Session('Cart') ? Session('Cart') : null; //lay lai gio hang cu
        $newCart = new Cart($oldCart); //tao newcart de gan cart roi moi xoa
        $newCart->DeleteItemCart($id);
        //kiem tra sp trong gio hang
        if (Auth::check()){
            if(Count($newCart->products) > 0){
            $request->Session()->put('Cart', $newCart);
            }else{
            $request->Session()->forget('Cart');
            }
            return view('pages.list_cart',['user'=>Auth::user()]);
            }
    } 
    public function SaveListItemCart(Request $request, $id, $quanty){
         $oldCart = Session('Cart') ? Session('Cart') : null; //lay lai gio hang cu
        $newCart = new Cart($oldCart); //tao newcart de gan cart roi moi xoa
        $newCart->UpdateItemCart($id, $quanty);
        $request->Session()->put('Cart', $newCart);
        if(Auth::check()){
        return view('pages.list_cart',['user'=>Auth::user()]);
        }
        return view('pages.list_cart');
       
    } 
  
}
