<?php
include("include\menu.php");
$billno=$_REQUEST["bill_id"];
?>
<style>
		body
		{
			font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial," sans-serif";
			
		}
</style>

<div class='container'>
<table class='table'>
<?php
$con=mysqli_connect("localhost","root","","tlr");
$t=mysqli_fetch_array($q1=mysqli_query($con,"select * from main_bill where bill_no='$billno'"));
echo"<tr><td>Bill no</td><td>$t[1]</td></tr>
<tr><td>customer_name</td><td>$t[2]</td></tr>
<tr><td>mobile no.</td><td>$t[3]</td></tr>
<tr><td>total</td><td>$t[4]</td></tr>
<tr><td>pending</td><td>$t[5]</td></tr>
<tr><td>paid</td><td>$t[6]</td></tr>
<tr><td>bill_date</td><td>$t[7]</td></tr>
";
?>
</table>
</div>


<div class='container'>
<div >
<table class="col-md-10 table table-responsive">

<?php


$q1=mysqli_query($con,"select * from job where bill_no='$billno'");
while($row=mysqli_fetch_array($q1))
{
	if($row[12]=='p')
	{
		$treat='Premium';
	}
	else 
	{
		$treat='Regular';
	}
	
	if($row[10]=='1')
	{
		$job_p="yes";	
	}
	else
	{
		$job_p="no";
	}
	
	if($row[13]=='u')
	{
		$urg="urgent";	
	}
	else
	{
		$urg="regular";
	}
	
	if($row[11]==1)
		{
			$hd='yes';
		}
		else{
			$hd='no';
		}
	$row1=mysqli_fetch_array(mysqli_query($con,"select * from mesurement where mid='$row[0]'"));
		if($row1[12]=='upper')
		{
		echo"
		<tr bgcolor='#fa9'><th>cust id</th><th>delivery date</th><th>cloth type</th><th>qty</th><th>price</th><th>total</th><th>job pending</th><th>home delivery</th></tr>
		<tr bgcolor='#ddd'><td>$row[2]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$job_p</td><td>$hd</td></tr>
		<tr><th>treatment</th><th>urgent</th><th>cutter</th><th>maker</th><th>cutter deadline</th><th>maker deadline</th><th>cutter done</th><th>maker done</th></tr>	
		<tr bgcolor='#aaa'><td>$treat</td>><td>$urg</td><td>$row[14]</td><td>$row[15]</td><td>$row[16]</td><td>$row[17]</td><td>$row[18]</td><td>$row[19]</td></tr>
		<tr><td>Length</td><td>$row1[3]</td>
		<td>Chest</td><td>$row1[4]</td>
		<td>Waist</td><td>$row1[5]</td>
		<td>Hip</td><td>$row1[6]</td></tr>
		<tr><td>Shoulder</td><td>$row1[7]</td>
		<td>Sleeve</td><td>$row1[8]</td>
		<td>cuff</td><td>$row1[9]</td>
		<td>Collar</td><td>$row1[10]</td></tr>
		<tr bgcolor='#aaa'><td>remarks: </td><td colspan='8'>$row1[11]</td></tr>
		";
		}
		else
		{
		echo"
		<tr bgcolor='#fa9'><th>cust id</th><th>delivery date</th><th>cloth type</th><th>qty</th><th>price</th><th>total</th><th>job pending</th><th>home delivery</th></tr>
		<tr bgcolor='#ddd'><td>$row[2]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$job_p</td><td>$hd</td></tr>
		<tr><th>treatment</th><th>urgent</th><th>cutter</th><th>maker</th><th>cutter deadline</th><th>maker deadline</th><th>cutter done</th><th>maker done</th></tr>	
		<tr bgcolor='#aaa'><td>$treat</td>><td>$urg</td><td>$row[14]</td><td>$row[15]</td><td>$row[16]</td><td>$row[17]</td><td>$row[18]</td><td>$row[19]</td></tr>
		<tr><td>Length</td><td>$row1[3]</td>
		<td>Waist</td><td>$row1[4]</td>
		<td>Hip</td><td>$row1[5]</td></tr>
		<tr><td>Bottom</td><td>$row1[6]</td>
		<td>Thigh</td><td>$row1[7]</td>
		<td>Circle</td><td>$row1[8]</td>
		<td></td>
		<td></td></tr>
		<tr bgcolor='#aaa'><td>remarks: </td><td colspan='8'>$row1[11]</td></tr>
		";
		}	
		
		if($row[9]>'0')
		{
			echo "<tr><td><button class='btn btn-info'>print measurement</button></td></tr>";
		}
		else
		{
			echo "<tr><td><button class='btn'>print measurement</button></td></tr>";
		}
	}
?>
</table>
</div>
</div>