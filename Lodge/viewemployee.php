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

if(isset($_GET[delid]))
{
	$sqldelroom = "DELETE FROM employees where emp_id='$_GET[delid]'";
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
	$sqlviewemployee = "SELECT employees.*,lodges.lodge_name FROM employees INNER JOIN lodges ON lodges.lodge_id=employees.lodge_id where (employees.first_name like '$_POST[empname]%') LIMIT $startpage,$noofrows";
}
else
{
$sqlviewemployee = "SELECT employees.*,lodges.lodge_name FROM employees INNER JOIN lodges ON lodges.lodge_id=employees.lodge_id LIMIT $startpage,$noofrows";
}
$viewquery = mysqli_query($dbconnection,$sqlviewemployee);
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
               	<h2>VIEW EMPLOYEES : </h2>
                <form method="post" action="">   
                  <p><strong>Name:</strong>
                    <input type="text" name="empname" size="35" value="<?php  /*  Download projects from www.freestudentprojects.com */echo  $_POST[empname]; ?>" />
  <input type="submit" name="btnsearch" value=" Search "  />
  <?php
if(isset($_POST[btnsearch]))
{
echo "<a href='viewemployee.php'><img src='images/x.jpg' width='20' height='20' align='center'></img></a>";
}
?>
                  </p>
                  <p>&nbsp;</p>
                </form>   
<table width="618" height="52" border="8" class="tftable">
  <tr>
    <th width="52" height="27" scope="col"  bgcolor="#660000">Lodge</th>
    <th width="104" scope="col" bgcolor="#660000">Name</th>
        <th width="82" scope="col" bgcolor="#660000">Login ID</th>
    <th width="77" scope="col" bgcolor="#660000">Address</th>

    <th width="87" scope="col" bgcolor="#660000">Joined date</th>
    <th width="89" scope="col" bgcolor="#660000">Last login</th>
    
     <th width="89" scope="col" bgcolor="#660000">Action</th>
  </tr>
  <?php
  while($rs = mysqli_fetch_array($viewquery))
  {
echo "  <tr>
    <td>&nbsp;$rs[lodge_name]</td>
    <td>&nbsp;$rs[first_name]&nbsp;$rs[last_name]</td>
	<td>&nbsp;$rs[login_id]</td>
    <td>&nbsp;$rs[emp_adrs]<br> Cnum: $rs[contact_no]</td>
    <td>&nbsp;$rs[join_date]</td>
    <td>&nbsp;$rs[last_login]</td>
    <td>&nbsp;Status : $rs[status] <br><a href='employees.php?updid=$rs[emp_id]'>Update</a> <a href='viewemployee.php?delid=$rs[emp_id]' onclick='return ConfirmDelete()' >delete</td>
  </tr>";
  }
  ?>
    <table width="610" border="1">
  <tr>
    <th height="34" scope="col" bgcolor="#660000">
    <?php
	if( $startpage!= "0")
	{
		if(isset($_GET[lodgename]))
		{
    		echo "<a href='viewemployee.php?lodgename=$_GET[lodgename]&startpage=$previousrecord'><img src='images/adminicons/Previous.png' width=40 height=40 /></a> Previous";
		}
		else
		{
    		echo "<a href=viewemployee.php?startpage=$previousrecord'><img src='images/adminicons/Previous.png' width=40 height=40 /> </a> Previous";
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
	if( $noofrows <= mysqli_num_rows($viewquery) )
	{
		if(isset($_GET[lodgename]))
		{
    		echo "Next  <a href='viewemployeeg.php?lodgename=$_GET[lodgename]&startpage=$nextrecord'><img src='images/adminicons/Next.png' width=40 height=40 /></a>";
		}
		else
		{
    		echo "Next  <a href='viewemployee.php?startpage=$nextrecord'><img src='images/adminicons/Next.png' width=40 height=40 /></a>";
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

