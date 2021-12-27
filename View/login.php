<?php include('../Controllers/server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Book Shop">
	<meta name="author" content="">

	<!-- App title -->
	<title>Online Book Shop | Login</title>

	<!-- App css -->
	<link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="admin/assets/css/core.css" rel="stylesheet" type="text/css" />
	<link href="admin/assets/css/components.css" rel="stylesheet" type="text/css" />
	<link href="admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="admin/assets/css/pages.css" rel="stylesheet" type="text/css" />
	<link href="admin/assets/css/menu.css" rel="stylesheet" type="text/css" />
	<link href="admin/assets/css/responsive.css" rel="stylesheet" type="text/css" />

	<script src="admin/assets/js/modernizr.min.js"></script>

</head>

<body class="bg-transparent">
	<!-- HOME -->
	<section>
		<div class="container-alt">
			<div class="row">
				<div class="col-sm-12">

					<div class="wrapper-page">
					<p>
						<a href="./">← Back To Home Page</a>
					</p>
						<div class="m-t-40 account-pages">
							<div class="text-center account-logo-box">
								<h2 class="text-uppercase">
									<a href="index.php" class="text-success">
										<span>Login System</span>
									</a>
								</h2>
								<!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
							</div>
							<div class="account-content">
								<form class="form-horizontal" action="login.php" method="post">
									<?php include('../Controllers/errors.php'); ?>

									<div class="form-group ">
										<div class="col-xs-12">
											<input class="form-control" type="text" required="" name="username" placeholder="Username" autocomplete="off">
										</div>
									</div>

									<div class="form-group">
										<div class="col-xs-12">
											<input class="form-control" type="password" name="password" required="" placeholder="Password" autocomplete="off">
										</div>
									</div>


									<div class="form-group account-btn text-center m-t-10">
										<div class="col-xs-12">
											<button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit" name="login_user">Log In
											</button>
										</div>
									</div>

								</form>

								<div class="clearfix"></div>
							</div>
						</div>
						<!-- end card-box-->


					</div>
					<!-- end wrapper -->
					<p align="center">
						Not yet a member? <a href="signup.php">Sign up</a>
					</p>
				</div>
			</div>
		</div>

	</section>

	<!-- END HOME -->

	<script>
		var resizefunc = [];
	</script>

	<!-- jQuery  -->
	<script src="admin/assets/js/jquery.min.js"></script>
	<script src="admin/assets/js/bootstrap.min.js"></script>
	<script src="admin/assets/js/detect.js"></script>
	<script src="admin/assets/js/fastclick.js"></script>
	<script src="admin/assets/js/jquery.blockUI.js"></script>
	<script src="admin/assets/js/waves.js"></script>
	<script src="admin/assets/js/jquery.slimscroll.js"></script>
	<script src="admin/assets/js/jquery.scrollTo.min.js"></script>


</body>

</html>