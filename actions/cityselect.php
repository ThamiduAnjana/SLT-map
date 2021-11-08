<?php 

	require_once("db/connection.php");

	$Cityid = $_POST['CityID'];

	//first query (that you want to select)
    $query_one = "SELECT * FROM tb_locations where CityID = $Cityid;";
    //query execute
    $result = mysqli_query($conn, $query_one);
    //Add while loop for first column data display and after display next column
    while ($row = mysqli_fetch_array($result)) {
        //data
        $test = ' <option value="' .$row['LocationID']. '"> ' .$row['Location']. '</option>';

    }

    echo $test;

?>