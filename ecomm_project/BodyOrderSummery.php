<pre>
<div id="body" >
	<fieldset>
	<legend>Order summery page</legend>
	<table border="2" class="table table-striped table-bordered" align="center">
	<thead>
		<tr>
		<th>Product_Id</th>
		<th>Product_Name</th>
		<th>Price</th>
		<th>Image name</th>
		<th>Your Products</th>
		<th>Description </th>
		</tr>
	</thead>
<?php
include "Helper.php";
$var=$_SESSION['user'];
$obj = new Helper("ecomm");
$field="user_id,mobile,address,city,zip";
$table="user_details";
$condition="user_id='".$var."'";
$record=$obj->read_record($field, $table, $condition);
$arra=[];
$arra=array(explode(";", $_SESSION['key']));

echo '<tr>';
foreach ($arra as $booking) {
$temp=$booking;
$a=implode(",", $temp);
$temp=explode(",", $a);
$cnt=0;
    foreach ($temp as $booking2) {
		$cnt++;
		if ($cnt==5) {
			echo "<td>";
			echo '<img src="'.$booking2.'" alt="images" >';
			echo "</td>";
		} else {
			echo "<td>".$booking2."</td>";
		}
		if ($cnt==6) {
			echo "</tr>";
			echo "<tr>";
			$cnt=0;
		}
	}
}
echo "</tr>";
?>
</table>

<h3>Address details :</h3>
<table border="3">


<tr>
<td>&nbsp;&nbsp;&nbsp;Email&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['email'];?>&nbsp;&nbsp;&nbsp;</td>
</tr> 
<?php
foreach($record as $key ){
    $_SESSION["user_details_id"]= $key['user_id'];
    foreach($key as $subElement=>$val){	
	?>
		<tr>
		<td>&nbsp;&nbsp;&nbsp;<?php echo "$subElement";?>&nbsp;&nbsp;&nbsp;</td>
        <td>&nbsp;&nbsp;&nbsp;<?php echo "$val";?>&nbsp;&nbsp;&nbsp;</td>
		</tr> 
		<?php
    } 
}
?>
</table>
<form method="POST" action="Validate.php">
<input type="submit" name="btn_submit" class="btn btn-info" value="Address" />&nbsp;<input type="submit" name="btn_submit"  class="btn btn-info" value="Confirm" />&nbsp;<input type="submit" name="btn_submit" class="btn btn-info"  value="Cancel" />
</form>
	</fieldset>
</div>
</pre>
