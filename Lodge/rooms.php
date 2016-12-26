<?php
session_start();
if(!isset($_SESSION[empid]))
{
	header("Location: loginpage.php");
} 

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

<script>
function selectroomtype(str)
{
if (str=="")
  {
  document.getElementById("displayroomtype").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("displayroomtype").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajaxroomtype.php?lodgeid="+str,true);
xmlhttp.send();
}
</script>

<?php
include ("dbconnection.php");
if(isset($_GET[delid]))
{
	$sqldelroom="DELETE FROM rooms where rooms.room_id=$_GET[delid]";
	$qrydel = mysqli_query($dbconnection,$sqldelroom);
		if(!$qrydel)
		{
			echo "Unable to delete record";
		}
}
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
			if($_FILES[roomimg][name][$x] !="")
			{
		  	$filename = rand().$_FILES[roomimg][name][$x];
			move_uploaded_file($_FILES[roomimg][tmp_name][$x],"uploads/".$filename);
			}
			else
			{
				$filename = "";
			}
		$sqlins = "INSERT INTO rooms(room_type_id,room_no,room_image,status) values('$roomtypes[$x]','$roomnos[$x]','$filename','$roomstats[$x]')";
		$result = mysqli_query($dbconnection, $sqlins);
	
			if(!$result)
			{
				$sqlerr = "Problem in SQL Statement". mysqli_errno();
			}
			else
			{
				$sqlerr = "Rooms details inserted successfully...";
				header("Location: viewrooms.php");
			}	
		}
	}
	
	if(isset($_POST[btnupdate]))
	{
	$roomid = $_POST[roomid1];
	$roomnos = $_POST[roomnumber1];
	$roomtypes = $_POST[roomtype1];
	$roomimages =$_POST[roomimg1];
	$roomstats = $_POST[roomstatus1];

		for($x=0; $x<count($roomnos); $x++)
		{
			if($_FILES[roomimg1][name][$x] !="")
			{
		  	$filename = rand().$_FILES[roomimg1][name][$x];
			move_uploaded_file($_FILES[roomimg1][tmp_name][$x],"uploads/".$filename);
			}
			else
			{
				$filename =$_POST[roomimgg];
			}
			
			$sqlins = "UPDATE rooms SET room_type_id='$roomtypes[$x]',room_no='$roomnos[$x]',room_image='$filename',status='$roomstats[$x]' where room_id='$roomid[$x]'";
			$result = mysqli_query($dbconnection, $sqlins);
		
			if(!$result)
			{
				 $sqlerr = "Problem in SQL Statement". mysqli_error($result);
			}
			else
			{
				
				$sqlerr = "Rooms details Updated successfully...";
			}	
		}
	}
}

$_SESSION[settid]=rand();
	
include("header.php");
?>
<!-- content -->
		<div id="content">

		  <div class="container">
            <div class="aside maxheight">
            	<!-- box begin -->
               <div class="box maxheight">
               	<div class="inner">
                  	<h3>Menu</h3>
                     <div class= "gallery-images">
                    <?php  /*  Download projects from www.freestudentprojects.com */
					include("adminmenu.php");
					?>
                     </div>
                 </div>
               </div>
               <!-- box end -->
            </div>
            <div class="content">
            	<div class="indent">

<?php  /*  Download projects from www.freestudentprojects.com */echo $sqlerr; ?>
<form method="post" action="" enctype="multipart/form-data">
<input type="hidden" name="settid" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $_SESSION[settid]; ?>" />
<?php
if(!isset($_GET[updid]))
{
	if(!isset($_POST[submit1]))
	{
?> 
               	<h2> ADD ROOMS :</h2>
    <table width="419" height="181" border="1" class="tftable">
    <tr>
      <th>Lodge Name</th>
      <td><select name="lodgeid" onchange="selectroomtype(this.value)">
    <option value='Select'>Select lodge</option>
      <?php
				  $sql = "SELECT * from lodges where status='Enabled'";
				  $qresult = mysqli_query($dbconnection,$sql);
				  while($rs = mysqli_fetch_array($qresult))
				  {
					  if($rs[lodge_id] == $_GET[lodgeid] )
					  {
							echo "<option value='$rs[lodge_id]' selected>$rs[lodge_name]</option>";  
					  }
					  else
					  {
							echo "<option value='$rs[lodge_id]'>$rs[lodge_name]</option>";
					  }
				  }
				  ?>
    </select></td>
    </tr>
    <tr><th>Room type</th> <td> 
       <div id="displayroomtype">       
        <select name="rmtype3">
        <option>Select Room type</option>
    <?php
            $sqlselect = "SELECT * FROM room_types where status='Enabled' AND lodge_id='$_GET[lodgeid]'";
    $qresult = mysqli_query($dbconnection, $sqlselect);
        while($rs = mysqli_fetch_array($qresult))
        {
            echo "<option value='$rs[room_type_id]'>$rs[room_type]</option>";
        }
        ?>
        </select>
        </div>
        </td>
    </tr>
    
        <tr>
          <th> No of rooms:</th> <td>
            <input name="norooms" type="number" size="10"></td></tr>
        <tr><th colspan=2><input type=submit name="submit1" value="submit"></th></tr>
          </table>
            
<?php
	}
}

