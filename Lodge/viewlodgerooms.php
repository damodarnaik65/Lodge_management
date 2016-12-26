<?php
session_start();
include("header.php");
include("dbconnection.php");

$lodgedetail="SELECT * from lodges where lodge_id='$_GET[lodgeid]'";
$lodgequery=mysqli_query($dbconnection,$lodgedetail);
$sqlfetchlodge=mysqli_fetch_array($lodgequery);

$selroomtype="SELECT * from room_types where lodge_id=$_GET[lodgeid]";
$roomquery=mysqli_query($dbconnection,$selroomtype);

if(isset($_GET[roomtypeid]))
{
$selnorooms="SELECT rooms.*,room_types.* from rooms INNER JOIN room_types  ON rooms.room_type_id= room_types.room_type_id where room_types.lodge_id='$_GET[lodgeid]' AND rooms.room_type_id='$_GET[roomtypeid]' ";
}
else
{
$selnorooms="SELECT rooms.*,room_types.* from rooms INNER JOIN room_types  ON rooms.room_type_id= room_types.room_type_id where room_types.lodge_id='$_GET[lodgeid]'";
}

$noofroomsquery=mysqli_query($dbconnection,$selnorooms);

$_SESSION[setid] = rand(); 

$_SESSION[bookid] = rand();

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
						<a href='viewlodgerooms.php?fdate=$_GET[fdate]&tdate=$_GET[tdate]&lodgeid=$_GET[lodgeid]&roomtypeid=$sqlroomfetch[room_type_id]'><strong>$sqlroomfetch[room_type]</strong><br><img src='uploads/$sqlroomfetch[image]' height='75' width='150'></img><br>
						</a><br><hr>";
				   }
         ?>
               	</div>
               </div>
               <!-- box end -->
            </div>
            <div class="content">
            	<div class="indent">
               	
                  
                  
          
    <div class="gallery">
    <h3>Lodge name: <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetchlodge[lodge_name]; ?></h3>
      <form method="get" action="">
      <input type="hidden" name="visitorid" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $_GET[visitorid]; ?>" />
      <table width="609" height="46" border="1" class="tftable">
   <tr>
   <td width="121">

		<input type="hidden" name="lodgeid" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $_GET[lodgeid]; ?>" />
      <strong> Select date : </strong></td>
   <td width="320">From: 
     <input type="date" name="fdate" min="<?php  /*  Download projects from www.freestudentprojects.com */echo date("Y-m-d"); ?>" />  
     To
     <input type="date" name="tdate"  min="<?php  /*  Download projects from www.freestudentprojects.com */echo date("Y-m-d"); ?>"  />   <input name="submit" type="submit" value="Search rooms" /></td>
    </tr>
    </table> 
    </form>
    <?php
	if(isset($_GET[fdate]))
	{
		$fdate = $_GET[fdate];
		$tdate = $_GET[tdate];
	}
	else
	{
		$fdate = date("Y-m-d");
		$tdate = date("Y-m-d");
	}
	?>
    <br />
    <h3>Date : From <?php  /*  Download projects from www.freestudentprojects.com */echo $fdate; ?> to <?php  /*  Download projects from www.freestudentprojects.com */echo $tdate; ?></h3>
    
            <ul>
            <?php
while($sqlfetch=mysqli_fetch_array($noofroomsquery))
	{
		$selnoroomsavailable="SELECT * FROM  room_booking WHERE  room_id ='$sqlfetch[room_id]' AND ( '$fdate' BETWEEN  checkin_date 
AND  checkout_date) AND ( '$tdate' BETWEEN  checkin_date 
AND  checkout_date) ";
		$sqlquery = mysqli_query($dbconnection,$selnoroomsavailable);
		if(mysqli_num_rows($sqlquery) !=1)
		{
			if(isset($_SESSION[visitid]) || $_GET[visitorid] != "")
			{
			echo "<li>
			<a href='bookrooms.php?roomid=$sqlfetch[room_id]&fdate=$fdate&tdate=$tdate&setid=$_SESSION[bookid]&visitorid=$_GET[visitorid]'>
			<p align='center'><br />
			<a href='bookrooms.php?roomid=$sqlfetch[room_id]&fdate=$fdate&tdate=$tdate&setid=$_SESSION[bookid]&visitorid=$_GET[visitorid]'>
			<font color='#FFFF00'>$sqlfetch[room_type]</font>
			<br /><br />
			<a href='bookrooms.php?roomid=$sqlfetch[room_id]&fdate=$fdate&tdate=$tdate&setid=$_SESSION[bookid]&visitorid=$_GET[visitorid]'>
			<font color='#FFFF00' size='+3'>$sqlfetch[room_no]</font></p></a></li>";	
			}
			else
			{
			echo "<li>
			<a href='visitlogin.php?roomid=$sqlfetch[room_id]&fdate=$fdate&tdate=$tdate&setid=$_SESSION[bookid]&visitorid=$_GET[visitorid]'>
			<p align='center'><br />
			<a href='visitlogin.php?roomid=$sqlfetch[room_id]&fdate=$fdate&tdate=$tdate&setid=$_SESSION[bookid]&visitorid=$_GET[visitorid]'>
			<font color='#FFFF00'>$sqlfetch[room_type]</font>
			<br /><br />
			<a href='visitlogin.php?roomid=$sqlfetch[room_id]&fdate=$fdate&tdate=$tdate&setid=$_SESSION[bookid]&visitorid=$_GET[visitorid]'>
			<font color='#FFFF00' size='+3'>$sqlfetch[room_no]</font></p></a></li>";	
			}
		}
							 
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