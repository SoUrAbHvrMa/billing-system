<?php
include("include\menu.php");
$date=date('Y-m-d');
?>
<style>
		body
		{
			font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial," sans-serif";
			
		}
</style>

<div class="container">
			<?php
		        $con=mysqli_connect('localhost','root','','tlr');
				$q1=mysqli_query($con, "select * from job where pending ='1' and delivery_type='1'");
				$q2=mysqli_query($con, "select * from job where pending ='1' and delivery_type='0'");
				
			echo "<h3>Home Delivery</h3>
			
			<form> <table class='table table-responsive'>   <tr><th>id</th><th>bill no</th><th>delivery date</th><th>cloth type</th><th>quantity</th><th>treatment</th><th>urgent</th><th></th></tr>";	
				while($row=mysqli_fetch_array($q1))
				{	
				   if($row[4]<=$date)
				   {
				   	if($row[9]=='3')
					{
					echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[12]</td><td>$row[13]</td><td><button type='submit' name='deliver' value='$row[0]' class='btn btn-info'>Ready to deliver</button></td></tr>";
					}
					else
					{
					echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[12]</td><td>$row[13]</td><td><button class='btn btn-danger'>Not Ready Yet</button></td></tr>";
					}
				   }	
				}
			echo "</table>";
			//for counter delivery
			echo "<br><h3>Counter Delivery</h3> 
			
			<form> <table class='table table-responsive'>   <tr><th>id</th><th>bill no</th><th>delivery date</th><th>cloth type</th><th>quantity</th><th>treatment</th><th>urgent</th><th></th></tr>";
				while($row=mysqli_fetch_array($q2))
				{
				  
				   	if($row[9]=='3')
					{
					echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[12]</td><td>$row[13]</td><td><button type='submit' name='deliver' value='$row[0]'  class='btn btn-info'>Ready to deliver</button></td></tr>";
					}
					else
					{
					echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[12]</td><td>$row[13]</td><td><button class='btn btn-danger'>Not Ready Yet</button></td></tr>";
					}
				   
				}
			echo "</table></form>";
			
			
			?>
			
</div>

<?php
if(isset($_REQUEST['deliver']))
{

    $id=$_REQUEST['deliver'];
    
	$con=mysqli_connect('localhost','root','','tlr');
	$q="UPDATE job SET pending='0' where id='$id'";
	
		if(mysqli_query($con,$q))
		{
			echo"<script>alert('$id is delivered');</script>";
			echo"<script>window.location='delivery.php'</script>";
		}
		else
		{
			echo"<script>alert('Try Again');</script>";
		}
	
}
?>