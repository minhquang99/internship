<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pagination;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class UserController extends Controller
{
    public function index(Request $request){
        $data = Pagination::paginate(6);
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id', 'desc')->get();
        if ($request->isMethod('get')){
            return view('pages.login')->with('category', $cate_product)->with('brand', $brand_product);
        }

        if ($request->isMethod('post')){

            $validate = Validator::make($request->all(),
                [
                    'emaillogin'=>'bail|email',
                    'passwordlogin'=>'bail|min:8|max:30',
                ],
                [
                    'emaillogin.email'=>'Email is wrong syntax!',
                    'passwordlogin.min'=>'Password is not belower than 8 character!',
                    'passwordlogin.max'=>'Password is not longer than 30 character!',
                ]
            );
            if ($validate->fails()){
                return view('pages.login')->withErrors($validate)->with('category', $cate_product)->with('brand', $brand_product);
            }
            $email = $request->emaillogin;
            $password = $request->passwordlogin;

            if (Auth::attempt(['email'=>$email,'password'=>$password])){
                $user = Auth::user();
                return view('pages.home',['user'=>$user])->with('data',$data)->with('category', $cate_product)->with('brand', $brand_product);;
            }
            else {
                return view('pages.login',['fails'=>'Your email or password is wrong!!'])->with('category', $cate_product)->with('brand', $brand_product);
            }   
        }
    }

    public function indexregister(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id', 'desc')->get();

        if ($request->isMethod('get')){
            return view('pages.register')->with('category', $cate_product)->with('brand', $brand_product);
        }
        
        if ($request->isMethod('post')){
            $validate = Validator::make($request->all(),
                [
                    'nameregis' => 'bail|unique:users,name|min:8|max:30',
                    'email' => 'bail|unique:users,email|email ',
                    'passwordregis' => 'bail|min:8|max:30',
                    'comfirmpassword' => 'bail|same:passwordregis',
                ],

                [
                    'nameregis.unique'=>'User Name was created!!Please try another',
                    'nameregis.min'=>'User Name is not belower than 8 character!',
                    'nameregis.max'=>'User Name is not longer than 30 character!',
                    'email.unique'=>'Email was created!!Please try something else',
                    'email.email'=>'Email is wrong syntax!!',
                    'password.min'=>'Password is not belower than 8 character!',
                    'password.max'=>'Password is not longer than 30 character!',
                    'comfirmpassword.same'=>'Password is not the same!',
                ],

            );
            if ($validate->fails()){
                return  view('pages.register')->withErrors($validate)->with('category', $cate_product)->with('brand', $brand_product);
            }

            $data = array();
            $data['name'] = $request->nameregis;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->passwordregis);
            $data['level'] = 0;

            DB::table('users')->insert($data);

            return view('pages.login',['success'=>'Your acount is creating'])->with('category', $cate_product)->with('brand', $brand_product);
        }
    }

    public function logout(){
        $data = Pagination::paginate(6);
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id', 'desc')->get();
        Session::flush();
        Auth::logout();
        return view('pages.home')->with('data',$data)->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function show_home(){
        $data = Pagination::paginate(6);
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id', 'desc')->get();
        $all_product = DB::table('tbl_product')->orderby('product_id','desc')->limit(6)->get();
        return view('pages.home')->with('data', $data)->with('category', $cate_product)->with('brand', $brand_product)->with('all_product',$all_product);
    }
}





