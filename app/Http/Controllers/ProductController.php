<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
Use DB;
use Session;
Use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Pagination;
class ProductController extends Controller
{
    //
  public function add_product(Request $request){
    $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

    if (Auth::check()){
      $user = Auth::user();
      if ($request->isMethod('get')){

        return view('admin.add_product',['info'=>$user])->with('cate_product',$cate_product)->with('brand_product',$brand_product);
      } 
      if ($request->isMethod('post')){

        $validate = Validator::make($request->all(),
          [
            'product_price' => 'required|min:1|max:999999',
            'product_name'=>'unique:tbl_product,product_name|min:6|max:30',
          ],

        );

        if ( $validate->fails()){
          return view('admin.add_product',['info'=>$user])->with('cate_product',$cate_product)->with('brand_product',$brand_product)->withErrors($validate);
        }

        else {

          $data = array();
          $data['product_name'] = $request->product_name;
          $data['brand_id'] = $request->product_brand;
          $data['category_id'] = $request->product_cate;
          $data['product_price'] = $request->product_price;
          $data['product_des'] = $request->product_des;
          $get_image = $request->file('product_image');


          if ($get_image){
            $get_name_img = $get_image->getClientOriginalName();
            $new_image = $get_name_img . rand(0,99) .'.'. $get_image->getClientOriginalExtension();
            $get_image ->move('public/upload/product', $new_image);
            $data['product_image'] = $new_image;


            DB::table('tbl_product')->insert($data);

            return view('admin.add_product',['success'=>'Add new Product is successfully'])->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('info',$user);
                    //return Redirect::to('admin.add_product');
          }
          $data['product_image'] = '';

          DB::table('tbl_product')->insert($data);

          return view('admin.add_product',['success'=>'Add new Product is successfully'])->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('info',$user);
        }
      }
    }

  }

  public function all_product(){
    if (Auth::check()){
      $all_product = DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')->orderby('tbl_product.product_id','desc')->paginate(10);;
      $manager_product = view('admin.all_product')->with('all_product', $all_product);
      return view('admin_layout',['info'=>Auth::user()])->with('admin.all_product', $manager_product);
    }

                      //return view('admin.all_category_product');  
  }

///////fronend-product

  public function brand_show($id){
    $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id', 'desc')->get();
    $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id', 'desc')->get();
    $brand_show = DB::table('tbl_product')->where('brand_id',$id)->paginate(3);

    if (Auth::check()){
      return view('pages.show_brand_product',['user'=>Auth::user()])->with('databrand',$brand_show)->with('category', $cate_product)->with('brand', $brand_product);
    }

    return view('pages.show_brand_product',['databrand'=>$brand_show])->with('category', $cate_product)->with('brand', $brand_product);
  }

  public function cate_show($id){
    $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id', 'desc')->get();
    $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id', 'desc')->get();
    $cate_show = DB::table('tbl_product')->where('category_id',$id)->paginate(3);

    if (Auth::check()){
      return view('pages.show_category_product',['user'=>Auth::user()])->with('datacate',$cate_show)->with('category', $cate_product)->with('brand', $brand_product);
    }

    return view('pages.show_category_product',['datacate'=>$cate_show])->with('category', $cate_product)->with('brand', $brand_product);
  }

  public function detail($id){
   $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
   $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

   $detail_product = DB::table('tbl_product')
   ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
   ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
   ->where('tbl_product.product_id',$id)->get();
   if (Auth::check()){

    return view('pages.detailproduct',['user'=>Auth::user()])->with('detail_product',$detail_product)->with('category',$cate_product)->with('brand',$brand_product);
  }
  return view('pages.detailproduct')->with('detail_product',$detail_product)->with('category',$cate_product)->with('brand',$brand_product);

}
public function edit_product($product_id){
    $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
    $edit_pro = DB::table('tbl_product')->where('product_id', $product_id)->get();
    $manager_pro = view('admin.edit_product')->with('edit_pro', $edit_pro)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    return view('admin_layout')->with('admin.edit_product',$manager_pro);
}
public function update_product(Request $request, $product_id){
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
  DB::table('tbl_product')->where('product_id', $product_id)->update($data);

  return Redirect::to('all-product');
}
DB::table('tbl_product')->where('product_id', $product_id)->update($data);

return Redirect::to('all-product'); 
}

public function delete_product($product_id){
  $delete_product = DB::table('tbl_product')->where('product_id', $product_id)->delete();
  return Redirect::to('all-product');
}
}