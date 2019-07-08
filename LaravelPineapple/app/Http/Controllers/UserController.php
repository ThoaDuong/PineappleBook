<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\p_product;
use App\p_type;
use App\p_discount;

class UserController extends Controller
{
    public function getHome($body){
		$arrType = p_type::all();
		$arrProduct = p_product::all();
		$arrDiscount = p_discount::all();
		//Format y/m/d
		$now = new \DateTime();
		
		$arrProductDiscount = p_product::join('p_discount', 'p_product.discount_id', '=', 'p_discount.discount_id')
			->where('p_discount.date_start', '<=', $now)
			->where('p_discount.date_end', '>=', $now)
			->paginate(4);
		if($body == 'home'){
			return view('layout.v_home', compact('arrType', 'arrProductDiscount'));
		}
		else{
			foreach($arrProduct as $product){
				if($body == $product->book_id){
					//Check products with book_id 
					$arrProductIDDiscount = p_product::join('p_discount', 'p_product.discount_id', '=', 'p_discount.discount_id')
						->where('p_discount.date_start', '<=', $now)
						->where('p_discount.date_end', '>=', $now)
						->where('p_product.book_id', $product->book_id)
						->get();
					$arrProductID = p_product::where('book_id', $product->book_id)->get();
		
					$arrProductTypeIDDiscount = p_product::join('p_discount', 'p_product.discount_id', '=', 'p_discount.discount_id')
						->where('p_discount.date_start', '<=', $now)
						->where('p_discount.date_end', '>=', $now)
						->where('type_id', $product->type_id)
						->get();
					$data = array();
					foreach($arrProductTypeIDDiscount as $item){
						$data[] = $item->book_id;
					}
					$data[] = $product->book_id;
					$arrRelateDiscount = p_product::join('p_discount', 'p_product.discount_id', '=', 'p_discount.discount_id')
						->where('p_discount.date_start', '<=', $now)
						->where('p_discount.date_end', '>=', $now)
						->where('type_id', $product->type_id)
						->paginate(4);
					
					
					if(count($arrProductIDDiscount) == 0){
						if(count($arrProductTypeIDDiscount) == 0){
							//case 0 0
							//Check products with different book_id
							$arrProductTypeID = p_product::where('type_id', $product->type_id)
							->where('book_id', '<>', $product->book_id)
							->paginate(4);
							return view('layout.v_related_00', compact('arrType', 'arrProductID', 'arrProductTypeID'));
						}else{
							//case 0 1
							$arrNotIn = p_product::where('type_id', $product->type_id)
								->whereNotIn('book_id', $data)
								->paginate(4);
							return view('layout.v_related_01', compact('arrType', 'arrProductID', 'arrNotIn', 'arrRelateDiscount'));
						}
					}else{
						//case 1 0
						if(count($arrProductTypeIDDiscount) == 0){
							//none
						}else{
							//case 1 1
							$arrProductTypeDiscount = p_product::join('p_discount', 'p_product.discount_id', '=', 'p_discount.discount_id')
							->where('p_discount.date_start', '<=', $now)
							->where('p_discount.date_end', '>=', $now)
							->where('type_id', $product->type_id)
							->where('booK_id', '<>', $product->book_id)
							->paginate(4);
							
							$arrDiscountNotIn = p_product::where('type_id', $product->type_id)
								->whereNotIn('book_id', $data)
								->paginate(4);
							
							return view('layout.v_related_11', compact('arrType', 'arrProductIDDiscount', 'arrDiscountNotIn', 'arrProductTypeDiscount'));
						}
					}
				}
			}
			foreach($arrType as $type){
				//Check products with type_id
				if($body == $type->type_id){
					$arrProductTypeDiscount = p_product::join('p_discount', 'p_product.discount_id', '=', 'p_discount.discount_id')
					->where('p_discount.date_start', '<=', $now)
					->where('p_discount.date_end', '>=', $now)
					->where('p_product.type_id', $type->type_id)
					->get();
					foreach($arrProductTypeDiscount as $p){
						$arrProductTypeNotDiscount = p_product::where('discount_id', '<>', $p->discount_id)
							->where('type_id', $type->type_id)
							->get();
						return view('layout.v_category', compact('arrType', 'arrProductTypeDiscount', 'arrProductTypeNotDiscount'));
					}
					$arrProductType = p_product::where('type_id', $type->type_id)->get();
					return view('layout.v_category_none_discount', compact('arrType', 'arrProductType'));
				}
			}
		}
	}
	public function postControlAmount(){
		if(isset($_GET['submit-plus'])){
			//
		}
		if(isset($_GET['submit-sub'])){
			//
		}
	}
	
}
