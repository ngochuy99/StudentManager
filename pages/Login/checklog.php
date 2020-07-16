<?php
                include"../../config.php";
                session_unset();
                if(isset($_POST["Username"]) && isset($_POST["Password"])){ 
                $username=$_POST["Username"];
                $pass=$_POST["Password"];
                $sql="SELECT username, role,id FROM user WHERE username='".$username."' AND password='".$pass."'";
                $result=$conn->query($sql);
                $user_arr = $result->fetch_row();
                if($user_arr){
                  $_SESSION["username"]=$user_arr[0];
                  $_SESSION["role"]=$user_arr[1];
                  $_SESSION["id"]=$user_arr[2];
                  header("Location: /StudentMng/index.php");
                  die();  
              }
                else{
                  echo '<script>alert("Sai tên tài khoản hoặc mật khẩu")</script>'; 
                }
            }
          ?>