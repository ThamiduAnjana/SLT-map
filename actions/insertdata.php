<?php

	require_once("../db/connection.php");

	$LocationID = $_POST['inputLocationSelect'];

	$InputDate = $_POST['InputDate'];
	$InputCore_No = $_POST['InputCore_No'];
	$InputDestination = $_POST['InputDestination'];
	$InputLoss = $_POST['InputLoss'];
	$InputStatus = $_POST['InputStatus'];
	$InputRemarks = $_POST['InputRemarks'];
	$InputColor = $_POST['InputColor'];

	$DInputDate = $_POST['DInputDate'];
	$DInputCore_No = $_POST['DInputCore_No'];
	$DInputDestination = $_POST['DInputDestination'];
	$DInputLoss = $_POST['DInputLoss'];
	$DInputStatus = $_POST['DInputStatus'];
	$DInputRemarks = $_POST['DInputRemarks'];
	$DInputColor = $_POST['DInputColor'];

	if($InputDate = "" && $InputCore_No = "" && $InputDestination = "" && $InputLoss = "" && $InputStatus = "" && $InputRemarks = "" && $InputColor = "" && $DInputDate = "" && $DInputCore_No = "" && $DInputDestination = "" && $DInputLoss = "" && $DInputStatus = "" && $DInputRemarks = "" && $DInputColor = "" && $LocationID){
		$_SESSION["status"] = "Empty Values.. Please enter your data.";
		header('location: ../index.php');
	}else{
		//first query (that you want to select)
	    $query_one = "INSERT INTO tb_sender(Date, Core_No, Distination, Loss, Status, Remarks, CoreColor, D_Date, D_Core_NO, D_Distination, D_Loss, D_Status, D_Remarks, D_CoreColor, LocationID) VALUES ($InputDate,$InputCore_No,$InputDestination,$InputLoss,$InputStatus,$InputRemarks,$InputColor,$DInputDate,$DInputCore_No,$DInputDestination,$DInputLoss,$DInputStatus,$DInputRemarks,$DInputColor,$LocationID);";
	    //query execute
	    if(mysqli_query($conn, $query_one)){
	    	$_SESSION["status"] = "Successfully inserted.";
	    	header('location: ../index.php');
	    }else{
	    	$_SESSION["status"] = "Fail.";
	    	header('location: ../index.php');
    	}
	}
    
?>