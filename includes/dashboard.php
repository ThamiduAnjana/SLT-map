<?php 	

if(!isset($_SESSION)){
	session_start();
}

if ($_SESSION["id"] == '') {
	header('location: ../index.php');
}

$id = $_SESSION["id"];

echo "Hello";

?>