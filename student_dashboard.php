<?php

	session_start();
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"sms");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Dashboard Dashboard</title>
	<link rel="icon" type="image" href="assets/image/icon.jpg">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
	<script type="text/javascript"src="assets/js/jquery_latest.js"></script>
	<script type="text/javascript"src="assets/js/bootstrap.min.js"></script>
</head>
<body>

<div id="header">
	<center>
		<strong>Student Management System</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<strong>Welcome:<b style="color: red;"> <?php echo $_SESSION['name']; ?></b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="logout.php"class="btn btn-danger">Logout</a>
	</center>
</div>
<span id="top_span">
	<marquee>
		<b style="color: red;font-weight: bold;font-size: 30px;">Student Management System</b>
	</marquee>
</span>
<div id="left_side">
	<form action=""method="post">
		<div class="form-group">
			<a href="student_dashboard.php"class="form-control btn btn-primary">Home</a>
		</div>
		<div class="form-group">
			<input type="submit" name="show_detail"value="Show Details"class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" name="edit_detail"value="Edit Details"class="form-control">
		</div>
	</form>
</div>
<div id="right_side">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div id="demo">

				<!-- This is a show details function -->
				<?php
					if (isset($_POST['show_detail'])) 
					{
						$query="select * from student where email='$_SESSION[email]'";
						$query_run=mysqli_query($connection,$query);
						while($row=mysqli_fetch_assoc($query_run))
						{
							?>
							<table>
								<tr>
									<td><b>Roll Number</b></td>
									<td>
										<input type="text"value="<?php echo $row['roll_no'] ?>"disabled="">
									</td>
								</tr>
								<tr>
									<td><b>Student Name</b></td>
									<td>
										<input type="text"value="<?php echo $row['name'] ?>"disabled="">
									</td>
								</tr>
								<tr>
									<td><b>Father Name</b></td>
									<td>
										<input type="text"value="<?php echo $row['father_name'] ?>"disabled="">
									</td>
								</tr>
								<tr>
									<td><b>Class</b></td>
									<td>
										<input type="text"value="<?php echo $row['class'] ?>"disabled="">
									</td>
								</tr>
								<tr>
									<td><b>Mobile</b></td>
									<td>
										<input type="text"value="<?php echo $row['mobile'] ?>"disabled="">
									</td>
								</tr>
								<tr>
									<td><b>Email</b></td>
									<td>
										<input type="text"value="<?php echo $row['email'] ?>"disabled="">
									</td>
								</tr>
								<tr>
									<td><b>Password</b></td>
									<td>
										<input type="text"value="<?php echo $row['password'] ?>"disabled="">
									</td>
								</tr>
								<tr>
									<td><b>Remark</b></td>
									<td>
										<textarea rows="3"cols="40"disabled=""><?php echo $row['remark'] ?></textarea>
									</td>
								</tr>
							</table>
							<?php
						}
					}
				?>

				<!-- This is a edit details function -->
				<?php
					if (isset($_POST['edit_detail'])) 
					{
						$query="select * from student where email='$_SESSION[email]'";
						$query_run=mysqli_query($connection,$query);
						while($row=mysqli_fetch_assoc($query_run))
						{
							?>
							<form method="post"action="edit_student.php">
								<table>
									<tr>
										<td><b>Roll Number</b></td>
										<td>
											<input type="text"value="<?php echo $row['roll_no'] ?>"name="">
										</td>
									</tr>
									<tr>
										<td><b>Student Name</b></td>
										<td>
											<input type="text"value="<?php echo $row['name'] ?>"name="">
										</td>
									</tr>
									<tr>
										<td><b>Father Name</b></td>
										<td>
											<input type="text"value="<?php echo $row['father_name'] ?>"name="">
										</td>
									</tr>
									<tr>
										<td><b>Class</b></td>
										<td>
											<input type="text"value="<?php echo $row['class'] ?>"name="">
										</td>
									</tr>
									<tr>
										<td><b>Mobile</b></td>
										<td>
											<input type="text"value="<?php echo $row['mobile'] ?>"name="">
										</td>
									</tr>
									<tr>
										<td><b>Email</b></td>
										<td>
											<input type="text"value="<?php echo $row['email'] ?>"name="">
										</td>
									</tr>
									<tr>
										<td><b>Password</b></td>
										<td>
											<input type="text"value="<?php echo $row['password'] ?>"name="">
										</td>
									</tr>
									<tr>
										<td><b>Remark</b></td>
										<td>
											<textarea rows="3"cols="40"name=""><?php echo $row['remark'] ?></textarea>
										</td>
									</tr>
									<tr>
										<td></td>
										<td>
											<input type="submit" name="save"value="Update"class="btn btn-primary">
										</td>
									</tr>
								</table>
							</form>
							<?php
						}
					}
				?>

			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>

</body>
</html>