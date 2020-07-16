<?php 
	include"../config.php";
	 $query="SELECT * FROM user WHERE id='".$_POST["id"]."'";
	 $result=$conn->query($query);
	 $res=$result->fetch_row();
	 $json=json_encode($res);
	 echo $json;
 ?>