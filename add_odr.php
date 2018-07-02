<?php
include("include\menu.php");
$r1=$_REQUEST['id'];

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
echo"<ul  style='font-size:20px'><b>Bill Id--></b><input class='bill_id' value='$bill' readonly><input type='hidden' class='cid' value='$r1' ></ul>";
?>

<style>
		body
		{
			font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial," sans-serif";
			
		}
</style>
<html>






<div>
<table class="table table-responsive">
<?php
	$con=mysqli_connect("localhost","root","","tlr");
	$t1=mysqli_query($con,"select * from cloth_table where portion='upper' ");
	$t2=mysqli_query($con,"select * from cloth_table where portion='lower' ");
if($row=mysqli_fetch_array(mysqli_query($con,"select * from customer_table where cust_id='$r1'")))
{
	echo"<tr><td>Name</td><td><input class='c_name' value='$row[1]' readonly></td><td>Mobile Number</td><td><input class='pnum' value='$row[2]' readonly></td></tr>";
	echo"<tr><td>Address</td><td><textarea name='address' value=''>$row[4]</textarea></td><td>alternet Number</td><td><input class='pnum' value='$row[3]' readonly></td></tr>";
}
?>
</table>	
</div>
	<div class="container">
		<div>
			<table class="table" style="border:2;">
				
				<tr><td>S.no</td><td>Order</td><td>quantity</td><td>price</td><td>Total</td><td><p><?php
					echo $date ?></p></td><td><input type="button" value="Upper" class="upper btn btn-default"></td><td><input type="button" value="Lower" class="lower btn btn-default"></td></tr>
				<!----<tr><td><input type="button" class="cal" value="calculate"></td></tr>--->
			</table>
				<div class='yyr'>	
					<ul>
						<button class="save btn btn-primary"> Save</button>
					</ul>
				</div>
		</div>
	</div>
</html>


