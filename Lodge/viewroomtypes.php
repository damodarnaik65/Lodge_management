<?php
session_start();
if(!isset($_SESSION[empid]))
{
	header("Location: loginpage.php");
} 
include("header.php")
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
<?php  /*  Download projects from www.freestudentprojects.com */
include("dbconnection.php");

if(isset($_GET[delid]))
{
	$sqldelroom = "DELETE FROM room_types where room_type_id='$_GET[delid]'";
	$qrydel = mysqli_query($dbconnection,$sqldelroom);
	if(!$qrydel)
	{
		echo "Unable to delete record";
	}
	else
	{
		echo "Record deleted successfully...";
	}
} 

//Pagination starts here
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
//Pagination ends here

 if(isset($_GET[lodgename]))
 {
	 $sqlviewroom="SELECT room_types.*,lodges.lodge_name from room_types INNER JOIN lodges ON lodges.lodge_id=room_types.lodge_id where room_types.lodge_id = '$_GET[lodgename]' and room_types.status='Enabled'  LIMIT $startpage,$noofrows";
 }
 else
 {
$sqlviewroom="SELECT room_types.*,lodges.lodge_name from room_types INNER JOIN lodges ON lodges.lodge_id=room_types.lodge_id and room_types.status='Enabled'  LIMIT $startpage,$noofrows";
 }
$querycon=mysqli_query($dbconnection,$sqlviewroom);
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
               	<h2> View Room-Types</h2>
              <form method="get" action="">
               	<p>
                <strong>Lodge Name 
           	    <label for="lodgename"></label>
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
                <input type="submit" name="searchlodge" value="Submit" />	
               	</strong>
                </p>
                </form>
<table width="614" border="1" class="tftable">
  <tr>
    <th width="81" height="24" scope="col" bgcolor="#660000">Lodge Name</th>
    <th width="144" scope="col" bgcolor="#660000">Room type</th>
    <th width="59" scope="col" bgcolor="#660000">Room capacity</th>
    <th width="96" scope="col" bgcolor="#660000">Tariff details</th>
    <th width="96" scope="col" bgcolor="#660000">Action</th>
  </tr>
  <?php
  while($result=mysqli_fetch_array($querycon))
  {
	  echo "
	  <tr>
    <td>&nbsp; $result[lodge_name]</td>
    <td>&nbsp;$result[room_type]<br>
	<img src='uploads/$result[image]' height='50' width='60'>
	</td>
    <td>&nbsp;$result[room_capacity]</td>
    <td>&nbsp;Advance: $result[advance]<br>
	&nbsp;Room rent: $result[rent]<br>
	&nbsp;Return amt: $result[return_amt]</td>
    <td>Status: $result[status]<br>
	<a href='roomtypes.php?updid=$result[room_type_id]'>Update</a> | <a href='viewroomtypes.php?delid=$result[room_type_id]' onclick='return ConfirmDelete()'>Delete</a></td>
  </tr>";
  }
  ?>
</table>

<table width="595" border="1" >
  <tr>
    <th height="34" scope="col" bgcolor="#660000">
    <?php
	if( $startpage!= "0")
	{
		if(isset($_GET[lodgename]))
		{
    		echo "<a href='viewroomtypes.php?lodgename=$_GET[lodgename]&startpage=$previousrecord'><img src='images/adminicons/Previous.png' width=40 height=40 /></a>Previous";
		}
		else
		{
    		echo "<a href='viewroomtypes.php?startpage=$previousrecord'><img src='images/adminicons/Previous.png' width=40 height=40 /></a>Previous";
		}
	}
	else
	{
		echo "<img src='images/adminicons/Previous.png' width=40 height=40 />Previous";
	}
	?>
    </th>
    <th scope="col">&nbsp;</th>
    <th scope="col" bgcolor="#660000">
    <?php
	if( $noofrows <= mysqli_num_rows($querycon) )
	{
		if(isset($_GET[lodgename]))
		{
    		echo "Next  <a href='viewroomtypes.php?lodgename=$_GET[lodgename]&startpage=$nextrecord'><img src='images/adminicons/Next.png' width=40 height=40 /></a>";
		}
		else
		{
    		echo "Next <a href='viewroomtypes.php?startpage=$nextrecord'><img src='images/adminicons/Next.png' width=40 height=40 /></a>";
		}
	}
	else
	{
		echo "Next <img src='images/adminicons/Next.png' width=40 height=40 />";
	}
	?>&nbsp;
    </th>
  </tr>
</table>

  </div>
            </div>
            <div class="clear"></div>
         </div>
		</div>
		<?php
		include("footer.php")
		?>
