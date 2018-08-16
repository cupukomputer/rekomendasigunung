<!-- include config -->
<?php include 'config/database.php';?>


<?php require 'vendor/autoload.php';?>


<?php include 'metode/fuzzytahani.php';?>

<?php




if(isset($_GET['act'])){

    if($_GET['act']=='proses'){

        
        $data=prosesquery($_POST['harga'],$_POST['fasilitas'],$_POST['jamoperasional']);

        $jumlahdata=count($data);

        
        
        include 'views/rekomendasi/hasil.php';

    }

}else{

    include 'views/rekomendasi/index.php';

}





?>