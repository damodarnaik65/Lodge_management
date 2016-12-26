<?php


include("dbconnection.php");
if($_POST['setid']==$_SESSION[setid])
{
	if(isset($_POST['submit']))
	{
	
	$sqlexist = "SELECT * FROM visitors where email_id='$_POST[login]'";
	$selectquery=mysqli_query($dbconnection, $sqlexist);
	
	if(mysqli_num_rows($selectquery) >= 1)	
	{
		$resi = 1;
				$res= "<font color='#FFFFFF'><h2>Email Id already exist in database... ...</center></h2></font> <br>";
				$res=$res. "<font color='#FFFFFF'><h2><a href='visitlogin.php'>Click here to login...</a></center></h2></font>";
	}
	else
	{		
	$sqlinss = "INSERT INTO visitors(fname,lname,email_id,dob,visit_password,visit_adrs,contact_num,mobile_no,status) values('$_POST[first]','$_POST[last]','$_POST[login]','$_POST[dob]','$_POST[password]','$_POST[addrs]','$_POST[cnumber]','$_POST[mnumber]','Enabled')";
	$result=mysqli_query($dbconnection, $sqlinss);	
	
		if(!$result)
			{
				echo "Problem in SQL Statement". mysqli_error($dbconnection);
			}
			else
			{
				
		if(isset($_GET[roomid]))
		{
			header("Location: visitlogin.php?roomid=$_GET[roomid]&fdate=$_GET[fdate]&tdate=$_GET[tdate]&setid=$_GET[setid]&resi=1&res=Registration done successfully&loginidset=$_POST[login]");
		}
		else
		{
			header("Location: visitlogin.php?resi=1&res=Registration done successfully");			
		}
			}
	}
		}
}

include("header.php");

$_SESSION['setid']=rand();
?>
		<!-- content -->
		<div id="content">
			<div class="wrapper">
            <div class="aside maxheight">
            	<!-- box begin -->
              <?php
			  include("leftsidebar.php");
			  ?>
               <!-- box end -->
            </div>
            <div class="content">
            	<div class="indent">
               	<h2>New Registration</h2>
                <?php
				if($res == 1 )
				{
				?>
                <h3><?php echo $res; ?></h3>
                <?php
				}
				else
				{
				?>
                  <div class="container">
                  
                     <form method="post" action="" enctype="multipart/form-data" onsubmit="return validation()" name="lodgeform">
<input type="hidden" name="setid" value='<?php echo $_SESSION[setid]; ?>' /> 
<table width="510" height="426" border=8 class="tftable">
<tr><th width="153" class="color"><div align="left">First Name:</div></th> <td width="198"><input name="first" type=text size="35" /></td>
</tr>
<tr><th class="color"><div align="left">last Name:</div></th> <td><input name="last" type=text size="35" /></td>
</tr>
<tr><th class="color"><div align="left">Email ID:</div></th> <td><input name="login" type=text size="35" /></td>
</tr>
<tr><th class="color"><div align="left">Password:</div></th> <td><input name="password" type=password size="35" /></td>
</tr>
<tr>
  <th class="color"><div align="left">Confirm Password:</div></th>
  <td><input name="cpassword" type="password" size="35"/></td>
</tr>
<tr><th class="color"><div align="left">Date of Birth:</div></th> <td><input type="date" name="dob"/></td>
</tr>
<tr><th class="color"><div align="left">Address:</div></th> <td><textarea row=4 colomn=20 name="addrs" /></textarea></td>
<tr><th class="color"><div align="left">contact number:</div></th> <td>
<input name="cnumber" type=text size="35"/></td>
</tr>
<tr><th class="color"><div align="left">Mobile number:</div></th> <td>
<input name="mnumber" type=text size="35" /></td>
</tr>

<tr class="color"><th colspan=2><input type=submit name="submit" value="submit" class="fsSubmitButton"></th></tr>
</table>
</form>
                     <div class="clear"></div>
                  </div>
                  <?php
				}
				?>
               </div>
            </div>
         </div>
		</div>
<?php
include("footer.php");
?>
<script type="application/javascript">
function validation()
{
	if(document.lodgeform.first.value=="")
	{
		alert("first name should not be blank..");
		document.lodgeform.first.focus();
		return false;
	}
	else if(document.lodgeform.login.value=="")
	{
		alert("Email_id is must..");
		document.lodgeform.login.focus();
		return false;
	}
	else if(document.lodgeform.password.value=="")
	{
		alert("enter password..");
		document.lodgeform.password.focus();
		return false;
	}
		else if(document.lodgeform.cpassword.value=="")
	{
		alert("confirm password..");
		document.lodgeform.cpassword.focus();
		return false;
	}
		else if(document.lodgeform.dob.value=="")
	{
		alert("enter your DOB..");
		document.lodgeform.dob.focus();
		return false;
	}
		else if(document.lodgeform.addrs.value=="")
	{
		alert("Address should not be blank..");
		document.lodgeform.addrs.focus();
		return false;
	}
		else if(document.lodgeform.cnumber.value=="")
	{
		alert("Address should not be blank..");
		document.lodgeform.ad.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>