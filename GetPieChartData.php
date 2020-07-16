<?php 
	include"config.php";
	$query;
	if($_POST["hk"]!=""){
		$query="SELECT a.id,AVG(b.diemCC*c.trongSoCC+b.diemTH*c.trongSoTH+b.diemKT*c.trongSoKT+b.diemBTL*c.trongSoBTL+b.diemThi*c.trongSoThi)/100 FROM user a inner join diem b ON a.id=b.Sinhvienid and b.hocKy='".$_POST["hk"]."' inner join monhoc c on b.MonHocid=c.id group by a.id";
	}
	else{
		$query="SELECT a.id,AVG(b.diemCC*c.trongSoCC+b.diemTH*c.trongSoTH+b.diemKT*c.trongSoKT+b.diemBTL*c.trongSoBTL+b.diemThi*c.trongSoThi)/100 FROM user a inner join diem b ON a.id=b.Sinhvienid inner join monhoc c on b.MonHocid=c.id group by a.id";
	}
	// echo $query;
	$result=$conn->query($query);
	$Scorearr = array(">8"=>0,"7-8"=>0,"5-7"=>0,"4-5"=>0,"<4"=>0);
	while ($arr=$result->fetch_row()) {
		if($arr[1]>=8){
			$Scorearr[">8"]++;
		}
		elseif ($arr[1]<8&&$arr[1]>=7) {
			$Scorearr["7-8"]++;
		}
		elseif ($arr[1]<7&&$arr[1]>=5) {
			$Scorearr["5-7"]++;
		}
		elseif ($arr[1]<5&&$arr[1]>=4) {
			$Scorearr["4-5"]++;
		}
		else{
			$Scorearr["<4"]++;
		}
	}
	 $json=json_encode($Scorearr);
	 echo $json;
 ?>