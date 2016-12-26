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
					include("adminmenu.php");
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
$sqlviewbilling = "SELECT *  FROM  `billing` order by bill_id desc ";
$querybilling = mysqli_query($dbconnection,$sqlviewbilling);
while( $rsbilling = mysqli_fetch_array($querybilling))
{
	$sqlname = "SELECT *  FROM  visitors where visitor_id='$rsbilling[visitor_id]' ";
	$qname = mysqli_query($dbconnection,$sqlname);
	$rsname = mysqli_fetch_array($qname);
?>

<table width="391" border="1" class="tftable">
  <tr>
    <th width="151" scope="row">&nbsp;Bill No</th>
    <td width="224">&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */
	echo $rsbilling[bill_id]; ?></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;Bill date</th>
    <td>&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $rsbilling[bill_date]; ?></td>
  </tr>
  <tr>
    <th scope="row">Customer name</th>
    <td>&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $rsname[fname] . " " .$rsname[lname]  ; ?></td>
  </tr>
  <tr>
    <th scope="row">Contact number</th>
    <td>&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $rsname[contact_num]; ?></td>
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
    <tr>
      <th colspan="2" scope="row"><center><a href='checkoutrooms.php?billid=<?php  /*  Download projects from www.freestudentprojects.com */echo $rsbilling[bill_id]; ?>'>View room booking</a></center>        <center>
        </center></th>
      </tr>
</table>
<br /><hr /><br />
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

