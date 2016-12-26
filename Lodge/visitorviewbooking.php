<?php
session_start();
include("header.php");
include("dbconnection.php");
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
               	<h2>VIEW BOOKING DETAILS</h2>
<?php
$sqlviewbilling = "SELECT *  FROM  `billing`  WHERE  `visitor_id` ='$_SESSION[visitid]'";
$querybilling = mysqli_query($dbconnection,$sqlviewbilling);
while( $rsbilling = mysqli_fetch_array($querybilling))
{
?>

<table width="610" border="1" class="tftable">
  <tr>
    <th width="260" scope="row">&nbsp;Bill No</th>
    <td width="334">&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $rsbilling[bill_id]; ?></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;Bill date</th>
    <td>&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $rsbilling[bill_date]; ?></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;Payment type</th>
    <td>&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $rsbilling[payment_type]; ?></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;Paid amount</th>
    <td>&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $rsbilling[paid_amt]; ?></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;Refund</th>
    <td>&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $rsbilling[refund]; ?></td>
  </tr>
    <tr>
    <th scope="row">&nbsp;Status</th>
    <td>&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */
	if($rsbilling[status]=="Enabled")
	{
	echo "Checkin";
	}
	else
	{
	echo $rsbilling[status];	
	}
 ?></td>
  </tr>
</table>
  
<table width="610" height="73" border="8" class="tftable">
  <tr>
    <th width="253" height="53" bgcolor="#660000" scope="col">
     <?php
	if($rsbilling[status] == "Cancelled")
	{
	?>
    <center><a href='visitorviewbookrooms.php?billid=<?php  /*  Download projects from www.freestudentprojects.com */echo $rsbilling[bill_id] ; ?>'><strong><font color="#000000">Cancellation receipt</font></strong></a></center>
    <?php
	}
	else
	{
	?>
    <center><a href='visitorviewbookrooms.php?billid=<?php  /*  Download projects from www.freestudentprojects.com */echo $rsbilling[bill_id] ; ?>'><strong><font color="#000000">Print Billing receipt</font></strong></a></center>
    <?php
	}
	?>    
    </th>
    <th width="327" bgcolor="#660000" scope="col"><center>
    <?php
	if($rsbilling[status] == "Enabled")
	{
	?>
      <a href="visitorcancelbooking.php?billingcanid=<?php  /*  Download projects from www.freestudentprojects.com */echo $rsbilling[bill_id] ; ?>"><strong><font color="#000000">Cancel room booking</font></strong></a>
    <?php
	}
	?>
    </center></th>
    </tr>
</table>
<br />
<hr />
<br />
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

