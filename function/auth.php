<?php 


    function login($usernamelogin,$passwordlogin){


        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if(isset($usernamelogin) && isset($passwordlogin)){
            
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "srg";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            

            $passwordlogin=md5($passwordlogin);

            $sql = "SELECT * FROM user where username='$usernamelogin' and password='$passwordlogin'";
            $result = $conn->query($sql);


            
            
            if($result->num_rows!=0){
                
                $_SESSION["login"] = "true";
                $_SESSION["user"] = "admin";

            }else{
                $_SESSION["login"] = "false";
            
            }


        }else{

            $_SESSION["login"] = "false";
        }

        

    }

    function is_login(){
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if(isset($_SESSION['login'])){
            
            if($_SESSION['login']=='true'){

                $login=true;

            }else{

                $login=false;
            }

        }else{

            $login=false;

        }
        
        return $login;

    }

    function logout(){
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['login']='false';

        

    }






?>