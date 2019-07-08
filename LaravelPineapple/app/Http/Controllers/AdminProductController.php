<?php

namespace App\Http\Controllers;

use App\p_product;
use App\p_type;
use App\p_discount;
use App\a_position;
use App\a_admin;
use App\a_login;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
	public function postView(){
		$arrProduct = p_product::all();
		return view('admin.v_product_show', compact('arrProduct'));
	}
    public function postControl(){
		if(isset($_POST['submit-add'])){
			return view('admin.v_product_add');
		}
		if(isset($_POST['submit-search'])){
			$key = $_POST['search-key'];
			$arrProduct = p_product::where('book_name', 'like', '%'.$key.'%')
				->orWhere('book_id', 'like', '%'.$key.'%')
				->get();
			return view('admin.v_product_show', compact('arrProduct'));
		}
		if(isset($_POST['submit-all'])){
			$arrProduct = p_product::all();
			return view('admin.v_product_show', compact('arrProduct'));
		}
	}
	public function postAdd(Request $request){
		$arrProduct = p_product::all();
		if(isset($_POST['submit-cancel'])){
			return view('admin.v_product_show', compact('arrProduct'));
		}
		if(isset($_POST['submit-save'])){
			p_product::insert(
			[
				'book_id' => $request->input('book_id'),
				'book_name' => $request->input('book_name'),
				'amount' => $request->input('amount'),
				'price' => $request->input('price'),
				'describe' => $request->input('describe'),
				'image' => $request->input('image'),
				'type_id' => $request->input('type_id'),
				'discount_id' => $request->input('discount_id')
			]);
			$arrProduct = p_product::all();
			return view('admin.v_product_show', compact('arrProduct'));
		}
				
	}
	public function postUpdate(Request $request, $book_id){
		$arrProduct = p_product::where('book_id', $book_id)->get();
		return view('admin.v_product_edit', compact('arrProduct'));
	}
	public function postEditUpdate(Request $request, $book_id){
		if(isset($_POST['submit-save'])){
			p_product::where('book_id', $book_id)->update(
			[
				'book_id' => $request->input('book_id'),
				'book_name' => $request->input('book_name'),
				'amount' => $request->input('amount'),
				'price' => $request->input('price'),
				'describe' => $request->input('describe'),
				'image' => $request->input('image'),
				'type_id' => $request->input('type_id'),
				'discount_id' => $request->input('discount_id')
			]);
			$arrProduct = p_product::all();
			return view('admin.v_product_show', compact('arrProduct'));
		}
		if(isset($_POST['submit-cancel'])){
			$arrProduct = p_product::all();
			return view('admin.v_product_show', compact('arrProduct'));
		}
	}
	public function postDelete($book_id){
		p_product::where('book_id', $book_id)->delete();
		$message = "Success deleted";
		echo "<script type='text/javascript'>alert('$message');</script>";
		$arrProduct = p_product::all();
		return view('admin.v_product_show', compact('arrProduct'));
	}
}
