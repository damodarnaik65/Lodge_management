<?php
session_start();
if(!isset($_SESSION[empid]))
{
	header("Location: loginpage.php");
} 
include("header.php");
?>
<script type="application/javascript">
function validation()
{
	if(document.lodgeform.ldname.value=="")
	{
		alert("Select lodge..");
		document.lodgeform.ldname.focus();
		return false;
	}
	else if(document.lodgeform.rmtype.value=="")
	{
		alert("Select room type..");
		document.lodgeform.rmtype.focus();
		return false;
	}
	else if(document.lodgeform.capacity.value=="")
	{
		alert("enter room capacity..");
		document.lodgeform.capacity.focus();
		return false;
	}
	else if(document.lodgeform.advnc.value=="")
	{
		alert("enter room advance..");
		document.lodgeform.advnc.focus();
		return false;
	}
		else if(document.lodgeform.rent.value=="")
	{
		alert("enter room rent..");
		document.lodgeform.rent.focus();
		return false;
	}
		else if(document.lodgeform.retamt.value=="")
	{
		alert("enter return ammount..");
		document.lodgeform.retamt.focus();
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
/* <tr><th><div align="center"><font color=black>Room capacity :</font></div></th> <td>
      <input type="text" name="capacity" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[room_capacity]; ?>"></td></tr>
    <tr><th><div align="center"><font color=black> Advance :</font></div></th> <td>
      <input type="text" name="advnc" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[advance]; ?>"></td></tr>
    <tr><th> <div align="center"><font color=black>Rent :</font></div></th> <td>
      <input type="text" name="rent" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[rent]; ?>"></td></tr>
    <tr><th><div align="center"><font color=black> Return Ammount:</font></div></th> <td>
      <input type="text" name="retamt" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[return_amt]; ?>"></td></tr>*/
</script>
<?php
include ("dbconnection.php");
if($_FILES[fileimg][size]==0)
{
 $filename = $_POST[imagename];
}
else
{
$filename = rand().$_FILES[fileimg][name];
move_uploaded_file($_FILES[fileimg][tmp_name],"uploads/".$filename);
}
if($_POST[setid] == $_SESSION[setid])
{
		if(isset($_POST[submit]))
		{
			
				if(isset($_GET[updid]))
				{
					$sqlupde="UPDATE room_types SET 	lodge_id='$_POST[ldname]',room_type='$_POST[rmtype]',room_capacity='$_POST[capacity]',advance='$_POST[advnc]',rent='$_POST[rent]',return_amt='$_POST[retamt]',image='$filename',status='$_POST[sll]' where room_type_id='$_GET[updid]'";
					$resquery=mysqli_query($dbconnection, $sqlupde);
					if(!$sqlupde)
					{
					echo "Problem in SQL Statement". mysqli_error($dbconnection);
					}
					else
					{
					echo "<font color='#FFFFFF'><h2>Room type updated successfully...</center></h2></font>";
					}	
				}
				else
				{	
				
				$sqlroomexist = mysqli_query($dbconnection,"SELECT * FROM  room_types where room_type='$_POST[rmtype]' AND lodge_id='$_POST[ldname]' ");
				$countsqlrows = mysqli_num_rows($sqlroomexist);
				
					if($countsqlrows ==0)
					{		
				$sqlinsm="INSERT INTO room_types(lodge_id,room_type,room_capacity,advance,rent,return_amt,image,status) values ('$_POST[ldname]','$_POST[rmtype]','$_POST[capacity]','$_POST[advnc]','$_POST[rent]','$_POST[retamt]','$filename','$_POST[sll]')";
				$result =mysqli_query($dbconnection, $sqlinsm);
							if(!$result)
							{
								echo "Problem in SQL Statement". mysqli_errno();
							}
							else
							{
								$msg = "<font color='#FFFFFF'><h2>New record to room type inserted successfully...</center></h2></font>";
							}
					}
					else
					{
						$msg = "<font color='#FFFFFF'><h2>Room type already exist in database..</center></h2></font>";
					}
	  			}
				
    	}
}

$updselrec = "SELECT * FROM room_types where room_type_id='$_GET[updid]'";
$updquery = mysqli_query($dbconnection, $updselrec);
$updrec = mysqli_fetch_array($updquery);

$_SESSION[setid] = rand();		
?>
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
               	<h2>ROOM-TYPES</h2>
                <h3><?php  /*  Download projects from www.freestudentprojects.com */echo $msg ; ?></h3>
<form method="post" action="" enctype="multipart/form-data" onsubmit="return validation()" name="lodgeform">
  <div align="center">
  <p>
    <input type="hidden" name="setid" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $_SESSION[setid]; ?>" />
    <input type="hidden" name="imagename" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[image]; ?>"  />
  </p>
  <p>&nbsp;</p>
  <table width="497" height="448" border=10 bordercolor="#999999" class="tftable">
    <tr><th><div align="center"><font color=black>Lodge Name: </font></div></th> <td>
      <select name="ldname">
        <option value="">Select</option>
        <?php
	$sqlselect = "SELECT * FROM lodges where status='Enabled'";
	$qresult = mysqli_query($dbconnection, $sqlselect);
	while($res = mysqli_fetch_array($qresult))
	{
		if($res[lodge_id] == $updrec[lodge_id] )
		{
		echo "<option value='$res[lodge_id]' selected>$res[lodge_name]</option>";
		}
		else
		{
		echo "<option value='$res[lodge_id]'>$res[lodge_name]</option>";
		}
	}
	?>
        </select>
      </td></tr>
    <tr><th><div align="center"><font color=black>Room type: </font></div></th> <td>
      <select name="rmtype">
        <option value="">Select</option>
        <?php
	$arr = array("2 Bed-Rooms","4 Bed-rooms","Attach bathroom rooms","Non Attach bathroom rooms","AC Room","Halls","VIP Rooms","Non AC Room","3 Bed Rooms","Single bed rooms","Big Halls","Mini Halls","Special VIP rooms");
	foreach($arr as $val)
	{
		if($val == $updrec[room_type])	
		{	
		echo "<option value='$val' selected>$val</option>";
		}
		else
		{
		echo "<option value='$val'>$val</option>";
		}
	}
	?>
        </select>
      </td></tr>
    <tr><th><div align="center"><font color=black>Room capacity :</font></div></th> <td>
      <input type="text" name="capacity" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[room_capacity]; ?>"></td></tr>
    <tr><th><div align="center"><font color=black> Advance :</font></div></th> <td>
      <input type="text" name="advnc" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[advance]; ?>"></td></tr>
    <tr><th> <div align="center"><font color=black>Rent :</font></div></th> <td>
      <input type="text" name="rent" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[rent]; ?>"></td></tr>
    <tr><th><div align="center"><font color=black> Return Ammount:</font></div></th> <td>
      <input type="text" name="retamt" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $updrec[return_amt]; ?>"></td></tr>
    <tr><th><div align="center"><font color=black>Image</font></div></th> <td><input type=file  name="fileimg" />
      <?php
		  if(isset($_GET[updid]))
		  {
			  echo "<br><img src='uploads/$updrec[image]' height='100' width='150' >";
		  }
		  ?></td>
      </tr>
    <tr><th><div align="center"><font color=black>Status:</font> </div></th> <td>
      <select name=sll>
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
