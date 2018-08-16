<?php include 'function/geturl.php';?>
<?php include 'function/auth.php';?>


<!-- auth login  -->

<?php if(is_login()==true){?>

    <!-- include config -->
    <?php include 'config/database.php';?>


    <?php require 'vendor/autoload.php';?>


    <?php include 'metode/fuzzytahani.php';?>

    <?php




        if(isset($_GET['menu'])){

            if($_GET['menu']=='harga'){

                include 'views/himpunanfuzzy/harga.php';

            
            }
            elseif($_GET['menu']=='fasilitas'){

                include 'views/himpunanfuzzy/fasilitas.php';

            }
            elseif($_GET['menu']=='jamoperasional'){

                include 'views/himpunanfuzzy/jamoperasional.php';

            }

        }





    ?>



<!-- end auth -->
<?php }else{

header("Location: ".$url.'login.php');

}?>
