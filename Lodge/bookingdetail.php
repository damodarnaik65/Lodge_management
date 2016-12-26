<?php
session_start();
include ("dbconnection.php");
$sqlviewbill="SELECT count(room_booking.booking_id),billing.*,room_booking.*,visitors.* from billing INNER JOIN room_booking INNER JOIN visitors ON billing.bill_id=room_booking.bill_id AND visitors.visitor_id=billing.visitor_id where billing.bill_id=1";
$lodgequery=mysqli_query($dbconnection,$sqlviewbill);
$sqlfetch=mysqli_fetch_array($lodgequery);
?>

<form>
  <div align="center">
    <table width="614" height="406" border=2 class="tftable">
      <tr>
        <th colspan="4"><h2 align="center">RECEIPT </h2></th>
      </tr>
      <tr>
        <th colspan="2" width="249" height="35" align="left" >&nbsp; &nbsp; Bill No. :<?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[bill_id]; ?> </th>
        <th colspan="2" width="255" align="left">&nbsp; &nbsp; Email-ID : <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[email_id]; ?></th>
      </tr>
  <th colspan="2"  height="36" align="left">&nbsp; &nbsp; Name :  <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[fname]. " " . $sqlfetch[lname]; ?></th>
    <th colspan="2"  align="left">&nbsp; &nbsp; Contact No : <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[contact_num]; ?></th>
  </tr>
  <th colspan="2"  align="left">&nbsp; &nbsp; Address: <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[visit_adrs]; ?></th>
    <th colspan="2"  align="left">&nbsp; &nbsp; Mobile No : <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[mobile_no]; ?></th>
  </tr>
  <th colspan="2"  height="33" align="left">&nbsp; &nbsp; Check In Date : <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[checkin_date]; ?></th>
    <th colspan="2"  align="left" >&nbsp; &nbsp; Check Out Date : <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[checkout_date]; ?></th>
  </tr>
  <tr>
    <th colspan="2"  height="33" align="left">&nbsp; &nbsp; No. of rooms: <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[0]?></th>
     <th colspan="2"  align="left">&nbsp; &nbsp;Bill Date: <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[bill_date]?></th>
  </tr>
  
  <tr>
    <th height="24" colspan="4" align="left" valign="bottom">&nbsp;</th>
    </tr>
  <tr>
    <td height="32" colspan="4" align="left">
    <strong>Room Booking details: </strong>
    <table width="602" height="107" border="2" class="tftable">
      <tr>
        <th width="120" height="31" align="left">&nbsp; Lodge Name</th>
		<th width="120" height="31" align="left">&nbsp; Room Type</th>        
        <th width="129" align="left">&nbsp; Room No</th>
        <th width="142" align="left">&nbsp; Paid Ammount</th>
      </tr>
<?php
$sqlviewbill1="SELECT room_booking.*,lodges.*,rooms.*,room_types.* from room_booking INNER JOIN lodges INNER JOIN rooms INNER JOIN room_types ON room_booking.room_id=rooms.room_id AND room_types.room_type_id=rooms.room_type_id AND room_types.lodge_id=lodges.lodge_id where room_booking.bill_id=1";
$lodgequery1=mysqli_query($dbconnection,$sqlviewbill1);
$sqlfetch1=mysqli_fetch_array($lodgequery1);
?>
      <tr>
        <td height="32" align="left">&nbsp; <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch1[lodge_name]; ?></td>
        <td align="left">&nbsp; <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch1[room_type]; ?></td>
        <td align="left">&nbsp; <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch1[room_no]; ?></td>
        <td align="left">&nbsp; Rs. <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch1[advance]; ?></td>
      </tr>
      <tr>
        <td height="32" colspan="2" align="left">&nbsp;</td>
        <td align="left">&nbsp; &nbsp; <strong>Total : </strong></td>
        <td align="left">&nbsp;&nbsp;&nbsp;Rs. <?php  /*  Download projects from www.freestudentprojects.com */echo $sqlfetch[paid_amt]; ?></td>
      </tr>
      
    </table></td>
  </tr>
    <tr>
    <th height="31" colspan="4" align="left">&nbsp;</th>
    </tr>
    </table>
    <p>&nbsp;</p>
  </div>
</form>