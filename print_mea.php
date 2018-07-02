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
			<table class='table'>
			<tr><th>bill no</th><th>bill date</th><th>Customer name</th><th>mobile number</th><th>total</th><th>pending</th><th>paid</th></tr>
			<?php
				$con=mysqli_connect('localhost','root','','tlr');
				$q1=mysqli_query($con, "select * from main_bill ORDER BY id DESC");
					
					while($row=mysqli_fetch_array($q1))
					{
						echo "<tr><td>$row[1]</td><td>$row[7]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td><a href='det.php?bill_id=$row[1]'><button class='btn btn-info'>See Detailed</button></a></td></tr>";
					}
					
			?>
			</table>
</div>