<?php
include('include\menu.php');
$date=date("Y-m-d");
?>
<style>
		body
		{
			font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial," sans-serif";
			
		}
		.done1
		{
		   color: orange;
		}
		.done2
		{
		   color: #ff4C00;
		}
		.done3
		{
		   color: #00ff4C;
		}
</style>
<div class='container'>
<?php
{   

	echo "
	<h3>Work in progress</h3>
	<table class='table'><tr><th>job</th><th>cutters</th><th>makers</th></tr>";

	$con=mysqli_connect('localhost','root','','tlr');
	$q=mysqli_query($con,"select * from job where assigned>'0' and assigned<'3'");
		while($row=mysqli_fetch_array($q))
		{
		if($row[14]!='0' && $row[15]!='0')
			if($row[17]<$date && $row[16]<$date && $row[18]==0 && $row[19]==0)
			{
				{echo "<tr><td>$row[5]:$row[0]</td><td style='color:red'>$row[14]</td><td style='color:red'>$row[15]</td></tr>
				";}
			}
			else if($row[17]<$date && $row[16]<$date && $row[19]==0)
			{
				{echo "<tr><td>$row[5]:$row[0]</td><td>$row[14]</td><td style='color:red'>$row[15]</td></tr>
				";}
			}
			else if($row[16]<$date && $row[18]=='0')
			{
				{echo "<tr><td>$row[5]:$row[0]</td><td style='color:red'>$row[14]</td><td>$row[15]</td></tr>
				";}
			}
			else if($row[17]<$date && $row[19]=='0')
			{
				{echo "<tr><td>$row[5]:$row[0]</td><td>$row[14]</td><td style='color:red'>$row[15]</td></tr>
				";}
			}
			else
			{
				{echo "<tr><td>$row[5]:$row[0]</td><td>$row[14]</td><td>$row[15]</td></tr>
				";}
			}
		}
echo "</table><br> <br>";
}
?>
</div>







<div class="container">
			<table class='table table-responsive'>
			<h3>Jobs</h3>
			<tr><th>id</th><th>bill no</th><th>delivery date</th><th>cloth type</th><th>quantity</th><th>treatment</th><th>urgent</th><th></th></tr>
			<?php
				$con=mysqli_connect('localhost','root','','tlr');
				$q1=mysqli_query($con, "select * from job order by delivery_date");
				
					while($row=mysqli_fetch_array($q1))
					{
						if($row[9]=='0')	
				   		{
						echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[12]</td><td>$row[13]</td><td><a href='javascript:void(0);' data-href='getContent.php?id=$row[0]'	 class='openPopup'>assign worker</a></td><td></td></tr>";
						}
						else if($row[9]=='1')
						{
						echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[12]</td><td>$row[13]</td><td><a href='assign.php?update=true&id=$row[0]'	 class='done1'>at cutters</a></td><td><a href='assign.php?updateno=true&id=$row[0]'	 class='done3'>re assign</a></td></tr>";
						}
						else if($row[9]=='2')
						{
						echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[12]</td><td>$row[13]</td><td><a href='assign.php?update1=true&id=$row[0]'	 class='done2'>at  makers</a></td><td><a href='assign.php?updateno=true&id=$row[0]'	 class='done3'>re assign</a></td></tr>";
						}						
						else
						{}
					}
			?>
			</table>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Assign cutter and maker</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
      
    </div>
</div>
<script>
$(document).ready(function(){
    $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function(){
            $('#myModal').modal({show:true});
        });
    }); 
});
</script>


<?php
if(isset($_REQUEST['update']))
{
    $id=$_REQUEST['id'];
    
	$con=mysqli_connect('localhost','root','','tlr');
	$q="UPDATE job SET assigned='2' , cutter_done='$date' where id='$id'";
	
		if(mysqli_query($con,$q))
		{
			echo"<script>alert('to maker');</script>";
			echo"<script>window.location='assign.php'</script>";
		}
		else
		{
			echo"<script>alert('Try Again');</script>";
		}
	
}
?>


<?php
if(isset($_REQUEST['update1']))
{
    $id=$_REQUEST['id'];
    
	$con=mysqli_connect('localhost','root','','tlr');
	$q="UPDATE job SET assigned='3' , maker_done='$date' where id='$id'";
	
		if(mysqli_query($con,$q))
		{
			echo"<script>alert('done');</script>";
			echo"<script>window.location='assign.php'</script>";
		}
		else
		{
			echo"<script>alert('Try Again');</script>";
		}
	
}
?>

<?php
if(isset($_REQUEST['updateno']))
{
    $id=$_REQUEST['id'];
    
	$con=mysqli_connect('localhost','root','','tlr');
	$q="UPDATE job SET assigned='0' , cutter='0' , maker='0' , cutter_done='0' , maker_done='0' where id='$id'";
	
		if(mysqli_query($con,$q))
		{
			echo"<script>alert('done');</script>";
			echo"<script>window.location='assign.php'</script>";
		}
		else
		{
			echo"<script>alert('Try Again');</script>";
		}
	
}
?>