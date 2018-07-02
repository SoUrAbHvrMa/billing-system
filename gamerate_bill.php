<?php
include('include\menu.php');
$billid=$_REQUEST['bill_id'];
$p=0;


?>

<html>
<form method="post">
<div class='container'>
<table class='table'>
	<tr><th>sno</th><th>Item</th><th>Qty</th><th>price</th><th>total</th></tr>
	<?php	
		$total=0;
		$con=mysqli_connect("localhost","root","","tlr");
		$que1=mysqli_query($con,"select * from job where bill_no=$billid");
		while($row=mysqli_fetch_array($que1))
		{
			$t=$row[2];
			$p=$p+1;
			$row1=mysqli_fetch_array(mysqli_query($con,"select * from job where cloth_type='$row[5]'"));
			echo"<tr><td>$p</td><td>$row1[1]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td></tr>
			";
			$total=$total+$row[8];
		}
	?>
	<tr><td>Paid</td><td><input name='amt_paid'></td><td></td><td><?php echo"<input name='total' value='$total' readonly>"?></td>
	<td><input type='submit' values='save and generate bill' class='btn btn-success' name='save'></td>
	</tr>
	</table>
</div>
</form>

<?php
if(isset($_REQUEST['save']))
{

$paid=$_REQUEST['amt_paid'];
$tr=$total-$paid;
$dt=date("Y-m-d");
$row2=mysqli_fetch_array(mysqli_query($con,"select * from customer_table where cust_id=$t"));
if(mysqli_query($con,"insert into main_bill values('','$billid','$row2[1]','$row2[2]','$total','$tr','$paid','$dt')"))
{
	echo"$row[2]<script>alert('done');</script>";
	echo"$row[2]<script>window.location='home.php';</script>";
}
else
{
	echo"$row[2]<script>alert('not Done');</script>";
}
}
?>
</html>