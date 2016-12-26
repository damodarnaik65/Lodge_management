<?php
session_start();
if(!isset($_SESSION[empid]))
{
	header("Location: loginpage.php");
} 
include("header.php");
?>
<script>
    function ConfirmDelete()
	{
		var result = confirm("Are you sure want to delete this record?");
		if (result==true) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>
<?php
include("dbconnection.php");
if(isset($_GET[deletid]))
{
	$sqldelete="DELETE from facilities where facility_id=$_GET[deletid]";
	$sqlquery=mysqli_query($dbconnection,$sqldelete);
	if(!$sqlquery)
	{
		echo "Unable to delete record";
	}
	else
	{
		echo "Record deleted successfully...";
	}
}

if(isset($_GET[startpage]))
{
	$startpage = $_GET[startpage];
}
else
{
$startpage = 0;
}
$noofrows = 10;
$nextrecord = $startpage + $noofrows ;
$previousrecord = $startpage - $noofrows;

if(isset($_POST[lodgename]))
{
$sqlviewfacility="SELECT facilities.*,lodges.lodge_name from facilities INNER JOIN lodges ON lodges.lodge_id=facilities.lodge_id where facilities.lodge_id  like '$_POST[lodgename]' and facilities.status='Enabled'  LIMIT $startpage,$noofrows";
}
else
{
$sqlviewfacility="SELECT facilities.*,lodges.lodge_name from facilities INNER JOIN lodges ON lodges.lodge_id=facilities.lodge_id and facilities.status='Enabled'  LIMIT $startpage,$noofrows";
}
$viewquerycon1=mysqli_query($dbconnection,$sqlviewfacility);
?>
<!-- content -->
<style type="text/css">
#content .container .content .indent .tftable tr th {
	color: #FFF;
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
               	<h2>VIEW FACILITIES</h2>
       <form method="post" action="">
               	<p>
                <strong>Lodge Name 
               	  <select name="lodgename" id="lodgename">
                  <option>Select</option>
     	<?php
				  $sql = "SELECT * from lodges where status='Enabled'";
				  $qresult = mysqli_query($dbconnection,$sql);
				  while($rs = mysqli_fetch_array($qresult))
				  {
				  echo "<option value='$rs[lodge_id]'>$rs[lodge_name]</option>";
				  }
				  ?>
                  </select>
        <input type="submit" value="Search"  name="btnsearch"/>
        </form>
       <?php
if(isset($_POST[btnsearch]))
{
echo "<a href='viewfacilities.php'><img src='images/x.jpg' width='20' height='20' align='center'></img></a>";
}
?>
        </form> <br />   
<table width="616" border="2" class="tftable">
  <tr>
  	<th width="61" scope="col" bgcolor="#660000">Lodge Name</th>
    <th width="97" scope="col" bgcolor="#660000">Facility</th>
    <th width="80" scope="col" bgcolor="#660000">Facility type</th>
    <th width="95" scope="col" bgcolor="#660000">Description</th>
    <th width="73" scope="col" bgcolor="#660000">Image</th>
    <th width="71" scope="col" bgcolor="#660000">Status</th>
    <th width="101" scope="col" bgcolor="#660000">Action</th>
  </tr>
  
  
 <?php
  while($res = mysqli_fetch_array($viewquerycon1))
  {
echo "  <tr>

 <td>$res[lodge_name]</td>
    <td>$res[facility]</td>
    <td>&nbsp; $res[facility_type]</td>
    <td>&nbsp; $res[description]</td>
    <td>&nbsp;<img src='uploads/$res[image]' height=50 width=60> </td>
	 <td>&nbsp; $res[status]</td>
	 <td><a href='facilities.php?updid=$res[facility_id]'>Update</a> |<a href='viewfacilities.php?deletid=$res[facility_id]'  onclick='return ConfirmDelete()'>Delete</td>
  </tr>";
  }
  ?>
  <table width="616" border="1">
  <tr>
    <th height="34" scope="col" bgcolor="#660000">
    <?php
	if( $startpage!= "0")
	{
		if(isset($_GET[lodgename]))
		{
    		echo "<a href='viewfacilities.php?lodgename=$_GET[lodgename]&startpage=$previousrecord'><img src='images/adminicons/Previous.png' width=40 height=40 /></a> Previous";
		}
		else
		{
    		echo "<a href=viewfacilities.php?startpage=$previousrecord'><img src='images/adminicons/Previous.png' width=40 height=40 /> </a> Previous";
		}
	}
	else
	{
		echo "<img src='images/adminicons/Previous.png' width=40 height=40 /> Previous";
	}
	?>
        </th>
    <th scope="col">&nbsp;</th>
    <th scope="col" bgcolor="#660000">
    <?php
	if( $noofrows <= mysqli_num_rows($viewquerycon1) )
	{
		if(isset($_GET[lodgename]))
		{
    		echo "Next  <a href='viewfacilities.php?lodgename=$_GET[lodgename]&startpage=$nextrecord'><img src='images/adminicons/Next.png' width=40 height=40 /></a>";
		}
		else
		{
    		echo "Next  <a href='viewfacilities.php?startpage=$nextrecord'><img src='images/adminicons/Next.png' width=40 height=40 /></a>";
		}
	}
	else
	{
		echo "Next  <img src='images/adminicons/Next.png' width=40 height=40 />";
	}
	?>&nbsp;
    </th>
  </tr>
</table>

</table>
  </div>
            </div>
            <div class="clear"></div>
         </div>
		</div>
		<?php
		include("footer.php")
		?>