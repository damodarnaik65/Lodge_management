<?php
session_start();
if(!isset($_SESSION[empid]))
{
	header("Location: loginpage.php");
} 
include("header.php");

include("dbconnection.php");
?>
<script type="application/javascript">
function validation()
{
	if(document.lodgeform.lodgeid.value=="")
	{
		alert("Select lodge..");
		document.lodgeform.lodgeid.focus();
		return false;
	}
	else if(document.lodgeform.first.value=="")
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
		else if(document.lodgeform.jdate.value=="")
	{
		alert("join date should not be blank..");
		document.lodgeform.ad.focus();
		return false;
	}
	 else if(document.lodgeform.status.value=="")
	{
		alert("Please select Status.");
		document.lodgeform.status.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
<?php

if($_POST[setid] == $_SESSION[setid])
{
	if(isset($_POST[submit]))
	{
		
		if(isset($_GET[addemp]))
		{
			$sqlins = "INSERT INTO employees(lodge_id,first_name,last_name,emp_adrs,contact_no,login_id,password,join_date,status) values ('$_POST[lodgeid]','$_POST[first]','$_POST[last]','$_POST[addrs]','$_POST[number]','$_POST[login]','$_POST[password]','$_POST[jdate]','$_POST[status]')";
				$result = mysqli_query($dbconnection, $sqlins);
				
					if(!$result)
					{
						echo "Problem in SQL Statement". mysqli_error($dbconnection);
					}
					else
					{
						echo "<font color='#FFFFFF'><h2>Employee Record inserted successfully...</center></h2></font>";
					}
		}
		else
		{
				if(isset($_GET[updid]))
					{
						$sqlupd = "UPDATE employees SET lodge_id='$_POST[lodgeid]',first_name='$_POST[first]',last_name='$_POST[last]',emp_adrs='$_POST[addrs]',contact_no='$_POST[number]',login_id='$_POST[login]',password='$_POST[password]',join_date='$_POST[jdate]',status='$_POST[status]' where emp_id='$_GET[updid]'";
						$resquery=mysqli_query($dbconnection, $sqlupd);
						if(!$sqlupd)
							{
								echo "Problem in SQL Statement". mysqli_error($dbconnection);
							}
							else
							{
								echo "<font color='#FFFFFF'><h2>Employee Record updated successfully...</center></h2></font>";
							}
					}
					else if(isset($_SESSION[empid]))
					{
							$sqlupd = "UPDATE employees SET emp_adrs='$_POST[addrs]',contact_no='$_POST[number]',password='$_POST[password]' where emp_id='$_SESSION[empid]'";
						$resquery=mysqli_query($dbconnection, $sqlupd);
						if(!$sqlupd)
							{
								echo "Problem in SQL Statement". mysqli_error($dbconnection);
							}
							else
							{
								echo "<font color='#FFFFFF'><h2>Employee Profile updated successfully...</center></h2></font>";
							}
					}
		}

	}
}

if(!isset($_GET[addemp]))
{
	if(isset($_SESSION[empid]))
	{
		$updselrec = "SELECT * FROM employees where emp_id='$_SESSION[empid]'";
	}
	else
	{
		$updselrec = "SELECT * FROM employees where emp_id='$_GET[updid]'";
	}

$updquery = mysqli_query($dbconnection, $updselrec);
$updrec = mysqli_fetch_array($updquery);
}
$_SESSION[setid] = rand();
?>
<html>
<style type="text/css">
.color {
	color: #FFF;
}
.color2 {
	color: #FFF;
}
.colo3 {
	color: #FFF;
}
.white {
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
                  	<h3>Menu</h3>
                     <div class= "gallery-images">
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
               	<h2> VIEW EMPLOYEES :</h2>
<form method="post" action="" enctype="multipart/form-data" onSubmit="return validation()" name="lodgeform">
  <div align="center">
  
    <input type="hidden" name="setid" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $_SESSION[setid]; ?>" />
  </p>
  <table width="458" height="449" border=8>
  
    <tr>
      <th><div align="left" class="color2"><strong>Lodge Name:</strong></div></th>
      <td> <strong>
        <select name="lodgeid" <?php  /*  Download projects from www.freestudentprojects.com */
		if($_SESSION[empid]!=1)
		{
        echo "disabled";
		}
		?>  >

          <option value="">Select</option>
          <?php  /*  Download projects from www.freestudentprojects.com */ 
  $sqlselection="select * from lodges where status='Enabled'";
  $result=mysqli_query($dbconnection,$sqlselection);
  
	  while($rs = mysqli_fetch_array($result))
	{
		if($rs[lodge_id] == $updrec[lodge_id] )
		{
			echo "<option value='$rs[lodge_id]' selected>$rs[lodge_name]</option>";
		}
		else
		{
		echo "<option value='$rs[lodge_id]'>$rs[lodge_name]</option>";
		}
	}
  
	?>
        </select>
      </strong></td>
      </tr>
    <tr><th width="153"><div align="left" class="colo3"><strong>First Name:</strong></div></th> <td width="198"><strong>
      <input name="first" type=text  value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[first_name]; ?>" size="30"
              <?php  /*  Download projects from www.freestudentprojects.com */
		if($_SESSION[empid]!=1)
		{
        echo "disabled";
		}
		?>
       />
    </strong></td>
      </tr>
    <tr><th class="color"><div align="left"><strong>last Name:</strong></div></th> <td><strong>
      <input size="30"  type=text name="last" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[last_name]; ?>"
             <?php  /*  Download projects from www.freestudentprojects.com */
		if($_SESSION[empid]!=1)
		{
        echo "disabled";
		}
		?>
      />
    </strong></td>
      </tr>
    <tr><th class="color"><div align="left"><strong>Login ID:</strong></div></th> <td><strong>
      <input type=text name="login" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[login_id]; ?>"
             <?php  /*  Download projects from www.freestudentprojects.com */
		if($_SESSION[empid]!=1)
		{
        echo "disabled";
		}
		?>
      />
    </strong></td>
      </tr>
    <tr><th class="color"><div align="left"><strong>Password:</strong></div></th> <td><strong>
      <input type=password name="password" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[password]; ?>" />
    </strong></td>
      </tr>
    <tr>
      <th class="color"><div align="left"><strong>Confirm Password:</strong></div></th>
      <td><strong>
        <input type="password" name="cpassword" id="cpassword" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[password]; ?>"/>
      </strong></td>
      </tr>
    <tr><th class="color"><div align="left"><strong>Address:</strong></div></th> <td><strong>
      <textarea row=4 colomn=20 name="addrs"/><?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[emp_adrs]; ?></textarea>
    </strong></td>
      <tr><th class="color"><div align="left"><strong>contact number:</strong></div></th> <td><strong>
      <input type=text name="number" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[contact_no]; ?>"/>
      </strong></td>
      </tr>
    <tr><th class="color"><div align="left"><strong>Join Date:</strong></div></th> <td><strong>
      <input type="date" name="jdate" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[join_date]; ?>"
             <?php  /*  Download projects from www.freestudentprojects.com */
		if($_SESSION[empid]!=1)
		{
        echo "disabled";
		}
		?>
       />
    </strong></td>
      </tr>
     <tr>     
    <th><div align="left" class="white">Status: </div></th>
          <td>

            <select name=status id="status"
                   <?php  /*  Download projects from www.freestudentprojects.com */
		if($_SESSION[empid]!=1)
		{
        echo "disabled";
		}
		?> >

      
    <option>Select</option>
    <?php
	$arr = array("Enabled","Disabled");
	foreach($arr as $val)
	{
		if($val == $updrec[status])	
		{	
		echo "<option value='$val' selected>$val</option>";
		}
		else
		{
		echo "<option value='$val'>$val</option>";
		}
	}
	?></select></td></tr>

<tr>
<td><strong>Last login</strong></td><td><?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[last_login]; ?></td>
</tr>
           
            <tr><th colspan=2><input type=submit name="submit" value="submit" class="fsSubmitButton"></th></tr>    
    
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