@extends( 'layout.v_detail_none_discount' )
@section( 'related_00' )
<!--			Block three-->
			<div id="block-three">
				<div class="row">
					<div class="col-sm-12 mb-3">
						<span style="font-weight: bold; font-size: 18px;">CÁC SẢN PHẨM CÙNG THỂ LOẠI</span>
					</div>
				</div>
				<div class="row">
					@foreach($arrProductTypeID as $product)
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
				<div class="col-sm-12 mb-0">
					<div class="pagination justify-content-center">
					{{ $arrProductTypeID -> links() }}
					</div>
				</div>
			</div>
			<!--			End block three-->
@stop

