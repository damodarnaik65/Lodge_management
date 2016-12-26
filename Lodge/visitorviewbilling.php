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
               	<h2>VIEW BILLING DETAILS</h2>
<table width="610" height="112" border="8" class="tftable">
  <tr>
    <th scope="col" bgcolor="#660000">Bill ID</th>
    <th scope="col" bgcolor="#660000">Bill date</th>
    <th scope="col" bgcolor="#660000">Payment type</th>
    <th scope="col" bgcolor="#660000">Paid amount</th>
    <th scope="col" bgcolor="#660000">Refund</th>
    <th scope="col" bgcolor="#660000">Status</th>
  </tr>
<?php
$sqlviewbilling = "SELECT *  FROM  `billing`  WHERE  `visitor_id` ='$_SESSION[visitid]'";
$querybilling = mysqli_query($dbconnection,$sqlviewbilling);
while( $rsbilling = mysqli_fetch_array($querybilling))
{
echo "  <tr>
    <td>&nbsp;$rsbilling[bill_id]</td>
	<td>&nbsp;$rsbilling[bill_date]</td>
    <td>&nbsp;$rsbilling[payment_type]</td>
    <td>&nbsp;$rsbilling[paid_amt]</td>
    <td>&nbsp;$rsbilling[refund]</td>
    <td>&nbsp;";
	if($rsbilling[status]=="Enabled")
	{
	echo "Checkin";
	}
	else
	{
	echo $rsbilling[status];	
	}
echo " </td>  </tr>" ;
}
?>
</table>
 </div>
            </div>
            <div class="clear"></div>
         </div>
		</div>
		<?php
		include("footer.php")
		?>

