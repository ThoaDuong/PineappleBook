@extends( 'layout.v_master' )
@section( 'shopping_cart' )
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-10 col-md-offset-1">
<!--
Development features

			<div class="mt-3">
				<h5 class="">Kiểm tra đơn hàng bạn đã đặt thông qua mã đơn hàng.</h5>
				<form class="form-inline" method="post" action="cart-check">
					{{ csrf_field() }}
				  <div class="form-group mx-sm-3 mb-2">
					<input type="text" name="key" class="form-control" width="200px" placeholder="Nhập mã đơn hàng">
				  </div>
				  <button type="submit" class="btn btn-info">Kiểm tra</button>
				</form>
			</div>
-->
			@if(count($cart))
			<div class="mt-3">
				<form method="post" action="remove-all">
					{{ csrf_field() }}
					<button class="btn btn-danger float-right">Xóa tất cả</button>
				</form>
				
			</div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Sản phẩm</th>
						<th class="text-center">Số lượng</th>
						<th class="text-center">Đơn giá</th>
						<th class="text-center">Số tiền</th>
						<th> </th>
					</tr>
				</thead>
				<tbody>
					@foreach($cart as $item)
					<tr>
						<td class="col-sm-7">
							<div class="media">
								<a class="thumbnail pull-left" href="#"> 
									<img class="media-object" src="../../public/images/{{$item->options->image}}" style="width: 72px; height: 72px;"> </a>
								<div class="media-body">
									<h4 class="media-heading"><a href="master-{{$item->id}}">{{$item->name}}</a></h4>
									<span>Trạng thái: </span><span class="text-success"><strong>Còn hàng</strong></span>
								</div>
							</div>
						</td>
						<td class="col-sm-2" style="text-align: center">
							<div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="qty-cart?product_id={{$item->id}}&increment=1"> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href="qty-cart?product_id={{$item->id}}&decrease=1"> - </a>
                            </div>
<!--							<input type="number" class="form-control" id="exampleInputEmail1" value="{{$item->qty}}">-->
						</td>
						<td class="col-sm-1 col-md-1 text-center"><strong>{{number_format($item->price)}}đ</strong>
						</td>
						<td class="col-sm-1 col-md-1 text-center"><strong>{{number_format($item->subtotal)}}đ</strong>
						</td>
						<td class="col-sm-1 col-md-1">
							<form method="post" action="remove-cart-{{$item->id}}">
								{{ csrf_field() }}
								<button type="submit" class="btn btn-danger">
									<span class="glyphicon glyphicon-remove"></span>
								</button>
							</form>
							
						</td>
					</tr>
					@endforeach
					<tr>
						<td>   </td>
						<td>   </td>
						<td>   </td>
						<td>
							<h5>Số tiền</h5>
						</td>
						<td class="text-right">
							<h5><strong>{{Cart::subtotal()}}đ</strong></h5>
						</td>
					</tr>
					<tr>
						<td>   </td>
						<td>   </td>
						<td>   </td>
						<td>
							<h5>Phí vận chuyển</h5>
						</td>
						<td class="text-right">
							<h5><strong>{{Cart::tax()}}</strong></h5>
						</td>
					</tr>
					<tr>
						<td>   </td>
						<td>   </td>
						<td>   </td>
						<td>
							<h3>Thanh toán</h3>
						</td>
						<td class="text-right">
							<h3><strong>{{Cart::total() }}đ</strong></h3>
							
						</td>
					</tr>
					<tr>
						<td>   </td>
						<td>   </td>
						<td>   </td>
						<td>
							<form method="get" action="master-home">
								<button type="submit" class="btn btn-default">
									<span class="glyphicon glyphicon-shopping-cart"></span> Tiếp tục mua hàng
								</button>
							</form>
						</td>
						<td>
							<form method="post" action="checkout">
								{{ csrf_field() }}
								<button type="submit" class="btn btn-success">
								Thanh toán <span class="glyphicon glyphicon-play"></span>
								</button>
							</form>
							
						</td>
					</tr>
                   
				</tbody>
			</table>
		 	@else
				<div class="text-center">
					<p>Bạn không có sản phẩm vào trong giỏ hàng</p>
				</div>
			@endif
			<div style="margin-bottom: 150px"></div>
		</div>
	</div>
</div>
@stop