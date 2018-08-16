


<!-- general form elements -->
<div class="card card">
        <div class="card-header">
        <h3 class="card-title">Data User</h3>
        </div>
        <!-- /.card-header -->
        
        <div class="card-body">
            <div class='row'>
                <div class='col'>
                    <a href='?act=create' class='btn btn-primary'>Tambah</a>
                </div>
            </div>
            <br>
        
        
            <div class='row'>

                <div class='col'>

                    <?php
                        $sql = "SELECT * FROM user";
                        $result = $conn->query($sql);
                    ?>

                    <table class="table table-bordered" id="tabel-gunung">
                        <thead>
                            <tr>
                                <th>Usename</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                    
                            while($row = $result->fetch_assoc()) {?>
                                <tr>
                                    
                                    <td>

                                        <?php echo $row['username']?>

                                    </td>
                                    <td>

                                        <?php echo $row['password']?>

                                    </td>
                                    <td>

                                        <?php echo $row['level']?>

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