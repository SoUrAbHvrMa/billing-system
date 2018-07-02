<?php
include("include\menu.php");
?>
<html>
	<style>
		body
		{
			font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial," sans-serif";
			
		}
	</style>
	<div class="container">
		<div class="col-md-9">
			<h3>
				Add new employee
			</h3>
			<form method="post">
			<table class="table" style="width: 100%;">
				<tr><td>name</td><td><input type="text" name="name"></input></td><td>phone number</td><td><input type="text" name="phone"></input></td><td>type</td>
				<td><select name="type">	
					<option></option>
					<option value="cutter">Cutter</option>
					<option value="maker">Maker</option>
				</select></td>
				<tr><td colspan="5"><input type="submit" style="margin-left: 100%;" class="btn btn-primary" name="sub1"></td></tr>
				</table>
			</form>
		</div>
		<div class="col-md-7">
			<h3>
				List of employees
			</h3>
			<table class="table" style="width: 100%;">
				<tr><th>Id</th><th>Name</th><th>phone number</th><th>type</th><th>action</th></tr>
				<?php
					$con=mysqli_connect("localhost","root","","tlr");
					$r1=mysqli_query($con,"select * from employee_table");
					while($row=mysqli_fetch_array($r1))
					{
						echo"<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td><button value='$row[0]' class='clk btn btn-warning'>Delete</button></td></tr>";
					}
				?>
			</table>
		</div>
			
	</div>
</html>
<?php

if(isset($_REQUEST['sub1']))
{
    $r1=$_REQUEST['name'];
	$r2=$_REQUEST['phone'];
	$r3=$_REQUEST['type'];
	if($r2==null || $r3==null  )
	{
		echo"<script>alert('Form not filled correctly');</script>";
	}
	else if(mysqli_query($con,"insert into employee_table values('','$r1','$r2','$r3')"))
	{
		echo"<script>alert('Done');</script>";
		echo"<script>window.location='emp_tbl.php'</script>";
		$r1=null;
		$r2=null;
		$r3=null;
		
	}
	else
	{
		echo"<script>alert('Error');</script>";
	}
		
}
?>
<p class="r"></p>
<script>


	$(document).ready(function(){
		$(".clk").click(function(){
			var t=$(this).val();
			$.post("emp_del.php",{a:t},function(data){
				$(".r").html(data);
			});
		});
	});
</script>