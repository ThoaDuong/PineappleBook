@extends( 'admin.v_admin_dashboard' )
@section( 'dashboard_product' )
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-plain">
                <div style="margin-top: -10%" class="card-header card-header-primary" data-color="green">
                  <h4 class="card-title"> Product Management</h4>
                  <p class="card-category">You can add, edit, or delete products</p>
                </div>
				  @yield('product_show')
				  @yield('product_edit')
				  @yield('product_add')
              </div>
            </div>
          </div>
        </div>
      </div>
@stop