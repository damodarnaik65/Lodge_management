 <?php
 include ("dbconnection.php");
 ?>
 <select name="rmtype3">
        <option>Select Room type</option>
    <?php
     $sqlselect = "SELECT * FROM room_types where status='Enabled' AND lodge_id='$_GET[lodgeid]'";
    $qresult = mysqli_query($dbconnection, $sqlselect);
        while($rs = mysqli_fetch_array($qresult))
        {
            echo "<option value='$rs[room_type_id]'>$rs[room_type]</option>";
        }
        ?>
        </select>