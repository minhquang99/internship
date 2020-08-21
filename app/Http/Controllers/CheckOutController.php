<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use Auth;
use Validator;
Use Illuminate\Support\Str;
Use Illuminate\Support\Facades\Redirect;
class CheckOutController extends Controller
{
    //
	public function payment(){
		if(Auth::check()){
			return view('pages.payment',['user'=>Auth::user()]);
		}
	}
	public function save_order(Request $request){
			$flag = false;
		if(Auth::check()){
			$user = Auth::user();
			$dataphone = array();
			$dataphone = [
				'096' => 'Viettel',
				'097' => 'Viettel',
				'098' => 'Viettel',
				'032' => 'Viettel',
				'033' => 'Viettel',
				'034' => 'Viettel',
				'035' => 'Viettel',
				'036' => 'Viettel',
				'037' => 'Viettel',
				'038' => 'Viettel',
				'039' => 'Viettel',

				'090' => 'Mobifone',
				'093' => 'Mobifone',
				'070' => 'Mobifone',
				'071' => 'Mobifone',
				'072' => 'Mobifone',
				'076' => 'Mobifone',
				'077' => 'Mobifone',
				'078' => 'Mobifone',

				'091' => 'Vinaphone',
				'094' => 'Vinaphone',
				'083' => 'Vinaphone',
				'084' => 'Vinaphone',
				'085' => 'Vinaphone',
				'087' => 'Vinaphone',
				'089' => 'Vinaphone',

				'099' => 'Gmobile',

				'092' => 'Vietnamobile',
				'056' => 'Vietnamobile',
				'058' => 'Vietnamobile',

				'095'  => 'SFone'
			];
			$validate = Validator::make($request->all(),
				[
					'phone'=>'numeric',
				],
				[
					'phone.numeric'=>'Please type a number 0-9 !!',
				]
			);
			if ($validate->fails()){
				return view('pages.payment')->withErrors($validate);
			}
			$number = $request->phone;


			if (!preg_match('/^0[0-9]{9}$/', $number)){
				return view('pages.payment',['fails'=>'Your number phone is wrong!!']);
			}
			$key_numbers = array_keys($dataphone);

			foreach ($key_numbers as $key => $key_number){
				if (Str::startsWith($number,$key_number)){
					$flag = true;
				}
				if($flag){
					$data = array();
					$data['shipping_name'] = $request->shipping_name;
					$data['phone'] = $request->phone;
					$data['address'] = $request->address;
					$data['order_total'] = number_format(Session::get('Cart')->totalPrice);
					$shipping_id = DB::table('shipping')->insertGetId($data);
					//Session::put('shipping_id', $shipping_id);

			    	//insert order

					$order_data = array();
					$order_data['user_id'] = $user->id;
					$order_data['shipping_name'] = $request->shipping_name;
					$order_data['shipping_date'] = date('Y-m-d H:i:s');
					$order_data['shipping_id'] = $shipping_id;
					$order_data['order_total'] = number_format(Session::get('Cart')->totalPrice);
					$order_data['order_status'] = 'Đang chờ xử lí';
					$order_id = DB::table('order_id')->insertGetId($order_data);

			        //insert order_details
					foreach(Session::get('Cart')->products as $item){
						$order_d_data['order_id'] = $order_id;
						$order_d_data['product_id'] = $item['productInfo']->product_id;
						$order_d_data['product_name'] = $item['productInfo']->product_name;
						$order_d_data['product_price'] = $item['price'];
						$order_d_data['product_sales_quantity'] = $item['quanty'];
						$order_d_id = DB::table('order_details_id')->insertGetId($order_d_data);
					}
					Session::put('msg','Đặt hàng thành công. Cảm ơn quý khách!');
					return Redirect::to('/thanh-toan');
				}
			}
			return view('pages.payment',['fails'=>'sorry!!your number is not in vietnam']);
		}	
	}

	public function all_payment(){
		$all_payment = DB::table('order_id')->get();
		return view('admin.all_payment')->with('all_payment', $all_payment);
	}

	public function order_detail($order_id){
		$all_detail = DB::table('order_details_id')->where('order_id', $order_id)->get();
		return view('admin.order_detail')->with('all_detail', $all_detail);
	}
}
