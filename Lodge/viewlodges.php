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
$sqldelete="DELETE from lodges where lodge_id=$_GET[deletid]";
 $qrydel = mysqli_query($dbconnection,$sqldelete);
	if(!$qrydel)
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
$noofrows =10;
$nextrecord = $startpage + $noofrows ;
$previousrecord = $startpage - $noofrows;

if(isset($_POST[btnsearch]))
{
$sqlviewlodge = "SELECT * FROM lodges where lodge_name like '$_POST[lodgename]%' LIMIT $startpage,$noofrows";
}
else
{
$sqlviewlodge = "SELECT * FROM lodges LIMIT $startpage,$noofrows";
}

$viewquery = mysqli_query($dbconnection,$sqlviewlodge);
?>
<!-- content -->
		<div id="content">

		  <div class="container">
            <div class="aside maxheight">
            	<!-- box begin -->
               <div class="box maxheight">
               	<div class="inner">
                  	<h3>Menu</h3>
                     <div class="gallery-images">
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
               	<h2>View lodges</h2>
                <p>
<form method="post" action="">   
<strong>Lodge Name: </strong>
<input type="text" name="lodgename" size="35" value="<?php  /*  Download projects from www.freestudentprojects.com */echo  $_POST[lodgename]; ?>" />
<input type="submit" name="btnsearch" value=" Search "  />
<?php
if(isset($_POST[btnsearch]))
{
echo "<a href='viewlodges.php'><img src='images/x.jpg' width='20' height='20' align='center'></img></a>";
}
?>
</form>   
</p>
<br />
<table width="625" border="1" class="tftable">
  <tr>
  <th width="194" scope="col" bgcolor="#660000"><strong><font size=3>Image</font></strong></th>
    <th width="194" scope="col" bgcolor="#660000"><strong><font size=3>Lodge name</font></strong></th>
    <th width="139" scope="col" bgcolor="#660000"><strong><font size=3>Address</font></strong></th>
    <th width="134" scope="col" bgcolor="#660000"><strong><font size=3>Distance</font></strong></th>
    <th width="130" scope="col" bgcolor="#660000"><strong><font size=3>Status</font></strong></th>
    <th width="130" scope="col" bgcolor="#660000"><strong><font size=3>Action</font></strong></th>
  </tr>
  <?php
  while($rs = mysqli_fetch_array($viewquery))
  {
echo "  <tr>
    <td>&nbsp; <img src='uploads/$rs[image]' height='50' width='75'></img> </td>
    <td>&nbsp;<strong>$rs[lodge_name]</strong></td>
    <td>&nbsp; <strong>$rs[address]</strong></td>
    <td>&nbsp; <strong>$rs[distance]</strong></td>
    <td>&nbsp; <strong>$rs[status]</strong></td>
		  <td><a href='sdmlodges.php?updid=$rs[lodge_id]'>Update</a>  <a href='viewlodges.php?deletid=$rs[lodge_id]' onclick='return ConfirmDelete()'>Delete</td>

  </tr>";
  }
  ?>
  <table width="625" border="1">
  <tr>
    <th height="34" scope="col" bgcolor="#660000">
    <?php
	if( $startpage!= "0")
	{
		if(isset($_GET[lodgename]))
		{
    		echo "<a href='viewlodges.php?lodgename=$_GET[lodgename]&startpage=$previousrecord'><img src='images/adminicons/Previous.png' width=40 height=40 /></a>Previous";
		}
		else
		{
    		echo "<a href='viewlodges.php?startpage=$previousrecord'><img src='images/adminicons/Previous.png' width=40 height=40 /></a>Previous";
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
	if( $noofrows <= mysqli_num_rows($viewquery) )
	{
		if(isset($_GET[lodgename]))
		{
    		echo "Next<a href='viewlodges.php?lodgename=$_GET[lodgename]&startpage=$nextrecord'><img src='images/adminicons/Next.png' width=40 height=40 /></a>";
		}
		else
		{
    		echo "Next<a href='viewlodges.php?startpage=$nextrecord'><img src='images/adminicons/Next.png' width=40 height=40 /></a>";
		}
	}
	else
	{
		echo "Next<img src='images/adminicons/Next.png' width=40 height=40 />";
	}
	?>&nbsp;
    </th>
  </tr>
</table>
</table> </div>
            </div>
            <div class="clear"></div>
         </div>
		</div>
		<?php
		include("footer.php")
		?>
