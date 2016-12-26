<?php
session_start();
include("header.php");
include("dbconnection.php");
	if(isset($_GET[searchdate]))
	{
			$searchdate = $_GET[searchdate];
	}
	else
	{
			$searchdate = date("Y-m-d");
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
if(isset($_GET[delid]))
{
	$sqldelete = "DELETE FROM rooms where room_id='$_GET[delid]'";
	$delquery = mysqli_query($dbconnection,$sqldelete);
	if(mysqli_affected_rows($dbconnection) == 1)
	{
	?>
    <script>
		alert("Record deleted successfully...");
	</script>
    <?php
	}
	else
	{
	?>
    <script>
		alert("Failed to delete record...");
	</script>
    <?php
	}
}
$lodgedetail="SELECT * from lodges";
$lodgequery=mysqli_query($dbconnection,$lodgedetail);
$sqlfetchlodge=mysqli_fetch_array($lodgequery);

$selroomtype="SELECT * from room_types";
$roomquery=mysqli_query($dbconnection,$selroomtype);

if( $_GET[lodgename] != "Select" && $_GET[rmtype3] == "Select" && $_GET[submit] =="submit" )
{
	$selnorooms="SELECT rooms.*,room_types.* from rooms INNER JOIN room_types  ON rooms.room_type_id= room_types.room_type_id where room_types.lodge_id='$_GET[lodgename]' ";

}
else if($_GET[lodgename] !="Select" &&  $_GET[rmtype3] != "Select" && $_GET[submit] =="submit" )
{
$selnorooms="SELECT rooms.*,room_types.* from rooms INNER JOIN room_types  ON rooms.room_type_id= room_types.room_type_id where room_types.lodge_id='$_GET[lodgename]' AND rooms.room_type_id='$_GET[rmtype3]' ";
}
else
{
$selnorooms="SELECT rooms.*,room_types.* from rooms INNER JOIN room_types  ON rooms.room_type_id= room_types.room_type_id ";
}
$noofroomsquery=mysqli_query($dbconnection,$selnorooms);
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
               	
                  
                  
          
    <div class="gallery">
    <p>
    <form method="get" action="">
    <table width="454" height="32" border="1" class="tftable">
  <tr>
    <th colspan="3" scope="col" align="left">Select Booking Date : &nbsp;
      <input type="date" name="searchdate" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $searchdate; ?>" /></th>
    </tr>
  <tr>
    <th scope="col">&nbsp; 
    <select name="lodgename"  onchange="selectroomtype(this.value)" >
    <option value='Select'>Select lodge</option>
      <?php
				  $sql = "SELECT * from lodges where status='Enabled'";
				  $qresult = mysqli_query($dbconnection,$sql);
				  while($rs = mysqli_fetch_array($qresult))
				  {
					  if($rs[lodge_id] == $_GET[lodgename] )
					  {
							echo "<option value='$rs[lodge_id]' selected>$rs[lodge_name]</option>";  
					  }
					  else
					  {
							echo "<option value='$rs[lodge_id]'>$rs[lodge_name]</option>";
					  }
				  }
				  ?>
    </select></th>
    <th scope="col"><div id="displayroomtype">       
        <select name="rmtype3">
        <option value="Select">Select Room type</option>
     			<?php
				  $sqld = "SELECT * from room_types where status='Enabled' AND lodge_id='$_GET[lodgename]'";
				  $qresultt = mysqli_query($dbconnection,$sqld);
				  while($rss = mysqli_fetch_array($qresultt))
				  {
					  if($rss[room_type_id] == $_GET[rmtype3] )
					  {					  
					  echo "<option value='$rss[room_type_id]' selected>$rss[room_type]</option>";
					  }
					  else
					  {
					  echo "<option value='$rss[room_type_id]'>$rss[room_type]</option>";
					  }
				  }
				  ?>
        </select>
        </div></th>
    <th scope="col">&nbsp;    <input type="submit" name="submit" value="submit" />
</th>
  </tr>
</table>
    </form>
    </p>
            <ul>
            <?php
			while($sqlfetch=mysqli_fetch_array($noofroomsquery))
				{
					
			echo "<li >
				<a href='#'><p align='center'><br /><font color='#FFFF00'>$sqlfetch[room_type]</font>
				<br /><font color='red' size='+1'>$sqlfetch[room_no]</font></a>";
			
			$sqldroom_booking = "SELECT * FROM  `room_booking` WHERE room_id='$sqlfetch[room_id]' AND  ('$searchdate' between DATE_ADD(`checkin_date` , INTERVAL -1 
DAY ) and DATE_ADD(`checkout_date`, INTERVAL 1 DAY ))";
			$qresulttroom_booking = mysqli_query($dbconnection,$sqldroom_booking);			
					if(mysqli_num_rows($qresulttroom_booking) >= 1)
					{
						$fetchroom =  mysqli_fetch_array($qresulttroom_booking);
						if($fetchroom[status] == "Booked")
						{
							echo "<br /><font color='red' ><strong>Check In</strong></font>";
						}
						if($fetchroom[status] == "Checkout")
						{
							echo "<br /><font color='orrange' ><strong>Checkout</strong></font>";	
						}
						if($fetchroom[status] == "Cancelled")
						{
							echo "<br /><font color='green' ><strong>Vacant</strong></font>";
						
						}
					}
					else
					{
						echo "<br /><font color='green' ><strong>Vacant</strong></font>";
					}
			
			echo "</li>";				 
			 	}
			 ?>
                   
          </ul>
         </div>
                   

                  
               </div>
            </div>
            <div class="clear"></div>
         </div>
		</div>
		<?php
		include("footer.php");
		?>