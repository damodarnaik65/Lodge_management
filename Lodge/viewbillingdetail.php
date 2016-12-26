<?php
session_start();
include("dbconnection.php");

if(!isset($_SESSION[empid]))
{
	header("Location: loginpage.php");
} 
include("header.php");
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
<p><u><strong>Visitor Details :</strong></u></p>
<table width="547" height="33" border="5" class="tftable">
  <tr>
    <th scope="row">Name</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th width="238" scope="row">Email ID</th>
    <td width="293">&nbsp;</td>
    </tr>
  <tr>
    <th scope="row">Address</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">Contact No.</th>
    <td>&nbsp;</td>
  </tr>
</table>
<p><u><strong>Room Details : </strong></u></p>
<table width="544" height="94" border="5">
  <tr>
    <th scope="row">Lodge name</th>
    <th>Room type</th>
    <th>Room Number</th>
    <th>CheckIn Date</th>
    <th>CheckOut Date</th>
  </tr>
  <tr>
    <td width="119" scope="row">&nbsp;</th>
    <td width="118">&nbsp;</td>
    <td width="90">&nbsp;</td>
    <td width="105">&nbsp;</td>
    <td width="78">&nbsp;</td>
  </tr>
  </table>
<p><u><strong>Payment Details : </strong></u></p>
<table width="547" height="33" border="5">
  <tr>
    <th scope="row">Payment Type</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">Bill date</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th width="216" scope="row">Card  Number</th>
    <td width="272">&nbsp;</td>
    </tr>
  <tr>
    <th scope="row">Paid Amount</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row">Refund amount</th>
    <td>&nbsp;</td>
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