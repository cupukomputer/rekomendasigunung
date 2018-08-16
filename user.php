

<!-- include config -->
<?php include 'config/database.php';?>

<?php include 'function/geturl.php';?>
<?php include 'function/auth.php';?>


<!-- auth login  -->

<?php if(is_login()==true){?>



    <?php require 'vendor/autoload.php';?>




    <?php

        

        if(isset($_GET['act'])){


            if($_GET['act']=='create'){

                include 'views/user/create.php';

            }elseif($_GET['act']=='edit'){

                $sql = "SELECT * FROM user where id=$_GET[id]";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();


                include 'views/user/edit.php';

            }elseif($_GET['act']=='store'){

                $v = new Valitron\Validator($_POST);
                $v->rule('required', 'username')->message('{field} Harus Di Isi')->label('User Name');
                $v->rule('required', 'password')->message('{field} Harus Di Isi')->label('Password');

                if($v->validate()) {

                    $sql = "INSERT INTO user VALUES ('', '$_POST[username]',md5('$_POST[username]'),'admin')";

                    if ($conn->query($sql) === TRUE) {
                        $status='success';
                    } else {
                        $status='error';
                    }
                
                }else{

                    $status='error';
                }
                
                include 'views/user/create.php';

            }elseif($_GET['act']=='update'){

                $v = new Valitron\Validator($_POST);
                $v->rule('required', 'username')->message('{field} Harus Di Isi')->label('User Name');
                $v->rule('required', 'password')->message('{field} Harus Di Isi')->label('Password');

                if($v->validate()) {



                    if($_POST['password']==$_POST['bpassword']){

                        $sql = "UPDATE user set username='$_POST[username]' where id='$_GET[id]'";

                    }else{

                        $sql = "UPDATE user set username='$_POST[username]',password=md5('$_POST[password]') where id='$_GET[id]'";

                    }


                

                    if ($conn->query($sql) === TRUE) {
                        $status='success';
                    } else {
                        $status='error';
                    }
                
                }else{

                    $status='error';
                }
                
                include 'views/user/index.php';

            }elseif($_GET['act']=='drop'){

                $id=$_GET['id'];
                $sql = "DELETE FROM user WHERE id='$id'";
                
                if ($conn->query($sql) === TRUE) {
                    $status='success';
                } else {
                    $status='error';
                }

                include 'views/user/index.php';

            }else{

                include 'views/user/index.php';
            }




        }else{

            include 'views/user/index.php';

        }


    ?>


<?php }else{

    header("Location: ".$url.'login.php');

}?>