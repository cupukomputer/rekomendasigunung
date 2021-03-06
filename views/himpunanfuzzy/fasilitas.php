<!-- include part theme -->
<?php  include 'views/includes/header.php';?>
<?php  include 'views/includes/navbar.php';?>
<?php  include 'views/includes/sidebar.php';?>
<?php  include 'views/includes/content.php';?>
<!-- end include part theme -->

    <!-- general form elements -->
    <div class="card card">
        <div class="card-header">
        <h3 class="card-title">Derajat Keanggotaan Fasilitas</h3>
        </div>
        <!-- /.card-header -->
        
        <div class="card-body">
            <div class='row'>

                <div class='col'>

                    <?php
                        $sql = "SELECT gunung.*,dkfasilitas.* FROM gunung JOIN dkfasilitas ON gunung.id=dkfasilitas.gunung_id";
                        $result = $conn->query($sql);
                    
                    ?>

                    <table class="table table-bordered" id="tabel-gunung">
                        <thead>
                            <tr>
                                <th>Nama Gunung</th>
                                <th>Fasilitas</th>
                                <th>Kurang</th>
                                <th>Sedang</th>
                                <th>Lengkap</th>
                                </tr>
                        </thead>
                        <tbody>

                            <?php 
                    
                            while($row = $result->fetch_assoc()) {?>
                                <tr>
                                    <td>

                                        <?php echo $row['nama_gunung']?>

                                    </td>
                                    <td>

                                        <?php echo $row['fasilitas']?>

                                    </td>
                                    <td>

                                        <?php echo $row['kurang']?>

                                    </td>
                                    <td>

                                        <?php echo $row['sedang']?>

                                    </td>
                                    <td>

                                        <?php echo $row['lengkap']?>

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
    $(document).ready( function (){
        
        $('#tabel-gunung').DataTable();
    });
</script>





                 

<!-- include footer part theme -->
<?php  include 'views/includes/endcontent.php';?>
<?php  include 'views/includes/footer.php';?>
<!-- end include footer part theme -->