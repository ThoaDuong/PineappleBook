
@extends( 'admin.v_dashboard_discount' )
@section( 'discount_add' )
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<form method="post" action="discount-add">
					{{ csrf_field() }}
					<div class="modal-body">
						<div class="form-row">
							<div class="form-group col-md-3">
								<label class="font-weight-bold">Discount's ID</label>
								<input type="text" class="form-control" name="discount_id">
							</div>
							<div class="form-group col-md-9">
								<label class="font-weight-bold">Discount's Name</label>
								<input type="text" class="form-control" name="discount_name">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="font-weight-bold">Start Day</label>
								<input  type="date" class="form-control" name="date_start">
							</div>
							<div class="form-group col-md-6">
								<label class="font-weight-bold">End Day</label>
								<input type="date" class="form-control" name="date_end">
							</div>
						</div>
						<div class="form-group">
							<label class="font-weight-bold">Number</label>
							<input type="text" class="form-control" name="number">
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