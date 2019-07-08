@extends( 'layout.v_master' )
@section( 'body_detail_none_discount' )
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!--	Detail body-->
	<div class="detail-body">
		<div class="container background-contain">
			@foreach($arrProductID as $product)
			<!--			Block one-->
			<div id="block-one">
				<div class="row">
					<div class="col-sm-5">
						<div class="div-big-pic">
							<img class="img-big" src="../images/{{$product->image}}" alt="Book wall">
						</div>
					</div>
					
					<div class="col-sm-7">
						<div class="div-book-name">{{$product->book_name}}</div>
						<div class="div-price">
							<div class="inline div-sale-price">{{$product->price}} đ</div>
						</div>
						<div class="div-transfer mt-2">
							<div class="row">
								<div class="col-3">
									<h6>VẬN CHUYỂN</h6>
								</div>
								<div class="col-9">
									<div>Miễn Phí Vận Chuyển khi đạt mức giá trị đơn hàng tối thiểu</div>
								</div>
							</div>
						</div>
						<div class="div-amount mt-2">
							<div class="row">
								<div class="col-3">
									<h6>SỐ LƯỢNG</h6>
								</div>
								<div class="col-9">
<!--									<form method="get" action="control-amount" >-->
									<form>
										<div class="btn-group">
											<button type="submit" name="submit-sub" class="btn-outline-dark">-</button>
											<input name="value-amount" type="button" value="1" disabled class="btn-outline-dark txt-amount">
											<button type="submit" name="submit-plus" class="btn-outline-dark">+</button>
										</div>
									</form>
									<div>Sản phẩm có sẵn</div>
								</div>
							</div>
						</div>
						<div class="div-pay mt-2">
							<div class="row">
								
								<form method="post" action="add-cart-{{$product->book_id}}">
									{{ csrf_field() }}
									<div class="col-4">
										<button class="btn btn-outline-danger">Thêm Vào Giỏ Hàng</button>
									</div>
								</form>
								<form method="post" action="pay-cart-{{$product->book_id}}">
									{{ csrf_field() }}
									<div class="col-4">
										<button class="btn btn-danger">Mua Ngay</button>
									</div>
								</form>
								
								
							</div>
						</div>
						<div class="border-bottom mt-4 mb-4 clearfix"></div>
						<div>
							<span style="color: lightblue; font-size: 18px; font-weight: bold">Pineapple đảm bảo</span>
							<span style="color: #918E8E">7 ngày Trả Hàng / Hoàn Tiền</span>
						</div>
					</div>
				</div>
			</div>
			<!--			End block one-->

			<!--			Block two-->
			<div id="block-two">
				<div class="row">
					<div class="col-sm-12"><span style="font-weight: bold; font-size: 18px;">GIỚI THIỆU SÁCH</span>
					</div>
					<div class=" col-sm-12 review-content">
						{{$product->describe}}
					</div>
				</div>
			</div>
			@endforeach
			<!--			End block two-->
			<div class="row">
				<div class="col-sm-12 border-under"></div>
			</div>

			<!--			Block three-->
			<!--			Block three-->
			@yield('related_00')
			@yield('related_01')
			<!--			End block three-->

		</div>
	</div>
<!--	End detail body-->
@stop