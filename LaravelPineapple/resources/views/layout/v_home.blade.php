@extends( 'layout.v_master' )
@section( 'body_home' )
	<!--	Home body-->
	<div class="home-body">
		<div class="container background-contain">
			<!--			Body one, start carousel-->
			<div class="row" id="content-picture">
				<div class="col-sm-8">
					<div id="home" class="carousel slide clearfix" data-ride="carousel">
						<ul class="carousel-indicators">
							<li data-target="#home" data-slide-to="0" class="active"></li>
							<li data-target="#home" data-slide-to="1"></li>
							<li data-target="#home" data-slide-to="2"></li>
						</ul>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="img-slide-wall d-block w-100" src="../images/book-wall-1.jpg" alt="Book wall first">
							</div>
							<div class="carousel-item">
								<img class="img-slide-wall d-block w-100" src="../images/book-wall-2.jpg" alt="Book wall  second">
							</div>
							<div class="carousel-item">
								<img class="img-slide-wall d-block w-100" src="../images/book-wall-4.jpg" alt="Book wall  third">
							</div>
						</div>
						<a class="carousel-control-prev" href="#home" data-slide="prev">
							<span class="carousel-control-prev-icon"></span>
						  </a>
					
						<a class="carousel-control-next" href="#home" data-slide="next">
							<span class="carousel-control-next-icon"></span>
						  </a>
					
					</div>
				</div>
				<!--				End col-sm-8-->
				<div class="col-sm-4">
					<img id="img-next-slide" src="../images/book-vertical.jpg" alt="Sách">
				</div>
			</div>
			<!--			End carousel-->
			<div class="row" id="border-text">
				<div class="col-sm-2"> <img id="img-deal" src="../images/deal.png" alt="deal">
				</div>
				<div class="col-sm-10">
					<div class="display-4">Sách hay giảm giá</div>
					<div>
						Cập nhật sách hay giảm giá tại Pineapple. Hãy quay lại trang này thường xuyên để cập nhật sách mới!
					</div>
				</div>
			</div>
			<!--			End body one-->
			<div class="row">
				<div class="col-sm-12 border-under"></div>
			</div>
			<!--			Body two-->
			<div class="row">	
				@foreach($arrProductDiscount as $product)
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
					{{ $arrProductDiscount -> links() }}
					</div>
				</div>
			</div>
			<!--			End body two-->
			<div class="row">
				<div class="col-sm-12 border-under"></div>
			</div>
			<!--			Body three-->
			<div class="row">
				<div class="col-sm-12">
					<div class="include-wall">
						<img id="img-book-wall" src="../images/book-wall-5.jpg" alt="Book wall">
					</div>
					<div class="row mt-3 center">
						<div class="col-sm-4"><button class="btn btn-info">Đánh giá sách</button>
						</div>
						<div class="col-sm-4"><button class="btn btn-info">Thảo luận</button>
						</div>
						<div class="col-sm-4"><button class="btn btn-info">Bình luận</button>
						</div>
					</div>
				</div>
			</div>
			<!--			End body three-->
		</div>
		<!--		End body(include: one, two, three)-->
	</div>
<!--	End home body-->	
@stop