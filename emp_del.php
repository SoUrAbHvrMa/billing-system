<?php
$r1=$_REQUEST['a'];
$con=mysqli_connect("localhost","root","","tlr");
if(mysqli_query($con,"delete from employee_table where emp_id='$r1'"))
{
	echo"<script>alert('Data Deleted');</script>";
}
else
{
	echo"<script>alert('Try Again ');</script>";
}
?>