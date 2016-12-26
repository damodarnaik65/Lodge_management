<?php
session_start();
?>
<script>
    function ConfirmDelete()
	{
		var result = confirm("Are you sure want to delete this record?");
		if (result==true) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>
<?php
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sqldelete = "DELETE FROM billing where bill_id='$_GET[delid]'";
	$delquery = mysqli_query($dbconnection,$sqldelete);
	if(!$delquery)
	{
		echo "Unable to delete record";
	}
	else
	{
		echo "Record deleted successfully...";
	}
}
$sqlviewbilling= "SELECT * FROM billing";
$viewquery = mysqli_query($dbconnection,$sqlviewbilling);
?>
<table width="733" height="204" border="1" class="tftable">
  <tr>
    <th scope="col">Bill_date</th>
    <th scope="col">Credit</th>
    <th scope="col">Debit</th>
    <th scope="col">Payment</th>
    <th scope="col">Refund</th>
    <th scope="col">Status</th>
    <th scope="col">Action</th>
  </tr>
   <?php
  while($rs = mysqli_fetch_array($viewquery))
  {
echo "  <tr>
 
    <td>&nbsp;$rs[bill_id]</td>
    <td>&nbsp;$rs[bill_date]</td>
    <td>&nbsp;$rs[credit]</td>
    <td>&nbsp;$rs[debit]</td>
    <td>&nbsp;$rs[payment]</td>
    <td>&nbsp;$rs[refund]</td>
    <td>&nbsp;$rs[status]</td>
	<td><a href='viewbilling.php?delid=$rs[bill_id]' onclick='return ConfirmDelete()'>Delete</td>
  </tr>";
  }
  ?>
</table>
