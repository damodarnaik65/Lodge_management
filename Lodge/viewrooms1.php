<?php
session_start();
include("dbconnection.php");
$sqlviewrooms = "SELECT count(rooms.room_type_id) AS noofrooms,rooms.*,room_types.room_type, lodges.lodge_name,lodges.lodge_id from rooms INNER JOIN room_types INNER JOIN lodges ON rooms.room_type_id=room_types.room_type_id AND	 room_types.lodge_id = lodges.lodge_id GROUP BY rooms.room_type_id";
$viewquery = mysqli_query($dbconnection,$sqlviewrooms);
?>
<table width="593" border="1">
  <tr>
  <th width="120" scope="col">Lodge Name</th>
    <th width="120" scope="col">Room type</th>
    <th width="140" scope="col">No. of Rooms</th>
  <th width="87" scope="col">Action</th>
  </tr>
   <?php
  while($rs = mysqli_fetch_array($viewquery))
  {
echo "  <tr>
	<td>&nbsp; $rs[lodge_name]</td>
    <td>&nbsp; $rs[room_type]</td>
    <td>&nbsp; $rs[noofrooms]</td>
	<td>&nbsp; <a href='rooms.php?updid=$rs[lodge_id]'>Update</a></td>
  </tr>";
  }
  ?>
</table>
