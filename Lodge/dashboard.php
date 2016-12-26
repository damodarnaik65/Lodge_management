<?php
session_start();
if(!isset($_SESSION[empid]))
{
	header("Location: loginpage.php");
} 
include("header.php");
include ("dbconnection.php");
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
               	<h2>DashBoard:</h2>
<table width="100%" border="1" class="tftable">
  <tr >
    <th >
   <h3> Last login Date and Time : <?php  /*  Download projects from www.freestudentprojects.com */echo  $_SESSION[lastlogindate]; ?></h3></th>
  </tr>
</table>
<br><hr /><br>
<table width="100%" border="1" class="tftable">
  <tr>
    <th height="61" >
    <?php
		$sqlexist = "SELECT * FROM employees where status='Enabled'";
	$selectquery=mysqli_query($dbconnection, $sqlexist);
	?>
   <h3> No. of Employees : <?php  /*  Download projects from www.freestudentprojects.com */echo  mysqli_num_rows($selectquery); ?></h3></th>
  </tr>
</table>
<br><hr /><br>
     <table width="100%" border="1" class="tftable">
  <tr>
    <th height="61" >
    <?php
		$sqlexist = "SELECT * FROM rooms where status='Enabled'";
	$selectquery=mysqli_query($dbconnection, $sqlexist);
	?>
   <h3> No. of Rooms : <?php  /*  Download projects from www.freestudentprojects.com */echo  mysqli_num_rows($selectquery); ?></h3></th>
  </tr>
</table>

<br><hr /><br>
     <table width="100%" border="1" class="tftable">
  <tr>
    <th >
    <?php
		$sqlexist = "SELECT * FROM lodges where status='Enabled'";
	$selectquery=mysqli_query($dbconnection, $sqlexist);
	?>
   <h3> No. of Lodges : <?php  /*  Download projects from www.freestudentprojects.com */echo  mysqli_num_rows($selectquery); ?></h3></th>
  </tr>
</table>
<br><hr /><br>
     <table width="100%" border="1" class="tftable">
  <tr>
    <th >
    <?php
		$sqlexist = "SELECT * FROM room_booking where status='Booked'";
	$selectquery=mysqli_query($dbconnection, $sqlexist);
	?>
   <h3> No. of Rooms Booked : <?php  /*  Download projects from www.freestudentprojects.com */echo  mysqli_num_rows($selectquery); ?></h3></th>
  </tr>
</table>
<br><hr /><br>
     <table width="100%" border="1" class="tftable">
  <tr>
    <th >
    <?php
		$sqlexist = "SELECT * FROM visitors where status='Enabled'";
	$selectquery=mysqli_query($dbconnection, $sqlexist);
	?>
   <h3> No. of Visitors : <?php  /*  Download projects from www.freestudentprojects.com */echo  mysqli_num_rows($selectquery); ?></h3></th>
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