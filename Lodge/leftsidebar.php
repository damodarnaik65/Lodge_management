<?php

?>
 <div class="box maxheight">
               	<div class="inner">
                  	<h3>Reservation:</h3>
<form method="post" action="viewavailablerooms.php">
  <div align="center">
  <table  class="tftable">
    <tr><td width="120" height="61">Checkin Date<br />
<input type=date name="checkin_date" min="<?php echo date("Y-m-d"); ?>" /></td>
    </tr>
      
    <tr>
      <td height="58">&nbsp;Checkout Date<br />
<input type=date name="check_out" min="<?php echo date("Y-m-d"); ?>"  /></td>
    </tr>
    <tr>
      <td height="58">&nbsp;No of persons<br />
&nbsp;<select name="nopersons">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="30">30</option>
</select>
</td>
    </tr>
    <tr><td height="58"> No. of Rooms<br />
&nbsp;<input type="number" name="norooms"  min="1" max="10"/></td>
</tr>
          
    <tr><td height="28" ><input type=submit name="submit" value="Check Availability" class="fsSubmitButton" ></th></tr>
  </table>
  </div>
</form>
<br />
                     <form action="" id="reservation-form">
                     <input type="hidden" name="setid" value="<?php echo $_SESSION[setid]; ?>" /> 
                
                           <div class="button">

<?php
if(isset($_SESSION['empid']))
{
echo "<p> <a href='dashboard.php'><img src='images/admindashboard.png' width='185' height='75' alt='loginimg' /></a></p>";	
}
else
{
	if(isset($_SESSION['visitid']))
	{
	echo "<a href='userpanel.php'><img src='images/myaccount.jpg' width='156' height='51' /></a>";
	}
	else
	{
	echo "<p> <a href='visitlogin.php'><img src='images/1333530733784883052login-button01-hi.png' width='155' height='42' alt='loginimg' /></a></p>";
	echo "<a href='register.php?roomid=$_GET[roomid]&fdate=$_GET[fdate]&tdate=$_GET[tdate]&setid=$_GET[setid]'><img src='images/register-now-button.png' width='156' height='51' /></a>";
	}
}
?>
</div>
                        </fieldset>
                     </form>
                  </div>
               </div>