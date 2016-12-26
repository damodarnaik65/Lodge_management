<?php  /*  Download projects from www.freestudentprojects.com */
session_start();
if(!isset($_SESSION[visitid]))
{
	header("Location: visitlogin.php");
} 
include("header.php");
include("dbconnection.php");

if(isset($_POST[conform]))
{
$selecting="UPDATE visitors set visit_password='$_POST[newpassword]' where email_id='$_POST[login]' AND visit_password='$_POST[oldpassword]' AND visitor_id='$_SESSION[visitid]'";
	$updquery = mysqli_query($dbconnection,$selecting);
	if(mysqli_affected_rows($dbconnection) ==1)
	{
		$res = "Password updated successfully...";
	}
	else
	{
		$res = "Failed to update password";
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
<?php
 include("visitorsidebar.php");
?>
                  </div>
               </div>
               <!-- box end -->
            </div>
            <div class="content">
            	<div class="indent">
               	<h2>Change Password : </h2>
                <h3><?php  /*  Download projects from www.freestudentprojects.com */echo $res; ?></h3>
<?php
$updselrec = "SELECT * FROM visitors where visitor_id='$_SESSION[visitid]'";
$updquery = mysqli_query($dbconnection, $updselrec);
$updrec = mysqli_fetch_array($updquery);
?>                
<form method="post" action="">
<table width="462" border=10 >
<tr ><th height="44" > <div align="center"><font color=white size=4>Email ID :</font> </div></th><td><label for="textfield"></label>
    <input name="login" type="text" size="35" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[email_id]; ?>"  readonly="readonly" /></td></tr>
    <tr><th height="42" ><div align="center"><font color=white size=4>Old Password :</font> </div></th><td><label for="textfield2"></label>
     <input name="oldpassword" type="password" id="oldpassword" size="35"> </td>
    </tr>
 <tr><th height="43" ><div align="center"><font color=white size=4>New Password :</font> </div></th><td><label for="textfield2"></label>
     <input name="newpassword" type="password" id="newpassword" size="35"> </td>
    </tr>
    <tr>
      <th height="48" ><div align="center"><font color=white size=4>Confirm Password :</font> </div></th><td><label for="textfield2"></label>
     <input name="confirmpassword" type="password" id="confirmpassword" size="35"> </td>
    </tr>
<tr><th height="38" colspan=2>
  <div align="center">
   <font size=5> <input name="conform" type="submit" value="Submit"></font>
  </div></th></tr>
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
