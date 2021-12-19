<?php

	session_start();

	require_once("../db/connection.php");

	$InputCityId = $_POST['InputCityID'];
	$InputCity = $_POST['InputCity'];

	if(!isset($InputCityId) || !isset($InputCity)){
		$_SESSION["status"] = "Empty Values.. Please enter your data.";
		header('location: ../includes/dashboard.php');
	}else{
		//first query (that you want to select)
	    $query_one = "INSERT INTO tb_city(CityId,City) VALUES ($InputCityId,$InputCity);";
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