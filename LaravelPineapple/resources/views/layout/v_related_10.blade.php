@extends( 'layout.v_detail' )
@section( 'related_10' )
<!--			Block three-->
			<div id="block-three">
				<div class="row">
					<div class="col-sm-12">
						<span style="font-weight: bold; font-size: 18px;">CÁC SẢN PHẨM KHÁC</span>
					</div>
				</div>
				<div class="row">
					@foreach($ as $product)
					<div class="col-sm-3">
						<a href="master-{{$product->book_iarrProductTypeIDd}}">
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
			</div>
			<!--			End block three-->
@stop

