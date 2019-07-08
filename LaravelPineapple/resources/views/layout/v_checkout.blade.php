@extends('layout.v_master')
@section('checkout_cart')

	<div style="margin-bottom: 10px" class="container">
		<div class="row justify-content-center">
			<div class="col-sm-6">
				<h4>Thông tin sản phẩm</h4>
				<div class="row">
					<div class="col-sm-12">
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
									<td class="col-sm-5">
										<div class="media">
											<a class="thumbnail pull-left" href="#"> 
												<img class="media-object" src="../../public/images/{{$item->options->image}}" style="width: 40px; height: 55px;"> </a>
											<div class="media-body">
												<h5 class="media-heading"><a href="master-{{$item->id}}">{{$item->name}}</a></h5>
											</div>
										</div>
									</td>
									<td class="col-sm-2" style="text-align: center">
										<div class="cart_quantity_button">{{$item->qty}}</div>
									</td>
									<td class="col-sm-3 text-center"><strong>{{$item->price}}đ</strong>
									</td>
									<td class="col-sm-2 text-center"><strong>{{$item->subtotal}}đ</strong>
									</td>
								</tr>
								@endforeach
								<tr>
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
									<td>
										<h5>Thuế suất</h5>
									</td>
									<td class="text-right">
										<h5><strong>{{Cart::tax()}}đ</strong></h5>
									</td>
								</tr>
								<tr>
									<td>   </td>
									<td>   </td>
									<td>
										<h4>Thanh toán</h4>
									</td>
									<td class="text-right">
										<h4><strong>{{Cart::total()}}đ</strong></h4>

									</td>
								</tr>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
			<div class="col-sm-6">
				<h4>Thông tin khách hàng</h4>
				<form method="post" action="">
					{{ csrf_field() }}
					<div class="modal-body">
						<div class="form-group">
							<label>Họ tên</label>
							<input type="text" class="form-control" name="customer_name">
						</div>
						<div class="form-group">
							<label>Số điện thoại</label>
							<input type="text" class="form-control" name="customer_number" >
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="customer_email">
						</div>
						<div class="form-row">
							<div class="form-group col-md-7">
								<label >Địa chỉ</label>
								<input type="text" class="form-control" name="customer_address" placeholder="Địa chỉ nhận hàng">
							</div>
							<div class="form-group col-md-5">
								<label >Tỉnh</label>
								<div class="form-control">
									 <select name= "customer_province">
										<option value="An Giang">An Giang
										<option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu
										<option value="Bắc Giang">Bắc Giang
										<option value="Bắc Kạn">Bắc Kạn
										<option value="Bạc Liêu">Bạc Liêu
										<option value="Bắc Ninh">Bắc Ninh
										<option value="Bến Tre">Bến Tre
										<option value="Bình Định">Bình Định
										<option value="Bình Dương">Bình Dương
										<option value="Bình Phước">Bình Phước
										<option value="Bình Thuận">Bình Thuận
										<option value="Bình Thuận">Bình Thuận
										<option value="Cà Mau">Cà Mau
										<option value="Cao Bằng">Cao Bằng
										<option value="Đắk Lắk">Đắk Lắk
										<option value="Đắk Nông">Đắk Nông
										<option value="Điện Biên">Điện Biên
										<option value="Đồng Nai">Đồng Nai
										<option value="Đồng Tháp">Đồng Tháp
										<option value="Đồng Tháp">Đồng Tháp
										<option value="Gia Lai">Gia Lai
										<option value="Hà Giang">Hà Giang
										<option value="Hà Nam">Hà Nam
										<option value="Hà Tĩnh">Hà Tĩnh
										<option value="Hải Dương">Hải Dương
										<option value="Hậu Giang">Hậu Giang
										<option value="Hòa Bình">Hòa Bình
										<option value="Hưng Yên">Hưng Yên
										<option value="Khánh Hòa">Khánh Hòa
										<option value="Kiên Giang">Kiên Giang
										<option value="Kon Tum">Kon Tum
										<option value="Lai Châu">Lai Châu
										<option value="Lâm Đồng">Lâm Đồng
										<option value="Lạng Sơn">Lạng Sơn
										<option value="Lào Cai">Lào Cai
										<option value="Long An">Long An
										<option value="Nam Định">Nam Định
										<option value="Nghệ An">Nghệ An
										<option value="Ninh Bình">Ninh Bình
										<option value="Ninh Thuận">Ninh Thuận
										<option value="Phú Thọ">Phú Thọ
										<option value="Quảng Bình">Quảng Bình
										<option value="Quảng Bình">Quảng Bình
										<option value="Quảng Ngãi">Quảng Ngãi
										<option value="Quảng Ninh">Quảng Ninh
										<option value="Quảng Trị">Quảng Trị
										<option value="Sóc Trăng">Sóc Trăng
										<option value="Sơn La">Sơn La
										<option value="Tây Ninh">Tây Ninh
										<option value="Thái Bình">Thái Bình
										<option value="Thái Nguyên">Thái Nguyên
										<option value="Thanh Hóa">Thanh Hóa
										<option value="Thừa Thiên Huế">Thừa Thiên Huế
										<option value="Tiền Giang">Tiền Giang
										<option value="Trà Vinh">Trà Vinh
										<option value="Tuyên Quang">Tuyên Quang
										<option value="Vĩnh Long">Vĩnh Long
										<option value="Vĩnh Phúc">Vĩnh Phúc
										<option value="Yên Bái">Yên Bái
										<option value="Phú Yên">Phú Yên
										<option value="Tp.Cần Thơ">Tp.Cần Thơ
										<option value="Tp.Đà Nẵng">Tp.Đà Nẵng
										<option value="Tp.Hải Phòng">Tp.Hải Phòng
										<option value="Tp.Hà Nội">Tp.Hà Nội
										<option value="Tp. Hồ Chí Minh">Tp. Hồ Chí Minh
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-form-label">Lời nhắn</label>
							<textarea placeholder="Lưu ý cho cửa hàng" class="form-control" rows="3" name="customer_message"></textarea>
						</div>
						<div class="modal-footer">
							<button type="submit" name="submit-cancel" class="btn btn-danger">Hủy</button>
							<button type="submit" name="submit-confirm" class="btn btn-success">Đặt hàng</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop