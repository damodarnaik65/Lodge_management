<?php
session_start();
if(!isset($_SESSION[empid]))
{
	header("Location: loginpage.php");
} 
include("header.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sqldelroombook = "DELETE FROM room_booking where booking_id='$_GET[delid]'";
	$qrydel = mysqli_query($dbconnection,$sqldelroombook);
		if(!$qrydel)
		{
			echo "Unable to delete record";
		}
		else
		{
			echo "Record deleted successfully...";
		}
}
if(isset($_GET[startpage]))
{
	$startpage = $_GET[startpage];
}
else
{
$startpage = 0;
}
$noofrows =10;
$nextrecord = $startpage + $noofrows ;
$previousrecord = $startpage - $noofrows;
$sqlviewbooking = "SELECT room_booking.*,visitors.fname,visitors.lname,rooms.room_no,billing.bill_id  from room_booking  INNER JOIN visitors INNER JOIN rooms  INNER JOIN billing ON 	billing.visitor_id=visitors.visitor_id and rooms.room_id=room_booking.room_id  LIMIT $startpage,$noofrows";
$viewquery = mysqli_query($dbconnection,$sqlviewbooking);
?>
<!-- content -->
		<div id="content">

		  <div class="container">
            <div class="aside maxheight">
            	<!-- box begin -->
               <div class="box maxheight">
               	<div class="inner">
                  	<h3>Menu</h3>
                     <div class="gallery-images">
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
               	<h2>VIEW BOOKING</h2>
<table width="610" height="112" border="8" class="tftable">
  <tr>
    <th scope="col" bgcolor="#660000">Visitor name</th>
    <th scope="col" bgcolor="#660000">Room number</th>
    <th scope="col" bgcolor="#660000">Book_date</th>
    <th scope="col" bgcolor="#660000">Checkin_date</th>
    <th scope="col" bgcolor="#660000">Checkout_date</th>
    <th scope="col" bgcolor="#660000">Status</th>
     <th scope="col" bgcolor="#660000">Action</th>
  </tr>
  <?php
  while($rs = mysqli_fetch_array($viewquery))
  {
echo "  <tr>
    <td>&nbsp;$rs[fname] $rs[lname]</td>
	<td>&nbsp;$rs[room_no]</td>
    <td>&nbsp;$rs[book_date]</td>
    <td>&nbsp;$rs[checkin_date]</td>
    <td>&nbsp;$rs[checkout_date]</td>
    <td>&nbsp;$rs[status]</td>
	<td><a href='viewbooking.php?delid=$rs[booking_id]'>delete</td>
    
  </tr>" ;
  }
  ?>
   <table width="610" border="1">
  <tr>
    <th height="34" scope="col" bgcolor="#660000">
    <?php
	if( $startpage!= "0")
	{
		if(isset($_GET[lodgename]))
		{
    		echo "<a href='viewbooking.php?lodgename=$_GET[lodgename]&startpage=$previousrecord'><img src='images/adminicons/Previous.png' width=40 height=40 /></a> Previous";
		}
		else
		{
    		echo "<a href='viewbooking.php?startpage=$previousrecord'><img src='images/adminicons/Previous.png' width=40 height=40 /> </a> Previous";
		}
	}
	else
	{
		echo "<img src='images/adminicons/Previous.png' width=40 height=40 /> Previous";
	}
	?>
        </th>
    <th scope="col">&nbsp;</th>
    <th scope="col" bgcolor="#660000">
    <?php
	if( $noofrows <= mysqli_num_rows($viewquery) )
	{
		if(isset($_GET[lodgename]))
		{
    		echo "Next  <a href='viewbooking.php?lodgename=$_GET[lodgename]&startpage=$nextrecord'><img src='images/adminicons/Next.png' width=40 height=40 /></a>";
		}
		else
		{
    		echo "Next  <a href='viewbooking.php?startpage=$nextrecord'><img src='images/adminicons/Next.png' width=40 height=40 /></a>";
		}
	}
	else
	{
		echo "Next  <img src='images/adminicons/Next.png' width=40 height=40 />";
	}
	?>&nbsp;
    </th>
  </tr>
</table>
</table>
 </div>
            </div>
            <div class="clear"></div>
         </div>
		</div>
		<?php
		include("footer.php")
		?>

