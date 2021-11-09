<?php 
	
	session_start();

	$id = $_POST['InputID'];
	$pass = $_POST['InputPassword'];

	

	if ($id == "" && $pass == "") {
		$_SESSION["status"] = "Empty Values.. Please enter your data.";
		header('location: ../index.php');
	}else{
		//Get Data, Sql & connect Database. Add database
	  	require_once("../db/connection.php");
		//first query (that you want to select)
		$query_one = "SELECT id,password FROM tb_users WHERE id = '$id';";
		//query execute
		$result = mysqli_query($conn, $query_one);  
		//Add while loop for first column data display and after display next column
		while ($row = mysqli_fetch_array($result)) {
			//data
			if (mysqli_num_rows($result) == 1) {
				if($row['password'] == $pass){
					header('location: ../includes/dashboard.php');
					$_SESSION['id'] = $row['id'];
				}else{
					header('location: ../index.php');
				}
			}else{
				header('location: ../index.php');
			}
		}
	}

?>