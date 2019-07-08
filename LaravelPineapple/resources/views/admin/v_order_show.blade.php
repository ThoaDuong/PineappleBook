@extends( 'admin.v_dashboard_order' )
@section( 'order_show' )
<div class="card-body">
	<div class="table-responsive">
		<form method="post" action="order-control">
			{{ csrf_field() }}
			<button type="submit" name="submit-all" class="btn">All Order</button>
			<div class="row">
				<div class="col-sm-4">
				  <input type="text" name="search-key" class="form-control" placeholder="Search status or order's id">
				</div>
				<div class="col-sm-4">
				  <button type="submit" name="submit-search" class="btn">Search</button>
				</div>
				<div class="col-sm-4">
				  <button type="submit" name="submit-delete" class="btn float-right">Report</button>
				</div>
			  </div>
		</form>
		<table class="table table-hover">
			<tr class="">
				<th scope="col">Status</th>
				<th scope="col">ID</th>
				<th scope="col">Name</th>
				<th scope="col">Number</th>
				<th scope="col">Address</th>
				<th scope="col">Provine</th>
				<th scope="col">Price</th>
				<th scope="col">Detail</th>
				<th scope="col">Delivery</th>
			</tr>
			<tbody>
				
				@foreach($order_customer as $item)
				<?php $sum = 0 ?>
				@foreach($order_product as $o)
					@if($o->order_id == $item->order_id)
					<?php $sum += ($o->order_price * $o->order_amount)?>
					@endif
				@endforeach
				<tr>
					<td>{{$item->order_status}}</td>
					<td>{{$item->order_id}} </td>
					<td>{{$item->customer_name}}</td>
					<td>{{$item->customer_number}}</td>
					<td>{{$item->customer_address}}</td>
					<td>{{$item->customer_province}}</td>
					<td>{{$sum}}</td>
					<td>
						<table width="auto" border="0">
						  <tbody>
							<tr>
							  <td>ID</td>
							  <td>Name</td>
							  <td>Amount</td>
							</tr>
							  @foreach($order_product as $o)
							  @if($o->order_id == $item->order_id)
							  <tr>
								  <td>{{$o->book_id}}</td>
								  <td>{{$o->book_name}}</td>
								  <td>{{$o->order_amount}} </td>
							  </tr>
							  @endif
							  @endforeach
						  </tbody>
						</table>
					</td>
					<td>
						<form method="post" action="order-delivery-{{$item->order_id}}">
							{{ csrf_field() }}
							<button style="width: 150px" type="submit" name="submit-delivering" class="btn float-right">Delivering</button>
							<button style="width: 150px" type="submit" name="submit-delivered" class="btn float-right">Delivered</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop