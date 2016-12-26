<?php
session_start();

if(!isset($_SESSION[visitid]))
{
	header("Location: userpanel.php");
} 
include("header.php");
include ("dbconnection.php");
if($_POST[setid] == $_SESSION[setid])
{
	if(isset($_POST[submit]))
	{
		$sqlinss = "INSERT INTO billing(bill_date,credit,debit,payment,refund,status) values('$_POST[bdate]','$_POST[credit]','$_POST[debit]','$_POST[payment]','$_POST[refund]','$_POST[status]')";
$result=mysqli_query($dbconnection, $sqlinss);		
if(!$result)
		{
			echo "Problem in SQL Statement". mysqli_errno();
		}
		else
		{
			echo "<font color='#CC3333'><h2>Billing done successfully...</center></h2></font>";
		}
	}
}

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
                        <ul>
                           
                           <li> 
                             <div align="center"><a href="#"><img src="img/Booking.com-250000+-hotels-Icon.png" alt="" width="80" height="69" /></a><br />
                         <strong> Room Booking</strong></div>
                          </li>
                           <li>
                             <div align="center"><strong><a href="#"><img src="images/adminicons/Windows-View-Detail-icon.png" alt="" width="76" height="72" /></a><br />
                             Booking_Details</strong></div>
                          </li>
                           <li> 
                             <div align="center"><a href="#"><img src="images/adminicons/Windows_icon_billing.png" alt="" width="77" height="68" /></a><br />
                             <strong>Payment </strong></div>
                          </li>
                           <li>
                             <div align="center"><a href="#"><img src="images/adminicons/profile.png" alt="" width="79" height="69" /></a><br />
                               <strong>Profile</strong></div>
                           </li>
                             <li> 
                               <div align="center"><a href="changepassword.php"><img src="images/adminicons/password_icon.png" alt="" width="80" height="76" /></a><br />
                               <strong>Change Password</strong></div>
                          </li>
                           <li>
                             <div align="center"><a href="visitlogout.php"><img src="images/adminicons/Cute-Ball-Logoff-icon.png" alt="" width="78" height="76" /></a><br />
                             <strong>Logout</strong></div>
                          </li>
                             </ul>
                     </div>
                  </div>
               </div>
               <!-- box end -->
            </div>
            <div class="content">
            	<div class="indent">
               	<h2>BILLING</h2>

<form method="post" action="">
  <div align="center">
  <input type="hidden" name="setid"  />

  <table width="494" height="424"  border=10>
    <tr><th width="120"><div align="center"><font color=white>Billing_date:</font></div></th> <td width="362"><input type=date name="bdate"  /></td>
      </tr>
    <tr><th><div align="center"><font color=white>Credit</font></div></th> <td><input type=text name="credit" /></td>
      </tr>
       <tr><th><div align="center"><font color=white>Debit</font></div></th> <td><input type=text name="debit" /></td>
      </tr> <tr><th><div align="center"><font color=white>Payment</font></div></th> <td><input type=text name="payment" /></td>
      </tr>
       <tr><th><div align="center"><font color=white>Refund</font></div></th> <td><input type=text name="refund" /></td>
      </tr>
          
    <tr><th><div align="center"><font color=white>Status:</font> </div></th> <td><select name=status><option>Select</option>
     <option>Enabled</option>
     <option>Desabled</option>
      </select></td>
      </tr>
    <tr><th colspan=2><input type=submit name="submit" value="submit"></th></tr>
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