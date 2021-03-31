<?php
	session_start();
	$connection=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($connection,"sms");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
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
			<a href="admin_dashboard.php"class="form-control btn btn-primary">Home</a>
		</div>
		<div class="form-group">
			<input type="submit" name="search_student"value="Search Student"class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" name="edit_student"value="Edit Student"class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" name="add_student"value="Add Student"class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" name="delete_student"value="Delete Student"class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" name="show_teacher"value="Show Teacher"class="form-control">
		</div>
	</form>
</div>
<div id="right_side">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div id="demo">

				<!-- This is a search student function -->
				<?php
					if (isset($_POST['search_student'])) 
					{
						?>
						<center>
							<form method="post"action="">
								<div class="form-group">
									<label>Enter Roll Number</label>
									<input type="text" name="roll_no"placeholder="Enter Your Roll Number"class="form-control">
								</div>
								<button type="submit"name="search_student_roll_no"class="btn btn-primary">Search</button>
							</form>
						</center>
						<?php
					}
					//This is a search student from database query
					if (isset($_POST['search_student_roll_no'])) 
					{
						$query="select * from student where roll_no='$_POST[roll_no]'";
						$query_run=mysqli_query($connection,$query);
						while($row=mysqli_fetch_assoc($query_run))
						{
							?>
							<table>
								<h2>Student Information</h2>
								<tr>
									<td><b>Roll Number&nbsp;</b></td>
									<td>
										<input type="text" value="<?php echo $row['roll_no']; ?>"disabled>
									</td>
								</tr>
								<tr>
									<td><b>Student Name&nbsp;</b></td>
									<td>
										<input type="text" value="<?php echo $row['name']; ?>"disabled>
									</td>
								</tr>
								<tr>
									<td><b>Father Name&nbsp;</b></td>
									<td>
										<input type="text" value="<?php echo $row['father_name']; ?>"disabled>
									</td>
								</tr>
								<tr>
									<td><b>Class&nbsp;</b></td>
									<td>
										<input type="text" value="<?php echo $row['class']; ?>"disabled>
									</td>
								</tr>
								<tr>
									<td><b>Mobile&nbsp;</b></td>
									<td>
										<input type="text" value="<?php echo $row['mobile']; ?>"disabled>
									</td>
								</tr>
								<tr>
									<td><b>Email&nbsp;</b></td>
									<td>
										<input type="text" value="<?php echo $row['email']; ?>"disabled>
									</td>
								</tr>
								<tr>
									<td><b>Password&nbsp;</b></td>
									<td>
										<input type="text" value="<?php echo $row['password']; ?>"disabled>
									</td>
								</tr>
								<tr>
									<td><b>Remark&nbsp;</b></td>
									<td>
										<textarea rows="3"cols="40"disabled><?php echo $row['remark']; ?></textarea>
									</td>
								</tr>
							</table>
							<?php
						}
					}
				?>

				<!-- This is a edit student function -->
				<?php
					if (isset($_POST['edit_student'])) 
					{
						?>
						<center>
							<form method="post"action="">
								<div class="form-group">
									<label>Enter Roll Number</label>
									<input type="text" name="roll_no"placeholder="Enter Your Roll Number"class="form-control">
								</div>
								<button type="submit"name="search_student_roll_no_edit"class="btn btn-primary">Search</button>
							</form>
						</center>
						<?php
					}
					//This is a search student from database query
					if (isset($_POST['search_student_roll_no_edit'])) 
					{
						$query="select * from student where roll_no='$_POST[roll_no]'";
						$query_run=mysqli_query($connection,$query);
						while($row=mysqli_fetch_assoc($query_run))
						{
							?>
							<form method="post"action="admin_edit_student.php">
								<table>
									<h2>Student Information</h2>
									<tr>
										<td><b>Roll Number&nbsp;</b></td>
										<td>
											<input type="text"name="roll_no" value="<?php echo $row['roll_no']; ?>">
										</td>
									</tr>
									<tr>
										<td><b>Student Name&nbsp;</b></td>
										<td>
											<input type="text"name="name" value="<?php echo $row['name']; ?>">
										</td>
									</tr>
									<tr>
										<td><b>Father Name&nbsp;</b></td>
										<td>
											<input type="text"name="father_name" value="<?php echo $row['father_name']; ?>">
										</td>
									</tr>
									<tr>
										<td><b>Class&nbsp;</b></td>
										<td>
											<input type="text"name="class" value="<?php echo $row['class']; ?>">
										</td>
									</tr>
									<tr>
										<td><b>Mobile&nbsp;</b></td>
										<td>
											<input type="text"name="mobile" value="<?php echo $row['mobile']; ?>">
										</td>
									</tr>
									<tr>
										<td><b>Email&nbsp;</b></td>
										<td>
											<input type="text"name="email" value="<?php echo $row['email']; ?>">
										</td>
									</tr>
									<tr>
										<td><b>Password&nbsp;</b></td>
										<td>
											<input type="text"name="password" value="<?php echo $row['password']; ?>">
										</td>
									</tr>
									<tr>
										<td><b>Remark&nbsp;</b></td>
										<td>
											<textarea rows="3"cols="40"name="remark"><?php echo $row['remark']; ?></textarea>
										</td>
									</tr><br>
									<tr>
										<td></td>
										<td><input type="submit" name="edit"value="Update"class="btn btn-primary"></td>
									</tr>
								</table>
							</form>
							<?php
						}
					}
				?>

				<!-- This is a add student function -->
				<?php
					if (isset($_POST['add_student'])) 
					{
						?>
						<center><h2>Fill up the forms</h2></center>
						<form action="add_student.php"method="post">
							<table>
								<tr>
									<td>Roll Number&nbsp;</td>
									<td>
										<input type="text" name="roll_no"required="">
									</td>
								</tr>
								<tr>
									<td>Student Name&nbsp;</td>
									<td>
										<input type="text" name="name"required="">
									</td>
								</tr>
								<tr>
									<td>Father Name&nbsp;</td>
									<td>
										<input type="text" name="father_name"required="">
									</td>
								</tr>
								<tr>
									<td>Class&nbsp;</td>
									<td>
										<input type="text" name="class"required="">
									</td>
								</tr>
								<tr>
									<td>Mobile&nbsp;</td>
									<td>
										<input type="text" name="mobile"required="">
									</td>
								</tr>
								<tr>
									<td>Email&nbsp;</td>
									<td>
										<input type="text" name="email"required="">
									</td>
								</tr>
								<tr>
									<td>Password&nbsp;</td>
									<td>
										<input type="password" name="password"required="">
									</td>
								</tr>
								<tr>
									<td>Remark&nbsp;</td>
									<td>
										<textarea rows="3"cols="40"name="remark"required=""></textarea>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<input type="submit" name="add"value="Add Student"class="btn btn-success">
									</td>
								</tr>
							</table>
						</form>
						<?php
					}
				?>

				<!-- This is a delete student function -->
				<?php
					if (isset($_POST['delete_student'])) 
					{
						?>
						<center>
							<h2>Delete Student Form</h2>
							<form method="post"action="delete_student.php">
								<div class="form-group">
									<label>Enter Roll Number</label>
									<input type="text" name="roll_no"placeholder="Enter Your Roll Number"class="form-control">
								</div>
								<button type="submit"name="search_student_roll_no_delete"class="btn btn-danger">Delete Student</button>
							</form>
						</center>
						<?php
					}
				?>

				<!-- This is a show teacher function -->
				<?php
					if (isset($_POST['show_teacher'])) 
					{
						?>
						<center>
							<h2>Show Teacher's Form</h2>
							<table class="tables">
								<tr>
									<td id="id"><b>Teacher ID</b></td>
									<td id="id"><b>Teacher Name</b></td>
									<td id="id"><b>Mobile Number</b></td>
									<td id="id"><b>Course Name</b></td>
									<td id="id"><b>View Details</b></td>
								</tr>
							</table>
						</center>
						<?php
							$connection=mysqli_connect("localhost","root","");
							$db=mysqli_select_db($connection,"sms");
							$query="select * from teacher";
							$query_run=mysqli_query($connection,$query);
							while($row=mysqli_fetch_assoc($query_run)) 
							{
								?>
								<center>
									<table class="tables">
										<tr>
											<td id="td"><?php echo $row['t_id']; ?></td>
											<td id="td"><?php echo $row['name']; ?></td>
											<td id="td"><?php echo $row['mobile']; ?></td>
											<td id="td"><?php echo $row['courses']; ?></td>
											<td id="td"><a href="#"class="btn btn-primary">View Details</a></td>
										</tr>
									</table>
								</center>
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