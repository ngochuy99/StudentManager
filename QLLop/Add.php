<?php 
	include"../config.php";
	$query="INSERT INTO lop (tenLop,siSo,coVanHocTap) VALUES('".$_POST["class_name"]."','".$_POST["number"]."','".$_POST["cvht"]."')";
	$result=$conn->query($query);
	$json=json_encode($_POST["class_name"]);
	echo $json;

 ?>