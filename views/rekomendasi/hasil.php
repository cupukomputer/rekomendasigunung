

<!-- include part theme -->
<?php  include 'views/includes/header.php';?>
<!-- include part theme -->
<?php  include 'views/includes/navbarfront.php';?>


<div class='container'>
    <br>
    <div class="card card-success">
        <div class="card-header">
            <h4>Hasil Rekomendasi</h4>
        </div>

        <div class="card-body">
            
            <?php if($jumlahdata!=0){?>

                
                <?php  include 'views/rekomendasi/datatable.php';?>

            <?php }else{?>

                <div class="alert alert-danger" role="alert">
                    Tidak Di Temukan Gunung Yang Cocok
                </div>

            <?php }?>
            
        </div>

    </div>

</div>

                 


<?php  include 'views/includes/footer.php';?>
<!-- end include footer part theme -->