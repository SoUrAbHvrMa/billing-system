<?php
include("include\menu.php");

?>

<style>
		body
		{
			font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial," sans-serif";
			
		}
</style>

<div class="container">
		<ul>
			
		</ul>
		<form >
		<table class='table table-responsive'>
			<tr><th>customer_name</th><th>mobile number</th><th>alternate number</th><th>address</th><th></th></tr>
			<?php
				$con=mysqli_connect('localhost','root','','tlr');
				$q1=mysqli_query($con, "select * from customer_table");
				
					while($row=mysqli_fetch_array($q1))
					{
						echo "<tr><td><input type='text' value='$row[1]' name='name'></input></td>
						<td><input type='text' value='$row[2]' name='mobile1'></input></td>
						<td><input type='text' value='$row[3]' name='mobile2'></input></td>
						<td><input type='text' value='$row[4]' name='address'></input></td>
						<td><button type='submit' name='update'>edit Record</button></td>
						<td><input type='hidden' value='$row[0]' name='id'></input></td></tr>";
					}
			?>
			</table>
		</form >
	</div>
	
	
	<?php
if(isset($_REQUEST['update']))
{
  
	$id=$_REQUEST['id'];
	$name=$_REQUEST['name'];
	$mobile1=$_REQUEST['mobile1'];
	$mobile2=$_REQUEST['mobile2'];
	$address=$_REQUEST['address'];
	echo "$id $name $mobile1 $mobile2 $address";
	$con=mysqli_connect('localhost','root','','tlr');
	$q="UPDATE customer_table SET name = '$name' , mobile1 = '$mobile1' , mobile2 = '$mobile2' , address = '$address' WHERE cust_id = '$id'";
	if($name==null || $mobile1==null )
	{
		echo"<script>alert('Empty Data');</script>";
	}
	else
	{
		if(mysqli_query($con,$q))
		{
			echo"<script>alert('Data Saved');</script>";
			echo"<script>window.location='home.php'</script>";
		}
		else
		{
			echo"<script>alert('Try Again');</script>";
		}
	}
}
?>