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
		<div class="col-md-6">
			<h3>
				Add Cloth Type
			</h3>
			<form method="post">
			<table class="table" style="width: 100%;">
				<tr><td>Body Portion</td><td><select name="portion">
					<option></option>
					<option value="upper">Upper Body</option>
					<option value="lower">Lower Body</option>
				</select></td></tr>
				<tr><td colspan="1">Cloth Name</td><td><input name="cname"></td></tr>
				<tr><td colspan="1"><input type="submit" style="margin-left: 100%;" class="btn btn-primary" name="sub1"></td></tr>
			</table>
			</form>
		</div>
		<div class="col-md-7">
			<h3>
				Existing Type
			</h3>
			<table class="table" style="width: 100%;">
				<tr><th>Cloth Id</th><th>Name</th><th>Portion</th><th>action</th></tr>
				<?php
					$con=mysqli_connect("localhost","root","","tlr");
					$r1=mysqli_query($con,"select * from cloth_table");
					while($row=mysqli_fetch_array($r1))
					{
						echo"<tr><td>cl_000$row[0]</td><td>$row[1]</td><td>$row[2]</td><td><button value='$row[0]' class='clk btn btn-warning'>Delete</button></td></tr>";
					}
				?>
			</table>
		</div>
			
	</div>
</html>
<?php

if(isset($_REQUEST['sub1']))
{
	$r2=$_REQUEST['portion'];
	$r3=$_REQUEST['cname'];
	if($r2==null || $r3==null  )
	{
		echo"<script>alert('Form not filled correctly');</script>";
	}
	else if(mysqli_query($con,"insert into cloth_table values('','$r3','$r2')"))
	{
		echo"<script>alert('Done');</script>";
		echo"<script>window.location='new_cloth.php'</script>";
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
			$.post("cloth_del.php",{a:t},function(data){
				$(".r").html(data);
			});
		});
	});
	
	

</script>