<?php include 'function/geturl.php';?>
<?php include 'function/auth.php';?>


<!-- auth login  -->

<?php if(is_login()==true){?>
    
    
    
    
    <!-- include config -->
    <?php include 'config/database.php';?>


    <!-- include Function -->
    <?php  include 'function/getdatasetkriteria.php';?>


    <?php require 'vendor/autoload.php';?>

    <?php
        // menu

        if(isset($_GET['act'])){
            

            if($_GET['act']=='update'){

                //validation
                $v = new Valitron\Validator($_POST);
                $v->rule('required', 'hargamurah')->message('{field} Harus Di Isi')->label('Harga Murah');
                $v->rule('required', 'hargasedangminimal')->message('{field} Harus Di Isi')->label('Harga Sedang');
                $v->rule('required', 'hargasedangmaksimal')->message('{field} Harus Di Isi')->label('Harga Sedang');
                $v->rule('required', 'hargamahal')->message('{field} Harus Di Isi')->label('Harga Sedang');
                $v->rule('required', 'fasilitaskurang')->message('{field} Harus Di Isi')->label('Fasilitas kurang');
                $v->rule('required', 'fasilitassedangminimal')->message('{field} Harus Di Isi')->label('Fasilitas Sedang');
                $v->rule('required', 'fasilitassedangmaksimal')->message('{field} Harus Di Isi')->label('Fasilitas Sedang');
                $v->rule('required', 'fasilitaslengkap')->message('{field} Harus Di Isi')->label('Fasilitas lengkap');
                $v->rule('required', 'jamoperasionalsebentar')->message('{field} Harus Di Isi')->label('Jam Operasional Sebentar');
                $v->rule('required', 'jamoperasionalsedangminimal')->message('{field} Harus Di Isi')->label('Jam Operasional Sedang');
                $v->rule('required', 'jamoperasionalsedangmaksimal')->message('{field} Harus Di Isi')->label('Jam Operasional Sedang');
                $v->rule('required', 'jamoperasionallama')->message('{field} Harus Di Isi')->label('Jam Operasional lama');
                $v->rule('numeric', 'hargamurah')->message('{field} Harus Angka')->label('Harga Murah');
                $v->rule('numeric', 'hargasedangminimal')->message('{field} Harus Angka')->label('Harga Sedang');
                $v->rule('numeric', 'hargasedangmaksimal')->message('{field} Harus Angka')->label('Harga Sedang');
                $v->rule('numeric', 'hargamahal')->message('{field} Harus Angka')->label('Harga Sedang');
                $v->rule('numeric', 'fasilitaskurang')->message('{field} Harus Angka')->label('Fasilitas kurang');
                $v->rule('numeric', 'fasilitassedangminimal')->message('{field} Harus Angka')->label('Fasilitas Sedang');
                $v->rule('numeric', 'fasilitassedangmaksimal')->message('{field} Harus Angka')->label('Fasilitas Sedang');
                $v->rule('numeric', 'fasilitaslengkap')->message('{field} Harus Angka')->label('Fasilitas lengkap');
                $v->rule('numeric', 'jamoperasionalsebentar')->message('{field} Harus Angka')->label('Jam Operasional Sebentar');
                $v->rule('numeric', 'jamoperasionalsedangminimal')->message('{field} Harus Angka')->label('Jam Operasional Sedang');
                $v->rule('numeric', 'jamoperasionalsedangmaksimal')->message('{field} Harus Angka')->label('Jam Operasional Sedang');
                $v->rule('numeric', 'jamoperasionallama')->message('{field} Harus Angka')->label('Jam Operasional lama');
                
                
                if($v->validate()) {

                    $sql = "UPDATE setkriteria SET nilai_maksimal='".$_POST['hargamurah']."' WHERE id=1";
                    mysqli_query($conn, $sql);

                    $sql = "UPDATE setkriteria SET nilai_minimal='".$_POST['hargasedangminimal']."' WHERE id=2";
                    mysqli_query($conn, $sql);
                    $sql = "UPDATE setkriteria SET nilai_maksimal='".$_POST['hargasedangmaksimal']."' WHERE id=2";
                    mysqli_query($conn, $sql);

                    $sql = "UPDATE setkriteria SET nilai_minimal='".$_POST['hargamahal']."' WHERE id=3";
                    mysqli_query($conn, $sql);

                    $sql = "UPDATE setkriteria SET nilai_maksimal='".$_POST['fasilitaskurang']."' WHERE id=4";
                    mysqli_query($conn, $sql);

                    $sql = "UPDATE setkriteria SET nilai_minimal='".$_POST['fasilitassedangminimal']."' WHERE id=5";
                    mysqli_query($conn, $sql);
                    $sql = "UPDATE setkriteria SET nilai_maksimal='".$_POST['fasilitassedangmaksimal']."' WHERE id=5";
                    mysqli_query($conn, $sql);
                    

                    $sql = "UPDATE setkriteria SET nilai_minimal='".$_POST['fasilitaslengkap']."' WHERE id=6";
                    mysqli_query($conn, $sql);

                    $sql = "UPDATE setkriteria SET nilai_maksimal='".$_POST['jamoperasionalsebentar']."' WHERE id=7";
                    mysqli_query($conn, $sql);

                    $sql = "UPDATE setkriteria SET nilai_minimal='".$_POST['jamoperasionalsedangminimal']."' WHERE id=8";
                    mysqli_query($conn, $sql);

                    $sql = "UPDATE setkriteria SET nilai_maksimal='".$_POST['jamoperasionalsedangmaksimal']."' WHERE id=8";
                    mysqli_query($conn, $sql);

                    $sql = "UPDATE setkriteria SET nilai_minimal='".$_POST['jamoperasionallama']."' WHERE id=9";
                    
                    
                    if (mysqli_query($conn, $sql)) {

                        $status='success';

                    } else {

                        $status='error';
                    }

                    
                } else {
                    $status='error';
                    // print_r($v->errors());
                }
                

                
                include 'views/kriteria/index.php';


            }else{
                include 'views/kriteria/index.php';
            }

        }else{

            include 'views/kriteria/index.php';

        }

    

    ?>

<?php }else{

header("Location: ".$url.'login.php');

}?>