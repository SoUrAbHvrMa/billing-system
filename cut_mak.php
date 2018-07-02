<?php
$cut=$_REQUEST['cut'];
$mak=$_REQUEST['mak'];
$cutdead=$_REQUEST['dead1'];
$makdead=$_REQUEST['dead2'];
$id=$_REQUEST['id'];
$con=mysqli_connect("localhost","root","","tlr");
$rs=mysqli_query($con,"UPDATE job SET assigned='1' , cutter='$cut' , maker='$mak' , cutter_dead='$cutdead' , maker_dead='$makdead' WHERE id='$id' ");
if($rs)
{
	echo"<script>alert('hogya');</script>";
	echo "<script>window.location='assign.php'</script>";
}
else
{
	echo"<script>alert('try again');</script>";
}


?>