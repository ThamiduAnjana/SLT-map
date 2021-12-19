<?php

	session_start();

	require_once("../db/connection.php");

	$ID = $_POST['inputid'];
  	$S_Date = $_POST['M_InputDate'];
  	$S_Core_No = $_POST['M_InputCore_No'];
	$S_Distination = $_POST['M_InputDestination'];
	$S_Loss = $_POST['M_InputLoss'];
	$S_Status = $_POST['M_InputStatus'];
	$S_CoreColor = $_POST['M_InputColor'];
	$S_Remarks = $_POST['M_InputRemarks'];
	
	$D_Remarks = $_POST['M_DInputRemarks'];
	$D_Status = $_POST['M_DInputStatus'];
	$D_CoreColor = $_POST['M_DInputColor'];
	$D_Loss = $_POST['M_DInputLoss'];
	$D_Distination = $_POST['M_DInputDestination'];
	$D_Core_NO = $_POST['M_DInputCore_No'];
	$D_Date = $_POST['M_DInputDate'];

	if($S_Date == ""){
		$S_Date = "2022-01-01";
	}
	if($S_Core_No == ""){
		$S_Core_No = "0";
	}
	if($S_Distination == ""){
		$S_Distination = "0.0";
	}
	if($S_Loss == ""){
		$S_Loss = "0.0";
	}
	if($S_Status == ""){
		$S_Status = "null";
	}
	if($S_CoreColor == ""){
		$S_CoreColor = "null";
	}
	if($S_Remarks == ""){
		$S_Remarks = "null";
	}
	if($D_Remarks == ""){
		$D_Remarks = "null";
	}
	if($D_Status == ""){
		$D_Status = "null";
	}
	if($D_CoreColor == ""){
		$D_CoreColor = "null";
	}
	if($D_Loss == ""){
		$D_Loss = "0.0";
	}
	if($D_Distination == ""){
		$D_Distination = "0.0";
	}
	if($D_Core_NO == ""){
		$D_Core_NO = "0";
	}
	if($D_Date == ""){
		$D_Date = "2022-01-01";
	}


	if(!isset($ID)){
		$_SESSION["status"] = "Empty Values.. Please enter your data.";
		header('location: ../includes/dashboard.php');
	}else{
		//first query (that you want to select)
	    $query_one = "update tb_sender set Date='".$S_Date."',Core_No=".$S_Core_No.",Distination=".$S_Distination.",Loss=".$S_Loss.",Status='".$S_Status."',Remarks='".$S_Remarks."',CoreColor='".$S_CoreColor."',D_Date='".$D_Date."',D_Core_NO=".$D_Core_NO.",D_Distination=".$D_Distination.",D_Loss=".$D_Loss.",D_Status='".$D_Status."',D_Remarks='".$D_Remarks."',D_CoreColor='".$D_CoreColor."' where ID = ".$ID.";";
	    //query execute
	    //echo $query_one;
	    if(mysqli_query($conn, $query_one)){
	    	$_SESSION["status"] = "Successfully updated.";
	    	header('location: ../includes/dashboard.php');
	    }else{
	    	$_SESSION["status"] = "Update failed.";
	    	header('location: ../includes/dashboard.php');
    	}
	}
    
?>