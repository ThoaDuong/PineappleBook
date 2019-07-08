@extends( 'layout.v_detail' )
@section( 'related_11' )	
			<div id="block-three">
				<div class="row">
					<div class="col-sm-12 mb-3">
						<span style="font-weight: bold; font-size: 18px;">CÁC SẢN PHẨM CÙNG THỂ LOẠI ĐƯỢC KHUYẾN MÃI</span>
					</div>
				</div>
				<div class="row">
					@foreach($arrProductTypeDiscount as $product)
					<div class="col-sm-3">
						<a href="master-{{$product->book_id}}">
							<div class="products-home mb-2">
								<img class="img-product-home" src="../images/{{$product->image}}" alt="book cover">
								<div class="mt-2 detail-product-home">
									{{$product->book_name}}
									<div class="pb-3">
										<span class="sale-price-home">
											{{$product->price - ($product->price * ($product->number)/100)}} đ
										</span>
										<span class="base-price-home">{{$product->price}} đ</span>
									</div>
								</div>
								<div class="item-discount">
									<span class="sale-discount">Sale {{$product->number}}%</span><br>
									<img class="img-discount" src="../images/discount.jpg" alt="banner discount">

								</div>

							</div>
						</a>
					</div>
					@endforeach
				</div>
				<div class="row">
					<div class="col-sm-12 mb-0">
						<div class="pagination justify-content-center">
						{{ $arrProductTypeDiscount -> links() }}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 border-under"></div>
				</div>
				<div class="row">
					<div class="col-sm-12 mb-3">
						<span style="font-weight: bold; font-size: 18px;">CÁC SẢN PHẨM CÙNG THỂ LOẠI</span>
					</div>
				</div>
				<div class="row">
					@foreach($arrDiscountNotIn as $product)
					<div class="col-sm-3">
						<a href="master-{{$product->book_id}}">
							<div class="products-home mb-2">
								<img class="img-product-home" src="../images/{{$product->image}}" alt="book cover">
								<div class="mt-2 detail-product-home">
									{{$product->book_name}}
									<div class="pb-3">
										<span class="sale-price-home">{{$product->price}} đ</span>
									</div>
								</div>
							</div>
						</a>
					</div>
					@endforeach
				</div>
				<div class="row">
					<div class="col-sm-12 mb-0">
						<div class="pagination justify-content-center">
						{{ $arrDiscountNotIn -> links() }}
						</div>
					</div>
				</div>
			</div>
@stop