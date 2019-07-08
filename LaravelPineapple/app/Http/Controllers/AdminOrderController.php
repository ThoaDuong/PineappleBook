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

class AdminOrderController extends Controller
{
    public function postView(){
		$order_customer = p_order::join('p_customer', 'p_order.customer_id', '=', 'p_customer.customer_id')
			->groupBy('order_id')
			->get();
		$order_product = p_order::join('p_product', 'p_product.book_id', '=' ,'p_order.book_id')->get();
		return view('admin.v_order_show', compact('order_product', 'order_customer'));
	}
    public function postControl(){
		if(isset($_POST['submit-search'])){
			$key = $_POST['search-key'];
			$order_customer = p_order::join('p_customer', 'p_order.customer_id', '=', 'p_customer.customer_id')
				->where('order_id', 'like', '%'.$key.'%')
				->orWhere('order_status', 'like', '%'.$key.'%')
				->groupBy('order_id')
				->get();
			$order_product = p_order::join('p_product', 'p_product.book_id', '=' ,'p_order.book_id')->get();
			return view('admin.v_order_show', compact('order_product', 'order_customer'));
		}
		if(isset($_POST['submit-all'])){
			$order_customer = p_order::join('p_customer', 'p_order.customer_id', '=', 'p_customer.customer_id')
				->groupBy('order_id')
				->get();
			$order_product = p_order::join('p_product', 'p_product.book_id', '=' ,'p_order.book_id')->get();
			return view('admin.v_order_show', compact('order_product', 'order_customer'));
		}
		if(isset($_POST['submit-delete'])){
			p_order::where('order_status', 'Đã giao')->delete();
			
			$order_customer = p_order::join('p_customer', 'p_order.customer_id', '=', 'p_customer.customer_id')
				->groupBy('order_id')
				->get();
			$order_product = p_order::join('p_product', 'p_product.book_id', '=' ,'p_order.book_id')->get();
			return view('admin.v_order_show', compact('order_product', 'order_customer'));
		}
	}
	public function postDelivery($order_id){
		if(isset($_POST['submit-delivering'])){
			p_order::where('order_id', $order_id)->update([
				'order_status' => 'Đang giao'
			]);
			$order_customer = p_order::join('p_customer', 'p_order.customer_id', '=', 'p_customer.customer_id')
				->groupBy('order_id')
				->get();
			$order_product = p_order::join('p_product', 'p_product.book_id', '=' ,'p_order.book_id')->get();
			return view('admin.v_order_show', compact('order_product', 'order_customer'));
		}
		if(isset($_POST['submit-delivered'])){
			p_order::where('order_id', $order_id)->update([
				'order_status' => 'Đã giao'
			]);
//			Development features
//			//Format y/m/d
//			$now = new \DateTime();
//			p_order::where('order_id', $order_id)
//				->where('order_status', 'Đã giao')
//				->insert([
//					'order_date' => $now
//				]);
			$order_customer = p_order::join('p_customer', 'p_order.customer_id', '=', 'p_customer.customer_id')
				->groupBy('order_id')
				->get();
			$order_product = p_order::join('p_product', 'p_product.book_id', '=' ,'p_order.book_id')->get();
			return view('admin.v_order_show', compact('order_product', 'order_customer'));
		}
	}
}
