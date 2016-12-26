<?php
session_start();
if(!isset($_SESSION[empid]))
{
	header("Location: loginpage.php");
} 
include("header.php");
?>
<?php
include ("dbconnection.php");
if(isset($_POST[booking]))
{
$sqlin="INSERT INTO room_booking(bill_id,room_id,visitor_id,book_date,checkin_date,checkout_date,status) values('','','','','','','')";
$result=mysqli_query($dbconnection, $sqlin);
}
		
$sqlviewbooking="SELECT rooms.*,room_types.* ,lodges.* from rooms INNER JOIN room_types INNER JOIN lodges ON rooms.room_type_id=room_types.room_type_id where rooms.room_id='68' ";
$query=mysqli_query($dbconnection,$sqlviewbooking);
$sqlfetch=mysqli_fetch_array($query);
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
               	<h2>Lodge Details</h2>
<form>

<table width="359" height="383" border="1">
  <tr>
    <th width="180" scope="col">Lodge Name</th>
    <th width="163" scope="col"><?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[lodge_name]; ?></th>
  </tr>
  <tr>
    <th height="71">Room Number</th>
    <td> <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[room_no]; ?></td>
  </tr>
  <tr>
    <th height="79">Room Type</th>
    <td><?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[room_type]; ?></td>
  </tr>
  <tr>
    <th height="91">Image</th>
    <td > <img src="uploads/<?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[room_image]?>"  width="70" height="70" class="img-indent png alt" align='center' /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type=submit name="booking" value="BOOK ROOM" class="fsSubmitButton"></td>
  </tr>
  
</table>
</form>
</div>
            </div>
            <div class="clear"></div>
         </div>
		</div>
		<?php
		include("footer.php")
		?>