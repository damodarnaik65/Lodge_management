<?php
include("header.php");
include("dbconnection.php");
?>
		<!-- content -->
		<div id="content">
			<div class="wrapper">
            <div class="aside maxheight">
            	<!-- box begin -->
              <?php
			  include("leftsidebar.php");
			   ?>
               <!-- box end -->
            </div>
            <div class="content">
            	<div class="indent">
               	<h2>We offer several kinds of rooms</h2>
                  <div class="container">
<?php
$qresult=mysqli_query($dbconnection,"SELECT * FROM lodges where status='Enabled'");
while($rs=mysqli_fetch_array($qresult))
{
	if($i==1)
	{
?>                 

                  	<div class="col-1">                     	
                        <dl class="list1">
                        &nbsp;&nbsp;&nbsp;  <img alt="<?php echo $rs[lodge_name]; ?>" src="uploads/<?php echo $rs[image]; ?>" class="extra-img png" width="195" height="134"/>
                          <dt><?php echo $rs[lodge_name]; ?></dt>
                           <dd>Address: <?php echo $rs[address]; ?></dd>
                           <dd>Distance from Temple : <br /><?php echo $rs[distance]; ?></dd>
                            <dd>Facilities: 
                              <?php  
							$qresult1 = mysqli_query($dbconnection,"SELECT * FROM facilities where lodge_id='$rs[lodge_id]' AND status = 'Enabled'");
							while($rs1 = mysqli_fetch_array($qresult1))
							{
							echo $rs1[facility] . ", ";
							}
							?></dd>
                        </dl>
                        <div class="button"><span><span>
                        <?php
						if(isset($_GET[visitorid]))
						{
						?>
                        <a href="lodgedetails.php?lodgeid=<?php echo $rs[lodge_id] . "&visitorid=" .$_GET[visitorid]; ?>">Book Room</a>
                        <?php
						}
						else
						{
						?>
                        <a href="lodgedetails.php?lodgeid=<?php echo $rs[lodge_id]; ?>">Book Room</a>
                        <?php
						}
						?>
                        </span></span></div>
                     </div>
              
<?php
		$i=1;
	}
	else
	{
?>                  

                     <div class="col-2">                     	
                        <dl class="list1">
                        &nbsp;&nbsp;&nbsp;  	<img alt="<?php echo $rs[lodge_name]; ?>" src="uploads/<?php echo $rs[image]; ?>" class="extra-img png" width="205"  height="134"/>
                           <dt><?php echo $rs[lodge_name]; ?></dt>
                           <dd>Address: <?php echo $rs[address]; ?></dd>
                           <dd>Distance from Temple : <br /><?php echo $rs[distance]; ?></dd>
                            <dd>Facilities: 
                              <?php 
							$qresult1 = mysqli_query($dbconnection,"SELECT * FROM facilities where lodge_id='$rs[lodge_id]' AND status = 'Enabled'");
							while($rs1 = mysqli_fetch_array($qresult1))
							{
							echo $rs1[facility]. ", ";
							}
							?>
                            </dd>
                        </dl>
                         <div class="button"><span><span>
                         <?php
						if(isset($_GET[visitorid]))
						{
						?>
                        <a href="lodgedetails.php?lodgeid=<?php echo $rs[lodge_id] . "&visitorid=" .$_GET[visitorid]; ?>">Book Room</a>
                        <?php
						}
						else
						{
						?>
                        <a href="lodgedetails.php?lodgeid=<?php echo $rs[lodge_id]; ?>">Book Room</a>
                        <?php
						}
						?>
                         </span></span></div>
                     </div>
                    <p>
                    
                      <?php
		$i=0;

	}
}
?>
                    </p>
                     <div class="clear"></div>
                  </div>
               </div>
            </div>
         </div>
		</div>

        <?php
include("footer.php");
?>