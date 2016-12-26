<?php
session_start();
include("dbconnection.php");
$dt = date("Y-m-d");

include("header.php");
?>
<?php
if(isset($_POST[checkout]))
{
	$selroombooking ="UPDATE billing SET status='Checkout', refund='$_POST[refund]' where bill_id='$_GET[billid]'";
	if(!mysqli_query($dbconnection,$selroombooking))
	{
		echo mysqli_error($dbconnection);
	}
	
	$selroombooking ="UPDATE room_booking SET status='Checkout' where bill_id='$_GET[billid]'";
	if(!mysqli_query($dbconnection,$selroombooking))
	{
		echo mysqli_error($dbconnection);
	}
?>
		<script type="application/javascript">
			alert("Room checkout request submitted succesfully...");
		</script>
<?php
}
?>
<?php
$selquery="SELECT * from billing where bill_id='$_GET[billid]'";
$sqlquery=mysqli_query($dbconnection,$selquery);
$sqlfetch=mysqli_fetch_array($sqlquery);

$selquery1nam="SELECT * from visitors where visitor_id='$sqlfetch[visitor_id]'";
$sqlquery1nam=mysqli_query($dbconnection,$selquery1nam);
$sqlfetch1nam=mysqli_fetch_array($sqlquery1nam);



$selquery1="SELECT * from room_booking where visitor_id='$visitorid' AND book_date='$dt' AND room_id='$_GET[roomid]'";
$sqlquery1=mysqli_query($dbconnection,$selquery1);
$sqlfetch1=mysqli_fetch_array($sqlquery1);

$_SESSION[setid] = rand(); 

?>
<!-- content -->
		<div id="content">

		  <div class="container">
            <div class="aside maxheight">
            	<!-- box begin -->
               <div class="box maxheight">
               	<div class="inner">
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

