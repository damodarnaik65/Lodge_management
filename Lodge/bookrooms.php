<?php
session_start();
include("dbconnection.php");
$dt = date("Y-m-d");
if(isset($_SESSION[empid]))
{
		//header("Location: visitlogin.php?roomid=$_GET[roomid]&fdate=$_GET[fdate]&tdate=$_GET[tdate]&setid=$_GET[setid]");
}
else
{
	if(!isset($_SESSION[visitid]))
	{
		header("Location: visitlogin.php");
	}
}

if(isset($_GET[delid]))
{
	$sqlupd="DELETE FROM room_booking WHERE  booking_id='$_GET[delid]'";
	$result=mysqli_query($dbconnection, $sqlupd);	
}




if($_GET[visitorid] !="")
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

if(isset($_POST[btnsubmit]))
{
	if(isset($_SESSION[visitid]))
	{
		$visitorid = $_SESSION[visitid];
	}
	else
	{
		$visitorid = $_GET[visitorid];		
	}
	echo $_SESSION[billingid]. " ". $_POST[billingid];
	$expdate = $_POST[expire]. "-01";
	if($_SESSION[billingid] == $_POST[billingid])
	{
		$sqlins="INSERT INTO  billing(visitor_id,bill_date,payment_type,expire_date,cardno,paid_amt,refund,status)
		VALUES('$visitorid','$dt','$_POST[paymenttype]','$expdate','$_POST[cardnumber]','$_POST[paidamt]','0','Enabled')";
		$result=mysqli_query($dbconnection, $sqlins);	
		
		$storeins=mysqli_insert_id($dbconnection);
		if($storeins != 0)
		{
		$sqlupd="UPDATE  room_booking SET  status =  'Booked',bill_id='$storeins' WHERE  visitor_id='$visitorid' AND bill_id='0'";
		$result=mysqli_query($dbconnection, $sqlupd);	
		$rs ="Billing record inserted successfully...";
		
		$rsi =1;
		}
	}
	else
	{
		if(isset($_SESSION[visitid]))
		{
			header("Location: visitorviewbooking.php");
		}
		
		if(isset($_SESSION[empid]))
		{
			header("Location: billingrecord.php");
		}
	}
	
}
$_SESSION[billingid] = rand();
//echo $_SESSION[setid] . " - ".$_GET[setid];
if(isset($_GET[roomid]))
{
	if($_GET[roomid] != 0)
	{
		if($_SESSION[bookid] == $_GET[setid])
		{
			$selquery1="SELECT * from room_booking where visitor_id='$visitorid' AND book_date='$dt' AND room_id='$_GET[roomid]'";
			$sqlquery1=mysqli_query($dbconnection,$selquery1);
			$sqlfetch1=mysqli_fetch_array($sqlquery1);
			if(mysqli_num_rows($sqlquery1) == 0)
			{
				$sqlinss = "INSERT INTO room_booking(bill_id,room_id,visitor_id,book_date,checkin_date,checkout_date,status) values('0','$_GET[roomid]','$visitorid','$dt','$_GET[fdate]','$_GET[tdate]','Disabled')";
				$result=mysqli_query($dbconnection, $sqlinss);
			}
		$_SESSION[bookid] = rand();
		}
	}
	
}


$_SESSION[setid] = rand(); 

include("header.php");
?>
<!-- content -->
		<div id="content">

		  <div class="container">
            <div class="aside maxheight">
            	<!-- box begin -->

                    <?php  /*  Download projects from www.freestudentprojects.com */
					include("leftsidebar.php");
					?>

               <!-- box end -->
            </div>
            <div class="content">
            	<div class="indent">

