<?php
session_start();
include ("dbconnection.php");
if(!isset($_SESSION[empid]))
{
	header("Location: loginpage.php");
} 

	//Retrieve Employee details
	$selrecemp ="SELECT * from employees where emp_id='$_SESSION[empid]'";
	$selqueryemp=mysqli_query($dbconnection,$selrecemp);
	$rsfetchemp=mysqli_fetch_array($selqueryemp);

	//Retrieve Lodge details
	$sellodges ="SELECT * from lodges where lodge_id='$rsfetchemp[lodge_id]'";
	$qlodges=mysqli_query($dbconnection,$sellodges);
	$rslodges=mysqli_fetch_array($qlodges);
	
	

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
               	<h2>My Account:</h2>
                <table width="100%" border="1" class="tftable">
  <tr>
    <td >
   <h3> Welcome Mr. <?php  /*  Download projects from www.freestudentprojects.com */echo  $rsfetchemp[first_name] .  " " . $rsfetchemp[last_name]; ?></h3></td>
  </tr>
</table>
<br><hr /><br>
<table width="100%" border="1" class="tftable">
  <tr>
    <td >
   <h3> Last login Date and Time : <?php  /*  Download projects from www.freestudentprojects.com */echo  $_SESSION[lastlogindate]; ?></h3></td>
  </tr>
</table>
<br><hr /><br>


				<p>
                     <table width="100%" border="1" class="tftable">
                      <tr>
                        <td >
                          <h2> <u>Employee details </u></h2>
                       <h3> Name : <?php  /*  Download projects from www.freestudentprojects.com */echo $rsfetchemp[first_name] . " "  . $rsfetchemp[last_name]; ?> </h3>
                       <h3> Address : <?php  /*  Download projects from www.freestudentprojects.com */echo $rsfetchemp[emp_adrs] ; ?> </h3>
                       <h3> Contact No. : <?php  /*  Download projects from www.freestudentprojects.com */echo $rsfetchemp[contact_no] ; ?> </h3>                       
                       </td>
                      </tr>
                    </table>
                </p><br><hr />  
 <table width="100%" border="1" class="tftable">
  <tr>
    <td >
    <?php
		$sqlexist = "SELECT * FROM employees where status='Enabled'";
	$selectquery=mysqli_query($dbconnection, $sqlexist);
	?>
   <h3> Lodge name : <?php  /*  Download projects from www.freestudentprojects.com */echo $rslodges[lodge_name]; ?></h3></td>
  </tr>
</table>
             
				<p>
                     <table width="100%" border="1" class="tftable">
                      <tr>
                        <td >
                       <h2> <u>Lodge details </u></h2>
                      	<img src='uploads/<?php  /*  Download projects from www.freestudentprojects.com */echo $rslodges[image]; ?>' align='left' width="100" height="100"  />
                       <h3> Lodge name : <?php  /*  Download projects from www.freestudentprojects.com */echo $rslodges[lodge_name]; ?> </h3>   
                       <h3> Lodge name : <?php  /*  Download projects from www.freestudentprojects.com */echo $rslodges[address]; ?> </h3> 
                       <h3> Lodge name : <?php  /*  Download projects from www.freestudentprojects.com */echo $rslodges[distance]; ?> </h3> 
                                     
                       </td>
                      </tr>
                    </table>
                </p>    
                <p>
                     <table width="100%" border="1" class="tftable">
                      <tr>
                        <td >
                       <h2> <u>Room types </u></h2>
                       <?php
							//Retrieve Lodge details
							$sroom_types ="SELECT * from room_types where lodge_id='$rsfetchemp[lodge_id]'";
							$qroom_types=mysqli_query($dbconnection,$sroom_types);
							while($rsroom_types=mysqli_fetch_array($qroom_types))
							{
					   ?>
                       		<h3> <img src='uploads/<?php  /*  Download projects from www.freestudentprojects.com */echo $rsroom_types[image]; ?>' align='left' width="30" height="30"  /><?php  /*  Download projects from www.freestudentprojects.com */echo $rsroom_types[room_type]; ?> </h3>   
							<?php
                            }
                            ?>                                     
                       </td>
                      </tr>
                    </table>
                </p>   
                <p>
                     <table width="100%" border="1" class="tftable">
                      <tr>
                        <td >
                       <h2> <u>Facilities availabe </u></h2>
                       <?php
							//Retrieve Lodge details
							$sroom_types ="SELECT * from facilities where lodge_id='$rsfetchemp[lodge_id]'";
							$qroom_types=mysqli_query($dbconnection,$sroom_types);
							while($rsroom_types=mysqli_fetch_array($qroom_types))
							{
					   ?>
                       		<h3> <img src='uploads/<?php  /*  Download projects from www.freestudentprojects.com */echo $rsroom_types[image]; ?>' align='left' width="30" height="30"  /><?php  /*  Download projects from www.freestudentprojects.com */echo $rsroom_types[facility] . " - " .$rsroom_types[facility_type] ; ?> </h3>   
							<?php
                            }
                            ?> 
                                     
                       </td>
                      </tr>
                    </table>
                    </p>
<p>                    
<table width="100%" border="1" class="tftable">
  <tr>
    <td >
    <?php
		$sqlexist = "SELECT     rooms.*, lodges.lodge_id
FROM         lodges INNER JOIN
                      room_types ON lodges.lodge_id = room_types.lodge_id INNER JOIN
                      rooms ON room_types.room_type_id = rooms.room_type_id
WHERE     (lodges.lodge_id = '$rsfetchemp[lodge_id]')";
	$selectquery=mysqli_query($dbconnection, $sqlexist);
	?>
   <h3> No. of Rooms in <?php  /*  Download projects from www.freestudentprojects.com */echo $rslodges[lodge_name]; ?> : <?php  /*  Download projects from www.freestudentprojects.com */echo  mysqli_num_rows($selectquery); ?></h3></td>
  </tr>
</table>     
                </p>                
               </div>
            </div>
            <div class="clear"></div>
         </div>
		</div>
		<?php
		include("footer.php")
		?>