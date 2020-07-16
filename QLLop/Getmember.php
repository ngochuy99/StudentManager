<?php 
	include"../config.php";
	$query="select hoTen,diaChi,dob,sdt FROM user WHERE LopmaLop=(SELECT maLop from lop WHERE tenLop='".$_POST["tenlop"]."')";
	$result=$conn->query($query);
	$arr=array();
	$i=0;
	while ($temp=$result->fetch_assoc()) {
		$arr[$i]=$temp;
		$i++;
	}
	$json=json_encode($arr);
	echo $json;
 ?>