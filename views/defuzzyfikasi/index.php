<!-- include part theme -->
<?php  include 'views/includes/header.php';?>
<?php  include 'views/includes/navbar.php';?>
<?php  include 'views/includes/sidebar.php';?>
<?php  include 'views/includes/content.php';?>
<!-- end include part theme -->

    <!-- general form elements -->
    <div class="card card">
        <div class="card-header">
        <h3 class="card-title">Defuzzyfikasi</h3>
        </div>
        <!-- /.card-header -->
        
        <div class="card-body">
            <div class='row'>

                <div class='col-md-12'>

                    <table class="table table-bordered" id="tabel-gunung">
                        <thead>
                            <tr>
                                <th rowspan='2'><center>Nama Gunung</center></th>
                                <th rowspan='2'><center>Harga</center></th>
                                <th rowspan='2'><center>Fasilitas</center></th>
                                <th rowspan='2'><center>Jam Operasional</center></th>
                                <th colspan='3'><center>Harga</center></th>
                                <th colspan='3'><center>Fasilitas</center></th>
                                <th colspan='3'><center>Jam Operasional</center></th>
                                <th rowspan='2'><center>Operator AND</center></th>
                                <th rowspan='2'><center>Operator OR</center></th>
                                
                            </tr>

                            <tr>
                                <th>Murah</th>
                                <th>Sedang</th>
                                <th>Mahal</th>
                                <th>Kurang</th>
                                <th>Sedang</th>
                                <th>Lengkap</th>
                                <th>Sebentar</th>
                                <th>Sedang</th>
                                <th>Lama</th>
                                
                            </tr>

                        </thead>
                        <tbody>

                            <?php 
                    
                            foreach( defuzzyfikasi() as $row) {?>
                                <tr>
                                    <td>

                                        <?php echo $row['nama_gunung']?>

                                    </td>
                                    <td>

                                        <?php echo $row['harga']?>

                                    </td>
                                    <td>

                                        <?php echo $row['fasilitas']?>

                                    </td>
                                    <td>

                                        <?php echo $row['jamoperasional']?>

                                    </td>
                                    <td>

                                        <?php echo $row['hargamurah']?>

                                    </td>

                                    <td>

                                        <?php echo $row['hargasedang']?>

                                    </td>

                                    <td>

                                        <?php echo $row['hargamahal']?>

                                    </td>

                                    <td>

                                        <?php echo $row['fasilitaskurang']?>

                                    </td>

                                    <td>

                                        <?php echo $row['fasilitassedang']?>

                                    </td>

                                    <td>

                                        <?php echo $row['fasilitaslengkap']?>

                                    </td>

                                    <td>

                                        <?php echo $row['jamoperasionalsebentar']?>

                                    </td>

                                    <td>

                                        <?php echo $row['jamoperasionalsedang']?>

                                    </td>

                                    <td>

                                        <?php echo $row['jamoperasionallama']?>

                                    </td>

                                    <td>

                                        <?php echo $row['and']?>

                                    </td>

                                    <td>

                                        <?php echo $row['or']?>

                                    </td>

                                    

                                   

                                </tr>


                            <?php }?>      
                            
                            

                        </tbody>
                    </table>
                    
                </div>

            </div>
            
        </div>
        <!-- /.card-body -->

        
              
    </div>
    <!-- /.card -->


<script>
    $(document).ready(function() {
        $('#tabel-gunung').DataTable( {
            "scrollX": true
        } );
    } );
</script>



                 

<!-- include footer part theme -->
<?php  include 'views/includes/endcontent.php';?>
<?php  include 'views/includes/footer.php';?>
<!-- end include footer part theme -->