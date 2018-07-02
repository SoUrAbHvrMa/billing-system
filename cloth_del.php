<?php
$r1=$_REQUEST['a'];
if(mysqli_query(mysqli_connect("localhost","root","","tlr"),"delete from cloth_table where id='$r1'"))
{
	echo"<script>alert('Done');</script>";
}
else{
	echo"<script>alert('error');</script>";
}
?>