
@extends( 'admin.v_dashboard_type' )
@section( 'type_edit' )
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				@foreach($arrType as $type)
				<form method="post" action="type-edit-{{$type->type_id}}">
					{{ csrf_field() }}
					<div class="modal-body">
						
						<div class="form-group">
							<label class="font-weight-bold">Type's ID</label>
							<input type="text" class="form-control" name="type_id" value="{{$type->type_id}}">
						</div>
						<div class="form-group">
							<label class="font-weight-bold">Type's Name</label>
							<input type="text" class="form-control" name="type_name" value="{{$type->type_name}}">
						</div>
						
					</div>
					<div class="modal-footer">
							<button type="submit" name="submit-cancel" class="btn btn-danger">Cancel</button>
							<button type="submit" name="submit-save" class="btn btn-success">Save</button>
						</div>
			</div>
			</form>
			@endforeach
		</div>
	</div>

	</div>
@stop