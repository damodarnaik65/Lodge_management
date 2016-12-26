<?php
session_start();
	if(!isset($_SESSION[empid]))
	{
	header("Location: loginpage.php");
	}
include("header.php");
include ("dbconnection.php");
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
$sqlviewbill="SELECT billing.*,visitors.*,room_booking.*, rooms.* from billing INNER JOIN visitors INNER JOIN room_booking INNER JOIN rooms INNER JOIN room_types  ON billing.visitor_id=visitors.visitor_id AND rooms.room_id =room_booking.room_id AND room_types.room_type_id=rooms.room_type_id LIMIT $startpage,$noofrows";
$lodgequery=mysqli_query($dbconnection,$sqlviewbill);
$sqlfetch=mysqli_fetch_array($lodgequery);
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
<form>
  <p>Lodge Name :
    <select name=sl>
     <?php
				  $sql = "SELECT * from lodges where status='Enabled'";
				  $qresult = mysqli_query($dbconnection,$sql);
				  while($rs = mysqli_fetch_array($qresult))
				  {
				  echo "<option value='$rs[lodge_id]'>$rs[lodge_name]</option>";
				  }
				  ?>
    </select><br><br>
    Start Date :
    <input type=date name="startdate">
  </p>
  
  <p>End Date :
    <input type=date name="enddate">
  </p>
  <table width="602" height="90" border="1" class="tftable">
    <tr>
     <th width="89" height="42" scope="row"><strong>Bill No.</strong></th>
      <th width="91" scope="row"><strong>Date</strong></th>
      <td width="89"><strong>Visitor Details</strong></td>
      <td width="104"><strong>Paid Ammount </strong></td>
      <td width="124"><strong> Refund</strong></td>
      <td width="80"><strong> Action</strong></td>
    </tr>
    <tr>
      <th scope="row">&nbsp; <?php  /*  Download projects from www.freestudentprojects.com */
	  echo $sqlfetch[bill_id]; ?></th>
      <td>&nbsp; <?php  /*  Download projects from www.freestudentprojects.com */ 
	  echo $sqlfetch[bill_date]; ?></td>
      <td>&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */
	  echo $sqlfetch[fname] . " ". $sqlfetch[lname]; ?></td>
      <td>&nbsp;Rs. <?php  /*  Download projects from www.freestudentprojects.com */
	  echo $sqlfetch[paid_amt]; ?></td>
      <td>&nbsp;Rs. <?php  /*  Download projects from www.freestudentprojects.com */
	  echo $sqlfetch[refund]; ?></td>
      <td>&nbsp;<a href="viewbillingdetail.php">View</a></td>
    </tr>
  </table>
   <table width="602" border="1">
  <tr>
    <th height="34" scope="col" bgcolor="#660000">
    <?php
	if( $startpage!= "0")
	{
		if(isset($_GET[lodgename]))
		{
    		echo "<a href='Billingdetails.php?lodgename=$_GET[lodgename]&startpage=$previousrecord'><img src='images/adminicons/Previous.png' width=40 height=40 /></a> Previous";
		}
		else
		{
    		echo "<a href='Billingdetails.php?startpage=$previousrecord'><img src='images/adminicons/Previous.png' width=40 height=40 /> </a> Previous";
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
	if( $noofrows <= mysqli_num_rows($lodgequery) )
	{
		if(isset($_GET[lodgename]))
		{
    		echo "Next  <a href='Billingdetails.php?lodgename=$_GET[lodgename]&startpage=$nextrecord'><img src='images/adminicons/Next.png' width=40 height=40 /></a>";
		}
		else
		{
    		echo "Next  <a href='Billingdetails.php?startpage=$nextrecord'><img src='images/adminicons/Next.png' width=40 height=40 /></a>";
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

</form>
</div>
            </div>
            <div class="clear"></div>
         </div>
		</div>
		<?php
		include("footer.php")
		?>