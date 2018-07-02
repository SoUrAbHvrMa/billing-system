<?php
$dt=date("Y-m-d");
$bill_id=$_REQUEST['bill_id'];
$cid=$_REQUEST['cid'];
$day=$_REQUEST['date'];
$cloth_type=$_REQUEST['cloth_type'];
$qty=$_REQUEST['qty'];
$price=$_REQUEST['price'];
$hd=$_REQUEST['hd'];
$treat=$_REQUEST['treat'];
$urgent=$_REQUEST['urgent'];
$total=$_REQUEST['total'];

$l1=$_REQUEST['l1'];
$l2=$_REQUEST['l2'];
$l3=$_REQUEST['l3'];
$l4=$_REQUEST['l4'];
$l5=$_REQUEST['l5'];
$l6=$_REQUEST['l6'];
$l7=$_REQUEST['l7'];
$l8=$_REQUEST['l8'];
$remark=$_REQUEST['remark'];

$con=mysqli_connect("localhost","root","","tlr");



$row=mysqli_fetch_array(mysqli_query($con,"select * from job ORDER BY id DESC LIMIT 1"));
$iidd=$row[0];
$iidd +=1;

$row2=mysqli_fetch_array(mysqli_query($con,"select * from cloth_table where cloth_name='$cloth_type' LIMIT 1"));

if(mysqli_query($con,"insert into job values('','$bill_id','$cid','$dt','$day','$cloth_type','$qty','$price','$total','0','1','$hd','$treat','$urgent','0','0','0','0','0','0')") && mysqli_query($con,"insert into mesurement values('','$iidd','$cid','$l1','$l2','$l3','$l4','$l5','$l6','$l7','$l8','$remark','$row2[2]')"))
{
	echo"<script>alert('done1');</script>";
	echo"<script>window.location='gamerate_bill.php?bill_id=$bill_id'</script>";
	
}
else
{
	echo"<script>alert('try again');</script>";
	echo"<script>window.location='add_odr.php?id=$cid'</script>";
}
?>

