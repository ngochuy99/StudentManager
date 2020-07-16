<?php 
	include"../config.php";
	$data=["Kỹ thuật số","Xử lý tín hiệu số"];
	foreach ($_POST["data"] as $value) {
		$query="INSERT INTO diem(hocKy,Sinhvienid,MonHocid) VALUES('".$_POST["hk"]."','".$_SESSION["id"]."',(SELECT id FROM monhoc WHERE tenMonHoc='".$value."'))";
		$result=$conn->query($query);
	}
	echo "success";
 // ?>