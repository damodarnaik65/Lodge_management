<?php  
	
	$pagename = basename($_SERVER['PHP_SELF']); 
    date_default_timezone_set("Asia/Kolkata"); 
//echo $_SESSION[bookid]. " " . $_GET[setid];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>LODGING SERVICES</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="description" content="This is a wonderful homepage of the Free Hotel Website Template provided by TemplateMonster."/>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="layout.css" rel="stylesheet" type="text/css" />
<script src="maxheight.js" type="text/javascript"></script>
<!--[if lt IE 7]>
	<link href="ie_style.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="ie_png.js"></script>
   <script type="text/javascript">
       ie_png.fix('.png, #header .row-2, #header .nav li a, #content, .gallery li');
   </script>
<![endif]-->
</head>


<body id="page1" onload="new ElementMaxHeight();">
	<div id="main">
		<!-- header -->
		<div id="header">
			<div class="row-1">
         	<div class="wrapper">
           	  <div class="logo">
               	<h1 align="left"><a href="index.php"><span class="indent"><b>LODGING SERVICES</b></span></a></h1>
                  <div align="left">
                   
              </div>
              
            </div>
         </div>
			<div class="row-2">
         	<div class="indent">
               <!-- header-box begin -->
              <!-- <div class="header-box">-->
           
           <div class="header-box">
 
                  <div class="inner">
<!-- Slider begin -->
<?php
include("slider.php");
?>
<!-- Slider ends here -->                 
                     <ul class="nav">
                     	<li><a href="index.php"
                        <?php
                        if($pagename == "index.php")
						{
                         echo "class='current'";
						 }
						 ?>
						 >Home</a></li>
                        <li><a href="searchrooms.php"
                       <?php
                        if($pagename == "searchrooms.php")
						{
                         echo "class='current'";
						 }
						 ?>
                        >Search Rooms</a></li>
                        <li><a href="displayfacilities.php"
                        <?php
                        if($pagename == "displayfacilities.php")
						{
                         echo "class='current'";
						 }
						 ?>
                        >Facilities</a></li>
                        <li><a href="displayroomtypes.php">Room types</a></li>
                        <li><a href="lodgeimages.php">PHOTO Gallery</a></li>
                        <li><a href="booking.php">CONTACT</a></li>
                    </ul>
             </div>
          </div>
           <!--    
              <img src="images/dk_dharmastala_temple_small.jpg" alt="" width="951" height="310" />
              
               <div class="inner">
          <ul class="nav">
                     	<li><a href="index.php" class="current">Home</a></li>
                        <li><a href="searchrooms.php">SEARCH ROOMS</a></li>
                        <li><a href="gallery.php">Lodges</a></li>
                        <li><a href="restaurant.php">Restaurant</a></li>
                        <li><a href="testimonials.php">Testimonials</a></li>
                        <li><a href="booking.php">Booking</a></li>
        </ul>
              </div>
              </div>
              -->
               <!-- header-box end -->
          </div>
         </div>
         
