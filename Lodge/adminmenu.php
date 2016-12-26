<?php
session_start();
if($_SESSION[empid] == 1)
{
?>

<ul>
                           
                           <li> 
                             <div align="center"><strong><a href="viewlodges.php"><img src="images/adminicons/office-building-icon.png" alt="" width="72" height="72" /></a><br />
                          View Lodges</strong></div>
                          </li>
                           <li> 
                             <div align="center"><strong><a href="sdmlodges.php"><img src="img/Blue_20Office_20Building_20Icon.jpg" alt="" width="74" height="72" /></a><br />
                             Add Lodge</strong></div>
                          </li>
                           <li> <div align="center"><strong><a href="viewroomtypes.php"><img src="images/adminicons/FOwebsite_SinglePreview.png" alt="" width="72" height="63" /></a><br />
                          View Roomtype </strong></div></li>
                           <li>
                             <div align="center"><strong><a href="roomtypes.php"><img src="images/adminicons/add_home.png" alt="" width="77" height="67" /></a><br />
                          Add Roomtype</strong></div>
                          </li>
                             <li> 
                               <div align="center"><strong><a href="viewrooms.php"><img src="images/adminicons/address_icon.png" alt="" width="76" height="74" /></a><br />
                          View Rooms</strong></div>
                          </li>
                           <li>
                             <div align="center"><strong><a href="rooms.php"><img src="img/hotel-icon100.png" alt="" width="71" height="77" /></a><br />
                          Add rooms</strong></div>
                          </li>
                             <li> 
                               <div align="center"><strong><a href="viewfacilities.php"><img src="images/adminicons/icon-facilities.gif" alt="" width="71" height="68" /></a><br />
                          View Facilities</strong></div>
                          </li>
                           <li>
                             <div align="center"><strong><a href="facilities.php"><img src="images/adminicons/developpeople-icon-200.png" alt="" width="79" height="69" /></a><br />
                          Add Facilities</strong></div>
                          </li>
                             <li> <strong><a href="viewemployee.php"><img src="images/adminicons/user_256.png" alt="" width="84" height="69" /></a><br />
                          View Employees</strong></li>
                           <li><strong><a href="employees.php?addemp=set"><img src="images/adminicons/user_accept.png" alt="" width="75" height="72" /></a><br />
                          Add Employees</strong></li>
  
                           <li>
                             <div align="center"><strong><a href="bookroom.php"><img src="img/onlinebookingengine_icon.png" alt="" width="78" height="67" /></a><br />
                          Book Rooms</strong></div>
                          </li>
                          <li>
                            <div align="center"><strong><a href="emproombooking.php"><img src="img/DocumentIcon.png" alt="" width="81" height="68" /></a><br />
                          View _Booking
                            </strong></div>
                          </li>
                             <li>
                               <div align="center"><strong><a href="billingrecord.php"><img src="img/icons-02.png" alt="" width="80" height="71" /></a><br />
                          Billling</strong></div>
                          </li>
                           <li>
                             <div align="center"><strong><a href="viewvisitors.php"><img src="img/(R)Visitor_Reg_Icont.png" alt="" width="76" height="73" /></a><br />
                          Visitors</strong></div>
                          </li>
                             <li> 
                               <div align="center"><strong><a href="employees.php"><img src="images/adminicons/profile.png" alt="" width="72" height="72" /></a><br />
                          Profile</strong></div>
                          </li>
                           <li>
                             <div align="center"><strong><a href="logout.php"><img src="images/adminicons/Cute-Ball-Logoff-icon.png" alt="" width="83" height="72" /></a><br />
                          Logout</strong></div>
                          </li>
                       </ul>
<?php
}
else
{
?>
<ul>
                      <li> 
                         <div align="center"><strong><a href="empdashboard.php"><img src="images/adminicons/empaccount.jpg" alt="" width="76" height="55" /></a><br />
                        My Account</strong></div>
                           
                      </li>
                       <li>
                       <div align="center"><strong><a href="empviewrooms.php"><img src="images/adminicons/address_icon.png" alt="" width="76" height="55" /></a><br />
                        View rooms</strong></div>
                      </li>
                             
  
                       <li>
                         <div align="center"><strong><a href="bookroom.php"><img src="img/onlinebookingengine_icon.png" alt="" width="78" height="67" /></a><br />
                         Book Rooms</strong></div>
                      </li>
                      <li>
                        <div align="center"><strong><a href="viewbooking.php"><img src="img/DocumentIcon.png" alt="" width="81" height="68" /></a><br />
                        View _Booking
                        </strong></div>
                      </li>
                         <li>
                           <div align="center"><strong><a href="billingrecord.php"><img src="img/icons-02.png" alt="" width="80" height="71" /></a><br />
                          Billling</strong></div>
                      </li>
                       <li>
                         <div align="center"><strong><a href="viewvisitors.php"><img src="img/(R)Visitor_Reg_Icont.png" alt="" width="76" height="73" /></a><br />
                         Visitors</strong></div>
                      </li>
                         <li> 
                           <div align="center"><strong><a href="employees.php"><img src="images/adminicons/profile.png" alt="" width="72" height="72" /></a><br />
                          Profile</strong></div>
                      </li>
                       <li>
                         <div align="center"><strong><a href="logout.php"><img src="images/adminicons/Cute-Ball-Logoff-icon.png" alt="" width="83" height="72" /></a><br />
                         Logout</strong></div>
                      </li>
</ul>
<?php
}
?>