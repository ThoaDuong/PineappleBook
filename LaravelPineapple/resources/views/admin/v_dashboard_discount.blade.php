@extends( 'admin.v_admin_dashboard' )
@section( 'dashboard_discount' )
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-plain">
                <div style="margin-top: -10%" class="card-header card-header-primary" data-color="green">
                  <h4 class="card-title"> Discount Management</h4>
                  <p class="card-category">You can add, edit, or delete discounts</p>
                </div>
				  @yield('discount_show')
				  @yield('discount_edit')
				  @yield('discount_add')
              </div>
            </div>
          </div>
        </div>
      </div>
@stop