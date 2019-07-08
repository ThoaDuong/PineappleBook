<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
use App\p_product;
use App\p_type;
use App\p_discount;
use App\p_customer;
use App\p_order;

class CartController extends Controller
{
	public function __construct(Request $request) {
    $this->request = $request;
	}
	//Show shopping cart when click order
    public function getShoppingCart(){
		$cart = Cart::content();
        $this->data['cart'] = $cart;
		$arrType = p_type::all();
		return view('layout.v_shopping_cart', $this->data, compact('arrType'));
	}
	//add new item into cart
	public function postAddCart($book_id){
		//Format y/m/d
		$now = new \DateTime();
		$product = p_product::where('book_id', $book_id)->first();
		$check_discount = p_product::join('p_discount', 'p_product.discount_id', '=', 'p_discount.discount_id')
						->where('p_discount.date_start', '<=', $now)
						->where('p_discount.date_end', '>=', $now)
						->where('p_product.book_id', $book_id)
						->first();
		$real_price = 0;
		if(count($check_discount) > 0){
			$real_price = $check_discount->price - ($check_discount->price * $check_discount->number/100);
		}else{
			$real_price = $product->price;
		}
		if (Request::isMethod('post')) {
            $this->data['title'] = 'Giỏ hàng của bạn';
            $cartInfo = [
                'id' => $book_id,
                'name' => $product->book_name,
                'price' => $real_price,
                'qty' => '1',
				'options' => ['image' => $product->image]
            ];
            Cart::add($cartInfo);
        }
        $cart = Cart::content();
        $this->data['cart'] = $cart;
		$arrType = p_type::all();
        return view('layout.v_shopping_cart', $this->data, compact('arrType'));
	}
	//increment and decrease the quantity in cart
	public function getQtyCart(){
		 //increment the quantity
    if (Request::get('product_id') && (Request::get('increment')) == 1) {
		$id = Request::get('product_id');
		$item = Cart::search(function ($key, $value) use($id) {
		   return $key->id == $id;
		})->first();
       	Cart::update($item->rowId, $item->qty+1);
    }

    //decrease the quantity
    if (Request::get('product_id') && (Request::get('decrease')) == 1) {
        $id = Request::get('product_id');
		$item = Cart::search(function ($key, $value) use($id) {
		   return $key->id == $id;
		})->first();
       	Cart::update($item->rowId, $item->qty-1);
    }
        $cart = Cart::content();
        $this->data['cart'] = $cart;
		$arrType = p_type::all();
        return view('layout.v_shopping_cart', $this->data, compact('arrType'));
	}
	//remove the item in cart
	public function postRemoveCart($book_id){
		$item = Cart::search(function ($key, $value) use($book_id) {
		   return $key->id == $book_id;
		})->first();
		Cart::remove($item->rowId);
		
		$cart = Cart::content();
        $this->data['cart'] = $cart;
		$arrType = p_type::all();
		return view('layout.v_shopping_cart', $this->data, compact('arrType'));
	}
	public function postRemoveAll(){
		Cart::destroy();
		$cart = Cart::content();
        $this->data['cart'] = $cart;
		$arrType = p_type::all();
		return view('layout.v_shopping_cart', $this->data, compact('arrType'));
	}
	
	//store items in cart by checkout
	public function postCheckout(){
		$cart = Cart::content();
		if(isset($_POST['submit-confirm'])){
			p_customer::insert(
			[
				'customer_name' => Request::input('customer_name'),
				'customer_number' => Request::input('customer_number'),
				'customer_email' => Request::input('customer_email'),
				'customer_address' => Request::input('customer_address'),
				'customer_province' => Request::input('customer_province'),
				'customer_message' => Request::input('customer_message'),
			]);
			$customer_id = p_customer::where('customer_name', Request::input('customer_name'))
					->where('customer_number', Request::input('customer_number'))->first();
			$order_id = p_order::orderBy('order_id', 'desc')->take(1)->first();
			$set_id = 0;
			if(count($order_id) <= 0){
				$set_id = 1;
			}else{
				$set_id = $order_id->order_id + 1;
			}
			foreach($cart as $item){
				p_order::insert(
				[
					'order_id' => $set_id,
					'book_id' => $item->id,
					'order_amount' => $item->qty,
					'order_price' => $item->price * $item->qty,
					'customer_id' => $customer_id->customer_id,
					'order_status' => 'Chưa giao'
				]);
			}
			$arrLastOrder = p_order::orderBy('order_id', 'desc')->take(1)->first();
			echo($arrLastOrder->order_id);
			$arrType = p_type::all();
			return view('layout.v_alart_success', compact('arrType', 'arrLastOrder'));
		}
		if(isset($_POST['submit-cancel'])){
			$arrType = p_type::all();
			return view('layout.v_shopping_cart', compact('arrType', 'cart'));
		}
		$arrType = p_type::all();
		return view('layout.v_checkout', compact('arrType', 'cart'));
	}
	
	//Check order by order_id
	public function postCartCheck(){
		$key = Request::input('key');
		
	}
	
	public function postPayCart($book_id){
		//Format y/m/d
		$now = new \DateTime();
		$product = p_product::where('book_id', $book_id)->first();
		$check_discount = p_product::join('p_discount', 'p_product.discount_id', '=', 'p_discount.discount_id')
						->where('p_discount.date_start', '<=', $now)
						->where('p_discount.date_end', '>=', $now)
						->where('p_product.book_id', $book_id)
						->first();
		$real_price = 0;
		if(count($check_discount) > 0){
			$real_price = $check_discount->price - ($check_discount->price * $check_discount->number/100);
		}else{
			$real_price = $product->price;
		}
		$cartInfo = [
			'id' => $book_id,
			'name' => $product->book_name,
			'price' => $real_price,
			'qty' => '1',
			'options' => ['image' => $product->image]
		];
        Cart::add($cartInfo);
		$cart = Cart::content();
		if(isset($_POST['submit-cancel'])){
			$arrType = p_type::all();
			return view('layout.v_shopping_cart', compact('arrType', 'cart'));
		}
		$arrType = p_type::all();
		return view('layout.v_checkout', compact('arrType', 'cart'));
	}
}
