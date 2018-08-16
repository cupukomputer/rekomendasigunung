
<?php include 'function/geturl.php';?>
<?php include 'function/auth.php';?>


<?php

    $url=geturl('http');


    if(isset($_GET['act'])){

        if($_GET['act']=='login'){

            
            login($_POST['username'],$_POST['password']);

           

            if(is_login()==true){
                
                header("Location: ".$url.'gunung.php');

            }else{

                $status='error';
                include 'views/login/index.php';

            }
            


        }elseif($_GET['act']=='signout'){

            logout();
            include 'views/login/index.php';

        }

    }else{

        include 'views/login/index.php';
    }

    


?>