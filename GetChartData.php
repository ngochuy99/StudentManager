<?php 
	include"config.php";
	$query="SELECT khoa,COUNT(*) as Soluong from user group BY khoa";
	$result=$conn->query($query);
	$arr=array();
	while($khoa_number=$result->fetch_row()){
		$arr[$khoa_number[0]]=$khoa_number[1];
	}
	$json=json_encode($arr);
	echo $json;
 ?>