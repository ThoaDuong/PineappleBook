
@extends( 'admin.v_dashboard_product' )
@section( 'product_add' )
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<form method="post" action="product-add">
					{{ csrf_field() }}
					<div class="modal-body">
						<div class="form-row">
							<div class="form-group col-md-3">
								<label class="font-weight-bold">Book's ID</label>
								<input type="text" class="form-control" name="book_id">
							</div>
							<div class="form-group col-md-9">
								<label class="font-weight-bold">Book's Name</label>
								<input type="text" class="form-control" name="book_name">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="font-weight-bold">Price</label>
								<input type="text" class="form-control" name="price">
							</div>
							<div class="form-group col-md-6">
								<label class="font-weight-bold">Image</label>
								<input type="text" class="form-control" name="image">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="font-weight-bold">Type's ID</label>
								<input type="text" class="form-control" name="type_id">
							</div>
							<div class="form-group col-md-6">
								<label class="font-weight-bold">Discount's ID</label>
								<input type="text" class="form-control" name="discount_id">
							</div>
						</div>
						<div class="form-group">
							<label class="col-form-label font-weight-bold">Describe:</label>
							<textarea class="form-control" rows="14" name="describe"></textarea>
						</div>
						
					</div>
					<div class="modal-footer">
							<button type="submit" name="submit-cancel" class="btn btn-danger">Cancel</button>
							<button type="submit" name="submit-save" class="btn btn-success">Save</button>
						</div>
			</div>
			</form>
		</div>
	</div>

	</div>
@stop