<?php
 	if(empty($_SESSION["username"])){
        header("Location: /StudentMng/pages/login/login.php");
        die();
	}
?>