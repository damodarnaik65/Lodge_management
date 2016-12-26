<?php
session_start();
include("dbconnection.php");
if(!isset($_SESSION[empid]))
{
	header("Location: loginpage.php");
} 

	//Retrieve Employee details
	$selrecemp ="SELECT * from employees where emp_id='$_SESSION[empid]'";
	$selqueryemp=mysqli_query($dbconnection,$selrecemp);
	$rsfetchemp=mysqli_fetch_array($selqueryemp);


	if(isset($_POST[submit]))
	{
		$sqlins="INSERT INTO visitors(fname,lname,visit_adrs,contact_num,mobile_no,email_id) values('$_POST[ffname]','$_POST[llname]','$_POST[addrs]','$_POST[cnum]','$_POST[mnum]','$_POST[email]')";
		
				if(!mysqli_query($dbconnection, $sqlins))
				{
				echo "Problem in SQL Statement". mysqli_error($dbconnection);
				}
				else
				{
					$visitorid =  mysqli_insert_id($dbconnection);
					
					if($_SESSION[empid] == 1)
					{
					header("Location: index.php?visitorid=$visitorid");
					}
					else
					{
					header("Location: lodgedetails.php?lodgeid=$rsfetchemp[lodge_id]&visitorid=$visitorid");
					}
				}	
	}

include("header.php");
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
               	<h2>Room booking</h2>
            <p>
            <form method="post" action="">
            <table width="567" height="287" border="1" class="tftable">
  <tr>
    <th>First Name</th>
    <td><input name="ffname" type="text" size="40" /></td>
  </tr>
  <tr>
    <th>Last Name</th>
    <td><input name="llname" type="text" size="40" /></td>
  </tr>
  <tr>
    <th>Address</th>
    <td><textarea name="addrs" cols="40" rows="3"></textarea></td>
  </tr>
  <tr>
    <th>Contact Number</th>
    <td><input name="cnum" type="text" size="40" /></td>
  </tr>
  <tr>
    <th>Mobile Number</th>
    <td><input name="mnum" type="text" size="40" /></td>
  </tr>
  <tr>
     <th>Email-ID</th>
    <td><input name="email" type="text" size="40" /></td>
  </tr>
  <tr>
    <th colspan="2" align="center"><center><input name="submit" type="submit" value="SUBMIT" /></center></th>
    </tr>
</table></form>

            </p>
               </div>
            </div>
            <div class="clear"></div>
         </div>
		</div>
		<?php
		include("footer.php")
		?>