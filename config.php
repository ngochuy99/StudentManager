<?php
	$severname ="localhost";
	$username ="root";
	$password =""; 
	$db = "qlsv_v2";
	$conn = new mysqli($severname,$username,$password,$db);
	if($conn->connect_error){
		die("connection failed: ".$conn->connect_error);
	}
	session_start();
	// echo "Connected successfully";
 ?>