@extends( 'layout.v_master' )
@section( 'body_category' )
	<!--	Category body-->
	<div class="catogery-body">
		<div class="container background-contain">
			<div class="row mt-3">
				<div class="col-sm-3">
					<div class="div-title">Fanpage</div>
					<div class="div-fanpage">
						<div class="row">
							<div class="col-sm-3"><img class="img-fanpage" height="50px" src="../images/Pineapple-2.jpg" alt="Pineapple">
							</div>
							<div class="col-sm-9">
								<div class="div-txt-fanpage">Pineapple</div>
								<div>153.235 lượt thích</div>
							</div>
						</div>
						<div class="row btn-fanpage">
							<div class="col-sm-12">
								<button class="btn-outline-dark">Thích Trang</button>
							</div>
						</div>
					</div>
					<!--					End fanpage-->
					<div class="div-title">Danh mục sách</div>
					<div class="div-category">
						<ul class="clearfix">
							@foreach($arrType as $type)
							<li><a href="master-{{$type->type_id}}">{{$type->type_name}}</a></li>
							@endforeach						
						</ul>
					</div>
				</div>
				<div class="col-sm-9">
					<div class="row">
							@foreach($arrProductTypeDiscount as $product)
							<div class="col-sm-3">
								<a href="master-{{$product->book_id}}">
									<div class="products-category mb-2">
										<img class="img-product-category" src="../images/{{$product->image}}" alt="book cover">
										<div class="mt-2 detail-product-category">
										{{$product->book_name}}
										<div class="pb-3">
											<span class="sale-price-category">
												{{$product->price - ($product->price * ($product->number)/100)}} đ
											</span><br>
											<span class="base-price-category">{{$product->price}}đ</span>
										</div>
									</div>
									</div>
									<div class="item-discount">
										<span class="sale-discount">Sale {{$product->number}}%</span><br>
										<img class="img-discount" src="../images/discount.jpg" alt="banner discount">
									</div>
								</a>
							</div>
							@endforeach		
						@foreach($arrProductTypeNotDiscount as $product)
						<div class="col-sm-3">
							<a href="master-{{$product->book_id}}">
								<div class="products-category mb-2">
									<img class="img-product-category" src="../images/{{$product->image}}" alt="book cover">
									<div class="mt-2 detail-product-category">
									{{$product->book_name}}
									<div class="pb-3">
										<span class="sale-price-category">{{$product->price}}đ</span>
									</div>
								</div>
								</div>
							</a>
						</div>
						@endforeach
					</div>
				</div>
				<!--				End col-9-->
			</div>
		</div>
	</div>
<!--	End catogery body-->
@stop