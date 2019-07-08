<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\p_product;
use App\p_type;
use App\p_discount;

class SearchController extends Controller
{
    
	public function getSearch(){
		$arrType = p_type::all();
		//Format y/m/d
		$now = new \DateTime();
		
		if(isset($_GET['submit-search'])){
			$key = $_GET['key'];
			$arrProductSearch = p_product::where('book_name', 'like', '%'.$key.'%')->get();
			$arrProductSearchDiscount = p_product::join('p_discount', 'p_product.discount_id', '=', 'p_discount.discount_id')
					->where('p_discount.date_start', '<=', $now)
					->where('p_discount.date_end', '>=', $now)
					->where('book_name', 'like', '%'.$key.'%')
					->get();
			if(count($arrProductSearchDiscount) == 0){
				return view('layout.v_search_none_discount', compact('arrType', 'arrProductSearch')); 
			}else{
				foreach($arrProductSearchDiscount as $product){
					$arrProductSearchLast = p_product::where('book_name', 'like', '%'.$key.'%')
					->where('book_id', '<>', $product->book_id)
					->get();
				}
				return view('layout.v_search', compact('arrType', 'arrProductSearchLast', 'arrProductSearchDiscount')); 
			}
		}
	}
}
