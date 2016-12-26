<?php
session_start();
include("header.php");
include("dbconnection.php");
?>
<!-- content -->
<div id="content">

<div class="container">
<div class="aside maxheight">
<!-- box begin -->
    <div class="box maxheight">
    <div class="inner">
<?php
$sqlfetch2=mysqli_query($dbconnection,"select * from lodges");
	while($rs = mysqli_fetch_array($sqlfetch2))  
	{
?>	               
	<table width="617" border="1" class="tftable">
<tr>

<th width="178" align="left" scope="col">&nbsp;
<?php  /*  Download projects from www.freestudentprojects.com */echo $rs[lodge_name];?>
<a href='displayroomtypes.php?lodgeid=<?php  /*  Download projects from www.freestudentprojects.com */echo $rs[lodge_id]; ?>'>
<img  src="uploads/<?php  /*  Download projects from www.freestudentprojects.com */echo $rs[image]; ?>" width="160" height="134"/></a>
</th>
</tr>
</table>
<hr />
<?php
		}
?>
    </div>
    </div>          
<!-- box end -->
            </div>
            <div class="content">
            	<div class="indent">
               	<h2>ROOM TYPES</h2>
<?php
if(isset($_GET[lodgeid]))
{
$sqlfetch=mysqli_query($dbconnection,"select * from room_types where lodge_id='$_GET[lodgeid]'");
}
else
{
$sqlfetch=mysqli_query($dbconnection,"select * from room_types");
}
while($rs = mysqli_fetch_array($sqlfetch))  
{

	$sqlfetch2=mysqli_query($dbconnection,"select * from rooms where room_type_id='$rs[room_type_id]'");

	if(mysqli_num_rows($sqlfetch2) >= $_POST[norooms])
	{
?>	               
	<table width="617" border="1" class="tftable">
<tr>
<th width="182" height="98" rowspan="6" scope="col"><img src="uploads/<?php  /*  Download projects from www.freestudentprojects.com */echo $rs[image];?>" width="160" height="132"><br></th>
<th width="138" height="24" align="left" scope="col">Lodge name:</th>
<?php
$sqlfetch1=mysqli_query($dbconnection,"select * from lodges where  lodge_id='$rs[lodge_id]'");
$rs1 = mysqli_fetch_array($sqlfetch1);
?>
<th width="178" align="left" scope="col">&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $rs1[lodge_name];?></th>
<th width="91" rowspan="6" scope="col" >

<form method="get" action="viewlodgerooms.php">
 <input type="hidden" name="lodgeid" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $rs[lodge_id]; ?>" />
 <input type="hidden" name="roomtypeid" value="<?php  /*  Download projects from www.freestudentprojects.com */echo $rs[room_type_id]; ?>" />
 <input type="hidden" name="fdate" value="<?php  /*  Download projects from www.freestudentprojects.com */echo date("Y-m-d"); ?>" /> 
 <input type="hidden" name="tdate" value="<?php  /*  Download projects from www.freestudentprojects.com */echo date("Y-m-d"); ?>" />   
<input type=submit name="submit" value="Book Room" class="fsSubmitButton" >
</form>
</th>
</tr>
<tr>
<th height="24" align="left" scope="col">Room type:</th>
<th height="24" align="left" scope="col">&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $rs[room_type];?></th>
</tr>
<tr>
<th height="23" align="left" scope="col">Advance:</th>
<th height="23" align="left" scope="col">&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $rs[advance];?></th>
</tr>
<tr>
<th height="23" align="left" scope="col">Rent:</th>
<th height="23" align="left" scope="col">&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $rs[rent];?></th>
</tr>
<tr>
<th height="23" align="left" scope="col">Return:</th>
<th height="23" align="left" scope="col">&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $rs[return_amt];?></th>
</tr>
<tr>
<th height="23" align="left" scope="col">Rooms availabe: </th>
<th height="23" align="left" scope="col">&nbsp; <?php	echo mysqli_num_rows($sqlfetch2); ?>
</th>
</tr>
</table>
<hr />
<?php
		}
}
?>
</div>
            </div>
            <div class="clear"></div>
         </div>
		</div>
<?php
include("footer.php")
?>