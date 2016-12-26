<?php
include("header.php");
include("dbconnection.php");
$lodgedetail="SELECT * from lodges where lodge_id='$_GET[lodgeid]'";
$lodgequery=mysqli_query($dbconnection,$lodgedetail);
$sqlfetch=mysqli_fetch_array($lodgequery);

$selroomtype="SELECT * from room_types where lodge_id=$_GET[lodgeid]";
$roomquery=mysqli_query($dbconnection,$selroomtype);

$selfacility="SELECT * from facilities where lodge_id=$_GET[lodgeid]";
$facilityquery=mysqli_query($dbconnection,$selfacility);

if(isset($_GET[roomtypeid]))
{
$selnorooms="SELECT rooms.* from rooms INNER JOIN room_types  ON rooms.room_type_id= room_types.room_type_id where room_types.lodge_id='$_GET[lodgeid]' AND rooms.room_type_id='$_GET[roomtypeid]' ";
}
else
{
$selnorooms="SELECT rooms.* from rooms INNER JOIN room_types  ON rooms.room_type_id= room_types.room_type_id where room_types.lodge_id='$_GET[lodgeid]'";
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
                  	<h3>Room Types</h3>
                     
                   <?php
				   while($sqlroomfetch=mysqli_fetch_array($roomquery))
				   {
					   
                     	echo "
						<a href='viewlodgerooms.php?lodgeid=$_GET[lodgeid]&roomtypeid=$sqlroomfetch[room_type_id]&visitorid=$_GET[visitorid]'><strong>$sqlroomfetch[room_type]</strong><br><img src='uploads/$sqlroomfetch[image]' height='75' width='150'></img><br>
						</a><br><hr>";
				   }
         ?>
             
               	</div>
               </div>
               <!-- box end -->
            </div>
            <div class="content">
            	<div class="indent">
               	
                  
                  <div class="extra-wrap">                    
                     <table width="548" border="0" class="tftable">
  <tr>
    <td>&nbsp;<h2><?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[lodge_name]?></h2>
                  <p><img src="uploads/<?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[image]; ?>" width="370" height="210" class="img-indent png alt" /></p></td>
    <td valign="top">&nbsp;
    <h3>ADDRESS</h3>
    <?php  /*  Download projects from www.freestudentprojects.com */echo str_replace(",",",<br>",$sqlfetch[address]); ?><br />
  <br />  <hr />
    <br /><font color=red>DISTANCE FROM TEMPLE</font>:
	 <br /><?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[distance]?>
   </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp; <h5>Facilities</h5>
                    
                      <?php
				   while($sqlfecilityfetch=mysqli_fetch_array($facilityquery))
				   {
					   
                     	echo "<strong>$sqlfecilityfetch[facility]</strong><br>";
						if($sqlfecilityfetch[image] != "")
						{
						echo "<img src='uploads/". $sqlfecilityfetch[image] . "' width='170' height='110' />";
						}
						echo "<hr>";
				   }
         ?>
        <br /> <br />
         <hr />
           <br />
           
         <h4>Number of Rooms: <?php  /*  Download projects from www.freestudentprojects.com */echo mysqli_num_rows($noofroomsquery); ?></h4>
         </td>
  </tr>
</table>
                     <p><a href="viewlodgerooms.php?lodgeid=<?php  /*  Download projects from www.freestudentprojects.com */echo $_GET[lodgeid]; ?>&visitorid=<?php  /*  Download projects from www.freestudentprojects.com */echo $_GET[visitorid]; ?>"><img src="images/viewrooms.png" width="393" height="114" /></a></p>

                  </div>
               </div>
            </div>
            <div class="clear"></div>
         </div>
		</div>
		<?php
		include("footer.php");
		?>