<?php
session_start();
include("dbconnection.php");
$sqlviewrooms = "SELECT rooms.*,room_types.room_type from rooms INNER JOIN room_types ON rooms.room_type_id=room_types.room_type_id ";
$viewquery = mysqli_query($dbconnection,$sqlviewrooms);
?>
<table width="535" border="1">
  <tr>
    <th width="120" scope="col">Room type</th>
    <th width="140" scope="col">Room no</th>
    <th width="118" scope="col">Image</th>
    <th width="87" scope="col">Status</th>
    <th width="87" scope="col">Action</th>
  </tr>
   <?php
  while($rs = mysqli_fetch_array($viewquery))
  {
echo "  <tr>
  
    <td>$rs[room_type]</td>
    <td>&nbsp; $rs[room_no]</td>
    <td>&nbsp; <img src='uploads/$rs[room_image]' height='50' width='75'></img> </td>
    <td>&nbsp; $rs[status]</td>
	<td><a href='rooms.php?updid=$rs[room_id]'>Update</a></td>
  </tr>";
  }
  ?>
</table>
