<?php
include("include\menu.php");


$date=date("ymd");
$t=mysqli_fetch_array(mysqli_query(mysqli_connect("localhost","root","","tlr"),"select * from job  ORDER BY id DESC LIMIT 1"));
$temp= $date*100;
if($temp>$t[1])
{
 $t[1]=$temp;
}
if($t[1]/100!=$date)
{
	$bill=($t[1])+1;
}

else{
	$bill=($date*100)+1;
}
echo"<ul style='font-size:20px'><b>Bill Id--></b>$bill</ul>";
?>

<html>
		<div class="col-md-7 ">
			
			<div>
			<table class="table1 table" style="width: 100%;">
			<h3>
				New order
			</h3>
				<tr><td>Mobile Number</td><td><input name="mobile" class="mob"></td></tr>
			</table>
			</div>
			<div>
			<form method="post">
				<table class="table table2"></table>
			</form>
			</div>
		</div>



		<style>
		body
		{
			font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial," sans-serif";
			
		}
	</style>
</html>

	<?php
$con=mysqli_connect("localhost","root","","tlr");

if(isset($_REQUEST['sub']))
{
	$r1=$_REQUEST['name'];
	$r2=$_REQUEST['mob1'];
	$r3=$_REQUEST['mob2'];
	$r4=$_REQUEST['address'];
	
	//if(mysqli_fetch_array(mysqli_query($con,"select * from ");))
	if($r1==null || $r2==null || $r4==null  ){
		echo"<script>alert('data not complete');</script>";
	}
	else
	{
	$query2="insert into customer_table values('','$r1','$r2','$r3','$r4')";
	if(mysqli_query($con,$query2))
	{
		$dta=mysqli_fetch_array(mysqli_query($con,"select * from customer_table where mobile1='$r2'"));
		echo"<script>alert('Customer Details Saved');</script>";
		echo"<script>window.location='add_odr.php?id=$dta[0]'</script>";
		
	}
	else{
		echo"<script>alert('try again');</script>";
		
			
	}
	}
}
?>

<script>
$(document).ready(function(){
		$(".mob").change(function(){
			var m1=$(".mob").val();
			$.post("check_member.php",{a:m1},function(data){$(".table2").html(data);});
		});
		
});
</script>