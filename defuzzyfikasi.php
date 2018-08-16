<?php include 'function/geturl.php';?>
<?php include 'function/auth.php';?>


<!-- auth login  -->

<?php if(is_login()==true){?>

    <!-- include config -->
    <?php include 'config/database.php';?>


    <?php require 'vendor/autoload.php';?>


    <?php include 'metode/fuzzytahani.php';?>

    <?php
        proseshimpunan();
        include 'views/defuzzyfikasi/index.php';

    ?>



<!-- end auth -->
<?php }else{

header("Location: ".$url.'login.php');

}?>
