
<?php if(isset($status)){ ?>

    <?php if($status=='success'){ ?>

        <div class="alert alert-success" role="alert">
            Sukses
        </div>

    <?php }?>

    <?php if($status=='error'){ ?>


        <div class="alert alert-danger" role="alert">
            Gagal
        </div>

        <div class="alert alert-primary" role="alert">
            <?php if(isset($v)){ 
                $errors=$v->errors();
                foreach($errors as $value){

                    echo $value[0];
                    echo '<br>';


                }


            }?>
        </div>
        
        
    <?php }?>
<?php }?>

