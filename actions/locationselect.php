<?php 

	require_once("../db/connection.php");

	$Locationid = $_POST['Location_ID'];

	//first query (that you want to select)
    $query_one = "SELECT * FROM tb_locations where LocationID = $Locationid;";
    //query execute
    $result = mysqli_query($conn, $query_one);
    //Add while loop for first column data display and after display next column

    if($result){
        $row = mysqli_fetch_array($result);
        //data
        $test = $row['CableSize'];
        echo $test;

    }
    
?>
