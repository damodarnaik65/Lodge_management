<?php
session_start();
if(isset($_SESSION['visitid']))
{
	header("Location: userpanel.php");
}
include("dbconnection.php");
if(isset($_POST['submit']))
{
	$selrec="SELECT * from visitors where email_id='$_POST[email]' and visit_password='$_POST[pswd]'";
	$selquery=mysqli_query($dbconnection,$selrec);
	$sqlfetch=mysqli_fetch_array($selquery);
	
	if(mysqli_num_rows($selquery)==1)
	{
		$_SESSION[visitid] = $sqlfetch[visitor_id];
		if($_GET[roomid] != "")
		{
			header("Location: bookrooms.php?roomid=$_GET[roomid]&fdate=$_GET[fdate]&tdate=$_GET[tdate]&setid=$_GET[setid]");
		}
		else
		{
			header("Location: userpanel.php");			
		}
	}
	else
	{
		$msg =  "<br><font color='yellow'><marquee loop=5 ><strong>Login Failed</strong></marquee></font>";
	}
}
include("header.php");
?>
		<!-- content -->
		<div id="content">

		  <div class="container">
            <div class="aside maxheight">
            	<!-- box begin -->
            	<?php  /*  Download projects from www.freestudentprojects.com */
					include("leftsidebar.php");
					?>
            	<!-- box end -->
            </div>
            <div class="content">
            	<div class="indent">

            <form action="" method="post">

<table width="589" height="304"  bordercolor="#FFFFFF" background="">
  <tr>
    <th colspan="2"><h2 align="center">&nbsp;</h2>
      <h2 align="center"><strong><img src="images/adminicons/ChangePassword.gif" width="97" height="83"/><?php  /*  Download projects from www.freestudentprojects.com */ ?>
      <strong>
	  <?php
	  if($_GET[resi]==1)
	  {
		  echo $_GET[res];
	  }
	  ?></strong>
      </strong><font color=white size=10>VISITOR LOGIN PAGE</font></h2></th>
  </tr>
  <tr>
    <th width="245" height="33"> <div align="right">
      <h2><strong><font color="white">USER  ID :</font></strong></h2>
    </div></th>
    <td width="408"><div align="center"><strong>
      <input name="email" type="text" size="40"
      <?php
	  if(isset($_GET['loginidset']))
	  {
		  echo "readonly value='$_GET[loginidset]'";
	  }
	  ?>
       />
    </strong></div></td>
  </tr>
  <tr>
    <th> <div align="right" bordercolor="#FFFFFF">
      <div align="right">
        <h2><strong><font color="white"> PASSWORD :</font></strong></h2>
      </div>
    </div></th>
    <td><div align="center"><strong>
      <input name="pswd" type="password" size="40" />
    </strong></div></td>
  </tr>
  <tr>
    <th height="38" colspan=2> <div align="center"><strong>
      <input name="submit" type="submit" value="LOGIN" class="fsSubmitButton"/>
    </strong></div></th>
  </tr>
  <tr>
    <th height="38" colspan=2><a href="forgotpassword.php">Forgot Password</a></th>
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