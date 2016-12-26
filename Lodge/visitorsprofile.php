<?php
session_start();
if(!isset($_SESSION[empid]) && !isset($_SESSION[visitid]))
{
	header("Location: loginpage.php");
} 
include("header.php");
include ("dbconnection.php");
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
		alert("login id is must..");
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
	 else if(document.lodgeform.status.value=="")
	{
		alert("Please select Status.");
		document.lodgeform.sll.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
<?php
if($_POST[setid]==$_SESSION[setid])
{
	if(isset($_POST[submit]))
	{
				$sqlupde="UPDATE visitors SET fname='$_POST[first]',lname='$_POST[last]',email_id='$_POST[login]',dob='$_POST[dob]',visit_password='$_POST[password]',visit_adrs='$_POST[addrs]',contact_num='$_POST[cnumber]',mobile_no='$_POST[mnumber]',status='$_POST[status]'	 where visitor_id='$_SESSION[visitid]'";
				if(!mysqli_query($dbconnection, $sqlupde))
				{
				$res = "No record to update..". mysqli_error($dbconnection);
				$resi = 1;
				}
				else
				{
				$res = "<font color='#336600'><h2>Lodge details updated successfully...</center></h2></font>";
				$resi = 1;				
				}	
		
	}
}

$updselrec = "SELECT * FROM visitors where visitor_id='$_SESSION[visitid]'";
$updquery = mysqli_query($dbconnection, $updselrec);
$updrec = mysqli_fetch_array($updquery);
$_SESSION[setid]=rand();

?>

<style type="text/css">
.color {
	color: #FFF;
}
</style>

<!-- content -->
		<div id="content">

		  <div class="container">
            <div class="aside maxheight">
            	<!-- box begin -->
               <div class="box maxheight">
               	<div class="inner">
                     <div class= "gallery-images">
 <?php
 include("visitorsidebar.php");
 ?>
                     </div>
                 </div>
               </div>
               <!-- box end -->
            </div>
            <div class="content">
            	<div class="indent">
               	<h2> VISITORS :</h2>
                <p><?php
                if($resi == 1)
				{
				echo $res; 
				}
				?></p>
<form method="post" action="" enctype="multipart/form-data" onsubmit="return validation()" name="lodgeform">
<input type="hidden" name="setid" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $_SESSION[setid]; ?>" /> 
<table width="510" height="426" border=8>
<tr><th width="153" class="color"><div align="left">First Name:</div></th> <td width="198"><input type=text name="first" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[fname]; ?>"/></td>
</tr>
<tr><th class="color"><div align="left">last Name:</div></th> <td><input type=text name="last" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[lname]; ?>" /></td>
</tr>
<tr><th class="color"><div align="left">Email ID:</div></th> <td><input type=text name="login" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[email_id]; ?>"/></td>
</tr>
<tr><th class="color"><div align="left">Password:</div></th> <td><input type=password name="password" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[visit_password]; ?>"/></td>
</tr>
<tr>
  <th class="color"><div align="left">Confirm Password:</div></th>
  <td><input type="password" name="cpassword" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[visit_password]; ?>"/></td>
</tr>
<tr><th class="color"><div align="left">Date of Birth:</div></th> <td><input type="date" name="dob" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[dob]; ?>"/></td>
</tr>
<tr><th class="color"><div align="left">Address:</div></th> <td><textarea row=4 colomn=20 name="addrs" /><?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[visit_adrs]; ?></textarea></td>
<tr><th class="color"><div align="left">contact number:</div></th> <td><input type=text name="cnumber" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[contact_num]; ?>"/></td>
</tr>
<tr><th class="color"><div align="left">Mobile number:</div></th> <td><input type=text name="mnumber" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[mobile_no]; ?>" /></td>
</tr>
<tr><th class="color"><div align="left">Status: </div></th> <td><select name=status id="status"><option>Enabled</option>
<option>Disabled</option></select></td>
</tr>
<tr class="color"><th colspan=2><input type=submit name="submit" value="submit" class="fsSubmitButton"></th></tr>
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
