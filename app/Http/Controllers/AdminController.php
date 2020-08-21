<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    //
    public function index(){
        Auth::logout();
        return view('pages.login',['fails'=>'']);
    }
    public function show_dashboard(){
        if (Auth::check()){
            if (Auth::user()->level == 1){
                return view('admin.dashboard',['info'=>Auth::user()]);    
            }
            return view('pages.login',['fails'=>'You can`t not permission entry!!you are a user']);
        }
        return view('pages.login',['fails'=>'You need to login acount Admin!!']);
    }
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

        if (Auth::attempt(['email'=>$admin_email,'password'=>$admin_password])){
            if (Auth::user()->level == 1){
                return view('admin.dashboard',['info'=>Auth::user()]);    
            }
            return view('pages.login',['fails'=>'You can`t not permission entry!!you are a user']);
        }
        else{
            return view('pages.login',['fails'=>'Your email or password incorrect!!']);
        }
    }

}
