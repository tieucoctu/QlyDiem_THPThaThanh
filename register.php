<?php
session_start();
ob_start();

if((!empty($_SESSION['username']) && !empty($_SESSION['password'])) || (!empty($_COOKIE['username']) && !empty($_COOKIE['token']))) {
	header('Location: /');
}

$title = 'Đăng nhập';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>VNEDU - Hệ thống quản lý điểm trường THPT Hà Thành</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="vuiz.net">
	<meta property="og:title" content="VNEDU - Hệ thống quản lý điểm trường THPT Lê Quý Đôn" />
	<meta property="og:image" content="assets/images/logo-truong.png" />
	<meta property="og:site_name" content="VNEDU" />
	<meta property="og:description" content="VNEDU - Hệ thống quản lý điểm trường THPT Lê Quý Đôn" />
	<meta property="og:url" content="https://vnedu.vuiz.net" />
	<!-- Favicon -->
	<link href="assets/images/favicon.png" rel="icon" type="image/png">
	<link href="assets/images/favicon.png" rel="shortcut icon" type="image/png">


	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Theme style -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css" integrity="sha512-mxrUXSjrxl8vm5GwafxcqTrEwO1/oBNU25l20GODsysHReZo4uhVISzAKzaABH6/tTfAxZrY2FprmeAP5UZY8A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css" integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


	<!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<!-- /.login-logo -->
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="/" class="h1"><i class=""></i> <b>Hà Thành</b></a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Đăng ký tài khoản mới</em></p>

				<form action="#" method="post" id="RegisterForm">
					<div class="input-group mb-3">
						<input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" required />
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" id="repassword" name="repassword" placeholder="Nhập lại mật khẩu" required />
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" id="agreeTerms" name="agreeTerms" name="terms" value="agree" required />
								<label for="agreeTerms">
									Đồng ý với <a href="#">điều khoản</a>
								</label>
							</div>
						</div>
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" id="Submit" class="btn btn-primary btn-block">Đăng ký</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<p class="mt-1 mb-1">
					<a href="/login.php">Tôi đã có tài khoản?</a>
				</p>
			</div>
		</div>
		<!-- /.card -->
	</div>
	<!-- /.login-box -->
	<!-- jQuery UI 1.11.4 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- AdminLTE App -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js" integrity="sha512-AJUWwfMxFuQLv1iPZOTZX0N/jTCIrLxyZjTRKQostNU71MzZTEPHjajSK20Kj1TwJELpP7gl+ShXw5brpnKwEg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- Bootstrap 4 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script>
		$(document).ready(function (){
			$("#RegisterForm").submit(function (event) {
				event.preventDefault();
				$("#Submit").attr("disabled", true).html('<i class="fas fa-spinner fa-spin"></i> Đăng Ký');
				var form = $(this);
				var Data = form.serialize();
				$.ajax({
					url: '/ajax/login/regis.php',
					type: 'POST',
					data: Data,
					success: function (result) {
						if (result.success) {
							$(document).Toasts('create', {
								class: 'bg-success',
								title: 'Thành công!',
								body: result.success
							});
							setTimeout(function(){
							    window.location.href = result.returnURL;
							}, 2000);

						}
						else {
							$.each(result.error, function(id,errorMessage) {
								$(document).Toasts('create', {
									class: 'bg-danger',
									title: 'Có lỗi xảy ra!',
									body: errorMessage
								});
							});
							$("#Submit").attr("disabled", false).html('Đăng Ký');
						}
					},
					error: function (xhr, status, error) {
						alert(error);
						$("#Submit").attr("disabled", false).html('Đăng Ký');
					}
				});
				return false;
			});
		});
	</script>
</body>
</html>
