<?php
	$connection=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($connection,"sms");
	//This is a database in data save validetion query
	$query="insert into student values('',$_POST[roll_no],'$_POST[name]','$_POST[father_name]',$_POST[class],$_POST[mobile],'$_POST[email]','$_POST[password]','$_POST[remark]')";
	/*echo $query;*/
	$query_run=mysqli_query($connection,$query);
?>

<script type="text/javascript">
	alert("Your Added Student Successfully");
	window.location.href="admin_dashboard.php";
</script>