if(isset($_POST[submit1]))
{
?>      

<p><strong>Enter room details:</strong></p>
<table width="600" border="1" class="tftable">
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
    <td>
    <input name="roomnumber[]" type="text" size="15" id="roomnumber[]" /></td>
    <td>
    <select name="roomtype[]" id="roomtype[]">
    <option>Select</option>
    <?php
		$sqlselect = "SELECT * FROM room_types where status='Enabled'  AND lodge_id='$_POST[lodgeid]'";
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

<?php
if(isset($_GET[updid]))
{

?>
               	<h2> EDIT ROOMS :</h2>
<p><strong>View room details..</strong></p>
<table width="600" border="1" class="tftable">
  <tr>
    <th width="112" scope="col">Room No</th>
    <th width="155" scope="col">Room type</th>
    <th width="218" scope="col">Image</th>
    <th width="87" scope="col">Status</th>
    <th width="87" scope="col">Delete</th>
  </tr>
<?php
if(isset($_GET[updid]))
{
$sqlselectrooms = "SELECT * FROM rooms where room_id='$_GET[updid]'";
}
$qresultrooms = mysqli_query($dbconnection, $sqlselectrooms);
while($rsrooms = mysqli_fetch_array($qresultrooms))
{
?>  
  <tr>
    <td>
    <input name="roomid1[]" type="hidden" size="15" id="roomid1[]" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $rsrooms[room_id];?>" />
    <input name="roomnumber1[]" type="text" size="15" id="roomnumber[]" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $rsrooms[room_no];?>" /></td>
    <td>
    <select name="roomtype1[]" id="roomtype[]">
    <option>Select</option>
    <?php
		$sqlselect = "SELECT * FROM room_types where status='Enabled'";
$qresult = mysqli_query($dbconnection, $sqlselect);
	while($rs = mysqli_fetch_array($qresult))
	{
		if($rs[room_type_id] == $rsrooms[room_type_id])
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
    <td>
    <input type="file" name="roomimg1[]" id="roomimg1[]" />
    <input type="hidden" name="roomimgg" id="roomimgg" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $rsrooms[room_image]; ?>" />
    <img src="<?php  /*  Download projects from www.freestudentprojects.com */
	if($rsrooms[room_image] !="")
	{
	echo "uploads/". $rsrooms[room_image]; 
	}
	else
	{
	echo "images/defaultimg.jpg";
	}
	?>" width="150" height="125"/>
    </td>
    <td>
    <select name="roomstatus1[]" id="roomstatus[]">
    <?php
	$arr = array("Enabled","Disabled");
	foreach($arr as $val)
	{
		if($val == $rsrooms[status])
		{
			echo "<option value='$val' selected>$val</option>";
		}
		else
		{
			echo "<option value='$val'>$val</option>";
		}
	}
	?>
    </select></td>
        <td> <a href='rooms.php?delid=<?php  /*  Download projects from www.freestudentprojects.com */echo $rsrooms[room_id];?>&updid=<?php  /*  Download projects from www.freestudentprojects.com */echo $_GET[updid];?>' onclick='return ConfirmDelete()'  > Delete</a> </td>
  </tr>
<?php
}
?>
   <tr>
    <td colspan="5" align="center"><input type="submit" name="btnupdate" value="Update Room details" /></td>
    </tr>
</table>
<?php
}
?>  </form>
</div>
            </div>
            <div class="clear"></div>
         </div>
		</div>
		<?php
		include("footer.php")
		?>