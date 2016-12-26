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
	if(document.lodgeform.lname.value=="")
	{
		alert("Lodge name should not be blank..");
		document.lodgeform.lname.focus();
		return false;
	}
	else if(document.lodgeform.dist.value=="")
	{
		alert("Distance should not be blank..");
		document.lodgeform.dist.focus();
		return false;
	}
	else if(document.lodgeform.ad.value=="")
	{
		alert("Address should not be blank..");
		document.lodgeform.ad.focus();
		return false;
	}
	 else if(document.lodgeform.sll.value=="")
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
if($_FILES[fileimg][size]==0)
{
 $filename = $_POST[imagename];
}
else
{
$filename = rand().$_FILES[fileimg][name];
move_uploaded_file($_FILES[fileimg][tmp_name],"uploads/".$filename);
}

if($_POST[setidd]==$_SESSION[settid])
{
	if(isset($_POST[submit]))
	{
		if(isset($_GET[updid]))
		{
			$sqlupde="UPDATE lodges SET 	lodge_name='$_POST[lname]',address='$_POST[ad]',distance='$_POST[dist]',image='$filename',status='$_POST[sll]' where lodge_id='$_GET[updid]'";
				$resquery=mysqli_query($dbconnection, $sqlupde);
				if(!$sqlupde)
				{
				echo "Problem in SQL Statement". mysqli_error($dbconnection);
				}
				else
				{
				echo "<font color='#FFFFFF'><h2><center>Lodge details updated successfully...</center></h2></font>";
				}	
		}
		else
		{			
	$sqlin="INSERT INTO lodges(lodge_name,address,distance,image,status) values ('$_POST[lname]','$_POST[ad]','$_POST[dist]','$filename','$_POST[sll]')"; $result=mysqli_query($dbconnection, $sqlin);
			if(!$result)
			{echo "Problem in SQL Statement". mysqli_error($dbconnection);
			}
			else
			{
				echo "<font color='#FFFFFF'><h2><center>New lodge details inserted successfully...</center></h2></font>";
			}	
		}
	}
}
	$updselrec = "SELECT * FROM lodges where lodge_id='$_GET[updid]'";
$updquery = mysqli_query($dbconnection, $updselrec);
$updrec = mysqli_fetch_array($updquery);

$_SESSION[settid]=rand();
	
		
?>
<!-- content -->
<style type="text/css">
#content .container .content .indent form .tftable tr th {
	color: #000;
}
</style>

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
               	<h2> ADD LODGES</h2>
<form method="post" action="" enctype="multipart/form-data" onsubmit="return validation()" name="lodgeform">
  <input type="hidden" name="setidd" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $_SESSION[settid]; ?>" />
<input type="hidden" name="imagename" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[image]; ?>"  />
<table width="508" height="408" border=10  class="tftable" >
<tr><th width="170"> <div align="center"><font color=black>Lodge name :</font> </div></th>
  <td width="287">
    <label for="textfield"></label>
    <input name="lname" type="text" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[lodge_name]; ?>" size="35" ></td></tr>
    <tr><th> <div align="center"><font color="black">Distance From temple :</font></div></th> <td><label for="textfield2"></label>
        <input name="dist" type="text" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[distance]; ?>" size="35"></td></tr>
      <tr><th><div align="center"><font color="black">Address :</font> </div></th><td><label for="textarea"></label>
          <textarea name="ad"cols="45" rows="5" ><?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[address]; ?></textarea> </td></tr>
          <tr><th><div align="center"><font color="black">Image</font></div></th> <td>
          <input type=file  name="fileimg" />
          <?php
		  if(isset($_GET[updid]))
		  {
			  echo "<br><img src='uploads/$updrec[image]' height='100' width='150' >";
		  }
		  ?>
          </td>
</tr>
<tr><th><div align="center"><font color="black">Status: </font></div></th> <td><select name=sll>
<option value="">Select</option>
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
	?>
</select></td>
</tr>
<tr><th colspan=2><div align="center">
  <input type=submit name="submit" value="submit" class="fsSubmitButton">
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