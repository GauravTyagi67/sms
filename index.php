<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="icon" type="image" href="assets/image/icon.jpg">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
	<script type="text/javascript"src="assets/js/jquery_latest.js"></script>
	<script type="text/javascript"src="assets/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<marquee>
		<b style="color: red;font-weight: bold;font-size: 30px;">Student Management System</b>
	</marquee>
</div>

<div class="container mt-3">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h1 class="h">Login Control System</h1>
			<div class="row">
					<div class="col-md-6">
					<div class="card">
						<div class="card-header bg-primary text-white"><center><b>Student</b></center></div>
						<div class="card-body">
							<center><img src="assets/image/icon.jpg"></center>
							<br>
							<center>
								<form method="post"action="">
									<a href="student_login.php"class="btn btn-danger"target="_blank"><i class="bi bi-person-circle"></i> Student Login</a>
								</form>
							</center>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-header bg-primary text-white"><center><b>Admin</b></center></div>
						<div class="card-body">
							<center><img src="assets/image/icon.jpg"></center>
							<br>
							<center>
								<form method="post"action="">
									<a href="admin_login.php"class="btn btn-danger"target="_blank"><i class="bi bi-person-fill"></i> Admin Login</a>
								</form>
							</center>
						</div>
					</div>
				</div>
				<?php
						if (isset($_POST['admin_login'])) 
						{
							header("Location:admin_login.php");
						}
						if (isset($_POST['student_login'])) 
						{
							header("Location:student_login.php");
						}
					?>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>

</body>
</html>