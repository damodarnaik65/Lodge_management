<?php
session_start();
    date_default_timezone_set("Asia/Kolkata"); 
if($_SESSION[empid] == 1)
{
	header("Location: dashboard.php");
}
else if($_SESSION[empid] >= 1)
{
	header("Location: empdashboard.php");
}
include("dbconnection.php");
if(isset($_POST[submit]))
{
	$selrec="SELECT * from employees where login_id='$_POST[login]' and password='$_POST[pswd]'";
	$selquery=mysqli_query($dbconnection,$selrec);
	$sqlfetch=mysqli_fetch_array($selquery);
	
	if(mysqli_num_rows($selquery)==1)
	{
		
				
		$_SESSION[empid] = $sqlfetch[emp_id];
		
		$_SESSION[lastlogindate] = $sqlfetch[last_login];
		$dttim= date("Y-m-d h:i:s");
		
		//Coding to update last login details.
		$dt = date("Y-m-d h:i:s");
		$sqlupd = "UPDATE employees SET last_login='$dt'  where emp_id='$_SESSION[empid]'";
		$resquery=mysqli_query($dbconnection, $sqlupd);
		//Code ends here
		if($_SESSION[empid] == 1)
		{
		header("Location: dashboard.php");
		}
		else
		{
		header("Location: empdashboard.php");			
		}
	}
	else
	{
		$msg =  "<br><font color='gold'><marquee loop=5 ><strong>Login Failed</strong></marquee></font>";
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
<body background="img/water.jpg">
  <table width="1054" border="1" bgcolor="blue">
    <tr>
      <th scope="col"><div align="center"><font face="Algerian" size="12" color="#999999"><img src="images/home_head_03.jpg" width="171" height="112" alt="img1" /></font><font face="Algerian" size="12" color=white>Administrator Login Page <img src="images/home_head_04.jpg" width="172" height="107" alt="image4" /></font></div></th>
    </tr>
  </table>
  </body></div>
<p align="center">&nbsp;</p>
<form action="" method="post">
  <div align="center">
  <table width="665" height="211" bgcolor="#0033FF">
    <tr>
      <th height="92" colspan="2" bordercolor="#FFFFFF"><h1 align="center"><strong><font color=white ><img src="images/Lock-icon.png" width="96" height="65" alt="lockimg" /></font></strong></h1>
      <h1 align="center"><strong><font color=white ></font><?php echo $msg; ?> </strong></h1></th>
    </tr>
    <tr>
      <th width="228"> <div align="right"><strong><font color=white><h3>USER  ID :</h3>
      </font></strong></div></th>
      <td width="425"><div align="left"><strong>
        <input name="login" type="text" size="40" />
      </strong></div></td>
    </tr>
    <tr>
      <th> <div align="right" bordercolor="#FFFFFF">
        <div align="right"><strong><font color=white><h3> PASSWORD :</h3></font></strong>        </div>
      </div></th>
      <td><div align="left"><strong>
        <input name="pswd" type="password" size="40" />
      </strong></div></td>
    </tr>
    <tr>
      <th colspan=2> <div align="center"> <strong>
     <input name="submit" type="submit" value="LOGIN"/>
      </strong></div></th>
    </tr>
  </table>
</form>
</div>