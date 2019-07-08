@extends( 'admin.v_admin_dashboard' )
@section( 'dashboard_order' )
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-plain">
                <div style="margin-top: -10%" class="card-header card-header-primary" data-color="green">
                  <h4 class="card-title"> Order Management</h4>
                  <p class="card-category">You can check and deliver orders</p>
                </div>
				  @yield('order_show')
              </div>
            </div>
          </div>
        </div>
      </div>
@stop