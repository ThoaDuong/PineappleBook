<?php

namespace App\Http\Controllers;

use App\p_product;
use App\p_type;
use App\p_discount;
use App\a_position;
use App\a_admin;
use App\a_login;
use Illuminate\Http\Request;

class AdminDiscountController extends Controller
{
	public function postView(){
		$arrDiscount = p_discount::all();
		return view('admin.v_discount_show', compact('arrDiscount'));
	}
    public function postControl(){
		if(isset($_POST['submit-add'])){
			return view('admin.v_discount_add');
		}
		if(isset($_POST['submit-search'])){
			$key = $_POST['search-key'];
			$arrDiscount = p_discount::where('discount_name', 'like', '%'.$key.'%')
				->orWhere('discount_id', 'like', '%'.$key.'%')
				->get();
			return view('admin.v_discount_show', compact('arrDiscount'));
		}
		if(isset($_POST['submit-all'])){
			$arrDiscount = p_discount::all();
			return view('admin.v_discount_show', compact('arrDiscount'));
		}
	}
	public function postAdd(Request $request){
		$arrDiscount = p_discount::all();
		if(isset($_POST['submit-cancel'])){
			return view('admin.v_discount_show', compact('arrDiscount'));
		}
		if(isset($_POST['submit-save'])){
			p_discount::insert(
			[
				'discount_id' => $request->input('discount_id'),
				'discount_name' => $request->input('discount_name'),
				'date_start' => $request->input('date_start'),
				'date_end' => $request->input('date_end'),
				'number' => $request->input('number'),
			]);
			$arrDiscount = p_discount::all();
			return view('admin.v_discount_show', compact('arrDiscount'));
		}
				
	}
	public function postUpdate(Request $request, $discount_id){
		$arrDiscount = p_discount::where('discount_id', $discount_id)->get();
		return view('admin.v_discount_edit', compact('arrDiscount'));
	}
	public function postEditUpdate(Request $request, $discount_id){
		if(isset($_POST['submit-save'])){
			p_discount::where('discount_id', $discount_id)->update(
			[
				'discount_id' => $request->input('type_id'),
				'discount_id' => $request->input('discount_id')
			]);
			$arrDiscount = p_discount::all();
			return view('admin.v_discount_show', compact('arrDiscount'));
		}
		if(isset($_POST['submit-cancel'])){
			$arrDiscount = p_discount::all();
			return view('admin.v_discount_show', compact('arrDiscount'));
		}
	}
	public function postDelete($discount_id){
		p_discount::where('discount_id', $discount_id)->delete();
		$message = "Success deleted";
		echo "<script type='text/javascript'>alert('$message');</script>";
		$arrDiscount = p_discount::all();
		return view('admin.v_discount_show', compact('arrDiscount'));
	}
}
