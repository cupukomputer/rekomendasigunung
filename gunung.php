
<?php include 'function/geturl.php';?>
<?php include 'function/auth.php';?>


<!-- auth login  -->

<?php if(is_login()==true){?>

    <!-- include config -->
    <?php include 'config/database.php';?>


    <?php require 'vendor/autoload.php';?>


    <?php include 'metode/fuzzytahani.php';?>

    <?php


        // menu
        if(isset($_GET['act'])){

            if($_GET['act']=='create'){

                include 'views/gunung/create.php';
            }
            else if($_GET['act']=='edit'){

                include 'views/gunung/edit.php';

            }
            else if($_GET['act']=='show'){

                include 'views/gunung/show.php';

            }
            else if($_GET['act']=='store'){

                
                //validation
                $v = new Valitron\Validator($_POST);
                $v->rule('required', 'namagunung')->message('{field} Harus Di Isi')->label('Nama Gunung');
                // $v->rule('required', 'foto')->message('{field} Harus Di Isi')->label('Silahkan Pilih Foto');
                $v->rule('required', 'harga')->message('{field} Harus Di Isi')->label('Harga');
                $v->rule('required', 'fasilitas')->message('{field} Harus Di Isi')->label('Fasilitas');
                $v->rule('required', 'jamoperasional')->message('{field} Harus Di Isi')->label('Jam Operasional');
                $v->rule('numeric', 'harga')->message('{field} Harus Angka')->label('Harga');
                $v->rule('numeric', 'fasilitas')->message('{field} Harus Angka')->label('Fasilitas');
                $v->rule('numeric', 'jamoperasional')->message('{field} Harus Angka')->label('Jam Operasional');
                
                if($v->validate()) {

                    if($_FILES["foto"]["name"]!=''){

                        //upload foto
                        $path_parts = pathinfo($_FILES["foto"]["name"]);
                        $extension = $path_parts['extension'];
                        $namefile=rand().'.'.$extension;
                        $target_dir = "assets/uploads/";
                        $target_file = $target_dir . basename($namefile);
                        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

                    }else{

                        $namefile='none.jpg';

                    }

                    

                    $sql = "INSERT INTO gunung VALUES ('', '$_POST[namagunung]', '$namefile','$_POST[harga]','$_POST[fasilitas]','$_POST[jamoperasional]')";

                    

                    if ($conn->query($sql) === TRUE) {
                        $status='success';
                    } else {
                        $status='error';
                    }
                

                }else{

                    $status='error';
                    

                }

                
                include 'views/gunung/index.php';    
                
                
                
            }
            else if($_GET['act']=='update'){

                $id=$_GET['id'];


                //validation
                $v = new Valitron\Validator($_POST);
                $v->rule('required', 'namagunung')->message('{field} Harus Di Isi')->label('Nama Gunung');
                // $v->rule('required', 'foto')->message('{field} Harus Di Isi')->label('Silahkan Pilih Foto');
                $v->rule('required', 'harga')->message('{field} Harus Di Isi')->label('Harga');
                $v->rule('required', 'fasilitas')->message('{field} Harus Di Isi')->label('Fasilitas');
                $v->rule('required', 'jamoperasional')->message('{field} Harus Di Isi')->label('Jam Operasional');
                $v->rule('numeric', 'harga')->message('{field} Harus Angka')->label('Harga');
                $v->rule('numeric', 'fasilitas')->message('{field} Harus Angka')->label('Fasilitas');
                $v->rule('numeric', 'jamoperasional')->message('{field} Harus Angka')->label('Jam Operasional');
                
                if($v->validate()) {
                        //cika poto di edit
                    if($_FILES['foto']['name']!=''){

                        //upload foto
                        $path_parts = pathinfo($_FILES["foto"]["name"]);
                        $extension = $path_parts['extension'];
                        $namefile=rand().'.'.$extension;
                        $target_dir = "assets/uploads/";
                        $target_file = $target_dir . basename($namefile);
                        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
                        $sql = "UPDATE gunung SET foto='$namefile',nama_gunung='$_POST[namagunung]',harga='$_POST[harga]',fasilitas='$_POST[fasilitas]',jamoperasional='$_POST[jamoperasional]' where id='$id'";

                    }else{

                        $sql = "UPDATE gunung SET nama_gunung='$_POST[namagunung]',harga='$_POST[harga]',fasilitas='$_POST[fasilitas]',jamoperasional='$_POST[jamoperasional]' where id='$id'";

                    }
                    

                    

                    if ($conn->query($sql) === TRUE) {
                        $status='success';
                    } else {
                        $status='error';
                    }
                

                }else{

                    $status='error';
                    

                }

                include 'views/gunung/edit.php';

            }
            else if($_GET['act']=='drop'){
                
                $id=$_GET['id'];
                $sql = "DELETE FROM gunung WHERE id='$id'";
                
                if ($conn->query($sql) === TRUE) {
                    $status='success';
                } else {
                    $status='error';
                }

                include 'views/gunung/index.php';
            }
            else{

                include 'views/gunung/index.php';
            }
                    
        }else{

            include 'views/gunung/index.php';

        }

        
        //update himpunan fuzzy tahani
        proseshimpunan();
            


    ?>



<?php }else{

    header("Location: ".$url.'login.php');

}?>



    
