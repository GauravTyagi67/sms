<!DOCTYPE html>
<html>
<head>
	<title>Student Login Page</title>
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
		<b class="style">Student Management System</b>
	</marquee>
</div>
<hr>

<div class="container mt-3">
	<div class="row">
		<div class="col-md-2 mr-4 mt-5">
			<img src="assets/image/icon.jpg">
		</div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12">
					<h1 class="h">Student Login Page</h1>
					<form method="post"action="">
						<div class="form-group">
							<label>Email</label>
							<input class="form-control" type="email" name="email"placeholder="Enter Your Email"rquired="">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input class="form-control" type="password" name="password"placeholder="Enter Your Password"rquired="">
						</div>
						<div class="form-group">
							<input class="form-control btn btn-primary" type="submit" name="submit">
						</div>
					</form>

					<?php
						session_start();
						if (isset($_POST['submit'])) 
						{
							$connection=mysqli_connect("localhost","root","");
							$db=mysqli_select_db($connection,"sms");
							//fetch database in data query validation
							$query="select * from student where email='$_POST[email]'";
							$query_run=mysqli_query($connection,$query);
							while($row=mysqli_fetch_assoc($query_run))
							{
								if ($row['email'] == $_POST['email']) 
								{
									if ($row['password'] == $_POST['password']) 
									{
										$_SESSION['name']=$row['name'];
										header("Location:student_dashboard.php");
									}
									else
									{
										echo "Wrong Password";
									}
								}
								else
								{
									echo "Wrong Email ID";
								}
							}
						}
					?>

				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
<hr>

</body>
</html>