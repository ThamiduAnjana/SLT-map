<?php

	session_start();

	require_once("../db/connection.php");

	$InputLocationID = $_POST['InputLocationID'];
	$InputLocation = $_POST['InputLocation'];
	$CableSize = $_POST['CableSize'];
	$CitySelect = $_POST['CitySelect'];

	if(!isset($CitySelect) || !isset($CableSize) || !isset($InputLocationID) || !isset($InputLocation)){
		$_SESSION["status"] = "Empty Values.. Please enter your data.";
		header('location: ../includes/dashboard.php');
	}else{
		//first query (that you want to select)
	    $query_one = "INSERT INTO tb_locations(LocationID,Location,CableSize,CityID) VALUES ($InputLocationID,$InputLocation,$CableSize,$CitySelect);";
	    //query execute
	    if(mysqli_query($conn, $query_one)){
	    	$_SESSION["status"] = "Successfully inserted.";
	    	header('location: ../includes/dashboard.php');
	    }else{
	    	$_SESSION["status"] = "Insert failed.";
	    	header('location: ../includes/dashboard.php');
    	}
	}
    
?>