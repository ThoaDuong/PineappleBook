<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Pineapple's home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Frijole' rel='stylesheet'>

	<link href="../../public/css/all.css" type="text/css" rel="stylesheet">
	<link href="../../public/css/product.css" type="text/css" rel="stylesheet">
	<link href="../../public/css/main.css" type="text/css" rel="stylesheet">
</head>

<body>
	<!--	Header-->
	<header class="clearfix">
		<div class="first-menu">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<ul class="clearfix">
							<li><a href="#">Liên hệ</a>
							</li>
							<li><a href="#">Khuyến mãi</a>
							</li>
							<li><a href="#">Trạm sách</a>
							</li>
						</ul>

					</div>
				</div>
			</div>
		</div>
		<!--		End first menu-->
		<div class="second-menu">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<a href="master-home">
							<img width="auto" height="50px" src="../images/Pineapple-2.jpg" alt="logo">
						</a>
						<form id="form-search" class="form-check-inline clearfix" method="get" action="search">
							<input type="text" id="txt-search" placeholder="Nhập từ khóa để tìm kiếm" name="key">
							<button type="submit" name="submit-search" id="btn-search" class="btn btn-info">Tìm kiếm</button>
						</form>
						<nav class="clearfix right-menu">
							<ul>
								<li>
									<a href="shopping-cart"><button class="btn btn-info">
									Giỏ hàng
									</button></a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!--		End second menu-->
		<div class="third-menu">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<nav id="nav-category">
							<ul class="clearfix">
								@foreach($arrType as $t)
								<li><a href="master-{{$t->type_id}}">{{$t->type_name}}</a></li>
								@endforeach						
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!--		End third menu-->
	</header>
	<!--	End header-->



	<!--	Body--> 
	
<!--	Modal login-->
	<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Đăng nhập</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form method="post" action="login">
			  <div class="card-body">
				@csrf
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-user"></i></span>
					</div>
					<input type="text" name="username" class="form-control" placeholder="Tên đăng nhập">

				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
					</div>
					<input type="password" name="password" class="form-control" placeholder="Mật khẩu">
				</div>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
						Bạn đã có tài khoản chưa? <a href="#" class="ml-2">Đăng ký</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Quên mật khẩu?</a>
					</div>
			</div>
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-success">Login</button>
		  </div>
			</form>
		</div>
	  </div>
	</div>
<!--	End modal login-->
	
<!--	Modal register-->
	<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Register</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form>
			  <div class="form-group">
				<label class="col-form-label">Full name:</label>
				<input type="text" class="form-control" id="name">
			  </div>
			  <div class="form-group">
				<label class="col-form-label">Birthday:</label>
				<input type="text" class="form-control" id="birthday">
			  </div>
				<div class="form-check">
				  <label class="form-check-label" for="radio1">
					<input type="radio" class="form-check-input" id="male" name="sex" value="1" checked>Male
				  </label>
				</div>
				<div class="form-check">
				  <label class="form-check-label" for="radio2">
					<input type="radio" class="form-check-input" id="female" name="sex" value="0">Female
				  </label>
				</div>
			</form>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-success">Save changes</button>
		  </div>
		</div>
	  </div>
	</div>
<!--	End modal register-->
	
	
	@yield('body_detail')
	@yield('body_detail_none_discount')
	@yield('body_home')
	@yield('body_category')
	@yield('body_category_none_discount')
	@yield('search_none_discount')
	@yield('search')
	@yield('shopping_cart')
	@yield('checkout_cart')
	@yield('check_code')
	@yield('alart_success')

	<!--	End body-->

	
	<!--	Footer-->
	<div id="footer" class="clearfix">
		<div class="footer-list">
			<ul>
				<li><a href="#">Chính sách bảo mật</a>
				</li>
				<li><a href="#">Quy chế hoạt động</a>
				</li>
				<li><a href="#">Chính sách vận chuyển</a>
				</li>
				<li><a href="#">Chính sách trả hàng và hoàn tiền</a>
				</li>
			</ul>
		</div>
		<p class="div-footer-detail">Công ty TNHH Pineapple</p>
		<div class="div-footer-detail">
			Địa chỉ: 1268 Đường Kha Vạn Cân, Phường Linh Trung, Quận Thủ Đức, TP Hồ Chí Minh. <br> Tổng đài hỗ trợ: 19001221 - Email: support@pineapple.vn <br> Mã số thuế: 0000000 - Đại diện pháp luật: Dương Thị Kim Thoa <br> © 2019 - Bản quyền thuộc về Công ty TNHH Pineapple

		</div>
	</div>
	<!--	End footer-->
</body>

</html>