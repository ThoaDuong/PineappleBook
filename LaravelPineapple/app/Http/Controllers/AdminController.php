<?php

namespace App\Http\Controllers;

use App\p_product;
use App\p_type;
use App\p_discount;
use App\a_position;
use App\a_admin;
use App\a_login;
use App\p_order;
use App\p_customer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function getLogin(){
		return view('admin.v_admin_login');
	}
	public function postCheck(Request $request){
		$arrLogin = a_login::all();
		foreach($arrLogin as $login){
			if($login->login_username == $request->input('username') && 
			   $login->login_password == $request->input('password')){
				$order_customer = p_order::join('p_customer', 'p_order.customer_id', '=', 'p_customer.customer_id')
					->groupBy('order_id')
					->get();
				$order_product = p_order::join('p_product', 'p_product.book_id', '=' ,'p_order.book_id')->get();
				return view('admin.v_order_show', compact('order_product', 'order_customer'));
				return view('admin.v_product_show', compact('order_customer'));
			}
		}
		return 'false';
	}
	
}
