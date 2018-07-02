<?php
$r1=$_REQUEST['a'];
if($row=mysqli_fetch_array(mysqli_query(mysqli_connect("localhost","root","","tlr"),"select * from customer_table where mobile1='$r1'")))
{
	//echo"<tr><td>Name</td><td><div class='c_name' >$row[1]</div></td><td>Mobile Number</td><td><p name='po' class='pnum'>$row[2]</p></td></tr>";
	//echo"<tr><td>Address</td><td><textarea name='address' value=''>$row[4]</textarea></td><td>alternet Number</td><td>$row[3]</td></tr>";
	echo"<Script>window.location='add_odr.php?id=$row[0]'</script>";
}
else
{
	echo"<tr><td colspan=4 style='font-size:30px'>Form For New Member</td></tr>";
	echo"<tr><td>Name</td><td><input name='name' value=''></td><td>Mobile Number</td><td><input name='mob1' value='$r1'></td></tr>";
	echo"<tr><td>Address</td><td><textarea name='address' value=''></textarea></td><td>alternet Number</td><td><input name='mob2' value=''></td></tr><tr><td><input type='submit' class='btn btn1  btn-primary' name='sub' value='save'></td></tr>
	";
}
?>