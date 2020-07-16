<?php
	include"../config.php";
	 $query="DELETE FROM user WHERE id='".$_POST["id"]."'";
	 $result=$conn->query($query);
	 if($result){
	 	echo "true";
	 }
	 else{
	 	echo "false";
	 }