<?php
if($rsi ==1)
{
	echo "<br><br><h1 align='center'>Room booked successfully...</h1>";
}
else
{
?>
               	<h2>VIEW BOOKING</h2>


<p><u><strong>Visitor Details :</strong></u></p>
<table width="547" height="33" border="5" class="tftable">
  <tr>
    <th scope="row">Name</th>
    <td><?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch1nam[fname] . " ". $sqlfetch1nam[lname]; ?></td>
  </tr>
  <tr>
    <th width="238" scope="row">Email ID</th>
    <td width="293"> <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch1nam[email_id]; ?></td>
    </tr>
  <tr>
    <th scope="row">Address</th>
    <td> <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch1nam[visit_adrs]; ?></td>
  </tr>
  <tr>
    <th scope="row">Contact No.</th>
    <td><?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch1nam[contact_num]; ?></td>
  </tr>
</table>
<br />
<p><strong><u>Room Details : </u></strong></p>
<table width="618" height="94" border="5" class="tftable">
  <tr>
    <th scope="row">Lodge name</th>
    <th>Room type</th>
    <th>Room Number</th>
    <th>Date</th>
    <th>Room rent</th>
    <th>Advance</th>
    <th>Rent</th>
  </tr>
<?php
$selroombooking ="SELECT * from room_booking WHERE room_booking.bill_id='$_GET[billid]'";
$sqlroombooking = mysqli_query($dbconnection,$selroombooking);
while($rsroombooking =mysqli_fetch_array($sqlroombooking))
{
	$selqueryroom ="SELECT * from rooms INNER JOIN lodges INNER JOIN room_types ON room_types.lodge_id= lodges.lodge_id AND room_types.room_type_id=rooms.room_type_id  where rooms.room_id='$rsroombooking[room_id]'";
	$sqlqueryroom = mysqli_query($dbconnection,$selqueryroom);
	$sqlfetchroom =mysqli_fetch_array($sqlqueryroom);
	$lodgeid = $sqlfetchroom[lodge_id];
?>
    <tr align="center">
        <td width="68" scope="row">&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetchroom[lodge_name]; ?> </th>
        <td width="70">&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetchroom[room_type]; ?></td>
        <td width="54">&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetchroom[room_no]; ?></td>
        <td width="83">
        Checkin : &nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $rsroombooking[checkin_date]; ?>
        Checkout : &nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $rsroombooking[checkout_date]; ?></td>
        <td width="81">&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetchroom[rent]; ?></td>
        <td width="72">&nbsp;
		<?php
        	echo "Rs. ".$sqlfetchroom[advance];
			$startTimeStamp = strtotime($rsroombooking[checkin_date]);
			$endTimeStamp = strtotime($rsroombooking[checkout_date]);
			$timeDiff = abs($endTimeStamp - $startTimeStamp);
			$numberDays = $timeDiff/86400;  // 86400 seconds in one day
			// and you might want to convert to integer
			$numberDays = intval($numberDays);
			$tdays = $numberDays+1;
         ?></td>
        <td width="136">&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */
		echo "Rs. $sqlfetchroom[advance] X $tdays = Rs. ". $advamt = $sqlfetchroom[advance]*$tdays;
		$totalamt = $totalamt +$advamt;
		$totalrentamt = $totalrentamt + $sqlfetchroom[rent];
		 ?></td>
      </tr>
<?php
}

?>
      <tr align="center">
        <td colspan="6" scope="row"><strong>Total advance amount 
        </strong>
        </td>
        <td scope="row" colspan="2">  
          <strong>Rs. <?php  /*  Download projects from www.freestudentprojects.com */echo $totalamt; ?>      
          </strong>
          </td>
          </tr>
        <tr align="center">
        <td colspan="6" scope="row"><strong>Total Rent amount 
        </strong>
        </td>
        <td scope="row" colspan="2">  
          <strong>Rs. <?php  /*  Download projects from www.freestudentprojects.com */echo $totalrentamt; ?>      
          </strong>
          </td>
          </tr>
       
       <tr align="center">
        <td colspan="6" scope="row"><strong>Refund
        </strong>
        </td>
        <td scope="row" colspan="2">  
          <strong>Rs. <?php  /*  Download projects from www.freestudentprojects.com */echo $refund = $totalamt - $totalrentamt; ?>      
          </strong>
          </td>
          </tr>
  </table>
<br />
<?php
$selroombooking1 ="SELECT * from billing WHERE bill_id='$_GET[billid]'";
$sqlroombooking1 = mysqli_query($dbconnection,$selroombooking1);
$rsroombooking1 =mysqli_fetch_array($sqlroombooking1);
?>
<p><u><strong>Payment Details : </strong></u></p>
<table width="547" height="115" border="5" class="tftable">
  <tr>
    <th height="31" scope="row">Total amount</th>
    <td>&nbsp;Rs. <?php  /*  Download projects from www.freestudentprojects.com */echo $totalamt; ?></td>
  </tr>
  <tr>
    <th height="26" scope="row">Payment Type</th>
    <td>&nbsp;
    
    <?php  /*  Download projects from www.freestudentprojects.com */echo $rsroombooking1[payment_type]; ?>
    
    </td>
  </tr>
  <tr>
    <th height="50" colspan="3" scope="row">
    <form method="post" action="" name="form1">
    <input type="hidden" name="refund" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $refund; ?>" />
<?php
if($rsroombooking1[status] == 'Enabled')
{
?>
      &nbsp;<center><input type="submit" name="checkout" value="Checkout" /></center>
<?php
}
else
{
	?>
   <center> <button onclick="myFunction()">Print this page</button></center>
	<?php
    echo "<center>Status - ".$rsroombooking1[status] . "</center>" ;
}
?>
</form>
<script>
function myFunction()
{
window.print();
}
</script>
    </tr>
</table>
</form>
<?php
}
?>

</div>
            </div>
            <div class="clear"></div>
         </div>
		</div>
<?php
include("footer.php")
?>