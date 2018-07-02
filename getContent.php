<?php
$id=$_REQUEST['id'];

$con=mysqli_connect('localhost','root','','tlr');
$q=mysqli_query($con,"select * from job where id='$id'");
$q2=mysqli_query($con,"select * from employee_table where type='cutter'");
$q3=mysqli_query($con,"select * from employee_table where type='maker'");
while($row=mysqli_fetch_array($q))
{
       echo "
	    <form method='post' action='cut_mak.php'>
	    <table class='table'>
		<tr><td>job_id</td><td><input type='text' value='$id' name='id'></td></td>
		<tr><td>delivery date: $row[4]</input></td>
		</tr>
		</table>
		<div class='yyr'>
		
		</div>
		</form>
   ";
}
?>

<script>
$(document).ready(function(){
				var top="<table class='rem table '><tr><td>cutter</td><td><select class='cut' name='cut'><option></option><?php  while($row=mysqli_fetch_array($q2)){ echo'<option value='.$row[1].' >'.$row[1].' </option>'; } ?></select></td><td>maker</td><td><select class='mak' name='mak'><option></option><?php  while($row2=mysqli_fetch_array($q3)){ echo'<option value='.$row2[1].' >'.$row2[1].' </option>'; } ?></select></td></tr><tr><td colspan='2'>deadline: <input type='date' class='dead1' name='dead1'></input></td><td colspan='2'>deadline: <input type='date' class='dead2' name='dead2'></input></td></tr><tr><td><input type='submit' class='btn btn-success'></input></td></tr></table>";
		$(".yyr").append(top);
});		