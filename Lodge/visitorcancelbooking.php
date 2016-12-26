<?php
session_start();
include("dbconnection.php");
$dt = date("Y-m-d");

include("header.php");

if(isset($_GET[visitorid]))
{
	$selquery="SELECT * from visitors where visitor_id='$_GET[visitorid]'";
	$visitorid = $_GET[visitorid];
}
else
{
	$selquery="SELECT * from visitors where visitor_id='$_SESSION[visitid]'";	
	$visitorid = $_SESSION[visitid];
}
$sqlquery=mysqli_query($dbconnection,$selquery);
$sqlfetch=mysqli_fetch_array($sqlquery);

if(isset($_POST[btncancel]))
{
	$expdate = $_POST[expire]. "-01";
	
	$storeins=mysqli_insert_id($dbconnection);
 
	$sqlupd="UPDATE  billing SET refund='$_POST[refundamt]', status =  'Cancelled'  WHERE  bill_id='$_POST[billingid]'";
	$result=mysqli_query($dbconnection, $sqlupd);	
	
	$sqlupd="UPDATE  room_booking SET  status =  'Cancelled' WHERE  bill_id='$_POST[billingid]'";
	$result=mysqli_query($dbconnection, $sqlupd);	
	$rsmsg ="Booking record cancelled successfully...";
	$rsi =1;
}

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
						include("visitorsidebar.php");
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
	echo $rsmsg;
}
else
{
?>
               	<h2>VIEW BOOKING DETAILS</h2>

<form method="post" action="" name="form1">
<p><u><strong>Visitor Details :</strong></u></p>
<table width="547" height="33" border="5" class="tftable">
  <tr>
    <th scope="row">Name</th>
    <td><?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[fname] . " ". $sqlfetch[lname]; ?></td>
  </tr>
  <tr>
    <th width="238" scope="row">Email ID</th>
    <td width="293"> <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[email_id]; ?></td>
    </tr>
  <tr>
    <th scope="row">Address</th>
    <td> <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[visit_adrs]; ?></td>
  </tr>
  <tr>
    <th scope="row">Contact No.</th>
    <td><?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[contact_num]; ?></td>
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
$selroombooking ="SELECT * from room_booking WHERE bill_id='$_GET[billingcanid]'";
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
        <td colspan="6" scope="row"><strong>Total cancellation charge (25% deduction)
        </strong>
        </td>
        <td scope="row" colspan="2">  
          <strong>Rs. <?php  /*  Download projects from www.freestudentprojects.com */echo $totcan = ($totalamt * 25) / 100; ?>      
          </strong>
          </td>
          </tr>
       
       <tr align="center">
        <td colspan="6" scope="row"><strong>Refund amount
        </strong>
        </td>
        <td scope="row" colspan="2">  
          <strong>Rs. <?php  /*  Download projects from www.freestudentprojects.com */echo $totrefund = $totalamt - $totcan; ?>      
          </strong>
          </td>
          </tr>

<?php
$selroombooking1 ="SELECT * from billing WHERE bill_id='$_GET[billingcanid]'";
$sqlroombooking1 = mysqli_query($dbconnection,$selroombooking1);
$rsroombooking1 =mysqli_fetch_array($sqlroombooking1);
?>
  <tr>
    <th height="31" scope="row" colspan="6">Total amount</th>
    <td>&nbsp;<strong>Rs. <?php  /*  Download projects from www.freestudentprojects.com */echo $totrefund; ?></strong></td>
  </tr>

  <tr>
    <td height="50"  colspan="7" scope="row"><center>
    <input type="hidden" name="billingid" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $_GET[billingcanid]; ?>" />
    <input type="hidden" name="refundamt" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $totrefund; ?>"  />
    <input type="submit" name="btncancel" value="Confirm cancellation" class="fsSubmitButton" />
    
    </center>
      </td>
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