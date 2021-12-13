<?php


	session_start();

	require_once("../db/connection.php");

	$Data_Id = $_POST['Data_ID'];

	if(!isset($Data_Id)){
		$_SESSION["status"] = "Empty Values.. Please enter your data.";
		echo "Empty Values.. Please enter your data.";
	}else{
		//first query (that you want to delete)
	    $query_one = "DELETE FROM tb_sender WHERE ID = $Data_Id;";
	    //query execute
	    if(mysqli_query($conn, $query_one)){
	    	$_SESSION["status"] = "Successfully Deleted.";
	    	echo "Successfully Deleted.";
	    }else{
	    	$_SESSION["status"] = "Delete failed.";
	    	echo "Delete failed. ";
    	}
	}
    
?>