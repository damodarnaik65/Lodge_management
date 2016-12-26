<?php  /*  Download projects from www.freestudentprojects.com */
include("header.php");
include("dbconnection.php");
?>

		<!-- content -->
		<div id="content">
      	<div class="gallery">
            <ul>
                <?php
				$selfacility="SELECT * from lodges";
				$facilityquery=mysqli_query($dbconnection,$selfacility);
				   while($sqlroomfetch=mysqli_fetch_array($facilityquery))
				   {					   
						echo "<a href='lodgeimages.php?lodgeid=$sqlroomfetch[lodge_id]'><strong></strong>
						<img src='uploads/$sqlroomfetch[image]' height='100'></img>
						</a>";
				   }
         		?>   
            </ul>
         </div>
			<div class="container">
            <?php
			if(isset($_GET[lodgeid]))
			{
			?>
            <div class="aside maxheight">
            	<!-- box begin -->
               <div class="box maxheight">
               	<div class="inner">
                  	<h3>Browse Images</h3>
                     <div class="gallery-images">
                        <ul>
			<?php
            $selfacility1="SELECT * FROM lodges INNER JOIN room_types ON lodges.lodge_id=room_types.lodge_id 
            INNER JOIN rooms  ON room_types.room_type_id=rooms.room_type_id where lodges.lodge_id='$_GET[lodgeid]'
ORDER BY `rooms`.`room_id` ASC";
            $facilityquery1=mysqli_query($dbconnection,$selfacility1);
               while($sqlroomfetch1=mysqli_fetch_array($facilityquery1))
               {		
                        if($sqlroomfetch1[room_image] !="")
                        {
                    echo "<li> <a href='lodgeimages.php?lodgeid=$_GET[lodgeid]&roomid=$sqlroomfetch1[room_id]'><img src='uploads/$sqlroomfetch1[room_image]' width='80' height='60' /></a></li>";
                        }
               }
            ?>                           
                        </ul>
                     </div>
                  </div>
               </div>
               <!-- box end -->
            </div>
            <div class="content">
            	<div class="indent">
               	<h2>Lodge’s picture gallery</h2>
                  <div class="gallery-main png">
                  <?php
            $sqlimg="SELECT * FROM rooms where room_id='$_GET[roomid]' ";
            $rsimg=mysqli_query($dbconnection,$sqlimg);
			$simg=mysqli_fetch_array($rsimg);
			/*
               {		
                        if($sqlroomfetch1[room_image] !="")
                        {
                    echo "<li> <a href='lodgeimages.php?lodgeid=$_GET[lodgeid]&roomid=$sqlroomfetch1[room_id]'><img src='uploads/$sqlroomfetch1[room_image]' width='80' height='60' /></a></li>";
                        }
               }
			   */
            ?>     
             
                  	<div class="inner"><img src="uploads/<?php  /*  Download projects from www.freestudentprojects.com */echo $simg[room_image]; ?>" alt="" width="587" height="408" />
                  	  <div class="prev"><a href="#"><img alt="" src="images/prev.png" class="png" /></a></div>
                        <div class="next"><a href="#"><img src="images/next.png" alt="" width="32" height="411" class="png" /></a></div>
                     </div>
                  </div>
               </div>
            </div>
            <?php
			}
			?>
            <div class="clear"></div>
         </div>
		</div>
		<?php
		include("footer.php")
		?>