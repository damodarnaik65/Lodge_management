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
	$sqldelete = "DELETE FROM visitors where visitor_id='$_GET[delid]'";
	$delquery = mysqli_query($dbconnection,$sqldelete);
	if(!$delquery)
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
$sqlviewvisitor ="SELECT * FROM visitors where email_id like '$_POST[visitname]%'  LIMIT $startpage,$noofrows";;
}
else
{
$sqlviewvisitor="SELECT * from visitors  LIMIT $startpage,$noofrows";
}
$viewquerycon=mysqli_query($dbconnection,$sqlviewvisitor);
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
<h2> YOUR PROFILE :</h2>
 <form method="post" action="">   
   <p>Name:
  <input type="text" name="visitname" size="35" value="<?php  /*  Download projects from www.freestudentprojects.com */echo  $_POST[visitname]; ?>" />
  <input type="submit" name="btnsearch" value=" Search "  />
  <?php
if(isset($_POST[btnsearch]))
{
echo "<a href='viewvisitors.php'><img src='images/Refresh-icon.png' width='20' height='20' align='center'></img></a>";
}
?>
     
     
   </p>
   <p>&nbsp;</p>
 </form>   
<table width="626" height="83" border="8">
  <tr>
    <th width="83" height="36" scope="col" bgcolor="#660000">Visitor Name</th>
    <th width="116" scope="col" bgcolor="#660000">Email ID</th>
    <th width="88" scope="col" bgcolor="#660000">Date of birth</th>
    <th width="88" scope="col" bgcolor="#660000">Address</th>
    <th width="88" scope="col" bgcolor="#660000">Contact No</th>
    <th width="83" scope="col" bgcolor="#660000">Mobile No</th>
   
    <th width="82" scope="col" bgcolor="#660000">Action</th>
  </tr>
  
 <?php
  while($res = mysqli_fetch_array($viewquerycon))
  {
echo "  <tr>
    <td>$res[fname] &nbsp; $res[lname]</td>
    <td>&nbsp; $res[email_id]</td>
    <td>&nbsp; $res[dob]</td>
	 <td>&nbsp; $res[visit_adrs]</td>
	  <td>&nbsp; $res[contact_num]</td>
	   <td>&nbsp; $res[mobile_no]</td>
	    <td>&nbsp;Status: $res[status] <BR>
<a href='visitors.php?updid=$res[visitor_id]'>Update</a>| <a href='viewvisitors.php?delid=$res[visitor_id]' onclick='return ConfirmDelete()'>Delete</td>
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
    		echo "<a href='viewvisitors.php?lodgename=$_GET[lodgename]&startpage=$previousrecord'><img src='images/adminicons/Previous.png' width=50 height=50 /> Previous</a>";
		}
		else
		{
    		echo "<a href='viewvisitors.php?startpage=$previousrecord'><img src='images/adminicons/Previous.png' width=50 height=50 /> Previous</a>";
		}
	}
	else
	{
		echo "<img src='images/adminicons/Previous.png' width=50 height=50 /> Previous";
	}
	?>
        </th>
    <th scope="col">&nbsp;</th>
    <th scope="col" bgcolor="#660000">
    <?php
	if( $noofrows <= mysqli_num_rows($viewquerycon) )
	{
		if(isset($_GET[lodgename]))
		{
    		echo "Next  <a href='viewvisitors.php?lodgename=$_GET[lodgename]&startpage=$nextrecord'><img src='images/adminicons/Next.png' width=50 height=50 /></a>";
		}
		else
		{
    		echo "Next  <a href='viewvisitors.php?startpage=$nextrecord'><img src='images/adminicons/Next.png' width=50 height=50 /></a>";
		}
	}
	else
	{
		echo "Next  <img src='images/adminicons/Next.png' width=50 height=50 />";
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
