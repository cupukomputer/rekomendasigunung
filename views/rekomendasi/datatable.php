


<!-- general form elements -->
<div class="card card">
        
        <div class="card-body">
            <div class='row'>

                <div class='col'>

                    
                    <table class="table table-bordered" id="tabel-gunung">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Fasilitas</th>
                                <th>Jam Operasional</th>
                                <th>DK Harga <?php echo $_POST['harga']?> (x) </th>
                                <th>DK Fasilitas <?php echo $_POST['fasilitas']?>(y) </th>
                                <th>DK Jam Operasional <?php echo $_POST['jamoperasional']?>(z) </th>
                                <th>DK 
                                    x
                                    AND 
                                    y
                                    AND 
                                    z

                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                    
                            foreach($data as $row) {?>
                                <tr>
                                    <td align='center'>
                                        <a href="assets/uploads/<?php echo $row['foto']?>" data-lightbox="image-1" data-title="My caption"><img src='assets/uploads/<?php echo $row['foto']?>' width='50px' height='50px'></a>
                                        
                                    
                                    </td>
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

                                        <?php echo $row['dkharga']?>

                                    </td>
                                    <td>

                                        <?php echo $row['dkfasilitas']?>

                                    </td>
                                    <td>

                                        <?php echo $row['dkjamoperasional']?>

                                    </td>

                                    <td>

                                        <?php echo $row['dk2']?>

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
