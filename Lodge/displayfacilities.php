<?php
session_start();
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
    <?php
    $selfacility="SELECT * from lodges";
    $facilityquery=mysqli_query($dbconnection,$selfacility);
    
    if($_GET[lodgeid])
    {
    $sqlfetch=mysqli_query($dbconnection,"select * from facilities where lodge_id='$_GET[lodgeid]'");
    }
    else
    {
    $sqlfetch=mysqli_query($dbconnection,"select * from facilities");
    }
    
    while($sqlroomfetch=mysqli_fetch_array($facilityquery))
    {
    echo "
    <a href='displayfacilities.php?lodgeid=$sqlroomfetch[lodge_id]'><strong>$sqlroomfetch[lodge_name]</strong><br><img src='uploads/$sqlroomfetch[image]' height='75' width='150'></img><br>
    </a><br><hr>";
    }
    ?>     
    </div>
    </div>          
<!-- box end -->
            </div>
            <div class="content">
            	<div class="indent">
               	<h2>Display facilities</h2>
<?php  /*  Download projects from www.freestudentprojects.com */               
while($rs = mysqli_fetch_array($sqlfetch))  
{
	$sqlfetch2=mysqli_query($dbconnection,"select * from lodges where lodge_id='$rs[lodge_id]'");
?>	      
     <table width="604" height="143" border="1"  class="tftable">
    <tr>
    <th width="182" height="98" rowspan="6" scope="col"><img src="uploads/<?php  /*  Download projects from www.freestudentprojects.com */echo $rs[image];?>" width="160" height="132"><br></th>
    </tr>
    <tr>
    <th height="24" align="left" scope="col">Facility:</th>
    <th width="196" height="24" align="left" scope="col">&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $rs[facility];?></th>
    </tr>
    <tr>
    <th height="23" align="left" scope="col">Facility Type:</th>
    <th height="23" align="left" scope="col">&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $rs[facility_type];?></th>
    </tr>
    <tr>
    <th height="23" align="left" scope="col">Description:</th>
    <th height="23" align="left" scope="col">&nbsp;<?php  /*  Download projects from www.freestudentprojects.com */echo $rs[description];?></th>
    </tr>
    </table>
    <hr />
<?php		
}
?>  
</div>
            </div>
            <div class="clear"></div>
         </div>
		</div>
<?php
include("footer.php")
?>