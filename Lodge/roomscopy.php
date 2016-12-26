<?php
session_start();
include ("dbconnection.php");

if($_POST[settid]==$_SESSION[settid])
{
	if(isset($_POST[submit2]))
	{
	$roomnos = $_POST[roomnumber];
	$roomtypes = $_POST[roomtype];
	$roomimages =$_POST[roomimg];
	$roomstats = $_POST[roomstatus];
		
		for($x=0; $x<count($roomnos); $x++)
		{
		  	$filename = rand().$_FILES[roomimg][name][$x];
			move_uploaded_file($_FILES[roomimg][tmp_name][$x],"uploads/".$filename);
			
		$sqlins = "INSERT INTO rooms(room_type_id,room_no,room_image,status) values('$roomtypes[$x]','$roomnos[$x]','$filename','$roomstats[$x]')";
		mysqli_query($dbconnection, $sqlins);
		$result = mysqli_query($dbconnection, $sqlins);
	
		if(!$result)
		{
			echo $sqlerr = "Problem in SQL Statement". mysqli_errno();
		}
		else
		{
			echo $sqlerr = "Rooms details inserted successfully...";
		}	
		}
	}
}
$updselrec = "SELECT * FROM rooms where room_id='$_GET[updid]'";
$updquery = mysqli_query($dbconnection, $updselrec);
$updrec = mysqli_fetch_array($updquery);

$_SESSION[settid]=rand();
	

?>


<form method="post" action="roomscopy.php" enctype="multipart/form-data">
<input type="hidden" name="settid" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $_SESSION[settid]; ?>" />
<?php
if(!isset($_POST[submit1]))
{
?> 
<table border="1">
<tr><th>Room type</th> <td> 
   <select name="rmtype3">
    <option value="">Select</option>
    <?php
	$sqlselect = "SELECT * FROM room_types where status='Enabled'";
	$qresult = mysqli_query($dbconnection, $sqlselect);
	while($res = mysqli_fetch_array($qresult))
	{
		if($res[room_id] == $updrec[room_id] )
		{
		echo "<option value='$res[room_type_id]' selected>$res[room_type]</option>";
		}
		else
		{
		echo "<option value='$res[room_type_id]'>$res[room_type]</option>";
		}
	}
	?>
    </select>
    </td>
</tr>

    <tr>
      <th> No of rooms:</th> <td>
        <input name="norooms" type="number" size="10" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[norooms];?>"></td></tr>
    <tr><th colspan=2><input type=submit name="submit1" value="submit"></th></tr>
      </table>
            
<?php
}

if(isset($_POST[submit1]))
{
?>      
<p><strong>Enter room details:</strong></p>
<table width="600" border="1">
  <tr>
    <th width="112" scope="col">Room No</th>
    <th width="155" scope="col">Room type</th>
    <th width="218" scope="col">Image</th>
    <th width="87" scope="col">Status</th>
  </tr>
<?php
for($i=0; $i< $_POST[norooms]; $i++)
{
?>  
  <tr>
    <td><input name="roomnumber[]" type="text" size="15" id="roomnumber[]"  /></td>
    <td>
    <select name="roomtype[]" id="roomtype[]">
    <option>Select</option>
    <?php
		$sqlselect = "SELECT * FROM room_types where status='Enabled'";
$qresult = mysqli_query($dbconnection, $sqlselect);
	while($rs = mysqli_fetch_array($qresult))
	{
		if($_POST[rmtype3] == $rs[room_type_id])
		{
		echo "<option value='$rs[room_type_id]' selected>$rs[room_type]</option>";
		}		
		else
		{
		echo "<option value='$rs[room_type_id]'>$rs[room_type]</option>";
		}
	}
	?>
    </select>
    </td>
    <td><input type="file" name="roomimg[]" id="roomimg[]" /></td>
    <td>
    <select name="roomstatus[]" id="roomstatus[]">
    <option>Enabled</option>
    <option>Disabled</option>
    </select></td>
  </tr>
  <?php
}
?>
   <tr>
    <td colspan="4" align="center"><input type="submit" name="submit2" value="Submit Room details" /></td>
    </tr>
</table>
<?php

}
?>
  </form>