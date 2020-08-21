<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
Use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Pagination;
use Validator;
class CategoryProduct extends Controller
{
 
    public function all_category_product(){
        if (Auth::check()){
            $all_category_product = DB::table('tbl_category_product')->get();
            
            return view('admin.all_category_product',['info'=>Auth::user()])->with('all_category_product', $all_category_product);
        //return view('admin.all_category_product');    
        }
    }
    public function add_category_product(Request $request){
    	if (Auth::check()){
            $user = Auth::user();
            if ($request->isMethod('get')){
                return view('admin.add_category_product',['info'=>$user]);

            }

            if ($request->isMethod('post')){

                $validate = Validator::make($request->all(),
                    [
                        'category_product_name'=>'unique:tbl_category_product,category_name|max:50',
                    ],
                    [
                        'category_product_name.unique'=>'Category Name has been used!! Please check it',
                    ],
                );
                if ($validate->fails()){
                    return view('admin.add_category_product',['info'=>$user])->withErrors($validate);
                }
                $data = array();
                $data['category_name'] = $request->category_product_name;
                $data['category_des'] = $request->category_product_des;
                $data['category_status'] = $request->category_product_status;

                DB::table('tbl_category_product')->insert($data);

                return view('admin.add_category_product',['success'=>'Add Category is successfully'])->with('info',$user);
            }
        }
    }

    public function edit_cate($category_id){
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $edit_cate = DB::table('tbl_category_product')->where('category_id', $category_id)->get();
        $manager_cate = view('admin.edit_cate')->with('edit_cate', $edit_cate)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.edit_cate',$manager_cate);
    }

    public function update_cate(Request $request, $category_id){
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_des'] = $request->category_product_des;
        $data['category_status'] = $request->category_product_status; 
        DB::table('tbl_category_product')->where('category_id', $category_id)->update($data);
        return redirect::to('all-category-product');
    }
    public function delete_cate($category_id){
        $delete_cate = DB::table('tbl_category_product')->where('category_id', $category_id)->delete();
        return redirect::to('all-category-product');
    }
}

