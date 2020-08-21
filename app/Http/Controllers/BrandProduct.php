<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
Use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Pagination;
use Validator;
class BrandProduct extends Controller
{
    //
    public function add_brand_product(){
        return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        if (Auth::check()){
       $all_brands_product = DB::table('tbl_brand_product')->get();
       $manager_brands_product = view('admin.all_brand_product')->with('all_brands_product', $all_brands_product);
       return view('admin_layout',['info'=>Auth::user()])->with('admin.all_brand_product', $manager_brands_product);
        //return view('admin.all_brands_product');  
   }
    }
    public function save_brand_product(Request $request){
        if (Auth::check()){
            $info = Auth::user();
            if ($request->isMethod('get') ){
                return view('admin.add_brand_product',['info'=>$info]);
            }

            if ($request->isMethod('post'))
            {
             $validate = Validator::make($request->all(),
                [
                    'brand_product_name'=>'unique:tbl_brand_product,brand_name|max:50',
                ],
                [
                    'brand_product_name.unique'=>'Brand Name has been used!! Please check it',
                ],
            );
             if ($validate->fails()){
                return view('admin.add_brand_product',['info'=>$info])->withErrors($validate);
            }
            $data = array();
            $data['brand_name'] = $request->brand_product_name;
            $data['brand_des'] = $request->brand_product_des;
            $data['brand_status'] = $request->brand_product_status;

            DB::table('tbl_brand_product')->insert($data);
            return view('admin.add_brand_product',['success'=>'Add new Brand is successfully '])->with('info',$info);
        }
    }
    }

    public function edit_brand($brand_id){
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $edit_brand = DB::table('tbl_brand_product')->where('brand_id', $brand_id)->get();
        $manager_brand = view('admin.edit_brand')->with('edit_brand', $edit_brand)->with('brand_product',$brand_product)->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.edit_brand',$manager_brand);
    }

    public function update_brand(Request $request, $brand_id){
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_des'] = $request->brand_product_des;
        $data['brand_status'] = $request->brand_product_status; 
        DB::table('tbl_brand_product')->where('brand_id', $brand_id)->update($data);
        return redirect::to('all-brand-product');
    }
    public function delete_brand($brand_id){
        $delete_brand = DB::table('tbl_brand_product')->where('brand_id', $brand_id)->delete();
        return redirect::to('all-brand-product');
    }
}

