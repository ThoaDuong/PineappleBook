<?php

namespace App\Http\Controllers;

use App\p_product;
use App\p_type;
use App\p_discount;
use App\a_position;
use App\a_admin;
use App\a_login;
use Illuminate\Http\Request;

class AdminTypeController extends Controller
{
	public function postView(){
		$arrType = p_type::all();
		return view('admin.v_type_show', compact('arrType'));
	}
    public function postControl(){
		if(isset($_POST['submit-add'])){
			return view('admin.v_type_add');
		}
		if(isset($_POST['submit-search'])){
			$key = $_POST['search-key'];
			$arrType = p_type::where('type_name', 'like', '%'.$key.'%')
				->orWhere('type_id', 'like', '%'.$key.'%')
				->get();
			return view('admin.v_type_show', compact('arrType'));
		}
		if(isset($_POST['submit-all'])){
			$arrType = p_type::all();
			return view('admin.v_type_show', compact('arrType'));
		}
	}
	public function postAdd(Request $request){
		$arrType = p_type::all();
		if(isset($_POST['submit-cancel'])){
			return view('admin.v_type_show', compact('arrType'));
		}
		if(isset($_POST['submit-save'])){
			p_type::insert(
			[
				'type_id' => $request->input('type_id'),
				'type_name' => $request->input('type_name')
			]);
			$arrType = p_type::all();
			return view('admin.v_type_show', compact('arrType'));
		}
				
	}
	public function postUpdate(Request $request, $type_id){
		$arrType = p_type::where('type_id', $type_id)->get();
		return view('admin.v_type_edit', compact('arrType'));
	}
	public function postEditUpdate(Request $request, $type_id){
		if(isset($_POST['submit-save'])){
			p_type::where('type_id', $type_id)->update(
			[
				'type_id' => $request->input('type_id'),
				'type_name' => $request->input('type_name')
			]);
			$arrType = p_type::all();
			return view('admin.v_type_show', compact('arrType'));
		}
		if(isset($_POST['submit-cancel'])){
			$arrType = p_type::all();
			return view('admin.v_type_show', compact('arrType'));
		}
	}
	public function postDelete($type_id){
		p_type::where('type_id', $type_id)->delete();
		$message = "Success deleted";
		echo "<script type='text/javascript'>alert('$message');</script>";
		$arrType = p_type::all();
		return view('admin.v_type_show', compact('arrType'));
	}
}