<?php
if($rsi ==1)
{
	echo "<br><br><h1 align='center'>Room booked successfully...</h1><hr>";
	echo "<a href='visitorviewbookrooms.php?billid=$storeins'><h3 align='center'>Click here to print receipt</h3></a>";
	if(isset($_SESSION[empid]))
	{
	echo "<br><br><h1 align='center'><a href='bookroom.php'><u>Book another room...</a></h1>";
	}		
}
else
{
?>
               	<h2>VIEW BOOKING</h2>

<form method="post" action="" name="form1">
<input type="hidden" name="billingid" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $_SESSION[billingid]; ?>" />
<p><u><strong>Visitor Details :</strong></u></p>
<table width="599" height="33" border="5" class="tftable">
  <tr>
    <th scope="row">Name</th>
    <td><?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[fname] . " ". $sqlfetch[lname]; ?></td>
  </tr>
  <tr>
    <th width="269" scope="row">Email ID</th>
    <td width="318"> <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[email_id]; ?></td>
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
    <th scope="row"><dl>
      <dt>Lodge name</dt>
    </dl></th>
    <th width="147"><dl>
      <dt>Room details</dt>
    </dl></th>
    <th>Date</th>
    <th>Tariff</th>
    <th colspan="2">Rent</th>
  </tr>
<?php
$selroombooking ="SELECT * from room_booking WHERE book_date='$dt' AND  visitor_id='$visitorid' AND room_booking.status='Disabled'";
$sqlroombooking = mysqli_query($dbconnection,$selroombooking);
while($rsroombooking =mysqli_fetch_array($sqlroombooking))
{
	$selqueryroom ="SELECT * from rooms INNER JOIN lodges INNER JOIN room_types ON room_types.lodge_id= lodges.lodge_id AND room_types.room_type_id=rooms.room_type_id  where rooms.room_id='$rsroombooking[room_id]'";
	$sqlqueryroom = mysqli_query($dbconnection,$selqueryroom);
	$sqlfetchroom =mysqli_fetch_array($sqlqueryroom);
	$lodgeid = $sqlfetchroom[lodge_id];
?>
    <tr align="center">
        <td width="88" scope="row">&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetchroom[lodge_name]; ?> </th>
        <td align="left">&nbsp;<strong>Room type:</strong> <br />          <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetchroom[room_type]; ?><br />
          <strong>Room Number: </strong>&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetchroom[room_no]; ?>&nbsp;</td>
        <td width="109" align="left"><strong>CheckIn Date:</strong>&nbsp;<br />          <?php  /*  Download projects from www.freestudentprojects.com */echo $rsroombooking[checkin_date]; ?><br />
          <strong>Checkout date: </strong><br />          <?php  /*  Download projects from www.freestudentprojects.com */echo $rsroombooking[checkout_date]; ?><br /></td>
        <td width="100" align="left"><strong>Room rent:<br />
        </strong>Rs. <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetchroom[rent]; ?><br />
          <strong>          Advance:<br />
          </strong>          <?php
        	echo "Rs. ".$sqlfetchroom[advance];
			$startTimeStamp = strtotime($rsroombooking[checkin_date]);
			$endTimeStamp = strtotime($rsroombooking[checkout_date]);
			$timeDiff = abs($endTimeStamp - $startTimeStamp);
			$numberDays = $timeDiff/86400;  // 86400 seconds in one day
			// and you might want to convert to integer
			$numberDays = intval($numberDays);
			$tdays = $numberDays+1;
         ?></td>
        <td width="115">&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */
		echo "Rs. $sqlfetchroom[advance] X $tdays = Rs. ". $advamt = $sqlfetchroom[advance]*$tdays;
		$totalamt = $totalamt +$advamt;
		$totalrentamt = $totalrentamt + $sqlfetchroom[rent];
		 ?></td>
        <td width="11"><a href="bookrooms.php?delid=<?php  /*  Download projects from www.freestudentprojects.com */echo $rsroombooking[booking_id]; ?>">X</a></td>
      </tr>
<?php
}
?>
      <tr align="center">
        <td colspan="4" scope="row"><strong>Total advance amount 
          </strong>
          </td>
        <td scope="row" colspan="3">  
          <strong>Rs. <?php  /*  Download projects from www.freestudentprojects.com */echo $totalamt; ?>      
            </strong>
          </td>
      </tr>
        <tr align="center">
          <td colspan="7" scope="row"><strong>&nbsp; 
  <a href='viewlodgerooms.php?lodgeid=<?php  /*  Download projects from www.freestudentprojects.com */echo $lodgeid; ?>&fdate=<?php  /*  Download projects from www.freestudentprojects.com */echo $_GET[fdate]; ?>&tdate=<?php  /*  Download projects from www.freestudentprojects.com */echo $_GET[tdate]; ?>&visitorid=<?php  /*  Download projects from www.freestudentprojects.com */echo $_GET[visitorid] ; ?>&submit=Search+rooms'>Book another room &gt;&gt;</a>
</strong>        </tr>
  </table>
<br />
<p><u><strong>Payment Details : </strong></u></p>
<table width="547" height="204" border="5" class="tftable">
  <tr>
    <th scope="row">Total amount</th>
    <td>&nbsp;Rs. <?php  /*  Download projects from www.freestudentprojects.com */echo $totalamt; ?>
    <input type="hidden" name="paidamt" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $totalamt; ?>" />
    </td>
  </tr>
  <tr>
    <th scope="row">Payment Type</th>
    <td>&nbsp;<select name="paymenttype">
      <option value="Select">Select</option>
      <?php
	  if(isset($_SESSION[empid]))
		{
	  ?>
      <option value="Cash">Cash</option>
      <?php
		}
	?>
      <option value="Credit card">Credit Card</option>
      <option value="Debit card">Debit Card</option>
      <option value="VISA">VISA</option>
      <option value="Master card">Master card</option>
    </select></td>
  </tr>
  <tr>
    <th scope="row">Expiry date</th>
    <td>&nbsp;<input type="month" name="expire"  size="35" /></td>
  </tr>
  <tr>
    <th width="216" scope="row">Card  Number</th>
    <td width="272">&nbsp;<input type="text" name="cardnumber" size="35"  /></td>
  </tr>
  <tr>
    <th height="50" colspan="3" scope="row">
      &nbsp;<input type="submit" name="btnsubmit" value="Make Payment"  size="35" />
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