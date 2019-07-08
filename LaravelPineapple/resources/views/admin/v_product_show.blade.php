@extends( 'admin.v_dashboard_product' )
@section( 'product_show' )
<div class="card-body">
	<div class="table-responsive">
		<form method="post" action="product-control">
			{{ csrf_field() }}
			<button type="submit" name="submit-all" class="btn">All Product</button>
			<div class="row">
				<div class="col-sm-4">
				  <input type="text" name="search-key" class="form-control" placeholder="Search key or name">
				</div>
				<div class="col-sm-4">
				  <button type="submit" name="submit-search" class="btn">Search</button>
				</div>
				<div class="col-sm-4">
				  <button type="submit" name="submit-add" class="btn float-right">Add New Product</button>
				</div>
			  </div>
		</form>
		<table class="table table-hover">
			<tr class="text-center">
				<th scope="col">Book's ID</th>
				<th scope="col">Book's Name</th>
				<th scope="col">Price</th>
				<th scope="col">Image</th>
				<th scope="col">Describe</th>
				<th scope="col">Type's ID</th>
				<th scope="col">Discount's ID</th>
				<th scope="col">Delete</th>
				<th scope="col">Edit</th>
			</tr>
			<tbody>
				@foreach($arrProduct as $product)
				<tr>
					<td>{{$product->book_id}} </td>
					<td>{{$product->book_name}} </td>
					<td>{{$product->price}} </td>
					<td>{{$product->image}} </td>
					<td>
						<div style="overflow-y: scroll; height: 150px">
							{{$product->describe}}
						</div>
					</td>
					<td>{{$product->type_id}}</td>
					<td>{{$product->discount_id}}</td>
					<!--							Icon delete and edit product-->
					<form method="post" action="product-delete-{{$product->book_id}}">
						{{ csrf_field() }}
						<td class="text-center">
							<button type="submit" class="btn"><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
						</td>
					</form>
					<form method="post" action="product-update-{{$product->book_id}}">
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