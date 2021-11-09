<?php 

	require_once("../db/connection.php");

	$Cityid = $_POST['City_ID'];

	//first query (that you want to select)
    $query_one = "SELECT * FROM tb_locations where CityID = $Cityid;";
    //query execute
    $result = mysqli_query($conn, $query_one);
    //Add while loop for first column data display and after display next column

    echo "<option>Select Location</option>";

    while ($row = mysqli_fetch_array($result)) {
        //data
        echo "<option value=".$row['LocationID'].">".$row['Location']." (".$row['CableSize'].")</option>";

    }

?>