<?php
session_start();
if(isset($_SESSION['empid']))
{
	header("Location: dashboard.php");
}
include("dbconnection.php");
if(isset($_POST['submit']))
{
	$selrec="SELECT * from employees where login_id='$_POST[login]' and password='$_POST[pswd]'";
	$selquery=mysqli_query($dbconnection,$selrec);
	$sqlfetch=mysqli_fetch_array($selquery);
	
	if(mysqli_num_rows($selquery)==1)
	{
		$_SESSION[lastlogindate] = $sqlfetch[last_login];
		$dttim= date("Y-m-d h:i:s");
		
		$selrecup="UPDATE employees SET last_login='$dttim' where login_id='$_POST[login]'";	
		mysqli_query($dbconnection,$selrecup);
		$_SESSION[empid] = $sqlfetch[emp_id];
		header("Location: dashboard.php");
	}
	else
	{
		$msg =  "<br><font color='red'><strong>Unable to Login</strong></font>";
	}
}
?>
<style type="text/css">
.selcolor {
	color: #400040;
}
</style>
<html>
<head><title>login page</title></head>
<div align="center">
<body bgcolor="#003366">
  <table width="1054" border="1" bgcolor="blue">
    <tr>
      <th scope="col"><div align="center"><font face="Algerian" size="12" color="#999999"><img src="images/home_head_03.jpg" width="171" height="112" alt="img1" /></font><font face="Algerian" size="12" color=white>Administrator Login Page <img src="images/home_head_04.jpg" width="172" height="107" alt="image4" /></font></div></th>
    </tr>
  </table>
</div>
<p align="center">&nbsp;</p></body></html>
<form action="" method="post">
  <div align="center">
    <table width="410" height="187" border=2>
      <tr>
        <th colspan="2"><strong><font color=red>Login
        </font>  <?php ?> 
        </strong></th>
      </tr>
      <tr><th> <div align="center"><strong><font color=red>Login ID :</font> </strong></div></th><td><strong>
        
        <input name="login" type="text" size="40">
        </strong></td>
      </tr>
      <tr><th> <div align="center"><strong><font color=red>Password :</font> </strong></div></th><td><strong>
        
        <input name="pswd" type="password" size="40"> 
        </strong></td>
      </tr>
      <tr><th colspan=2> <div align="center">
        <strong>
          <input name="submit" type="submit" value="Submit">
      </strong></div></th></tr>
    </table>
  </div>
</form>