<?php  /*  Download projects from www.freestudentprojects.com */
session_start();
if(!isset($_SESSION[visitid]))
{
	header("Location: visitlogin.php");
} 
include("header.php");
include ("dbconnection.php");
$updselrec = "SELECT * FROM visitors where visitor_id='$_SESSION[visitid]'";
$updquery = mysqli_query($dbconnection, $updselrec);
$updrec = mysqli_fetch_array($updquery);
?>
		<!-- content -->
		<div id="content">

		  <div class="container">
            <div class="aside maxheight">
            	<!-- box begin -->
               <div class="box maxheight">
               	<div class="inner">
 <?php
 include("visitorsidebar.php");
 ?>
                  </div>
               </div>
               <!-- box end -->
            </div>
            <div class="content">
            	<div class="indent">
               	<h2>USER PANEL</h2>
                 <hr />
                    <h5>
                    	<?php
						echo "Welcome " . $updrec[fname] . " ". $updrec[lname];
						?>
                    </h5>
                    <hr />
               </div>
            </div>
            <div class="clear"></div>
         </div>
		</div>
		<?php
		include("footer.php")
		?>