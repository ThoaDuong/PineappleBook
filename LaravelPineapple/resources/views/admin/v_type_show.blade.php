@extends( 'admin.v_dashboard_type' )
@section( 'type_show' )
<div class="card-body">
	<div class="table-responsive">
		<form method="post" action="type-control">
			{{ csrf_field() }}
			<button type="submit" name="submit-all" class="btn">All Type</button>
			<div class="row">
				<div class="col-sm-4">
				  <input type="text" name="search-key" class="form-control" placeholder="Search key or name">
				</div>
				<div class="col-sm-4">
				  <button type="submit" name="submit-search" class="btn">Search</button>
				</div>
				<div class="col-sm-4">
				  <button type="submit" name="submit-add" class="btn float-right">Add New Type</button>
				</div>
			  </div>
		</form>
		<table class="table table-hover">
			<tr class="text-center">
				<th scope="col">Type's ID</th>
				<th scope="col">Type's Name</th>
			</tr>
			<tbody>
				@foreach($arrType as $type)
				<tr>
					<td>{{$type->type_id}} </td>
					<td>{{$type->type_name}} </td>
					
					<!--							Icon delete and edit product-->
					<form method="post" action="type-delete-{{$type->type_id}}">
						{{ csrf_field() }}
						<td class="text-center">
							<button type="submit" class="btn"><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
						</td>
					</form>
					<form method="post" action="type-update-{{$type->type_id}}">
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