<script>
$(document).ready(function(){
	var r=1;
		$('table').on('click','.upper',function(e){
		var top="<table class='rem table '><tr><td>"+ (r++) +"</td><td><select class='sel' name='sel'><option></option><?php  while($row=mysqli_fetch_array($t1)){ echo'<option value='.$row[1].' >'.$row[1].' </option>'; } ?></select></td><td><input name='qty' class='qty'></td><td><input class='price'  name='price'></td><td><input class='total' name='total' readonly></td><td><input type='button'  value='delete' class='del'></td></tr>  <tr><td></td></tr>                                                                                   			 <tr><td></td><td>Length</td><td><input name='l1'></td><td>chest</td><td><input name='l2'></td><td>waist</td><td><input name='l3' ></td><td>hip</td><td><input name='l4'></td></tr>                                                                                                                               <tr><td></td><td>shoulder</td><td><input name='l5'></td><td>sleeve</td><td><input name='l6'></td><td>cuff</td><td><input name='l7'></td><td>collar</td><td><input name='l8'></td></tr>                                                        <tr><td></td><td>Remark</td><td><textarea class='tx_area'></textarea></td><td>Date Of Delivery</td><td><input class='date' type='date'></td></tr>	<tr><td></td><td>Treatment</td><td><select class='treatment'> 			<option> </option>			<option value='p'>Premium</option>			<option value='r'>Regular</option>		</select>	</td><td><select class='urgent'><option value='u'>urgent</option>			<option value='r'>Regular</option>		</select>	</td><td colspan='2'><input class='checkbox' type='checkbox' >home delivery</td></tr></table>";
		$(".yyr").append(top);
	});
	
		$('table').on('click','.lower',function(e){
		
		var bottom="<table class='rem table '><tr><td>"+ (r++) +"</td><td><select class='sel' name='sel'><option></option><?php  while($row=mysqli_fetch_array($t2)){ echo'<option value='.$row[1].' >'.$row[1].' </option>'; } ?></select></td><td><input name='qty' class='qty'></td><td><input class='price'  name='price'></td><td><input class='total' name='total' readonly></td><td><input type='button'  value='delete' class='del'></td></tr>  <tr><td></td></tr>                                                                                   			 <tr><td></td><td>length</td><td><input name='l1'></td><td>waist</td><td><input name='l2'></td><td>hip</td><td><input name='l3'></td><td>bottom</td><td><input name='l4' ></td></tr>                                                                                                                               <tr><td></td><td>thigh</td><td><input name='l5'></td><td>circle</td><td><input name='l6'></td></tr>                                                        <tr><td></td><td>Remark</td><td><textarea class='tx_area'></textarea></td><td>Date Of Delivery</td><td><input class='date' type='date'></td></tr>	<tr><td></td><td>Treatment</td><td><select class='treatment'> 			<option> </option>			<option value='p'>Premium</option>			<option value='r'>Regular</option>		</select>	</td><td><select class='urgent'><option value='u'>urgent</option>			<option value='r'>Regular</option>		</select>	</td><td colspan='2'><input class='checkbox' type='checkbox' >home delivery</td></tr></table>";
		/*var bottom="<tr><td>"+ (r++) +"</td><td><select class='sel' name='sel'><option></option><?php  while($row=mysqli_fetch_array($t2)){ echo'<option value='.$row[0].' >'.$row[1].' </option>'; } ?></select></td><td><input name='qty' class='qty'></td><td><input class='price'  name='price'></td><td><input class='total' name='total'></td><td><input type='button'  value='delete' class='del'></td> </tr> <tr><td></td></tr>                                                                                   			 <tr><td></td><td>Length</td><td><input name='l1' placeholder='length'></td><td>Length</td><td><input name='l2' placeholder='length'></td><td>Length</td><td><input name='l3' placeholder='length'></td><td>Length</td><td><input name='l4' placeholder='length'></td></tr>                                                                                                                               <tr><td></td><td>Length</td><td><input name='l5' placeholder='length'></td><td>Length</td><td><input name='l6' placeholder='length'></td><td>Length</td><td><input name='l7' placeholder='length'></td><td>Length</td><td><input name='l8' placeholder='length'></td></tr>                                                        <tr><td></td><td>Remark</td><td><textarea class='tx_area'></textarea></td><td>Date Of Delivery</td><td><input class='date' type='date'></td></tr>	<tr><td></td><td>Treatment</td><td><select class='treatment'> 			<option> </option>			<option value='p'>Premium</option>			<option value='r'>Regular</option>		</select>	</td><td colspan='2'><input class='checkbox' type='checkbox' >home delivery</td></tr></tr>";
		$(".yyr").append(bottom);*/
		$(".yyr").append(bottom);
	});
	
	/*$('table').on('click','.del',function(e){
			$(this).closest(".rem").remove();
			

		});*/
	$('.yyr').on('click','.del',function(e){
		$(this).closest(".rem").remove();
	});
	
	$('.yyr').on('blur','.price',function(e){
			var v1= 0, v2=0;
			v1=parseInt($(this).val());
			//var v2=$(this).find("td:nth-child(3)").val();
			v2=parseInt($(this).closest('tr').find(".qty").val());
			//$(this).closest(".total").val(v1+v2);
			//$("input[name='total']").val(v1*v2);
			$(this).closest('tr').find(".total").val(v1*v2);		
	});
	
	$(".save").click(function(){
		var cid=$(".cid").val(),mob=$(".pnum").val(),l1,l2,l3,l4,l5,l6,l7,l8,hd,name=$(".c_name").val(),bill_id=$(".bill_id").val(),tx_area,date,treat,urgent,total,price,qty,sel;
		
		
		 $(".rem").each(function(){	
				 sel=$(this).find(".sel").val();
				 qty=$(this).find(".qty").val();
				 price=$(this).find(".price").val();
				 total=$(this).find(".total").val();
				 l1= $(this).find("input[name='l1']").val();
				 l2= $(this).find("input[name='l2']").val();
				 l3= $(this).find("input[name='l3']").val();
				 l4= $(this).find("input[name='l4']").val();
				 l5= $(this).find("input[name='l5']").val();
				 l6= $(this).find("input[name='l6']").val();
				 l7= $(this).find("input[name='l7']").val();
				 l8= $(this).find("input[name='l8']").val();
				 tx_area= $(this).find(".tx_area").val();
				 date= $(this).find(".date").val();
				 treat= $(this).find(".treatment").val();
				 urgent= $(this).find(".urgent").val();
				if($(".checkbox").prop('checked', true))
					{
						hd=1;
					}
					else
					{
					    hd=0;
					}
			
			
			$.post("mes_save.php",{bill_id:bill_id,cid:cid,date:date,cloth_type:sel,qty:qty,price:price,total:total,hd:hd,treat:treat,urgent:urgent,l1:l1,l2:l2,l3:l3,l4:l4,l5:l5,l6:l6,l7:l7,l8:l8,remark:tx_area},function(data){
				$(".o").html(data);
			});
		 });
	});
	
});
</script>
<p class='o'>
</p>