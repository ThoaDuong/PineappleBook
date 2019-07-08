<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<link rel="apple-touch-icon" sizes="76x76" href="../../public/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="/../../publicassets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title>
		Pineapple | Dashboard
	</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<link href="../../public/assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet"/>
	<link href="../../public/assets/demo/demo.css" rel="stylesheet"/>
</head>

<body class="">
	<div class="wrapper ">
		<div class="sidebar" data-color="purple" data-background-color="white" data-image="../../public/assets/img/sidebar-1.jpg">
			<div class="logo">
				<a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Pineapple
        </a>
			
			</div>
			<div class="sidebar-wrapper">
				<ul class="nav">
					<li class="nav-item active ">
						<form method="post" action="order-view">
							{{ csrf_field() }}
							<a class="nav-link active" href="#">
							  	<button style="width: 100%" class="btn nav-link" type="submit">Order</button>
							</a>
						</form>
					</li>
					<li class="nav-item ">
						<form method="post" action="product-view">
							{{ csrf_field() }}
							<a class="nav-link active" href="#">
							  	<button style="width: 100%" class="btn nav-link" type="submit">Product</button>
							</a>
						</form>
					</li>
					<li class="nav-item ">
						<form method="post" action="type-view">
							{{ csrf_field() }}
							<a class="nav-link" href="#">
							  <button style="width: 100%" class="btn nav-link" type="submit">Type</button>
							</a>
						</form>
					</li>
					<li class="nav-item ">
						<form method="post" action="discount-view">
							{{ csrf_field() }}
							<a class="nav-link" href="#">
							  <button style="width: 100%" class="btn nav-link" type="submit">Discount</button>
							</a>
						</form>
					</li>
					<li class="nav-item active-pro ">
						<a class="nav-link" href="./upgrade.html">
						  <i class="material-icons">logout</i>
						  <p>Logout</p>
						</a>
					
					</li>
				</ul>
			</div>
		</div>
		<div class="main-panel">

			@yield('dashboard_order')
			@yield('dashboard_product')
			@yield('dashboard_discount')
			@yield('dashboard_type')

			<footer class="footer">
				<div class="container-fluid">
					<div class="copyright float-right">
						&copy;
						<script>
							document.write( new Date().getFullYear() )
						</script>, bản quyền thuộc về Pineapple
					</div>
				</div>
			</footer>
		</div>
	</div>
	<script src="../../public/assets/js/core/jquery.min.js"></script>
	<script src="../../public/assets/js/core/popper.min.js"></script>
	<script src="../../public/assets/js/core/bootstrap-material-design.min.js"></script>
	<script src="../../public/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
	<script src="../../public/assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
	<script src="../../public/assets/demo/demo.js"></script>
	<script>
		$( document ).ready( function () {
			$().ready( function () {
				$sidebar = $( '.sidebar' );

				$sidebar_img_container = $sidebar.find( '.sidebar-background' );

				$full_page = $( '.full-page' );

				$sidebar_responsive = $( 'body > .navbar-collapse' );

				window_width = $( window ).width();

				fixed_plugin_open = $( '.sidebar .sidebar-wrapper .nav li.active a p' ).html();

				$( '.switch-sidebar-image input' ).change( function () {
					$full_page_background = $( '.full-page-background' );

					$input = $( this );

					if ( $input.is( ':checked' ) ) {
						if ( $sidebar_img_container.length != 0 ) {
							$sidebar_img_container.fadeIn( 'fast' );
							$sidebar.attr( 'data-image', '#' );
						}

						if ( $full_page_background.length != 0 ) {
							$full_page_background.fadeIn( 'fast' );
							$full_page.attr( 'data-image', '#' );
						}

						background_image = true;
					} else {
						if ( $sidebar_img_container.length != 0 ) {
							$sidebar.removeAttr( 'data-image' );
							$sidebar_img_container.fadeOut( 'fast' );
						}

						if ( $full_page_background.length != 0 ) {
							$full_page.removeAttr( 'data-image', '#' );
							$full_page_background.fadeOut( 'fast' );
						}

						background_image = false;
					}
				} );

				$( '.switch-sidebar-mini input' ).change( function () {
					$body = $( 'body' );

					$input = $( this );

					if ( md.misc.sidebar_mini_active == true ) {
						$( 'body' ).removeClass( 'sidebar-mini' );
						md.misc.sidebar_mini_active = false;

						$( '.sidebar .sidebar-wrapper, .main-panel' ).perfectScrollbar();

					} else {

						$( '.sidebar .sidebar-wrapper, .main-panel' ).perfectScrollbar( 'destroy' );

						setTimeout( function () {
							$( 'body' ).addClass( 'sidebar-mini' );

							md.misc.sidebar_mini_active = true;
						}, 300 );
					}


					var simulateWindowResize = setInterval( function () {
						window.dispatchEvent( new Event( 'resize' ) );
					}, 180 );


					setTimeout( function () {
						clearInterval( simulateWindowResize );
					}, 1000 );

				} );
			} );
		} );
	</script>
</body>

</html>