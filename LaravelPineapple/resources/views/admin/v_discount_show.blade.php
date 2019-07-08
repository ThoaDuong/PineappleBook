@extends( 'admin.v_dashboard_discount' )
@section( 'discount_show' )
<div class="card-body">
	<div class="table-responsive">
		<form method="post" action="discount-control">
			{{ csrf_field() }}
			<button type="submit" name="submit-all" class="btn">All Discount</button>
			<div class="row">
				<div class="col-sm-4">
				  <input type="text" name="search-key" class="form-control" placeholder="Search key or name">
				</div>
				<div class="col-sm-4">
				  <button type="submit" name="submit-search" class="btn">Search</button>
				</div>
				<div class="col-sm-4">
				  <button type="submit" name="submit-add" class="btn float-right">Add New Discount</button>
				</div>
			  </div>
		</form>
		<table class="table table-hover">
			<tr class="text-center">
				<th scope="col">Discount's ID</th>
				<th scope="col">Discount's Name</th>
				<th scope="col">Start Day</th>
				<th scope="col">End Day</th>
				<th scope="col">Number</th>
			</tr>
			<tbody>
				@foreach($arrDiscount as $discount)
				<tr>
					<td>{{$discount->discount_id}} </td>
					<td>{{$discount->discount_name}} </td>
					<td>{{$discount->date_start}} </td>
					<td>{{$discount->date_end}} </td>
					<td>{{$discount->number}} </td>
					
					<!--							Icon delete and edit product-->
					<form method="post" action="discount-delete-{{$discount->discount_id}}">
						{{ csrf_field() }}
						<td class="text-center">
							<button type="submit" class="btn"><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
						</td>
					</form>
					<form method="post" action="discount-update-{{$discount->discount_id}}">
						{{ csrf_field() }}
						<td class="text-center">
							<button type="submit" class="btn"><i class="fas fa-edit" aria-hidden="true"></i></button>
						</td>
					</form>

				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop