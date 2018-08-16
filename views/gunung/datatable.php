


<!-- general form elements -->
<div class="card card">
        <div class="card-header">
        <h3 class="card-title">Data Wisata Gunung</h3>
        </div>
        <!-- /.card-header -->
        
        <div class="card-body">
            <div class='row'>

                <div class='col'>

                    <?php
                        $sql = "SELECT * FROM gunung";
                        $result = $conn->query($sql);
                    
                    ?>

                    <table class="table table-bordered" id="tabel-gunung">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Fasilitas</th>
                                <th>Jam Operasional</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                    
                            while($row = $result->fetch_assoc()) {?>
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

                                    <td align='center'>

                                        <a href='?act=edit&id=<?php echo $row['id']?>' class='btn btn-primary btn-sm'><i class="fa fa-edit"></i></a>
                                        <a href='?act=drop&id=<?php echo $row['id']?>' class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
                                    
                                       

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