<?php 
	include"../config.php";
	if(isset($_POST["username"])&&isset($_POST["Password"])){
		if($_POST["role"]=="Giảng viên")	$role="1";
		else 								$role="0";
		$query="SELECT maLop from lop where tenLop='".$_POST["Class"]."'";
		$result=$conn->query($query);
		$maLop=$result->fetch_row();
		$Newinfo=array($_POST["username"],$_POST["Password"],$_POST["FullName"],$_POST["dob"],
				$_POST["address"],$_POST["CMT"],$_POST["SDT"],$_POST["Khoa"],$_POST["nienkhoa"],$role,$maLop[0]);
		$query="INSERT INTO user(username, password, hoTen, dob, diaChi, cmt, sdt, khoa, nienKhoa, role, LopmaLop) values(?,?,?,?,?,?,?,?,?,?,?);";
		$preparedquery=$conn->prepare($query);
		$preparedquery->bind_param("sssssssssss",$Newinfo[0],$Newinfo[1],$Newinfo[2],$Newinfo[3],$Newinfo[4],$Newinfo[5],$Newinfo[6],$Newinfo[7],$Newinfo[8],$Newinfo[9],$Newinfo[10]);
		$preparedquery->execute();
		$query="SELECT LAST_INSERT_ID()";
		$result=$conn->query($query);
		$id=$result->fetch_row();
		$res=array($id[0],$_POST["FullName"],$_POST["address"],$_POST["dob"],$_POST["Khoa"]);
		$json=json_encode($res);
		echo $json;
	}
?>