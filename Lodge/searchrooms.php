<?php
session_start();
include("header.php");
include ("dbconnection.php");
?>

		<!-- content -->
		<div id="content">

		  <div class="container">
            <div class="aside maxheight">
            	<!-- box begin -->
					<?php
					include("leftsidebar.php");
					?>               
               <!-- box end -->
               
            </div>
            <div class="content">
            	<div class="indent">
               	<h2>BOOKING</h2>

<form method="post" action="viewavailablerooms.php">
  <div align="center">
  <table width="494" height="295"  border=10 class="tftable">
    <tr><th width="120" height="61">Checkin Date</th> <td width="362"><input type=date name="checkin_date" min="<?php  /*  Download projects from www.freestudentprojects.com */echo date("Y-m-d"); ?>" /></td>
    </tr>
      
    <tr>
      <th height="58">&nbsp;Checkout Date</th>
      <td><input type=date name="check_out" min="<?php  /*  Download projects from www.freestudentprojects.com */echo date("Y-m-d"); ?>" /></td>
    </tr>
    <tr>
      <th height="58">&nbsp;No of persons</th>
      <td>&nbsp;<select name="nopersons">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="30">30</option>
</select></td>
    </tr>
    <tr><th height="58"> No. of Rooms </th> <td>&nbsp;<input type="number" name="norooms" /></td>
</tr>
          
    <tr><th height="28" colspan=2><input type=submit name="submit" value="Search Rooms" class="fsSubmitButton" ></th></tr>
  </table>
  </div>
</form>
</div>
            </div>
            <div class="clear"></div>
         </div>
		</div>
		<?php
		include("footer.php")
		?>